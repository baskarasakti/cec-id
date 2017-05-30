<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class PBuku_model extends CI_Model {
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
	public function get_pembayaran_buku($id) {
		
		$this->db->from('pembayaran_buku');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		
	}

	public function get_pembayaran_buku_per_outlet($outlet) {
		
		$outlets = sprintf('%02d', $outlet);
		$this->db->like('nik', $outlets, 'after');
		return $this->db->get('pembayaran_buku');
		
	}

	public function get_pembayaran_buku_all() {
		
		return $this->db->get('pembayaran_buku');
		
	}

	public function get_pembayaran_buku_periode($periode) {
		
		$this->db->select_sum('jumlah');
		$this->db->from('pembayaran_buku');
		$this->db->where('periode', $periode);
		return $this->db->get()->row();
		
	}

	public function get_pembayaran_buku_periode_outlet($periode,$outlet) {
		
		$outlets = sprintf('%02d', $outlet);
		$this->db->select_sum('jumlah');
		$this->db->from('pembayaran_buku');
		$this->db->where('periode', $periode);
		$this->db->like('nik', $outlets, 'after');
		return $this->db->get()->row();
		
	}

	public function get_murid_belumbayar_buku($idbuku)
	{
		$this->db->from('murid');
		$this->db->where('!EXISTS(SELECT nik FROM `buku` LEFT JOIN `pembayaran_buku` ON `buku`.`id` = `pembayaran_buku`.id_buku WHERE `pembayaran_buku`.nik = `murid`.nik AND `pembayaran_buku`.id_buku = \''.$idbuku.'\')');
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
	public function create_pembayaran_buku($nik, $idbuku, $judul, $jumlah, $periode) {
		
		$data = array(
			'nik'   => $nik,
			'id_buku'   => $idbuku,
			'judul'      => $judul,
			'jumlah'      => $jumlah,
			'periode'      => $periode,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('pembayaran_buku', $data);
		
	}

	public function update_pembayaran_buku($id, $nik, $idbuku, $judul, $jumlah, $periode) {
		
		$data = array(
			'nik'   => $nik,
			'id_buku'   => $idbuku,
			'judul'      => $judul,
			'jumlah'      => $jumlah,
			'periode'      => $periode,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id', $id);
		$this->db->update('pembayaran_buku', $data);
		return $id;
		
	}

	public function delete_pembayaran_buku($id) {
		
		$this->db->where('id', $id);
		$this->db->delete('pembayaran_buku');
		return $id;
		
	}
	
}