<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function sample(){
		$this->load->view('sample');
	}

	function admin(){
		$this->load->view('admin');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */