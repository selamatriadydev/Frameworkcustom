<?php

class App {
	//properti untuk class app
	//properti untuk menentukan controller, metod dan parameter default nya
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];



	public function __construct()
	{
		// echo 'OK';
		////mengambil apapun yang dituliskan user
		//var_dump($_GET);
        //memanggil fungsi parseURL
		$url = $this->parseURL();
		////baca yang diambil dari $url
		//var_dump($url);
		//cek apakah file nya ada sesuai yang di url
		//misal file Home.php di folder /app/controller/Home.php
		//file name adalah nama file yang akan dicari
		//Home element array  pertama stelah public jadi Home array[0], karena array default dimulai dari 0 'nol'
		//controller
		if( file_exists('../app/controllers/'. $url[0] . '.php'))
		{
			//jika ada timpa controler defaul dengan yang baru
			$this->controller = $url[0];
			//kemudian kita hilangkan tulisan controllernya
			unset($url[0]);

			//jika tidak ada maka di pakai controler default
		}
		//memanggil conroller nya
		require_once '../app/controllers/' . $this->controller . '.php';
		//instanisasi contorolernya supaya bisa memanggil metod nya
		$this->controller = new $this->controller;



		//method
		//cek metodnya 
		//method berada array ke 1 setelah controller
		if( isset($url[1])){
			//cek apakah metodnya ada
			if( method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//kelolah parameternya
		//parameter berada setelah method atau array ke 2 dan seterusnya seperti di atas
		//cek parameternya
		if( !empty($url))
		{
			//ambil parameternya deangan array_values($url);
		$this->params = array_values($url);
	
		}

		//jalankan controlller & method, serta kirimkan parameternya jika ada
		//dengan fungsi dibawah ini call_user_func_array
		call_user_func_array([$this->controller, $this->method], $this->params);


	}
	//memngambil url dan memecah sesuai dengan keinginan kita
	public function parseURL()
	{
		if( isset($_GET['url']))
		{   //agar diakhir tidak ada garing "/" menggunakan rtrim
	    	//rtrim(($_GET['url'], kemdian yang dihapus yaitu garing '/');)
			$url = rtrim($_GET['url'], '/');
			//membersikan url dari karakter yang aneh yang kemungkinan web dihack
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//url nya dipecah berdasarkan tanda garing "/" dengan fungsi explode dengan delimiternya garing "/" dan stringnya jdi elemen array
			$url = explode('/', $url);

			return $url;
		}
	}

}