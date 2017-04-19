<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

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
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
		$data = new stdClass();

		$outlet = $this->outlet_model->get_outlet_all();
		$data = array('outlet' => $outlet );    

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			$this->load->view('pages/outlet/viewOutlet', $data);
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

		$this->load->helper('form');
		$this->load->library('form_validation');

		// set validation rules
		$this->form_validation->set_rules('nama', 'Nama Outlet', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi Outlet', 'required');
		$this->form_validation->set_rules('notelp', 'No. Telp', 'required');

		if ($this->form_validation->run() === false) {
		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			$this->load->view('pages/outlet/addOutlet');
			$this->load->view('master/jsAdd');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	} else {

		$idoutlet = $this->input->post('idoutlet');
		$nama = $this->input->post('nama');
		$lokasi = $this->input->post('lokasi');
		$notelp = $this->input->post('notelp');

		if ($this->outlet_model->create_outlet($idoutlet, $nama, $lokasi, $notelp)) {

			$success = "creation success";
			$data = array('success' => $success );

			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/outlet/addOutlet', $data);
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
				$this->load->view('pages/outlet/addOutlet');
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
