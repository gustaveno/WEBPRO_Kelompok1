<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->model("product_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["kategori"] = $this->kategori_model->getAll();
        $this->load->view("admin/kategori/list_kategori", $data);
    }

    public function add()
    {
        $kategori = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kategori/new_kategori");
    }

    public function detail($id)
    {
        $data['kategori'] = $this->kategori_model->ambil_id_kategori($id);
        $data['products'] = $this->product_model->ambil_id_produk($id);
        $this->load->view("admin/kategori/detail_kategori", $data);

    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kategori');
       
        $kategori = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();
        
        $this->load->view("admin/kategori/edit_kategori", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kategori_model->delete($id)) {
            redirect(site_url('admin/kategori'));
        }
    }
}
