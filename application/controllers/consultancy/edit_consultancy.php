<?php

class Edit_consultancy extends Admin_Controller {
 
    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'New Consultancy';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="consultancy-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $where = array("pid" => $this->input->get("pid"));
        
        $this->data["resultset"] = $this->action->read("consultancies", $where);
        $this->data['doctors'] = $this->action->read('doctors', ['status'=>1]);
        $this->data['marketers'] = $this->action->read('marketer');


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/consultancy/nav', $this->data);
        $this->load->view('components/consultancy/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function update() { 
            
            foreach ($_POST['doctor_name'] as $key => $value) {
                if($value != null){
                    $data = array(
                        "doctor" => $_POST['doctor_id'][$key],
                        "room"   => $_POST["room_no"][$key],
                    );
                    $where = [
                        'id'=>$_POST["consultancy_id"][$key],
                        'pid'=>$_POST['patient_id']
                    ];
                    $this->action->update("consultancies", $data, $where);
                    
                }
            }

            $dataBill = array(
                "date"                  => $this->input->post('date'),
                "total"                 => $this->input->post('total'),
                "discount"              => $this->input->post('discount'),
                "grand_total"           => $this->input->post('grand_total'),
                "paid"                  => $this->input->post('paid'),
                "due"                   => $this->input->post('due'),
            );
            
            $patientsInfo = array( 
                'name'      => $this->input->post("patient_name"),  
                'age'       => $this->input->post("age"),  
                'gender'    => $this->input->post("gender"), 
                'contact'    => $this->input->post("patient_mobile"), 
                'guardian'  => 'unset', 
            );
            $this->action->update("patients",$patientsInfo, ['pid'=>$_POST['patient_id']]);
        $this->action->update('bills',$dataBill, ['pid'=>$_POST['patient_id'], 'voucher'=>$_POST['voucher']]);

        $options = array(
            "title" => "Update",
            "emit"  => "Patient's Consultancy info successfully updated!",
            "btn"   => true
        );

        $this->data['confirmation'] = message("success", $options);
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);

        redirect("consultancy/edit_consultancy?id=".$_POST['patient_id'], "refresh");
    }

}