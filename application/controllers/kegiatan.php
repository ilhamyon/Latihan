<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {



	function index(){
		$tgl1=date('Y-m-d');
		$tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl1)));

		$qd   =$this->db->query("SELECT nama_kegiatan,jenis_kegiatan,LEFT(nama_gedung,25) nama_gedung,lantai,nama_ruang,tanggal,tanggal2,jam,tp.penyelenggara,keterangan
									FROM tb_kegiatan tk
									JOIN tb_jeniskegiatan tj ON tk.`id_jk`=tj.`id_jk` 
									JOIN ms_ruang mr ON tk.`kode_ruang`=mr.`kode_ruang` 
									JOIN ms_gedung mg ON mr.`kode_gedung`=mg.`kode_gedung`
									JOIN tb_penyelenggara tp ON tp.id_p=tk.`penyelenggara`
									WHERE  tanggal  >= '$tgl1'
									OR tanggal2 >= '$tgl1'
									ORDER BY tanggal ASC
								")->result_array();
		$sql1 =$this->db->query("SELECT * FROM tb_pengumuman  ORDER BY id_pengumuman DESC LIMIT 5 OFFSET 0")->result_array();
		$sql2 =$this->db->query("SELECT * FROM tb_seputarkita  ORDER BY id_sk DESC LIMIT 5 OFFSET 0")->result_array();
		$sql3 =$this->db->query("SELECT * from tb_infoumum order by id_iu desc")->result_array();
		$sql4 =$this->db->query("SELECT file_media FROM tb_media  ORDER BY RAND() LIMIT 1")->result_array();
		$data =array('kegiatan' =>$qd,'pengumuman'=>$sql1,'sk'=>$sql2,'sk1'=>$sql2,'iu'=>$sql3,'media'=>$sql4);
		$this->load->view('sample',$data);
	}

	function abc(){
		$now=date('Y-m-d');
		$qd   =$this->db->query("SELECT nama_kegiatan,jenis_kegiatan,gedung_lantai,ruangan,tanggal,jam,penyelenggara,keterangan FROM tb_kegiatan tk, tb_jeniskegiatan jk WHERE tk.id_jk=jk.id_jk  ORDER BY tanggal DESC")->result_array();
		$sql1 =$this->db->query("SELECT * FROM tb_pengumuman  ORDER BY id_pengumuman DESC LIMIT 5 OFFSET 0")->result_array();
		$sql2 =$this->db->query("SELECT * FROM tb_seputarkita  ORDER BY id_sk DESC LIMIT 5 OFFSET 0")->result_array();
		$sql3 =$this->db->query("SELECT * from tb_infoumum order by id_iu desc")->result_array();
		$sql4 =$this->db->query("SELECT file_media FROM tb_media ORDER BY id_media DESC")->result_array();
		$data =array('kegiatan' =>$qd,'pengumuman'=>$sql1,'sk'=>$sql2,'sk1'=>$sql2,'iu'=>$sql3,'media'=>$sql4);
		$this->load->view('beranda',$data);
	}

}
