<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing Kategori
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Kategori
	public function detail($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id_kategori);
		$this->db->order_by('id_kategori');
		$query = $this->db->get();
		return $query->row();
	}

	//read Kategori
	public function read($slug_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('slug_kategori',$slug_kategori);
		$this->db->order_by('id_kategori');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah Kategori
	public function tambah($data)
	{
		$this->db->insert('kategori', $data);
	}

	//Edit Kategori
	public function edit($data)
	{
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->update('kategori',$data);
	}

	//Delete Kategori

	public function delete($data)
	{
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->delete('kategori',$data);
	}
}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */