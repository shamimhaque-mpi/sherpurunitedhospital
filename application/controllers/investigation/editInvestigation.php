<?php

class EditInvestigation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Investigation';
        $this->data['investigation'] = $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        if(isset($_POST["change"])) {
            $test_name = $this->input->post("test_name").'_'.$this->input->post("group");
            $data = array(
                "group"      => $this->input->post("group"),
                "name"       => $this->input->post("test_name"),
                "test_name"  => $this->input->post("test_name"),
                "test_fee"   => $this->input->post("test_fee"),
				"cost"       => $this->input->post("cost"),
                "room"       => $this->input->post("room"),
                "unit"              => $this->input->post("unit"),
                "reference_value"   => $this->input->post("reference_value")
            );

            $options = array(
                "title" => "Updated",
                "emit"  => "Investigation Information Successfully Changed!",
                "btn"   => true
            );
            
            $where = array('id' => $this->input->get('id'));
            $this->data['confirmation'] = message($this->action->update("investigation", $data, $where), $options);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('investigation/allInvestigation','refresh');   
        }

        $where = array('id' => $this->input->get('id'));
        $this->data['dataset'] = $this->action->read('investigation', $where);

        
        $this->data['group_name']=$this->action->read('group_name');
        $this->data['test_name']=$this->action->read('test_name');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}