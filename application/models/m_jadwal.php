<?php

class M_jadwal extends CI_Model{
    public function tampil_data(){
        $this->db->select('*');    
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matakuliah', 'tb_jadwal.id_mk = tb_matakuliah.id_mk');
        $this->db->join('tb_kelas', 'tb_jadwal.id_kls = tb_kelas.id_kls');
        $this->db->join('tb_dosen', 'tb_jadwal.id = tb_dosen.id');
        $this->db->join('tb_ruangan', 'tb_jadwal.id_ruangan = tb_ruangan.id_ruangan');
        $this->db->join('tb_hari', 'tb_jadwal.id_hari = tb_hari.id_hari');
        $this->db->join('tb_jam','tb_jadwal.id_jam = tb_jam.id_jam');
        return $this->db->get();
    }

    public function input_data($data){
        return $this->db->insert('tb_jurusan',$data);
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
    


    
}