<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
	
function cetak_agenda($tgl1,$tgl2){
		$kg   =$this->session->userdata('kg_jadwal');
			//echo $id_p=$this->session->userdata('id_p');
		if($kg==2){
			$id_p=$this->session->userdata('id_p');
			$and="and	a.id_p='$id_p'";
		}else{
			$and="";
		}
		$tgl=array('tgl1'=>$tgl1,'tgl2'=>$tgl2);
		$data['tanggal']=$tgl;
	
		$data['data']=$this->db->query("SELECT a.*,CONCAT(nama_ruang,' - ',lantai,' - ',nama_gedung) tempat,penyelenggara
                                                FROM tb_rapat a
                                                left join ms_ruang b on a.kode_ruang=b.kode_ruang
                                                left join ms_gedung c on b.kode_gedung=c.kode_gedung
                                                left join tb_penyelenggara d on d.id_p=a.id_p 
                                                WHERE tgl_awal BETWEEN '$tgl1' AND '$tgl2'
                                                ".$and."
                                                order by tgl_awal asc")->result_array();
	// echo $this->session->userdata('masuk_jadwal');
	$this->load->view('cetak_agenda_kabiro',$data);

	}
}