<?php

class Income extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'income';
    }
    
    public function index() {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="field"';        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/fieldincome', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function add(){
        $data=array(
            "income_field"=>$this->input->post('field_income'),
            "code"        =>incomeFiledId('income_field')
        );      

        $options1=array(
            'title' =>"update",
            'emit'  =>"Field of income successfully update!",
            'btn'   =>true
        );

        $options2=array(
            'title' =>"success",
            'emit'  =>"Field of income successfully saved!",
            'btn'   =>true
        );

        if($this->action->exists('income_field',$data)){
            $this->data['confirmation']=message($this->action->update("income_field",$data,$data),$options1);
        }else{
            $this->data['confirmation']=message($this->action->add("income_field",$data),$options2);
        }

        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("income/income","refresh");
    }
    
    public function Edit_field($id=null) {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="field"'; 
        
        
        $this->data['getField'] = $this->action->read('income_field', array('id'=>$id));
        
        
        if(isset($_POST['submit'])){
            
            $data=array(
            "income_field"=>trim($this->input->post('field_income')),
            "code"        =>$this->input->post('code')
            );   
            $cond = array(
            'id'=>$id,
            'code'=>$this->input->post('code')
            );
            
            $options1=array(
            'title' =>"update",
            'emit'  =>"Field of income successfully update!",
            'btn'   =>true
            );
            
            $this->data['confirmation']=message($this->action->update("income_field",$data,$cond),$options1);
            
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("income/income","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/edit_field', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function newincome() {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="new"';
        
        $this->data['income_fields']=$this->action->readGroupBy('income_field',"income_field");

        // print_r($this->data['income_fields']);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/new', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


    public function add_new_income(){
        $data=array(
         "date"        =>$this->input->post('date'),
         "income_field"  =>$this->input->post('income_field'),
         "description" =>$this->input->post('description'),
         "amount"      =>$this->input->post('amount'),
         "income_by"    =>$this->input->post('income_by')
        );      

        $options=array(
            'title' =>"success",
            'emit'  =>"Income successfully saved!",
            'btn'   =>true
        );
        
        $this->data['confirmation']=message($this->action->add("income",$data),$options);        

        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("income/income/newincome","refresh");
    }

    public function allincome() {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['income_fields'] =$this->action->readGroupBy('income_field',"income_field");

        $where=array('trash'=>0);

        if(isset($_POST['show'])){
            foreach ($_POST['search'] as $key => $value) {
                if($value != NULL){
                    $where[$key] = $value;
                }
            }

            foreach ($_POST['date'] as $key => $value) {
                if($value != NULL && $key == "from"){
                    $where['date >='] = $value;
                }
                
                if($value != NULL && $key == "to"){
                    $where['date <='] = $value;
                }
            }
            //print_r($where);
        }

        $this->data['incomes']=$this->action->read('income', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function edit($id=NULL) {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['income']=$this->action->read('income',array('id'=>$id));
        $this->data['income_fields']=$this->action->readGroupBy('income_field',"income_field");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function update_income($id=NULL){
         $data=array(
             "date"        =>$this->input->post('date'),
             "income_field"  =>$this->input->post('income_field'),
             "description" =>$this->input->post('description'),
             "amount"      =>$this->input->post('amount'),
             "income_by"    =>$this->input->post('income_by')
        );      

        $options=array(
            'title' =>"update",
            'emit'  =>"Income successfully updated!",
            'btn'   =>true
        );
        
        $this->data['confirmation']=message($this->action->update("income",$data,array('id'=>$id)),$options);        

        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("income/income/allincome","refresh");

    }

    public function delete_field($id=NULL){
        $options=array(
            'title' =>'delete',
            'emit'  =>'This field of income successfully Deleted!',
            'btn'   =>true
        );
        $where=array("id"=>$id);
        $this->data['confirmation']=message($this->action->update('income_field', ['trash'=>1], $where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('income/income','refresh');
    }

     public function delete_income($id=NULL){
        $where = array("id"=>$id);
        $data =  array('trash'=>1);
        $options=array(
            'title' =>'delete',
            'emit'  =>'Income successfully Deleted!',
            'btn'   =>true
        );

        $this->data['confirmation']=message($this->action->update('income',$data,$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('income/income/allincome','refresh');
    }



}