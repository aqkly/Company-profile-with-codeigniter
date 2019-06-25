<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing Berita
	public function listing()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Home Berita
	public function home()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita' => 'Publish',
								'jenis_berita'	=> 'Berita'));
		//End where
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(9);
		$query = $this->db->get();
		return $query->result();
	}

	//Berita MainPage
	public function berita($limit, $start)
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita' => 'Publish'));
		//End where
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}


	//Berita Total
	public function total()
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita' => 'Publish'));
		//End where
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Lsiting Kategori Berita MainPage
	public function berita_kategori($id_kategori, $limit, $start)
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita'		 => 'Publish',
								'berita.id_kategori' => $id_kategori));
		//End where
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}


	//Berita Total Kategori
	public function total_kategori($id_kategori)
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita'		 => 'Publish',
								'berita.id_kategori' => $id_kategori));
		//End where
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Berita read
	public function read($slug_berita)
	{
		$this->db->select(	'berita.*,
							kategori.nama_kategori,
							kategori.slug_kategori,
							user.nama');
		$this->db->from('berita');
		//join
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = berita.id_user','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita'		 => 'Publish',
								'berita.slug_berita' => $slug_berita));
		//End where
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}


	//Detail Berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}

	//Login Berita
	public function login($beritaname, $password)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array('beritaname'	=> $beritaname,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah Berita
	public function tambah($data)
	{
		$this->db->insert('berita', $data);
	}

	//Edit Berita
	public function edit($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	//Delete Berita

	public function delete($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */