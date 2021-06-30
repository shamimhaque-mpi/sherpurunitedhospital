<?php

class PatientReport extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'PatientR eport';
        $this->data['active'] = 'data-target="report_menu"';
        $this->data['subMenu'] = 'data-target="patientReport"';

        $this->data['patient'] = $this->data['income'] = $this->data['costs'] = null;

        //Search query start here-----------------------------
        if(isset($_POST['show'])) { 
            $where = array();

            foreach ($_POST['search'] as $key => $value) {
                if($value != NULL){
                    $where[$key] = $value;
                }
            }

            $this->data['patient'] = $this->action->read('patients', $where);
            $this->data['income'] = $this->action->read('bills', $where);

            $where = array(
                'ref' => 'pid:' . $_POST['search']['pid'],
                'status' => 'cost'
            );

            $this->data['costs'] = $this->action->read('journal', $where);
        } 

        //Search query end here-----------------------------
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        $this->load->view('components/report/patientReport', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
