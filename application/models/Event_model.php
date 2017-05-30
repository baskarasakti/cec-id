<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Event_model extends CI_Model {
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
	public function get_user_event($idevent) {
		
		$this->db->from('event');
		$this->db->where('id_event', $idevent);
		return $this->db->get()->row();
		
	}

	public function get_event_all() {
		
		return $this->db->get('event');
		
	}

	public function get_peserta_all() {
		
		return $this->db->get('peserta');
		
	}

	public function get_costevent_all() {
		
		return $this->db->get('costevent');
		
	}

	public function get_last_id_user_event() {
		
		$this->db->from('event');
		$this->db->select('id_event')->order_by('id_event',"desc");
		$temps = $this->db->get()->first_row();
		$temp = $temps->id_event;
		$number = $temp;
		$int = (int)$number;
		$last_id_event = $int+1;
		$res = sprintf('%02d', $last_id_event);
		return $res;
		
	}



	// public function get_last_nik($outlet,$cat,$level) {
		
	// 	$temp_nik = $outlet.$cat.$level;
	// 	$this->db->from('event');
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
	public function create_event($idevent, $nama, $tgl, $lokasi, $email, $password) {
		
		$data = array(
			'id_event' 			=> $idevent,
			'nama_event'		=> $nama,
			'tanggal_event'		=> $tgl,
			'lokasi_event'		=> $lokasi,
			'user_event'		=> $email,
			'password_event'	=> $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);	

		return $this->db->insert('event', $data);
		
	}

	public function update_event($idevent, $nama, $tgl, $lokasi, $email, $password) {
		
		$data = array(
			'nama_event'		=> $nama,
			'tanggal_event'		=> $tgl,
			'lokasi_event'		=> $lokasi,
			'user_event'		=> $email,
			'password_event'	=> $this->hash_password($password),
			'created_at' => date('Y-m-j H:i:s'),
		);	

		$this->db->where('id_event', $idevent);
		$this->db->update('event', $data);
		return $idevent;
		
	}

	public function create_peserta($idpeserta, $nama, $alamat, $notelp, $kategori, $kelas) {
		
		$data = array(
			'id_peserta' 		=> $idpeserta,
			'nama_peserta'		=> $nama,
			'alamat_peserta'	=> $alamat,
			'no_telp_peserta'	=> $notelp,
			'kategori_peserta'	=> $kategori,
			'kelas_peserta'		=> $kelas,
			'created_at' => date('Y-m-j H:i:s'),
		);	

		return $this->db->insert('peserta', $data);
		
	}

	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_event_login($username, $password) {
		
		$this->db->select('password_event');
		$this->db->from('event');
		$this->db->where('user_event', $username);
		$hash = $this->db->get()->row('password_event');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_event_id_from_username($username) {
		
		$this->db->select('id_event');
		$this->db->from('event');
		$this->db->where('user_event', $username);
		return $this->db->get()->row('id_event');
		
	}

	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}

	public function delete_userEvent($id) {
		
		$this->db->where('id_event', $id);
		$this->db->delete('event');
		return $id;
		
	}
	
}