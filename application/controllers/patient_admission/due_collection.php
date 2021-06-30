<?php

class Due_collection extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }

    public function index($id) {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="all_collection"';
        $this->data['confirmation'] = null;

        if($_POST){
            save_data('due_collection', $_POST);
            $update_data = [
                'due'  => $_POST['due'],
                'paid' => $_POST['paid'] + $_POST['previous_paid'],
            ];
            print_r($update_data);
            save_data('patient_admission', $update_data, ['id'=>$_POST['admission_id']]);
            
            $options = array(
                'title' => 'Success',
                'emit'  => '<p>Data Successfully Updated</p>',
                'btn'   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            redirect('patient_admission/due_collection/all', 'refresh');
        }
        
        $this->data['patient_admission'] = get_result('patient_admission', ['id'=>$id])[0];
           
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/due_collection', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function all(){
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="patient_admission_menu"';
        $this->data['subMenu']      = 'data-target="all_collection"';
        $this->data['confirmation'] = null;
        
        $where = [];
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
        
        $this->data['all_collection'] = get_result('due_collection', $where);
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/patient_admission/nav', $this->data);
        $this->load->view('components/patient_admission/all_collection', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function delete($id){
        $due_collection = get_result('due_collection', ['id'=>$id]);
        
        $patient_admission = get_result('patient_admission', ['id'=>$due_collection[0]->admission_id]);
        
        if($due_collection && $patient_admission){
            $update = [
                'paid'=> ($patient_admission[0]->paid - $due_collection[0]->paid),
                'due'=> ($patient_admission[0]->due + $due_collection[0]->paid)
            ];
            save_data('patient_admission', $update ,['id'=>$due_collection[0]->admission_id]);
            delete_data('due_collection', ['id'=>$id]);
            
            $options = array(
                'title' => 'Success',
                'emit'  => '<p>Data Successfully Deleted</p>',
                'btn'   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            redirect('patient_admission/due_collection/all', 'refresh');
        }
    }

}