<?php
class Outdoor extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'admission';
    }
    
    public function index(){
        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="outdoor"';

        $this->data['pid'] = $this->input->get('pid');
        $this->data['doctors'] = $this->action->read('doctors');
       
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/outdoor', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
}