<?php
class Payment extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'payment';
    }
    
    public function index(){

        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="payment"';
        $this->data['confirmation'] = null;
    
        if ($this->input->post("submit")) {
            $data=array(
                "date"     =>  $this->input->post("date"),
                "pid:123456"     =>  $this->input->post("patient_id"),
                "paid"           =>  $this->input->post("paid")
            );

            $msg_array=array(
                "title"=>"Success",
                "emit"=>"Successfully Saved",
                "btn"=>true
            );

            $this->data['confirmation']=message($this->action->add("journal",$data), $msg_array);   
        }
       
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
}