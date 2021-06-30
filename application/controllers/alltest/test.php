<?php

class Test extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->holder();
    }

    // show create form
    public function index()
    {
        $this->data['meta_title']   = 'Test';
        $this->data['active']       = 'data-target="alltest_menu"';
        $this->data['subMenu']      = 'data-target="test"';
        $this->data['confirmation'] = null;
        $this->data['info']         = null;

        // get data id wise
        if (!empty($_GET['id'])) {

            $id = htmlspecialchars(trim($_GET['id']));

            $info = get_row('test', ['id' => $id]);

            if (!empty($info)) {
                $this->data['info'] = $info;
            } else {
                redirect('alltest/test', 'refresh');
            }
        }

        // get all data
        $this->data['results'] = get_result('test', ['trash' => 0], null, null, 'position', 'ASC');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/test', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    // store data
    public function store()
    {
        if (isset($_POST['save'])) {

            $data = [
                'created_at' => date('Y-m-d'),
                'test_name'  => $this->input->post('test_name'),
                'fee'        => $this->input->post('fee'),
                'room'       => $this->input->post('room'),
                'cost'       => $this->input->post('cost'),
            ];

            if (!empty($_POST['id'])) {

                $where = ['id' => $_POST['id']];

                $msg = [
                    'title' => 'update',
                    'emit'  => 'Test successfully updated.',
                    'btn'   => true
                ];

            } else {

                $where = [];

                $msg = [
                    'title' => 'save',
                    'emit'  => 'Test successfully saved.',
                    'btn'   => true
                ];
            }

            save_data('test', $data, $where);

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('alltest/test', 'refresh');
    }


    // delete data
    public function delete($id = null)
    {

        if (!empty($id)) {

            save_data('test', ['trash' => 1], ['id' => $id]);

            $msg = [
                'title' => 'delete',
                'emit'  => 'This Data Successfully Deleted!',
                'btn'   => true
            ];
        }

        redirect('alltest/test', 'refresh');
    }


    private function holder()
    {
        if ($this->session->userdata('holder') == null) {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
}