<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('nama')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email','Email','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');

        if($this->form_validation->run() == false){
        $data['judul'] = "Login Page";
        $this->load->view('template/auth/auth_header',$data);
        $this->load->view('auth/index');
        $this->load->view('template/auth/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('email', $email);
        $this->db->or_where('nama', $email);
        $user = $this->db->get('pelajar')->row_array();
       
        //verifikasi email
        if($user){
            //verivikasi password
            if(password_verify($password, $user['password'])){
                $data = [
                    'nama' => $user['nama'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                redirect('user');
                }
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email atau Password Anda Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email atau Password Anda Salah</div>');
                redirect('auth');
        }

    }
    
    public function registration()
    {
        if ($this->session->userdata('nama')) {
            redirect('user');
        }
        //Rule Form Validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('quotes', 'Quotes', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password dont Match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        


        //Form Validation 

        //Fail
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Registration";
            $this->load->view('template/auth/auth_header',$data);
            $this->load->view('auth/register');
            $this->load->view('template/auth/auth_footer');
        } 
        //Success
        else {
            $data = [ 
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'ttl' => htmlspecialchars($this->input->post('ttl',true)),
                'quotes' => htmlspecialchars($this->input->post('quotes',true)),
                'gambar' => 'default.jpeg',
                'role_id' => 2,
                'email' => htmlspecialchars($this->input->post('email',true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->db->insert('pelajar', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat Anda berhasil Daftar</div>');
            redirect('auth');
        }

            
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}