
<?php 


class Dashboard extends CI_Controller
{


	public function index()
	{

		$data['title'] = 'Dashboard';
		$data['siswa'] = $this->db->get('siswa')->num_rows();
		$data['kelas'] = $this->db->get('kelas')->num_rows();
		$data['absensi'] = $this->db->get('absensi')->num_rows();
		$data['absensiday'] = $this->db->get_where('absensi', ['tanggal' => indoDate()])->num_rows();

		$this->load->view('tmp/head', $data);
		$this->load->view('tmp/sidebar', $data);
		$this->load->view('tmp/topbar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('tmp/foter');

	}
}