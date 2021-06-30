<?php
class Due extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }

    public function index() {
        $this->data['meta_title'] = 'Sale';
        $this->data['active'] = 'data-target="due"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        if($this->input->post("send")){
           $content = $this->input->post('message');  
          
           foreach($this->input->post("mobiles") as $key => $num) {
                 $message = send_sms($num, $content);     
                 $insert = array(
                  'delivery_date'     => date('Y-m-d'),
                  'delivery_time'     => date('H:i:s'),
                  'mobile'            => $num,
                  'message'           => $content,
                  'total_characters'  => strlen($content),
                  'total_messages'    => message_length(strlen($content)),
                  'delivery_report'   => $message
                 );
                 $this->action->add('sms_record', $insert);
           }  
  
         if($message){
                $msg_array=array(
                    "title"=>"Success",
                    "emit"=>"SMS Sent Successfully",
                    "btn"=>true
                );
                 $this->data['confirmation'] = message('success', $msg_array);
              } else {
                $msg_array=array(
                    "title"=>"Success",
                    "emit"=>"Could not send this SMS!",
                    "btn"=>true
                );
                 $this->data['confirmation'] = message('warning', $msg_array);
              }  
        }

        // get the due record
        $where = array('due >' => 0);
        $this->data['allDue'] = $this->action->readGroupBy('sale', 'voucher_number',$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/sale/due', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
 
    public function due_payment(){
        $this->data['meta_title'] = 'Sale';
        $this->data['active'] = 'data-target="sale_menu"';
        $this->data['subMenu'] = 'data-target="due"';
        $this->data['confirmation'] = null;

        if(isset($_POST['save'])){
            $this->data['confirmation'] = $this->change();
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect("sale/due", 'refresh');
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/sale/due_payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function due_payment_view(){
        $this->data['meta_title'] = 'Sale';
        $this->data['active'] = 'data-target="sale_menu"';
        $this->data['subMenu'] = 'data-target="due"';
        $this->data['confirmation'] = null;


        $where = array(
            'voucher_number' => $this->input->get('vno')
        );
        $this->data['result'] = $this->action->read('sale', $where);
        $this->data['dueHisroty'] = $this->action->read('due_payment',array("voucher_number" =>$this->input->get('vno')));


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/sale/due_payment_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

     private function change(){
        foreach ($_POST['id'] as $key => $value) {
            $where = array('id' => $value);

            $info = $this->action->read("sale",$where);
            $paid = $remission = 0.00;
            if($info!=NULL){
                $paid = $info[0]->paid + $this->input->post('deposit');
                $remission = $info[0]->remission + $this->input->post('remission');
            }

            $data = array(
                'paid' => $paid,
                'remission' => $remission,
                'due' => $this->input->post('due')
            );

         $this->action->update('sale', $data, $where);
        }

            // add data due_payment table from  due payment  for due payment history
            $lastvno = $this->action->read_limit('due_payment', array("voucher_number" =>$this->input->get('vno')),'desc','1');

            $remission = 0;
            $remission = $lastvno[0]->remission + $this->input->post('remission');
            $dataD = array(
                'date'              => date("Y-m-d"),
                'time'              => date("h:i:s A"), 
                'voucher_number'    => $this->input->get('vno'),
                'total_amount'      => $this->input->post('total'),
                'prev_paid'         => $lastvno[0]->paid,
                'prev_due'          => $lastvno[0]->due,
                'paid'              => $this->input->post('deposit'),
                'due'               => $this->input->post('due'),
                'remission'         => $remission
            );
            $this->action->add('due_payment', $dataD); 

        $options = array(
            'title' => 'success',
            'emit'  => 'Sale change successfully completed!',
            'btn'   => true
        );

        return message('success', $options);
    }

    public function send_custom_sms() {
        $this->data['meta_title'] = 'SMS';
        $this->data['active'] = 'data-target="due"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;


        if(isset($_POST['sendSms'])){
        	$mobile_no = explode(",", $this->input->post('mobiles'));
        	$content = $this->input->post('message');

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
                 $this->action->add('sms_record', $insert);
              }

              if($message){
      	        $msg_array=array(
                    "title"=>"Success!",
                    "emit"=>"SMS Sent Successfully.",
                    "btn"=>true
                );
                 $this->data['confirmation'] = message('success', $msg_array);
              } else {
              	$msg_array=array(
                    "title"=>"Warning!",
                    "emit"=>"Could not send this SMS.",
                    "btn"=>true
                );
                 $this->data['confirmation'] = message('warning', $msg_array);
              }

              $this->session->set_flashdata('confirm', $this->data['confirmation']);
              redirect('sale/due', 'refresh');
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
         $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sale/sms', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
