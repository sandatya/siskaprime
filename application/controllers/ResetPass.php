<?php

class ResetPass extends CI_Controller{
    public function index(){
        

		$this->load->view('templates/header');
		$this->load->view('v_gantipass');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	
    }

    function ganti_password(){
        $this->load->view('templates/header');
        $this->load->view('v_gantipass');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    function ganti_password_aksi(){
        $baru = $this->input->post('password_baru');
        $ulang = $this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang','Ulangi Password','required');

        if($this->form_validation->run() != false){
            $id = $this->session->userdata('id');
            $where = array('id' => $id);
            $data = array('password' => md5($baru));
            $this->m_data->update_data($where,$data,'tb_admin');
            $this->session->set_flashdata('message','<div class="alert alert-successalert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Password Berhasil Dirubah!
             </div>');
        redirect ('ResetPass/index');


        }else{
            $this->load->view('templates/header');
		    $this->load->view('v_gantipass');
		    $this->load->view('templates/sidebar');
		    $this->load->view('templates/footer');
        }
    }
}