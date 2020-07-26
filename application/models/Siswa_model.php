<?php 

class Siswa_model extends CI_model{

	public function getAllSiswa()
	{
		return $this->db->query("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas")->result_array();
	}
}