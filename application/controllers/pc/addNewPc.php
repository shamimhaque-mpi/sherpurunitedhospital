<?php

class AddNewPc extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'pc';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="pc-menu"';
        $this->data['subMenu'] = 'data-target="add"';

        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|min_length[11]|is_unique[employee.mobile]');
        $this->form_validation->set_rules('fullName', 'Name', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim');

        if ($this->input->post("add_pc")) {
            if($this->form_validation->run() == FALSE){
                $options = array(
                    "title" => "Error",
                    "emit"  => validation_errors(),
                    "btn"   => true
                );

                $this->data['confirmation']=message("warning", $options);
            } else {
                $data = array(
                    "fullName"      => $this->input->post("fullName"),
                    "mobile"        => $this->input->post("mobile"),
                    "commission"    => $this->input->post("commission"),
                    "address"       => $this->input->post("address")
                );

                if ($_FILES["attachFile"]["name"] != null or $_FILES["attachFile"]["name"] != "" ) {
                    $config['upload_path']      = './public/upload/pc';
                    $config['allowed_types']    = 'png|jpeg|jpg|gif';
                    $config['max_size']         = '4096';
                    $config['max_width']        = '3000'; /* max width of the image file */
                    $config['max_height']       = '3000';
                    $config['file_name']        = "patent-collector-" . strtotime('now'); 
                    $config['overwrite']        = true;   
                    
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload("attachFile")){
                        $upload_data = $this->upload->data();
                        $data["image"] = "public/upload/pc/".$upload_data['file_name'];
                    } else {
                        $options = array(
                            "title" => "Error",
                            "emit"  => $this->upload->display_errors(),
                            "btn"   => true
                        );

                        $this->data['confirmation'] = message("warning", $options);
                    }
                }

                $options = array(
                    "title" => "Success",
                    "emit"  => "New Doctors Successfully Saved",
                    "btn"   => true
                );
                
                $this->data['confirmation'] = message($this->action->add("pc", $data), $options);   
            }
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/pc/nav', $this->data);
        $this->load->view('components/pc/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}