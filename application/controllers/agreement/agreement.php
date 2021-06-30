<?php

class Agreement extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'profile';
        $this->data['active'] = 'data-target="agreement_menu"';
        $this->data['subMenu'] = 'data-target=""';
    }
    
    public function index() {     

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);     
        $this->load->view('components/agreement/agreement', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

     public function agreemet_paper() {  
        $this->data['info'] = null;

        $where=array("patient_id"=>$this->input->get('pid'));
        $this->data['info'] = $this->action->read("patient",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);       
        $this->load->view('components/agreement/agreemet_paper', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

      public function agreemet_paperb() {
        $this->data['info'] = null;
        
        $where=array("patient_id"=>$this->input->get('pid'));
        $this->data['info'] = $this->action->read("patient",$where);    

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
       
        $this->load->view('components/agreement/agreemet_paperb', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    
}