<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esim_api {
    private $api_key;
    private $api_url = 'https://api.esimaccess.com/v1/';
    private $ci;

    public function __construct() {
        $this->ci =& get_instance();
        $this->ci->config->load('esim');
        $this->api_key = $this->ci->config->item('esim_api_key');
    }

    public function get_products() {
        $endpoint = 'products';
        return $this->_call_api($endpoint);
    }

    public function create_order($product_id) {
        $endpoint = 'orders';
        $data = [
            'product_id' => $product_id,
            'callback_url' => base_url('esim/callback')
        ];
        return $this->_call_api($endpoint, 'POST', $data);
    }

    public function get_order($order_id) {
        $endpoint = 'orders/'.$order_id;
        return $this->_call_api($endpoint);
    }

    private function _call_api($endpoint, $method = 'GET', $data = []) {
        $url = $this->api_url . $endpoint;
        
        $headers = [
            'Authorization: Bearer ' . $this->api_key,
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code != 200) {
            log_message('error', 'eSIM API Error: ' . $response);
            return false;
        }

        return json_decode($response);
    }
}