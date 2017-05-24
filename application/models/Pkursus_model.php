<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class PKursus_model extends CI_Model {
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
	public function get_pembayaran_kursus($id) {
		
		$this->db->from('pembayaran_kursus');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	public function get_pembayaran_kursus_per_outlet($outlet) {
		
		$outlets = sprintf('%02d', $outlet);
		$this->db->from('pembayaran_kursus');
		$this->db->like('nik', $outlets, 'after');
		return $this->db->get();
		
	}

	public function get_pembayaran_kursus_all() {
		
		return $this->db->get('pembayaran_kursus');
		
	}

	public function get_pembayaran_kursus_periode($periode) {
		
		$this->db->select_sum('jumlah');
		$this->db->from('pembayaran_kursus');
		$this->db->where('periode', $periode);
		return $this->db->get()->row();
		
	}

	public function get_pembayaran_kursus_periode_outlet($periode,$outlet) {
		
		$outlets = sprintf('%02d', $outlet);
		$this->db->select_sum('jumlah');
		$this->db->from('pembayaran_kursus');
		$this->db->where('periode', $periode);
		$this->db->like('nik', $outlets, 'after');
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
	public function create_pembayaran_kursus($nik, $periode, $jumlah,$diskon) {
		
		$data = array(
			'nik'   => $nik,
			'periode'      => $periode,
			'jumlah'      => $jumlah,
			'diskon'      => $diskon,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('pembayaran_kursus', $data);
		
	}

	public function update_pembayaran_kursus($id, $nik, $periode, $jumlah, $diskon) {
		
		$data = array(
			'nik'   		=> $nik,
			'periode'      => $periode,
			'jumlah'      => $jumlah,
			'diskon'      => $diskon,
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id', $id);
		$this->db->update('pembayaran_kursus', $data);
		return $id;
		
	}

	public function delete_pembayaran_kursus($id) {
		
		$this->db->where('id', $id);
		$this->db->delete('pembayaran_kursus');
		return $id;
		
	}

	public function get_murid_belumbayar($periode)
	{
		$temp = explode("-", $periode);
		$periods = date($temp[1].'-'.$temp[0]."-31");
		$this->db->from('murid');
		$this->db->where('!EXISTS(SELECT * FROM pembayaran_kursus WHERE nik = murid.nik AND periode = \''.$periode.'\')');
		$this->db->where('created_at <= \''.$periods.'\'');
		return $this->db->get();
	}


	public function get_murid_belumbayar_count($periode)
	{
		if ($periode == "") {
			$periode = date('m-Y');
		}
		$temp = explode("-", $periode);
		$periods = date($temp[1].'-'.$temp[0]."-31");
		$this->db->from('murid');
		$this->db->where('!EXISTS(SELECT * FROM pembayaran_kursus WHERE nik = murid.nik AND periode = \''.$periode.'\')');
		$this->db->where('created_at <= \''.$periods.'\'');
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_murid_belumbayar_total($periode)
	{
		if ($periode == "") {
			$periode = date('m-Y');
		}
		$temp = explode("-", $periode);
		$periods = date($temp[1].'-'.$temp[0]."-31");
		$this->db->select_sum('price');
		$this->db->from('murid');
		$this->db->where('!EXISTS(SELECT * FROM pembayaran_kursus WHERE nik = murid.nik AND periode = \''.$periode.'\')');
		$this->db->where('created_at <= \''.$periods.'\'');
		return $this->db->get()->row();
	}

	public function get_murid_belumbayar_outlet($outlet, $periode)
	{
		$temp = explode("-", $periode);
		$periods = date($temp[1].'-'.$temp[0]."-31");
		$this->db->from('murid');
		$this->db->where('id_outlet', $outlet);
		$this->db->where('!EXISTS(SELECT * FROM pembayaran_kursus WHERE nik = murid.nik AND periode < \''.$periode.'\')');
		$this->db->where('created_at <= \''.$periods.'\'');
		return $this->db->get();
	}

	public function get_murid_belumbayar_outlet_count($outlet, $periode)
	{
		if ($periode == "") {
			$periode = date('m-Y');
		}
		$temp = explode("-", $periode);
		$periods = date($temp[1].'-'.$temp[0]."-31");
		$this->db->from('murid');
		$this->db->where('id_outlet', $outlet);
		$this->db->where('!EXISTS(SELECT * FROM pembayaran_kursus WHERE nik = murid.nik AND periode < \''.$periode.'\')');
		$this->db->where('created_at <= \''.$periods.'\'');
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_murid_belumbayar_outlet_total($outlet, $periode)
	{
		if ($periode == "") {
			$periode = date('m-Y');
		}
		$temp = explode("-", $periode);
		$periods = date($temp[1].'-'.$temp[0]."-31");
		$this->db->select_sum('price');
		$this->db->from('murid');
		$this->db->where('id_outlet', $outlet);
		$this->db->where('!EXISTS(SELECT * FROM pembayaran_kursus WHERE nik = murid.nik AND periode < \''.$periode.'\')');
		$this->db->where('created_at <= \''.$periods.'\'');
		return $this->db->get()->row();
	}
	
}