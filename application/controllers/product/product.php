<?php
class Product extends Admin_Controller {

     function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
    }

    public function index() {
        $this->data['meta_title'] = 'Product';
        $this->data['active'] = 'data-target="product-menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;
       

        // insert data into product table
        if ($this->input->post('product_add')) {

            // genarate product code
            $code = productCode('products');

            // data array
            $data = array(
                'date'            => date('Y-m-d'),
                'brand'           => $this->input->post('brand'),
                'category'        => $this->input->post('category'),
                // 'name'            => $this->input->post('product_name'),
                'model'            => $this->input->post('product_code'),
                'code'            => $code,
                'purchase_price'  => $this->input->post('production_cost'),
                'sale_price'      => $this->input->post('sale_price'),
                'remarks'     => $this->input->post('specifition'),
                'unit'            => "pcs",
                'trash'           => "false"
            );
		 
            // conditional array
            $exists_data = array(
                'model'      =>  $this->input->post('product_code'),
                'code'      =>  $code
            );

            // check existence
            if($this->action->exists("products",$exists_data)){
                $options = array(
                    "title" => "warning",
                    "emit"  => "This Product already Exists!",
                    "btn"   => true
                );
              $this->data['confirmation'] = message("warning",$options);
            }else{
                $options = array(
                    "title" => "Success",
                    "emit"  => "Product Successfully Added!",
                    "btn"   => true
                );
            $this->data['confirmation'] = message($this->action->add("products", $data), $options);
           }

            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('product/product','refresh');
        }


        $this->data['allProducts'] = $this->action->read("products", array("trash"=>0));
        $this->data['allBrands'] = $this->action->read("brand", array("trash"=>0));
        $this->data['allcategory'] = $this->action->read("category", array("trash"=>0));

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/product/nav', $this->data);
        $this->load->view('components/product/add', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function allProduct() {
        $this->data['meta_title']   = 'Product';
        $this->data['active']       = 'data-target="product-menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;


        $where = array('trash' => 0);
        $this->data['product'] = $this->action->read('products',$where);


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/product/nav', $this->data);
        $this->load->view('components/product/view-all', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer',$this->data);
    }

    public function edit($id=null) {
        $this->data['meta_title']   = 'Product';
        $this->data['active']       = 'data-target="product-menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;

        $where = array('id' => $id );

        $this->data['products']=$this->action->read("products",$where);
        $this->data['allBrands'] = $this->action->read("brand", array("trash"=>0));
        $this->data['allcategory'] = $this->action->read("category", array("trash"=>0));


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/product/nav', $this->data);
        $this->load->view('components/product/edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function editProduct($id=null){

        $where  = array('id' =>$id);

            // $code = str_replace(' ','_',strtolower(trim($this->input->post('product_name'))));

            // if($this->input->post('product_code') != ''){
            //     $code = str_replace(' ','_',strtolower(trim($this->input->post('product_code'))));
            // }

            $data = array(
                'date'            => date('Y-m-d'),
                'brand'           => $this->input->post('brand'),
                'category'        => $this->input->post('category'),
                // 'name'            => $this->input->post('product_name'),
                'model'            => $this->input->post('product_code'),
                'purchase_price'  => $this->input->post('production_cost'),
                'sale_price'      => $this->input->post('sale_price'),
                'remarks'     => $this->input->post('specifition'),
                'unit'            => "pcs",
            );

        $msg_array=array(
            'title' =>'update',
            'emit'  =>'Product Successfully Updated!',
            'btn'   =>true
         );

        $this->data['confirmation']=message($this->action->update('products',$data,$where),$msg_array);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('product/product/allProduct','refresh');
    }

    public function delete($id = NULL){

        $where = array("id" =>$id);

        $data = array("trash" =>1 );

        $msg_array=array(
            "title" =>"delete",
            "emit"  =>"Product Successfully Deleted",
            "btn"   =>true
        );


        $this->data['confirmation']=message($this->action->deleteData('materials',$where),$msg_array);
        $this->session->set_flashdata("confirmation",$this->data['confirmation']);

        redirect("product/product/allProduct","refresh");
    }


}
