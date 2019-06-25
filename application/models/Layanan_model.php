<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing Layanan
	public function listing()
	{
		$this->db->select(	'layanan.*,
							user.nama');
		$this->db->from('layanan');
		//join
		$this->db->join('user','user.id_user = layanan.id_user','LEFT');
		//End join
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//home Layanan
	public function home()
	{
		$this->db->select(	'layanan.*,
							user.nama');
		$this->db->from('layanan');
		//join
		$this->db->join('user','user.id_user = layanan.id_user','LEFT');
		//End join
		//where
		$this->db->where('layanan.status_layanan','Publish');
		//End where
		$this->db->order_by('id_layanan','DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	// Layanan
	public function layanan($limit,$start)
	{
		$this->db->select(	'layanan.*,
							user.nama');
		$this->db->from('layanan');
		//join
		$this->db->join('user','user.id_user = layanan.id_user','LEFT');
		//End join
		//where
		$this->db->where('layanan.status_layanan','Publish');
		//End where
		$this->db->order_by('id_layanan','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Total Layanan
	public function total()
	{
		$this->db->select(	'layanan.*,
							user.nama');
		$this->db->from('layanan');
		//join
		$this->db->join('user','user.id_user = layanan.id_user','LEFT');
		//End join
		//where
		$this->db->where('layanan.status_layanan','Publish');
		//End where
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Read Layanan
	public function read($slug_layanan)
	{
		$this->db->select(	'layanan.*,
							user.nama');
		$this->db->from('layanan');
		//join
		$this->db->join('user','user.id_user = layanan.id_user','LEFT');
		//End join
		//where
		$this->db->where(array(	'layanan.status_layanan' 	=>	'Publish',
								'layanan.slug_layanan'		=>	$slug_layanan));
		//End where
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Detail Layanan
	public function detail($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->where('id_layanan',$id_layanan);
		$this->db->order_by('id_layanan');
		$query = $this->db->get();
		return $query->row();
	}

	//Login Layanan
	public function login($layananname, $password)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->where(array('layananname'	=> $layananname,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_layanan');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah Layanan
	public function tambah($data)
	{
		$this->db->insert('layanan', $data);
	}

	//Edit Layanan
	public function edit($data)
	{
		$this->db->where('id_layanan',$data['id_layanan']);
		$this->db->update('layanan',$data);
	}

	//Delete Layanan

	public function delete($data)
	{
		$this->db->where('id_layanan',$data['id_layanan']);
		$this->db->delete('layanan',$data);
	}
}

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */