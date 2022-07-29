<?php

class Dosen extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
    } 

    public function index(){
        $data['dosen'] = $this->m_dosen->tampil_data()->result();

		$this->load->view('templates/header');
		$this->load->view('v_dosen',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	
    }

    public function aksi_tambah(){
        $nidn = $this->input->post('nidn');
        $nama = $this->input->post('nama');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jenis_kelamin');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $foto = $_FILES['foto'];
        
        if($foto =''){}
        else{
            $config['upload_path']          = 'images/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
           

            
           $this->load->library('upload', $config);
           $img = "images";
           // $this->load->library('upload');
           // $this->upload->initialize($config);
            if (!$this->upload->do_upload($img)) {
                //echo $this->upload->display_errors();
                //die();
                if(isset($_FILES['images']))  
                    echo "isset";

                    //$error = array('error' => $this->upload->display_errors());
                    echo $this->upload->display_errors();
                    die();

                    //$this->load->view('v_dosen', $error);
            }
            else{
                //$foto = $this->upload->data('file_name');

                //$data = array('upload_data' => $this->upload->data());

                    //$this->load->view('v_dosen', $data);
                    $data = array('upload_data' => $this->upload->data());

                    $field_data = $this->upload->data();
    
                    echo $field_data['file_name']; // etc 
    
                    $this->load->view('upload_success', $data);
                    print_r($data);
            }
        }


        $data = array(
            'nidn' => $nidn,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'jenis_kelamin' => $jk,
            'no_telp' => $no_telp,
            'email' => $email,
            'foto' => $foto
        );

        $this->m_dosen->input_data($data, 'tb_dosen');

        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan!
         </div>');

        redirect('Dosen/index');
    }

    public function aksi_hapus($id){
        $where = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tb_dosen');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus!
         </div>');
        redirect ('Dosen/index');


    }

    public function aksi_edit($id){
        $where = array('id'=>$id);
        $data['dosen'] = $this->m_dosen->edit_data($where,'tb_dosen')->result();
        $this->load->view('templates/header');
		$this->load->view('v_edit_dosen',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');

    }

    public function aksi_update(){
        $id = $this->input->post('id');
        $nidn = $this->input->post('nidn');
        $nama = $this->input->post('nama');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jenis_kelamin');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        

    
        $data = array(
            'nidn' => $nidn,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'jenis_kelamin' => $jk,
            'no_telp' => $no_telp,
            'email' => $email,
           
        );

        $where = array(
            'id' => $id
        );

        $this->m_dosen->update_data($where,$data,'tb_dosen');
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diedit!
         </div>');
        redirect('Dosen/index');

    }

    public function aksi_detail($id ){
        $this->load->model('m_dosen');
        $detail = $this->m_dosen->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/header');
		$this->load->view('v_detail_dosen',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');

    }

    public function cetak(){
        $data['dosen'] = $this->m_dosen->tampil_data("tb_dosen")->result();
        $this->load->view('cetak_dosen', $data);
    }

    public function pdf(){
        $this->load->library('dompdf_gen');

        $data['dosen'] = $this->m_dosen->tampil_data("tb_dosen")->result();

        $this->load->view('laporan_pdf_dosen',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);


        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_dosen.pdf",array('Attachment'=>0));
    }

    public function excel(){
    
        $data['dosen'] = $this->m_dosen->tampil_data("tb_dosen")->result();

        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("STMIK Primakara");
        $object->getProperties()->setLastModifiedBy("STMIK Primakara");
        $object->getProperties()->setTitle("Daftar dosen");

        $object->setActiveSheetIndex(0);
        
        $object->getActiveSheet()->setCellValue('A1','NO');
        $object->getActiveSheet()->setCellValue('B1','NIDN');
        $object->getActiveSheet()->setCellValue('C1','NAMA DOSEN');
        $object->getActiveSheet()->setCellValue('D1','TANGGAL LAHIR');
        $object->getActiveSheet()->setCellValue('E1','ALAMAT');
        $object->getActiveSheet()->setCellValue('F1','JENIS KELAMIN');
        $object->getActiveSheet()->setCellValue('H1','NO. TELEPON');
        $object->getActiveSheet()->setCellValue('G1','EMAIL');
       

        $baris =2;
        $no = 1;

        foreach($data['dosen'] as $dsn){
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $dsn->nidn);
            $object->getActiveSheet()->setCellValue('C'.$baris, $dsn->nama);
            $object->getActiveSheet()->setCellValue('D'.$baris, $dsn->tgl_lahir);
            $object->getActiveSheet()->setCellValue('E'.$baris, $dsn->alamat);
            $object->getActiveSheet()->setCellValue('F'.$baris, $dsn->jenis_kelamin);
            $object->getActiveSheet()->setCellValue('H'.$baris, $dsn->no_telp);
            $object->getActiveSheet()->setCellValue('G'.$baris, $dsn->email);
          

            $baris++;

        }

        $filename= "Data_dosen".'.xlsx';
        $object->getActiveSheet()->setTitle("Data dosen");

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
        $data['dosen']=$this->m_dosen->get_keyword($keyword);

        $this->load->view('templates/header');
		$this->load->view('v_dosen',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
    }
}