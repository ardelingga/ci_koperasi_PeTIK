<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Siswa extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('SiswaModel'); 
		//$this->load->helper('url');
	}
	
	public function index()
	{	
		$data['menudashboard'] = "";
		$data['menudatamaster'] = "active";
		$data['menudatamastersiswa'] = "active";		
		$data['siswa'] = $this->SiswaModel->retrieve_all();
					
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('siswa');		
	}
	
	function save_siswa(){
		$data = array(
		  "nis" => $this->input->post('nis'),
		  "nama" => $this->input->post('nama'),
		  "alamat" => $this->input->post('alamat'),
		  //"tgl_lahir" => $this->input->post('tgl_lahir'),
		  "tgl_lahir" => date_format(date_create($this->input->post('tgl_lahir')), "Y/m/d"),
		  "jenis_kelamin" => $this->input->post('jenis_kelamin'),
		  "telp" => $this->input->post('telp')
		);
		
		$this->SiswaModel->save($data);
		redirect(base_url('siswa'));
	}

	function siswa_update(){
		$nis = $this->input->post("nis");
		
		$data = array(
		  "nama" => $this->input->post('nama'),
		  "alamat" => $this->input->post('alamat'),
		  //"tgl_lahir" => $this->input->post('tgl_lahir'),
		  "tgl_lahir" => date_format(date_create($this->input->post('tgl_lahir')), "Y/m/d"),
		  "jenis_kelamin" => $this->input->post('jenis_kelamin'),
		  "telp" => $this->input->post('telp')
		);
		
		$this->SiswaModel->update($nis, $data);
		redirect(base_url("siswa"));
	}
	
	function siswa_delete(){		
		$nis = $this->uri->segment(3);
		$this->SiswaModel->deletes($nis);
		redirect(base_url("siswa"));
	}

	function siswa_nis_retrieve()
	{				
		$nis = $this->uri->segment(3);				
		
		$data['menudashboard'] = "";
		$data['menudatamaster'] = "active";
		$data['menudatamastersiswa'] = "active";
		
		$data['siswa'] = $this->SiswaModel->retrieve_all();
		$data['siswanis'] = $this->SiswaModel->retrieve_nis($nis);
		
		$this->load->view('top');
		$this->load->view('navigator', $data);
		$this->load->view('siswa_retrieve');
	}
	
}