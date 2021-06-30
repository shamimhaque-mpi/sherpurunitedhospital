<?php

class referral_commission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Diagnosis';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="com"';
        $this->data['reference'] = NULL;

        $where = array();
        $wherePay = [];
        $this->data['reference'] = $this->action->read("marketer", ['trash' => 0]);

        if(isset($_POST['search'])){
          foreach ($_POST['search'] as $key => $value) {
            if($value != null && $key == "from" ){
              $where['bills.date >='] = $value;
              $wherePay['date >='] = $value;
            }

            if($value != null && $key == "to" ){
              $where['bills.date <='] = $value;
              $wherePay['date <='] = $value;
            }
          }
        }
        else{
             $where['bills.date'] = date('Y-m-d');
        }

        if(!empty($_POST['reference_name'])){
          $where['diagnosis.reference_name'] = $_POST['reference_name'];
          
          $wherePay['rf_pc_id'] = $_POST['reference_name'];
          $this->data['sum'] = get_sum('rf_pc_commission_payment', 'payment', $wherePay); 
        }
        
        $select = [
            "patients.name AS patient_name",
            "patients.pid",
            "bills.less_type",
            "bills.subtotal",
            "bills.total",
            "bills.grand_total",
            "bills.paid",
            "bills.date",
            "marketer.commission",
            "marketer.name AS marketer_name" ,
            "diagnosis.reference_name"
        ];
        
        $tableTo    = ['diagnosis', 'patients', 'marketer'];
        $join_condi = [
            'bills.pid = diagnosis.pid', 
            'bills.id = diagnosis.bill', 
            'patients.pid = diagnosis.pid', 
            'diagnosis.reference_name = marketer.id'
        ];
        
        $this->data['result'] = get_join('bills', $tableTo, $join_condi, $where, $select, 'diagnosis.pid');
        
         //dd($this->data['result']);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/diagnosis/nav', $this->data);
        $this->load->view('components/diagnosis/referral_commission', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}