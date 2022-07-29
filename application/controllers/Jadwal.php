<?php

class Jadwal extends CI_Controller{
    public function index(){
        $data['jadwal'] = $this->m_jadwal->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('v_jadwal',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	
    }



}