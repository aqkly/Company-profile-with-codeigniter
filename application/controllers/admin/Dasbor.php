<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('galeri_model');
		$this->load->model('layanan_model');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$berita 	= $this->berita_model->listing();
		$galeri 	= $this->galeri_model->listing();
		$user 		= $this->user_model->listing();
		$layanan 	= $this->layanan_model->listing();

		$data = array(	'title'		=> 'Halaman Dasbor Administrator',
						'berita'	=> $berita,
						'galeri'	=> $galeri,
						'user'		=> $user,
						'layanan'	=> $layanan,
						'isi'		=> 'admin/dasbor/list'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */