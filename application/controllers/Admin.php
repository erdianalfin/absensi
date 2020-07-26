<?php 


class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Home_model');

		is_logged_in();

	}

	public function index()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered'
		]);
		$this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[4]|matches[password2]', [
			'min_length' => 'Password to short!',
			'matches' => 'Password down match!'
		]);
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {

			$data['title'] = 'Data user';

			$data['user'] = $this->Home_model->role();


			$this->load->view('tmp/head', $data);
			$this->load->view('tmp/sidebar', $data);
			$this->load->view('tmp/topbar', $data);
			$this->load->view('admin/index', $data);
			$this->load->view('tmp/foter');

		}else{
			$this->Home_model->insertadmin();

			$this->session->set_flashdata('flash', 'Congratulation! your account has been created');
			redirect('admin');

		}
	}



	public function hapus($id) {
		
		$this->db->delete('user', ['id' => $id]);

		$this->session->set_flashdata('flash', 'Berhasil di hapus');
		redirect('admin');
	}
}