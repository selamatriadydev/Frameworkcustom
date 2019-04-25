<?php

/**
* 
*/
//kasih extends controller agar dapat memanggil method views yang ada di folder core
class Mahasiswa extends Controller
{
	
	//method default yaitu index
	public function index()
	{
		//memanggil sebuah views dari folder views
		//method views disimpan di controller yang ada di folder core
		//$this->views( isinya alamat yang ada di folder views)
        $data['judul'] = 'Daftar Mahasiswa';
		$data['mhs']   = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->views('template/header', $data);
		$this->views('mahasiswa/index', $data);
		$this->views('template/footer');
	}

	public function detail($id)
	{
		//memanggil sebuah views dari folder views
		//method views disimpan di controller yang ada di folder core
		//$this->views( isinya alamat yang ada di folder views)
        $data['judul'] = 'Detail Mahasiswa';
		$data['mhs']   = $this->model('Mahasiswa_model')->getMahasiswaById($id);
		$this->views('template/header', $data);
		$this->views('mahasiswa/detail', $data);
		$this->views('template/footer');
	}

	public function tambah()
	{	//baca data yang di insert
		//var_dump($_POST);

		if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
			header('Location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}
}