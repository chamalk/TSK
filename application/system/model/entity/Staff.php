<?php

/**
 * Created by PhpStorm.
 * User: chamal kuruppu
 * Date: 4/13/2016
 * Time: 5:10 PM
 */
class Staff
{
    private $ID;
    private $name;
    private $conNo;
    private $address;
    private $nic;
    private $password;
    private $userName;
    private $salary_type;
    private $salary_amount;

    public function set_ID($value)
    {
        $this->ID = $value;
    }

    public function get_ID()
    {
        return $this->ID;
    }

    public function set_name($value)
    {
        $this->name = $value;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_conNo($value)
    {
        $this->conNo = $value;
    }

    public function get_conNo()
    {
        return $this->conNo;
    }

    public function set_address($value)
    {
        $this->address = $value;
    }

    public function get_address()
    {
        return $this->address;
    }

    public function set_nic($value)
    {
        $this->nic = $value;
    }

    public function get_nic()
    {
        return $this->nic;
    }

    public function set_password($value)
    {
        $this->password = $value;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function set_userName($value)
    {
        $this->userName = $value;
    }

    public function get_userName()
    {
        return $this->userName;
    }

    public function set_salary_type($value)
    {
        $this->salary_type = $value;
    }

    public function get_salary_type()
    {
        return $this->salary_type;
    }

    public function set_salary_amount($value)
    {
        $this->salary_amount = $value;
    }

    public function get_salary_amount()
    {
        return $this->salary_amount;
    }
}
?>