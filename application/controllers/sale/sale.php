<?php

class Sale extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Sale';
        $this->data['active'] = 'data-target="sale_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        $this->data['voucher_number'] = generate_voucher('sale', array(), $this->data['branch']);

        if(isset($_POST['save'])){
            $this->data['confirmation'] = $this->create();
            //$this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('sale/viewSale?vno=' . $this->input->post('voucher_number'), 'refresh');
        }

        // get all Product
        $this->data['allProduct'] = $this->getAllProduct();
        $this->data['allCodes'] = $this->getAllCodes();

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/sale/add-sale', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    private function getAllCodes(){
        $data = $this->action->read('stock',array('quantity >' => 0));
        return $data;
    }

    private function getAllProduct(){
        $product = $this->action->read_distinct('stock', array(), 'name');
        return $product;
    }

    private function create(){
        foreach ($_POST['product'] as $key => $value) {
            if($_POST['product'][$key] != null){
                $data = array(
                    'date'              => $this->input->post('date'),
                    'time'              => date("h:i:s A"),
                    'voucher_number'    => $this->input->post('voucher_number'),
                    'model'             => $_POST['product'][$key],
                    'code'             => $_POST['code'][$key],
                    'price'             => $_POST['price'][$key],
                    'quantity'          => $_POST['quantity'][$key],
                    'subtotal'          => $_POST['subtotal'][$key],
                    'total'             => $this->input->post('total'),
                    'discount'          => $this->input->post('discount'),
                    'grand_total'       => $this->input->post('grand_total'),
                    'paid'              => $this->input->post('paid'),
                    'due'               => $this->input->post('due'),
                    'name'              => $this->input->post('name'),
                    'mobile'            => $this->input->post('mobile'),
                    'status'            => 'sale'
                );


                if($this->action->add('sale', $data)){
                    $this->handelStock($key);
                }
            }
        }

                $dataD = array(
                    'date'              => $this->input->post('date'),
                    'time'              => date("h:i:s A"),
                    'voucher_number'    => $this->input->post('voucher_number'),
                    'total_amount'      => $this->input->post('grand_total'),
                    'paid'              => $this->input->post('paid'),
                    'due'               => $this->input->post('due'),
                );             
                $this->action->add('due_payment', $dataD);
               
        $options = array(
            'title'=>'success',
            'emit'=>'Product Sale successfully Completed!',
            'btn'=>true
        );

        return message('success', $options);
    }

    private function handelStock($index){
        $where = array();

        $where['code']      = $_POST['code'][$index];

        // get the product stock
        $record = $this->action->read('stock', $where);

        // set the quantity
        $quantity = $record[0]->quantity - $_POST['quantity'][$index];

        $data = array('quantity' => $quantity);
        $this->action->update('stock', $data, $where);
    }

}