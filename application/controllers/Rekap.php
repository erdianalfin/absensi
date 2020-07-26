
<?php 


class Rekap extends CI_Controller
{

	public function __construct() {

		parent::__construct();

		$this->load->model('Home_model');

	}


	public function index()
	{
		$data['title'] = 'Rekap';
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['rekap'] = $this->Home_model->getRekap()->result_array();

		$this->load->view('tmp/head', $data);
		$this->load->view('tmp/sidebar', $data);
		$this->load->view('tmp/topbar');
		$this->load->view('rekap/index', $data);
		$this->load->view('tmp/foter');

	}

	public function create() {
		$siswa = $this->db->get('siswa')->result_array();

		$tanggal = indoDateMinOneMonth();

		$rekap = $this->db->get('rekap', ['tgl' == $tanggal])->row_array();

		if ( is_null($rekap['tgl']) ) {

			foreach ($siswa as $siswa) {
				$data = [
					'id_siswa' => $siswa['id'],
					'id_kelas' => $siswa['id_kelas'],
					'sakit'    => $siswa['s'],
					'izin'     => $siswa['i'],
					'alfa'     => $siswa['a'],
					'tgl'  => indoDateMinOneMonth()
				];

				$this->db->insert('rekap', $data);

				$this->db->delete('absensi', ['bulan' => $bulan]);

				$bulan = indoDateMinOneMonth();

				$data = [

					's' => 0,
					'i' => 0,
					'a' => 0

				];

				$this->db->update('siswa', $data);
			}


			$this->session->set_flashdata('rekab', 'Absensi berhasil di rekap!');
			redirect('rekap');

		} else {
			if ( $rekap['tgl'] == $tanggal ) {
				$this->session->set_flashdata('rekap', 'Absensi bulan ini sudah di rekap!');
				redirect('rekap');
			} else {

				foreach ($siswa as $siswa) {
					$data = [
						'id_siswa' => $siswa['id'],
						'id_kelas' => $siswa['id_kelas'],
						'sakit'    => $siswa['s'],
						'izin'     => $siswa['i'],
						'alfa'     => $siswa['a'],
						'tgl'  => indoDateMinOneMonth()
					];

					$this->db->insert('rekap', $data);

					$this->db->delete('absensi', ['bulan' => $bulan]);

					$bulan = indoDateMinOneMonth();

					$data = [

						's' => 0,
						'i' => 0,
						'a' => 0

					];

					$this->db->update('siswa', $data);
				}

				$this->session->set_flashdata('rekab', 'Absensi berhasil di rekap!');
				redirect('rekap');

			}
		}
	}

}