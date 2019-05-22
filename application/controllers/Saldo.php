<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('saldo_model');
	}

	// Listing data saldo
	public function index()
	{
		$saldo = $this->saldo_model->listing();

		$data = array(	'title'	 => 'Data saldo ('.count($saldo).')',
						'saldo'	 => $saldo,

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "active",
						'menuPetugas' => "",
						'menudatamasterInput' => "active",
						'menudatamasterHistori' => "",
						'menudatamasterData' => "",

						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",


						'isi'	 => 'saldo/list'
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('saldo/list');
	}

	//Tambah
	public function tambah(){

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('id','No','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('simpan_id','Simpan','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('pinjam_id','Pinjam','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'saldo_akhir','Saldo Akhir','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Tambah Saldo',
						'isi'	 => 'saldo/tambah',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "active",
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
		$this->load->view('saldo/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id' 			=> $i->post('id'),
							'simpan_id'			=> $i->post('simpan_id'),
							'pinjam_id'		=> $i->post('pinjam_id'),
							'saldo_akhir'	=> $i->post('saldo_akhir')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->saldo_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('saldo'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id){

		$saldo = $this->saldo_model->detail($id);

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('id','No','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('simpan_id','Simpan','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules(	'pinjam_id','Pinjam','required',
					array(	'required'		=>	'%s harus diisi') );

		$valid->set_rules(	'saldo_akhir','Saldo Akhir','required',
					array(	'required'		=>	'%s harus diisi') );

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Saldo : '.$saldo->id,
						'saldo'	 => $saldo,
						'isi'	 => 'saldo/edit',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "",
						'menuSaldo' => "active",
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
		$this->load->view('saldo/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id'		=> $id,
							'simpan_id' 			=> $i->post('simpan_id'),
							'pinjam_id'			=> $i->post('pinjam_id'),
							'sisa_saldo'		=> $i->post('sisa_saldo'),
							// 'sisa_saldo'	=> $i->post('sisa_saldo')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->saldo_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('saldo'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id){
		$saldo = $this->saldo_model->detail($id);
		$data = array('id' => $saldo->id);

		$this->saldo_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('saldo'), 'refresh');
	}
}

/* End of file Saldo.php */
/* Location: ./application/controllers/Saldo.php */