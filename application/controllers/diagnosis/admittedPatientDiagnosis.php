<?php

class AdmittedPatientDiagnosis extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Diagnosis';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="admitted"';
        
        // get all test
        $this->data['allTestName'] = $this->action->read('investigation');  

        $this->data['voucher_number']=generate_voucher('diagnosis',array(),$this->data['branch'],"A");
        $this->data['doctor'] = $this->action->read('doctors');
        $this->data['marketer'] = $this->action->read('marketer');
        $this->data['pid'] = patient_id("patient", "I");      

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/admitted', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function add() {
        foreach ($_POST['test_name'] as $key => $value) {
            $data = array(
                "patient_id"      =>$this->input->post("patient_id"),
                "voucher_no"      =>$this->input->post("voucher_number"),
                "patient_name"    =>$this->input->post("patient_name"),
                "patient_mobile"  =>$this->input->post("patient_mobile"),
                "date"            =>$this->input->post("date"),
                "delivery_date"   =>$this->input->post("deliveryDate"),
                "gender"          =>$this->input->post("gender"),
                "age"             =>$this->input->post("age"),
                "referred_by"     =>$this->input->post("referred_by"),
                "pc"              =>$this->input->post("pc"),
                "marketer"        =>$this->input->post("marketer"),
                "test_name"       =>$value,
                "test_group"      =>$_POST["test_group"][$key],
                "room_no"         =>$_POST["room_no"][$key],
                "amount"          =>$_POST["amount"][$key],
                "subtotal"        =>$this->input->post("subtotal"),
                "vat"             =>$this->input->post("vat"),
                "total"           =>$this->input->post("total"),
                "discount"        =>$this->input->post("discount"),
                "grand_total"     =>$this->input->post("grand_total"),
                "paid"            =>$this->input->post("paid"),
                "due"             =>$this->input->post("due"),
                "type"            =>"Admitted",
            );

           $this->action->add("diagnosis",$data); 
        }

        $options = array(
            "title" => "success",
            "emit"  => "Admitted Patient's Diagnosis info successfully saved!",
            "btn"   => true
        );

        $this->data['confirmation']=message("success",$options);
        $this->session->set_flashdata("confirmation",$this->data['confirmation']);

        $this->billingInfo($this->input->post("patient_id"), "diagnosis", $this->input->post("grand_total"));
        redirect("diagnosis/viewTest?vno=".$this->input->post("voucher_number"),"refresh");
    }

    public function billingInfo($pid, $field, $total){
        // $fields = config("fields");

        $data = array(
            "date"          => date('Y-m-d'),
            "patient"       => $pid,
            "fields"        => $field,
            "description"   => "Some description",
            "total"         => $total
        );

        $this->action->add("all_bill", $data);
    }

}