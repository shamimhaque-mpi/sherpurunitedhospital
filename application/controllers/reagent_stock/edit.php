<?php

class Edit extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Reagent Stock Edit';
        $this->data['active'] = 'data-target="reagent_stock_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        if(isset($_POST['save'])){
            $this->data['confirmation'] = $this->edit();
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('reagent_stock/reagent/show','refresh');
        }

        $where = array('voucher_no' => $this->input->get('vno'));
        $this->data['info'] = $this->action->read('reagent_stock', $where);



        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent_stock/nav', $this->data);
        $this->load->view('components/reagent_stock/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    private function edit(){

        foreach ($_POST['id'] as $key => $value) {
            $where = array('id' => $_POST['id'][$key]);
            $data = array(
                'reagent'         => $_POST['reagent'][$key],
                'quantity'        => $_POST['quantity'][$key],
                'expire_date'     => $_POST['expire_date'][$key],
            );       
            $this->action->update('reagent_stock', $data, $where);
        }
        
        $options = array(
            'title' => 'SUCCESS',
            'emit'  => 'Purchased item changed successfully!',
            'btn'   => true
        );

        return message('success', $options);
    }

}