<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_model extends CI_Model {

	public function getInventaris() {
		$this->db->select('inventaris.*, jenis.nama_jenis, ruang.nama_ruang');
		$this->db->from('inventaris');
		$this->db->join('jenis', 'inventaris.id_jenis = jenis.id_jenis');
		$this->db->join('ruang', 'inventaris.id_ruang = ruang.id_ruang');
		return $this->db->get()->result_array();
	}

	public function getInventarisById($id) {
		$this->db->select('inventaris.*, jenis.nama_jenis, ruang.nama_ruang');
		$this->db->from('inventaris');
		$this->db->join('jenis', 'inventaris.id_jenis = jenis.id_jenis');
		$this->db->join('ruang', 'inventaris.id_ruang = ruang.id_ruang');
		$this->db->where('id_inventaris', $id);
		$hasil = $this->db->get()->row_array();
		return $hasil;
	}

	public function addData($data) {
		$this->db->insert('inventaris', $data);
	}

	public function dataEdit($id) {
		$hasil = $this->db->get_where('inventaris', ['id_inventaris' => $id]);
		if( $hasil->num_rows() > 0 ) {
			foreach ($hasil->result() as $data) {
				$hsl = [
					'id_inventaris' => $data->id_inventaris,
					'kode_inventaris' => $data->kode_inventaris,
					'nama_inventaris' => $data->nama_inventaris,
					'kondisi' => $data->kondisi,
					'keterangan' => $data->keterangan,
					'id_jenis' => $data->jenis,
					'jumlah' => $data->jumlah,
					'tanggal_register' => $data->tanggal_register,
					'id_ruang' => $data->ruang,
					'id_user' => $data->id_user,
					'id_admin' => $data->id_admin 
				];
			}
		} 
		return $hsl;
	} 
}