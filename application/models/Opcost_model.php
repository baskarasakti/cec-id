<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Opcost_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * get_murid function.
	 * 
	 * @access public
	 * @param mixed $id
	 * @return object the user object
	 */
	public function get_operational_cost($id) {
		
		$this->db->from('op_cost');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	public function get_operational_cost_per_month() {
		
		$this->db->select_sum('jumlah');
		$this->db->select('periode');
		$this->db->from('op_cost');
		$this->db->group_by('periode');
		return $this->db->get();
		
	}

	public function get_operational_cost_outlet($outlet) {
		
		$this->db->select_sum('jumlah');
		$this->db->from('op_cost');
		$this->db->where('outlet', $outlet);
		return $this->db->get()->row();
		
	}

	public function get_operational_cost_all() {
		
		return $this->db->get('op_cost');
		
	}

	public function get_operational_cost_per_outlet($outlet) {
		
		$this->db->from('op_cost');
		$this->db->where('outlet', $outlet);
		return $this->db->get();
		
	}

	public function get_operational_cost_total() {
		
		$this->db->select_sum('jumlah');
		return $this->db->get('op_cost')->row();
		
	}

	public function get_operational_cost_per_periode($periode) {
		
		$this->db->select_sum('jumlah');
		$this->db->from('op_cost');
		$this->db->where('periode', $periode);
		return $this->db->get()->row();
		
	}

	public function get_operational_cost_per_periode_outlet($periode,$outlet) {
		
		$this->db->select_sum('jumlah');
		$this->db->from('op_cost');
		$this->db->where('periode', $periode);
		$this->db->where('outlet', $outlet);
		return $this->db->get()->row();
		
	}


	/**
	 * create_murid function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_operational_cost($item, $periode, $jumlah, $deskripsi, $outlet) {
		
		$data = array(
			'item'   => $item,
			'periode'      => $periode,
			'jumlah'      => $jumlah,
			'deskripsi'      => $deskripsi,
			'outlet'      => $outlet,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('op_cost', $data);
		
	}

	public function update_operational_cost($id, $item, $periode, $jumlah, $deskripsi, $outlet) {
		
		$data = array(
			'item'   => $item,
			'periode'      => $periode,
			'jumlah'      => $jumlah,
			'deskripsi'      => $deskripsi,
			'outlet'      => $outlet,
			'updated_at' => date('Y-m-j H:i:s'),
		);

		$this->db->where('id', $id);
		$this->db->update('op_cost', $data);
		return $id;
		
	}

	public function delete_operational_cost($id) {
		
		$this->db->where('id', $id);
		$this->db->delete('op_cost');
		return $id;
		
	}

	public function get_report_per_periode()
	{
		$this->db->select_sum('pembayaran_kursus.jumlah');
		$this->db->select_sum('pembayaran_buku.jumlah');
		$this->db->select('pembayaran_kursus.periode');
		$this->db->from('pembayaran_kursus');
		$this->db->join('pembayaran_buku', 'pembayaran_buku.periode = pembayaran_kursus.periode');
		$this->db->group_by('pembayaran_buku.periode');
		return $this->db->get();
	}
	
}