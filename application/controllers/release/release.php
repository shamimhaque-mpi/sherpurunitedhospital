<?php

class Release extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        
    }
}
