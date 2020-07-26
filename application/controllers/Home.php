<?php 

class Home extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->model('Home_model');
	}


	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('tmp/header');
			$this->load->view('auth/login');
			$this->load->view('tmp/footer');

		}else{

			$this->_login();
		}
	}



	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
			 	// cek passwordnya
				if (password_verify($password, $user['password'])) {

					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						$this->session->set_flashdata('flash', 'Successfully logged in as admin');
						redirect('dashboard');
					} else{
						$this->session->set_flashdata('flash', 'Successfully logged in as user');
						redirect('user');
					}
					
				} else {

					$this->session->set_flashdata('alert', 'Wroong password!');
					redirect('home');
				}

			} else {
				$this->session->set_flashdata('alert', 'This email has not been activated !');
				redirect('home');
			}

		} else {
			$this->session->set_flashdata('alert', 'Email is not registered !');
			redirect('home');
		}
	}

	public function register()
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

			$this->load->view('tmp/header');
			$this->load->view('auth/register');
			$this->load->view('tmp/footer');

		}else{
			$this->Home_model->insertUser();

			$this->session->set_flashdata('flash', 'Congratulation! your account has been created. Please login');
			redirect('home');

		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');


		$this->session->set_flashdata('flash', 'You has been logged out !');
		redirect('home');
	}

}