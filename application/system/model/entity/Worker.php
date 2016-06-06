<?php
include_once 'Staff.php';
/**
 * Created by PhpStorm.
 * User: chamal kuruppu
 * Date: 5/19/2016
 * Time: 2:22 PM
 */
class Worker extends Staff
{
    private $type;

    public function set_type($value)
    {
        $this->type = $value;
    }

    public function get_type()
    {
        return $this->type;
    }
}