<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
	}

	//MainPage Berita
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//Listing Berita dengan Pagination
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('berita/index/');
		$config['total_rows'] 	= count($this->berita_model->total());
		$config['per_page'] 	= 12;
		$config['uri_segment']	= 3;
		//Limit dan Start
		$limit					= $config['per_page'];
		$start					= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//End Limit dan Start
		$this->pagination->initialize($config);

		$berita 				= $this->berita_model->berita($limit,$start); 
		//End Pagination

		$data = array(	'title'		=>	'Berita - '.$konfigurasi->namaweb,
						'deskripsi'	=>	'Berita - '.$konfigurasi->deskripsi,
						'keywords'	=>	'Berita - '.$konfigurasi->keywords,
						'paginasi'	=> $this->pagination->create_links(),
						'berita'	=> $berita,
						'limit'		=> $limit,
						'total'		=> $config['total_rows'],
						'isi'		=>	'berita/list'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//Kategori Berita
	public function kategori($slug_kategori)
	{
		$kategori 	 = $this->kategori_model->read($slug_kategori);	
		$id_kategori = $kategori->id_kategori;
		$konfigurasi = $this->konfigurasi_model->listing();
		//Listing Berita dengan Pagination
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('berita/kategori/'.$slug_kategori.'/index/');
		$config['total_rows'] 	= count($this->berita_model->total_kategori($id_kategori));
		$config['per_page'] 	= 12;
		$config['uri_segment']	= 5;
		//Limit dan Start
		$limit					= $config['per_page'];
		$start					= ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
		//End Limit dan Start
		$this->pagination->initialize($config);

		$berita 				= $this->berita_model->berita_kategori($id_kategori,$limit,$start); 
		//End Pagination

		$data = array(	'title'		=>	'Kategori Berita - '.$kategori->nama_kategori,
						'deskripsi'	=>	'Kategori Berita - '.$kategori->nama_kategori,
						'keywords'	=>	'Kategori Berita - '.$kategori->nama_kategori,
						'paginasi'	=> $this->pagination->create_links(),
						'berita'	=> $berita,
						'limit'		=> $limit,
						'total'		=> $config['total_rows'],
						'isi'		=>	'berita/list'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	//Detail Berita
	public function read($slug_berita)
	{
		$berita = $this->berita_model->read($slug_berita);
		$listing = $this->berita_model->home();

		$data = array(	'title'		=>	$berita->judul_berita,
						'deskripsi'	=>	$berita->judul_berita,
						'keywords'	=>	$berita->judul_berita,
						'berita'	=>	$berita,
						'listing'	=>	$listing,
						'isi'		=>	'berita/read'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */