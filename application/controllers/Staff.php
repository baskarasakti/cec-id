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
	public function index()
	{
		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			$this->load->view('pages/staff/viewStaff');
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
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
		$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|min_length[7]');
		$this->form_validation->set_rules('kategori', 'Jabatan', 'required');

		if ($this->form_validation->run() === false) {

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			$this->load->view('pages/staff/addStaff');
			$this->load->view('master/jsAdd');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	} else {

      $namadepan = $this->input->post('namadepan');
      $namadepan = $this->input->post('namabelakang');
      $tgllahir = $this->input->post('tgllahir');
      $gender = $this->input->post('gender');
      $alamat = $this->input->post('alamat');
      $notelp = $this->input->post('notelp');
      $kategori = $this->input->post('kategori');
      $level = $this->input->post('level');
      $pajak = $this->input->post('pajak');
      $price = $this->input->post('price');

	}
}
