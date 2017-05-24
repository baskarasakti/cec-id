<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {

		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('staff_model');
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
		$data = new stdClass();
		$title = 'Staff';
		$checked_outlet = $this->input->get('outlet');
		$outlet = $this->outlet_model->get_outlet_all();
		
		if ($checked_outlet > 0) {
			$staff = $this->staff_model->get_staff_outlet($checked_outlet);
		} elseif ($this->session->userdata('role_id') > 0) {
			$checked_outlet = $this->session->userdata('outlet');
			$staff = $this->staff_model->get_staff_outlet($checked_outlet);
		} else {
			$staff = $this->staff_model->get_staff_all();
		}
		$data = array('staff' => $staff, 'title' => $title, 'outlet' => $outlet );    

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/staff/viewStaff', $data);
			$this->load->view('master/delete');
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
		$outlet = $this->outlet_model->get_outlet_all();
		$data = array('outlet' => $outlet);
		

		$this->load->helper('form');
		$this->load->library('form_validation');

    	// set validation rules
		$this->form_validation->set_rules('namadepan', 'Nama Depan', 'required');
		$this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
		$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|min_length[7]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

		if ($this->form_validation->run() === false) {

			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/staff/addStaff', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {

			$idoutlet = $this->input->post('idoutlet');
			$idoutlets = sprintf('%02d', $idoutlet);
			$last_nik = $this->staff_model->get_last_nik_staff($idoutlets);
			$nik = "S".$idoutlets.$last_nik;
			
			$namadepan = $this->input->post('namadepan');
			$namabelakang = $this->input->post('namabelakang');
			$tgllahir = $this->input->post('tgllahir');
			$gender = $this->input->post('gender');
			$alamat = $this->input->post('alamat');
			$notelp = $this->input->post('notelp');
			$jabatan = $this->input->post('jabatan');

			if ($this->staff_model->create_staff($nik, $namadepan, $namabelakang, $tgllahir, $gender, $alamat, $notelp, $jabatan, $idoutlet)) {

				$success = "creation success";
				$outlet = $this->outlet_model->get_outlet_all();
				$data = array('success' => $success,'outlet' => $outlet );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/staff/addStaff', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        // user creation failed, this should never happen
				$data->error = 'There was a problem creating new staff. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/staff/addStaff', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}

	}

	public function edit($nik)
	{
		 // create the data object
		$data = new stdClass();
		$staff = $this->staff_model->get_staff($nik);
		$outlet = $this->outlet_model->get_outlet_all();
		$data = array('staff' =>$staff, 'outlet' => $outlet);
		

		$this->load->helper('form');
		$this->load->library('form_validation');

    	// set validation rules
		$this->form_validation->set_rules('namadepan', 'Nama Depan', 'required');
		$this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
		$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|min_length[7]');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

		if ($this->form_validation->run() === false) {

			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/staff/editStaff', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {

			//$nik = $this->input->post('nik');
			$namadepan = $this->input->post('namadepan');
			$namabelakang = $this->input->post('namabelakang');
			$tgllahir = $this->input->post('tgllahir');
			$gender = $this->input->post('gender');
			$alamat = $this->input->post('alamat');
			$notelp = $this->input->post('notelp');
			$jabatan = $this->input->post('jabatan');
			$outlet = $this->input->post('outlet');

			if ($this->staff_model->update_staff($nik, $namadepan, $namabelakang, $tgllahir, $gender, $alamat, $notelp, $jabatan, $outlet)) {

				$success = "update success";
				$staff = $this->staff_model->get_staff($nik);
				$outlet = $this->outlet_model->get_outlet_all();
				$data = array('success' => $success, 'staff' => $staff, 'outlet' => $outlet );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/staff/editStaff', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        // user creation failed, this should never happen
				$data->error = 'There was a problem creating new staff. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/staff/editStaff', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}

	}

	public function delete($nik)
	{
		//$id = $this->input->get('id');
		if ($this->staff_model->delete_staff($nik)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'staff');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}

