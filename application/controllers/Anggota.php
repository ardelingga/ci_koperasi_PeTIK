<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');
	}

	// Listing data anggota
	public function index()
	{
		$anggota = $this->anggota_model->listing();

		$data = array(	'title'	 => 'Data Anggota ('.count($anggota).')',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "active",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "",
						'menudatamasterInput' => "",
						'menudatamasterHistori' => "",

						'menudatamasterData' => "active",
						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

						'anggota'	 => $anggota, 
						'isi'	 => 'anggota/list'
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('anggota/list');
	}

	//Tambah
	public function tambah(){

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_anggota','Nama Anggota','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('asal_daerah','Asal Daerah','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('kelompok_kamar','Kelompok Kamar','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'sisa_saldo','Sisa Saldo','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Tambah Anggota',
						'isi'	 => 'anggota/tambah',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "active",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "",
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
		$this->load->view('anggota/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'nama_anggota' 			=> $i->post('nama_anggota'),
							'asal_daerah'			=> $i->post('asal_daerah'),
							'kelompok_kamar'		=> $i->post('kelompok_kamar'),
							'sisa_saldo'	=> $i->post('sisa_saldo')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('anggota'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_anggota){

		$anggota = $this->anggota_model->detail($id_anggota);

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_anggota','Nama Anggota','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('asal_daerah','Asal Daerah','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules(	'kelompok_kamar','Kelompok Kamar','required',
					array(	'required'		=>	'%s harus diisi') );

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Anggota : '.$anggota->nama_anggota,
						'anggota'	 => $anggota,
						'isi'	 => 'anggota/edit',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "active",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "",
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
		$this->load->view('anggota/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_anggota'		=> $id_anggota,
							'nama_anggota' 			=> $i->post('nama_anggota'),
							'asal_daerah'			=> $i->post('asal_daerah'),
							'kelompok_kamar'		=> $i->post('kelompok_kamar'),
							'sisa_saldo'	=> $i->post('sisa_saldo')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('anggota'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_anggota){
		$anggota = $this->anggota_model->detail($id_anggota);
		$data = array('id_anggota' => $anggota->id_anggota);

		$this->anggota_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('anggota'), 'refresh');
	}
}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */