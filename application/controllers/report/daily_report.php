<?php
class daily_report extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

        $this->data['meta_title'] = 'Daily Report';
        $this->data['active']     = 'data-target="daily_report_menu"';
    }

    public function index(){

        $where = array('date' => date("Y:m:d"));
        $where2 = array('payment_date' => date("Y:m:d"));

        if(isset($_POST['show'])) {
                $where = array('date' => $this->input->post('date'));
                $where2 = array('payment_date' => $this->input->post('date'));
            }


        $this->data['records'] = $this->action->read('bills', $where);
        $this->data['staff_records'] = $this->action->read_sum('salary_records','amounts', $where);
        $this->data['cost_records'] = $this->action->read_sum('cost','amount', $where);
        $this->data['doctor_records'] = $this->action->read_sum('commission_payment','balance', $where2);


        // print_r($this->data['doctor_records']);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/daily_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }



 }
