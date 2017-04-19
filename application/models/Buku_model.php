<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Buku_model extends CI_Model {
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
	public function get_buku($id) {
		
		$this->db->from('buku');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	public function get_buku_all() {
		
		return $this->db->get('buku');
		
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
	public function create_buku($judul, $tahun, $pengarang, $penerbit, $harga) {
		
		$data = array(
			'judul'   => $judul,
			'tahun'      => $tahun,
			'pengarang'      => $pengarang,
			'penerbit'      => $penerbit,
			'harga'   => $harga,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('buku', $data);
		
	}
	
}