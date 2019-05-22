<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->order_by('id_anggota');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id_anggota){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('id_anggota',$id_anggota);
		$this->db->order_by('id_anggota');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('anggota', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_anggota',$data['id_anggota']);
		$this->db->update('anggota', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_anggota',$data['id_anggota']);
		$this->db->delete('anggota', $data);

	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */