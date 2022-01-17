<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Return_stok_model extends CI_Model
{
    private $_table = "return_stok";

    

    public function getAll()
    {
        $this->db->order_by('id_pembelian', 'ASC');
        return $this->db->from('return_stok')
          ->join('reseller', 'reseller.reseller_id=return_stok.id_pelanggan')
          ->get()
          ->result();
    }

   
    public function ambil_id_return_stok($id)
    {
        // return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
        $result = $this->db->where('id_pembelian', $id)->limit(1)
        ->get('return_stok');
        if($result->num_rows() > 0 ){
            return $result->row();
        }else {
            return false;
        }
    }

    public function ambil_id_detail_return($id)
    {
        $result = $this->db->where('id_pembelian', $id)
        ->get('detail_return');
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
