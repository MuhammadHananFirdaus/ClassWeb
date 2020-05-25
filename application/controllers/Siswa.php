<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{

    public function __construct()
    {
        PARENT::__construct();
        $this->load->model('Murid_model','murid');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Murid';
        $data['muridList'] = $this->murid->getSiswa();
        $this->load->view('template/main/header',$data);
        $this->load->view('siswa/index');
        $this->load->view('template/main/footer');
    }

    public function getDetail()
    {
        echo json_encode($this->murid->getSiswaById($this->input->post('id',true)));
    }
}