<?php

class Marketer_commision_collect extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');
        $this->data['meta_title'] = 'Marketer';
        $this->data['confirmation'] = null;
    }

    public function index() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="marketer_commision_collect"';
        $this->data['marketer'] = null;

        $this->data['marketer'] = get_result("marketer", ['trash' => 0], ['name', 'id']); 
         
        if(isset($_POST['save'])){
            
            unset($_POST['save']);
            $data = $_POST;
            
            $options = array(
                "title" => "Success",
                "emit"  => "Payment Successfully Paid!",
                "btn"   => true
            );
    
            $this->data['confirmation'] = message($this->action->add('rf_pc_commission_payment', $data), $options);          
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("marketer/marketer_commision_collect","refresh");
        }
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/marketer_commision_collect', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    
    public function all() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="all_payment"';
        $this->data['rf_pc_payment'] = NULL;
        $this->data['marketer'] = get_result("marketer", ['trash' => 0], ['name', 'id']); 
        
        $where = ['date'=>date('Y-m-d')];
        $this->data['rf_pc_payment'] = get_join('rf_pc_commission_payment', 'marketer', 'rf_pc_commission_payment.rf_pc_id=marketer.id', $where, ['rf_pc_commission_payment.*', 'marketer.name']);
        
        if(isset($_POST['show'])) {
            $where = [];
            if(!empty($_POST['rf_pc_id'])){
                $where['rf_pc_commission_payment.rf_pc_id']  =   $_POST['rf_pc_id'];         
            }
            
            foreach ($_POST['date'] as $key => $value) {
                
                if($value != NULL){
                    if($key=="from"){
                      $where["rf_pc_commission_payment.date >="] = $value;
                    }

                    if($key=="to"){
                      $where["rf_pc_commission_payment.date <="] = $value;
                    }
                }
                
            }

            $this->data['rf_pc_payment'] = get_join('rf_pc_commission_payment', 'marketer', 'rf_pc_commission_payment.rf_pc_id=marketer.id', $where, ['rf_pc_commission_payment.*', 'marketer.name']);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/all_payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function edit($id) {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="marketer_commision_collect"';
        
        $this->data['marketer'] = NULL;
        $this->data['rf_pc_commission_payment'] = NULL;
        
        $this->data['marketer'] = get_result("marketer", ['trash' => 0], ['name', 'id']); 
        $this->data['rf_pc_commission_payment'] = get_row('rf_pc_commission_payment', ['id'=>$id]);
         
        if(isset($_POST['update'])){
            
            unset($_POST['update']);
            $data = $_POST;
            
            $options = array(
                "title" => "Success",
                "emit"  => "Payment Successfully Update!",
                "btn"   => true
            );
    
            $this->data['confirmation'] = message($this->action->update('rf_pc_commission_payment', $data, ['id'=>$id]), $options);    
            
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            
            redirect("marketer/marketer_commision_collect/all","refresh");
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/marketer_commision_collect_edit', $this->data);
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
            'ref'       => "marketer:" . $this->input->post('person_id'),
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
        redirect("marketer/cont/payment","refresh");
    }
    
    
    public function delete($id){
        
        $options = array(
            "title" => "Success",
            "emit"  => "Payment Successfully Delete!",
            "btn"   => true
        );
    
        $this->data['confirmation'] = message($this->action->deleteData('rf_pc_commission_payment', ['id'=>$id]), $options);          
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("marketer/marketer_commision_collect/all","refresh");
    }


    public function calculateCommssion() {
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $where = $receive['cond'];
        $table =  $receive['table'];
        

        // get commission
        $marketerCom = $this->action->read($table, $where);

        //get total paid
        $totalPaid = 0.00;
        $paid = $this->action->read('commission_payment', $where);
        if($paid != NULL){
            foreach ($paid as $value) {
                $totalPaid += $value->paid;
            }
        }


        
        $commission = $totalCommission = 0; 

        foreach ($marketerCom as $key => $row) { 
            $bill = 0;        
            $regID = explode(":", $row->ref);

            $marketerInfo = $this->action->read("marketer", array("id" => $row->person_id));
            $regInfo = $this->action->read("registrations", array("id" => $regID[1]));
            $patientInfo = $this->action->read("patients", array("pid" =>  $regInfo[0]->pid));
            $billInfo = $this->action->read("bills", array("pid" =>  $regInfo[0]->pid));

            if ($marketerInfo != null && $billInfo != null && $patientInfo != null) {

                foreach ($billInfo as $key => $row) {
                    $bill += $row->grand_total;
                }

                $commission = round((($bill * $marketerInfo[0]->commission ) / 100),2);
                $totalCommission += $commission;             
                

            }
        } 

        $data = array(
            "total_comission" => $totalCommission,
            "type"            => "marketer",
            "total_paid"      => $totalPaid     
        );    
        

        echo json_encode($data);
    }
    

    public function details() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="details"';

        $this->data['marketerCom'] = null;

        $this->data['allmarketer']=$this->action->read("marketer");

        if (isset($_POST['show'])) {
            $where = array();

            if($this->input->post('search') != NULL){
                 foreach ($this->input->post('search') as $key => $value) {                    
                        $where[$key] = $value;                  
                  }
            }

            foreach ($this->input->post('date') as $key => $value) {
                if($value != NULL){
                    if($key=="from"){
                      $where["payment_date >="] = $value;
                    }

                    if($key=="to"){
                      $where["payment_date <="] = $value;
                    }
                }
            }

            $where['type'] = 'marketer';

            $this->data['marketerCom'] = $this->action->read('commission_payment', $where);
        }

        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/details', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}