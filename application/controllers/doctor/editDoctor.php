<?php

class EditDoctor extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Doctor';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        if(isset($_POST['change'])){
            $data = array(
                "fullName"      => $this->input->post("fullName"),
                "designation"   => $this->input->post("designation"),
                "degree"        => $this->input->post("degree"),
                "specialised"   => $this->input->post("specialised"),
                "hospital"      => $this->input->post("hospital"),
                "mobile"        => $this->input->post("mobile"),
                "room_no"       => $this->input->post("room_no"),
                "phone"         => $this->input->post("phone"),
                "email"         => $this->input->post("email"),
                "fee"           => $this->input->post("fee"),
                "commission"    => $this->input->post("commission"),
                "address"       => $this->input->post("address")
                
            );

            // upload image
            if ($_FILES["attachFile"]["name"] != null or $_FILES["attachFile"]["name"] != "" ) {
                unlink($this->input->post("oldImage"));

                $config['upload_path']      = './public/upload/doctors';
                $config['allowed_types']    = 'png|jpeg|jpg|gif';
                $config['max_size']         = '4096';
                $config['max_width']        = '3000';
                $config['max_height']       = '3000';
                $config['file_name']        = "doctor-" . strtotime("now"); 
                $config['overwrite']        = true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")) {
                    $upload_data    = $this->upload->data();
                    $data["image"]  = "public/upload/doctors/" . $upload_data['file_name'];
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
                "title" => "Updated",
                "emit"  => "Doctor Information Successfully Changed!",
                "btn"   => true
            );
             
            $where = array('id' => $this->input->get('id'));
            $this->data['confirmation'] = message($this->action->update("doctors", $data, $where), $options);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('doctor/allDoctors','refresh');
        }

        // get data from database
        $where = array('id' => $this->input->get('id'));
        $this->data['biography'] = $this->action->read('doctors', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}