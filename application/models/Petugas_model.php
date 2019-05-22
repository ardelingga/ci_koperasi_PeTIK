<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->order_by('id_petugas');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id_petugas){
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where('id_petugas',$id_petugas);
		$this->db->order_by('id_petugas');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('petugas', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_petugas',$data['id_petugas']);
		$this->db->update('petugas', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_petugas',$data['id_petugas']);
		$this->db->delete('petugas', $data);

	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */