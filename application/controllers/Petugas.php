<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
	}

	// Listing data petugas
	public function index()
	{
		$petugas = $this->petugas_model->listing();

		$data = array(	'title'	 => 'Data Petugas ('.count($petugas).')',
						'petugas'	 => $petugas, 

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "active",
						'menudatamasterInput' => "",
						'menudatamasterHistori' => "",

						'menudatamasterData' => "active",
						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",
						'isi'	 => 'petugas/list'
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('petugas/list');
	}

	//Tambah
	public function tambah(){

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_petugas','Nama Petugas','required',
				array('required' =>	'%s harus diisi') );

		if ($valid->run() === FALSE) {
			// End Validasi

		$data = array('title'	 => 'Tambah Petugas',
						'isi'	 => 'petugas/tambah',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "active",
						'menudatamasterInput' => "",
						'menudatamasterHistori' => "",

						'menudatamasterData' => "active",
						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('petugas/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'nama_petugas' 			=> $i->post('nama_petugas')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->petugas_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('petugas'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_petugas){

		$petugas = $this->petugas_model->detail($id_petugas);

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_petugas','Nama Petugas','required',
				array('required' =>	'%s harus diisi') );


		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Petugas : '.$petugas->nama_petugas,
						'petugas'	 => $petugas,
						'isi'	 => 'petugas/edit',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "active",
						'menudatamasterInput' => "",
						'menudatamasterHistori' => "",
						'menudatamasterData' => "active",
						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('petugas/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_petugas'		=> $id_petugas,
							'nama_petugas' 			=> $i->post('nama_petugas')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->petugas_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('petugas'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_petugas){
		$petugas = $this->petugas_model->detail($id_petugas);
		$data = array('id_petugas' => $petugas->id_petugas);

		$this->petugas_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('petugas'), 'refresh');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */