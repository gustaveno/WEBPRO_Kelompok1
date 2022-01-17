<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{
    private $_table = "pembelian";

    

    public function getAll()
    {
        $this->db->order_by('id_pembelian', 'ASC');
        return $this->db->from('pembelian')
          ->join('reseller', 'reseller.reseller_id=pembelian.id_pelanggan')
          ->get()
          ->result();
    }

   
    public function ambil_id_pembelian($id)
    {
        // return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
        $result = $this->db->where('id_pembelian', $id)->limit(1)
        ->get('pembelian');
        if($result->num_rows() > 0 ){
            return $result->row();
        }else {
            return false;
        }
    }

    public function ambil_id_pembelian_produk($id)
    {
        $result = $this->db->where('id_pembelian', $id)
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
