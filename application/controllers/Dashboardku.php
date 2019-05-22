<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardku extends CI_Controller {
	public function index()
	{
		$data['menudashboard'] = "active";
		$data['menudatamaster'] = "";
		$data['menudatamasteranggota'] = "";
		$data['menudatamastersiswa'] = "";
		$data['menudatamasterDaftarKebutuhan'] = "";
		
		// Memanggil view dashboard.php		
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('dashboard');
	}
}
