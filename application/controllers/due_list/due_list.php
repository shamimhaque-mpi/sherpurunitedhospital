<?php

class Due_list extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Due List';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="diagnosis-menu"';
        $this->data['subMenu'] = 'data-target="due_list"';
        
		$this->data['due_list'] = $this->action->read('bills',array('due >'=>0));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/dui_list/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function payment(){
        
        $this->data['active'] = 'data-target="due_list"';

        $this->data['vno'] = $this->input->get('vno');
        $where = array('voucher' => $this->input->get('vno'));

        // get all test
        $this->data['allTestName'] = $this->action->read('investigation'); 
        
        $this->data['doctors'] = $this->action->read('doctors');
        $this->data['billInfo'] = $this->action->read('bills', $where);
        $this->data['pc'] = $this->action->read('pc');
        $this->data['marketers'] = $this->action->read('marketer');

        if ($this->input->post('collection')) {
            
            $data = array(
                "date"           => date('Y-m-d'),
                "time"           => date('h:i:s A'),
                "voucher_number" => $this->input->post('voucher_number'),
                "total_amount"   => $this->input->post('grand_total'),
                "prev_paid"      => $this->input->post('pre_paid'),
                "paid"           => $this->input->post('paid'),
                "due"            => $this->input->post('due'),
                "remission"      => $this->input->post('remission')
            );
            
            $this->action->add("due_payment",$data);
            
            // Update voucher in bills table
            $data = array(
                "due"               => $this->input->post('due'),
                'last_paid'         => $this->input->post('paid'),
                'last_payment_date' => date('Y-m-d')
            );
            $where = array('voucher'=> $this->input->post('voucher_number'));

            $get_record = get_row('bills', $where, ['paid']);
            $previous_amount = (!empty($get_record->paid) ? $get_record->paid : 0);
            $total_paid = ($previous_amount + $this->input->post('paid') + $this->input->post('remission'));

            $data['paid'] =  $total_paid;
            //$this->action->update("bills",$data,$where);

            $options=array(
                "title" =>"update",
                "emit"  =>"Payment Successfully Received!",
                "btn"   =>true
            );

            $this->data['confirmation'] = message("success",$options);
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("due_list/due_list","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/dui_list/payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

}