<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('belanja_model');
	}

	// Listing data belanja
	public function index()
	{
		$belanja = $this->belanja_model->listing();

		$data = array(	'title'	 => 'Data Belanja ('.count($belanja).')',
						'belanja'	 => $belanja, 

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
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "active",

						'isi'	 => 'belanja/list'
	 			);
		
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('belanja/list');
	}

	//Tambah
	public function tambah(){

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('barang_id','Nama Barang','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('jumlah','Jumlah','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('tanggal','Tanggal','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'total_belanja','Total Belanja','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi

		$barang = $this->belanja_model->pageTambahEditBarang();
		//$barang2 = json_encode($this->daftar_kebutuhan_model->pageTambahEditBarang());


		$data = array('title'	 => 'Tambah Belanja',
						'barang' => $barang,
						//'barang2' => $barang2,
						//'belanja'	 => $belanja, 

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "active",
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
	
						'isi'	 => 'belanja/tambah',
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('belanja/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'barang_id' 			=> $i->post('barang_id'),
							'jumlah'			=> $i->post('jumlah'),
							'tanggal'		=> $i->post('tanggal'),
							'total_belanja'		=> $i->post('total_belanja')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->belanja_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('belanja/tambah'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_belanja){

		$belanja = $this->belanja_model->detail($id_belanja);
		$barang = $this->belanja_model->pageTambahEditBarang();

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('barang_id','Nama Barang','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('jumlah','Jumlah','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules(	'tanggal','Tanggal','required',
					array(	'required'		=>	'%s harus diisi') );

		$valid->set_rules(	'total_belanja','Total Belanja','required',
					array(	'required'		=>	'%s harus diisi') );

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Belanja : '.$belanja->barang_id,
						'belanja'	 => $belanja,
						'barang'	 => $barang,
						'isi'	 => 'belanja/edit',

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
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "active",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('belanja/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_belanja'		=> $id_belanja,
							'barang_id' 			=> $i->post('barang_id'),
							'jumlah'			=> $i->post('jumlah'),
							'tanggal'		=> $i->post('tanggal'),
							'total_belanja'	=> $i->post('total_belanja')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->belanja_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('belanja'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_belanja){
		$belanja = $this->belanja_model->detail($id_belanja);
		$data = array('id_belanja' => $belanja->id_belanja);

		$this->belanja_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('belanja'), 'refresh');
	}
}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */