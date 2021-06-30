<?php

class DrCom extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Doctor Commission';
        $this->data['active'] = 'data-target="report_menu"';
        $this->data['subMenu'] = 'data-target="drCom"';
        $this->data['confirmation'] = $this->data['doctorCom'] = null;

        $this->data['allDoctors']=$this->action->read("doctors", ['status'=>1]);

        if (isset($_POST['show'])) {
            $where = array();

            if($this->input->post('search') != NULL){
                 foreach ($this->input->post('search') as $key => $value) {                    
                        $where[$key] = $value;                  
                  }
            }

            foreach ($this->input->post('payment_date') as $key => $value) {
                if($value != NULL){
                    if($key=="from"){
                      $where["payment_date >="] = $value;
                    }

                    if($key=="to"){
                      $where["payment_date <="] = $value;
                    }
                }
            }

            $where['type'] = 'referred';

            $this->data['doctorCom'] = $this->action->read('commission_payment', $where);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        $this->load->view('components/report/commission', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
