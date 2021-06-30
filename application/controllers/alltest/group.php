<?php

class Group extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->holder();
        $this->load->model('action');
    }

    public function index()
    {
        $this->data['meta_title']   = 'Group';
        $this->data['active']       = 'data-target="alltest_menu"';
        $this->data['subMenu']      = 'data-target="group"';
        $this->data['confirmation'] = null;

        if (isset($_POST['save'])) {
            unset($_POST['save']);
            $msg_array                  = array(
                'title' => 'Success',
                'emit'  => 'Successfully Inserted',
                'btn'   => true
            );
            $this->data['confirmation'] = message($this->action->add('test_group', $_POST), $msg_array);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('alltest/group/', 'refresh');
        } 
        else if (isset($_POST['update'])) 
        {
            unset($_POST['update']);
            $msg_array                  = array(
                'title' => 'Update',
                'emit'  => 'Successfully Updated',
                'btn'   => true
            );
            $this->data['confirmation'] = message($this->action->update('test_group', $_POST, ['id' => $_POST['id']]), $msg_array);
            $this->session->set_flashdata('confirmation', $this->data['confirmation']);
            redirect('alltest/group/', 'refresh');
        }

        if (isset($_GET['id'])) {
            $this->data['group'] = $this->action->read('test_group', ['id' => $_GET['id']])[0];
        }

        // get all data
        $this->data['groups'] = get_result('test_group', ['trash' => 0], null, null, 'position', 'ASC');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/group', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    public function delete($id = NULL)
    {
        $this->data['confirmation'] = null;
        $msg_array                  = array(
            'title' => 'delete',
            'emit'  => 'This Data Successfully Deleted!',
            'btn'   => true
        );
        $this->data['confirmation'] = message($this->action->update('test_group', ['trash'=>1], array('id' => $id)), $msg_array);
        $this->session->set_flashdata('confirmation', $this->data['confirmation']);
        redirect('alltest/group/', 'refresh');
    }

    private function holder()
    {
        if ($this->session->userdata('holder') == null) {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
}