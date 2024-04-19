<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Load database
        $this->load->database();
    }

    public function getStok()
    {
        return $this->db->get('tbl_stok')->result_array();
    }
}
