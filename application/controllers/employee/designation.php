<?php

class Designation extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['meta_title']   = '';
        $this->data['active']       = 'data-target="employee_menu"';
        $this->data['subMenu']      = 'data-target="designation"';
        $this->data['confirmation'] = null;
        $this->data['info']         = null;

        if (!empty($_GET['id'])) {
            $this->data['info'] = get_row('designations', ['id' => $_GET['id'], 'trash' => 0]);
        }


        // get all designation
        $this->data['results'] = get_result('designations', ['trash' => 0]);


        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/employee/employee-nav', $this->data);
        $this->load->view('components/employee/designation', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    public function store()
    {

        if (isset($_POST['save'])) {

            $data = [
                'created_at'       => date('Y-m-d'),
                'designation_name' => $this->input->post('designation_name')
            ];

            if (!empty($_POST['id'])) {

                $where = ['id' => $_POST['id']];

                // update employee table
                $employeeWhere = ['designation' => $_POST['old_designation_name']];
                if (check_exists('employee', $employeeWhere)) {
                    save_data('employee', ['designation' => $_POST['designation_name']], $employeeWhere);
                }

                $msg = [
                    "title" => "update",
                    "emit"  => "Designation Successfully updated.",
                    "btn"   => true
                ];

                $this->session->set_flashdata('confirmation', message('success', $msg));

            } else {

                $where = [];

                $msg = [
                    "title" => "Success",
                    "emit"  => "Designation Successfully saved.",
                    "btn"   => true
                ];

                $this->session->set_flashdata('confirmation', message('success', $msg));
            }

            save_data('designations', $data, $where);
        }

        redirect('employee/designation', 'refresh');
    }

    public function delete()
    {

        if (!empty($_GET['id'])) {

            save_data('designations', ['trash' => 1], ['id' => $_GET['id']]);

            $msg = [
                "title" => "delete",
                "emit"  => "Designation Successfully saved.",
                "btn"   => true
            ];

            $this->session->set_flashdata('confirmation', message('danger', $msg));
        }
        redirect('employee/designation', 'refresh');
    }

}