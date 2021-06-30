<?php

class Delete_consultancy extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Delete Consultancy';
    }
    public function index(){
        $options=array(
            'title'=>'delete',
            'emit'=>'Consultancy information successfully Deleted!',
            'btn'=>true
        );
        
        $where=array("pid"=>$this->input->get('pid'));
        
        
        $this->data['confirmation']=message($this->action->deleteData('registrations',$where),$options);
        $this->data['confirmation']=message($this->action->deleteData('patients',$where),$options);
        $this->data['confirmation']=message($this->action->deleteData('consultancies',$where),$options);
        $this->data['confirmation']=message($this->action->deleteData('bills',$where),$options);

        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('consultancy/allConsultancy','refresh');
    }
}