<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Outlet_model extends CI_Model {
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
	public function get_outlet($id) {
		
		$this->db->from('outlet');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	public function get_outlet_count() {
		
		$this->db->from('outlet');
		$count = $this->db->count_all_results();
		return $count;
		
	}

	public function get_last_id_outlet() {
		
		$this->db->from('outlet');
		$this->db->select('id_outlet')->order_by('id_outlet',"desc");
		$temps = $this->db->get()->first_row();
		$temp = $temps->id_outlet;
		$number = $temp;
		$int = (int)$number;
		$last_id_outlet = $int+1;
		$res = sprintf('%02d', $last_id_outlet);
		return $res;
		
	}

	public function get_outlet_all() {
		
		return $this->db->get('outlet');
		
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
	public function create_outlet($idoutlet, $nama, $lokasi, $notelp) {
		
		$data = array(
			'id_outlet' 	=> $idoutlet,
			'nama_outlet'	=> $nama,
			'lokasi_outlet'	=> $lokasi,
			'no_telp_outlet'=> $notelp,
			'created_at' 	=> date('Y-m-j H:i:s'),
			);	

		return $this->db->insert('outlet', $data);
		
	}

	public function update_outlet($id, $nama, $lokasi, $notelp) {
		
		$data = array(
			'nama_outlet'	=> $nama,
			'lokasi_outlet'	=> $lokasi,
			'no_telp_outlet'=> $notelp,
			'created_at' 	=> date('Y-m-j H:i:s'),
			);	

		$this->db->where('id', $id);
		$this->db->update('outlet', $data);
		return $nama;
		
	}

	public function delete_outlet($id) {
		
		$this->db->where('id', $id);
		$this->db->delete('outlet');
		return $id;
		
	}
	
}