<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
	}

	// Listing data transaksi
	public function index()
	{
		$transaksi = $this->transaksi_model->listing();

		$data = array(	'title'	 => 'Data Transaksi ('.count($transaksi).')',
						'transaksi'	 => $transaksi, 
						'isi'	 => 'daftar_kebutuhan/list',

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

						'menuRiwayatTransaksi' => "active",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('transaksi/list');
	}

	//Tambah
	public function tambah(){
		
		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('anggota_id','Nama Anggota','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('barang_id','Nama Barang','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('jumlah','Jumlah','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'harga_satuan','Harga Satuan','required',
					array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules(	'total_harga','Total harga','required',
					array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules(	'petugas_id','Petugas','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi


		$anggota = $this->transaksi_model->pageTambahEditAnggota();
		$barang1 = $this->transaksi_model->pageTambahEditBarang();
		$petugas = $this->transaksi_model->pageTambahEditPetugas();
		$barang2 = json_encode($this->transaksi_model->pageTambahEditBarang());
		// var_dump($transaksi[0]->anggota_id);
		// exit();
		$data = array('title'	 => 'Tambah Transaksi',
						'anggota'	 => $anggota,
						'barang1'	 => $barang1,
						'barang2'	 => $barang2,
						'petugas'	 => $petugas,
						'isi'	 => 'transaksi/tambah',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "active",
						'menuInvestasi' => "",
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
		$this->load->view('transaksi/tambah');
		// Masuk database

		// var_dump($barang);
		// exit();
		}
		else{
			$i = $this->input;

			$data = array(	'anggota_id' 			=> $i->post('anggota_id'),
							'barang_id'		=> $i->post('barang_id'),
							'jumlah'		=> $i->post('jumlah'),
							'harga_satuan'	=> $i->post('harga_satuan'),
							'total_harga'	=> $i->post('total_harga'),
							'petugas_id'	=> $i->post('petugas_id'),
							// 'password'		=> sha1($i->post('password')),
			);

			$this->transaksi_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('transaksi/tambah'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_transaksi){

		$transaksi = $this->transaksi_model->detail($id_transaksi);
		$anggota = $this->transaksi_model->pageTambahEditAnggota($id_transaksi);
		$barang = $this->transaksi_model->pageTambahEditBarang($id_transaksi);
		$petugas = $this->transaksi_model->pageTambahEditPetugas($id_transaksi);

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('anggota_id','Anggota','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('barang_id','Nama Barang','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('jumlah','Jumlah','required',
				array(	'required' 		=>	'%s harus diisi'));

		$valid->set_rules(	'harga_satuan','Harga Satuan','required',
					array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules(	'total_harga','Total harga','required',
					array(	'required'		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Transaksi : '.$transaksi->nama_anggota,
						'transaksi'	 => $transaksi,
						
						'anggota'	 => $anggota,
						'petugas'	 => $petugas,
						'barang'	 => $barang,

						'isi'	 => 'transaksi/edit',

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

						'menuRiwayatTransaksi' => "active",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('transaksi/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			
			$data = array(	'id_transaksi'		=> $id_transaksi,
							'anggota_id' 			=> $i->post('anggota_id'),
							'barang_id'		=> $i->post('barang_id'),
							'jumlah'		=> $i->post('jumlah'),
							'harga_satuan'	=> $i->post('harga_satuan'),
							'total_harga'	=> $i->post('total_harga'),
							'petugas_id'	=> $i->post('petugas_id'),
							// 'password'		=> sha1($i->post('password')),
			);

			$this->transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('transaksi'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_transaksi){
		$transaksi = $this->transaksi_model->detail($id_transaksi);
		$data = array('id_transaksi' => $transaksi->id_transaksi);

		$this->transaksi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('transaksi'), 'refresh');
	}
}

/* End of file Daftar_kebutuhan.php */
/* Location: ./application/controllers/Daftar_kebutuhan.php */