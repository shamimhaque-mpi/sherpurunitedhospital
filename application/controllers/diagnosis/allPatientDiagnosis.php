<?php

class AllPatientDiagnosis extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'New Diagnosis';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="all"';

         // get all test
         $this->data['allTestName'] = $this->action->read('investigation'); 
         $this->data['doctors'] = $this->action->read("doctors", ['status'=>1]);   

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}