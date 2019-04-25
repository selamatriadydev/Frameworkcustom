<?php

/**
* 
*/
class Controller
{
	//buat method view yang didalamnya ada dua parameter yaitu $view dan $data (siapa tau ada datanya)
	//parameter $data dikasih nilai defaul yaitu array [] (siapa tau datanya bnyak atau nggak ada data yang dikirim)
	//views
	public function views($views, $data = [])
	{
		require_once '../app/views/' . $views . '.php';
	}

	//models
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		// instanisiasi karena class bukan tmpilan di views isinya html saja
		return new $model;
	}
}