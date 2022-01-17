<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_model extends CI_Model
{
    private $_table = "promo";

    public $promo_id;
    public $name;
    public $image_prm = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required']

          
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["promo_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->promo_id = uniqid();
        $this->name = $post["name"];
		$this->image_prm = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->promo_id = $post["id"];
        $this->name = $post["name"];
		
		
		if (!empty($_FILES["image_prm"]["name"])) {
            $this->image_prm = $this->_uploadImage();
        } else {
            $this->image_prm = $post["old_image"];
		}

        $this->db->update($this->_table, $this, array('promo_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("promo_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/promo/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $this->promo_id;
		$config['overwrite']			= true;
		$config['max_size']             = 10240; // 10MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image_prm')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$promo = $this->getById($id);
		if ($promo->image_prm != "default.jpg") {
			$filename = explode(".", $promo->image_prm)[0];
			return array_map('unlink', glob(FCPATH."upload/promo/$filename.*"));
		}
	}

}
