<?php
class Reagent extends Admin_Controller {

     function __construct() {
        parent::__construct();
        $this->holder();
        $this->load->model('action');
    }
     
    public function index() {
        $this->data['meta_title'] = 'Reagent';
        $this->data['active'] = 'data-target="reagent_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege']. '/includes/header', $this->data);
        $this->load->view($this->data['privilege']. '/includes/aside', $this->data);
        $this->load->view($this->data['privilege']. '/includes/headermenu', $this->data);
        $this->load->view('components/reagent/nav', $this->data);
        $this->load->view('components/reagent/add', $this->data);
        $this->load->view($this->data['privilege']. '/includes/footer', $this->data);
    }

    public function addReagent() {  
        $this->data['confirmation'] = null;     

        $slug = str_replace(' ', '_', strtolower($this->input->post('reagent')));
        $slug = str_replace(' ', '_', strtolower($this->input->post('reagent')));
        $data = array(
            'date'          => date('Y-m-d'),
            'reagent'      => $this->input->post('reagent'),
            'slug'          => $slug
        );

        $msg_array = array(
            'title' => 'success',
            'emit'  => 'Reagent Successfully Saved!',
            'btn'   => true
        );

        if(! $this->action->exists('reagent', array('slug' => $slug))){
            $this->data['confirmation'] = message($this->action->add('reagent', $data), $msg_array);
        } else{
            $options = array(
                'title' => 'warning',
                'emit'  => '<p>This reagent already exists!</p>',
                'btn'   => true
            );

            $this->data['confirmation'] = message('warning', $options); 
        }

        $this->session->set_flashdata('confirmation', $this->data['confirmation']);

        redirect('reagent/reagent','refresh');
    }


    public function allReagent() {
        $this->data['meta_title'] = 'Reagent';
        $this->data['active'] = 'data-target="reagent_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;  
      
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent/nav', $this->data);
        $this->load->view('components/reagent/view-all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

     public function editReagent($id = NULL) {       
        $this->data['active'] = 'data-target="reagent_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['reagent'] = null;

        $this->data['id'] = $id;
        $this->data['get_reagent'] = $this->action->read("reagent", array('id' => $id));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent/nav', $this->data);
        $this->load->view('components/reagent/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function edit($id=NULL) {  
        $this->data['confirmation'] = null;   

        $slug = str_replace(' ', '_' , strtolower($this->input->post('reagent')));
        $data = array(
            'reagent'      => $this->input->post('reagent'),
            'slug'         => $slug
        );

        $options = array(
        'title' => 'update',
        'emit'  => 'Reagent Successfully Updated!',
        'btn'   => true
        );

        $status = $this->action->update('reagent', $data, array('id' => $id));
        $this->data['confirmation'] = message($status, $options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        
        redirect('reagent/reagent/allReagent','refresh');
    }


   public function deleteReagent($id=NULL) {  
      $this->data['confirmation'] = null;     

       $msg_array=array(
            'title'=>'delete',
            'emit'=>'Reagent Successfully Deleted!',
            'btn'=>true
         );

        $this->data['confirmation']=message($this->action->deleteData('reagent',array('id'=>$id)),$msg_array);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('reagent/reagent/allReagent','refresh');

    }
  private function holder(){  
        if($this->session->userdata('holder') == null){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
