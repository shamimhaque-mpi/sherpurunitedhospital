<?php

class Opening_balance extends Admin_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('action');
    }
    
    
    public function index(){
        $this->data['meta_title'] = 'Opening Balance';
		$this->data['active']  = 'data-target="opening_balance_menu"';
		$this->data['subMenu'] = 'data-target="balance"';
		
		if(isset($_POST['submit'])){
		    $data = array(
		        'date' => date('Y-m-d', strtotime('-1 day')),
		        'opening_amount' => $_POST['opening_amount'],
		        'initial_invest' => $_POST['initial_invest'],
		        'closing_amount' => $_POST['opening_amount']
		    );
		    
		    // add or update
		    $where = array('status' => '1st');
		    if($this->action->exists('opening_balance', $where)){
		        $status = $this->action->update('opening_balance', $data, $where);
		    }else{
		        $data['status'] = '1st';
		        $status = $this->action->add('opening_balance', $data);
		    }
		    
		    $msg_array = array(
		        'title' => 'Success',
		        'emit' => 'Opening Balance Succesfully Added',
		        'btn' => true
		    );
		    
		    $confirm = message($status, $msg_array);
		    $this->session->set_flashdata('confirmation', $confirm);
		    redirect('opening_balance/opening_balance', 'refresh');
		}
		
		$this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/balance/report_nav', $this->data);
        $this->load->view('components/opening_balance/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}
