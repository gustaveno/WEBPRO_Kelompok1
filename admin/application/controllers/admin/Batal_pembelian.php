<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Batal_pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reseller_model");
        $this->load->model("detail_batal_model");
        $this->load->model("batal_pembelian_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["batal_pembelian"] = $this->batal_pembelian_model->getAll();
        $this->load->view("admin/batal_pembelian/list_batal_pembelian", $data);
    }

   

    public function detail($id)
    {
        $data['batal_pembelian'] = $this->batal_pembelian_model->ambil_id_pembelian($id);
        $data['detail_batal'] = $this->batal_pembelian_model->ambil_id_detail_batal($id);
        $this->load->view("admin/batal_pembelian/detail_batal", $data);

    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->detail_batal_model->delete($id)) {
            if ($this->batal_pembelian_model->delete($id)) {
            redirect(site_url('admin/batal_pembelian'));
        }
        }
        
        
    }
}
