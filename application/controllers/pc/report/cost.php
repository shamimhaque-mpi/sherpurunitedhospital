<?php

class Cost extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Cost';
        $this->data['active'] = 'data-target="report_menu"';
        $this->data['subMenu'] = 'data-target="cost"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        $this->load->view('components/report/cost', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
