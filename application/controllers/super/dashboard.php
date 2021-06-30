<?php
class Dashboard extends Admin_controller{

    function __construct() {
        parent::__construct();
        $this->holder();
        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'dashboard';
        $this->data['active'] = 'data-target="dashboard"';
        $this->data['subMenu'] = 'data-target=""';


        $this->data['totalDue'] = $this->data['totalProduct']  = 0;

        $this->data['patients'] = $this->action->read("patients");

        $this->data['doctors'] = $this->action->read("doctors", ['status'=>1]);
        $this->data['pcDoctors'] = $this->action->read("pc");
        $this->data['employee'] = $this->action->read("employee");
        $this->data['marketer'] = $this->action->read("marketer");
        $this->data['costs'] = $this->action->read("cost", ['date'=>date('Y-m-d')]);
        // $this->data['toIncome'] = $this->action->read("income", ['date'=>date('Y-m-d')]);


        // get total product
        $this->data['totalProduct'] = count($this->action->read('products'));
        // get total due
        $due_list = get_sum('bills',"due", ['date'=>date('Y-m-d')]);
        $this->data['totalDue'] =  $due_list;
        
        $toIncome = $this->action->read_sum('income',"amount", ['date'=>date('Y-m-d')]);
        $this->data['toIncome'] = $toIncome[0]->amount;


        // get total Purchase
        $this->data['totalPurchase'] = $this->action->readGroupBy('purchase',"voucher_no",array("date" => date("Y-m-d")));
        // get total sale
        $this->data['totalSale'] = $this->action->readGroupBy('sale',"voucher_number",array("date" => date("Y-m-d")));
        

        $this->data['today_patients'] = $this->action->read("patients",array('date'=>date("Y-m-d")));
        $this->data['today_consultancy'] = get_result("consultancies",['date'=>date("Y-m-d")], ['id']);
        $this->data['today_operations'] = null;
        $this->data['today_investigation'] = $this->action->read("investigation");
        //$this->data['today_operations'] = $this->action->readGroupBy("patient_operation","patient_id",array('date'=>date("Y-m-d")));
        
		$this->data['today_diagnosis'] = get_join('bills', 'diagnosis', 'bills.id=diagnosis.bill', ['bills.date'=>date('Y-m-d')], 'bills.id', 'bills.voucher');
        $this->data['today_investigation'] = $this->action->read("investigation");
        $this->data['today_total_report'] = $this->action->read("patient_histories",array('DATE(created_at)'=>date("Y-m-d")));
        
        $this->load->view('super/includes/header', $this->data);
        $this->load->view('super/includes/aside', $this->data);
        $this->load->view('super/includes/headermenu', $this->data);
        $this->load->view('super/dashboard', $this->data);
        $this->load->view('super/includes/footer');
    }

    private function holder(){
        if($this->uri->segment(1) != $this->session->userdata('holder')){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
