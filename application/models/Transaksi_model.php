<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing User
	public function listing(){
		$this->db->select('*');
		$this->db->from('transaksi');
 		$this->db->join('anggota','anggota.id_anggota = transaksi.anggota_id');
 		$this->db->join('barang','barang.id_barang = transaksi.barang_id');
 		$this->db->join('petugas','petugas.id_petugas = transaksi.petugas_id');
		$this->db->order_by('id_transaksi');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Detail User
	public function detail($id_transaksi){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi',$id_transaksi);

		$this->db->join('anggota','anggota.id_anggota = transaksi.anggota_id');
 		$this->db->join('barang','barang.id_barang = transaksi.barang_id');
		$this->db->join('petugas','petugas.id_petugas = transaksi.petugas_id');
		$this->db->order_by('id_transaksi');
		$query = $this->db->get();
		return $query->row();
		// row itu utk Single data
	}
	

	// Tambah / insert data
	public function tambah($data){
		//$this->db->where('id_transaksi',$data['id_transaksi']);
		$this->db->insert('transaksi', $data);
	}

	// Edit atau update user
	public function edit($data){
		$this->db->where('id_transaksi',$data['id_transaksi']);
		$this->db->update('transaksi', $data);

	}

	// Delete user
	public function delete($data){
		$this->db->where('id_transaksi',$data['id_transaksi']);
		$this->db->delete('transaksi', $data);

	}


	// Page Tambah Anggota
	public function pageTambahEditAnggota(){
		$this->db->select('*');
		$this->db->from('anggota');
		
		//$this->db->join('transaksi','transaksi.barang_id = anggota.id_anggota');

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

	// Page Tambah barang
	public function pageTambahEditPetugas(){
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->order_by('id_petugas');
		$query = $this->db->get();
		return $query->result();
		// result itu utk menampilkan semua data
	}



}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */