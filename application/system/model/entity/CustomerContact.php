<?php

/**
 * Created by PhpStorm.
 * User: chamal kuruppu
 * Date: 5/3/2016
 * Time: 11:18 AM
 */
class CustomerContact
{
    private $ID;
    private $customer_ID;
    private $dateTime;
    private $question;


    public function set_ID($value)
    {
        $this->ID=$value;
    }
    public function get_ID()
    {
        return $this->ID;
    }

    public function set_customer_ID($value)
    {
        $this->customer_ID=$value;
    }
    public function get_customer_ID()
    {
        return $this->customer_ID;
    }

    public function set_dateTime($value)
    {
        $this->dateTime=$value;
    }
    public function get_dateTime()
    {
        return $this->dateTime;
    }

    public function set_question($value)
    {
        $this->question=$value;
    }
    public function get_question()
    {
        return $this->question;
    }

}