<?php

class DeleteTest extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Diagnosis';
    }
   public function index(){
        $options=array(
            'title'=>'delete',
            'emit'=>'Test\'s information successfully Deleted!',
            'btn'=>true
        );
        $where=array("voucher"=>$this->input->get('vno'));
        $billInfo = $this->action->read('bills',$where);

        //delete from diagnosis table
        $this->action->deleteData('diagnosis',array('bill' => $billInfo[0]->id));

        //delete from bills table
        $this->data['confirmation']=message($this->action->deleteData('bills',$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('diagnosis/allPatientDiagnosis','refresh');
    }
}