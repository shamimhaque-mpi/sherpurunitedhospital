<?php
class Report extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Report';
    }
    
    public function index(){

        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="report"';
       	$this->data['report'] = NULL;

       	if(isset($_POST['show'])){
            $where = array();
            foreach ($_POST['search'] as $key => $value) {
                if($value != NULL && $key == "date_from"){
                    $where['date >='] = $value;
                }

                if($value != NULL && $key == "date_to"){
                    $where['date <='] = $value;
                }
            }

            $this->data['report'] = $this->action->readGroupBy("patients","pid",$where,"id","asc");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
}

