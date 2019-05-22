<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_uang extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pinjam_uang_model');
	}

	// Listing data pinjam_uang
	public function index()
	{
		$pinjam_uang = $this->Pinjam_uang_model->listing();

		$data = array(	'title'	 => 'Data Pinjam ('.count($pinjam_uang).')',
						'pinjam_uang'	 => $pinjam_uang, 

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
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "active",
						'menuRiwayatBelanja' => "",

						'isi'	 => 'pinjam_uang/list'
	 			);
		
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('pinjam_uang/list');
	}

	//Tambah
	public function tambah(){

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('anggota_id','Nama Anggota','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('tanggal','Tanggal','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'jumlah','Jumlah','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi

		$anggota = $this->Pinjam_uang_model->pageTambahEditBarang();


		$data = array('title'	 => 'Tambah Pinjam',
						'isi'	 => 'pinjam_uang/tambah',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "active",
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

						'anggota' => $anggota

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('pinjam_uang/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'anggota_id' 			=> $i->post('anggota_id'),
							'tanggal'		=> $i->post('tanggal'),
							'jumlah'			=> $i->post('jumlah')
			);

			$this->Pinjam_uang_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('pinjam_uang/tambah'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_pinjam){

		$pinjam_uang = $this->Pinjam_uang_model->detail($id_pinjam);
		$anggota = $this->Pinjam_uang_model->pageTambahEditBarang();

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('anggota_id','Nama Anggota','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('tanggal','Tanggal','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'jumlah','Jumlah','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Pinjam : '.$pinjam_uang->anggota_id,
						'pinjam_uang'	 => $pinjam_uang,
						'anggota'	 => $anggota,
						'isi'	 => 'pinjam_uang/edit',

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
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "active",
						'menuRiwayatBelanja' => "",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('pinjam_uang/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_pinjam'		=> $id_pinjam,
							'anggota_id' 	=> $i->post('anggota_id'),
							'tanggal'		=> $i->post('tanggal'),
							'jumlah'			=> $i->post('jumlah')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->Pinjam_uang_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('pinjam_uang'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_pinjam){
		$pinjam_uang = $this->Pinjam_uang_model->detail($id_pinjam);
		$data = array('id_pinjam' => $pinjam_uang->id_pinjam);

		$this->Pinjam_uang_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pinjam_uang'), 'refresh');
	}
}

/* End of file Pinjam.php */
/* Location: ./application/controllers/Pinjam.php */