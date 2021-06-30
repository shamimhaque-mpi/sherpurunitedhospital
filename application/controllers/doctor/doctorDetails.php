<?php

class DoctorDetails extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Doctor';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $where = array('id' => $this->input->get('id'));
        $this->data['biography'] = $this->action->read('doctors', $where);

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/profile', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

}