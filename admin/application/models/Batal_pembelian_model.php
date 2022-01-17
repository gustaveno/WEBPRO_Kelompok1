<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Batal_pembelian_model extends CI_Model
{
    private $_table = "batal_pembelian";

    

    public function getAll()
    {
        $this->db->order_by('id_pembelian', 'ASC');
        return $this->db->from('batal_pembelian')
          ->join('reseller', 'reseller.reseller_id=batal_pembelian.id_pelanggan')
          ->get()
          ->result();
    }

   
    public function ambil_id_pembelian($id)
    {
        // return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
        $result = $this->db->where('id_pembelian', $id)->limit(1)
        ->get('batal_pembelian');
        if($result->num_rows() > 0 ){
            return $result->row();
        }else {
            return false;
        }
    }

    public function ambil_id_detail_batal($id)
    {
        $result = $this->db->where('id_pembelian', $id)
        ->get('detail_batal');
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
