<?php 

class Home_model extends CI_model
{

	public function insertUser()
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'data_created' => time()

		];

		$this->db->insert('user', $data);
	}



	public function insertadmin()
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 1,
			'is_active' => 1,
			'data_created' => time()

		];

		$this->db->insert('user', $data);
	}

	public function getAbsen() {

		$tanggal = indoDate();

		return $this->db->query("SELECT * FROM absensi JOIN siswa ON absensi.id_siswa = siswa.id JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE absensi.tanggal = '$tanggal'");
	}

	public function getAllAbsen() {

		$tanggal = indoDate();

		return $this->db->query("SELECT * FROM absensi JOIN siswa ON absensi.id_siswa = siswa.id JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
	}


	public function getRekap() {

		return $this->db->query("SELECT * FROM rekap JOIN siswa ON rekap.id_siswa = siswa.id JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
	}

	public function role() {
		return $this->db->query("SELECT * FROM user JOIN user_role ON user.role_id = user_role.id_role")->result_array();

	}
	
}