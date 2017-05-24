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
	public function get_murid($nik) {
		
		$this->db->from('murid');
		$this->db->where('nik', $nik);
		$this->db->join('level', 'murid.level = level.id');
		return $this->db->get()->row();
		
	}

	public function get_murid_per_outlet($outlet) {
		
		$this->db->from('murid');
		$this->db->where('id_outlet', $outlet);
		$this->db->join('jadwal', 'murid.nik = jadwal.nik_jadwal', 'left');
		$this->db->join('level', 'murid.level = level.id');
		return $this->db->get();
		
	}

	public function get_murid_per_outlet_per_level($outlet) {
		
		$this->db->select('count(*) as murid');
		$this->db->select('levels');
		$this->db->from('murid');
		$this->db->where('id_outlet', $outlet);
		$this->db->join('level', 'murid.level = level.id');
		$this->db->group_by('level');
		return $this->db->get();
		
	}

	public function get_murid_count() {
		
		$this->db->from('murid');
		$this->db->join('jadwal', 'murid.nik = jadwal.nik_jadwal', 'left');
		$this->db->join('level', 'murid.level = level.id');
		$count = $this->db->count_all_results();
		return $count;
		
	}

	public function get_murid_outlet_count($outlet) {
		
		$this->db->from('murid');
		$this->db->where('id_outlet', $outlet);
		$this->db->join('jadwal', 'murid.nik = jadwal.nik_jadwal', 'left');
		$this->db->join('level', 'murid.level = level.id');
		$count = $this->db->count_all_results();
		return $count;
		
	}

	public function get_murid_all() {
		
		$this->db->from('murid');
		$this->db->join('jadwal', 'murid.nik = jadwal.nik_jadwal', 'left');
		$this->db->join('level', 'murid.level = level.id');
		return $this->db->get();
		
	}

	public function get_last_nik($outlet,$cat,$level) {
		
		$temp_nik = $outlet.$cat.$level;
		$this->db->from('murid');
		$this->db->like('nik', $temp_nik, 'after');
		$this->db->select('nik')->order_by('id',"desc");
		$temps = $this->db->get()->first_row();
		if ($temps != "") {
			$temp = $temps->nik;
			$number = substr($temp, 5);
			$int = (int)$number;
		} else {
			$int = 0;
		}
		$last_nik = $int+1;
		$res = sprintf('%05d', $last_nik);
		return $res;
		
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
	public function create_murid($nik, $nama, $tgllahir, $gender, $alamat, $notelp, $kategori, $level, $pajak, $price, $outlet) {
		
		$data = array(
			'nik'   => $nik,
			'nama'   => $nama,
			'tgllahir'      => $tgllahir,
			'gender'      => $gender,
			'alamat'      => $alamat,
			'notelp'   => $notelp,
			'kategori' => $kategori,
			'level' => $level,
			'pajak' => $pajak,
			'price' => $price,
			'id_outlet' => $outlet,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('murid', $data);
		
	}
	
	public function update_murid($nik, $nama, $tgllahir, $gender, $alamat, $notelp, $pajak, $price, $outlet,$keluar) {
		
		$data = array(
			'nama'   => $nama,
			'tgllahir'      => $tgllahir,
			'gender'      => $gender,
			'alamat'      => $alamat,
			'notelp'   => $notelp,
			'pajak' => $pajak,
			'price' => $price,
			'id_outlet' => $outlet,
			'keluar' => $keluar,
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('nik', $nik);
		$this->db->update('murid', $data);
		return $nik;
		
	}
}