<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Murid_model extends CI_Model {
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
	public function get_murid($id) {
		
		$this->db->from('murid');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	public function get_last_nik($outlet,$cat,$level) {
		
		$temp_nik = $outlet.$cat.$level;
		$this->db->from('murid');
		$this->db->like('nik', $temp_nik);
		$temp = $this->db->select('id')->order_by('id',"desc")->limit(1)->get()->row('nik');
		$number = substr($temp, 4);
		$int = (int)$number;
		$last_nik = $int+1;
		return $last_nik;
		
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
	public function create_murid($nama, $tgllahir, $gender, $alamat, $notelp, $kategori, $level, $pajak, $price) {
		
		$data = array(
			'nama'   => $nama,
			'tgllahir'      => $tgllahir,
			'gender'      => $gender,
			'alamat'      => $alamat,
			'notelp'   => $notelp,
			'kategori' => $kategori,
			'level' => $level,
			'pajak' => $pajak,
			'price' => $price,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('murid', $data);
		
	}
	
}