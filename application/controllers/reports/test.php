<?php
class Test extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

    }

    public function index(){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="tests"';
        $this->data['subMenu']      = 'data-target="add"';
        $this->data['confirmation'] = null;
        
        $this->data['all_patient'] = $this->db->query("SELECT * FROM `patients` WHERE pid NOT IN (SELECT pid FROM `patient_histories`)")->result();

        $result = [];
        $patient_info = [];
        if($_POST){
            
            $info = get_join('diagnosis', ['test_group', 'test'], ['diagnosis.group_id=test_group.id', 'diagnosis.test_id=test.id'], ['diagnosis.pid' => $_POST['pid'], 'test_group.trash' => 0, 'test.trash' => 0], ['diagnosis.*', 'test_group.remarks', 'test_group.group_name', 'test.test_name'], null, 'test.position', 'ASC');
            
            $result = [];
            if(!empty($info)){
                foreach($info as $key => $value){
                    
                    $result[$key]['group_id']   = $value->group_id;
                    $result[$key]['group_name'] = $value->group_name;
                    $result[$key]['test_id']    = $value->test_id;
                    $result[$key]['test_name']  = $value->test_name;
                    
                    $where = [
                        'test_mapping.test_id' => $value->test_id,
                        'parameter.trash' => 0,
                    ];
                    
                    $parameter = get_join('test_mapping', 'parameter', 'test_mapping.parameter_id=parameter.id', $where, ['parameter.*'], null, 'parameter.position', 'ASC');
                    
                    $result[$key]['parameters'] = $parameter;
                }
            }
            
            $patient_info = $this->action->read('patients', ['pid'=>$_POST['pid']]);

        }

        $this->data['all_test'] = $result;
        $this->data['patient_info'] = $patient_info;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/nav', $this->data);
        $this->load->view('components/reports/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function testList(){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="tests"';
        $this->data['subMenu']      = 'data-target="list"';
        $this->data['confirmation'] = null;
        
        $result = $this->patients($_POST);
        
        $result = $result->result();
        $this->data['patient_histories'] = $result;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/nav', $this->data);
        $this->load->view('components/reports/list', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function patients($request=null){
        if($request){
            $where='';
            foreach($request as $key=>$field){
                if($field!=''){
                    if($key=='dateFrom' || $key=='dateTo'){
                        ($key=='dateFrom'? ($where .= " AND patient_histories.created_at >= '".($field.' 00:00:00')."'") : '');
                        ($key=='dateTo'? ($where .= " AND patient_histories.created_at <= '".($field.' 23:59:59')."'") : '');
                    }
                    else{
                        $where .= " AND patients.$key = '$field'";
                    }
                }
            }
            return $this->db->query(
                "SELECT patients.*, patient_histories.test_name, patient_histories.created_at FROM patient_histories JOIN patients ON patient_histories.pid = patients.pid  WHERE patients.pid IN (SELECT pid FROM `patient_histories`) $where GROUP BY patients.pid"
            );
        }
        else{
            return $this->db->query(
                "SELECT patients.*, patient_histories.test_name, patient_histories.created_at FROM patient_histories JOIN patients ON patient_histories.pid = patients.pid  WHERE patients.pid IN (SELECT pid FROM `patient_histories`) GROUP BY patients.pid"
            );
        }
    }
    
    public function view($pid=null){
        
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="tests"';
        $this->data['subMenu']      = 'data-target="list"';
        $this->data['confirmation'] = null;
        
        $patient = [];
        $result  = [];
        if($pid) {
            $patient_info = $this->action->read('patients', ['pid'=>$pid]);
            $info   = get_join('diagnosis', ['test_group', 'test'], ['diagnosis.group_id=test_group.id', 'diagnosis.test_id=test.id'], ['diagnosis.pid' => $pid, 'test_group.trash' => 0, 'test.trash' => 0], ['diagnosis.*', 'test_group.group_name', 'test_group.remarks', 'test.test_name'], null, 'test_group.position', 'ASC');
            $result = [];
            if(!empty($info)){
                foreach($info as $key => $value){
                    
                    $result[$key]['pid']        = $value->pid;
                    $result[$key]['group_id']   = $value->group_id;
                    $result[$key]['group_name'] = $value->group_name;
                    $result[$key]['test_id']    = $value->test_id;
                    $result[$key]['test_name']  = $value->test_name;
                    $result[$key]['remarks']    = $value->remarks;
                    
                    $where = [
                        'patient_histories.pid' => $value->pid,
                        'patient_histories.test_id' => $value->test_id,
                        'parameter.trash' => 0,
                    ];
                    
                    $parameter = get_join('patient_histories', 'parameter', 'patient_histories.parameter_id=parameter.id', $where, ['parameter.*', 'patient_histories.value'], null , 'parameter.position', 'ASC');
                    
                    $result[$key]['parameters'] = $parameter;
                }
            }
        }
        
        $this->data['patient_info'] = $patient_info;
        $this->data['all_test'] = $result;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/nav', $this->data);
        $this->load->view('components/reports/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function edit($pid){
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="tests"';
        $this->data['subMenu']      = 'data-target="list"';
        $this->data['confirmation'] = null;
        
        $this->data['all_patient'] = $this->action->read('patients');
        // $this->data['all_test']  = $this->action->read('test'); 
        
        $patient = [];
        $result = [];
        if($pid) {
            
            $info = get_join('diagnosis', ['test_group', 'test'], ['diagnosis.group_id=test_group.id', 'diagnosis.test_id=test.id'], ['diagnosis.pid' => $pid, 'test_group.trash' => 0, 'test.trash' => 0], ['diagnosis.*', 'test_group.group_name', 'test.test_name']);
            
            $result = [];
            if(!empty($info)){
                foreach($info as $key => $value){
                    
                    $result[$key]['pid']        = $value->pid;
                    $result[$key]['group_id']   = $value->group_id;
                    $result[$key]['group_name'] = $value->group_name;
                    $result[$key]['test_id']    = $value->test_id;
                    $result[$key]['test_name']  = $value->test_name;
                    
                    $where = [
                        'patient_histories.pid' => $value->pid,
                        'patient_histories.test_id' => $value->test_id,
                        'parameter.trash' => 0,
                    ];
                    
                    $parameter = get_join('patient_histories', 'parameter', 'patient_histories.parameter_id=parameter.id', $where, ['parameter.*', 'patient_histories.value']);
                    
                    $result[$key]['parameters'] = $parameter;
                }
            
                $patient_info = $this->action->read('patients', ['pid'=>$pid]);
            }
        }
        
        $this->data['patient_info'] = $patient_info;
        $this->data['all_test'] = $result;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reports/nav', $this->data);
        $this->load->view('components/reports/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function submit_report(){
        if($_POST){
            
            // dd($_POST);
            $patient_info = [
                'patient_id'=>$_POST['patient_id'],    
                'patient_name'=>$_POST['patient_name'],    
                'patient_pid'=>$_POST['patient_pid'],     
            ];
            
            $options = array(
                "title" => "Success",
                "emit"  => "Report Successfully Listed!",
                "btn"   => true
            );
            //$this->data['confirmation'] = message($this->action->add('patient_info', $patient_info) , $options);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            
            foreach($_POST['test'] as $key=>$test){
                //dd($test);
                foreach($_POST['parameter'][$key] as $key2=>$parameter){
                    $patient_history = [
                        'patient_id'    => $_POST['patient_id'],  
                        'test_id'       => $test[0],  
                        'parameter_id'  => $parameter,  
                        'standard'      => $_POST['standard'][$key][$key2],
                        'value'         => $_POST['value'][$key][$key2],
                    ];
                    save_data('patient_histories', $patient_history);
                }
            }
            
            return redirect('/reports/test/testList', 'refresh');
        }
    }
    
    public function report_delete($pid)
    {
        $options = array(
            "title" => "danger",
            "emit"  => "Delete Successful!",
            "btn"   => true
        );
        $this->data['confirmation'] = message($this->action->deleteData('patient_histories', array('pid'=>$pid)) , $options);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        
        return redirect('/reports/test/testList', 'refresh');
        
    }
    
    // Patient Information
    public function patient_info(){
        
        if($_POST){
            foreach($_POST['parameter_id'] as $key=>$parameter){
                $record = [
                    'pid'           => $_POST['pid'],
                    'parameter_id'  => $parameter,
                    'test_id'       => $_POST['test_id'][$key],
                    'value'         => $_POST['result'][$key],
                    'description'   => $_POST['remarks'],
                ];
                $options = array(
                    "title" => "Success",
                    "emit"  => "Report Successfully Listed!",
                    "btn"   => true
                );
                save_data('patient_histories', $record);
                $this->data['confirmation'] = message('success' , $options);
                $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            }
            
            $patient = $this->action->read('patients', ['pid'=>$_POST['pid']])[0];
            
            /*
            //Sending SMS Start
	        $content = "Dear ".$patient->name."\nYour Report Is Ready, Please Collect Your Report.\nRegards,Tithi Hospital";
            $num        = $patient->contact;
            $message    = send_sms($num, $content);

            $insert = array(
                'delivery_date'     => date('Y-m-d'),
                'delivery_time'     => date('H:i:s'),
                'mobile'            => $num,
                'message'           => $content,
                'total_characters'  => strlen($content),
                'total_messages'    => 1,
                'delivery_report'   => $message
            );
            $this->action->add('sms_record', $insert);
            */
            
            return redirect('reports/test/view/'.$_POST['pid']);
        }
        return redirect()->back();
    }
    // Patient Information
    public function patient_info_update($pid){
        
        if($_POST){
            $this->action->deleteData('patient_histories', array('pid'=>$pid));
            foreach($_POST['parameter_id'] as $key=>$parameter){
                $record = [
                    'pid'           => $_POST['pid'],
                    'parameter_id'  => $parameter,
                    'test_id'       => $_POST['test_id'][$key],
                    'value'         => $_POST['result'][$key],
                    'description'   => $_POST['remarks'],
                ];
                save_data('patient_histories', $record);
            }  
            
            $options = array(
                "title" => "Success",
                "emit"  => "Report Successfully Updated",
                "btn"   => true
            );    
            $this->data['confirmation'] = message('success' , $options);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);      
            return redirect('reports/test/testList');
        }
        return redirect()->back();
    }
 }
