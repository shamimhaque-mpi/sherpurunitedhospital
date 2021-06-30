<?php
class Items extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Bill';
        $this->data['active']     = 'data-target="bill_menu"';
    }
    
    public function index() {
        $this->data['subMenu']  = 'data-target="all-items"';
        
        $this->data['items'] = get_result('items', ['trash'=>0]);
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/all_items', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function add() {
        $this->data['subMenu']  = 'data-target="add-items"';
        
        if($_POST){
            save_data('items', $_POST);
            $options = array(
                "title" => "Success",
                "emit"  => "Data Successfully Saved",
                "btn"   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
        }
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/add_items', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function edit($id) {
        $this->data['subMenu']  = 'data-target="add-items"';
        
        if($_POST){
            save_data('items', $_POST, ['id'=>$id]);
            $options = array(
                "title" => "Success",
                "emit"  => "Data Successfully Updated",
                "btn"   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            redirect('bill/items', 'refresh');
        }
        
        $this->data['item'] = get_result('items', ['id'=>$id])[0];
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/edit_item', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function delete($id){
        save_data('items', ['trash'=>1], ['id'=>$id]);
        
        $options = array(
            "title" => "Success",
            "emit"  => "Data Successfully Deleted",
            "btn"   => true
        );
        $this->session->set_flashdata('confirmation', message('success', $options));
        
        redirect('bill/items', 'refresh');
    }
}