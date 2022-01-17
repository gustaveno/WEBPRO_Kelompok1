<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Return_stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reseller_model");
        $this->load->model("detail_return_model");
        $this->load->model("return_stok_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["return_stok"] = $this->return_stok_model->getAll();
        $this->load->view("admin/return_stok/list_return_stok", $data);
    }

   

    public function detail($id)
    {
        $data['return_stok'] = $this->return_stok_model->ambil_id_return_stok($id);
        $data['detail_return'] = $this->return_stok_model->ambil_id_detail_return($id);
        $this->load->view("admin/return_stok/detail_return", $data);

    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->detail_return_model->delete($id)) {
            if ($this->return_stok_model->delete($id)) {
            redirect(site_url('admin/return_stok'));
        }
        }
        
        
    }
}
