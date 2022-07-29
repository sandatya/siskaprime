<?php

class Jurusan extends CI_Controller{
    public function index(){
        $data['jurusan'] = $this->m_jurusan->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('v_jurusan',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	
    }

    public function aksi_tambah(){
        $kd_jurusan = $this->input->post('kd_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');
        
    
        $data = array(
            'kd_jurusan' => $kd_jurusan,
            'nama_jurusan' => $nama_jurusan,
        );

        $this->m_jurusan->input_data($data, 'tb_jurusan');

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
         </div>');

        redirect('Jurusan/index');
    }

    public function aksi_hapus($id){
        $where = array('id' => $id);
        $this->m_jurusan->hapus_data($where, 'tb_jurusan');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
         </div>');
        redirect ('Jurusan/index');


    }

    public function aksi_edit($id){
        $where = array('id'=>$id);
        $data['jurusan'] = $this->m_jurusan->edit_data($where,'tb_jurusan')->result();
        $this->load->view('templates/header');
		$this->load->view('v_edit_jurusan',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');

    }

    public function aksi_update(){
        $id = $this->input->post('id');
        $kd_jurusan = $this->input->post('kd_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');
       
        $data = array(
            'kd_jurusan' => $kd_jurusan,
            'nama_jurusan' => $nama_jurusan
        );

        $where = array(
            'id' => $id
        );

        $this->m_jurusan->update_data($where,$data,'tb_jurusan');
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diedit!
         </div>');
        redirect('Jurusan/index');

    }


    public function cetak(){
        $data['jurusan'] = $this->m_jurusan->tampil_data("tb_jurusan")->result();
        $this->load->view('cetak_jurusan', $data);
    }

    public function pdf(){
        $this->load->library('dompdf_gen');

        $data['jurusan'] = $this->m_jurusan->tampil_data("tb_jurusan")->result();

        $this->load->view('laporan_pdf_jur',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);


        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_jurusan.pdf",array('Attachment'=>0));
    }

    public function excel(){
    
        $data['jurusan'] = $this->m_jurusan->tampil_data("tb_jurusan")->result();

        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("STMIK Primakara");
        $object->getProperties()->setLastModifiedBy("STMIK Primakara");
        $object->getProperties()->setTitle("Daftar Jurusan");

        $object->setActiveSheetIndex(0);
        
        $object->getActiveSheet()->setCellValue('A1','NO');
        $object->getActiveSheet()->setCellValue('B1','KODE JURUSAN');
        $object->getActiveSheet()->setCellValue('C1','NAMA JURUSAN');
       

        $baris =2;
        $no = 1;

        foreach($data['jurusan'] as $jur){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $jur->kd_jurusan);
            $object->getActiveSheet()->setCellValue('C'.$baris, $jur->nama_jurusan);
        
            $baris++;

        }

        $filename= "Data_Jurusan".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Jurusan");

        header('Content-Type: application/
        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['mahasiswa']=$this->m_mhs->get_keyword($keyword);

        $this->load->view('templates/header');
		$this->load->view('v_mhs',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
    }
}