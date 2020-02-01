<?php 
# Program ini dibuat oleh Agies untuk memenuhi gelar Sarjana di UAD
# Bertempat di wifi id Kotabaru, Kota Yogyakarta, DIY.

# LOG :
# dibuat pada tanggal 30 Januari 2020
# update fitur enkripsi, dekripsi dan about pada tanggal 01 Februari 2020


//class diturunkan dari class CI
class Bismillah extends CI_Controller {
	//konstruktor dijalankan ketika class di instansiasi
	public function __construct() { 
 		parent::__construct(); //mengikuti sifat dari kelas parent
	}
	//TODO : membuat method untuk route akses ke index/Bismillah
	//menampilkan UI dari webnya
	public function index(){

		//$this : menunjukkan class tersebut
		//load : metode yg disediakan CI_Controller untuk memuat konten
		//view : chain method dari method load untuk menampilkan UI

		//parameter method view mengarah pada folder view di dalam folder application
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('app/index');
		$this->load->view('template/footer');
	}

	public function enkripsi(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('app/enkripsi');
		$this->load->view('template/footer');	
	}

	public function dekripsi(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('app/dekripsi');
		$this->load->view('template/footer');	
	}

	public function about(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('app/about');
		$this->load->view('template/footer');	
	}
	
	public function file_upload(){
		$uploadPath = 'dokumen/';

		$config['upload_path'] = $uploadPath;
		$config['allowed_type'] = 'xlsx';
		// $config['max_size'] = 100; untuk ukuran file

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')) {

			$error = array('error' => $this->upload->display_errors());

			echo "Periksa Perizinan Folder".$uploadPath;
			var_dump($error); die;
		} else {

			$data = array('upload_data' => $this->upload->data());
		}

	}

	public function proses_enkripsi(){
		$data = "Berhasil dienkripsi !";

		sleep(3);

		echo json_encode($data, JSON_PRETTY_PRINT);
	}


	// fungsi helper
	// // TODO:
	// public function ECB(){

	// }
}

 ?>