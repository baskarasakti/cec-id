<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Staff_model extends CI_Model {
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
	public function get_staff($id) {
		
		$this->db->from('staff');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	// public function get_last_nik($outlet,$cat,$level) {
		
	// 	$temp_nik = $outlet.$cat.$level;
	// 	$this->db->from('staff');
	// 	$this->db->like('nik', $temp_nik);
	// 	$temp = $this->db->select('id')->order_by('id',"desc")->limit(1)->get()->row('nik');
	// 	$number = substr($temp, 4);
	// 	$int = (int)$number;
	// 	$last_nik = $int+1;
	// 	return $last_nik;
		
	// }

	/**
	 * create_murid function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_staff($nik, $namadepan, $namabelakang, $tgllahir, $gender, $alamat, $notelp, $jabatan, $idoutlet) {
		
		$data = array(
			'nik_staff' 			=> $nik,
			'nama_depan_staff'		=> $namadepan,
			'nama_belakang_staff'	=> $namabelakang,
			'tanggal_lahir_staff'	=> $tgllahir,
			'jenis_kelamin_staff'	=> $gender,
			'alamat_staff'			=> $alamat,
			'no_telp_staff'			=> $notelp,
			'jabatan_staff'			=> $jabatan,
			'id_outlet' 			=> $idoutlet,
			'created_at' => date('Y-m-j H:i:s'),
		);	

		return $this->db->insert('staff', $data);
		
	}
	
}