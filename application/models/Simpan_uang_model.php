<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan_uang_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('simpan_uang');

		$this->db->join('anggota','anggota.id_anggota = simpan_uang.anggota_id');

		$this->db->order_by('id_simpan');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id_simpan){
		$this->db->select('*');
		$this->db->from('simpan_uang');

		$this->db->join('anggota','anggota.id_anggota = simpan_uang.anggota_id');

		$this->db->where('id_simpan',$id_simpan);
		$this->db->order_by('id_simpan');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('simpan_uang', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_simpan',$data['id_simpan']);
		$this->db->update('simpan_uang', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_simpan',$data['id_simpan']);
		$this->db->delete('simpan_uang', $data);

	}

	// Page Tambah anggota
	public function pageTambahEditBarang(){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->order_by('id_anggota');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */