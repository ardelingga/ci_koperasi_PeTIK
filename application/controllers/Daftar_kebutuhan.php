<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kebutuhan extends CI_Controller {

	//Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('daftar_kebutuhan_model');
	}

	// Listing data daftar_kebutuhan
	public function index()
	{
		$daftar_kebutuhan = $this->daftar_kebutuhan_model->listing();

		$data = array(	'title'	 => 'Data Daftar Kebutuhan ('.count($daftar_kebutuhan).')',
						'daftar_kebutuhan'	 => $daftar_kebutuhan, 
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

						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "active",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",
	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('daftar_kebutuhan/list');
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

		if ($valid->run() === FALSE) {
			// End Validasi


		$anggota = $this->daftar_kebutuhan_model->pageTambahEditAnggota();
		$barang1 = $this->daftar_kebutuhan_model->pageTambahEditBarang();
		$barang2 = json_encode($this->daftar_kebutuhan_model->pageTambahEditBarang());
		// var_dump($daftar_kebutuhan[0]->anggota_id);
		// exit();
		$data = array('title'	 => 'Tambah Daftar Kebutuhan',
						'anggota'	 => $anggota,
						'barang1'	 => $barang1,
						'barang2'	 => $barang2,
						'isi'	 => 'daftar_kebutuhan/tambah',

						'menuDasbor' => "",
						'menuBarang' => "",
						'menuAnggota' => "",		
						'menuTransaksi' => "",
						'menuInvestasi' => "",
						'menuPinjaman' => "",
						'menuBelanja' => "",
						'menuDaftar_kebutuhan' => "active",
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
		$this->load->view('daftar_kebutuhan/tambah');
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
							'total_harga'	=> $i->post('total_harga')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->daftar_kebutuhan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Telah Ditambah');
			redirect(base_url('daftar_kebutuhan/tambah'), 'refresh');

		}
		// End Masuk Database
	}
	// end tambah


	//Edit
	public function edit($id_daftar_kebutuhan){

		$daftar_kebutuhan = $this->daftar_kebutuhan_model->detail($id_daftar_kebutuhan);
		$anggota = $this->daftar_kebutuhan_model->pageTambahEditAnggota($id_daftar_kebutuhan);
		$barang = $this->daftar_kebutuhan_model->pageTambahEditBarang($id_daftar_kebutuhan);

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



		$data = array('title'	 => 'Edit Daftar Kebutuhan : '.$daftar_kebutuhan->anggota_id,
						'daftar_kebutuhan'	 => $daftar_kebutuhan,
						
						'anggota'	 => $anggota,
						'barang'	 => $barang,

						'isi'	 => 'daftar_kebutuhan/edit',

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
						'menuRiwayatDaftarKebutuhan' => "active",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

	 			);
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('daftar_kebutuhan/edit');
		// Masuk database
		}
		else{
			$i = $this->input;
			
			$data = array(	'id_daftar_kebutuhan'		=> $id_daftar_kebutuhan,
							'anggota_id' 			=> $i->post('anggota_id'),
							'barang_id'			=> $i->post('barang_id'),
							'jumlah'		=> $i->post('jumlah'),
							'harga_satuan'	=> $i->post('harga_satuan'),
							'total_harga'	=> $i->post('total_harga')
							// 'password'		=> sha1($i->post('password')),
			);

			$this->daftar_kebutuhan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('daftar_kebutuhan'), 'refresh');

		}
		// End Masuk Database
	}
	// end Edit


	// Delete
	public function delete($id_daftar_kebutuhan){
		$daftar_kebutuhan = $this->daftar_kebutuhan_model->detail($id_daftar_kebutuhan);
		$data = array('id_daftar_kebutuhan' => $daftar_kebutuhan->id_daftar_kebutuhan);

		$this->daftar_kebutuhan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('daftar_kebutuhan'), 'refresh');
	}
}

/* End of file Daftar_kebutuhan.php */
/* Location: ./application/controllers/Daftar_kebutuhan.php */