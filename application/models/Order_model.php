<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        $this->db->select('orders.*, users.name as customer_name, packages.name as package_name');
        $this->db->join('users', 'users.id = orders.user_id');
        $this->db->join('packages', 'packages.id = orders.package_id');
        return $this->db->get('orders')->result();
    }

    public function get($id) {
        $this->db->where('orders.id', $id);
        $this->db->select('orders.*, users.name as customer_name, packages.name as package_name');
        $this->db->join('users', 'users.id = orders.user_id');
        $this->db->join('packages', 'packages.id = orders.package_id');
        return $this->db->get('orders')->row();
    }

    public function create($data) {
        return $this->db->insert('orders', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('orders', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('orders');
    }

    public function get_user_orders($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->join('packages', 'packages.id = orders.package_id');
        return $this->db->get('orders')->result();
    }
}