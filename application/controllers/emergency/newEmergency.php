<?php
class NewEmergency extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'emergency';
    }
    
    public function index() {
        $this->data['active']   = 'data-target="emergency-menu"';
        $this->data['subMenu']  = 'data-target="emergency"';      
       
        $this->data['pid'] = $this->input->get('pid');       

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/emergency/nav-emergency', $this->data);
        $this->load->view('components/emergency/emergency', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function add() {       

         $billID = $this->addBill(); 
         $this->addJournal(); 
       
        $data = array(
           "date"   => $this->input->post('date'),   
           "pid"    => $this->input->post('pid'),        
           "notes"  => "emergency",
           "bill"   => $billID,
           "status" => "emergency"
        );      
       
        $this->action->add("emergencies", $data);      
        redirect("emergency/newEmergency/voucher?pid=" . $this->input->post("pid"), "refresh");
    }



    private function addBill() {
        $data = array(
            "date"                  => $this->input->post('date'),
            "voucher"               => $this->input->post('voucher'),
            "pid"                   => $this->input->post('pid'),
            "title"                 => "emergency",
            "details"               => $this->input->post('remark'),
            "total"                 => $this->input->post('total'),
            "discount"              => $this->input->post('discount'),
            "grand_total"           => $this->input->post('grand_total'),
            "paid"                  => $this->input->post('paid'),
            "due"                   => $this->input->post('due'),
            "last_paid"             => $this->input->post('paid'),
            "last_payment_date"     => $this->input->post('date'),
            "status"                => "emergency"
        );

        $id = $this->action->addAndGetInsertedID('bills', $data);
        return $id; 
    }


    private function addJournal(){

      $regi_id = $this->action->read("registrations",array('pid'=> $this->input->post('pid')));
       
      $data = array(
            "date"    => $this->input->post('date'),
            "ref"     => "registration:". $regi_id[0]->id,
            "details" => "emergency",
            "amount"  => $this->input->post('paid'),
            "status"  => "income"
        );

      $this->action->add("journal",$data);    
      return true;
    }


    public function voucher(){
        $this->data['active'] = 'data-target="emergency-menu"';
        $this->data['subMenu'] = 'data-target="voucher"';

        $where = array('pid' => $this->input->get("pid"));
        $this->data['info'] = $this->action->read('emergencies', $where);

        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/emergency/nav-emergency', $this->data);
        $this->load->view('components/emergency/voucher', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


    public function all() {
        $this->data['active']   = 'data-target="emergency-menu"';
        $this->data['subMenu']  = 'data-target="all"';       
        

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/emergency/nav-emergency', $this->data);
        $this->load->view('components/emergency/all', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    

    public function report() {
        $this->data['active']   = 'data-target="emergency-menu"';
        $this->data['subMenu']  = 'data-target="report"';      
              
        $this->data['emerInfo'] = NULL;

        if (isset($_POST['show'])) {
            $where = array();        

            foreach ($_POST['search'] as $key => $value) {
                if ($value != NULL && $key == 'date_from') {
                    $where['date >='] = $value;
                }

                if ($value != NULL && $key == 'date_to') {
                    $where['date <='] = $value;
                }
            }

            $this->data['emerInfo'] = $this->action->readGroupBy('emergencies', "pid", $where,"id","asc");
          }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/emergency/nav-emergency', $this->data);
        $this->load->view('components/emergency/emergencyReport', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
   
}