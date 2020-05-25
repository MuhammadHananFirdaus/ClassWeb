<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        
            $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();
            $data['title'] = 'Admin';
            
            $this->load->view('template/user/user_header',$data);
            $this->load->view('template/user/user_sidebar');
            $this->load->view('template/user/user_topbar');
            $this->load->view('admin/index');
            $this->load->view('template/user/user_footer');
    }
}