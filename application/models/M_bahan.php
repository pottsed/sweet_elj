<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahan extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_bahan');
        $this->db->order_by('id_bahan', 'asc');
        return $this->db->get()->result();
    }

}

/* End of file M_bahan.php */
