<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_uang_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('pinjam_uang');
		$this->db->order_by('id_pinjam');
		$this->db->join('anggota','anggota.id_anggota = pinjam_uang.anggota_id');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id_pinjam){
		$this->db->select('*');
		$this->db->from('pinjam_uang');
		$this->db->where('id_pinjam',$id_pinjam);

		$this->db->join('anggota','anggota.id_anggota = pinjam_uang.anggota_id');

		$this->db->order_by('id_pinjam');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('pinjam_uang', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_pinjam',$data['id_pinjam']);
		$this->db->update('pinjam_uang', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_pinjam',$data['id_pinjam']);
		$this->db->delete('pinjam_uang', $data);

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