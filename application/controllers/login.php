<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	 function __construct()
        {
                //session_start();
                parent::__construct();
                
        }
	public function index()
	{
		//	echo "login bro";
		$this->load->view('login');
	}

	function cek_login(){
		$username =$_POST['username'];
		$password =base64_encode($_POST['password']);
		$sql      =$this->db->query("SELECT id_user,nama,a.kode_group,a.id_p ,penyelenggara,nama_group 
										FROM tb_user a
										LEFT join  tb_penyelenggara b ON a.`id_p`=b.`id_p`
										LEFT join  tb_group c ON c.kode_group=a.kode_group
										WHERE `username`='$username' AND `password`='$password'")->row();
		$cek=count($sql);
		if($cek>0){
			$this->session->set_userdata('');
			

			$ku =$sql->id_user;
			$kg =$sql->kode_group;
			$ki =$sql->id_p;
			$nm =$sql->nama;
			$ng =$sql->nama_group;
			$np =$sql->penyelenggara;

			$session = array(
				'ku_jadwal'     => $ku ,
				'kg_jadwal'     => $kg,
				'id_p'          => $ki,
				'nama'          => $nm,  
				'nama_group'    => $ng,
				'penyelenggara' => $np,
				'masuk_jadwal'  =>true
				);
			$this->session->set_userdata($session);

			if($kg==1){
				redirect('admin');
			}else if($kg!=1){
				redirect('rapat');
			}

		}else{
			echo "<script>window.alert('Login Gagal!');
                  window.location='".site_url()."login';</script>";
		}
	}

 

	function keluar(){
		$array_items = array(
				'ku_jadwal'  ,
				'kg_jadwal' ,
				'id_p' ,
				'nama' ,  
				'nama_group'  ,
				'penyelenggara' ,
				'masuk_jadwal' 
			);
		$cek=$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
			echo "<script>window.alert('Sukses, berhasil logout !');
                  window.location='".site_url()."login.html';</script>";

		
	}


}