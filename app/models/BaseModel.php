<?php

/**
 * Description of BaseModel
 *
 * @author ieser
 */
class BaseModel extends Prefab {

    public function __construct() {
        $this->f3 = \Base::instance();
        date_default_timezone_set("Europe/Rome");
        $hostname = $this->f3->get("db_hostname");
        $port = $this->f3->get("db_port");
        $db_name = $this->f3->get("db_name");
        $username = $this->f3->get("db_user");
        $password = $this->f3->get("db_pass");

        $this->f3->set("DB", new DB\SQL("mysql:host=$hostname;port=$port;dbname=$db_name", $username, $password));

        $this->db = $this->f3->get("DB");
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
    public function array_print($array) {
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
    
    public function randomString($lenght) {
        $characters = 'ABCDEFGHILMNOPQRSTYJKXZ1234567890abcdefghilmnopqurstyuxzyv';
        $stringRandom = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $lenght; $i++) {
            $stringRandom .= $characters[mt_rand(0, $max)];
        }
        return $stringRandom;
    }
}
