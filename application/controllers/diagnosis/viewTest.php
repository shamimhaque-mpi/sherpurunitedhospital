<?php

class ViewTest extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->model('retrieve');
        $this->data['meta_title'] = 'Diagnosis';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $where=array("voucher"=>$this->input->get('vno'));
        $this->data['info']=$this->action->read("bills",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    
}