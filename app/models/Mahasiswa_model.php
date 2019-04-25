<?php


/**
* 
*/
class Mahasiswa_model
{
	private $table = 'mahasiswa';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	

   public function getAllMahasiswa()
   {
   	$this->db->query('SELECT * FROM ' . $this->table);
   	return $this->db->resultSet();
   }

   public function getMahasiswaById($id)
   {
   	$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
   	$this->db->bind('id', $id);
   	return $this->db->single();
   }


   public function tambahDataMahasiswa($data)
   {
      $query = "INSERT INTO mahasiswa
                  VALUES
               ('', :nama, :nrp, :email, :jurusan)";
      $this->db->query($query);
      //penjelasanan
      //$this->db->bind('nama {untuk memberi nilai pada :nama diatas}', $data['nama'] { ['nama'] diambel dari name="nama" di form pada modal di index view});
      $this->db->bind('nama', $data['nama']);
      $this->db->bind('nrp', $data['nrp']);
      $this->db->bind('email', $data['email']);
      $this->db->bind('jurusan', $data['jurusan']);

      //menjalana query
      $this->db->execute();

      //jika berhasil menghasilkan nilai 1
      return $this->db->rowCount();
   }
}