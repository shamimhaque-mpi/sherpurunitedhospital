<?php

class view_consultancy extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'New Consultancy';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="consultancy-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $where=array("consultancy_no"=>$this->input->get('cid'));
        $this->data['info']=$this->action->read("consultancy",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/consultancy/nav', $this->data);
        $this->load->view('components/consultancy/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}