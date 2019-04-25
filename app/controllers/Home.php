<?php

/**
* 
*/
//kasih extends controller agar dapat memanggil method views yang ada di folder core
class Home extends Controller
{
	
	//method default yaitu index
	public function index()
	{
		//memanggil sebuah views dari folder views
		//method views disimpan di controller yang ada di folder core
		//$this->views( isinya alamat yang ada di folder views)
        $data['judul'] = 'home';
        //getUser berada di folder models file user_model.php
        $data['nama'] = $this->model('User_model')->getUser();
		$this->views('template/header', $data);
		$this->views('home/index', $data);
		$this->views('template/footer');
	}
}