<?php

class Commission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Commission';
    }

    public function index() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="commission"';
        $this->data['confirmation'] = $this->data['doctorCom'] = null;

        $this->data['allDoctors']=$this->action->read("doctors", ['status'=>1]);

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
                      $where["date >="] = $value;
                    }

                    if($key=="to"){
                      $where["date <="] = $value;
                    }
                }
            }

            $where['type'] = 'referred';

            $this->data['doctorCom'] = $this->action->read('commissions', $where);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/commission', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
}