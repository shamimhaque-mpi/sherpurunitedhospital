<?php

class Return_sale extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Return Sale';
        $this->data['active'] = 'data-target="sale_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        if(isset($_POST['save'])){
            $this->data['confirmation'] = $this->change();
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("sale/return_sale?vno=".$_GET['vno']);
        }
       

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/sale/return-sale', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


    private function change(){
        foreach ($_POST['id'] as $key => $value) {
            $where = array('id' => $value);            
            
            $data = array(
                'price'     => $_POST['price'][$key],
                'quantity'  => $_POST['newQuantity'][$key],
                'subtotal'  => $_POST['subtotal'][$key],
                'total'     => $this->input->post('total'),
                'grand_total'     => $this->input->post('grand_total'),
                'paid'      => $this->input->post('paid'),
                'due'       => $this->input->post('due')
            );

            if($this->action->update('sale', $data, $where)){
                $this->handelStock($key);
            }
        }

        $options = array(
            'title' => 'success',
            'emit'  => 'Sale successfully Returned!',
            'btn'   => true
        );

        return message('success', $options);
    }

    private function handelStock($index){
        $where = array(
            'category'      => $_POST['category'][$index],
            'subcategory'   => $_POST['subcategory'][$index],
            'product_name'  => $_POST['product'][$index],
            'godown'        => $_POST['godown'][$index]
        );

        // get the product stock
        $record = $this->action->read('stock', $where);

        // set the quantity
       $quantity = $record[0]->quantity +  $_POST['newQuantity'][$index];
      

        $data = array('quantity' => $quantity);
        $this->action->update('stock', $data, $where);
    }

}