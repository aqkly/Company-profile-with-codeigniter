<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	//Check Login
	public function check()
	{
		if($this->CI->session->userdata('username') == "" && $this->CI->session->userdata('akses_level') == "")
		{
			$this->CI->session->set_flashdata('sukses', 'Anda Belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	//Logout
	public function logout()
	{
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Check_login.php */
/* Location: ./application/libraries/Check_login.php */
