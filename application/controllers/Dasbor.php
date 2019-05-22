<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}
	public function index()
	{
		$anggota = $this->dashboard_model->anggota();
		$petugas = $this->dashboard_model->petugas();
		$barang = $this->dashboard_model->barang();

		$transaksi = $this->dashboard_model->transaksi();
		$daftar_kebutuhan = $this->dashboard_model->daftar_kebutuhan();
		$simpan_uang = $this->dashboard_model->simpan_uang();
		$pinjam_uang = $this->dashboard_model->pinjam_uang();
		$belanja = $this->dashboard_model->belanja();

		$data = array(	'title' => 'Halaman Dasbor Koperasi PeTIK',
						'anggota'	=>	$anggota,
						'petugas'	=>	$petugas,
						'barang'	=>	$barang,

						'transaksi'	=>	$transaksi,
						'daftar_kebutuhan'	=>	$daftar_kebutuhan,
						'simpan_uang'	=>	$simpan_uang,
						'pinjam_uang'	=>	$pinjam_uang,
						'belanja'	=>	$belanja,

						'menuDasbor' => "active",
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
						'menudatamasterHistori' => "",
						'menudatamasterData' => "",

						'menuRiwayatTransaksi' => "",
						'menuRiwayatDaftarKebutuhan' => "",
						'menuRiwayatInvestasi' => "",
						'menuRiwayatPinjam' => "",
						'menuRiwayatBelanja' => "",

						'isi'	=>	'dasbor/list'
		 			 );

		
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('dashboard');
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */