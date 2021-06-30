<?php

class Show_mapping extends Admin_Controller
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
        $this->data['subMenu']      = 'data-target="show_mapping"';
        $this->data['confirmation'] = null;

        // get all data
        $this->data['results'] = $this->search();

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/alltest/nav', $this->data);
        $this->load->view('components/alltest/show_mapping', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer', $this->data);
    }

    // search data
    private function search(){

        $results = [];

        // get all group
        $groupInfo = get_result('test_group', ['trash' => 0], ['id', 'group_name'], '', 'group_name', 'asc');

        if (!empty($groupInfo)) {
            foreach ($groupInfo as $g_key => $g_item) {

                $results[$g_key]['group_name'] = $g_item->group_name;

                // get all test
                $testInfo = get_join('group_mapping', 'test', 'group_mapping.test_id=test.id', ['group_mapping.group_id' => $g_item->id, 'test.trash' => 0], ['test.id', 'test.test_name', 'test.room', 'test.fee', 'test.cost'], '', 'test.test_name');

                $test = [];
                if (!empty($testInfo)) {
                    foreach ($testInfo as $t_key => $t_item) {

                        $test[$t_key]['test_name'] = $t_item->test_name;
                        $test[$t_key]['room']      = $t_item->room;
                        $test[$t_key]['fee']       = $t_item->fee;
                        $test[$t_key]['cost']      = $t_item->cost;

                        // get all test parameter
                        $parameterInfo = get_join('test_mapping', 'parameter', 'test_mapping.parameter_id=parameter.id', ['test_mapping.test_id' => $t_item->id, 'parameter.trash' => 0], ['parameter.parameter_name', 'parameter.ref_value', 'parameter.unit'], '', 'parameter.position', 'ASC');

                        $test[$t_key]['parameter'] = $parameterInfo;
                    }
                }

                $results[$g_key]['test'] = $test;
            }
        }

        return $results;
    }


    private function holder()
    {
        if ($this->session->userdata('holder') == null) {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
}