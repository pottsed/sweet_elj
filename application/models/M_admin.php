<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_barang()
    {
        return $this->db->get('tb_barang')->num_rows(); //untuk menghitung jmlh data yg ad d barang

    }

    public function total_kategori()
    {
        return $this->db->get('tb_kategori')->num_rows(); //untuk menghitung jmlh data yg ad d barang

    }

    public function total_pesanan()
    {
        return $this->db->get('tb_transaksi')->num_rows(); //untuk menghitung jmlh data yg ad d barang

    }

    public function total_user()
    {
        return $this->db->get('tb_pelanggan')->num_rows(); //untuk menghitung jmlh data yg ad d barang

    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tb_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tb_setting', $data);
    }
}
