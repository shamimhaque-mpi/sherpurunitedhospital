 <?php

class ViewSale extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }

    public function index() {
        $this->data['meta_title'] = 'Sale';
        $this->data['active'] = 'data-target="sale_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        // conditional array
        $where = array(
            'voucher_number' => $this->input->get('vno')
        );
        
        // read sale table
        $this->data['result'] = $this->action->read('sale', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/sale/view_sale', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}