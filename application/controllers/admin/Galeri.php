<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
	}

	//Listing data galeri
	public function index()
	{
		$galeri = $this->galeri_model->listing();

		$data = array(	'title'		=>	'Data Galeri ('.count($galeri).')',
						'galeri'	=>	$galeri,
						'isi'		=>	'admin/galeri/list'
				);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah()
	{

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul Galeri','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('isi_galeri','Isi Galeri','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			$config['upload_path']          = './assets/upload/image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'			=>	'Tambah data galeri',
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/galeri/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;
			$data = array(	'id_user'		=>	$this->session->userdata('id_user'),
							'judul_galeri'	=>	$i->post('judul_galeri'),
							'isi_galeri'	=>	$i->post('isi_galeri'),
							'website'		=>	$i->post('website'),
							'gambar'		=>	$upload_data['uploads']['file_name'],
							'posisi_galeri' =>	$i->post('posisi_galeri'),
							'tanggal_post'	=>	date('Y-m-d H:i:s')
						);
			$this->galeri_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('admin/galeri'),'refresh');
		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Tambah data galeri',
						'isi'			=>	'admin/galeri/tambah'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit
	public function edit($id_galeri)
	{
		$galeri = $this->galeri_model->detail($id_galeri);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('judul_galeri','Judul Galeri','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('isi_galeri','Isi Galeri','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			//Kalo ga ganti gambar
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']          = './assets/upload/image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'			=>	'Edit data galeri '.$galeri->judul_galeri,
						'galeri'		=>	$galeri,
						'error_upload'	=>	 $this->upload->display_errors(),
						'isi'			=>	'admin/galeri/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;

			//Hapus gambar lama jika ada upload gambar baru
			if($galeri->gambar != "")
			{
				unlink('./assets/upload/image/'.$galeri->gambar);
				unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
			}
			//End Hapus gambar

			$data = array(	'id_galeri'		=>	$id_galeri,
							'id_user'		=>	$this->session->userdata('id_user'),
							'judul_galeri'	=>	$i->post('judul_galeri'),
							'isi_galeri'	=>	$i->post('isi_galeri'),
							'website'		=>	$i->post('website'),
							'gambar'		=>	$upload_data['uploads']['file_name'],
							'posisi_galeri' =>	$i->post('posisi_galeri')		
						);
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/galeri'),'refresh');
		}}else {
			//Update galeri tanpa gambar
			$i = $this->input;
			$data = array(	'id_galeri'		=>	$id_galeri,
							'id_user'		=>	$this->session->userdata('id_user'),
							'judul_galeri'	=>	$i->post('judul_galeri'),
							'isi_galeri'	=>	$i->post('isi_galeri'),
							'website'		=>	$i->post('website'),
							//'gambar'		=>	$upload_data['uploads']['file_name'],
							'posisi_galeri' =>	$i->post('posisi_galeri')			
						);
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('admin/galeri'),'refresh');

		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Edit data galeri '.$galeri->judul_galeri,
						'galeri'		=>	$galeri,
						'isi'			=>	'admin/galeri/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Delete
	public function delete($id_galeri)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$galeri = $this->galeri_model->detail($id_galeri);

		//Hapus Gambar
		if($galeri->gambar != "") {
			unlink('./assets/upload/image/'.$galeri->gambar);
			unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
		}
		//End Hapus Gambar

		$data = array(	'id_galeri'	=>	$galeri->id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah dihapus');
		redirect(base_url('admin/galeri'),'refresh');
	}

}

/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */