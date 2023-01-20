<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Inventaris_model', 'inventaris');
	}

	public function getBarang() {
		$id = $this->input->get('id');
		$data = $this->inventaris->getInventarisById($id);
		echo json_encode($data);
	} 

	public function index() {
		$data['title'] = 'Inventarisir';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jenis'] = $this->db->get('jenis')->result_array();
		$data['ruang'] = $this->db->get('ruang')->result_array();
		$data['inventaris'] = $this->inventaris->getInventaris();

		$this->load->view('template/admin_head', $data);
		$this->load->view('template/admin_header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('inventaris/index', $data);
		$this->load->view('template/admin_footer');
	}

	public function tambah() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kode_inventaris', 'Kode Inventaris', 'required|trim');
		$this->form_validation->set_rules('nama_inventaris', 'Nama Inventaris', 'required|trim');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('tanggal_register', 'Tanggal Register', 'required|trim');
		$this->form_validation->set_rules('ruang', 'Ruang', 'required|trim');

		if($this->form_validation->run() == false ) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	        	Data gagal ditambahkan!
	        	</div>');
	        	redirect('inventaris');
		} else {
			$data = [
				'id_inventaris' => '',
				'kode_inventaris' => $this->input->post('kode_inventaris'),
				'nama_inventaris' => $this->input->post('nama_inventaris'),
				'kondisi' => $this->input->post('kondisi'),
				'keterangan' => $this->input->post('keterangan'),
				'id_jenis' => $this->input->post('jenis'),
				'jumlah' => $this->input->post('jumlah'),
				'tanggal_register' => $this->input->post('tanggal_register'),
				'id_ruang' => $this->input->post('ruang'),
				'id_user' => $data['user']['id_user'],
				'id_admin' => 0
			];

			$this->inventaris->addData($data);

			if($this->db->affected_rows()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            	Data berhasil ditambahkan!
            	</div>');
            	redirect('inventaris');
			}
		}
	}

	public function getEdit() {
		$id = $this->input->get('id');

		$data = $this->inventaris->dataEdit($id);

		echo json_encode($data);
	} 
}