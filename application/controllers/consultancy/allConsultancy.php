<?php

class AllConsultancy extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'New Consultancy';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="consultancy-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/consultancy/nav', $this->data);
        $this->load->view('components/consultancy/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}