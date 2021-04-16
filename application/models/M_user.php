<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->order_by('id_pelanggan', 'asc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tb_pelanggan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('tb_pelanggan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('tb_pelanggan', $data);
    }
}

/* End of file M_user.php */
