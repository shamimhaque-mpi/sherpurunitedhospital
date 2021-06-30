<?php

class Profit_report extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title']   = 'Income';
        $this->data['active']       = 'data-target="report_menu"';
        $this->data['subMenu']      = 'data-target="profit"';
        $this->data['records']      = null;
        
        
        if ($_POST) {
            foreach ($_POST['date'] as $key => $value) {
                if($value != NULL && $key == "from"){
                    $where_dia['diagnosis.date >='] = $value;
                    $where['date >='] = $value;
                    $this->data['from'] = $value;
                }

                if($value != NULL && $key == "to"){
                    $where_dia['diagnosis.date <='] = $value;
                    $where['date <='] = $value;
                    $this->data['to'] = $value;
                }
            }
            
        }else{
            $where_dia      = ['diagnosis.date' => date('Y-m-d')];
            $where          = ['date'=>date('Y-m-d')];
            
            $this->data['from'] = date('Y-m-d');
            $this->data['to']   = date('Y-m-d');
        }
        
        $this->data['all_due'] = $this->get_due($where, $where_dia);
        
        $this->data['patient_admissions'] = get_result('patient_admission', array_merge(['trash'=>0, 'paid >'=>0], $where));
        $this->data['all_bills'] = get_join('cost_bill', 'cost_bill_items', 'cost_bill.voucher=cost_bill_items.voucher', $where, 'SUM(cost_bill_items.total) as total_amount, cost_bill_items.voucher, cost_bill.date', 'cost_bill_items.voucher');
        
        $this->data['allTest'] = get_join('diagnosis', ['patients', 'bills'], ['diagnosis.pid = patients.pid', 'diagnosis.pid = bills.pid'], $where_dia, ['diagnosis.*', 'patients.name as patient_name', 'bills.paid', 'bills.voucher'], 'bills.voucher');
        $this->data['due_payments'] = $this->action->read('due_payment', $where);
        
        $this->data['altra_doctor_payment'] = get_join('altra_doctor_payment', 'doctors', 'altra_doctor_payment.doctor_id=doctors.id', $where, ['altra_doctor_payment.*', 'doctors.fullName']);
        $this->data['rf_pc_payment']        = get_join('rf_pc_commission_payment', 'marketer', 'rf_pc_commission_payment.rf_pc_id=marketer.id', $where, ['rf_pc_commission_payment.*', 'marketer.name']);
        $this->data['doctor_payment']       = get_join('doctor_payment', 'doctors', 'doctor_payment.doctor_id=doctors.id', $where, ['doctor_payment.*', 'doctors.fullName']);
        $where['cost.trash'] = '0';
        $this->data['allCost']              = $this->action->joinAndRead('cost', 'cost_field', 'cost.cost_field = cost_field.code', $where);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        $this->load->view('components/report/profit_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    private function get_due($where, $where_dia){
        $due_list = [];
        
        $first_table  = get_result('patient_admission', array_merge(['trash'=>0, 'due >'=>0], $where));
        
        $table_to   = ['patients', 'bills'];
        $join_condi = ['diagnosis.pid = patients.pid', 'diagnosis.pid = bills.pid'];
        $select     = ['diagnosis.*', 'patients.name as patient_name', 'bills.paid', 'bills.voucher', 'bills.due'];
        
        $where_diagnosis = array_merge(['bills.due > '=>0], $where_dia);
        $second_table    =  get_join('diagnosis', $table_to, $join_condi, $where_diagnosis, $select, 'bills.voucher');
        
        $index = 0;
        foreach($second_table as $key=>$value){
            $repayment = get_result('due_payment', ['voucher_number'=>$value->voucher], 'SUM(paid + remission) as total', 'voucher_number');
            if($repayment){
                if(($value->due - $repayment[0]->total) > 0){
                    $due_list[$index]['date']     = $value->date;
                    $due_list[$index]['voucher']  = $value->voucher;
                    $due_list[$index]['due']      = ($value->due - $repayment[0]->total);
                    $index++;
                }
            }
        }
        foreach($first_table as $key=>$value){
            $due_list[$index]['date']     = $value->date;
            $due_list[$index]['voucher']  = "Patient Admission (".$value->name.")";
            $due_list[$index]['due']      = ($value->due);
            $index++;
        }
        return $due_list;
    }
}