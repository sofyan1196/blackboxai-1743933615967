<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esim extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Esim_model');
        $this->load->library(['form_validation', 'esim_api']);
        $this->load->helper('url');
    }

    public function callback() {
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!empty($input['order_id']) && !empty($input['status'])) {
            $order = $this->Esim_model->get_order_by_api_id($input['order_id']);
            
            if ($order) {
                $update_data = [
                    'payment_status' => $input['status'] == 'completed' ? 'paid' : 'failed',
                    'qr_code_url' => $input['qr_code_url'] ?? null,
                    'usage_url' => $input['usage_url'] ?? null,
                    'api_response' => json_encode($input)
                ];
                
                $this->Esim_model->update_order($order->id, $update_data);
            }
        }
        
        http_response_code(200);
    }

    public function index() {
        $data['products'] = $this->Esim_model->get_products();
        $this->load->view('esim/index', $data);
    }

    public function product($id) {
        $data['product'] = $this->Esim_model->get_product($id);
        $this->load->view('esim/product', $data);
    }

    public function checkout() {
        $this->form_validation->set_rules('payment_method', 'Metode Pembayaran', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('esim/checkout');
        } else {
            // Proses checkout akan diimplementasikan nanti
            $order_data = [
                'order_code' => 'ESIM'.time(),
                'user_id' => $this->session->userdata('user_id'),
                'product_id' => $this->input->post('product_id'),
                'payment_method' => $this->input->post('payment_method'),
                'payment_status' => 'pending'
            ];
            
            $order_id = $this->Esim_model->create_order($order_data);
            redirect('esim/order/'.$order_id);
        }
    }

    public function order($id) {
        $data['order'] = $this->Esim_model->get_order($id);
        $this->load->view('esim/order', $data);
    }
}