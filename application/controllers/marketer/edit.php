<?php

class Edit extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'marketer';
        $this->data['confirmation'] = null;
    }
    
    public function index() {
        $this->data['active'] = 'data-target="marketer-menu"';
        $this->data['subMenu'] = 'data-target="edit"';
        $where = array('id' => $this->input->get('id'));

        $this->data['marketers'] = $this->action->read('marketer', $where);
       
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marketer/nav', $this->data);
        $this->load->view('components/marketer/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit_marketer (){
        $where = array('id' => $this->input->get('id'));
        $image = null;

        if (isset($_POST['update'])) {

            if($_FILES["attachFile"]["name"] != null && $_FILES["attachFile"]["name"] != ""){
                $config['upload_path'] = './public/upload/marketer';
                $config['allowed_types'] = 'png|jpeg|jpg|gif';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000';
                $config['file_name'] = $this->input->post('pic');
                $config['overwrite']=true; 

                $this->upload->initialize($config);

                if ($this->upload->do_upload("attachFile")) {
                    $upload_data = $this->upload->data();
                    $image = $upload_data['file_name'];
                }
            }
            if ($image != null) {
                
                $data = array(
                    "name"           => $this->input->post('name'),
                    "mobile"         => $this->input->post('mobile'),
                    "commission"     => $this->input->post('commission'),
                    "address"        => $this->input->post('address'),
                    "img_url"        => $image
                );
            }else{
                $data = array(
                   "name"           => $this->input->post('name'),
                    "mobile"         => $this->input->post('mobile'),
                    "commission"     => $this->input->post('commission'),
                    "address"        => $this->input->post('address')
                );
            }

             $msg_array=array(
                "title"=>"Success",
                "emit"=>"Marketer Successfully Updated!",
                "btn"=>true
            );

            $this->data['confirmation']=message($this->action->update("marketer", $data, $where), $msg_array);  
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("marketer/all","refresh"); 
        }
    }
}