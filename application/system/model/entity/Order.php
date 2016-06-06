<?php

/**
 * Created by PhpStorm.
 * User: chamal kuruppu
 * Date: 5/2/2016
 * Time: 10:35 PM
 */
class Order
{
    private $ID;
    private $customer_ID;
    private $directions;
    private $address;
    private $date;
    private $time;
    private $salesman_ID;
    private $forwardTime;
    private $clerkID;


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

    public function set_directions($value)
    {
        $this->directions=$value;
    }
    public function get_directions()
    {
        return $this->directions;
    }

    public function set_address($value)
    {
        $this->address=$value;
    }

    public function get_address()
    {
        return $this->address;
    }

    public function set_date($value)
    {
        $this->date=$value;
    }
    public function get_date()
    {
        return $this->date;
    }

    public function set_time($value)
    {
        $this->time=$value;
    }
    public function get_time()
    {
        return $this->time;
    }

    public function set_salesman_ID($value)
    {
        $this->salesman_ID=$value;
    }
    public function get_salesman_ID()
    {
        return $this->salesman_ID;
    }

    public function set_forwardTime($value)
    {
        $this->forwardTime=$value;
    }
    public function get_forwardTime()
    {
        return $this->forwardTime;
    }

    public function set_clerkID($value)
    {
        $this->clerkID=$value;
    }
    public function get_clerkID()
    {
        return $this->clerkID;
    }
}