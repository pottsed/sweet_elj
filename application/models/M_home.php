<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
        $this->db->join('tb_bahan', 'tb_bahan.id_bahan = tb_barang.id_bahan', 'left');

        $this->db->order_by('id_barang', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->order_by('id_kategori', 'asc');
        return $this->db->get()->result();
    }

    public function get_filter($id_kategori,$id_bahan,$min,$max)
    {
        $min = strlen($min) > 0 ? $min : "";
        $max = strlen($max) > 0 ? $max : "";
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
        $this->db->join('tb_bahan', 'tb_bahan.id_bahan = tb_barang.id_bahan', 'left');
        $this->db->where($where);
        // strlen($min) > 0 ? $this->db->where('tb_barang.harga >= "'.$min. '"') : "";
        // strlen($max) > 0 ? $this->db->where('tb_barang.harga <= "'.$max. '"') : "";

        print_r( $this->db->get());exit;
        return $this->db->get()->row();
    }

    public function detail_brg($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
        $this->db->join('tb_bahan', 'tb_bahan.id_bahan = tb_barang.id_bahan', 'left');

        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function gambar_brg($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_barang', $id_barang);

        return $this->db->get()->result();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('id_kategori', $id_kategori);

        return $this->db->get()->row();
    }

    public function get_all_data_brg($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
        $this->db->join('tb_bahan', 'tb_bahan.id_bahan = tb_barang.id_bahan', 'left');
        $this->db->where('tb_barang.id_kategori', $id_kategori);

        $this->db->order_by('id_barang', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_data_bhn()
    {
        $this->db->select('*');
        $this->db->from('tb_bahan');
        $this->db->order_by('id_bahan', 'asc');
        return $this->db->get()->result();
    }

    public function bahan($id_bahan)
    {
        $this->db->select('*');
        $this->db->from('tb_bahan');
        $this->db->where('id_bahan', $id_bahan);

        return $this->db->get()->row();
    }

    public function get_all_data_bahan($id_bahan)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
        $this->db->join('tb_bahan', 'tb_bahan.id_bahan = tb_barang.id_bahan', 'left');
        $this->db->where('tb_barang.id_bahan', $id_bahan);

        $this->db->order_by('id_barang', 'asc');
        return $this->db->get()->result();
    }
}
