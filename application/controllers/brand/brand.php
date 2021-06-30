<?php
class Brand extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->holder();
        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title']   = 'Company';
        $this->data['active']       = 'data-target="brand_menu"';
        $this->data['subMenu']      = 'data-target="add-new"';
        $this->data['confirmation'] = null;
        


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/brand/nav', $this->data);
        $this->load->view('components/brand/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function add() {  
        $this->data['confirmation'] = null;   
        // replace brand
        $slug = str_replace(' ', "_", strtolower($this->input->post('brand')));

        // data array
        $data = array(
            'date'          => date('Y-m-d'),
            'name'          => $this->input->post('brand'),        
            'trash'         =>0
        );

        // message array
        $options = array(
            'title' => 'success',
            'emit'  => 'Company Successfully Saved!',
            'btn'   => true
        );
        $options1 = array(
            'title' => 'success',
            'emit'  => 'This company allready exists!',
            'btn'   => true
        );

        // check existence and insert data
        if($this->action->exists('brand',$data)){
            $this->data['confirmation'] = message('warning', $options1);             
        }else{
            $this->data['confirmation'] = message($this->action->add('brand', $data), $options);             
        }
        
        // set flashdata
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('brand/brand', 'refresh');
    }

    public function allbrand() {
        $this->data['meta_title'] = 'Company';
        $this->data['active'] = 'data-target="brand_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;



        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/brand/nav', $this->data);
        $this->load->view('components/brand/view-all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function editbrand() {       
        $this->data['active']       = 'data-target="brand_menu"';
        $this->data['subMenu']      = 'data-target="all"';
        $this->data['category']     = null;

        $this->data['brand']   = $this->action->read('brand');

        $where = array('id' => $this->input->get('id'));
        $this->data['brand']  = $this->action->read('brand', $where);    

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/brand/nav', $this->data);
        $this->load->view('components/brand/edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    public function edit() {  
        $this->data['confirmation'] = null;   
        $slug = str_replace(' ', "_", strtolower($this->input->post('brand')));

        $data = array(
          'name'        =>$this->input->post('brand'),      
        );

        $msg_array = array(
            'title' => 'update',
            'emit'  => 'Brand Successfully Updated!',
            'btn'   => true
        );

        $this->data['confirmation'] = message($this->action->update('brand', $data, array('id' => $this->input->get('id'))), $msg_array);
        
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
       redirect('brand/brand/allbrand', 'refresh');
    }


    public function delete($id=NULL) {
      $this->data['confirmation'] = null;     
      $where = array('id'=>$id);
        $msg_array = array(
            'title' => 'delete',
            'emit'  => 'Company  Successfully Deleted!',
            'btn'   => true
        );

        $this->data['confirmation']=message($this->action->deleteData('brand',$where),$msg_array);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('brand/brand/allbrand','refresh');
    }

    private function holder(){  
        if($this->session->userdata('holder') == null){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
