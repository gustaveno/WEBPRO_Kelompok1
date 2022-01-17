<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller_model extends CI_Model
{
    private $_table = "reseller";

    public $reseller_id;
    public $email;
    public $username;
    public $password;
    public $role;
    public $phone;
    public $photo = "default.jpg";
    // public $created_at;
    public $alamat;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'phone',
            'label' => 'Phone',
            'rules' => 'numeric']

          
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["reseller_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->reseller_id = uniqid('RSL_');
        $this->username = $post["username"];
        $this->phone = $post["phone"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->role = $post["role"];
        $this->alamat = $post["alamat"];
		$this->photo = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->reseller_id = $post["id"];
        $this->username = $post["username"];
        $this->phone = $post["phone"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->role = $post["role"];
        $this->alamat = $post["alamat"];
		
		
		if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
		}

        
        $this->db->update($this->_table, $this, array('reseller_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("reseller_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/foto_reseller/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['file_name']            = $this->reseller_id;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$reseller = $this->getById($id);
		if ($reseller->photo != "default.jpg") {
			$filename = explode(".", $reseller->photo)[0];
			return array_map('unlink', glob(FCPATH."upload/foto_reseller/$filename.*"));
		}
	}

}
