<?php
class BasicInfo extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'basic_info';
    }
    
    public function index() {
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="basic-info"';
        $this->data['pid']       = patient_id("patients");

        $this->data['doctors']  = $this->action->read('doctors');
        $this->data['marketers']= $this->action->read('marketer');
        $this->data['allpc']    = $this->action->read('pc');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/basic-info', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function all() {
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="all"';      

        $this->data['pid'] = $this->input->get('pid');
        $this->data['doctors'] = $this->action->readDistinct("doctors","fullName");

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/all', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    public function dueAll() {
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="dueAll"';      



        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/dueAll', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function referredAll() {
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="referredAll"';      

        $this->data['commisionInfo'] = $this->action->read('commissions', array('type'=>'referred'));


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/referred', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function view($id=NULL) {
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="view"';      
       

        $this->data['info'] = $this->action->read("patients", array("pid" => $id));
        $this->data['commission'] = $this->action->read("commissions");
       
        

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        //$this->load->view('components/patient/nav', $this->data);
        $this->load->view('components/patient/view', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function add() {
        $id = $status = $url = '';

        if($_POST['button'] == "Admission") {
            $status = 'admitted';
            $table = 'admissions';
            $url = "admission/newAdmission";
        } else if($_POST['button'] == "Consultancy") {
            $status = 'consultancy';
            $table = 'consultancies';
            $url = "consultancy/newConsultancy";
        } else if($_POST['button'] == "Emergency") {
            $status = 'emergency';
            $table = 'emergencies';
            $url = "emergency/newEmergency";
        } else {
            $status = 'diagnosis';
            $table = 'diagnosis';
            $url = "diagnosis/addNewPatientDiagnosis";
        }

        $this->addPatient();
        $id = $this->addRegistration($table, $status);
        $this->addCommission($id);

        redirect($url ."?pid=" . $this->input->post("patient_id"), "refresh");
    }

    private function addPatient() {
        $guardian = array($this->input->post("relation") => $this->input->post("person"));
        
        $data = array(
            "date"              => $this->input->post("date"),
            "pid"               => $this->input->post("patient_id"),            
            "name"              => $this->input->post("patient_name"),
            "gender"            => $this->input->post("gender"),
            "age"               => $this->input->post("age"), 
            "guardian"          => json_encode($guardian),          
            "contact"           => $this->input->post("contact_number"),        
            "address"           => $this->input->post("address")            
        ); 

        $this->action->add("patients", $data);
        return true;
    }

    private function addRegistration($table, $status) {
        $data = array(
            "date"              => $this->input->post("date"),
            "pid"               => $this->input->post("patient_id"),       
            "type"              => $table,
            "status"            => $status
        );   

        $id = $this->action->addAndGetInsertedID("registrations", $data);
        return $id;
    }

    private function addCommission($id) {
        $counter = 0;
        foreach ($_POST['details'] as $key => $value) {
            if($value != NULL){
                $info = array(
                    "date"         => $this->input->post("date"),
                    "ref"          => "registration:" . $id,
                    "person"       => $_POST['person'][$counter],
                    "person_id"    => $value,
                    "type"         => $key,
                    "amount"       => $_POST['amount'][$key]
                ); 

                $this->action->add("commissions", $info);
            }

            $counter++;
        }
    }

}
