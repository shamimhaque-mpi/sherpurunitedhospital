<?php

class Parameter extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->holder();
    }

    public function index()
    {
        $this->data['meta_title']   = 'Parameter';
        $this->data['active']       = 'data-target="alltest_menu"';
        $this->data['subMenu']      = 'data-target="parameter"';
        $this->data['confirmation'] = null;

        // get data id wise
        if (!empty($_GET['id'])) {

            $id = htmlspecialchars(trim($_GET['id']));

            $info = get_row('parameter', ['id' => $id]);

            if (!empty($info)) {
                $this->data['info'] = $info;
            } else {
                redirect('alltest/parameter', 'refresh');
            }
        }

        // get all data
        $this->data['results'] = get_result('parameter', ['trash' => 0], null, null, 'position', 'ASC');

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/parameter', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    // store data
    public function store()
    {
        if (isset($_POST['save'])) {

            $data = [
                'created_at'     => date('Y-m-d'),
                'parameter_name' => $this->input->post('parameter_name'),
                'ref_value'      => $this->input->post('ref_value'),
                'result'         => $this->input->post('result'),
                'unit'           => $this->input->post('unit'),
            ];

            if (!empty($_POST['id'])) {

                $where = ['id' => $_POST['id']];

                $msg = [
                    'title' => 'update',
                    'emit'  => 'Parameter successfully updated.',
                    'btn'   => true
                ];

            } else {

                $where = [];

                $msg = [
                    'title' => 'save',
                    'emit'  => 'Parameter successfully saved.',
                    'btn'   => true
                ];
            }

            save_data('parameter', $data, $where);

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('alltest/parameter', 'refresh');
    }


    // delete data
    public function delete($id = null)
    {

        if (!empty($id)) {

            save_data('parameter', ['trash' => 1], ['id' => $id]);

            $msg = [
                'title' => 'delete',
                'emit'  => 'This Data Successfully Deleted!',
                'btn'   => true
            ];
        }

        redirect('alltest/parameter', 'refresh');
    }

    private function holder()
    {
        if ($this->session->userdata('holder') == null) {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
}