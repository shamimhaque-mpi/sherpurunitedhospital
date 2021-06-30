<?php

class Diagnosis extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Diagnosis';
        $this->data['active'] = 'data-target="report_menu"';
        $this->data['subMenu'] = 'data-target="diagnosis"';
        $this->data['confirmation'] = null;
        $this->data['report'] = NULL;

        $this->data['testName'] = $this->action->readGroupBy('diagnosis','name');
        $this->data['groupName'] = $this->action->readGroupBy('diagnosis','group');

        if (isset($_POST['show'])) {
            $where = array();
            foreach ($_POST['search'] as $key => $value) {
               if ($value != NULL && $key == 'date_from') {
                   $where['date >='] = $value;
               }

               if ($value != NULL && $key == 'date_to') {
                   $where['date <='] = $value;
               }
            }
            $this->data['report'] = $this->action->read('diagnosis', $where);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        //$this->load->view('components/report/diagnosis', $this->data);
        $this->load->view('components/diagnosis/report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
