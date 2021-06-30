<?php
class NewAdmission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'admission';
    }
    
    public function index() {
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="admission"';
        

        $this->data['pid']      = $this->input->get('pid');
        $this->data['voucher']      = generate_voucher('bills');

        // uniqid generate here
        $this->data['patient_Id'] = '54';
        $this->data['patient_Id'] = patientUniqueId('patients');
       

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/admission/nav', $this->data);
        $this->load->view('components/admission/admission', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function add($pid = null) {
        // $billID = $this->addBill();
        // $table = '';
 
        // if($_POST['plan'] == "Cabin") {
        //     $table = "cabin";
        //     $seat = "cabin:" . $this->input->post('bed');
        // } else {
        //     $table = "wards";
        //     $seat = "ward:" . $this->input->post('bed');
        // }

        // $where = array("id" => $this->input->post('bed'));
        // $data  = array("status" => "Booked");

        // $this->action->update($table, $data, $where);

        $options = array(
            "ttile" => "success",
            "emit"  => "New Patient Successfully Saved!",
            "btn"   => true
        );
        
        $data = array(
            "date"      => $this->input->post('date'),
            "pid"       => $this->input->post('pid'),
            "guardian"  => $this->input->post("guardian"),
        );

        // add data into patients table 
        $patientsInfo = array(
            "date"      => $this->input->post('date'),
            'pid'       => $this->input->post("pid"), 
            'name'      => $this->input->post("patient_name"), 
            'contact'   => $this->input->post("contact_number"), 
            'age'       => $this->input->post("age"), 
            'address'   => $this->input->post("address"), 
            'gender'    => $this->input->post("gender"), 
            'guardian'  => $this->input->post("guardian"), 
        );

        $this->action->add("patients", $patientsInfo);
        // end patients
        
        
        // add data into registration table 
        $patientsRegInfo = array(
            "date"      => $this->input->post('date'),
            'pid'       => $this->input->post("pid"), 
            'type'      => "admitted", 
            'status'    => "admitted", 
        );
        $this->action->add("registrations",$patientsRegInfo);
        // end registration

        $msg = $this->action->add("admissions", $data);
        //$this->addToJournal();

        $this->data['confirmation'] = message($msg, $options);

        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        redirect("admission/newAdmission/voucher?pid=" . $this->input->post('pid'), "refresh");
    }

    // private function addBill() {
    //     $data = array(
    //         "date"                  => $this->input->post('date'),
    //         "voucher"               => $this->input->post('voucher'),
    //         "pid"                   => $this->input->post('pid'),
    //         "title"                 => "admission",
    //         "details"               => $this->input->post('remarks'),
    //         "total"                 => $this->input->post('total'),
    //         "discount"              => $this->input->post('discount'),
    //         "grand_total"           => $this->input->post('grand_total'),
    //         "paid"                  => $this->input->post('paid'),
    //         "due"                   => $this->input->post('due'),
    //         "last_paid"             => $this->input->post('paid'),
    //         "last_payment_date"     => $this->input->post('date'),
    //     );

    //     $id = $this->action->addAndGetInsertedID('bills', $data);
    //     return $id; 
    // }

    // private function addToJournal() {
    //     $where = array('pid' => $this->input->post('pid'));
    //     $regInfo = $this->action->read('registrations', $where);

    //     $data = array(
    //         "date"       => $this->input->post('date'),
    //         "ref"        => 'registration:' . $regInfo[0]->id,
    //         "details"    => 'admission',
    //         "status"     => 'income'
    //     );

    //    $this->action->addAndGetInsertedID('journal', $data);
    //    return true;
    // }

    public function voucher() {
        $this->data['active'] = 'data-target="admission-menu"';
        $this->data['subMenu'] = 'data-target="voucher"';

        $pid = array('pid' => $this->input->get("pid"));
        $where = array(
            "pid"   => $this->input->get("pid"),
            "title" => "admission"
        );
        

        $this->data['info'] = $this->action->read('admissions', $pid);
        $this->data['patientInfo'] = $this->action->read('patients', $pid);
        $this->data['billsInfo'] = $this->action->read('bills', $where);

        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/nav', $this->data);
        $this->load->view('components/admission/voucher', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function admissionList(){
        $this->data['active']   = 'data-target="patient-menu"';
        $this->data['subMenu']  = 'data-target="all"';

        //$this->data['wardInfo'] = $this->action->read("wards");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/nav', $this->data);
        $this->load->view('components/admission/list', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit() {
        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="all"';
        
        //$where=array('id'=>$_GET['id']);
        //$this->data['info']=$this->action->read('operations',$where);

        //$this->data['cabin']=$this->action->read('cabin');

        //get word no or cabin no
        $admissions = $this->action->read('admissions',array('pid'=>$_GET['id']));
        //breack the word depending on : 
        $pInfo = explode(':', $admissions[0]->seat);

        if($pInfo[0]=='cabin'){
            $table = $pInfo[0];
        }

        if($pInfo[0]=='ward'){
            $table = 'wards';
        }

        $wno_or_caninno = $pInfo[1];  


        $this->data['ward']=$this->action->read($table,array('id'=>$wno_or_caninno));


        //$this->data['allWards']=$this->action->read('wards',array('ward_no'=>$wno));
        //$this->data['doctors']=$this->action->read('doctors');
        //$this->data['marketers']  = $this->action->read('marketer');
        //$this->data['allpc']    = $this->action->read('pc');
        $this->data['patients']    = $this->action->read('patients',array('pid'=>$_GET['id']));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/nav', $this->data);
        $this->load->view('components/admission/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function update($id=NULL){
        $cabin_no = $bed_no = "";        
        
        if($_POST['cabin_or_ward'] == "Cabin"){
            
            foreach ($_POST['cabin'] as $key => $value) {
                //update cabin table
                $whereC=array("cabin_no"=>$value);
                $dataC=array("status"=>"Booked");
                $this->action->update("cabin",$dataC,$whereC);

                //set cabin data
                $cabin_data[$key] =$value;
                $cabin_no =json_encode($cabin_data);
            }
        }else{
            foreach ($_POST['bed'] as $key => $value) {
                //update ward table
                $whereW=array("ward_no"=>$this->input->post("ward_no"),"bed_no"=>$value);
                $dataW=array("status"=>"Booked");
                $this->action->update("wards",$dataW,$whereW);

                //set ward data
                $bed_data[$key] =$value;
                $bed_no =json_encode($bed_data);
            }
        }      

        $person_info=array(
            "person" => $this->input->post("person"),
            "name"   => $this->input->post("person_name")
        );

        //set final patient data array
        $data=array(           
            "patient_id"        =>$this->input->post("patient_id"),
            "date"              =>$this->input->post("date"),
            "name"              =>$this->input->post("patient_name"),
            "father_husband"    =>json_encode($person_info),
            "gender"            =>$this->input->post("gender"),
            "age"               =>$this->input->post("age"),
            "mobile"            =>$this->input->post("contact_number"),
            "address"           =>$this->input->post("address"),
            "status"            =>$this->input->post("status"),
            "guardian"          =>$this->input->post("local_guardian"),
            "cabin_ward"        =>$this->input->post("cabin_or_ward"),
            "cabin_no"          =>$cabin_no,
            "ward_no"           =>$this->input->post("ward_no"),
            "bed_no"            =>$bed_no,
            "consultant_doctor" =>$this->input->post("consultant_doctor"),
            "patient_type"      =>$this->input->post("patient_type"),
            "reffered_by"       =>$this->input->post("referred_by"),
            "marketer"          => $this->input->post("marketer"),
            "type"              => $this->input->post("type"),
            "pc"                => $this->input->post("pc"),
            "fee"               => $this->input->post("admission_fee"),
            "rent"              => $this->input->post("wadr_or_cabin_rent")
        );

        $options = array(
            "ttile"=>"success",
            "emit"=>"Patient's info Successfully Updated!",
            "btn"=>true
        );

        $where=array("id"=>$id);

        $this->data['confirmation']=message($this->action->update("patient",$data,$where),$options);
        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("patient/add/all","refresh");
    }

    public function view($id=NULL) {
        $this->data['active'] = 'data-target="patient-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        // $where=array("id"=>$id);
        // $this->data['info']=$this->action->read('patient',$where);

        $join = array("registrations" => array("condition" => "registrations.pid=patients.pid"));
        $where = array("registrations.pid" => $id);
        $this->data['info'] = $this->action->multipleJoinAndRead("patients", $join, $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/nav', $this->data);
        $this->load->view('components/admission/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function delete($id=NULL){
        $options = array(
            'title' => 'delete',
            'emit'  => 'Patient\'s information successfully Deleted!',
            'btn'   => true
        );

        $where = array("id" => $id);
        $this->data['confirmation'] = message($this->action->deleteData('patients', $where), $options);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('admission/newAdmission/admissionList', 'refresh');
    }

}