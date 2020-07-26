<?php 

class Absensi extends CI_Controller
{
	public function __construct() {
		parent::__construct();

		$this->load->model('Home_model');
	}

	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Absensi hari ini';
			$data['kelas'] = $this->db->get('kelas')->result_array();
			$data['absensi'] = $this->Home_model->getAbsen()->result_array();

			$this->session->set_flashdata('absen_error', '');

			$this->load->view('tmp/head', $data);
			$this->load->view('tmp/sidebar', $data);
			$this->load->view('tmp/topbar');
			$this->load->view('absensi/index', $data);
			$this->load->view('tmp/foter');
		}
		else
		{
			$data = [
				'id_siswa' => $this->input->post('siswa'),
				'keterangan' => $this->input->post('keterangan'),
				'tanggal' => indoDate(),
				'bulan' => indoDateMinOneMonth()
			];

			$id_siswa = $this->input->post('siswa');
			$keterangan = $this->input->post('keterangan');

			$absen = $this->db->get_where('absensi', ['id_siswa' => $id_siswa ])->row_array();

			$siswa = $this->db->get_where('siswa', ['id' => $id_siswa])->row_array();

			if ( $absen['tanggal'] == indoDate() ) {

				$this->session->set_flashdata('absen', 'Siswa sudah di absen !');
				redirect('absensi');

			}else{

				if ($keterangan == 'Sakit') {
					$hitung = $siswa['s'] + 1;
					$this->db->set('s', $hitung);
					$this->db->where('id', $siswa['id']);
					$this->db->update('siswa');
					
				}else if ($keterangan == 'Izin') {

					$hitung = $siswa['i'] + 1;
					$this->db->set('i', $hitung);
					$this->db->where('id', $siswa['id']);
					$this->db->update('siswa');

				}else if ($keterangan == 'Alfa') {
					
					$hitung = $siswa['a'] + 1;
					$this->db->set('a', $hitung);
					$this->db->where('id', $siswa['id']);
					$this->db->update('siswa');

				}

				$this->db->insert('absensi', $data);

				$this->session->set_flashdata('absensi', 'Siswa berhasil di absen !');
				redirect('absensi');

			}
		}


	}

	public function getSiswaByKelas($id_kelas) {
		$siswa = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->result_array();

		foreach ($siswa as $s) {
			echo '<option value="' . $s["id"] . '">' . $s["nama"] . '</option>';
		}
	}

	private function _rules() {
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

		$this->form_validation->set_rules('siswa', 'Siswa', 'required|trim');

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
	}

	public function hapus($id_absensi) {
		
		$absen = $this->db->get_where('absensi', ['id_absensi' => $id_absensi ])->row_array();
		$siswa = $this->db->get_where('siswa', ['id' => $absen['id_siswa']])->row_array();


		if ($absen['keterangan'] == 'Sakit') {
			$hitung = $siswa['s'] - 1;
			$this->db->set('s', $hitung);
			$this->db->where('id', $siswa['id']);
			$this->db->update('siswa');

		}else if ($absen['keterangan'] == 'Izin') {

			$hitung = $siswa['i'] - 1;
			$this->db->set('i', $hitung);
			$this->db->where('id', $siswa['id']);
			$this->db->update('siswa');

		}else if ($absen['keterangan'] == 'Alfa') {

			$hitung = $siswa['a'] - 1;
			$this->db->set('a', $hitung);
			$this->db->where('id', $siswa['id']);
			$this->db->update('siswa');

		}

		$this->db->delete('absensi', ['id_absensi' => $id_absensi]);

		$this->session->set_flashdata('absensi', 'Data absensi berhasil di hapus');
		redirect('absensi');
	}


	public function mounth() {
		
		$data['title'] = 'Absensi bulan ini';
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['absensi'] = $this->Home_model->getAllAbsen()->result_array();

		$this->session->set_flashdata('absen_error', '');

		$this->load->view('tmp/head', $data);
		$this->load->view('tmp/sidebar', $data);
		$this->load->view('tmp/topbar');
		$this->load->view('absensi/absensi', $data);
		$this->load->view('tmp/foter');

	}

}