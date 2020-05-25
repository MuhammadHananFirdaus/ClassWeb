<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        if($this->form_validation->run()==false){
            $this->load->view('template/user/user_header',$data);
        $this->load->view('template/user/user_sidebar');
        $this->load->view('template/user/user_topbar');
        $this->load->view('menu/index');
        $this->load->view('template/user/user_footer');
    } else{
        $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Menu Berhasil Ditambahkan</div>');
        redirect('menu');
    }
}
public function subMenu()
{
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('pelajar',['nama' => $this->session->userdata('nama')])->row_array();
    
    $this->load->model('Menu_model','menu');
    
    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    
    if ($this->form_validation->run()== false) {

        $this->load->view('template/user/user_header',$data);
        $this->load->view('template/user/user_sidebar');
        $this->load->view('template/user/user_topbar');
        $this->load->view('menu/subMenu');
        $this->load->view('template/user/user_footer');
    } else {

        $this->db->insert('user_sub_menu',[
            'menu_id' => $this->input->post('menu_id'),
            'judul' => $this->input->post('judul'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon')
        ]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">SubMenu Berhasil Ditambahkan</div>');
        redirect('menu/subMenu');

    }
       
    }


    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Menu Berhasil Dihapus</div>');
        redirect('menu');
    }

    public function deleteSm()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('user_sub_menu');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">SubMenu Berhasil Dihapus</div>');
        redirect('subMenu');
    }
}