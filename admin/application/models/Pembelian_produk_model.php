<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_produk_model extends CI_Model
{
    private $_table = "pembelian_produk";

    

    public function getAll()
    {
        $this->db->order_by('id_pembelian_produk', 'ASC');
        return $this->db->from('pembelian_produk')
          ->join('products', 'products.product_id = pembelian_produk.id_produk')
          ->get()
          ->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
    }

    public function ambil_id_pembelian_produk($id_pembelian)
    {
        $result = $this->db->where('id_pembelian', $id_pembelian)
        ->get('pembelian_produk');
        if($result->num_rows() > 0 ){
            return $result->result();
        }else {
            return false;
        }
    }
    

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pembelian" => $id));
	}
	
	

}
