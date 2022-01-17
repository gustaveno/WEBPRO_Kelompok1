<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_batal_model extends CI_Model
{
    private $_table = "detail_batal";

    
    public function getAll()
    {
        $this->db->order_by('id_detail_batal', 'ASC');
        return $this->db->from('detail_batal')
          ->join('products', 'products.product_id = detail_batal.id_produk')
          ->get()
          ->result();
    }
    
    
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pembelian" => $id));
	}
	
	

}
