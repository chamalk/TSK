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
    private $measurementDate;
    private $height;
    private $width;
    private $motor;
    private $material;
    private $design;
    private $measurementDetails;
    private $status;
    private $supervisorID;
    private $status_session;
    private $status_date;
    private $status_details;
    private $driver;
    private $journey_date;
    private $journey_from;
    private $journey_to;
    private $journey_startT;
    private $journey_endT;
    private $payment;

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

    public function set_measurementDate($value)
    {
        $this->measurementDate=$value;
    }
    public function get_measurementDate()
    {
        return $this->measurementDate;
    }

    public function set_height($value)
    {
        $this->height=$value;
    }
    public function get_height()
    {
        return $this->height;
    }

    public function set_width($value)
    {
        $this->width=$value;
    }
    public function get_width()
    {
        return $this->width;
    }

    public function set_motor($value)
    {
        $this->motor=$value;
    }

    public function get_motor()
    {
        return $this->motor;
    }

    public function set_material($value)
    {
        $this->material=$value;
    }
    public function get_material()
    {
        return $this->material;
    }

    public function set_design($value)
    {
        $this->design=$value;
    }
    public function get_design()
    {
        return $this->design;
    }

    public function set_measurementDetails($value)
    {
        $this->measurementDetails=$value;
    }
    public function get_measurementDetails()
    {
        return $this->measurementDetails;
    }

    public function set_status($value)
    {
        $this->status=$value;
    }
    public function get_status()
    {
        return $this->status;
    }

    public function set_supervisorID($value)
    {
        $this->supervisorID=$value;
    }
    public function get_supervisorID()
    {
        return $this->supervisorID;
    }

    public function set_status_session($value)
    {
        $this->status_session=$value;
    }
    public function get_status_session()
    {
        return $this->status_session;
    }

    public function set_status_date($value)
    {
        $this->status_date=$value;
    }

    public function get_status_date()
    {
        return $this->status_date;
    }

    public function set_status_details($value)
    {
        $this->status_details=$value;
    }
    public function get_status_details()
    {
        return $this->status_details;
    }

    public function set_driver($value)
    {
        $this->driver=$value;
    }
    public function get_driver()
    {
        return $this->driver;
    }

    public function set_journey_date($value)
    {
        $this->journey_date=$value;
    }
    public function get_journey_date()
    {
        return $this->journey_date;
    }

    public function set_journey_from($value)
    {
        $this->journey_from=$value;
    }
    public function get_journey_from()
    {
        return $this->journey_from;
    }

    public function set_journey_to($value)
    {
        $this->journey_to=$value;
    }

    public function get_journey_to()
    {
        return $this->journey_to;
    }

    public function set_journey_startT($value)
    {
        $this->journey_startT=$value;
    }
    public function get_journey_startT()
    {
        return $this->journey_startT;
    }

    public function set_journey_endT($value)
    {
        $this->journey_endT=$value;
    }
    public function get_journey_endT()
    {
        return $this->journey_endT;
    }

    public function set_payment($value)
    {
        $this->payment=$value;
    }
    public function get_payment()
    {
        return $this->payment;
    }
}