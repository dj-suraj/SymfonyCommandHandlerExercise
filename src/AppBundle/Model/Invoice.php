<?php

namespace AppBundle\Model;

class Invoice
{
    const STATUS_PAID='paid';

    public $id;

    public $date;

    public $amount;

    public $from;

    public $to;

    public $status=self::STATUS_PAID;

    /**
     * Invoice constructor.
     * @param $id
     *
     */
    public function __construct()
    {
        $this->id = random_int(999,99999);
    }


}