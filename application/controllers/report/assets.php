<?php

class Assets extends Admin_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('action');
    }
    
    public function index(){
        $this->data['meta_title'] = 'Assets Report';
        $this->data['active'] = 'data-target="report_menu"';
        $this->data['subMenu'] = 'data-target="assets"';
        
        // read initial invest from database table
        $records = $this->action->read('opening_balance', array('status' => '1st'));
        $this->data['initial_invest'] = ($records)? $records[0]->initial_invest : 0.00;
        
        
        // read all closing balance.
        $records = $this->action->read_sum('opening_balance', 'closing_amount', array('trash' => 0 ));
        $this->data['closing_amount'] = $records[0]->closing_amount;
        
        // total balance
        $this->data['total'] = $this->data['initial_invest'] + $this->data['closing_amount'];
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        $this->load->view('components/report/assets', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}