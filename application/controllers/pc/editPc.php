<?php

class EditPc extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'pc';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="pc-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        if ($this->input->post("change")) {
            $data = array(
                "fullName"      => $this->input->post("fullname"),
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
            
            $where = array("id" => $this->input->get('id'));
            $this->data['confirmation'] = message($this->action->update("pc", $data, $where), $options);
        }

        // get data from database
        $where = array("id" => $this->input->get('id'));
        $this->data['result'] = $this->action->read('pc', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/pc/nav', $this->data);
        $this->load->view('components/pc/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}