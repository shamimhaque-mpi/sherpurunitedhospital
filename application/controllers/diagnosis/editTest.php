<?php

class EditTest extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Diagnosis';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['vno'] = $this->input->get('vno');
        $where = array('voucher' => $this->input->get('vno'));

        // get all test
        $this->data['allTestName'] = $this->action->read('test', ['trash'=>0]); 
        $this->data['doctors'] = $this->action->read('doctors', ['status'=>1]); 
        
        $this->data['doctors']        = $this->action->read('doctors');
        $this->data['billInfo']       = $this->action->read('bills', $where);
        $this->data['pc']             = $this->action->read('pc');
        $this->data['reference']      = $this->action->read('marketer', ['trash'=>0]);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

  public function update(){  

      foreach ($_POST['value_id'] as $key => $value) {
          
        $dataDiagnosis = array(
          "date"            => $this->input->post("date"),
          "delivery"        => $this->input->post("delivery_date"),             
          "reference_name"  => $this->input->post('reference_name'),
          "test_id"         => $_POST["test_id"][$key],
          "group_id"         => $_POST["group_id"][$key],
          // "group"           => $_POST["test_group"][$key],
          // "room"            => $_POST["room_no"][$key],
          // "amount"          => $_POST['amount'][$key], 
          "refereed_doctor" => $this->input->post("refereed_doctor"), 
          'alt_doctor_id'   => $this->input->post('alt_doctor_id'),        
          'alt_doctor_fee'  => $this->input->post('alt_doctor_fee')   
        );
        
        $where = [
            'bill'  => $_POST['billNo']
        ];
        
       $this->action->update("diagnosis", $dataDiagnosis, $where); 
      }   

    // patients add into patients table
    $patientsInfo = array(
        'name'      => $this->input->post("patient_name"), 
        'contact'   => $this->input->post("patient_mobile"), 
        'age'       => $this->input->post("age"), 
        'address'   => $this->input->post("patient_address"), 
        'gender'    => $this->input->post("gender")
    );
   
    $this->action->update('patients',$patientsInfo, ['pid'=>$_POST['patient_id']]); 

    $dataBills = array(
      "date"                  => $this->input->post('date'),
      "subtotal"              => $this->input->post("subtotal"),
      "total"                 => $this->input->post('total'),
      "discount"              => $this->input->post('discount'),
      "less_type"             => $this->input->post('less_type'),
      "grand_total"           => $this->input->post('grand_total'),
      "paid"                  => $this->input->post('paid'),
      "due"                   => $this->input->post('due')
  );
  
  $this->action->update('bills', $dataBills, ['voucher'=>$_POST['voucher'], 'pid'=>$_POST['patient_id']]);
  $options=array(
    "title"=>"update",
    "emit"=>"Patient's Diagnosis info successfully updated!",
    "btn"=>true
  );
  $this->data['confirmation']=message("success",$options);
  $this->session->set_flashdata("confirmation",$this->data['confirmation']);
  redirect("diagnosis/allPatientDiagnosis","refresh");
  }
}