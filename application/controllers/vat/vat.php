<?php

class Vat extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target=""';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['getInfo']=$this->action->read('vat'); 
    }
    
    public function index() {

        $this->data['vatInfo']=$this->action->read('vat'); 
    	

        //-------------------------Vat Information Start Here------------------------------
        if ($this->input->post('submit_vat')) {

            $data=array(
                'percentage'=> $this->input->post('percentage'),
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Vat successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('vat', $data), $msg_array);
            redirect('theme/themeSetting');
        }

        if ($this->input->post('update_vat')) {

            $where=array(
                'id'=>$this->input->post('vat_id')
            );

            $data=array(
                'percentage'=> $this->input->post('percentage'),
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Vat successfully Updated",
                "btn"   => true
            );

            $this->data['confirmation'] = message($this->action->update('vat', $data,$where), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect('theme/themeSetting/theme_tools','refresh');

        }
        //-------------------------- Vat Information End Here ----------------------------   


    }

    public function remark() {

        //-------------------------Vat Information Start Here------------------------------
        if ($this->input->post('submit')) {

            $data=array(
                'remark'=> $this->input->post('remark'),
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Remark successfully Saved",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('remark', $data), $msg_array);
            redirect('theme/themeSetting');
        }

        if ($this->input->post('update')) {
            
            $where=array(
                'id'=>$this->input->post('remark_id')
            );

            $data=array(
                'remark'=> $this->input->post('remark'),
            );

            $msg_array = array(
                "title" => "Success",
                "emit"  => "Remark successfully Updated",
                "btn"   => true
            );

            $this->data['confirmation'] = message($this->action->update('remark', $data,$where), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect('theme/themeSetting/theme_tools','refresh');

        }
    }


    
}





        