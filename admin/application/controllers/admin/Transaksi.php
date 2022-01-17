<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("transaksi_model");
        $this->load->model("laporan_model");
        $this->load->model("batal_pembelian_model");
        $this->load->model("detail_batal_model");
        $this->load->model("return_stok_model");
        $this->load->model("detail_return_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["transaksi"] = $this->transaksi_model->getAll();
        $this->load->view("admin/transaksi/list_transaksi", $data);
    }

    public function detail($id)
    {
        $data['transaksi'] = $this->transaksi_model->ambil_id_transaksi($id);
        $data['laporan'] = $this->transaksi_model->ambil_id_detail_transaksi($id);
        $this->load->view("admin/transaksi/detail_transaksi", $data);

    }
    
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->transaksi_model->delete($id)) {
            if ($this->laporan_model->delete($id)) {
                if ($this->batal_pembelian_model->delete($id)) {
                    if ($this->detail_batal_model->delete($id)) {
                        if ($this->return_stok_model->delete($id)) {
                            if ($this->detail_return_model->delete($id)) {
                                redirect(site_url('admin/transaksi'));
                            }
                        }
                    }
                }
            }
        }
    }
}