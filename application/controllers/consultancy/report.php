<?php

class Report extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Report';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="consultancy-menu"';
        $this->data['subMenu'] = 'data-target="report"';
        $this->data['report'] = null;
        $this->data['doctors'] = get_result('doctors', [], ['id', 'fullName'], '', 'fullName', 'ASC');

        if(isset($_POST['show'])){
            
          $where = array();
          foreach ($_POST['search'] as $key => $value) {
            if($value != null && $key == "from" ){
              $where['date >='] = $value;
            }

            if($value != null && $key == "to" ){
              $where['date <='] = $value;
            }
          }
          
          if(!empty($_POST['doctor'])){
              $where['doctor'] = $_POST['doctor'];
          }
          $this->data['report'] = $this->action->readGroupBy('consultancies',"pid",$where,"id","asc"); 
        }       

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/consultancy/nav', $this->data);
        $this->load->view('components/consultancy/report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


}