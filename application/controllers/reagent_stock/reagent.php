<?php

class Reagent extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Reagent';
        $this->data['active'] = 'data-target="reagent_stock_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        $this->data['ID'] = generateUniqueStockId('reagent_stock'); 

        // save Stock Reagent data
        if(isset($_POST['save'])){
           $this->data['confirmation']=$this->saveReagnetRecord($_POST['name']);
           $this->session->set_flashdata('confirmation', $this->data['confirmation']);
           redirect('reagent_stock/reagent','refresh');
        } 
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent_stock/nav', $this->data);
        $this->load->view('components/reagent_stock/add', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    private function saveReagnetRecord($products = array()) {
        foreach ($products as $key => $value) {
            $data = array(
                'date'            => $this->input->post('date'),
                'voucher_no'      => $this->input->post('voucher_number'),
                'reagent'         => $_POST['name'][$key],
                'quantity'        => $_POST['quantity'][$key],
                'expire_date'     => $_POST['expire_date'][$key],
                'status'          => "available"
            );
            $this->action->add('reagent_stock', $data);        
        }
        
        $options = array(
            'title'=>'success',
            'emit'=>'Reagent stock successfully Completed!',
            'btn'=>true
        );

        return message('success', $options);
    }

    public function show() {
        $this->data['meta_title'] = 'All Reagent';
        $this->data['active'] = 'data-target="reagent_stock_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['result'] = null;

        // fetch all reagent
        $this->data['allReagent'] = $this->action->read('reagent');
        
        $this->data['result'] = $this->action->read('reagent_stock', array('quantity >'=>0));

        if(isset($_POST['show'])){
            $where = array(
                'quantity >'=>0
            );

            foreach($_POST['search'] as $key => $val){
                if(!empty($val)){
                    $where[$key] = $val;
                }
            }

            foreach($_POST['date'] as $key => $val){
                if($val != null && $key == 'from'){
                    $where['date >='] = $val;
                }

                if($val != null && $key == 'to'){
                    $where['date <='] = $val;
                }
            }
            $this->data['result'] = $this->action->read('reagent_stock', $where);
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent_stock/nav', $this->data);
        $this->load->view('components/reagent_stock/show', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function view() {
        $this->data['meta_title'] = 'reagent_stock';
        $this->data['active'] = 'data-target="reagent_stock_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $where = array('voucher_no' => $this->input->get('vno'));
        $this->data['info'] = $this->action->read('reagent_stock', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent_stock/nav', $this->data);
        $this->load->view('components/reagent_stock/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

  public function delete(){
        $where = array('id' => $this->input->get('id'));
        $reagentInfo = $this->action->read('reagent_stock', $where);

        $options= array(
            'title' => 'delete',
            'emit'  => 'Successfully Deleted!',
            'btn'   => true
        );

       $this->data['confirmation']=message($this->action->deletedata('reagent_stock', $where), $options);
       $this->session->set_flashdata("confirmation",$this->data['confirmation']);
       redirect("reagent_stock/reagent/show","refresh");
    }

    /*Function Out Stock*/
    public function outstock() {
        $this->data['meta_title'] = 'Reagent Out Stock';
        $this->data['active'] = 'data-target="reagent_stock_menu"';
        $this->data['subMenu'] = 'data-target="outstock"';
        $this->data['confirmation'] = null;

        $this->data['stockID'] = generateUniqueStockId('outstock',6); 

        // save Stock Reagent data
        if(isset($_POST['save'])){
           $this->data['confirmation'] = $this->saveOutstock($_POST['name']);
           $this->session->set_flashdata('confirmation', $this->data['confirmation']);
           redirect('reagent_stock/reagent/outstock','refresh');
        } 
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/reagent_stock/nav', $this->data);
        $this->load->view('components/reagent_stock/outstock', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    private function saveOutstock($products = array()) {
        foreach ($products as $key => $value) {
            $data = array(
                'date'                  => $this->input->post('date'),
                'voucher_no'            => $this->input->post('voucher_number'),
                'stock_voucher_no'      => $_POST['stock_voucher_no'][$key],
                'reagent'               => $_POST['name'][$key],
                'quantity'              => $_POST['quantity'][$key],
            );
            $this->action->add('outstock', $data);

            $where = array(
                'voucher_no' => $_POST['stock_voucher_no'][$key],
                'reagent'    => $_POST['name'][$key]
            );

            $quantity = $_POST['quantity'][$key];
            
            $old_quantity = $this->action->read('reagent_stock', $where)[0]->quantity;
            $updated_quantity = ($old_quantity-$quantity);

            $this->action->update('reagent_stock', array('quantity'=>$updated_quantity), $where);   
        }
        
        $options = array(
            'title'=>'success',
            'emit'=>'Reagent stock successfully Completed!',
            'btn'=>true
        );

        return message('success', $options);
    }

}