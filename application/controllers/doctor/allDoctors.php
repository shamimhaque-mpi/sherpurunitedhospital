<?php

class AllDoctors extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Doctor';
    }
    
    public function index() {
        $this->data['active']   = 'data-target="doctor-menu"';
        $this->data['subMenu']  = 'data-target="all"';

        
        $this->data['doctors']=$this->action->readDistinct("doctors","fullName", ['status'=>1]);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function deleteDoctor() {
        $options = array(
            'title' => 'delete',
            'emit'  => 'Information Successfully Deleted!',
            'btn'   => true
        );

        $this->data['confirmation'] = message($this->action->deleteData('doctors', array('id' => $this->input->get('id'))), $options);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);

        redirect('doctor/allDoctors', 'refresh');
    }
    
    public function trashDoctor() {
        $options = array(
            'title' => 'delete',
            'emit'  => 'Information Successfully Deleted!',
            'btn'   => true
        );

        $this->data['confirmation'] = message($this->action->update('doctors', ['status'=>0], array('id' => $this->input->get('id'))), $options);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);

        redirect('doctor/allDoctors', 'refresh');
    }
}