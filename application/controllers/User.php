<?php 


class User extends CI_Controller
{

	public function __contruct()
	{
		parent::__contruct();

		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('tmp/head', $data);
		$this->load->view('tmp/sidebar', $data);
		$this->load->view('tmp/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('tmp/foter');
	}


	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('tmp/head', $data);
			$this->load->view('tmp/sidebar', $data);
			$this->load->view('tmp/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('tmp/foter');

		} else{

			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// jika ada gambar yg di upload

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {

				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					$old_image = $data['user']['image'];

					if ($old_image != 'default.jpg') {

						unlink(FCPATH . 'assets/img/' . $old_image);

					}

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else{

					echo $this->upload->display_errors();

				}
			}

			$this->db->set('name', $name);
			$this->db->set('email', $email);

			$this->db->update('user');

			$this->session->set_flashdata('flash', 'Your profile has been updated !');
			redirect('user');
		}

	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('flash', 'You has been logged out !');
		redirect('home');
	}
}