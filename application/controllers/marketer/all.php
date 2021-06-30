<?php

class All extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'marketer';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="all"';


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function delete() {
        $where = array('id' => $this->input->get('id'));
        // $info = $this->action->update('marketer', ['trash'=>1], $where);
        // if ($info != NULL) {
        //     unlink('./public/upload/marketer/'.$info[0]->img_url);
        // }

        $mess = array(
            'title' => 'delete',
            'emit'  => 'Marketer Successfully Deleted..!',
            'btn'   => true
        );
        $this->data['confirmation'] = message($this->action->update('marketer', ['trash'=>1], $where), $mess);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('marketer/all', 'refresh');
    }
}