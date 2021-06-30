<?php

class ViewTest extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Test';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="test_menu"';
        $this->data['subMenu'] = 'data-target="add"';

        $where=array("voucher_no"=>$this->input->get('vno'));
        $this->data['info']=$this->action->read("diagnosis",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/test/nav', $this->data);
        $this->load->view('components/test/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    
}