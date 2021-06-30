<?php

class Add extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'profile';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="test_menu"';
        $this->data['subMenu'] = 'data-target="add"';

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/test/nav', $this->data);
        $this->load->view('components/test/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all() {
        $this->data['active'] = 'data-target="test_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/test/nav', $this->data);
        $this->load->view('components/test/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}