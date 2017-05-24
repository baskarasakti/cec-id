<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	
	/**
   * __construct function.
   * 
   * @access public
   * @return void
   */
	public function __construct() {

		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('buku_model');

	}

	public function index()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Master Buku';

	    $buku = $this->buku_model->get_buku_all();
	    $data = array('buku' => $buku, 'title' => $title );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/buku/viewBuku', $data);
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
	    //$data = array('buku' => $buku);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
	    $this->form_validation->set_rules('tahun', 'Tahun Terbitan', 'required|min_length[4]');
	    $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
	    $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
	    $this->form_validation->set_rules('harga', 'Harga', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/buku/addBuku');
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$judul = $this->input->post('judul');
			$tahun = $this->input->post('tahun');
			$pengarang = $this->input->post('pengarang');
			$penerbit = $this->input->post('penerbit');
			$harga = $this->input->post('harga');

			if ($this->buku_model->create_buku($judul, $tahun, $pengarang, $penerbit, $harga)) {

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/buku/addBuku', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem creating new buku. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/buku/addBuku', $data);
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
	    $id = $this->input->get('id');
    	$buku = $this->buku_model->get_buku($id);
    	$data = array('buku' => $buku);
    	//var_dump($data);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
	    $this->form_validation->set_rules('tahun', 'Tahun Terbitan', 'required|min_length[4]');
	    $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
	    $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
	    $this->form_validation->set_rules('harga', 'Harga', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/buku/editBuku', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$id = $this->input->post('id');
			$judul = $this->input->post('judul');
			$tahun = $this->input->post('tahun');
			$pengarang = $this->input->post('pengarang');
			$penerbit = $this->input->post('penerbit');
			$harga = $this->input->post('harga');

			if ($this->buku_model->update_buku($id, $judul, $tahun, $pengarang, $penerbit, $harga)) {

				$success = "update success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					header('location:'.base_url().'buku');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem updating buku. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/buku/editBuku', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}
	public function delete()
	{
		// create the data object
	    $data = new stdClass();
	    $id = $this->input->get('id');
    	$buku = $this->buku_model->delete_buku($id);
    	//$data = array('buku' => $buku);
    	//var_dump($data);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			header('location:'.base_url().'buku');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}
}
