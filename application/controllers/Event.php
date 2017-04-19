<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$this->load->model('event_model');

	}


	public function userView()
	{
		// create the data object
		$data = new stdClass();

		$event = $this->event_model->get_event_all();
		$data = array('event' => $event );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			$this->load->view('pages/userEvent/viewUserEvent', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function userAdd()
	{
		 // create the data object
		$data = new stdClass();

		$this->load->helper('form');
		$this->load->library('form_validation');

    	// set validation rules
		$this->form_validation->set_rules('nama', 'Nama Event', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Event', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi Event', 'required');
		$this->form_validation->set_rules('email', 'Email Event', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === false) {

			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/userEvent/addUserEvent');
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {

			$idevent = $this->input->post('idevent');
			$nama = $this->input->post('nama');
			$tgl = $this->input->post('tgl');
			$lokasi = $this->input->post('lokasi');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			if ($this->event_model->create_event($idevent, $nama, $tgl, $lokasi, $email, $password)) {

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/userEvent/addUserEvent', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        // user creation failed, this should never happen
				$data->error = 'There was a problem creating new event. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/userEvent/addUserEvent');
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
