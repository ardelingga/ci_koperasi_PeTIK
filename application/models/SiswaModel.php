<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model {

  // Fungsi untuk menampilkan semua data siswa
  public function retrieve_all(){
    return $this->db->get('mahasiswa')->result();
  }
  
  // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
  public function retrieve_nim($nim){
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->where('nim', $nim);
    
    //return $this->db->get();
    $q = $this->db->get();
    if($q->num_rows() > 0)
    {
      foreach ($q->result() as $row)
      {
        $data[] = $row;
      }
      return $data;
    }
  }
  

  // Fungsi untuk melakukan simpan data ke tabel siswa
  public function save($data){	
    // Untuk mengeksekusi perintah insert data
    $this->db->insert('mahasiswa', $data); 
  }
  

  // Fungsi untuk melakukan ubah data siswa berdasarkan NIS siswa
  public function update($nim, $data){
    $this->db->where('nim', $nim);

	// Untuk mengeksekusi perintah update
    $this->db->update('mahasiswa', $data);
  }
  

  // Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
  public function deletes($nim){
    $this->db->where('nim', $nim);

	// Untuk mengeksekusi perintah delete data
    $this->db->delete('mahasiswa'); 
  }
}