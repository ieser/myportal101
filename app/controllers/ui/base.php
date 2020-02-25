<?php

namespace ui;

class base extends \general {

    function __construct() {
        parent::__construct();
    }
    protected function render() {

        $route = explode("/", $this->param("0"));
        $title = ucwords(str_replace("-"," ",$route[1]));
        $this->f3->set("pageTitle", $title);

        echo \View::instance()->render('/layout.php');
    }
    public function renderAjax() { 
        echo View::instance()->render('/ajax/ajax_layout.php');
    }
    function afterRoute() {
    }
    function beforeRoute(){
    }
    

}
