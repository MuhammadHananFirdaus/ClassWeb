<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();
        $data['judul'] = 'Home';
        $this->load->view('template/main/header',$data);
        $this->load->view('home/index');
        $this->load->view('template/main/footer');
    }
}