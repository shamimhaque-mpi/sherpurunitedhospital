<?php

class Add extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'marketer';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="add"';

        if(isset($_POST['market_add']))
        {
            $data = array(
                "create_at"      => date('y-m-d'),
                "name"           => $this->input->post('name'),
                "mobile"         => $this->input->post('mobile'),
                "commission"     => $this->input->post('commission'),
                "address"        => $this->input->post('address'),
            );
            
            if ($_FILES["attachFile"]["name"] != null && $_FILES["attachFile"]["name"] != "" ) {

                $config['upload_path']     = './public/upload/marketer';
                $config['allowed_types']   = 'png|jpeg|jpg|gif';
                $config['max_size']        = '4096';
                $config['max_width']       = '3000';
                $config['max_height']      = '3000';
                $config['file_name']       = str_shuffle("marketer_".rand(100000,999999));
                $config['overwrite']       = true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data = $this->upload->data();
                    $image = $upload_data['file_name'];
                    
                    $data["img_url"] = $image;
                } 
            }
            

            $options = array(
                "title"=>"Success",
                "emit"=>"New Marketer Successfully Saved",
                "btn"=>true
            );
    
            $this->data['confirmation'] = message($this->action->add("marketer", $data), $options);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


}