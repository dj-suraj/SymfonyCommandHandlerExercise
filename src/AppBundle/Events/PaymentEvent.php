<?php
/**
 * Created by PhpStorm.
 * User: Suraj Gusain
 * Date: 27-10-2017
 * Time: 17:25
 */

namespace AppBundle\Events;


use Symfony\Component\EventDispatcher\Event;

class PaymentEvent extends Event
{

    const PAYMENT_DONE='app.payment.done';
    public $payment;

    /**
     * PaymentEvent constructor.
     * @param $payment
     */
    public function __construct($payment) {
        $this->payment = $payment;
    }

}