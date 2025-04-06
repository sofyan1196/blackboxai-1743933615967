<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        return $this->db->get('packages')->result();
    }

    public function get($id) {
        $this->db->where('id', $id);
        return $this->db->get('packages')->row();
    }

    public function create($data) {
        return $this->db->insert('packages', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('packages', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('packages');
    }

    public function get_by_region($region_id) {
        $this->db->where('region_id', $region_id);
        return $this->db->get('packages')->result();
    }
}