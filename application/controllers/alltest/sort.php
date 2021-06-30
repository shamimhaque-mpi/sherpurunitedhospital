<?php

class Sort extends Admin_Controller
{
    function __construct() {
        parent::__construct();
    }

    // show create form
    public function test()
    {
        $this->data['meta_title']   = 'Sort Test Data';
        $this->data['active']       = 'data-target="alltest_menu"';
        $this->data['subMenu']      = 'data-target="test_sort"';
        $this->data['confirmation'] = null;
        $this->data['info']         = null;

        if($_POST){
            foreach(json_decode($_POST['positionStr']) as $id=>$value){
                save_data('test', ['position'=>$value], ['id'=>$id]);
            }
            echo 1;
            die();
        }

        // get all data
        $this->data['results'] = get_result('test', ['trash' => 0], null, null, 'position', 'ASC');
        
        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/test_sort', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    // show create form
    public function group()
    {
        $this->data['meta_title']   = 'Sort Test Data';
        $this->data['active']       = 'data-target="alltest_menu"';
        $this->data['subMenu']      = 'data-target="test_group"';
        $this->data['confirmation'] = null;
        $this->data['info']         = null;

        if($_POST){
            foreach(json_decode($_POST['positionStr']) as $id=>$value){
                save_data('test_group', ['position'=>$value], ['id'=>$id]);
            }
            echo 1;
            die();
        }
        
        // get all data
        $this->data['results'] = get_result('test_group', ['trash' => 0], null, null, 'position', 'asc');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/group_sort', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    // show create form
    public function parameter()
    {
        $this->data['meta_title']   = 'Sort Test Data';
        $this->data['active']       = 'data-target="alltest_menu"';
        $this->data['subMenu']      = 'data-target="parameter_group"';
        $this->data['confirmation'] = null;
        $this->data['info']         = null;

        if($_POST){
            foreach(json_decode($_POST['positionStr']) as $id=>$value){
                save_data('parameter', ['position'=>$value], ['id'=>$id]);
            }
            echo 1;
            die();
        }
        
        // get all data
        $this->data['results'] = get_result('parameter', ['trash' => 0], null, null, 'position', 'asc');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/parameter_sort', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    
}