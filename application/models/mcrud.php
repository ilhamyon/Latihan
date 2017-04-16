<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrud extends CI_Model {
	

	//create
	public function TambahData($tabel,$data){
		$res=$this->db->insert($tabel,$data);
		return $res;
	}

	//update
	public function EditData($tabel,$data,$where){
		$res=$this->db->update($tabel,$data,$where);
		return $res;	
	}

	//delete
	public function HapusData($tabel,$where){
		$res=$this->db->delete($tabel,$where);
		return $res;
	}
}
