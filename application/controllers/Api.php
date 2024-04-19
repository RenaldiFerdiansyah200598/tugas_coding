<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Stok_model');
    }

    public function stok_get()
    {
        $stok = $this->Stok_model->getStok();
        if ($stok) {
            $this->response([
                'success' => true,
                'message' => 'Data Stok Barang',
                'data' => $stok
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'success' => false,
                'message' => 'Data Stok Barang Tidak Ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
        // Endpoint untuk menambahkan data stok baru
        public function stok_post() {
            $data = array(
                'nama_barang' => $this->post('nama_barang'),
                'stok' => $this->post('stok'),
                'jumlah_terjual' => $this->post('jumlah_terjual'),
                'tanggal_transaksi' => $this->post('tanggal_transaksi'),
                'jenis_barang' => $this->post('jenis_barang')
            );
    
            $insert = $this->Stok_model->insert_stok($data);
    
            if($insert) {
                $this->response(array('status' => 'Data stok berhasil ditambahkan.'), REST_Controller::HTTP_CREATED);
            } else {
                $this->response(array('status' => 'Gagal menambahkan data stok.'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    
        // Endpoint untuk memperbarui data stok
        public function stok_put() {
            $id = $this->put('id');
            $data = array(
                'nama_barang' => $this->put('nama_barang'),
                'stok' => $this->put('stok'),
                'jumlah_terjual' => $this->put('jumlah_terjual'),
                'tanggal_transaksi' => $this->put('tanggal_transaksi'),
                'jenis_barang' => $this->put('jenis_barang')
            );
    
            $update = $this->Stok_model->update_stok($id, $data);
    
            if($update) {
                $this->response(array('status' => 'Data stok berhasil diperbarui.'), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('status' => 'Gagal memperbarui data stok.'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    
        // Endpoint untuk menghapus data stok
        public function stok_delete($id) {
            $delete = $this->Stok_model->delete_stok($id);
    
            if($delete) {
                $this->response(array('status' => 'Data stok berhasil dihapus.'), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('status' => 'Gagal menghapus data stok.'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
}
