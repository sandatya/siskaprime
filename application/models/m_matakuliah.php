<?php

class M_matakuliah extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_matakuliah');
    }

    public function input_data($data){
        return $this->db->insert('tb_matakuliah',$data);
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
            
    }

    public function update_data($where,$data,$table){
         $this->db->where($where);
         $this->db->update($table,$data);
    }
   
    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_matakuliah');
        $this->db->like('kode_mk',$keyword);
        $this->db->or_like('nama_mk',$keyword);
        $this->db->or_like('sks',$keyword);
        return $this->db->get()->result();
    }

    
}