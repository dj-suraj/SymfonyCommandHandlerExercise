<?php
/**
 * Created by PhpStorm.
 * User: asola
 * Date: 25/10/2017
 * Time: 12:22
 */

namespace AppBundle\Model;


class Payment
{
    public $id;
    public $amount;
    public $from;
    public $to;

    /**
     * Payment constructor.
     * @param $id
     *
     */
    public function __construct()
    {
        $this->id = random_int(999,99999);
    }
}