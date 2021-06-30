<?php

class Ajax extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }
    
    public function index() {
        
    }
    
    // Get Patient Information
    public function patientInfo($id) 
    {
        $patient = $this->action->read('patients', ['id'=>$id])[0];
        echo json_encode($patient);
    }
    
    // Get Patient Information
    public function parameterInfo($id) 
    {
        $patient = $this->action->read('procedures', ['test_id'=>$id]);
        echo json_encode($patient);
    }
    
    // Get Patient Information
    public function parameterData($id) 
    {
        $parameter = $this->action->read('procedures', ['id'=>$id]);
        echo json_encode($parameter);
    }
}