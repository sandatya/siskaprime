<?php

class M_dosen extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_dosen');
    }

    public function input_data($data){
        return $this->db->insert('tb_dosen',$data);
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
    public function detail_data($id=NULL)
    {
        $query = $this->db->get_where('tb_dosen',array('id' => $id))->row();
        return $query;
    }

    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_dosen');
        $this->db->like('nidn',$keyword);
        $this->db->or_like('nama',$keyword);
        $this->db->or_like('tgl_lahir',$keyword);
        $this->db->or_like('alamat',$keyword);
        $this->db->or_like('jenis_kelamin',$keyword);
        $this->db->or_like('no_telp',$keyword);
        $this->db->or_like('email',$keyword);
        return $this->db->get()->result();
    }

    
}