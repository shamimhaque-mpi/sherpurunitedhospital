<?php

class Commission_list extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->data['meta_title'] = 'marketer';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="commission-list"';
        
        // get all marketer
        $this->data['allMarketer'] = get_result('marketer', ['trash' => 0]);
        
        
        $this->data['results'] = $this->search();


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/commission-list', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    private function search(){
        
        $where = ['bills.status' => 'diagnosis', 'marketer.commission >' => 0];
        
        if(isset($_POST['show'])){
            
            if(!empty($_POST['reference_name'])){
                $where['diagnosis.reference_name'] = $_POST['reference_name'];
            }
            
            if(!empty($_POST['date'])){
                foreach($_POST['date'] as $key => $value){
                    if(!empty($value) && $key == 'from'){
                        $where['bills.date >='] = $value;
                    }
                    
                    if(!empty($value) && $key == 'to'){
                        $where['bills.date <='] = $value;
                    }
                }
            }
        }else{
            
            $where['bills.date'] = date('Y-m-d');
        }
        
        $select   = ['bills.date', 'bills.voucher', 'bills.pid', 'bills.grand_total', 'bills.paid', 'bills.due', 'diagnosis.reference_name', 'diagnosis.refereed_doctor', 'marketer.name', 'marketer.mobile', 'marketer.commission'];
        $tableTo  = ['diagnosis', 'marketer'];
        $joinCond = ['bills.id=diagnosis.bill', 'diagnosis.reference_name=marketer.id'];
        
        return get_join('bills', $tableTo, $joinCond, $where, $select, 'bills.voucher');
    }

    
}