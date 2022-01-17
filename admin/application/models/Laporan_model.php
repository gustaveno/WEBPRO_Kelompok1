<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_model extends CI_Model
{
    private $_table = "laporan";
    
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pembelian" => $id));
	}
	
	

}
