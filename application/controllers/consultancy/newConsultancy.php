<?php

class NewConsultancy extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->data['meta_title'] = 'New Consultancy';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="consultancy-menu"';
        $this->data['subMenu'] = 'data-target="add"';
        $this->data['patient_idInfo'] = null;
       
        $this->data['doctors'] = $this->action->read('doctors', ['status'=>1]);
        $this->data['pid'] = $this->input->get('pid');
        $this->data['voucher'] = generate_voucher('bills');
        
        $this->data['marketer'] = $this->action->read("marketer", ['trash'=>0]);
        $this->data['patient_idInfo'] = $this->action->read('patients');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/consultancy/nav', $this->data);
        $this->load->view('components/consultancy/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
 
    public function add(){
        $id = $this->addToBill();
        $this->addToJournal();

        foreach ($_POST['doctors'] as $key => $value) {
            if($value != null){
                $data = array(
                    "date"   => $this->input->post("date"),
                    "pid"    => $this->input->post("pid"),
                    'reference_name'     => $this->input->post("reference_name"),
                    "doctor" => $value,
                    "room"   => $_POST["room"][$key],
                    "bill"   => $id
                );

                $this->action->add("consultancies", $data);
            }
        }


        // $admissionData = array(
        //     "date"      => $this->input->post('date'),
        //     "pid"       => $this->input->post('pid'),
        //     "guardian"  => 'unset',
        //     "seat"      => "0",
        //     "bill"      => 0,
        //     "status"    => "admitted"
        // );

        // patients add/update into patients table and registrations table
        $patientsInfo = array(
            'pid'       => $this->input->post("pid"), 
            'name'      => $this->input->post("patient_name"), 
            'contact'   => $this->input->post("contact_number"), 
            'age'       => $this->input->post("age"), 
            'address'   => $this->input->post("address"), 
            'gender'    => $this->input->post("gender"), 
            'guardian'  => 'unset', 
        );
        $patientsRegInfo = array(
            'pid'       => $this->input->post("pid"), 
            'type'      => "consultancy", 
            'status'    => "consultancy", 
        );
        $patientsInfo['date'] = $this->input->post("date");
        $patientsRegInfo['date'] = $this->input->post("date");
       // $admissionData['date'] = $this->input->post("date");

        if($this->action->exists("patients",array("pid" => $this->input->post("pid")))){
            $this->action->update("patients",$patientsInfo,array("pid" => $this->input->post("pid")));
            $this->action->update("registrations",$patientsRegInfo,array("pid" => $this->input->post("pid")));
            //$this->action->update("admissions",$admissionData,array("pid" => $this->input->post("pid")));
        }else{
            $this->action->add("patients",$patientsInfo);
            $this->action->add("registrations",$patientsRegInfo);
           // $this->action->add("admissions",$admissionData);
        }
       
        // end patients and registrations



        $options = array(
            "title" => "success",
            "emit"  => "New Consultancy info successfully saved!",
            "btn"   => true
        );



        $this->data['confirmation'] = message("success", $options);
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("consultancy/newConsultancy/voucher?pid=".$this->input->post("pid"), "refresh");
    }

    private function addToBill() {
        $data = array(
            "date"                  => $this->input->post('date'),
            "voucher"               => $this->input->post('voucher'),
            "pid"                   => $this->input->post('pid'),
            "title"                 => "consultancy",
            "details"               => "",
            "total"                 => $this->input->post('total'),
            "discount"              => $this->input->post('discount'),
            "grand_total"           => $this->input->post('grand_total'),
            "paid"                  => $this->input->post('paid'),
            "due"                   => $this->input->post('due'),
            "last_paid"             => $this->input->post('paid'),
            "last_payment_date"     => $this->input->post('date'),
        );

        $id = $this->action->addAndGetInsertedID('bills', $data);
        return $id; 
    }
 
    private function addToJournal() {
        $where = array('pid' => $this->input->post('pid'));
        $regInfo = $this->action->read('registrations', $where);

        if ($regInfo != null) {
            $data['ref'] = $regInfo[0]->id;
        }else{
            $data['ref'] = $this->input->post('pid');
        }


        $data = array(
            "date"       => $this->input->post('date'),
            "details"    => 'consultancy',
            "amount"     => $this->input->post('paid'),
            "status"     => 'income'
        );

        $this->action->addAndGetInsertedID('journal', $data);
        return true;
    }

    public function voucher() {
        $this->data['active'] = 'data-target="consultancy-menu"';
        $this->data['subMenu'] = 'data-target="voucher"';

        $where = array('pid' => $this->input->get("pid"));
        $this->data['info'] = $this->action->read('consultancies', $where);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/consultancy/nav', $this->data);
        $this->load->view('components/consultancy/voucher', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}


