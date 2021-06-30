<?php

class SendSms extends Admin_Controller{
	function __construct() {
        parent::__construct();

        $this->load->model('action');
        $sms = $this->action->read_sum("recharge_sms","sms");
       	$this->data['total_sms']= ($sms[0]->sms > 0 ? $sms[0]->sms : 0);
		$this->data['all_sms']=$this->action->read("sms_record");
    }

    public function index() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="send-sms"';
        $this->data['confirmation'] = null;
        $this->data['receivers'] = null;

        if($this->input->post("show")){
            $where = array();

            if ($this->input->post('type') =='doctor' ) {
                $this->data["receivers"] = get_result("doctors", [], ['fullName as name', 'mobile']);
            }
            if ($this->input->post('type') =='reference') {
                $this->data["receivers"] =  get_result("marketer", [], ['name', 'mobile']);
            }
            if ($this->input->post('type') =='patient') {
                $this->data["receivers"] = get_result("patients", [], ['name', 'contact as mobile']);
            }
        }

        // send data
        if(isset($_POST['sendSms'])){
           $content = $this->input->post('message');

           if(isset($_POST['mobile'])){

               foreach($_POST['mobile'] as $key => $num) {
                     $message = send_sms($num, $content);
                     $insert = array(
                        'delivery_date'     => date('Y-m-d'),
                        'delivery_time'     => date('H:i:s'),
                        'mobile'            => $num,
                        'message'           => $this->input->post('message'),
                        'total_characters'  => $this->input->post('total_characters'),
                        'total_messages'    => $this->input->post('total_messages'),
                        'delivery_report'   => $message
                     );
                     $this->action->add('sms_record', $insert);
               }
            }else{
                foreach($_POST['contact'] as $key => $num) {
                    $message = send_sms($num, $content);
                    $insert = array(
                        'delivery_date'     => date('Y-m-d'),
                        'delivery_time'     => date('H:i:s'),
                        'mobile'            => $num,
                        'message'           => $this->input->post('message'),
                        'total_characters'  => $this->input->post('total_characters'),
                        'total_messages'    => $this->input->post('total_messages'),
                        'delivery_report'   => $message
                    );
                    $this->action->add('sms_record', $insert);
               }
           }

           if($message){
               $options = array(
                   "title"  => "success",
                   "emit"   => "Your Message has been Successfully Sent!",
                   "btn"    => true
               );
               $this->data['confirmation'] = message('success', $options);
           } else {
               $options = array(
                 "title"  => "warning",
                 "emit"   => "Oops! Something went Wrong!Try again Please.",
                 "btn"    => true
             );
               $this->data['confirmation'] = message('warning', $options);
           }
        }

        $this->data["receiversInfo"] = $this->action->read("doctors");


        // send data
     /*   if(isset($_POST['send'])) {

            // get informations
            $table = $this->input->post('table');
            $numbers = $this->action->read($table);
            $content = $this->input->post('message');

            foreach($numbers as $key => $num) {
                $message = send_sms($num->mobile, $content);
                $insert = array(
                 	'delivery_date'     => date('Y-m-d'),
                 	'delivery_time'     => date('H:i:s'),
                 	'mobile'            => $num->mobile,
                 	'message'           => $this->input->post('message'),
                 	'total_characters'  => $this->input->post('total_characters'),
                 	'total_messages'    => $this->input->post('total_messages'),
                 	'delivery_report'   => $message
                );

                $this->action->add('sms_record', $insert);
            }

		    if($message){
                $options = array(
                    "title" => "Success",
                    "emit"  => "SMS Sent Successfully!",
                    "btn"   => true
                );

                $msg = message('success', $options);
		    } else {
                $options = array(
                    "title" => "warning",
                    "emit"  => "SMS Sent Failure!",
                    "btn"   => true
                );

                $msg = message('warning', $options);
		    }

            $this->session->set_flashdata('confirmation', $msg);
            redirect('sms/sendSms', 'refresh');
    	}

        */

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/send-sms', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function send_custom_sms() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="custom-sms"';
        $this->data['confirmation'] = null;

        if(isset($_POST['sendSms'])){
        	$mobile_no = explode(",", $this->input->post('mobiles'));
        	$content = $this->input->post('message');
        	
        	//print_r($mobile_no);

            foreach($mobile_no as $key=>$num) {
                $message = send_sms($num, $content);
                $insert = array(
                 	'delivery_date'     => date('Y-m-d'),
                 	'delivery_time'     => date('H:i:s'),
                 	'mobile'            => $num,
                 	'message'           => $this->input->post('message'),
                 	'total_characters'  => $this->input->post('total_characters'),
                 	'total_messages'    => $this->input->post('total_messages'),
                 	'delivery_report'   => $message
                );
                //print_r($insert);

                $this->action->add('sms_record', $insert);
            }

            if($message){
      	        $options = array(
                    "title" => "Success",
                    "emit"  => "SMS Sent Successfully",
                    "btn"   => true
                );
                
                $msg = message('success', $options);
            } else {
              	$options = array(
                    "title"	=> "Success",
                    "emit"	=> "Could not send this SMS!",
                    "btn"	=> true
                );

                $msg = message('warning', $options);
            }

            $this->session->set_flashdata('confirmation', $msg);
            redirect('sms/sendSms/send_custom_sms', 'refresh');
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/send-custom-sms', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

	public function sms_report() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="sms-report"';
        $this->data['confirmation']= $this->data['sms_record'] = null;

		if($this->input->post('show_between')){
			$fromDate = $this->input->post('date_from');
			$toDate = $this->input->post('date_to');
			$this->data['sms_record'] = $this->action->sms_between("sms_record", $fromDate, $toDate);
		}

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/sms-report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


}
