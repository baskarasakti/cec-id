<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Salary_model extends CI_Model {
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
	public function get_salary($id) {
		
		$this->db->from('salary');
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
	public function create_salary($nik, $gajipokok, $bonus, $tgl) {
		
		$data = array(
			'nik_staff_salary' 		=> $nik,
			'gaji_pokok_salary'		=> $gajipokok,
			'bonus_salary'			=> $bonus,
			'tanggal_salary'		=> $tgl,
			'created_at' => date('Y-m-j H:i:s'),
		);	

		return $this->db->insert('salary', $data);
	}
	
}