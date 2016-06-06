<?php
include_once 'Staff.php';

class Clerk extends Staff{
    private $level;

    public function set_level($value){
        $this->level=$value;

    }
    public function get_level(){
        return $this->level;
    }

}
?>