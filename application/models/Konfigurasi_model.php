<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	Public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	//Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']); 
		$this->db->update('konfigurasi', $data);
	}

	//Menu
	public function menu_berita()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//Join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End Join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		// $this->db->group_by('berita.id_kategori');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Menu Layanan
	public function menu_layanan()
	{
		$this->db->select('layanan.*,
							user.nama');
		$this->db->from('layanan');
		//JOIN
		$this->db->join('user','user.id_user = layanan.id_user','LEFT');
		//END JOIN
		$this->db->where('layanan.status_layanan','Publish');
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Menu Profil
	public function menu_profil()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//Join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End Join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Profil'));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}


}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */