<?php defined('BASEPATH') OR exit('No direct script access allowed');

class detail_return_model extends CI_Model
{
    private $_table = "detail_return";

    
    public function getAll()
    {
        $this->db->order_by('id_detail_return', 'ASC');
        return $this->db->from('detail_return')
          ->join('products', 'products.product_id = detail_return.id_produk')
          ->get()
          ->result();
    }
    
    
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pembelian" => $id));
	}
	
	

}
