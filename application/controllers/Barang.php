<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
	}

	// Listing data barang
	public function index()
	{
		$barang = $this->barang_model->listing();

		$data = array(	'title'	 => 'Data Produk ('.count($barang).')',
						'barang'	 => $barang, 

						'menuDasbor' => "",
						'menuBarang' => "active",
						'menuAnggota' => "",		
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


						'isi'	 => 'barang/list'
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('barang/list');
	}

	//Tambah
	public function tambah(){

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_barang','Nama Produk','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('harga_barang','Harga Produk','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('harga_jual','Harga Jual','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules('stok_barang','Stok Produk','required',
				array(	'required' 		=>	'%s harus diisi'));

		if ($valid->run() === FALSE) {
			// End Validasi

		$data = array('title'	 => 'Tambah Produk',
						'isi'	 => 'barang/tambah',

						'menuDasbor' => "",
						'menuBarang' => "active",
						'menuAnggota' => "",		
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
		$this->load->view('barang/tambah');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'nama_barang' 			=> $i->post('nama_barang'),
							'harga_barang'			=> $i->post('harga_barang'),
							'harga_jual'			=> $i->post('harga_jual'),
							'stok_barang'		=> $i->post('stok_barang')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->barang_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('barang'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_barang){

		$barang = $this->barang_model->detail($id_barang);

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_barang','Nama Produk','required',
				array('required' =>	'%s harus diisi') );

		$valid->set_rules('harga_barang','Harga Produk','required',
				array(	'required' 		=>	'%s harus diisi') );

		$valid->set_rules(	'harga_jual','Harga Jual','required',
					array(	'required'		=>	'%s harus diisi') );
		
		$valid->set_rules(	'stok_barang','Stok Produk','required',
					array(	'required'		=>	'%s harus diisi') );

		if ($valid->run() === FALSE) {
			// End Validasi



		$data = array('title'	 => 'Edit Produk : '.$barang->nama_barang,
						'barang'	 => $barang,
						'isi'	 => 'barang/edit',

						'menuDasbor' => "",
						'menuBarang' => "active",
						'menuAnggota' => "",		
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
		$this->load->view('barang/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			$data = array(	'id_barang'		=> $id_barang,
							'nama_barang' 			=> $i->post('nama_barang'),
							'harga_barang'			=> $i->post('harga_barang'),
							'harga_jual'			=> $i->post('harga_jual'),
							'stok_barang'		=> $i->post('stok_barang'),
							// 'password'		=> sha1($i->post('password')),
			);

			$this->barang_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('barang'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_barang){
		$barang = $this->barang_model->detail($id_barang);
		$data = array('id_barang' => $barang->id_barang);

		$this->barang_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('barang'), 'refresh');
	}
}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */