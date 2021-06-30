<?php

class AllInvestigation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Investigation';
        $this->data['investigation'] = $this->data['confirmation'] = null;
    }

    public function index() {
        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


    public function deleteInvestigation() {
        $options = array(
            'title' => 'delete',
            'emit'  => 'Information Successfully Deleted!',
            'btn'   => true
        );

        $this->data['confirmation'] = message($this->action->deleteData('investigation', array('id' => $this->input->get('id'))), $options);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);

        redirect('investigation/allInvestigation', 'refresh');
    }
}