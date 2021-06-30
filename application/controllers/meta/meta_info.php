<?php

class Meta_info extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Meta';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="meta-menu"';
        $this->data['subMenu'] = 'data-target="meta"';
        $options = array();
        $status = "";

        if(isset($_POST['create'])) {
            foreach ($_POST['metadata'] as $key => $value) {
                $where = array("meta_key" => $key);
                $info = $this->action->read('meta_info', $where);

                if($info != null) {
                    $data = array("meta_value" => $value);
                    $status = $this->action->update("meta_info", $data, $where);
                    $options['title'] = "Update";
                    $options['emit'] = "Metadata Update Successfully!";
                } else {
                    $data = array(
                        "meta_key" => $key,
                        "meta_value" => $value
                    );
                    $status = $this->action->add("meta_info", $data);
                    $options['title'] = "Success";
                    $options['emit'] = "New Metadata Successfully Added!";
                }

                $options['btn'] = true;

                $confirmation = message($status, $options); 
                $this->session->set_flashdata("confirmation", $confirmation); 

                redirect("meta/meta_info", "refresh"); 
            }
            
        }

        $this->data['resultset'] = $this->action->read('meta_info');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/meta/meta', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

}