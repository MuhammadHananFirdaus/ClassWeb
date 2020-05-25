<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        
            $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();
            $data['title'] = 'My Profile';
            
            $this->load->view('template/user/user_header',$data);
            $this->load->view('template/user/user_sidebar');
            $this->load->view('template/user/user_topbar');
            $this->load->view('user/index');
            $this->load->view('template/user/user_footer');
    }
    public function edit()
    {
        
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();

            $this->form_validation->set_rules('nama','Full Name', 'required|trim');
            $this->form_validation->set_rules('quotes','Quotes', 'required|trim', ['required' => 'Quotes tidak boleh kosong']);
            $this->form_validation->set_rules('ttl','Tempat Tanggal Lahir', 'required|trim', ['required' => 'tempat tanggal lahir tidak boleh kosong']);

            if($this->form_validation->run() == false){
            $this->load->view('template/user/user_header',$data);
            $this->load->view('template/user/user_sidebar');
            $this->load->view('template/user/user_topbar');
            $this->load->view('user/edit');
            $this->load->view('template/user/user_footer');
            } else {
                $ttl = $this->input->post('ttl');
                $quotes = $this->input->post('quotes');
                $nama = $this->input->post('nama');

                //Cek Gambar
                $gambarUpload = $_FILES['gambar']['name'];

                if($gambarUpload){
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '2048';
                    $config['upload_path'] = './asset/img/';

                    $this->load->library('upload', $config);
                    
                    if($this->upload->do_upload('gambar')){
                        $old_image = $data['user']['gambar'];

                        if ($old_image != 'default.jpeg') {
                            unlink(FCPATH . '/asset/img/' . $old_image);
                        }

                     $new_image = $this->upload->data('file_name');

                    $this->db->set('gambar',$new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }

                }

                $this->db->set('ttl',$ttl);
                $this->db->set('quotes',$quotes);
                $this->db->where('nama', $nama);
                $this->db->update('pelajar');

                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Di Update</div>');
                redirect('user');
            }
    }

    public function changePassword()
    {
        $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();
         $data['title'] = 'Change Password';

         $this->form_validation->set_rules('oldPassword','Old Password', 'required|trim');
         $this->form_validation->set_rules('password1','New Password', 'required|trim|min_length[8]|matches[password2]');
         $this->form_validation->set_rules('password2','Confirm Password', 'required|trim|matches[password1]');
            
         if($this->form_validation->run() == false){
            $this->load->view('template/user/user_header',$data);
            $this->load->view('template/user/user_sidebar');
            $this->load->view('template/user/user_topbar');
            $this->load->view('user/changepassword');
            $this->load->view('template/user/user_footer');
         } else {
             $oldPassword = $this->input->post('oldPassword');
             $newPassword = $this->input->post('password1');
             if(!password_verify($oldPassword,$data['user']['password'])){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Lama Anda Salah</div>');
                redirect('user/changePassword');
             } else {
                 if($oldPassword == $newPassword ){
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Baru Tidak Bisa Sama Dengan Yang Lama</div>');
                    redirect('user/changePassword');
                 } else {
                    $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
                    
                    $this->db->set('password',$newPassword);
                    $this->db->where('nama', $data['user']['nama']);
                    $this->db->update('pelajar');
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Berhasil Di ganti</div>');
                    redirect('user');
                 }
             }

         }
    }
}