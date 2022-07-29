<?php

class kelas extends CI_Controller{
    public function index(){
        $data['kelas'] = $this->m_kelas->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('v_kelas',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	
    }

    public function aksi_tambah(){
        $nama_kelas = $this->input->post('nama_kelas');
        $ket = $this->input->post('ket');
        
    
        $data = array(
            'nama_kelas' => $nama_kelas,
            'ket' => $ket
        );

        $this->m_kelas->input_data($data, 'tb_kelas');

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
         </div>');

        redirect('Kelas/index');
    }

    public function aksi_hapus($id){
        $where = array('id_kls' => $id);
        $this->m_kelas->hapus_data($where, 'tb_kelas');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
         </div>');
        redirect ('Kelas/index');


    }

    public function aksi_edit($id){
        $where = array('id_kls'=>$id);
        $data['kelas'] = $this->m_kelas->edit_data($where,'tb_kelas')->result();
        $this->load->view('templates/header');
		$this->load->view('v_edit_kls',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');

    }

    public function aksi_update(){
        $id = $this->input->post('id_kls');
        $nama_kelas = $this->input->post('nama_kelas');
        $ket = $this->input->post('ket');
       
        $data = array(
            'nama_kelas' => $nama_kelas,
            'ket' => $ket
        );

        $where = array(
            'id_kls' => $id
        );

        $this->m_kelas->update_data($where,$data,'tb_kelas');
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diedit!
         </div>');
        redirect('Kelas/index');

    }


    public function cetak(){
        $data['kelas'] = $this->m_kelas->tampil_data("tb_kelas")->result();
        $this->load->view('cetak_kls', $data);
    }

    public function pdf(){
        $this->load->library('dompdf_gen');

        $data['kelas'] = $this->m_kelas->tampil_data("tb_kelas")->result();

        $this->load->view('laporan_pdf_kls',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);


        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_kelas.pdf",array('Attachment'=>0));
    }

    public function excel(){
    
        $data['kelas'] = $this->m_kelas->tampil_data("tb_kelas")->result();

        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("STMIK Primakara");
        $object->getProperties()->setLastModifiedBy("STMIK Primakara");
        $object->getProperties()->setTitle("Daftar Kelas");

        $object->setActiveSheetIndex(0);
        
        $object->getActiveSheet()->setCellValue('A1','NO');
        $object->getActiveSheet()->setCellValue('B1','NAMA KELAS');
        $object->getActiveSheet()->setCellValue('C1','KETERANGAN');

        $baris =2;
        $no = 1;

        foreach($data['kelas'] as $kls){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $kls->nama_kelas);
            $object->getActiveSheet()->setCellValue('C'.$baris, $kls->ket);
            

            $baris++;

        }

        $filename= "Data_Kelas".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Kelas");

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
        $data['kelas']=$this->m_kelas->get_keyword($keyword);

        $this->load->view('templates/header');
		$this->load->view('v_kelas',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
    }
}