<?php
class Mixed_reports extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }
    
    public function index(){
        $this->data['meta_title']   = 'SAVER';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="saber"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/saber', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function view_saber($id){
        $this->data['meta_title']   = 'VIEW SAVER';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="saber"';
        $this->data['confirmation'] = null;

        $patient = $this->action->read('mixed_patient', ['id'=>$id]);
        $tests   = $this->action->read('mixed_report', ['patient_id'=>$id]);
        
        $this->data['patient'] = ($patient ? $patient[0] : false);
        
        $all_tests = [];
        foreach($tests as $tests){
            $all_tests[$tests->test_name] = json_decode($tests->result);     
        }
        
        $this->data['tests']   = $all_tests;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view_saber', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function biochemical(){
        $this->data['meta_title']   = 'BIOCHEMICAL';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="biochemical"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/biochemical', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function view_biochemical($id){
        $this->data['meta_title']   = 'VIEW BIOCHEMICAL';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="biochemical"';
        $this->data['confirmation'] = null;

        $patient = $this->action->read('mixed_patient', ['id'=>$id]);
        $tests   = $this->action->read('mixed_report', ['patient_id'=>$id]);
        
        $this->data['patient'] = ($patient ? $patient[0] : false);
        
        $all_tests = [];
        foreach($tests as $tests){
            $all_tests[$tests->test_name] = json_decode($tests->result);     
        }
        
        $this->data['tests']   = $all_tests;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view_biochemical', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function semen(){
        $this->data['meta_title']   = 'SEMEN';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="semen"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/semen', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function view_semen($id){
        $this->data['meta_title']   = 'VIEW SEMEN';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="semen"';
        $this->data['confirmation'] = null;

        $patient = $this->action->read('mixed_patient', ['id'=>$id]);
        $tests   = $this->action->read('mixed_report', ['patient_id'=>$id]);
        
        $this->data['patient'] = ($patient ? $patient[0] : false);
        
        $all_tests = [];
        foreach($tests as $tests){
            $all_tests[$tests->test_name] = json_decode($tests->result);     
        }
        
        $this->data['tests']   = $all_tests;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view_semen', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function cbc(){
        $this->data['meta_title']   = 'CBC';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="cbc"';
        $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/cbc', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function view_cbc($id){
        $this->data['meta_title']   = 'VIEW CBC';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="cbc"';
        $this->data['confirmation'] = null;
        
        $patient = $this->action->read('mixed_patient', ['id'=>$id]);
        $tests   = $this->action->read('mixed_report', ['patient_id'=>$id]);
        
        $this->data['patient'] = ($patient ? $patient[0] : false);
        
        $all_tests = [];
        foreach($tests as $tests){
            $all_tests[$tests->test_name] = json_decode($tests->result);     
        }
        
        $this->data['tests']   = $all_tests;
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view_cbc', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function urine(){
        $this->data['meta_title']   = 'URINE';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="urine"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/urine', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function view_urine($id){
        $this->data['meta_title']   = 'View URINE';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="urine"';
        $this->data['confirmation'] = null;
        
        $patient = $this->action->read('mixed_patient', ['id'=>$id]);
        $tests   = $this->action->read('mixed_report', ['patient_id'=>$id]);
        
        $this->data['patient'] = ($patient ? $patient[0] : false);
        
        $all_tests = [];
        foreach($tests as $tests){
            $all_tests[$tests->test_name] = json_decode($tests->result);     
        }
        
        $this->data['tests']   = $all_tests;
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view_urine', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function store(){
        if($_POST)
        {
            $id = $this->action->addAndGetInsertedID('mixed_patient', $_POST['patient']);
            $report = [];
            if(isset($_POST['test'])){
                foreach($_POST['test'] as $key=>$test){
                    $report = [
                        'patient_id' =>  $id,
                        'test_name'  => $test,
                        'result'     => json_encode($_POST['result'][$key]),
                    ];
                    $this->action->add('mixed_report', $report);
                }
            }
            $type = $_POST['patient']['type'];
            redirect('reports/mixed_reports/view_'.$type.'/'.$id, 'refresh');
        }
    }
    
    public function all(){
        $this->data['meta_title']   = 'URINE';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;
        
        $where = array();
        if (isset($_POST['show'])) {

            if(!empty($this->input->post('type'))){
                $where['mixed_patient.type'] = $this->input->post('type');
            }

            foreach ($this->input->post('date') as $key => $value) {
                if($value != NULL){
                    if($key=="from"){
                      $where["mixed_patient.date >="] = $value;
                    }

                    if($key=="to"){
                      $where["mixed_patient.date <="] = $value;
                    }
                }
            }

        }
        
        
        $join_codition = 'mixed_patient.id=mixed_report.patient_id';
        $select_field  = 'mixed_patient.*, count(mixed_report.id) as total_test';
        $this->data['patients'] = get_join('mixed_patient', 'mixed_report', $join_codition , $where, $select_field, 'mixed_patient.id', 'mixed_patient.id', 'DESC');
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function view(){
        $this->data['meta_title']   = 'URINE';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;
        $this->data['patients'] = NULL;
        $where = [];
        $join_codition = 'mixed_patient.id=mixed_report.patient_id';
        $select_field  = 'mixed_patient.*, count(mixed_report.id) as total_test';
        $this->data['patients'] = get_join('mixed_patient', 'mixed_report', $join_codition , $where, $select_field, 'mixed_patient.id');
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    
    public function delete($id=NULL){
        
        $options=array(
            'title' =>'delete',
            'emit'  =>'Data successfully Deleted!',
            'btn'   =>true
        );

        if(!empty($id)){
        $this->action->deleteData('mixed_patient', ['id'=>$id]);
        $this->data['confirmation']=message($this->action->deleteData('mixed_report',['patient_id'=>$id]),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        }
        redirect('reports/mixed_reports/all','refresh');
    }
    
    public function report_view($id){
        $this->data['meta_title']   = 'URINE';
        $this->data['active']       = 'data-target="mixed"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['confirmation'] = null;
        
        $join_codition = 'mixed_patient.id=mixed_report.patient_id';
        $select_field  = 'mixed_patient.*, count(mixed_report.id) as total_test';
        $this->data['patient'] = get_join('mixed_patient', 'mixed_report', $join_codition , ['mixed_patient.id'=>$id], $select_field, 'mixed_patient.id');
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/mixed_reports/nav', $this->data);
        $this->load->view('components/reports/mixed_reports/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
}