<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
		function __construct(){
         
               // session_start();
                parent::__construct();
                 if ( $this->session->userdata('masuk_jadwal')<>1 ) {
                        redirect('login');
                }
        }

	function index(){
		$sql1=$this->db->query("SELECT COUNT(*) keg FROM tb_kegiatan")->row();
		$sql2=$this->db->query("SELECT COUNT(*) peng FROM tb_pengumuman")->row();
		$sql3=$this->db->query("SELECT COUNT(*) sk FROM tb_seputarkita")->row();
		$sql4=$this->db->query("SELECT COUNT(*) iu FROM tb_infoumum")->row();
		$sql5=$this->db->query("SELECT COUNT(*) md FROM tb_media")->row();
		$sql6=$this->db->query("SELECT COUNT(*) rt FROM tb_rt")->row();
		$data=array('kegiatan'=>$sql1->keg,'pengumuman'=>$sql2->peng,'sk'=>$sql3->sk,'iu'=>$sql4->iu,'md'=>$sql5->md,'rt'=>$sql6->rt);
		$this->load->view('admin',$data);
	
    
    
	}

	function masterKegiatan(){
		if(isset($_POST['cari'])){
			$tgl1             =$_POST['tgl1'];
			$tgl2             =$_POST['tgl2'];
			$where            ="AND tanggal BETWEEN '$tgl1' AND '$tgl2'";
			/*$_SESSION['tgl1'] =$tgl1;
			$_SESSION['tgl2'] =$tgl2;*/
			$tgl=array(
				'tgl1' =>$tgl1,
				'tgl2' =>$tgl2
				);
			$this->session->set_userdata($tgl);
		}else{
			$th                =date('Y');
			$tgl1              =$th.'-01-01';
			$tgl2              =$th.'-12-31';
			$where            ="AND tanggal BETWEEN '$tgl1' AND '$tgl2'";

			$tgl=array(
				'tgl1' =>null,
				'tgl2' =>null
				);
			$this->session->set_userdata($tgl);
		}

		$query=$this->db->query("SELECT id_kegiatan,nama_kegiatan,jenis_kegiatan,tanggal,tanggal2,nama_gedung,nama_ruang,tp.penyelenggara 
								FROM tb_kegiatan tk,tb_jeniskegiatan tj,ms_ruang mr,ms_gedung mg,tb_penyelenggara tp
								WHERE tk.`id_jk`=tj.`id_jk` 
								AND  tk.`kode_ruang`=mr.`kode_ruang` 
								AND mr.`kode_gedung`=mg.`kode_gedung`
								AND tp.id_p=tk.`penyelenggara`"
								.$where.
								" ORDER BY tanggal DESC")->result_array();
		$data=array('mk'=>$query);
		$this->load->view('master_kegiatan',$data);
	}

	function tambahKegiatan(){
		$tp=$this->db->query("SELECT * FROM tb_penyelenggara ORDER BY penyelenggara ASC")->result_array();
		$jk=$this->db->query("SELECT * FROM tb_jeniskegiatan ORDER BY jenis_kegiatan ASC")->result_array();
		$tmp=$this->db->query("SELECT kode_ruang,CONCAT(nama_gedung,' - ',nama_ruang,' - kapasitas :',kapasitas,' orang') tempat
								FROM ms_ruang mr,ms_gedung mg
								WHERE mr.`kode_gedung`=mg.`kode_gedung`
								ORDER BY nama_gedung ASC")->result_array();
		$data=array('jk'=>$jk,'tempat'=>$tmp,'tp'=>$tp);
		$this->load->view('tambahKegiatan',$data);
	}

	function doTambahKegiatan(){
		$nama_kegiatan          =$_POST['nama_kegiatan'];
		$jenis_kegiatan         =$_POST['jenis_kegiatan'];
		$kode_ruang                =$_POST['kode_ruang'];
		$tgl_kegiatan           =$_POST['tgl_kegiatan'];
		$tgl_kegiatan2           =$_POST['tgl_kegiatan2'];
		$jam_kegiatan           =$_POST['jam_kegiatan'];
		$penyelenggara_kegiatan =$_POST['penyelenggara_kegiatan'];
		$keterangan             =$_POST['keterangan'];

		
		$data=array('id_jk'			=>$jenis_kegiatan,
					'nama_kegiatan' =>$nama_kegiatan,
					'kode_ruang'    =>$kode_ruang,
					'tanggal'       =>$tgl_kegiatan,
					'tanggal2'       =>$tgl_kegiatan2,
					'jam'           =>$jam_kegiatan,
					'penyelenggara' =>$penyelenggara_kegiatan,
					'keterangan'    =>$keterangan);

		$res=$this->mcrud->TambahData('tb_kegiatan',$data);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/masterKegiatan.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/tambahKegiatan.html';</script>";
		}
	}

	function hapusKegiatan($id){
		$res=$this->db->query("DELETE FROM tb_kegiatan WHERE id_kegiatan='$id'");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/masterKegiatan';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/masterKegiatan';</script>";
		}
	}

	function editKegiatan($id){
		$data['tp']  =$this->db->query("SELECT * FROM tb_penyelenggara ORDER BY penyelenggara ASC")->result_array();
		$data['keg'] =$this->db->query("SELECT * FROM tb_kegiatan WHERE id_kegiatan='$id'")->row();
		$data['jk']  =$this->db->query("SELECT * FROM tb_jeniskegiatan ORDER BY jenis_kegiatan ASC")->result_array();
		$data['tempat']=$tmp=$this->db->query("SELECT kode_ruang,CONCAT(nama_gedung,' - ',nama_ruang,' - kapasitas :',kapasitas,' orang') tempat
												FROM ms_ruang mr,ms_gedung mg
												WHERE mr.`kode_gedung`=mg.`kode_gedung`
												ORDER BY nama_gedung ASC")->result_array();
		$this->load->view('editKegiatan',$data);
	}

	function doEditKegiatan(){
		$id_kegiatan			=$_POST['id_kegiatan'];
		$nama_kegiatan          =$_POST['nama_kegiatan'];
		$jenis_kegiatan         =$_POST['jenis_kegiatan'];
		
		$kode_ruang                =$_POST['kode_ruang'];
		$tgl_kegiatan           =$_POST['tgl_kegiatan'];
		$jam_kegiatan           =$_POST['jam_kegiatan'];
		$penyelenggara_kegiatan =$_POST['penyelenggara_kegiatan'];
		$keterangan             =$_POST['keterangan'];

		
		$data=array('id_jk'			=>$jenis_kegiatan,
					'nama_kegiatan' =>$nama_kegiatan,
					'kode_ruang'       =>$kode_ruang,
					'tanggal'       =>$tgl_kegiatan,
					'jam'           =>$jam_kegiatan,
					'penyelenggara' =>$penyelenggara_kegiatan,
					'keterangan'    =>$keterangan);
		$where=array('id_kegiatan'=>$id_kegiatan);

		$res=$this->mcrud->EditData('tb_kegiatan',$data,$where);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/masterKegiatan';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/masterKegiatan';</script>";
		}
	}

	function jenisKegiatan(){
		$sql  =$this->db->query("SELECT * FROM tb_jeniskegiatan")->result_array();
		$data =array('kegiatan'=>$sql);
		$this->load->view('jenisKegiatan',$data);
	}

	function doTambahJK(){
		$jk  =$_POST['jk'];
		$res =$this->db->query("INSERT INTO tb_jeniskegiatan(jenis_kegiatan) VALUE ('$jk')");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/jenisKegiatan';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/jenisKegiatan';</script>";
		}
	}

	function hapusJK($id){
		$res =$this->db->query("DELETE FROM tb_jeniskegiatan WHERE id_jk='$id'");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/jenisKegiatan';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/jenisKegiatan';</script>";
		}	
	}

	function doEditJK(){
		$jk    =$_POST['jk'];
		$id_jk =$_POST['id_jk'];
		$res =$this->db->query("UPDATE tb_jeniskegiatan SET jenis_kegiatan='$jk' WHERE id_jk='$id_jk'");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/jenisKegiatan';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/jenisKegiatan';</script>";
		}
	}

	function pengumuman(){
		$sql  =$this->db->query("SELECT * FROM tb_pengumuman ORDER BY id_pengumuman DESC")->result_array();
		$data =array('rp'=>$sql,'edit'=>$sql);
		$this->load->view('pengumuman',$data);
	}

	function tambahPengumuman(){
		$judul =$_POST['judul'];
		$isi   =$_POST['isi'];
		$res   =$this->db->query("INSERT INTO tb_pengumuman (judul_pengumuman,isi_pengumuman) VALUES ('$judul','$isi')");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/pengumuman';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/pengumuman';</script>";
		}	
	}

	function hapusPengumuman($id){
		$res   =$this->db->query("DELETE FROM tb_pengumuman where id_pengumuman='$id'");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/pengumuman';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/pengumuman';</script>";
		}	
	}

	function editPengumuman(){
		$judul =$_POST['judul'];
		$isi   =$_POST['isi'];
		$id    =$_POST['id_pengumuman'];
		$res   =$this->db->query("UPDATE tb_pengumuman SET judul_pengumuman='$judul', isi_pengumuman='$isi' WHERE id_pengumuman='$id'");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/pengumuman';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/pengumuman';</script>";
		}		
	}

	function seputarKita(){
		$sql=$this->db->query("SELECT * FROM tb_seputarkita")->result_array();
		$data=array('data'=>$sql);
		$this->load->view('seputarKita',$data);
	}

	function tambahSK(){
		$tmp_file  =$_FILES['gambar']['tmp_name'];
		$name_file =$_FILES['gambar']['name'];
		$judul     =$_POST['judul'];
		$isi       =$_POST['isi'];
		
		$acak      = rand(1,99); 
		$nf        ='upload/'.$acak.$name_file;
		move_uploaded_file($tmp_file,$nf);
		$data=array('judul_sk'=>$judul,
					'isi_sk'=>$isi,
					'foto_sk'=>$nf);
		$res=$this->mcrud->TambahData('tb_seputarkita',$data);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/seputarKita';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/seputarKita';</script>";
		}	
	}

	function editSk(){
		$tmp_file  =$_FILES['gambar']['tmp_name'];
		$name_file =$_FILES['gambar']['name'];
		$judul     =$_POST['judul'];
		$isi       =$_POST['isi'];
		
		$id_sk     =$_POST['id_sk'];
		$fs        =$_POST['foto_sk'];
		if(!empty($name_file)){
			unlink($fs);
			$acak      = rand(1,99); 
			$nf        ='upload/'.$acak.$name_file;
			move_uploaded_file($tmp_file,$nf);
			$data=array('judul_sk'=>$judul,
						'isi_sk'=>$isi,
						'foto_sk'=>$nf);
		}else{
			$data=array('judul_sk'=>$judul,
						'isi_sk'=>$isi,
						'foto_sk'=>$fs);
		}
		$where=array('id_sk'=>$id_sk);
		$res=$this->mcrud->EditData('tb_seputarkita',$data,$where);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/seputarKita';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/seputarKita';</script>";
		}
	}

	function hapusSk($id){
		$sql=$this->db->query("SELECT foto_sk FROM tb_seputarkita WHERE id_sk='$id'")->row();

		$folder=$sql->foto_sk;//nama folder dan nama foto yag akan di hapus
		$res=unlink($folder);//di gunakan untuk menghapus data yang ada di dlam folder 
		if($res){
			$this->db->query("DELETE FROM tb_seputarkita WHERE id_sk='$id'");
			echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/seputarKita';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak dihapus !');
                  window.location='".site_url()."admin/seputarKita';</script>";
		}
	}



	function media(){
		$sql=$this->db->query("SELECT * FROM tb_media ORDER BY id_media DESC")->result_array();
		$data=array('arr'=>$sql);
		$this->load->view('media',$data);
	}

	function tambahMedia(){
		$tmp_file  =$_FILES['gambar']['tmp_name'];
		$name_file =$_FILES['gambar']['name'];
		$judul     =$_POST['judul'];
		
		$explode       = explode('.',$name_file);
        $extensi       = $explode[count($explode)-1];
		
		$acak      = rand(1,99); 
		$nf        ='upload/'.$acak.$judul.'.'.$extensi;
		move_uploaded_file($tmp_file,$nf);
		$data=array('judul_media'=>$judul,'file_media'=>$nf);
		$res=$this->mcrud->TambahData('tb_media',$data);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/media';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/media';</script>";
		}
	}

	function hapusMedia($id){
		$sql=$this->db->query("SELECT file_media FROM tb_media WHERE id_media='$id'")->row();

		$folder=$sql->file_media;//nama folder dan nama foto yag akan di hapus
		$res=unlink($folder);//di gunakan untuk menghapus data yang ada di dlam folder 
		if($res){
			$this->db->query("DELETE FROM tb_media WHERE id_media='$id'");
			echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/media';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak dihapus !');
                  window.location='".site_url()."admin/media';</script>";
		}
	}

	function runingText(){
		$sql=$this->db->query("SELECT * from tb_rt order by id_rt desc")->result_array();
		$data=array('data'=>$sql);
		$this->load->view('runingText',$data);
	}

	function tambahRuning(){
		$rt =$_POST['rt'];
		$res=$this->db->query("INSERT INTO tb_rt (rt) VALUES ('$rt')");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/runingText';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/runingText';</script>";
		}
	}

	function ubahRuningText(){
		$id =$_POST['id_rt'];
		$rt =$_POST['rt'];
		$res=$this->db->query("UPDATE tb_rt set rt='$rt' where id_rt='$id' " );
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/runingText';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/runingText';</script>";
		}
	}

	function hapusRt($id){
		$res=$this->db->query("DELETE FROM tb_rt where id_rt='$id'" );
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/runingText';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/runingText';</script>";
		}	
	}

	function user(){
		$sql =$this->db->query("SELECT id_user,username,`password`,nama,nama_group,penyelenggara
								FROM tb_user a
								JOIN tb_group b ON a.`kode_group`=b.`kode_group`
								LEFT JOIN tb_penyelenggara c ON c.`id_p`=a.`id_p")->result_array();
		$kg  =$this->db->query("SELECT * from tb_group")->result_array();
		$py  =$this->db->query("SELECT * FROM tb_penyelenggara")->result_array();
		
		$data=array('data'=>$sql,'group'=>$kg,'py' =>$py);
		$this->load->view('user',$data);
	}

	function tambahPengguna(){
		$us         =$_POST['usernameq'];
		$ps         =base64_encode($_POST['passwordq']);
		$nama       =$_POST['nama'];
		$kode_group =$_POST['kode_group'];
		$id_p       =$_POST['id_p'];
		$res  =$this->db->query("INSERT INTO tb_user (username,password,nama,kode_group,id_p) VALUES ('$us','$ps','$nama','$kode_group',$id_p)");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/user.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/user.html';</script>";
		}
	}

	function editPengguna(){
		$id_user    =$_POST['id_user'];
		$us         =$_POST['usernameq'];
		$ps         =base64_encode($_POST['passwordq']);
		$nama       =$_POST['nama'];
		$kode_group =$_POST['kode_group'];
		$id_p       =$_POST['id_p'];

		$res=$this->db->query("UPDATE tb_user set username='$us',id_p='$id_p',kode_group='$kode_group',nama='$nama' ,password='$ps' WHERE id_user='$id_user'" );
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/user.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/user.html';</script>";
		}	
	}

	function hapusUser($id){
		$res=$this->db->query("DELETE FROM tb_user  WHERE id_user='$id'" );
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/user';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/user';</script>";
		}	
	}

	function infoUmum(){
		$sql=$this->db->query("SELECT * from tb_infoumum order by id_iu desc")->result_array();
		$data=array('data'=>$sql);
		$this->load->view('infoUmum',$data);
	}

	function tambahInfo(){
		$rt        =$_POST['rt'];
		$tmp_file  =$_FILES['gambar']['tmp_name'];
		$name_file =$_FILES['gambar']['name'];

		$exp     =explode('.',$name_file);
		$exe     =$exp[count($exp)-1];
		$foto_iu ="upload/iu/".$rt.".".$exe;
		move_uploaded_file($tmp_file,$foto_iu);

		$res=$this->db->query("INSERT INTO tb_infoumum (iu,foto_iu) VALUES ('$rt','$foto_iu')");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/infoUmum';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/infoUmum';</script>";
		}
	}

	function ubahInfo(){
		$id =$_POST['id_rt'];
		$rt =$_POST['rt'];
		$res=$this->db->query("UPDATE tb_infoumum set iu='$rt' where id_iu='$id' " );
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/infoUmum';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/infoUmum';</script>";
		}
	}

	function hapusInfo($id){
		$res=$this->db->query("DELETE FROM tb_infoumum where id_iu='$id'" );
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/infoUmum';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/infoUmum';</script>";
		}	
	}

	function rekapKegiatan(){
		if(isset($_POST['cari'])){
			$tgl1             =$_POST['tgl1'];
			$tgl2             =$_POST['tgl2'];
			$where            ="AND tanggal BETWEEN '$tgl1' AND '$tgl2'";
			/*$_SESSION['tgl11'] =$tgl1;
			$_SESSION['tgl22'] =$tgl2;*/
			$tgl=array(
				'tgl11'=>$tgl1,
				'tgl22'=>$tgl2
				);
			$this->session->set_userdata($tgl);
		}else{
			$th                =date('Y');
			$tgl1              =$th.'-01-01';
			$tgl2              =date('Y-m-d');
			$where            ="AND tanggal BETWEEN '$tgl1' AND '$tgl2'";
			$tgl=array(
				'tgl11'=>null,
				'tgl22'=>null
				);
			$this->session->set_userdata($tgl);
		}
		$sql=$this->db->query("SELECT jenis_kegiatan,COUNT(id_kegiatan) jum
							   FROM tb_kegiatan tk,tb_jeniskegiatan tj 
							   WHERE tk.`id_jk`=tj.`id_jk` 
							   ".$where."
							   GROUP BY jenis_kegiatan")->result_array();
		$data=array('sql'=>$sql);
		$this->load->view('rekapKegiatan',$data);
	}

	function Gedung(){
		$data['gedung']=$this->db->query("SELECT * FROM ms_gedung ORDER BY nama_gedung ASC")->result_array();
		$this->load->view('mastergedung',$data);
	}

	function tambahGedung(){
		$nama_gedung=$_POST['nama_gedung'];
		$res=$this->db->query("INSERT INTO ms_gedung (nama_gedung) VALUES ('$nama_gedung')");
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/Gedung.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/Gedung.html';</script>";
		}
	}

	function editGedung(){
		$data['nama_gedung']=$_POST['nama_gedung'];
		$where['kode_gedung']=$_POST['kode_gedung'];
		$res=$this->mcrud->EditData('ms_gedung',$data,$where);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/Gedung.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/Gedung.html';</script>";
		}
	}

	function hapusgedung($id){
		$where['kode_gedung']=$id;
		$res=$this->mcrud->HapusData('ms_gedung',$where);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/Gedung.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/Gedung.html';</script>";
		}	
	}

	function Ruangan(){
		$data['gedung']=$this->db->query("SELECT * FROM ms_gedung")->result_array();
		$data['ruang']=$this->db->query("SELECT kode_ruang,nama_ruang,nama_gedung,lantai,kapasitas
											FROM ms_ruang mr,ms_gedung mg
											WHERE mr.`kode_gedung`=mg.`kode_gedung`
											ORDER BY nama_gedung ASC,nama_ruang asc")->result_array();
		$this->load->view('masterruangan',$data);	
	}

	function tambahruangan(){
		$data['nama_ruang']  =$_POST['nama_ruang'];
		$data['kapasitas']   =$_POST['kapasitas'];
		$data['kode_gedung'] =$_POST['kode_gedung'];
		$data['lantai']      =$_POST['lantai'];
		$res=$this->mcrud->TambahData('ms_ruang',$data);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/Ruangan.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/Ruangan.html';</script>";
		}
	}

	function editruangan(){
		$data['nama_ruang']  =$_POST['nama_ruang'];
		$data['kapasitas']   =$_POST['kapasitas'];
		$data['kode_gedung'] =$_POST['kode_gedung'];
		$data['lantai']      =$_POST['lantai'];
		$where['kode_ruang'] =$_POST['kode_ruang'];

		$res=$this->mcrud->EditData('ms_ruang',$data,$where);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil disimpan !');
                  window.location='".site_url()."admin/Ruangan.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak tersimpan !');
                  window.location='".site_url()."admin/Ruangan.html';</script>";
		}
	}

	function hapusruangan($id){
		$where['kode_ruang'] =$id;
		$res                 =$this->mcrud->HapusData('ms_ruang',$where);
		if($res){
			 echo "<script>window.alert('Sukses, Data berhasil dihapus !');
                  window.location='".site_url()."admin/Ruangan.html';</script>";
		}else{
			echo "<script>window.alert('Gagal, Data tidak terhapus !');
                  window.location='".site_url()."admin/Ruangan.html';</script>";
		}	
	}

	function jadwalRuangan(){
		
		$data['bulan']=$this->db->query("SELECT MONTH(tanggal) bulan,CASE WHEN MONTH(tanggal)=1 THEN 'Januari' 
														 WHEN MONTH(tanggal)=2 THEN 'Februari' 
														 WHEN MONTH(tanggal)=3 THEN 'Maret' 
														 WHEN MONTH(tanggal)=4 THEN 'April' 
														 WHEN MONTH(tanggal)=5 THEN 'Mei' 
														 WHEN MONTH(tanggal)=6 THEN 'Juni' 
														 WHEN MONTH(tanggal)=7 THEN 'Juli' 
														 WHEN MONTH(tanggal)=8 THEN 'Agustus' 
														 WHEN MONTH(tanggal)=9 THEN 'September' 
														 WHEN MONTH(tanggal)=10 THEN 'Oktober' 
														 WHEN MONTH(tanggal)=11 THEN 'November' 
														 ELSE 'Desmber' END nama_bulan
										FROM tb_kegiatan
										GROUP BY MONTH(tanggal)
										ORDER BY MONTH(tanggal) ASC")->result_array();
		$data['tahun']=$this->db->query("SELECT YEAR(tanggal) tahun
										FROM tb_kegiatan
										GROUP BY YEAR(tanggal)")->result_array();
		if(isset($_POST['cari'])){
			$bulan=$_POST['bulan'];
			$tahun=$_POST['tahun'];

			$this->session->set_userdata('bj',$bulan);
			$this->session->set_userdata('tj',$tahun);
		}else{
		 	$bulan=$data['bulan'][count($data['bulan'])-1]['bulan'];
			$tahun=$data['tahun'][count($data['tahun'])-1]['tahun'];
			$this->session->set_userdata('tj',$tahun);
			$this->session->set_userdata('bj',$bulan);
		}
		$data['jadwal']=$this->db->query("SELECT nama_ruang,nama_kegiatan,nama_gedung,kapasitas,penyelenggara,
												CASE  WHEN DAY(tanggal)='1' THEN 'v' ELSE NULL END 't1',
												CASE  WHEN DAY(tanggal)='2' THEN 'v' ELSE NULL END 't2',
												CASE  WHEN DAY(tanggal)='3' THEN 'v' ELSE NULL END 't3',
												CASE  WHEN DAY(tanggal)='4' THEN 'v' ELSE NULL END 't4',
												CASE  WHEN DAY(tanggal)='5' THEN 'v' ELSE NULL END 't5',
												CASE  WHEN DAY(tanggal)='6' THEN 'v' ELSE NULL END 't6',
												CASE  WHEN DAY(tanggal)='7' THEN 'v' ELSE NULL END 't7',
												CASE  WHEN DAY(tanggal)='8' THEN 'v' ELSE NULL END 't8',
												CASE  WHEN DAY(tanggal)='9' THEN 'v' ELSE NULL END 't9',
												CASE  WHEN DAY(tanggal)='10' THEN 'v' ELSE NULL END 't10',
												CASE  WHEN DAY(tanggal)='11' THEN 'v' ELSE NULL END 't11',
												CASE  WHEN DAY(tanggal)='12' THEN 'v' ELSE NULL END 't12',
												CASE  WHEN DAY(tanggal)='13' THEN 'v' ELSE NULL END 't13',
												CASE  WHEN DAY(tanggal)='14' THEN 'v' ELSE NULL END 't14',
												CASE  WHEN DAY(tanggal)='15' THEN 'v' ELSE NULL END 't15',
												CASE  WHEN DAY(tanggal)='16' THEN 'v' ELSE NULL END 't16',
												CASE  WHEN DAY(tanggal)='17' THEN 'v' ELSE NULL END 't17',
												CASE  WHEN DAY(tanggal)='18' THEN 'v' ELSE NULL END 't18',
												CASE  WHEN DAY(tanggal)='19' THEN 'v' ELSE NULL END 't19',
												CASE  WHEN DAY(tanggal)='20' THEN 'v' ELSE NULL END 't20',
												CASE  WHEN DAY(tanggal)='21' THEN 'v' ELSE NULL END 't21',
												CASE  WHEN DAY(tanggal)='22' THEN 'v' ELSE NULL END 't22',
												CASE  WHEN DAY(tanggal)='23' THEN 'v' ELSE NULL END 't23',
												CASE  WHEN DAY(tanggal)='24' THEN 'v' ELSE NULL END 't24',
												CASE  WHEN DAY(tanggal)='25' THEN 'v' ELSE NULL END 't25',
												CASE  WHEN DAY(tanggal)='26' THEN 'v' ELSE NULL END 't26',
												CASE  WHEN DAY(tanggal)='27' THEN 'v' ELSE NULL END 't27',
												CASE  WHEN DAY(tanggal)='28' THEN 'v' ELSE NULL END 't28',
												CASE  WHEN DAY(tanggal)='29' THEN 'v' ELSE NULL END 't29',
												CASE  WHEN DAY(tanggal)='30' THEN 'v' ELSE NULL END 't30',
												CASE  WHEN DAY(tanggal)='31' THEN 'v' ELSE NULL END 't31'
											FROM 
											(SELECT nama_ruang,nama_kegiatan,nama_gedung,kapasitas,tanggal,penyelenggara
											FROM ms_ruang mr

											LEFT JOIN ms_gedung mg ON mr.`kode_gedung`=mg.`kode_gedung`
											LEFT JOIN (SELECT kode_ruang,nama_kegiatan,tanggal,b.penyelenggara  penyelenggara
														FROM tb_kegiatan a,tb_penyelenggara b  WHERE MONTH(tanggal)='$bulan'  and a.penyelenggara=b.id_p
														AND YEAR(tanggal)='$tahun') tk ON tk.kode_ruang=mr.`kode_ruang` ) abc")->result_array();
		$this->load->view('jadwalRuangan',$data);
	}

	function Penyelenggara(){
		$data['data']=$this->db->query("SELECT * from tb_penyelenggara")->result_array();
		$this->load->view('masterpenyelenggara',$data);
	}

	function doTambahpeneyelenggara(){
		$penyelenggara=$_POST['penyelenggara'];
		$this->db->query("INSERT INTO tb_penyelenggara (penyelenggara) value ('$penyelenggara')");
		redirect('admin/Penyelenggara');
	}

	function doeditpenyelenggara(){
		$penyelenggara =$_POST['penyelenggara'];
		$id_p          =$_POST['id_p'];

		$this->db->query("UPDATE tb_penyelenggara SET penyelenggara='$penyelenggara' WHERE id_p='$id_p'");
		redirect('admin/Penyelenggara');	
	}

	function hapuspenyelenggara($id){
		$this->db->query("DELETE FROM tb_penyelenggara  WHERE id_p='$id'");
		redirect('admin/Penyelenggara');		
	}

	function privilege(){
		$data['data']=$this->db->query("SELECT * FROM tb_group")->result_array();
		$this->load->view('privilege',$data);
	}

	function hakAksesmenu($id){
		$cm=$this->db->query('SELECT kode_menu FROM tb_menu')->result_array();
		foreach($cm as $rm){
			$kode_menu=$rm['kode_menu'];
			$sql="SELECT kode_menu from tb_role WHERE kode_group='$id' AND kode_menu='$kode_menu'";
			$qcm=$this->db->query($sql)->num_rows();
			if($qcm == null){
				$data=array('kode_menu'=>$kode_menu,'kode_group'=>$id);

				$this->mcrud->TambahData('tb_role',$data);
			}
		}

		$qr=$this->db->query("SELECT * FROM (
								SELECT kode_role,nama_menu,CASE parent_menu WHEN 0 THEN '#'  ELSE NULL END AS parent,status_role,a.sort_menu sort
								FROM tb_menu a , tb_role b WHERE a.kode_menu=b.kode_menu AND parent_menu=0 AND kode_group='$id' 
								UNION 
									SELECT kode_role,a.nama_menu,b.nama_menu parent,status_role,a.sort_menu
									FROM tb_menu a,(SELECT kode_menu,nama_menu FROM tb_menu) b, tb_role c WHERE a.parent_menu=b.kode_menu AND a.kode_menu=c.kode_menu AND kode_group='$id' ) cb ORDER BY parent,cb.sort ASC")->result_array();
	
		$data['role']        =$qr;
		$data['kode_groupq'] =$id;
		$this->load->view('hakakses',$data);
	}

	function do_role(){
		$kode_group =$_POST['kode_group'];
		$role       =$_POST['role'];
		$ua         =$this->db->query("UPDATE tb_role SET status_role='0' WHERE kode_group ='$kode_group'");
		if($ua){
			$jumlah=count($role);
			for($i=0; $i < $jumlah; $i++){
				$kode_role=$role[$i];
				$ur=$this->db->query("UPDATE tb_role SET status_role='1' WHERE kode_role='$kode_role'");
			}
		}

		echo "<script>window.alert('Sukses, Data tersimpan !');
                  window.location='".site_url()."admin/privilege';</script>";
	}

	function rapatEselon(){
		echo $kg=$this->session->userdata('kg_jadwal');
		  if(isset($_POST['cari'])){
                        $tgl1             =$_POST['tgl1'];
                        $tgl2             =$_POST['tgl2'];
                        $_SESSION['tgl1'] =$tgl1;
                        $_SESSION['tgl2'] =$tgl2;
                }else{
                        $th                =date('Y');
                        $tgl1              =$th.'-01-01';
                        $tgl2              =$th.'-12-30';

                        $_SESSION['tgl1'] =$tgl1;
                        $_SESSION['tgl2'] =$tgl2;
                }
		if($kg==2){
			$id_p=$this->session->userdata('id_p');
			$and="and	a.id_p='$id_p'";
		}else{
			$and="";
		}
		$data['data']=$this->db->query("SELECT a.*,CONCAT(nama_ruang,' - ',lantai,' - ',nama_gedung) tempat,penyelenggara
                                                FROM tb_rapat a
                                                left join ms_ruang b on a.kode_ruang=b.kode_ruang
                                                left join ms_gedung c on b.kode_gedung=c.kode_gedung
                                                left join tb_penyelenggara d on d.id_p=a.id_p 
                                                WHERE tgl_awal BETWEEN '$tgl1' AND '$tgl2'
                                                ".$and."
                                                order by tgl_awal asc")->result_array();
	 
		$this->load->view('rapatEselon',$data);
		 
	}

	function tambahrapat(){
		$data['tmp']=$this->db->query("SELECT kode_ruang,CONCAT(nama_gedung,' - ',nama_ruang,' - kapasitas :',kapasitas,' orang') tempat
								FROM ms_ruang mr,ms_gedung mg
								WHERE mr.`kode_gedung`=mg.`kode_gedung`
								ORDER BY nama_gedung ASC")->result_array();
		$data['ese']=$this->db->query("SELECT * FROM tb_penyelenggara")->result_array();
		$this->load->view('tambahrapat',$data);
		
	}

	function doaddrapat(){
		$id_p        =$_POST['id_p'];
		$no_undangan =$_POST['no_undangan'];
		$acara       =$_POST['acara'];
		$disposisi   =$_POST['disposisi'];
		$hari        =$_POST['hari'];
		$tgl_awal    =$_POST['tgl_awal'];
		$tgl_akhir   =$_POST['tgl_akhir'];
		$jam         =$_POST['jam'];
		$kode_ruang  =$_POST['kode_ruangan'];


		if(isset($_POST['tempat_lain'])){
			$tl=$_POST['tempat_lain'];
			$data=array(
				'hari'        =>$hari,
				'tgl_awal'    =>$tgl_awal,
				'tgl_akhir'   =>$tgl_akhir,
				'tl'  =>$tl,
				'acara'       =>$acara,
				'jam'         =>$jam,
				'disposisi'   =>$disposisi,
				'no_undangan' =>$no_undangan,
				'id_p'        =>$id_p
				);
		}else{
			$data=array(
				'hari'        =>$hari,
				'tgl_awal'    =>$tgl_awal,
				'tgl_akhir'   =>$tgl_akhir,
				'kode_ruang'  =>$kode_ruang,
				'acara'       =>$acara,
				'jam'         =>$jam,
				'disposisi'   =>$disposisi,
				'no_undangan' =>$no_undangan,
				'id_p'        =>$id_p
				);
		}

		
		$this->mcrud->TambahData('tb_rapat',$data);
		redirect('admin/rapatEselon');
	}

	function hapusrapat($kode){
		$where['kode_rapat']=$kode;
		$this->mcrud->HapusData('tb_rapat',$where);
		$url= $_SERVER['HTTP_REFERER'];;
		redirect($url);
	}

	function editrapat($kode){
		$data['tmp']=$this->db->query("SELECT kode_ruang,CONCAT(nama_gedung,' - ',nama_ruang,' - kapasitas :',kapasitas,' orang') tempat
								FROM ms_ruang mr,ms_gedung mg
								WHERE mr.`kode_gedung`=mg.`kode_gedung`
								ORDER BY nama_gedung ASC")->result_array();
		$data['ese']=$this->db->query("SELECT * FROM tb_penyelenggara")->result_array();
		$data['data']=$this->db->query("SELECT * FROM tb_rapat WHERE kode_rapat='$kode'")->row();
		$this->load->view('editrapat',$data);		
	}

	function doeditrapat(){
		$id_p        =$_POST['id_p'];
		$no_undangan =$_POST['no_undangan'];
		$acara       =$_POST['acara'];
		$disposisi   =$_POST['disposisi'];
		$hari        =$_POST['hari'];
		$tgl_awal    =$_POST['tgl_awal'];
		$tgl_akhir   =$_POST['tgl_akhir'];
		$jam         =$_POST['jam'];
		$kode_ruang  =$_POST['kode_ruangan'];
		$where['kode_rapat']=$_POST['kode_rapat'];

		if($kode_ruang=='lain'){
			$tl=$_POST['tempat_lain'];
			$data=array(
				'hari'        =>$hari,
				'tgl_awal'    =>$tgl_awal,
				'tgl_akhir'   =>$tgl_akhir,
				'tl'  =>$tl,
				'kode_ruang'  =>null,
				'acara'       =>$acara,
				'jam'         =>$jam,
				'disposisi'   =>$disposisi,
				'no_undangan' =>$no_undangan,
				'id_p'        =>$id_p
				);
		}else{
			$data=array(
				'hari'        =>$hari,
				'tgl_awal'    =>$tgl_awal,
				'tgl_akhir'   =>$tgl_akhir,
				'kode_ruang'  =>$kode_ruang,
				'tl'  =>null,
				'acara'       =>$acara,
				'jam'         =>$jam,
				'disposisi'   =>$disposisi,
				'no_undangan' =>$no_undangan,
				'id_p'        =>$id_p
				);
		}

		
		$this->mcrud->EditData('tb_rapat',$data,$where);
		redirect('admin/rapatEselon');
	}

	
}
