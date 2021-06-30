<?php

class AddNewDoctor extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->load->library('upload');
        $this->data['meta_title'] = 'Doctor';

        $this->data['doctors']=$this->action->read("doctors");
    }
    
    public function index() {
        $this->data['active']   = 'data-target="doctor-menu"';
        $this->data['subMenu']  = 'data-target="add"';
        $this->data['confirmation'] = null;
        
        // set the validation
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|min_length[11]|is_unique[doctors.mobile]');
        $this->form_validation->set_rules('fullName', 'Name', 'trim');
        $this->form_validation->set_rules('designation', 'Designation', 'trim');
        $this->form_validation->set_rules('degree', 'Degree', 'trim');
        $this->form_validation->set_rules('hospital', 'Hospital', 'trim');

        // check the validation
        if ($this->input->post("add")) {
            if($this->form_validation->run() == FALSE){
                $options = array(
                    "title" => "Error",
                    "emit"  => validation_errors(),
                    "btn"   => true
                );

                $this->data['confirmation'] = message("warning", $options);
            } else {
                $data = array(
                    "fullName"      => $this->input->post("fullName"),
                    "designation"   => $this->input->post("designation"),
                    "degree"        => $this->input->post("degree"),
                    "specialised"   => $this->input->post("specialised"),
                    "hospital"      => $this->input->post("hospital"),
                    "room_no"      => $this->input->post("room_no"),
                    "mobile"        => $this->input->post("mobile"),
                    "phone"         => $this->input->post("phone"),
                    "email"         => $this->input->post("email"),
                    "fee"           => $this->input->post("fee"),
                    "commission"    => $this->input->post("commission"),
                    "address"       => $this->input->post("address")
                );

                // upload image
                if ($_FILES["attachFile"]["name"] != null or $_FILES["attachFile"]["name"] != "" ) {
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
                    "title" => "Success",
                    "emit"  => "New Doctors Successfully Saved",
                    "btn"   => true
                );
                
                $this->data['confirmation'] = message($this->action->add("doctors", $data), $options);
            }
        }

        // load views
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/add', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

}