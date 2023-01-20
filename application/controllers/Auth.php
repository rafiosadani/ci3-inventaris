<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // public function __construct() {
    //     parent::__construct();
    // }

	public function index() {
        
        if($this->session->userdata('email')) {
            redirect('admin');
        }

		$data['title'] = 'Login Page';
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			// validasinya sukses
			$this->_login();
		}
	}

	public function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika usernya ada
		if($user) {
			// jika user aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $email,
                        'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);
					redirect('admin');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
           			</div>');
           			redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    User tidak aktif!
           		</div>');
           		redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    User tidak ada!
           	</div>');
 			redirect('auth');
		}
	}

	public function registration() {
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        	'matches' => 'Password dont match!',
        	'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
        	'matches' => 'Password dont match!'
        ]);

        if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('template/auth_footer');
        } else {
        	$email = $this->input->post('email', true);
        	$upload_image = $_FILES['image']['name'];

        	if ($upload_image) {
        		$config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')) {
                	$new_image = $this->upload->data('file_name');
                } else {
                	 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('auth/registration');
                }
        	}
        	$data = [
        		"nama" => htmlspecialchars($this->input->post('fullname', true)),
        		"email" => htmlspecialchars($email),
        		"image" => $new_image,
        		"password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                "role_id" => 1,
        		"is_active" => 1,
        		"date_created" => time()
        	];

        	$this->db->insert('user', $data);
        	
        	if($this->db->affected_rows()) {
        		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                	Congratulation! your account has been created. Please Login your account.
            	</div>');
            	redirect('auth');
        	}
        }
	}

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">
            You has been logged out!
        </div>');
        redirect('auth');
    }
 
}