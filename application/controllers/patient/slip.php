<?php

class Slip extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Patient slip';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $where = array("patient_id" => $this->input->get('pid'));
        $this->data['info'] = $this->action->read('patient', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/slip', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);

    }
}