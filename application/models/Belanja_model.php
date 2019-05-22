<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('belanja');
		$this->db->order_by('id_belanja');
		$this->db->join('barang','barang.id_barang = belanja.barang_id');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}
	
	// Detail User
	public function detail($id_belanja){
		$this->db->select('*');
		$this->db->from('belanja');
		$this->db->where('id_belanja',$id_belanja);

		$this->db->join('barang','barang.id_barang = belanja.barang_id');

		$this->db->order_by('id_belanja');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		$this->db->insert('belanja', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_belanja',$data['id_belanja']);
		$this->db->update('belanja', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_belanja',$data['id_belanja']);
		$this->db->delete('belanja', $data);

	}


	// Page Tambah barang
	public function pageTambahEditBarang(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by('id_barang');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */