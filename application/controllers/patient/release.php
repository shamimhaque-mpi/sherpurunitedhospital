<?php

class Release extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Report';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="release"';
        
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
  
        }
              
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/release', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);

    }


}