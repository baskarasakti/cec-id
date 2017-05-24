<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Jadwal_model extends CI_Model {
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
	public function get_jadwal($nik) {
		
		$this->db->from('jadwal');
		$this->db->where('nik_jadwal', $nik);
		return $this->db->get()->row();
		
	}

	public function get_jadwal_per_outlet($outlet)
	{
		$this->db->from('jadwal');
		$this->db->join('murid', 'murid.nik = jadwal.nik_jadwal', 'left');
		$this->db->where('id_outlet', $outlet);
		return $this->db->get();
	}

	public function get_jadwal_all() {
		
		$this->db->from('jadwal');
		$this->db->join('murid', 'murid.nik = jadwal.nik_jadwal', 'left');
		return $this->db->get();
		
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
	public function create_jadwal($nik, $nama, $senin, $selasa, $rabu, $kamis, $jumat, $sabtu, $minggu) {
		
		$data = array(
			'nik_jadwal' => $nik,
			'nama_jadwal' => $nama,
			'senin' => $senin,
			'selasa' => $selasa,
			'rabu' => $rabu,
			'kamis' => $kamis,
			'jumat' => $jumat,
			'sabtu' => $sabtu,
			'minggu' => $minggu,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('jadwal', $data);
		
	}

	public function update_jadwal($nik, $nama, $senin, $selasa, $rabu, $kamis, $jumat, $sabtu, $minggu) {
		
		$data = array(
			'nik_jadwal' => $nik,
			'nama_jadwal' => $nama,
			'senin' => $senin,
			'selasa' => $selasa,
			'rabu' => $rabu,
			'kamis' => $kamis,
			'jumat' => $jumat,
			'sabtu' => $sabtu,
			'minggu' => $minggu,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('nik_jadwal', $nik);
		$this->db->update('jadwal', $data);
		return $nik;
		
	}
	
}