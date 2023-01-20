<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index() {
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 

		$this->load->view('template/admin_head', $data);
		$this->load->view('template/admin_header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('admin/index.php', $data);
		$this->load->view('template/admin_footer');
	}

}