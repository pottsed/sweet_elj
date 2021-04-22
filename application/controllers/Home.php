<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_bahan');
        $this->load->model('m_kategori');
        $this->load->model('m_rating');

        $this->load->helper('url');

        // Load session
        $this->load->library('session');

        // Userid 
        $this->session->set_userdata(array("id_pelanggan" => 3));
    }


    public function index()
    {
        $data = array(
            'tittle' => 'Home',
            'barang' => $this->m_home->get_all_data(),
            'filter_kategori' => $this->m_kategori->get_all_data(),
            'filter_bahan' => $this->m_bahan->get_all_data(),
            'isi'   => 'v_home'

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function filter()
    {
        if (strlen($_GET['kategori']) > 0) { $where['tb_kategori.id_kategori']=$_GET['kategori'];}
        if (strlen($_GET['bahan']) > 0) { $where['tb_bahan.id_bahan']=$_GET['bahan'];}
        $min = strlen($_GET['min']) > 0 ? $_GET['min'] : "";
        $max = strlen($_GET['max']) > 0 ? $_GET['max'] : "";
        $data = array(
            'tittle' => 'Fiter',
            'barang' => $this->m_home->get_filter($where,$min,$max),
            'filter_kategori' => $this->m_kategori->get_all_data(),
            'filter_bahan' => $this->m_bahan->get_all_data(),
            'isi'   => 'v_filter'

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'tittle' => 'Kategori Barang :' . $kategori->nama_kategori,
            'barang' => $this->m_home->get_all_data_brg($id_kategori),
            'isi'   => 'v_kategori_brg'

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function bahan($id_bahan)
    {
        $bahan = $this->m_home->bahan($id_bahan);
        $data = array(
            'tittle' => 'Bahan Barang : ' . $bahan->nama_bahan,
            'bahan' => $this->m_home->get_all_data_bahan($id_bahan),
            'isi'   => 'v_bahan'

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function detail_brg($id_barang)
    {
        $data = array(
            'tittle' => 'Detail Barang',
            'gambar' => $this->m_home->gambar_brg($id_barang),
            'barang' => $this->m_home->detail_brg($id_barang),
            'isi'   => 'v_detail'

        );
        // Userid
        $userid = $this->session->userdata('id_pelanggan');

        // Fetch all records
        $data['posts'] = $this->m_rating->getAllPosts($userid);
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    // Update rating
    public function updateRating()
    {

        // userid
        $userid = $this->session->userdata('id_pelanggan');

        // POST values
        $postid = $this->input->post('id_barang');
        $rating = $this->input->post('rating');

        // Update user rating and get Average rating of a post
        $averageRating = $this->m_rating->userRating($userid, $postid, $rating);

        echo $averageRating;
        exit;
    }
}
