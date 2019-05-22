<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan_uang extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('simpan_uang_model');
	}

	// Listing data simpan_uang
	public function index()
	{
		$simpan_uang = $this->simpan_uang_model->listing();

		$data = array(	'title'	 => 'Data Investasi ('.count($simpan_uang).')',
						'simpan_uang'	 => $simpan_uang,

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "",
						'menudatamasterInput' => "",
						'menudatamasterHistori' => "active",
						'menudatamasterData' => "",

						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "active",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

						'isi'	 => 'simpan_uang/list'
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('simpan_uang/list');
	}

	//Tambah
	public function tambah(){

		$anggota = $this->simpan_uang_model->pageTambahEditBarang();

		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules('anggota_id','Anggota','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('tanggal','Tanggal','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'jumlah','Jumlah','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Tambah Investasi',
						'isi'	 => 'simpan_uang/tambah',
						'anggota'	 => $anggota,

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "active",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "",
						'menudatamasterInput' => "active",
						'menudatamasterHistori' => "",
						'menudatamasterData' => "",

						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('simpan_uang/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_simpan' 			=> $i->post('id_simpan'),
							'anggota_id'			=> $i->post('anggota_id'),
							'tanggal'		=> $i->post('tanggal'),
							'jumlah'	=> $i->post('jumlah')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->simpan_uang_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('simpan_uang/tambah'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_simpan){

		$simpan_uang = $this->simpan_uang_model->detail($id_simpan);
		$anggota = $this->simpan_uang_model->pageTambahEditBarang();

		//Validasi
		$valid = $this->form_validation;
		
		$valid->set_rules('anggota_id','Anggota','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules(	'tanggal','Tanggal','required',
					array(	'required'		=>	'%s harus diisi') );

		$valid->set_rules(	'jumlah','Jumlah','required',
					array(	'required'		=>	'%s harus diisi') );

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Investasi : '.$simpan_uang->id_simpan,
						'simpan_uang'	 => $simpan_uang,
						'anggota'	 => $anggota,
						'isi'	 => 'simpan_uang/edit',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "",
						'menuPetugas' => "",
						'menudatamasterInput' => "",
						'menudatamasterHistori' => "active",
						'menudatamasterData' => "",

						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "active",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",


	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('simpan_uang/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_simpan'		=> $id_simpan,
							// 'id_simpan' 			=> $i->post('id_simpan'),
							'anggota_id'			=> $i->post('anggota_id'),
							'tanggal'		=> $i->post('tanggal'),
							'jumlah'	=> $i->post('jumlah')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->simpan_uang_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('simpan_uang'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_simpan){
		$simpan_uang = $this->simpan_uang_model->detail($id_simpan);
		$data = array('id_simpan' => $simpan_uang->id_simpan);

		$this->simpan_uang_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('simpan_uang'), 'refresh');
	}
}

/* End of file Simpan_Uang.php */
/* Location: ./application/controllers/Simpan_Uang.php */