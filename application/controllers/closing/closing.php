<?php
class Closing extends Admin_Controller {

     function __construct() {
        parent::__construct();
        $this->holder();
        $this->load->model('action');
        $this->data["opening"] = count($this->action->read("closing"));
    }
    
    public function index() {
        $this->data['meta_title'] = 'Category';
        $this->data['active'] = 'data-target="closing-menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        $today = date("Y-m-d");

        //Saving Data Start here
        if ($this->input->post("submit")) {
            $today_opening = $this->input->post("init_balance") + $this->input->post("income");
            $data=array(
                "date"                  =>  $today,
                "opening"               =>  $today_opening,
                "income"                =>  $this->input->post("income"),
                "cost"                  =>  $this->input->post('cost'),
                "salary_cost"           =>  $this->input->post('salarycost'),
                "bank"                  =>  $this->input->post('bank'),
                "hand_cash"             =>  $this->input->post('curr_Cash')
            );
            if ($this->action->exists("closing",array("date"=>$today))) {
                $msg_array=array(
                    'title'=>'update',
                    'emit'=>'Closing Successfully Updated!',
                    'btn'=>true
                 );
                $this->data['confirmation']=message($this->action->update("closing",$data,array("date"=>$today)),$msg_array);
            }else{
                $msg_array=array(
                    'title'=>'Saved',
                    'emit'=>'Closing Successfully Saved!',
                    'btn'=>true
                 );
                $this->data['confirmation']=message($this->action->add("closing",$data),$msg_array);
            }
        }
        //Saving Data End here



        //Previous Hand
        $prev_handCash = 0;
        $last_closing = $this->action->readOrderby("closing","date",array("date !="=>$today),"desc");
        if (count($last_closing)) {
            $prev_handCash = $last_closing[0]->hand_cash;
        }


        //Income start

        $income=0;
        $consultancy = $this->action->readGroupby("consultancy","patient_id",array("date"=>$today));

        foreach ($consultancy as $amount) {
            $income += $amount->paid;
        }

       

       $totalFee = $totalRent = 0;
        $patients= $this->action->readGroupby("patient","patient_id",array("date"=>$today));
        foreach ($patients as $amount) {
            $totalFee += $amount->fee;
            $totalRent += $amount->rent;
        }
        $income += $totalFee + $totalRent; 
        

        $diagnosises = $this->action->readGroupby("diagnosis","voucher_no",array("date"=>$today));
        foreach ($diagnosises as $amount) {
            $income += $amount->paid;
        }

        $patient_operation = $this->action->readGroupby("patient_operation","patient_id",array("date"=>$today));
        foreach ($patient_operation as $amount) {
            $income += $amount->total;
        }

        $where=array(
            "transaction_date"  =>  $today,
            "transaction_type"  => "Debit"
        );
        $bankDR = $this->action->read("transaction",$where);
        foreach ($bankDR as $bdr) {
            $income += $bdr->amount;
        }


        //Income End



        //Cost Start
        $cost = array();       

        $costs = $this->action->read("cost",array("date"=>$today));
        foreach ($costs as $cost_val) {
            $cost[] = $cost_val->amount;
        }

        $salary_cost =array();
        $cost_salary = $this->action->read("salary_records",array("date"=>$today));
         foreach ($cost_salary as $val) {
             $salary_cost[] = $val->amounts;
         }
      
        $bank=array();
        $where=array(
            "transaction_date"  =>  $today,
            "transaction_type"  => "Credit",
            "source"            => "Cash"
        );
        $bankCR = $this->action->read("transaction",$where);
        foreach ($bankCR as $bcr) {
            $bank[] = $bcr->amount;
        }

        // Cost End

        $this->data['income']   = $income;        
        $this->data['pre_Cash'] = $prev_handCash;
        $this->data['cost']     = array_sum($cost);
        $this->data['salary_cost']     = array_sum($salary_cost);
        $this->data['bank']     = array_sum($bank);
        $this->data['curr_Cash']= ($income+$prev_handCash)-($this->data['cost']+$this->data['salary_cost']+ $this->data['bank']);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/closing/nav', $this->data);
        $this->load->view('components/closing/daily', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


    public function report() {
        $this->data['meta_title'] = 'Category';
        $this->data['active'] = 'data-target="closing-menu"';
        $this->data['subMenu'] = 'data-target="report"';
        $this->data['resultset'] = null;

        // search
        if(isset($_POST['search'])) {
            $where = array();
            $opening = $this->getOpeningBalance($this->input->post('date'));

            $where = array(
                "date"          => $this->input->post('date'),
                "opening_type"  => "auto"
            );

            $result = $this->action->read("closing", $where);
            $data = array(
                "opening"   => $opening,
                "income"    => $result[0]->income,
                "cost"      => $result[0]->cost,
                "salary"    => $result[0]->salary_cost,
                "bank"      => $result[0]->bank,
                "cash"      => $result[0]->hand_cash
            );

            $this->data['resultset'] = $data;
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/closing/nav', $this->data);
        $this->load->view('components/closing/report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    private function getOpeningBalance($date) {
        $day = 1;
        $opening = 0.00;

        $date = date_create($date);
        date_sub($date, date_interval_create_from_date_string("$day days"));
        $db_date = date_format($date,"Y-m-d");

        $where = array(
            "date"          => $db_date,
            "opening_type"  => "auto"
        );

        $result = $this->action->read("closing", $where);

        if($result != null) {
            $opening = $result[0]->hand_cash;
        } else {
            $this->getOpeningBalance($db_date);
        }

        return $opening;
    }

    public function opening() {
        $this->data['meta_title'] = 'Category';
        $this->data['active'] = 'data-target="closing-menu"';
        $this->data['subMenu'] = 'data-target="opening"';
        $this->data['confirmation'] = null;

        $where = array("opening_type"=>"menual");

        //Save start
        if ($this->input->post("submit")) {
            $data=array(
                "hand_cash"     => $this->input->post("opening_amount"),
                "opening_type"  => "menual"
            );

            $msg_array=array(
                'title'=>'update',
                'emit'=>'Data Successfully Saved!',
                'btn'=>true
             );
            $this->data['confirmation']=message($this->action->add("closing",$data),$msg_array);
        }
        //Save end
        //Update Start
        if ($this->input->post("update")) {
            $data=array(
                "hand_cash" => $this->input->post("opening_amount")
            );

            $msg_array=array(
                'title'=>'update',
                'emit'=>'Data Successfully Updated!',
                'btn'=>true
             );
            $this->data['confirmation']=message($this->action->update("closing",$data,$where),$msg_array);
        }
        //Update End

        $this->data["opening_val"] = $this->action->read("closing",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/closing/nav', $this->data);
        $this->load->view('components/closing/opening', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    
    private function holder(){  
        if($this->session->userdata('holder') == null){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
