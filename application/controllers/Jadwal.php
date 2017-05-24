<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct() {
    
	    parent::__construct();
	    $this->load->library(array('session'));
	    $this->load->helper(array('url'));
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->model('jadwal_model');
	    $this->load->model('murid_model');
	    $this->load->model('outlet_model');
	    
	 }

	public function index()
	{
		$data = new stdClass();
		$title = 'Jadwal Murid';
		$checked_outlet = $this->input->get('outlet');

		if ($this->session->userdata('role_id') > 0) {
	      $checked_outlet = $this->session->userdata('outlet');
	    }

	    if ($checked_outlet > 0) {
	      $jadwal = $this->jadwal_model->get_jadwal_per_outlet($checked_outlet);
	    } else {
	      $jadwal = $this->jadwal_model->get_jadwal_all();
	    }

	    $outlet = $this->outlet_model->get_outlet_all();
		$data = array('jadwal' => $jadwal, 'outlet' => $outlet, 'title' => $title);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/jadwal/viewJadwal', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function add()
	{
		// create the data object
	    $data = new stdClass();
	    $nik = $this->input->get('nik');
	    $nama = $this->input->get('nama');
	    $data = array('nik' => $nik, 'nama' => $nama);

	    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
	    $nama = $this->input->post('nama');

	    if ($this->form_validation->run() === false) {

		    $this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/jadwal/addJadwal', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}

	    } else {

	    	$nama = $this->input->post('nama');
	    	$nik = $this->input->post('nik');
	    	$senin = $this->input->post('senin');
	    	$selasa = $this->input->post('selasa');
	    	$rabu = $this->input->post('rabu');
	    	$kamis = $this->input->post('kamis');
	    	$jumat = $this->input->post('jumat');
	    	$sabtu = $this->input->post('sabtu');
	    	$minggu = $this->input->post('minggu');

	    	if ($this->jadwal_model->create_jadwal($nik, $nama, $senin, $selasa, $rabu, $kamis, $jumat, $sabtu, $minggu)) {

	        $success = "creation success";
	        $data = array('success' => $success );

	        $this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/jadwal/addJadwal', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}

	      } else {

	        // user creation failed, this should never happen
	        $data->error = 'There was a problem creating new murid. Please try again.';

	        $this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/jadwal/addJadwal', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
	      }
		}
	}

	public function edit()
	{
		// create the data object
	    $data = new stdClass();
	    $nik = $this->input->get('nik');
	    $nama = $this->input->get('nama');
	    $jadwal = $this->jadwal_model->get_jadwal($nik);
	    $data = array('nik' => $nik, 'nama' => $nama, 'jadwal'=> $jadwal);

	    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
	    $nama = $this->input->post('nama');

	    if ($this->form_validation->run() === false) {

		    $this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/jadwal/editJadwal', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}

	    } else {

	    	$nama = $this->input->post('nama');
	    	$nik = $this->input->post('nik');
	    	$senin = $this->input->post('senin');
	    	$selasa = $this->input->post('selasa');
	    	$rabu = $this->input->post('rabu');
	    	$kamis = $this->input->post('kamis');
	    	$jumat = $this->input->post('jumat');
	    	$sabtu = $this->input->post('sabtu');
	    	$minggu = $this->input->post('minggu');

	    	if ($this->jadwal_model->update_jadwal($nik, $nama, $senin, $selasa, $rabu, $kamis, $jumat, $sabtu, $minggu)) {

	        $success = "creation success";
	        $data = array('success' => $success );

	        $this->load->library('session');
			if ($this->session->has_userdata('username')) {
				header('location:'.base_url().'jadwal');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}

	      } else {

	        // user creation failed, this should never happen
	        $data->error = 'There was a problem creating new murid. Please try again.';

	        $this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/jadwal/editJadwal', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
	      }
		}
	}
}
