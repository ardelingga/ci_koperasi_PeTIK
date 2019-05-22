<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('saldo');

		$this->db->join('simpan_uang','simpan_uang.id_simpan = saldo.simpan_id');
		$this->db->join('pinjam_uang','pinjam_uang.id_pinjam = saldo.pinjam_id');

		$this->db->order_by('id');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id){
		$this->db->select('*');
		$this->db->from('saldo');
		$this->db->where('id',$id);

		// $this->db->join('anggota','anggota.id_anggota = simpan_uang.anggota_id');
		// $this->db->join('anggota','anggota.id_anggota = simpan_uang.anggota_id');

		$this->db->order_by('id');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('saldo', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id',$data['id']);
		$this->db->update('saldo', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id',$data['id']);
		$this->db->delete('saldo', $data);

	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */