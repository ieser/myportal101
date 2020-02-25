<?php

namespace ui;

class pages extends base{

    function __construct() {
        parent::__construct();
    }
    
    /**
     * Method used to display pages.
     *
     * @author ieser
     * @param page
     * 
     * 
     */
    public function display() {
        $page = ($this->param("page")=="") ? "homepage" : $this->param("page");


        $this->f3->set('title', "/".$page.".php" );
        $this->f3->set('favicon', "/".$page.".php" );


        $this->f3->set('content', "/".$page.".php" );
        $this->render();
    }

}
