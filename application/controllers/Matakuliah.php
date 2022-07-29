<?php

class Matakuliah extends CI_Controller{
    public function index(){
        $data['matakuliah'] = $this->m_matakuliah->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('v_matakuliah',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	
    }

    public function aksi_tambah(){
        $kd_mk = $this->input->post('kode_mk');
        $nama_mk= $this->input->post('nama_mk');
        $sks = $this->input->post('sks');
      
        
        $data = array(
            'kode_mk' => $kd_mk,
            'nama_mk' => $nama_mk,
            'sks' => $sks
            
        );

        $this->m_matakuliah->input_data($data, 'tb_matakuliah');

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
         </div>');

        redirect('Matakuliah/index');
    }

    public function aksi_hapus($id){
        $where = array('id_mk' => $id);
        $this->m_matakuliah->hapus_data($where, 'tb_matakuliah');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
         </div>');
        redirect ('Matakuliah/index');


    }

    public function aksi_edit($id){
        $where = array('id_mk'=>$id);
        $data['matakuliah'] = $this->m_matakuliah->edit_data($where,'tb_matakuliah')->result();
        $this->load->view('templates/header');
		$this->load->view('v_edit_mk',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');

    }

    public function aksi_update(){
        $id = $this->input->post('id_mk');
        $kd_mk = $this->input->post('kode_mk');
        $nama = $this->input->post('nama_mk');
        $sks = $this->input->post('sks');
        

        $data = array(
            'kode_mk' => $kd_mk,
            'nama_mk' => $nama,
            'sks' => $sks
            
        );

        $where = array(
            'id_mk' => $id
        );

        $this->m_matakuliah->update_data($where,$data,'tb_matakuliah');
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diedit!
         </div>');
        redirect('Matakuliah/index');

    }

    
    public function cetak(){
        $data['matakuliah'] = $this->m_matakuliah->tampil_data("tb_matakuliah")->result();
        $this->load->view('cetak_mk', $data);
    }

    public function pdf(){
        $this->load->library('dompdf_gen');

        $data['matakuliah'] = $this->m_matakuliah->tampil_data("tb_matakuliah")->result();

        $this->load->view('laporan_pdf_mk',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);


        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_matakuliah.pdf",array('Attachment'=>0));
    }

    public function excel(){
    
        $data['matakuliah'] = $this->m_matakuliah->tampil_data("tb_matakuliah")->result();

        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("STMIK Primakara");
        $object->getProperties()->setLastModifiedBy("STMIK Primakara");
        $object->getProperties()->setTitle("Daftar Matakuliah");

        $object->setActiveSheetIndex(0);
        
        $object->getActiveSheet()->setCellValue('A1','NO');
        $object->getActiveSheet()->setCellValue('B1','KODE MATAKULIAH');
        $object->getActiveSheet()->setCellValue('C1','NAMA MATAKULIAH');
        $object->getActiveSheet()->setCellValue('D1','SKS');
        

        $baris =2;
        $no = 1;

        foreach($data['matakuliah'] as $mk){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $mk->kode_mk);
            $object->getActiveSheet()->setCellValue('C'.$baris, $mk->nama_mk);
            $object->getActiveSheet()->setCellValue('D'.$baris, $mk->sks);
            

            $baris++;

        }

        $filename= "Data_Matakuliah".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Matakuliah");

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
        $data['matakuliah']=$this->m_matakuliah->get_keyword($keyword);

        $this->load->view('templates/header');
		$this->load->view('v_matakuliah',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
    }
}