<?php

class Alt_doctor extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Altra Doctor Payment';
        $this->data['doctors'] = NULL;
        $this->data['doctors'] = get_result('doctors', [], ['id','fullName'], [], 'fullName', 'ASC');
    }
    
     public function index() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="alt_doctor_payment"';

        if(isset($_POST['save'])){
            
            unset($_POST['save']);
            $data = $_POST;
            
            $options = array(
                "title" => "Success",
                "emit"  => "Payment Successfully Paid!",
                "btn"   => true
            );
    
            $this->data['confirmation'] = message($this->action->add('altra_doctor_payment', $data), $options);          
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("doctor/alt_doctor/","refresh");
        }
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/altra_doctor_payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    
    public function all() {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="altra_doctor_all_payment"';

        $where = ['date'=>date('Y-m-d')];
        $this->data['altra_doctor_payment'] = get_join('altra_doctor_payment', 'doctors', 'altra_doctor_payment.doctor_id=doctors.id', $where, ['altra_doctor_payment.*', 'doctors.fullName']);
        
        if(isset($_POST['show'])) {
            $where = [];
            if(!empty($_POST['doctor_id'])){
                $where['altra_doctor_payment.doctor_id']  =   $_POST['doctor_id'];         
            }
            
            foreach ($_POST['date'] as $key => $value) {
                
                if($value != NULL){
                    if($key=="from"){
                      $where["altra_doctor_payment.date >="] = $value;
                    }

                    if($key=="to"){
                      $where["altra_doctor_payment.date <="] = $value;
                    }
                }
                
            }

            $this->data['altra_doctor_payment'] = get_join('altra_doctor_payment', 'doctors', 'altra_doctor_payment.doctor_id=doctors.id', $where, ['altra_doctor_payment.*', 'doctors.fullName']);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/alt_doctor_all_payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function edit($id) {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="altra_doctor_all_payment"';
        
        $this->data['altra_doctor_payment'] = NULL;
        $this->data['altra_doctor_payment'] = get_row('altra_doctor_payment', ['id'=>$id]);
         
        if(isset($_POST['update'])){
            
            unset($_POST['update']);
            $data = $_POST;
            
            $options = array(
                "title" => "Success",
                "emit"  => "Payment Successfully Update!",
                "btn"   => true
            );
    
            $this->data['confirmation'] = message($this->action->update('altra_doctor_payment', $data, ['id'=>$id]), $options);    
            
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            
            redirect("doctor/alt_doctor/all","refresh");
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/alt_doctor_payment_edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function delete($id){
        
        $options = array(
            "title" => "Success",
            "emit"  => "Payment Successfully Delete!",
            "btn"   => true
        );
    
        $this->data['confirmation'] = message($this->action->deleteData('altra_doctor_payment', ['id'=>$id]), $options);          
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("doctor/alt_doctor/all","refresh");
    }

}