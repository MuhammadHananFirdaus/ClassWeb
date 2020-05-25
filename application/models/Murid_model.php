<?php

class Murid_model extends CI_Model{

    public function getSiswaById($id)
    {
        $this->db->where('id' , $id);
       return $this->db->get('pelajar')->row_array();
    }

    public function getSiswa()
    {
        $this->db->order_by('nama','ASC');
        return $this->db->get('pelajar')->result_array();
    }
}