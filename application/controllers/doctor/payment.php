<?php

class Payment extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Doctor Payment';
        $this->data['doctors'] = NULL;
        $this->data['doctors'] = get_result('doctors', [], ['id','fullName'], [], 'fullName', 'ASC');
    }
    
    public function index() {
        $this->data['active']   = 'data-target="doctor-menu"';
        $this->data['subMenu']  = 'data-target="payment"';
        $this->data['confirmation'] = null;
      
        if(isset($_POST['save'])){
            
            unset($_POST['save']);
            $data = $_POST;
            
           // $previous_paid = get_result();
           
           if($_POST['total_paid'] == 0){
              $data['total_paid'] = (!empty($_POST['payment']) ? $_POST['payment'] : 0) + (!empty($_POST['less']) ? $_POST['less'] : 0);
           }else{
               $data['total_paid'] = $_POST['total_paid'] + (!empty($_POST['payment']) ? $_POST['payment'] : 0) + (!empty($_POST['less']) ? $_POST['less'] : 0);
           }
           
           $data['date'] = date('Y-m-d');
            
            $options = array(
                "title" => "Success",
                "emit"  => "Payment Successfully Paid!",
                "btn"   => true
            );
    
            $this->data['confirmation'] = message($this->action->add('doctor_payment', $data), $options);          
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            
            redirect("doctor/payment","refresh");
        }
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/doctor-payment', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function all() {
        $this->data['active']   = 'data-target="doctor-menu"';
        $this->data['subMenu']  = 'data-target="payment_all"';
        $this->data['confirmation'] = null;
        
        $where = ['date'=>date('Y-m-d'), 'trash'=>0];
        $this->data['doctor_payment'] = get_join('doctor_payment', 'doctors', 'doctor_payment.doctor_id=doctors.id', $where, ['doctor_payment.*', 'doctors.fullName']);
        
        if (isset($_POST['show'])) {
            $where =['trash'=>0];
            if(!empty($_POST['doctor_id'])){
                $where['doctor_payment.doctor_id']  =   $_POST['doctor_id'];         
            }
            
            foreach ($_POST['date'] as $key => $value) {
                
                if($value != NULL){
                    if($key=="from"){
                      $where["doctor_payment.date >="] = $value;
                    }

                    if($key=="to"){
                      $where["doctor_payment.date <="] = $value;
                    }
                }
                
            }

            $this->data['doctor_payment'] = get_join('doctor_payment', 'doctors', 'doctor_payment.doctor_id=doctors.id', $where, ['doctor_payment.*', 'doctors.fullName']);
        }


        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/all_payment', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    
   /* public function edit($id) {
        $this->data['active'] = 'data-target="doctor-menu"';
        $this->data['subMenu'] = 'data-target="payment_all"';
        
        $this->data['doctor_payment'] = NULL;

        $this->data['doctor_payment'] = get_row('doctor_payment', ['id'=>$id]);
         
        if(isset($_POST['update'])){
            
            unset($_POST['update']);
            $data = $_POST;
            
            $options = array(
                "title" => "Success",
                "emit"  => "Payment Successfully Update!",
                "btn"   => true
            );
    
            $this->data['confirmation'] = message($this->action->update('doctor_payment', $data, ['id'=>$id]), $options);    
            
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            
            redirect("doctor/payment/edit/".$id,"refresh");
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/doctor/nav', $this->data);
        $this->load->view('components/doctor/doctor_payment_edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    */
    public function delete($id){
        
        $options = array(
            "title" => "Success",
            "emit"  => "Payment Successfully Delete!",
            "btn"   => true
        );
    
        $this->data['confirmation'] = message($this->action->update('doctor_payment', ['trash'=>1],['id'=>$id]), $options);          
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("doctor/payment/all","refresh");
    }

}