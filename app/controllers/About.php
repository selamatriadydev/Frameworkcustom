<?php

/**
* 
*/
//kasih extends controller agar dapat memanggil method views yang ada di folder core
class About extends Controller
{
	//method defaulnya
	//memanggil parameter di url dengan memasukan parameter di url, contol index($nama, $pekerjaan)
	//buat parameter defaul dengan cara  index($nama = 'adi', $pekerjaan ='modification')
	public function index($nama = 'adi', $pekerjaan ='modification')
	{
		//untuk mengirikan $data di index harus menambahkan parameter $data yang ada di controller yang siap menerima $data
		$data['judul'] = 'about';
		//siapkan data
		$data['nama'] = $nama;
		$data['pekerjaan'] = $pekerjaan;
		//contoh $this->views('about/index', isikan parameter $data);

		$this->views('template/header', $data);
		$this->views('about/index', $data);
		$this->views('template/footer');
	}

    public function page()
	{
		//# baca 
		$data['judul'] = 'my pages';
		$this->views('template/header', $data);
		$this->views('home/page');
		$this->views('template/footer');
	}
		
}