<?php
class Test_mapping extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->holder();
    }

    public function index() {
        $this->data['meta_title'] = 'Test Mapping';
        $this->data['active'] = 'data-target="alltest_menu"';
        $this->data['subMenu'] = 'data-target="test_mapping"';
        $this->data['confirmation'] = null;

        if($_POST){
            $msg_array = array(
                'title' => 'Success',
                'emit'  => 'Successfully Inserted',
                'btn'   => true
            );
            $this->action->deleteData('test_mapping', ['test_id'=>$_POST['test_id']]);
            if(isset($_POST['parameter_id'])){
                foreach ($_POST['parameter_id'] as $key => $parameter) {
                    $this->data['confirmation'] = message($this->action->add('test_mapping', 
                    [
                        "test_id"=>$_POST['test_id'],
                        "parameter_id" =>$parameter,
                    ]), $msg_array);
                }
            }else{
                $this->data['confirmation'] = message($this->action->add('test_mapping', 
                [
                    "test_id"=>$_POST['test_id'],
                    "parameter_id" =>'',
                ]), $msg_array);
            }
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('alltest/test_mapping', 'refresh');
        }


        $this->load->view($this->data['privilege']. '/includes/header', $this->data);
        $this->load->view($this->data['privilege']. '/includes/aside', $this->data);
        $this->load->view($this->data['privilege']. '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/test_mapping', $this->data);
        $this->load->view($this->data['privilege']. '/includes/footer', $this->data);
    }

    public function store(){

    }

    public function delete($id = null){
        if (!empty($id)){
            $msg = [
                'title'=>'delete',
                'emit'=>'This Data Successfully Deleted!',
                'btn'=>true
            ];
        }
    }

    public function getTestMapping(){
        if($_POST){
            $test_mapping = $this->action->read('test_mapping', ['test_id'=>$_POST['test_id']]);
            $ids = [];
            foreach ($test_mapping as $key=>$value) {
                $ids[$key] = $value->parameter_id;
            }
            echo json_encode($ids);     
        }
    }


    private function holder(){
        if($this->session->userdata('holder') == null){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
}