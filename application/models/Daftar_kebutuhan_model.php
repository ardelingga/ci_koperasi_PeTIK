<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kebutuhan_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('daftar_kebutuhan');
 		$this->db->join('anggota','anggota.id_anggota = daftar_kebutuhan.anggota_id');
 		$this->db->join('barang','barang.id_barang = daftar_kebutuhan.barang_id');
		$this->db->order_by('id_daftar_kebutuhan');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Detail User
	public function detail($id_daftar_kebutuhan){
		$this->db->select('*');
		$this->db->from('daftar_kebutuhan');
		$this->db->where('id_daftar_kebutuhan',$id_daftar_kebutuhan);

		$this->db->join('anggota','anggota.id_anggota = daftar_kebutuhan.anggota_id');
 		$this->db->join('barang','barang.id_barang = daftar_kebutuhan.barang_id');
		
		$this->db->order_by('id_daftar_kebutuhan');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		//$this->db->where('id_daftar_kebutuhan',$data['id_daftar_kebutuhan']);
		$this->db->insert('daftar_kebutuhan', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_daftar_kebutuhan',$data['id_daftar_kebutuhan']);
		$this->db->update('daftar_kebutuhan', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_daftar_kebutuhan',$data['id_daftar_kebutuhan']);
		$this->db->delete('daftar_kebutuhan', $data);

	}


	// Page Tambah Anggota
	public function pageTambahEditAnggota(){
		$this->db->select('*');
		$this->db->from('anggota');
		
		//$this->db->join('daftar_kebutuhan','daftar_kebutuhan.barang_id = anggota.id_anggota');

		$this->db->order_by('id_anggota');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
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