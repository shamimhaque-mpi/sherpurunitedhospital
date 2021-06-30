<?php

class CommissionPayment extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Payment';
    }

    public function index() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="payment"';
        $this->data['confirmation'] = null;

        $this->data['doctors'] = $this->action->read("doctors", ['status'=>1]);        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function add(){        

       $insertData = array(
            'payment_date'  => date('Y-m-d'),
            'type'          => $this->input->post('type'),
            'person_id'     => $this->input->post('person_id'),
            'balance'       => $this->input->post('balance'),
            'paid'          => $this->input->post('paid'),
            'due'           => $this->input->post('due'),
        );

        $jurnalData = array(
            'date'      => date('Y-m-d'),
            'ref'       => "doctors:" . $this->input->post('person_id'),
            'details'   => "commission",
            'amount'    => $this->input->post('paid'),
            'status'    => "cost",
        );        
       
        $options = array(
            "title" => "Success",
            "emit"  => "Comission Successfully Paid!",
            "btn"   => true
        );

        $this->action->add('journal', $jurnalData);
        $this->data['confirmation'] = message($this->action->add('commission_payment', $insertData), $options);          
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("doctor/CommissionPayment","refresh");
    }

    

    public function calculateComssion() {
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $where = $receive['cond'];
        $table =  $receive['table'];
        

        // get commission
        $doctorCom = $this->action->read($table, $where);

        //get total paid
        $totalPaid = 0.00;
        $paid = $this->action->read('commission_payment', $where);
        if($paid != NULL){
            foreach ($paid as $value) {
                $totalPaid += $value->paid;
            }
        }


        
        $commission = $totalCommission = 0; 

        foreach ($doctorCom as $key => $row) { 
            $bill = 0;        
            $ID = explode(":", $row->ref);

            $doctorInfo = $this->action->read("doctors", array("id" => $row->person_id));
            $regInfo = $this->action->read("registrations", array("id" => $ID[1]));
            $patientInfo = $this->action->read("patients", array("pid" =>  $regInfo[0]->pid));
            $billInfo = $this->action->read("bills", array("pid" =>  $regInfo[0]->pid));

            if ($doctorInfo != null && $billInfo != null && $patientInfo != null) {

                foreach ($billInfo as $key => $row) {
                    $bill += $row->grand_total;
                }

                $commission = round((($bill * $doctorInfo[0]->commission ) / 100),2);
                $totalCommission += $commission;             
                

            }
        } 

        $data = array(
            "total_comission" => $totalCommission,
            "type"            => "referred",
            "total_paid"      => $totalPaid     
        );    
        

        echo json_encode($data);
    }


    public function updateCommission() {
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $where = $receive['condition'];
        $where['type'] = 'Doctor';

        // get commission
        $cinfo = $this->action->read('commission', $where);

        // get commission last payment
        $lpinfo = $this->action->read_limit('commission_meta', $where, 'desc', 1);

        if($cinfo != null && $lpinfo != null){
            // set result set
            $resultset = array(
                'person'                => $cinfo[0]->person,
                'type'                  => $cinfo[0]->type,
                'balance'               => $cinfo[0]->balance,
                'last_payment_id'       => $lpinfo[0]->id,
                'last_payment_date'     => $lpinfo[0]->payment_date,
                'last_payment_amount'   => $lpinfo[0]->amount
            );
        } else {
            $resultset = array();
        }
        

        echo json_encode($resultset);
    }

}