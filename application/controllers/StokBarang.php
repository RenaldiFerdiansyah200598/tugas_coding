<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokBarang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load library untuk melakukan HTTP request ke API
        //$this->load->library('curl');
    }
    public function index()
    {
        // Lakukan HTTP GET request ke API untuk mendapatkan data stok barang
        $api_url = 'http://localhost/tugas_coding1/index.php/api/stok'; // Sesuaikan dengan URL API Anda
        $response = file_get_contents($api_url);
    
        // Ubah response menjadi array
        $stok_barang = json_decode($response, true);
    
        // Kirim data stok barang ke view
        $data['stok_barang'] = $stok_barang['data']; // Sesuaikan dengan struktur respons API Anda
    
        // Load view stok_barang.php dan kirimkan data stok barang
        $this->load->view('stok_barang', $data);
    }
    
}
