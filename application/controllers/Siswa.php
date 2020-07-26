<?php 

class Siswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Siswa_model');

		is_logged_in();
		
	}

	public function index()
	{
		$this->form_validation->set_rules('nisn', 'Nisn', 'required|trim|is_unique[siswa.nisn]', [
			'is_unique' => 'nisn already registered!'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


		if ($this->form_validation->run() == false) {

			$data['title'] = 'Data siswa';
			$data['siswa'] = $this->Siswa_model->getAllSiswa();
			$data['jenis'] = ['Laki - Laki', 'Perempuan'];
			$data['kelas'] = $this->db->get('kelas')->result_array();

			$this->load->view('tmp/head', $data);
			$this->load->view('tmp/sidebar', $data);
			$this->load->view('tmp/topbar', $data);
			$this->load->view('siswa/index', $data);
			$this->load->view('tmp/foter');

		}else{

			$data = [

				'nisn' => htmlspecialchars($this->input->post('nisn')),
				'nama' => htmlspecialchars($this->input->post('nama')),
				'jenis' => htmlspecialchars($this->input->post('jenis')),
				'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'date_created' => indoDate()

			];

			$this->db->insert('siswa', $data);
			$this->session->set_flashdata('siswa', 'Berhasil di tambah!');
			redirect('siswa');

		}
	}

	public function hapus($id) {
		$this->db->delete('siswa', ['id' => $id]);	
		$this->session->set_flashdata('siswa', 'Berhasil di hapus!');
		redirect('siswa');
	}

	public function edit($id) {

		$this->form_validation->set_rules('nisn', 'Nisn', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


		if ($this->form_validation->run() == false) {

			$data['title'] = 'Edit siswa';
			$data['siswa'] = $this->db->get_where('siswa', ['id' => $id])->row_array();
			$data['jenis'] = ['Laki - Laki', 'Perempuan'];
			$data['kelas'] = $this->db->get('kelas')->result_array();

			$this->load->view('tmp/head', $data);
			$this->load->view('tmp/sidebar', $data);
			$this->load->view('tmp/topbar', $data);
			$this->load->view('siswa/edit', $data);
			$this->load->view('tmp/foter');

		}else{

			$data = [

				'nisn' => htmlspecialchars($this->input->post('nisn')),
				'nama' => htmlspecialchars($this->input->post('nama')),
				'jenis' => htmlspecialchars($this->input->post('jenis')),
				'id_kelas' => htmlspecialchars($this->input->post('id_kelas')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'date_created' => indoDate()

			];

			$this->db->where('id', $this->input->post('id'));

			$this->db->update('siswa', $data);
			$this->session->set_flashdata('siswa', 'Berhasil di edit!');
			redirect('siswa');

		}
	}

}