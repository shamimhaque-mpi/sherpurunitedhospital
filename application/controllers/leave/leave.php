<?php

class Leave extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'leave';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave/leave-nav', $this->data);
        $this->load->view('components/leave/leave', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function entry($emit = NULL) {
        $this->data['meta_title'] = 'leave';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave/leave-nav', $this->data);
        $this->load->view('components/leave/leave_entry', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function status($emit = NULL) {
        $this->data['meta_title'] = 'leave';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="status"';
        $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave/leave-nav', $this->data);
        $this->load->view('components/leave/leave_status', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function view($emit = NULL) {
        $this->data['meta_title'] = 'leave';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="view"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave/leave-nav', $this->data);
        $this->load->view('components/leave/leave_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit($emit = NULL) {
        $this->data['meta_title'] = 'leave';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="view"';
        $this->data['confirmation'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave/leave-nav', $this->data);
        $this->load->view('components/leave/leave_edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
