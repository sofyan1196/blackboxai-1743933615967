<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esim_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_products() {
        return $this->db->get('esim_products')->result();
    }

    public function get_product($id) {
        return $this->db->get_where('esim_products', ['id' => $id])->row();
    }

    public function create_order($data) {
        $this->db->insert('esim_orders', $data);
        return $this->db->insert_id();
    }

    public function get_order($id) {
        $this->db->select('esim_orders.*, esim_products.name as product_name, esim_products.price');
        $this->db->from('esim_orders');
        $this->db->join('esim_products', 'esim_products.id = esim_orders.product_id');
        $this->db->where('esim_orders.id', $id);
        return $this->db->get()->row();
    }

    public function update_order($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('esim_orders', $data);
    }

    public function get_user_orders($user_id) {
        $this->db->select('esim_orders.*, esim_products.name as product_name');
        $this->db->from('esim_orders');
        $this->db->join('esim_products', 'esim_products.id = esim_orders.product_id');
        $this->db->where('esim_orders.user_id', $user_id);
        $this->db->order_by('esim_orders.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_order_by_api_id($api_order_id) {
        $this->db->select('*');
        $this->db->from('esim_orders');
        $this->db->where('api_order_id', $api_order_id);
        return $this->db->get()->row();
    }
}