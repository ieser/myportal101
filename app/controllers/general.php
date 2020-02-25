<?php


class general extends Prefab {

    function __construct() {
        $this->f3 = \Base::instance();
    }
 
    public function echo_array($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }


    public function session($field, $value = "") {
        if (func_num_args() == 1)
            return $this->f3->get("SESSION." . $field);
        else
            $this->f3->set("SESSION." . $field, $value);
    }
    public function post($field) {
        return $this->f3->get("POST." . $field);
    }
    public function get($field) {
        return $this->f3->get("GET." . $field);
    }
    public function param($field) {
        return $this->f3->get("PARAMS." . $field);
    }
    public static function date_encode($it_date) {
        $nd = explode("/", $it_date);
        return implode("-", array($nd[2], $nd[1], $nd[0]));
        //return date("Y-m-d", strtotime($it_date));
    }
    public static function date_decode($us_date) {
        $nd = explode("-", $us_date);
        return implode("/", array($nd[2], $nd[1], $nd[0]));
        //return date("d/m/Y", strtotime($us_date));
    }



}
