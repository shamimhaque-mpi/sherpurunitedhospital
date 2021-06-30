<?php
class Group_mapping extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->holder();
    }

    public function index() {
        $this->data['meta_title'] = 'Test Mapping';
        $this->data['active'] = 'data-target="alltest_menu"';
        $this->data['subMenu'] = 'data-target="group_mapping"';
        $this->data['confirmation'] = null;

        if($_POST){
            $msg_array = array(
                'title' => 'Success',
                'emit'  => 'Successfully Inserted',
                'btn'   => true
            );
            $this->action->deleteData('group_mapping', ['group_id'=>$_POST['group_id']]);
            if(isset($_POST['test_id'])){
                foreach ($_POST['test_id'] as $key => $test) {
                    $this->data['confirmation'] = message($this->action->add('group_mapping', 
                    [
                        "group_id"=>$_POST['group_id'],
                        "test_id" =>$test,
                    ]), $msg_array);
                }
            }else{
                $this->data['confirmation'] = message($this->action->add('group_mapping', 
                [
                    "group_id"=>$_POST['group_id'],
                    "test_id" =>'',
                ]), $msg_array);
            }
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('alltest/group_mapping', 'refresh');
        }

        $this->load->view($this->data['privilege']. '/includes/header', $this->data);
        $this->load->view($this->data['privilege']. '/includes/aside', $this->data);
        $this->load->view($this->data['privilege']. '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/group_mapping', $this->data);
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


    private function holder(){
        if($this->session->userdata('holder') == null){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }


    public function getGroupMapping(){
        if($_POST){
            $group_mapping = $this->action->read('group_mapping', ['group_id'=>$_POST['group_id']]);
            $ids = [];
            foreach ($group_mapping as $key=>$value) {
                $ids[$key] = $value->test_id;
            }
            echo json_encode($ids);
        }
    }
}