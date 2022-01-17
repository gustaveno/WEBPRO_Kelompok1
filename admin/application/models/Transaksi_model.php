<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "transaksi";

    

    public function getAll()
    {
        $this->db->order_by('id_pembelian', 'ASC');
        return $this->db->from('transaksi')
          ->join('reseller', 'reseller.reseller_id=transaksi.id_pelanggan')
          ->get()
          ->result();
    }
    
    public function ambil_id_transaksi($id)
    {
        // return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
        $result = $this->db->where('id_pembelian', $id)->limit(1)
        ->get('transaksi');
        if($result->num_rows() > 0 ){
            return $result->row();
        }else {
            return false;
        }
    }

    public function ambil_id_detail_transaksi($id)
    {
        $result = $this->db->where('id_pembelian', $id)
        ->get('laporan');
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
