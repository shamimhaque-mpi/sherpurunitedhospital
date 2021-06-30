<?php

class Income extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Income';
        $this->data['active'] = 'data-target="report_menu"';
        $this->data['subMenu'] = 'data-target="income"';
        $this->data['records'] = null;

        if(isset($_POST['show'])){
            $where = array();

            $where['date >='] = $_POST['date']['from'];
            $where['date <='] = $_POST['date']['to'];
            $where['status'] = 'income';

            $details = $this->action->read_distinct('journal', $where, 'details');

            foreach ($details as $key => $row) {
                $where['details'] = $row->details;
                $this->data['records'][] = $this->action->readGroupBySum('journal', 'date', $where);
            }
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/report/report-nav', $this->data);
        $this->load->view('components/report/income', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function getDataFromTable($date) {
        $resultset = array();
        $resultset['date'] = $date;

        $where = array("date" => $date);

        // get doc fee
        $result = $this->action->read("consultancy", $where);

        if($result != null) {
            $total = 0.00;

            foreach ($result as $key => $row) {
                $total += $row->grand_total;
            }

            $resultset['doctorFee'] = $total;
        } else {
            $resultset['doctorFee'] = 0.00;
        }

        // get admission fee
        $result = $this->action->read("patient", $where);

        if($result != null) {
            $total = 0.00;

            foreach ($result as $key => $row) {
                $total += $row->fee;
            }

            $resultset['admissionFee'] = $total;
        } else {
            $resultset['admissionFee'] = 0.00;
        }

        // get emergency
        $where = array("date" => $date, "status" => "Emergency");
        $result = $this->action->read("patient", $where);

        if($result != null) {
            $total = 0.00;

            foreach ($result as $key => $row) {
                $total += $row->fee;
            }

            $resultset['emergency'] = $total;
        } else {
            $resultset['emergency'] = 0.00;
        }

        // get Pathology
        $where = array("date" => $date, "fields" => "diagnosis");
        $result = $this->action->read("all_bill", $where);

        if($result != null) {
            $total = 0.00;

            foreach ($result as $key => $row) {
                $total += $row->total;
            }

            $resultset['pathology'] = $total;
        } else {
            $resultset['pathology'] = 0.00;
        }

        // get Operation
        $where = array("date" => $date, "fields" => "operation");
        $result = $this->action->read("all_bill", $where);

        if($result != null) {
            $total = 0.00;

            foreach ($result as $key => $row) {
                $total += $row->total;
            }

            $resultset['operation'] = $total;
        } else {
            $resultset['operation'] = 0.00;
        }

        // get Cabin rent
        $where = array("date" => $date, "fields" => "cabin");
        $result = $this->action->read("all_bill", $where);
        $cabinRent = 0.00;

        if($result != null) {
            foreach ($result as $key => $row) {
                $cabinRent += $row->total;
            }
        }

        // get ward rent
        $where = array("date" => $date, "fields" => "ward-bed");
        $result = $this->action->read("all_bill", $where);
        $wardRent = 0.00;

        if($result != null) {
            foreach ($result as $key => $row) {
                $wardRent += $row->total;
            }
        }

        $resultset['rent'] = $cabinRent + $wardRent;

        // get OX. Ne.
        $where = array("date" => $date, "item_name" => "Oxyzen");
        $result = $this->action->read("bill", $where);

        if($result != null) {
            $total = 0.00;

            foreach ($result as $key => $row) {
                $total += $row->amount;
            }

            $resultset['oxne'] = $total;
        } else {
            $resultset['oxne'] = 0.00;
        }

        return $resultset;
    }

}
