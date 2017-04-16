<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rapat extends CI_Controller {
	function __construct(){
         
               // session_start();
                parent::__construct();
                 if ( $this->session->userdata('masuk_jadwal')<>1 ) {
                        redirect('login');
                }
        }

	function index(){
                $week=date('Y-m-d');
                $pj=$this->session->userdata('id_p');
                $data['data']=$this->db->query("SELECT a.*,CONCAT(nama_ruang,' - ',lantai,' - ',nama_gedung) tempat
                                                FROM tb_rapat a
                                                left join ms_ruang b on a.kode_ruang=b.kode_ruang
                                                left join ms_gedung c on b.kode_gedung=c.kode_gedung
                                                WHERE WEEK(tgl_awal)=week('$week')
                                                AND id_p='$pj'
                                                order by tgl_awal asc
                                                ")->result_array();
                $this->load->view('viewrapat',$data);

	}

        function rekapRapat(){
                $pj=$this->session->userdata('id_p');
                if(isset($_POST['cari'])){
                        $tgl1             =$_POST['tgl1'];
                        $tgl2             =$_POST['tgl2'];
                        $_SESSION['tgl1'] =$tgl1;
                        $_SESSION['tgl2'] =$tgl2;
                }else{
                        $th                =date('Y-m');
                        $tgl1              =$th.'-01';
                        $tgl2              =$th.'-30';

                        $_SESSION['tgl1'] =$tgl1;
                        $_SESSION['tgl2'] =$tgl2;
                }
                $data['data']=$this->db->query("SELECT a.*,CONCAT(nama_ruang,' - ',lantai,' - ',nama_gedung) tempat
                                                FROM tb_rapat a
                                                left join ms_ruang b on a.kode_ruang=b.kode_ruang
                                                left join ms_gedung c on b.kode_gedung=c.kode_gedung
                                                WHERE tgl_awal BETWEEN '$tgl1' AND '$tgl2'
                                                AND id_p='$pj'
                                                order by tgl_awal asc
                                                ")->result_array();
                $this->load->view('rekapRapat',$data);                
        }

        function test(){
                //echo base64_decode("YWRtaW4=");
                $a='1';
                if(is_int($a)){
                        echo "angka";
                }else{
                        echo "bukan angka";
                }
        }
}