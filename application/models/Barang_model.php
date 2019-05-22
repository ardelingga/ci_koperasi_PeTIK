<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by('id_barang');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id_barang){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('id_barang',$id_barang);
		$this->db->order_by('id_barang');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('barang', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_barang',$data['id_barang']);
		$this->db->update('barang', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_barang',$data['id_barang']);
		$this->db->delete('barang', $data);

	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */