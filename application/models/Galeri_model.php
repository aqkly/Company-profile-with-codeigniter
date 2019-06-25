<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing Galeri
	public function listing()
	{
		$this->db->select(	'galeri.*,
							user.nama');
		$this->db->from('galeri');
		//join
		$this->db->join('user','user.id_user = galeri.id_user','LEFT');
		//End join
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Slider Galeri
	public function slider()
	{
		$this->db->select(	'galeri.*,
							user.nama');
		$this->db->from('galeri');
		//join
		$this->db->join('user','user.id_user = galeri.id_user','LEFT');
		//End join
		//where
		$this->db->where('posisi_galeri','Homepage');
		//End Where
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Galeri
	public function detail($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri',$id_galeri);
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}

	//Login Galeri
	public function login($galeriname, $password)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where(array('galeriname'	=> $galeriname,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah Galeri
	public function tambah($data)
	{
		$this->db->insert('galeri', $data);
	}

	//Edit Galeri
	public function edit($data)
	{
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
	}

	//Delete Galeri

	public function delete($data)
	{
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->delete('galeri',$data);
	}
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */