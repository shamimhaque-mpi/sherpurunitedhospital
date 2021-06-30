<?php
class Bill extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Bill';
        $this->data['active']     = 'data-target="bill_menu"';
    }
    
    public function index() {
        $this->data['subMenu']  = 'data-target="all"';
        $where = ['cost_bill.trash'=>0, 'cost_bill.date'=>date('Y-m-d')];
        if($_POST){
            unset($where['cost_bill.date']);
            foreach($_POST['date'] as $key=>$value){
                if($value!='' && $key=="to")
                    $where['cost_bill.date <= '] = $value;
                if($value!='' && $key=="from")
                    $where['cost_bill.date >= '] = $value;
            }
            foreach($_POST['search'] as $key=>$value){
                if($value!='')
                $where['cost_bill.'.$key] = $value;
            }
        }
        
        $this->data['all_bill'] = get_join('cost_bill', 'patient_admission', 'cost_bill.patient_id=patient_admission.id', $where, 'cost_bill.*, patient_admission.name', null, 'cost_bill.voucher', 'ASC');
        $this->data['patients'] = get_join('cost_bill', 'patient_admission', 'cost_bill.patient_id=patient_admission.id', [], 'patient_admission.name, patient_admission.id', 'patient_admission.name');
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/all_bill', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function add_bill() {
        $this->data['subMenu']  = 'data-target="add-bill"';
        
        if($_POST){
            $grand_total = 0;
            $total_qty   = 0;
            foreach($_POST['name'] as $key=>$item){
               $grand_total += $_POST['total'][$key];
               $total_qty += $_POST['quantity'][$key];
            }
            
            $cost_bill = [
                'bill_by'      => $_POST['bill_by'],
                'date'         => $_POST['date'],
                'grand_total'  => $grand_total,
                'total_qty'    => $total_qty,
                'patient_id'   => $_POST['patient_id'],
            ];
            
            $id      = save_data('cost_bill', $cost_bill, [], true);
            $voucher = get_code($id, 6);
            save_data('cost_bill', ['voucher'=>$voucher], ['id'=>$id]);
            
            foreach($_POST['name'] as $key=>$item){
                $cost_bill_items = [
                    "voucher" => $voucher,
                    "item_id" => $_POST['item_id'][$key],
                    "price"   => $_POST['price'][$key],
                    "quantity"=> $_POST['quantity'][$key],
                    "total"   => $_POST['total'][$key]
                ];
               save_data('cost_bill_items', $cost_bill_items);
            }
            
            $options = array(
                "title" => "Success",
                "emit"  => "Bill Successfully Submited",
                "btn"   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            
            redirect('bill/bill', 'refresh');
        }
        
        
        $this->data['items']    = get_result('items', ['trash'=>0]);
        $this->data['patients'] = get_result('patient_admission');
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/add_bill', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function edit($voucher) {
        $this->data['subMenu']  = 'data-target="all"';
        
        if($_POST){
            $voucher = $_POST['voucher'];
            delete_data('cost_bill', ['voucher'=>$voucher]);
            delete_data('cost_bill_items', ['voucher'=>$voucher]);
            
            $grand_total = 0;
            $total_qty = 0;
            foreach($_POST['name'] as $key=>$item){
               $grand_total += $_POST['total'][$key];
               $total_qty += $_POST['quantity'][$key];
            }
            
            $cost_bill = [
                'bill_by'      => $_POST['bill_by'],
                'date'         => $_POST['date'],
                'patient_id'   => $_POST['patient_id'],
                'grand_total'  => $grand_total,
                'total_qty'    => $total_qty,
                'voucher'      => $voucher
            ];
            
            save_data('cost_bill', $cost_bill, [], true);
            
            foreach($_POST['name'] as $key=>$item){
                $cost_bill_items = [
                    "voucher" => $voucher,
                    "item_id" => $_POST['item_id'][$key],
                    "price"   => $_POST['price'][$key],
                    "quantity"=> $_POST['quantity'][$key],
                    "total"   => $_POST['total'][$key]
                ];
               save_data('cost_bill_items', $cost_bill_items);
            }
            
            $options = array(
                "title" => "Success",
                "emit"  => "Bill Successfully Updated",
                "btn"   => true
            );
            $this->session->set_flashdata('confirmation', message('success', $options));
            
            redirect('bill/bill', 'refresh');
        }
        
        $this->data['voucher']  = $voucher;
        $this->data['items']    = get_result('items', ['trash'=>0]);
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/edit_bill', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function view($id=null){
        $this->data['subMenu']  = 'data-target="all"';
        
        $this->data['bill']  = $bill = get_join('cost_bill', 'patient_admission', 'cost_bill.patient_id=patient_admission.id', ['cost_bill.id'=>$id], 'patient_admission.*, cost_bill.*, cost_bill.date as date', 'patient_admission.name')[0];
        
        $join_condi          = 'cost_bill_items.item_id=items.id';
        $where               = ['cost_bill_items.voucher'=>$bill->voucher];
        // Get Resource
        $this->data['items'] = get_join('cost_bill_items', 'items', $join_condi, $where, 'cost_bill_items.*, items.name');
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/bill/nav', $this->data);
        $this->load->view('components/bill/view_bill', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }
    
    public function delete($voucher){
        delete_data('cost_bill', ['voucher'=>$voucher]);
        delete_data('cost_bill_items', ['voucher'=>$voucher]);
        
        $options = array(
            "title" => "Success",
            "emit"  => "Data Successfully Deleted",
            "btn"   => true
        );
        $this->session->set_flashdata('confirmation', message('success', $options));
        
        redirect('bill/bill', 'refresh');
    }
}