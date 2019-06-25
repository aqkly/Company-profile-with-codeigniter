<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//Load Login Page
	public function index()
	{

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required|trim|min_length[6]|max_length[32]',
				array('required'	=>	'%s harus diisi',
					  'min_length'	=>	'%s minimal 6 karakter',
					  'max_length'	=>	'%s maximal 32 karakter'));

		$valid->set_rules('password','Password','required|trim|min_length[6]',
				array('required'	=>	'%s harus diisi',
					  'min_length'	=>	'%s minimal 6 karakter'));
		if($valid->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//Compare Dengan database
			$check_login = $this->user_model->login($username, $password);
			//Kalau ada data yang cocok maka create session
			if(count($check_login) == 1) {
				$this->session->set_userdata('id_user',$check_login->id_user);
				$this->session->set_userdata('username',$check_login->username);
				$this->session->set_userdata('nama',$check_login->nama);
				$this->session->set_userdata('akses_level',$check_login->akses_level);
				$this->session->set_flashdata('sukses', 'Anda Berhasil Login');
				redirect(base_url('admin/dasbor'),'refresh');
			} else{
				//Kalo ga cocok maka error dan redirect ke login lagi
				$this->session->set_flashdata('sukses', 'Username atau Password salah');
				redirect(base_url('login'),'refresh');
			}
		}

		//End Validasi
		$data = array(	'title'	=>	'Login Administrator',
			);
		$this->load->view('admin/login/list', $data, FALSE);
	}

	//Logout
	public function logout()
	{
		$this->check_login->logout();	
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */