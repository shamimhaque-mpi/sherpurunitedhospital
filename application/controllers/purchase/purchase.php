<?php

class Purchase extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Purchase';
        $this->data['active'] = 'data-target="purchase_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        // get all category
        $this->data['allCategory'] = $this->getAllCategory();


        // save purchase data
        if(isset($_POST['save'])){
           $this->data['confirmation']=$this->savePurchaseRecord($_POST['subcategory']);
           $this->session->set_flashdata('confirmation', $this->data['confirmation']);
           redirect('purchase/purchase','refresh');
        } 
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/purchase-nav', $this->data);
        $this->load->view('components/purchase/add-purchase', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    private function savePurchaseRecord($products = array()) {
        foreach ($products as $key => $value) {
            $data = array(
                'date'            => $this->input->post('date'),
                'voucher_no'      => $this->input->post('voucher_number'),
                'category'        => $_POST['category'][$key],
                'subcategory'     => $_POST['subcategory'][$key],
                'brand'           => $_POST['brand'][$key],
                'product_name'    => $value,     
                "code"            => $_POST['code'][$key],                
                'purchase_price'  => $_POST['price'][$key],
                'quantity'        => $_POST['quantity'][$key],
                'discount'        => $_POST['discount'][$key],
                'subtotal'        => $_POST['subtotal'][$key],
                'total'           => $this->input->post('total'),
                'total_discount'  => $this->input->post('total_discount'),
                'transport_cost'  => $this->input->post('transport_cost'),
                'grand_total'     => $this->input->post('grand_total'),
                'paid'            => $this->input->post('paid'),
                'due'             => $this->input->post('due'),
                'status'          => "available"
            );       

            if($this->action->add('purchase', $data)){
                $this->handelStock($key);
            }
            
             $cond = array(
              "code" => $_POST['code'][$key]           
            );
            
            $this->action->update("products",array("purchase_price" => $_POST['price'][$key]),$cond);
            
        }
        
        $options = array(
            'title'=>'success',
            'emit'=>'Product Purchase successfully Completed!',
            'btn'=>true
        );

        return message('success', $options);
    }

    private function handelStock($index) {
        $where = array();
        $stockWhere = array();

        $where['code'] = $_POST['code'][$index];
        
        // get the product info for sale
        $productInfo = $this->action->read('products',$where);

        $sell_price = ($productInfo != null) ? $productInfo[0]->sale_price : 0;
        $code = $productInfo[0]->code;

        // get stock info
        $stockWhere['code'] = $code;
        $record = $this->action->read('stock', $stockWhere);
        // set the quantity
        $quantity = ($record != null) ? ($record[0]->quantity + $_POST['quantity'][$index]): $_POST['quantity'][$index];

        // check the product update or insert
        if($record != null){
            $data = array('quantity' => $quantity);
            $this->action->update('stock', $data, $stockWhere);
        } else {
            $data = array(
                'code'          => $code,
                'name'         => $productInfo[0]->model,
                'purchase_price'=> $_POST['price'][$index],
                'quantity'      => $quantity,
                'sell_price'    => $sell_price,
            );

            $this->action->add('stock', $data);
        }
    }

    private function getAllCategory(){
        $category = $this->action->read('category');
        return $category;
    }


    public function show_purchase() {
        $this->data['meta_title'] = 'Purchase';
        $this->data['active'] = 'data-target="purchase_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['result'] = null;

        $this->data['allBrands'] = $this->action->read("brand", array("trash"=>0));
        // read purchase table
        //$this->data['result'] = $this->action->readGroupBy('purchase', 'voucher_no');
        if(isset($_POST['show'])){
            $where = array();

                foreach($_POST['search'] as $key => $val){
                    if(!empty($val)){
                        $where[$key] = $val;
                    }
                }

            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where['date >='] = $val;
                }

                if($val != null && $key == 'to'){
                    $where['date <='] = $val;
                }
            }
            $this->data['result'] = $this->action->readGroupBy('purchase', 'voucher_no', $where);
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/purchase-nav', $this->data);
        $this->load->view('components/purchase/show-purchase', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function view() {
        $this->data['meta_title'] = 'Purchase';
        $this->data['active'] = 'data-target="purchase_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $where = array('voucher_no' => $this->input->get('vno'));
        $this->data['info'] = $this->action->read('purchase', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/purchase/purchase-nav', $this->data);
        $this->load->view('components/purchase/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

public function delete_purchase(){
    $where = array('voucher_no' => $this->input->get('vno'));
    $purchaseInfo = $this->action->read('purchase', $where);  

    foreach ($purchaseInfo as $key => $value) {

        // set condition for every item
        $stockWhere = array(
            "code"           => $value->code,
        );  

        // get stock information
        $stockInfo = $this->action->read('stock', $stockWhere);

        // caltulate new quantity
        if($stockInfo != null){
            $quantity = $stockInfo[0]->quantity - $purchaseInfo[$key]->quantity;
            $data = array('quantity' => $quantity);

            // update the stock
            $this->action->update('stock', $data, $stockWhere);
        }
    }
   
    // delete row
    $response = $this->action->deleteData('purchase', $where);

    $options = array(
        'title' => 'warning',
        'emit'  => 'Purchase and Stock delete successfully!',
        'btn'   => true
    );

    $this->session->set_flashdata('confirmation', message($response, $options));
    redirect('purchase/purchase/show_purchase', 'refresh'); 
}


}