<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	//Laod Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	//Main Page Kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();

		//validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]',
				array(	'required'	=>	'%s Harus Diisi',
						'is_unique'	=>	'<strong>'.$this->input->post('nama_kategori'). '</strong> Sudah ada. Silahkan Buat baru !'));

		if($this->form_validation->run() === FALSE) {
		//End Validasi

		$data = array(	'title'		=>	'Data Kategori berita ('.count($kategori).')',
						'kategori'	=>	$kategori,
						'isi'		=>	'admin/kategori/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk Database
		}else {
			$i = $this->input;

			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array(	'slug_kategori'	=>	$slug_kategori,
							'nama_kategori'	=>	$i->post('nama_kategori'),
							'urutan'		=>	$i->post('urutan')
					);
			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah ditambah');
			redirect(base_url('admin/kategori'),'refresh');
		}
		//End masuk database
	}

	//Edit Kategori
	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);

		//validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',
				array(	'required'	=>	'%s Harus Diisi',));

		if($this->form_validation->run() === FALSE) {
		//End Validasi

		$data = array(	'title'		=>	'Edit Kategori berita: '.$kategori->nama_kategori.'',
						'kategori'	=>	$kategori,
						'isi'		=>	'admin/kategori/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk Database
		}else {
			$i = $this->input;

			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array(	'id_kategori'	=>	$id_kategori,
							'slug_kategori'	=>	$slug_kategori,
							'nama_kategori'	=>	$i->post('nama_kategori'),
							'urutan'		=>	$i->post('urutan')
					);
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah diUpdate');
			redirect(base_url('admin/kategori'),'refresh');
		}
		//End masuk database
	}


	//Delete
	public function delete($id_kategori)
	{
		//Proteksi Delete
		$this->check_login->check();

		$kategori = $this->kategori_model->detail($id_kategori);
		$data = array(	'id_kategori'	=>	$kategori->id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */