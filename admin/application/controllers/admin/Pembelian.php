<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reseller_model");
        $this->load->model("pembelian_produk_model");
        $this->load->model("pembelian_model");
        $this->load->model("transaksi_model");
        $this->load->model("laporan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["pembelian"] = $this->pembelian_model->getAll();
        $this->load->view("admin/pembelian/list_pembelian", $data);
    }

   

    public function detail($id)
    {
        $data['pembelian'] = $this->pembelian_model->ambil_id_pembelian($id);
        $data['pembelian_produk'] = $this->pembelian_model->ambil_id_pembelian_produk($id);
        $this->load->view("admin/pembelian/detail_pembelian", $data);

    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->pembelian_produk_model->delete($id)) {
            if ($this->pembelian_model->delete($id)) {
            redirect(site_url('admin/pembelian'));
        }
        }
        
        
    }

    public function batal($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->pembelian_produk_model->delete($id)) {
            if ($this->pembelian_model->delete($id)) {
                if ($this->transaksi_model->delete($id)) {
                    if ($this->laporan_model->delete($id)) {
                    redirect(site_url('admin/pembelian'));
                }
            }
            }
        }
        
        
    }
}
