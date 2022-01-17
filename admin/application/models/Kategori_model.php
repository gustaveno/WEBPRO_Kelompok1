<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "kategori";

    public $kategori_id;
    public $kategori_name;
    public $image_ktg = "default.jpg";
    

    public function rules()
    {
        return [
            ['field' => 'kategori_name',
            'label' => 'Kategori_name',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kategori_id" => $id])->row();
    }

    public function ambil_id_kategori($id)
    {
        // return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
        $result = $this->db->where('kategori_id', $id)->limit(1)
        ->get('kategori');
        if($result->num_rows() > 0 ){
            return $result->row();
        }else {
            return false;
        }
    }

    

    public function save()
    {
        $post = $this->input->post();
        $this->kategori_id = uniqid();
        $this->kategori_name = $post["kategori_name"];
        $this->image_ktg = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kategori_id = $post["id"];
        $this->kategori_name = $post["kategori_name"];

        if (!empty($_FILES["image_ktg"]["name"])) {
            $this->image_ktg = $this->_uploadImage();
        } else {
            $this->image_ktg = $post["old_image"];
		}

		
		
		

        $this->db->update($this->_table, $this, array('kategori_id' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("kategori_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/kategori/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $this->kategori_id;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image_ktg')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$kategori = $this->getById($id);
		if ($kategori->image_ktg != "default.jpg") {
			$filename = explode(".", $kategori->image_ktg)[0];
			return array_map('unlink', glob(FCPATH."upload/kategori/$filename.*"));
		}
	}
	

}
