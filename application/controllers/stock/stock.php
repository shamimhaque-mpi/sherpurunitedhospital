<?php

class Stock extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }

    public function index() {
        $this->data['meta_title']   = 'Stock';
        $this->data['active']       = 'data-target="stock_menu"';
        $this->data['subMenu']      = 'data-target=""';
        $this->data['confirmation'] = null;

        $joinCondition = "stock.code=products.code";
        // read stock table
        $this->data['stockInfo'] = $this->action->joinAndRead('stock','products',$joinCondition, array("stock.quantity > " => 0));
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/stock/stock', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }
}
