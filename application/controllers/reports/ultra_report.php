<?php
class Ultra_report extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['active']       = 'data-target="ultra_test"';
    }
    public function index(){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="ultra_test"';
        $this->data['subMenu']      = 'data-target="add_ultra"';
        $this->data['confirmation'] = null;
        
        $this->data['all_patient'] = $this->db->query("SELECT * FROM `patients` WHERE pid NOT IN (SELECT pid FROM `patient_histories`) AND is_report=0 GROUP BY name")->result();
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/altra/nav', $this->data);
        $this->load->view('components/reports/altra/index', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    } 
    
    
    public function save(){
        if(!empty($_POST['save'])){
            
            $paitent_id = $this->input->post('pid');
            
            if(isset($_POST['patient_id']))
            save_data('patients', ['is_report'=>1], ['id'=>$_POST['patient_id']]);
            
            // ultra patient data insert here 
            $data_ultra_patient_info = array(
                "patient_id"    => $this->input->post('pid'),
                "gender"        => $this->input->post('gender'),
                "name"          => $this->input->post('name'),
                "age"           => $this->input->post('age'),
                "specimen"      => $this->input->post('specimen_name'),
                "reff_doctor"   => $this->input->post('reff_doctor'),
                "created_at"    => date('Y-m-d')
            );
            
            // ultra patient  report data insert here 
            foreach($_POST['test_report'] as $key => $value) {
                $data_ultra_patient_report_info = array(
                    "created_at"    => date('Y-m-d'),
                    "patient_id"    => $this->input->post('pid'),
                    "test_name"     => $key,
                    "test_report"   => $value
                );
                $this->action->add("ultra_patient_report", $data_ultra_patient_report_info);
            }
            
            $option=array(
                'title' =>"success",
                'emit'  =>"Data successfully Saved..",
                'btn'   =>true
            );
            
            $this->data['confirmation'] = message($this->action->add("ultra_patient",$data_ultra_patient_info), $option);
            
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("reports/ultra_report/view/$paitent_id","refresh");
        }
    }
     
     
    public function all(){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="ultra_test"';
        $this->data['subMenu']      = 'data-target="all_ultra"';
        $this->data['confirmation'] = null;
        
        $where = array();
         if(isset($_POST['show'])){
            foreach($_POST['search'] as $key => $val){
                if(!empty($val)){
                    if($key == 'patient_id'){
                        $where['ultra_patient.'.$key] = $val;
                    }else{
                        $where[$key] = $val;
                    }
                    
                }
            }

            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where['ultra_patient.created_at >='] = $val;
                }

                if($val != null && $key == 'to'){
                    $where['ultra_patient.created_at <='] = $val;
                }
            }
           
        }
       
        $this->data['result'] = get_join('ultra_patient_report' ,'ultra_patient', 'ultra_patient_report.patient_id=ultra_patient.patient_id',$where, '', 'ultra_patient_report.patient_id');
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/altra/nav', $this->data);
        $this->load->view('components/reports/altra/all_ultra_report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    
    public function view($id){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="ultra_test"';
        $this->data['subMenu']      = 'data-target="all_ultra"';
        $this->data['confirmation'] = null;
        
        $this->data['result'] = get_result('ultra_patient_report', ['patient_id'=>$id], null, null, 'id', 'ASC');
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/altra/nav', $this->data);
        $this->load->view('components/reports/altra/ultra_report_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    
    
    public function edit($id){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="ultra_test"';
        $this->data['subMenu']      = 'data-target="all_ultra"';
        $this->data['confirmation'] = null;
        
        $this->data['result'] = get_result('ultra_patient_report', ['patient_id'=>$id]);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/altra/nav', $this->data);
        $this->load->view('components/reports/altra/ultra_report_edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    
     public function edit_data(){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="ultra_test"';
        $this->data['subMenu']      = 'data-target="all_ultra"';
        $this->data['confirmation'] = null;
        
        
        
        if(!empty($_POST['update'])){
            
            $id = $_POST['patient_id'];
            
            $data_ultra_patient_info = array(
                                                "name"          => $this->input->post('name'),
                                                "age"           => $this->input->post('age'),
                                                "reff_doctor"   => $this->input->post('reff_doctor'),
                                            );
                
                
                
              $where_patient =  ["patient_id" => $id]; 
                // ultra patient  report data update here 
                
                foreach($_POST['test_report'] as $key => $value) {
                    $where_patient_testname_wise = ["patient_id" => $id,"test_name" => $key];
                    $data_ultra_patient_report_info = array(
                                                "test_report"   => $value
                                                );
                    $this->action->update("ultra_patient_report",$data_ultra_patient_report_info,$where_patient_testname_wise);
                    
                    unset($where_patient_testname_wise);
                    unset($data_ultra_patient_report_info);
                   
                                        
                }
                

                $option=array(
                    'title' =>"success",
                    'emit'  =>"Data successfully Changed..",
                    'btn'   =>true
                );
                
                $this->data['confirmation']=message($this->action->update("ultra_patient",$data_ultra_patient_info,$where_patient),$option);
                $this->session->set_flashdata("confirmation",$this->data['confirmation']);
                redirect("reports/ultra_report/all","refresh");
        }

    }
    
    
    
    
    
   
     public function delete($id=NULL){
        $where = array("patient_id"=>$id);
        $options=array(
            'title' =>'delete',
            'emit'  =>'Data successfully Deleted!',
            'btn'   =>true
        );

        if(!empty($id)){
        $this->action->deleteData('ultra_patient_report',$where);
        $this->data['confirmation']=message($this->action->deleteData('ultra_patient',$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        }
        redirect('reports/ultra_report/all','refresh');
    }

 }
