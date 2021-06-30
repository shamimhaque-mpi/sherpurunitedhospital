<?php
class Procedure extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title']   = 'procedure';
        $this->data['active']       = 'data-target="procedure"';
        $this->data['subMenu']      = 'data-target="add"';
        $this->data['confirmation'] = null;
        
        $this->data['procedures']  = $this->action->read('procedures', array()); 
        $this->data['test']  = $this->action->read('test_name', array()); 
        $this->data['allTestName'] = $this->action->read('investigation'); 
        
        if($this->input->post('createProcedureBtn')) {
            
            $data = [
                'referral_value' => $this->input->post('referral_value'),
                'parameter' => $this->input->post('parameter'),
                'test_name' => $this->input->post('test_name'),
                'unit'      => $this->input->post('unit')
            ];
            
            $options1=array(
                'title' =>"success",
                'emit'  =>"Procedure successfully saved!",
                'btn'   =>true
            );
            
            if($id = $this->action->read('procedures', ['test_name'=>$this->input->post('test_name')])){
                $id = $id[0]->id;
                $this->data['confirmation']=message($this->action->update("procedures", $data, ['id'=>$id]), $options1);
            }else{
                $this->data['confirmation']=message($this->action->add("procedures", $data), $options1);
            }
            
            
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            
            return redirect('procedure/procedure/procedureList', 'refresh');
            
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/procedure/nav', $this->data);
        $this->load->view('components/procedure/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function procedureList(){
        $this->data['meta_title']   = 'procedure';
        $this->data['active']       = 'data-target="procedure"';
        $this->data['subMenu']      = 'data-target="list"';
        $this->data['confirmation'] = null;

        $where = ['deleted_at'=> NULL];
        

        if($_POST && isset($_POST['test_name'])){
            $where['test_name'] = $_POST['test_name'];
        }
        $this->data['procedures']   = $this->action->read('procedures', $where);
        $this->data['tests']        = $this->getTest();

        $this->data['allTestName'] = $this->action->read('test_name');
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/procedure/nav', $this->data);
        $this->load->view('components/procedure/list', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    public function procedureEdit($id){
        $this->data['meta_title']   = 'procedure';
        $this->data['active']       = 'data-target="procedure"';
        $this->data['subMenu']      = 'data-target="list"';
        $this->data['confirmation'] = null;
        
        $where = array("id" => $id);
        
        $this->data['procedure'] = $this->action->read('procedures', $where);
        $this->data['test']  = $this->action->read('test_name', array()); 
             
        if($this->input->post('updateProcedureBtn')) {
            
            $data = [
                'referral_value' => $this->input->post('referral_value'),
                'parameter' => $this->input->post('parameter'),
                'test_name' => $this->input->post('test_name'),
                'unit'      => $this->input->post('unit')
            ];
            
            $options1=array(
                'title' =>"success",
                'emit'  =>"Procedure successfully saved!",
                'btn'   =>true
            );
            
            $this->data['confirmation']=message($this->action->update("procedures", $data, $where), $options1);
            $this->session->set_flashdata("confirmation", $this->data['confirmation']);
            
            return redirect('procedure/procedure/procedureList', 'refresh');
            
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/procedure/nav', $this->data);
        $this->load->view('components/procedure/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    
    
    public function delete($id = NULL){
        
        $where = array("id" => $id);
        // $data = array("deleted_at" => date('Y-m-d H:i:s'));
        
        
        $msg_array=array(
            "title" =>"delete",
            "emit"  =>"Product Successfully Deleted",
            "btn"   =>true
        );
        
        // $this->data['confirmation'] = message($this->action->update('procedures', $data, $where), $msg_array);
        $this->data['confirmation'] = message($this->action->deleteData('procedures', $where), $msg_array);
        $this->session->set_flashdata("confirmation", $this->data['confirmation']);
        
        redirect("procedure/procedure/procedureList", "refresh");
    }
    
    
    public function getTest(){
        $tests = $this->action->read('test');
        $temp  = [];
        foreach($tests as $test) {
            $temp[$test->id] = $test;
        }
        return $temp;
    }

}
