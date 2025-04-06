<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Package_model');
    }

    public function index() {
        $data['packages'] = $this->Package_model->get_all();
        $data['title'] = 'eSIM Packages';
        
        $this->load->view('templates/header', $data);
        $this->load->view('packages/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id) {
        $data['package'] = $this->Package_model->get($id);
        if(!$data['package']) {
            show_404();
        }
        $data['title'] = $data['package']->name;
        
        // Set redirect URL untuk setelah login
        if(!$this->session->userdata('logged_in')) {
            $this->session->set_userdata('redirect_url', current_url());
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('packages/view', $data);
        $this->load->view('templates/footer');
    }
}