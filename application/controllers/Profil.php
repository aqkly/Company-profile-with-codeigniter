<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	//MainPage
	public function index()
	{
		$data = array('title'	=> 'Profil Web Company Profil',
					  'isi'		=> 'profil/list'	
					);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */