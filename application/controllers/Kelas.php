<?php 

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Kelas_model');
	}

	public function index()
	{

		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Data kelas';

			$data['kelas'] = $this->db->get('kelas')->result_array();

			$this->load->view('tmp/head', $data);
			$this->load->view('tmp/sidebar', $data);
			$this->load->view('tmp/topbar');
			$this->load->view('kelas/index', $data);
			$this->load->view('tmp/foter');

		}else{

			$data = [
				'kelas' => htmlspecialchars($this->input->post('kelas'))
			];

			$this->db->insert('kelas', $data);

			$this->session->set_flashdata('kelas', 'Berhasil di tambah!');
			redirect('kelas');
		}
	}

	public function hapus($id) {
		
		$this->db->delete('kelas', ['id_kelas' => $id]);

		$this->session->set_flashdata('kelas', 'Berhasil di hapus!');
		redirect('kelas');
	}

	public function getkelas() {
		
		$id_kelas = $this->input->post('id_kelas');


		$query = $this->db->get('kelas', ['id_kelas' => $id_kelas])->row_array();

		echo json_encode($query);
	}
}