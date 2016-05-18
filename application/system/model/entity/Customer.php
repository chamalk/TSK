<?php

/**
 * Created by PhpStorm.
 * User: chamal kuruppu
 * Date: 4/13/2016
 * Time: 5:09 PM
 */
class Customer
{
    private $ID;
    private $name;
    private $conNo;
    private $address;
    private $emailAddress;
    private $password;
    private $userName;


    public function set_ID($value)
    {
        $this->ID=$value;
    }
    public function get_ID()
    {
        return $this->ID;
    }

    public function set_name($value)
    {
        $this->name=$value;
    }
    public function get_name()
    {
        return $this->name;
    }

    public function set_conNo($value)
    {
        $this->conNo=$value;
    }
    public function get_conNo()
    {
        return $this->conNo;
    }

    public function set_address($value)
    {
        $this->address=$value;
    }
    public function get_address()
    {
        return $this->address;
    }

    public function set_emailAddress($value)
    {
        $this->emailAddress=$value;
    }
    public function get_emailAddress()
    {
        return $this->emailAddress;
    }

    public function set_password($value)
    {
        $this->password=$value;
    }
    public function get_password()
    {
        return $this->password;
    }

    public function set_userName($value)
    {
        $this->userName=$value;
    }
    public function get_userName()
    {
        return $this->userName;
    }



}