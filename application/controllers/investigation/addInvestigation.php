<?php

class AddInvestigation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'profile';
        $this->data['investigation'] = $this->data['confirmation'] = null;

        $this->data['group_name']=$this->action->read('group_name');
        $this->data['test_name']=$this->action->read('test_name');
    }
    
    public function index() {
        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="addMenu"';

        if(isset($_POST["create"])) {
            $test_name = $this->input->post("test_name").'_'.$this->input->post("group");
            $data = array(
                "date"              => date("Y-m-d"),
                "group"             => $this->input->post("group"),
                "name"              => $this->input->post("test_name"),
                "test_name"         => $this->input->post("test_name"),
                // "test_name"         => $test_name,
                "test_fee"          => $this->input->post("test_fee"),
                "cost"              => $this->input->post("cost"),
                "room"              => $this->input->post("room"),
                "unit"              => $this->input->post("unit"),
                "reference_value"   => $this->input->post("reference_value")
            );

            $options = array(
                "title" => "Success",
                "emit"  => "New Investigation Successfully Saved!",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add("investigation", $data), $options); 
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('investigation/addInvestigation/','refresh');  
        }

        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit() {
        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $username=$this->data['username'];
        $where=array('username'=>$username);
        $this->data['profile_info']=$this->action->read('users',$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function group() {
        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="group"';

        if ($this->input->post("submit")) {
            // replace name
            $group_name = str_replace(" ", "_", $this->input->post('group_name'));


            // create an information array
            $data=array(
                "group_name" => $group_name
            );

            // Check database group exists and insert
            if ($this->action->exists("group_name",$data)) {
                // create a message array
                $msg_array = array(
                    "title" => "warning",
                    "emit"  => "This group is allready exists!",
                    "btn"   => true
                );
                $this->data['confirmation'] = message("warning", $msg_array);
                $this->session->set_flashdata('confirmation', $this->data['confirmation']);
                redirect('investigation/addInvestigation/group','refresh');
            }else{

                // create a message array
                $msg_array = array(
                    "title" => "success",
                    "emit"  => "Group Name Added Successfully",
                    "btn"   => true
                );
                $this->data['confirmation'] = message($this->action->add('group_name', $data), $msg_array);
                $this->session->set_flashdata('confirmation', $this->data['confirmation']);
                redirect('investigation/addInvestigation/group','refresh');

            }

        }

        //--------------------------------------------------------------------
        //---------------------Delete Data Start------------------------------
        //--------------------------------------------------------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('group_name',array('id'=>$this->input->get("delete_token")));
            redirect('investigation/addInvestigation/group?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Data Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }

        //--------------------------------------------------------------------
        //---------------------Delete Data End--------------------------------
        //--------------------------------------------------------------------

        $this->data['group_names']=$this->action->read("group_name");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/group', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function test() {
        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="test"';

        // Read All Group from `group_name` table
        $this->data['allGroups'] = $this->action->readGroupBy('group_name','group_name');


        if ($this->input->post("submit")) {

            // replace name
            $test_name = str_replace(" ", "_", $this->input->post('test_name'));

            // create an information array
            $data = array(
                "test_name" => $test_name,
                "group_name" => $this->input->post('group_name')
            );

           

            // Check database test exists and insert
            if ($this->action->exists("test_name",$data)) {
                // create a message array
                $msg_array = array(
                    "title" => "warning",
                    "emit"  => "This test name is allready exists!",
                    "btn"   => true
                );
                $this->data['confirmation'] = message("warning", $msg_array);
                $this->session->set_flashdata('confirmation', $this->data['confirmation']);
                redirect('investigation/addInvestigation/test','refresh');
            }else{

                // create a message array
                $msg_array = array(
                    "title" => "success",
                    "emit"  => "Test Name Added Successfully",
                    "btn"   => true
                );
                $this->data['confirmation'] = message($this->action->add('test_name', $data), $msg_array);
                $this->session->set_flashdata('confirmation', $this->data['confirmation']);
                redirect('investigation/addInvestigation/test','refresh');

            }
        }

        //Delete Data Start
        if($this->input->get("delete_token")){
            //Deleting Message
            $this->action->deletedata('test_name',array('id'=>$this->input->get("delete_token")));
            redirect('investigation/addInvestigation/test?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Data Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }

       
        //Delete Data End
        

        // Update Test name
        if (isset($_POST['change']) ){
            $data = array('test_name' => $_POST['test_name']);
            $where = array('id' => $_POST['test_id']);
            $this->action->update('test_name',$data,$where);
            $msg_array = array(
                "title" =>"Update",
                "emit"  =>"Test Name Successfully Update",
                "btn"   => true
            );
            $this->data['confirmation'] = message("success",$msg_array);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('investigation/addInvestigation/test','refresh');
        }


        $this->data['groups']=$this->action->read('group_name');
        $this->data['tests']=$this->action->read('test_name');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/test', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function editTestName(){

        $this->data['active'] = 'data-target="investigation-menu"';
        $this->data['subMenu'] = 'data-target="test"';

        $where = array('id' => $this->input->get('id'));
        $this->data['testInfo'] = $this->action->read('test_name',$where);

        $this->data['allGroups'] = $this->action->readGroupBy('test_name','group_name');

        if (isset($_POST['change']) ){
            $data = array(
                'group_name' => $_POST['group_name'],
                'test_name' => $_POST['test_name']
            );
            $where = array('id' => $_POST['test_id']);
            $this->action->update('test_name',$data,$where);
            $msg_array = array(
                "title" =>"Update",
                "emit"  =>"Test Name Successfully Update",
                "btn"   => true
            );
            $this->data['confirmation'] = message("success",$msg_array);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('investigation/addInvestigation/test','refresh');
        }


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/investigation/nav', $this->data);
        $this->load->view('components/investigation/edit_test', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    public function getTestName() {
        $content = file_get_contents("php://input");
        $receive = json_decode($content, true);

        $groups = config_item('groups');
        $result = $groups[$receive['group']];


        echo json_encode($result);
    }
}