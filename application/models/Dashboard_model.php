<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

		public function anggota(){   
    	$query = $this->db->get('anggota');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function petugas(){   
    	$query = $this->db->get('petugas');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function barang(){   
    	$query = $this->db->get('barang');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function transaksi(){   
    	$query = $this->db->get('transaksi');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function daftar_kebutuhan(){   
    	$query = $this->db->get('daftar_kebutuhan');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function simpan_uang(){   
    	$query = $this->db->get('simpan_uang');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function pinjam_uang(){   
    	$query = $this->db->get('pinjam_uang');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}

      	public function belanja(){   
    	$query = $this->db->get('belanja');
    		if($query->num_rows()>0){
		      return $query->num_rows();
    		}
    		else{
      			return 0;
      		}
      	}
}

    



/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */