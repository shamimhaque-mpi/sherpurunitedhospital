<?php

class UpdateCommission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Payment Update';
    }


    public function index() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="update"';
        $this->data['confirmation'] = null;
        $this->data['doctors']=$this->action->readDistinct("doctors","fullName");

        if(isset($_POST['change'])){
            // update data
            $where = array(
                'type'        => $this->input->post('type'),
                'person'      => $this->input->post('person')
            );

            $editData = array('balance' => $this->input->post('balance'));

            $options = array(
                "title" => "Success",
                "emit"  => "Information Updated Successfully!",
                "btn"   => true
            );

            $this->data['confirmation'] = message($this->action->update('commission', $editData, $where), $options);

            // add data
            $due = $this->input->post('balance') - ($this->input->post('paid') + $this->input->post('amount'));
            $editData = array(
                'balance'   => $this->input->post('balance'),
                'amount'    => ($this->input->post('paid') + $this->input->post('amount')),
                'due'       => $due,
            );

            $where = array("id" => $this->input->post('payment_id'));
            $this->action->update('commission_meta', $editData, $where);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/update', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


    public function getInfo() {
        // get the incoming object
        $content = file_get_contents("php://input");

        // convart object to array
        $receive = json_decode($content, true);

        // take table name from the array
        $where = $receive['condition'];
        $where['type'] = 'Doctor';

        // get commission
        $cinfo = $this->action->read('commission', $where);

        // get commission last payment
        $lpinfo = $this->action->read_limit('commission_meta', $where, 'desc', 1);

        if($cinfo != null && $lpinfo != null){
            // set result set
            $resultset = array(
                'person'                => $cinfo[0]->person,
                'type'                  => $cinfo[0]->type,
                'balance'               => $cinfo[0]->balance,
                'last_payment_id'       => $lpinfo[0]->id,
                'last_payment_date'     => $lpinfo[0]->payment_date,
                'last_payment_amount'   => $lpinfo[0]->amount
            );
        } else {
            $resultset = array();
        }
        
        echo json_encode($resultset);
    }

}