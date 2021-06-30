<?php
class Speech extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->helper('backup');
        $this->data['db_name']=config_item('my_database');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Speech';
        $this->data['active'] = 'data-target="speech"';
        $this->data['subMenu'] = 'data-target="add-new"';
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/speech/speech', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
  
    
}
