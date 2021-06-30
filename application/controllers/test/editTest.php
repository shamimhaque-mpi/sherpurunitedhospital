<?php

class EditTest extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Test';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="test_menu"';
        $this->data['subMenu'] = 'data-target="add"';

        $where = array('voucher_no' => $this->input->get('vno'));

        // get all test
        $this->data['allTestName'] = $this->action->read('investigation'); 
        
        $this->data['doctors'] = $this->action->read('doctors');
        $this->data['diagnosis'] = $this->action->read('diagnosis', $where);
        $this->data['pc'] = $this->action->read('pc');
        $this->data['marketers'] = $this->action->read('marketer');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/test/nav', $this->data);
        $this->load->view('components/test/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function update() {
        if(isset($_POST['delivered'])){
            $this->changeFn('delivered');
        }

        if(isset($_POST['change'])){
            $this->changeFn('pending');
        }
    }

    private function changeFn($status) {
        foreach ($_POST['value_id'] as $key => $value) {
            $data = array(              
                "patient_id"      => $this->input->post("patient_id"),             
                "patient_name"    => $this->input->post("patient_name"),             
                "patient_mobile"  => $this->input->post("patient_mobile"),             
                "date"            => $this->input->post("date"),             
                "delivery_date"   => $this->input->post("deliveryDate"),
                "gender"          => $this->input->post("gender"),
                "age"             => $this->input->post("age"),
                "referred_by"     => $this->input->post("refered_by"),
                "pc"              => $this->input->post("pc"),
                "marketer"        => $this->input->post("marketer"),
                "test_name"       => $_POST["test_name"][$key],
                "test_group"      => $_POST["test_group"][$key],
                "room_no"         => $_POST["room_no"][$key],
                "amount"          => $_POST["amount"][$key],
                "subtotal"        => $this->input->post("subtotal"),
                "vat"             => $this->input->post("vat"),
                "total"           => $this->input->post("total"),
                "discount"        => $this->input->post("discount"),
                "grand_total"     => $this->input->post("grand_total"),
                "paid"            => $this->input->post("paid") +  $this->input->post("payment"),
                "due"             => $this->input->post("due"),
                "status"          => $status
            );

            $where = array('id' => $value);   
            if($this->action->exists("diagnosis", $where)) {      
                $this->action->update("diagnosis", $data, $where); 
            } else {
                $this->action->add("diagnosis", $data);
            }
        }

        $options = array(
            "title" => "update",
            "emit"  => "Patient's Diagnosis info successfully updated!",
            "btn"   => true
        );

        $this->data['confirmation'] = message("success",$options);

        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("test/editTest?vno=" . $this->input->get('vno'), "refresh");
    }



}