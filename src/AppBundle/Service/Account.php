<?php

namespace AppBundle\Service;

use AppBundle\Exceptions\NotEnoughFundsException;
use AppBundle\Model\Payment;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;

class Account
{
    /**
     * @var SessionInterface
     */
    protected $session;
    protected $amount=1000;

    /**
     * Account constructor.
     * @param SessionStorageInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->revert();
    }


    public function process(Payment $invoice)
    {
        if ($invoice->amount>$this->amount) {
            throw new NotEnoughFundsException();
        }
        $this->transfer($invoice->amount);
    }

    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Move money in if amount is positive
     * Move money out if amount is negative
     *
     * For internal use only
     *
     * @param $amount double
     */
    public function transfer($amount)
    {
        $this->amount+=$amount;
    }

    /**
     * Reverts account to previous saved state
     */
    public function revert()
    {
        $this->amount = $this->session->get('amount', $this->amount);
        $this->session->set('amount', $this->amount);
    }

    /**
     * Save account status
     */
    public function persist()
    {
        $this->session->set('amount', $this->amount);
        $this->session->save();
    }
}