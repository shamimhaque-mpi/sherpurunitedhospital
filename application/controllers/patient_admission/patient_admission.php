<?php

class Patient_admission extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }

    public function index() {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="admission"';
        $this->data['confirmation'] = null;

            if($_POST){
                $data = $_POST;
                
                $data['cabin_no'] = ($_POST['admit_type'] == 'cabin' ? $_POST['cabin_no'] : null);
                $data['seat_no']  = ($_POST['admit_type'] == 'seat' ? $_POST['seat_no'] : null);
                
                $id = save_data('patient_admission', $data, [], true);
                $options = array(
                    'title' => 'Success',
                    'emit'  => '<p>Data Successfully Saved</p>',
                    'btn'   => true
                );
                $this->session->set_flashdata('confirmation', message('success', $options));
                redirect('patient_admission/patient_admission/view/'.$id, 'refresh');
            }
        
        $this->data['patients'] = get_result('patients');
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/admission', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function all_admission() {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="all_admission"';
        $this->data['confirmation'] = null;
        
        $where = ['trash'=>0];
        if($_POST && isset($_POST['search'])){
            foreach($_POST['search'] as $key=>$value){
                if($value!='' && $key=='dateFrom'){
                    $where['date >= '] = $value;
                }
                else if($value!='' && $key=='dateTo'){
                    $where['date <= '] = $value;
                }
                else if($value!=''){
                    $where[$key] = $value;
                }
            }
        }

        $this->data['admissions'] = get_result('patient_admission', $where);
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/all_admission', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    // Admission Delete
    public function admission_delete($id)
    {
        delete_data('patient_admission', ['id'=>$id]);
        $options = array(
            'title' => 'Success',
            'emit'  => '<p>Data Successfully Deleted</p>',
            'btn'   => true
        );
        $this->session->set_flashdata('confirmation', message('success', $options));
        redirect('patient_admission/patient_admission/all_admission', 'refresh');
    }
    
    // Admission Delete
    public function edit_admission($id)
    {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="all_admission"';
        $this->data['confirmation'] = null;
        
        if($_POST){
            $data = $_POST;
            $data['cabin_no'] = ($_POST['admit_type'] == 'cabin' ? $_POST['cabin_no'] : null);
            $data['seat_no']  = ($_POST['admit_type'] == 'seat' ? $_POST['seat_no'] : null);
            
            save_data('patient_admission', $data, ['id'=>$id]);
            
            $options = array(
                'title' => 'Success',
                'emit'  => '<p>Data Successfully Updated</p>',
                'btn'   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            redirect('patient_admission/patient_admission/all_admission', 'refresh');
        }
        
        $this->data['admission'] = get_result('patient_admission', ['id'=>$id])[0];
        $this->data['patients'] = get_result('patients');
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/edit_admission', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function admit_type() {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="admit_type"';
        $this->data['confirmation'] = null;

        if($_POST){
            save_data('admit_type', $_POST);
            $options = array(
                'title' => 'Success',
                'emit'  => '<p>Data Successfully Saved</p>',
                'btn'   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            redirect('patient_admission/patient_admission/admit_type', 'refresh');
        }
        
        $this->data['admit_types'] = get_result('admit_type', ['trash'=>0]);
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/admit_type', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    // admit_delete
    public function admit_delete($id)
    {
        delete_data('admit_type', ['id'=>$id]);
        $options = array(
            'title' => 'Success',
            'emit'  => '<p>Data Successfully Deleted</p>',
            'btn'   => true
        );
        $this->session->set_flashdata('confirmation', message('success', $options));
        redirect('patient_admission/patient_admission/admit_type', 'refresh');
    }
    
    // Admit Edit
    public function admit_edit($id){
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="admit_type"';
        $this->data['confirmation'] = null;
        
        if($_POST){
            save_data('admit_type', $_POST, ['id'=>$id]);
            $options = array(
                'title' => 'Success',
                'emit'  => '<p>Data Successfully Updated</p>',
                'btn'   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            redirect('patient_admission/patient_admission/admit_type', 'refresh');
        }
        
        $this->data['edit'] = get_result('admit_type', ['id'=>$id])[0];
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/admit_type', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function view($id){
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="admission"';
        $this->data['confirmation'] = null;
        
        $this->data['patient_admission'] = get_result('patient_admission', ['trash'=>0, 'id'=>$id])[0];
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/patient_view', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');  
    }
}