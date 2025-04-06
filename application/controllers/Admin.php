<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('login');
        }
        $this->load->model('User_model');
    }

    public function index() {
        $data['title'] = 'Admin Dashboard';
        $data['users'] = $this->User_model->get_all_users();
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }
}