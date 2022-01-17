<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("pembelian_model");
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		$data["pembelian"] = $this->pembelian_model->getAll();
        $this->load->view("admin/overview", $data);
        // load view admin/overview.php
        // $this->load->view("admin/overview");
	}
}
