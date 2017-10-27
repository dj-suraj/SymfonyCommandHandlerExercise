<?php
/**
 * Created by PhpStorm.
 * User: Suraj Gusain
 * Date: 27-10-2017
 * Time: 15:27
 */

namespace AppBundle\Command;


class PaymentCommand
{

    /**
     * @var string
     * @Assert\NotBlank(message="Sender should be specified")
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.",)
     */
    protected $from;

    /**
     * @var string
     * @Assert\NotBlank(message="Receiver should be specified")
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.",)
     */
    protected $to;

    /**
     * @var string
     * @Assert\NotBlank(message="Amount should be specified")
     * @Assert\GreaterThan(value=0, message="The amount cant be negative")
     */
    protected $amount;

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}