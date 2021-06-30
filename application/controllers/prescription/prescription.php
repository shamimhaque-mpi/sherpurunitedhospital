<?php
class Prescription extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }

    public function index() {
        $this->data['active']       = 'data-target="prescription-menu"';
        $this->data['subMenu']      = 'data-target="add"';
        $this->data['confirmation'] = null;

        $this->data['allPatient'] = $this->action->read('patient');
        $this->data['allMedicine'] = $this->action->readDistinct('medicine',"product_name");
        $this->data['allTest'] = $this->action->read('test');

        if ($this->input->post("add_prescription")) {
           foreach ($this->input->post('medicine') as  $key => $value) {
                $medicine[] = array(
                    "medicine_type" => $_POST['medicine_type'][$key],
                    "medicine"      => $value,
                    "duration"      => $_POST['duration'][$key],
                    "rules"         => $_POST['rules'][$key],
                    "note"          => $_POST['medicine_note'][$key],
                );
            }
           foreach ($this->input->post('test') as  $key => $value) {
                $test[] = array(
                    "test"     => $value,
                    "note"     => $_POST['test_note'][$key]
                );
            }
            $data=array(
                "prescription_id" =>$this->input->post('prescription_id'),
                "date"            =>$this->input->post('date'),
                "symptoms"        =>$this->input->post('symptoms'),
                "diagnosis"       =>$this->input->post("diagnosis"),
                "patient_name"    =>$this->input->post("patient_name"),
                "medicine"        =>json_encode($medicine),
                "test"            =>json_encode($test)
            );
            $msg_array=array(
                "title" =>"Success",
                "emit"  =>"Prescription Successfully added",
                "btn"   =>true
            );
            $this->data['confirmation']=message($this->action->add("prescription",$data), $msg_array);
        }
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/prescription/nav');
        $this->load->view('components/prescription/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all_prescription() {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="prescription-menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;
        
        $this->data['result'] = $this->action->read("prescription");
        if(isset($_POST['find'])){
            $where = array();
            foreach($_POST['search'] as $key => $val){
                if($val != null){
                    $where[$key] = $val;
                }
            }
            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where['date >='] = $val;
                }
                if($val != null && $key == 'to'){
                    $where['date <='] = $val;
                }
            }
            $this->data['result'] = $this->action->read("prescription",$where);
        }
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/prescription/nav',$this->data);
        $this->load->view('components/prescription/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function view($id=null){
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="prescription-menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $this->data["result"]=$this->action->read("prescription",array('id'=>$id));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/prescription/nav',$this->data);
        $this->load->view('components/prescription/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');

    }

    public function edit($id = null){
        $this->data["meta_title"]   = "New Prescription";
        $this->data['active']       = 'data-target="prescription-menu"';
        $this->data["subMenu"]      = 'data-target="all"';
        $this->data['confirmation'] = null;

        $where = array ("id" => $id);
        $this->data['result'] = $this->action->read('prescription',$where);
        $this->data['allPatient'] = $this->action->read('patient');
        $this->data['allMedicine'] = $this->action->read('medicine');
        
        if ($this->input->post("update")) {
            foreach ($this->input->post('medicine') as  $key => $value) {
                $medicine[] = array(
                    "medicine_type" => $_POST['medicine_type'][$key],
                    "medicine"      => $value,
                    "duration"      => $_POST['duration'][$key],
                    "rules"         => $_POST['rules'][$key],
                    "note"          => $_POST['medicine_note'][$key],
                );
            }
           foreach ($this->input->post('test') as  $key => $value) {
                $test[] = array(
                "test"     => $value,
                "note"     => $_POST['test_note'][$key]
                );
            }
            $data=array(
                "prescription_id" =>$this->input->post('prescription_id'),
                "date"            =>$this->input->post('date'),
                "symptoms"        =>$this->input->post('symptoms'),
                "diagnosis"       =>$this->input->post("diagnosis"),
                "patient_name"    =>$this->input->post("patient_name"),
                "medicine"        =>json_encode($medicine),
                "test"            =>json_encode($test)
            );
            $msg_array=array(
                "title"=>"Success",
                "emit"=>"Prescription Successfully Updated!",
                "btn"=>true
            );
            $this->data['confirmation']=message($this->action->update("prescription",$data, $where), $msg_array);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            redirect("prescription/prescription/all_prescription","refresh");
        }
        $this->load->view($this->data['privilege'].'/includes/header',$this->data);
        $this->load->view($this->data['privilege'].'/includes/aside',$this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu',$this->data);
        $this->load->view('components/prescription/nav',$this->data);
        $this->load->view('components/prescription/edit',$this->data);
        $this->load->view($this->data['privilege'].'/includes/footer',$this->data);
    }

    public function delete($id=NULL){
        $info=$this->action->read('prescription',array('id'=>$id));
        $options= array(
            'title' => 'delete',
            'emit'  => 'Prescription Successfully Deleted!',
            'btn'   => true
        );
       $this->data['confirmation']=message($this->action->deletedata('prescription', array('id' => $id)), $options);
       $this->session->set_flashdata("confirmation",$this->data['confirmation']);
       redirect("prescription/prescription/all_prescription","refresh");
    }
}