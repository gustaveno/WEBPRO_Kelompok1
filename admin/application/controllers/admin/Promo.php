<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("promo_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["promo"] = $this->promo_model->getAll();
        $this->load->view("admin/promo/list_promo", $data);
    }

    public function add()
    {
        $promo = $this->promo_model;
        $validation = $this->form_validation;
        $validation->set_rules($promo->rules());

        if ($validation->run()) {
            $promo->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/promo/new_promo");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/promo');
       
        $promo = $this->promo_model;
        $validation = $this->form_validation;
        $validation->set_rules($promo->rules());

        if ($validation->run()) {
            $promo->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["promo"] = $promo->getById($id);
        if (!$data["promo"]) show_404();
        
        $this->load->view("admin/promo/edit_promo", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->promo_model->delete($id)) {
            redirect(site_url('admin/promo'));
        }
    }
}
