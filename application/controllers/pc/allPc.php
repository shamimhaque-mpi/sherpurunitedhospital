<?php

class AllPc extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'pc';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="pc-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['pc'] = $this->action->readDistinct("pc","fullName");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/pc/nav', $this->data);
        $this->load->view('components/pc/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function deletePc() {
        $options = array(
            'title' => 'delete',
            'emit'  => 'Information Successfully Deleted!',
            'btn'   => true
        );

        $this->data['confirmation'] = message($this->action->deleteData('pc', array('id' => $this->input->get('id'))), $options);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);

        redirect('pc/allPc', 'refresh');
    }
}