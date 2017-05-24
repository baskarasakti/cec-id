<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranKursus extends CI_Controller {

	
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
		$this->load->model('pkursus_model');
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
    	$data = new stdClass();
    	$title = 'Pembayaran Kursus';
    	$outlet = $this->input->get('outlet');
    	$outlet_lists = $this->outlet_model->get_outlet_all();
    	if ($outlet > 0) {
    		$pembayaran_kursus = $this->pkursus_model->get_pembayaran_kursus_per_outlet($outlet);
    	} else {
    		$pembayaran_kursus = $this->pkursus_model->get_pembayaran_kursus_all();
    	}
    	$data = array('pembayaran_kursus' => $pembayaran_kursus, 'title' => $title, 'outlet' => $outlet_lists ); 

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/pembayaranKursus/viewPembayaranKursus', $data);
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

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
    	$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[3]');
    	$this->form_validation->set_rules('periode', 'Periode', 'required');
    	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    	$this->form_validation->set_rules('Diskon', 'Diskon', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/pembayaranKursus/addPembayaranKursus', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$nik = $this->input->post('nik');
			$periode = $this->input->post('periode');
			$jumlah = $this->input->post('jumlah');
			$jumlah = $this->input->post('diskon');

			if ($this->pkursus_model->create_pembayaran_kursus($nik, $periode, $jumlah, $diskon)) {
				$success = "creation success";
		        $data = array('success' => $success );

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
		          	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranKursus/addPembayaranKursus', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			} else {
				// user creation failed, this should never happen
		        $data->error = 'There was a problem creating new pembayaran kursus. Please try again.';

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
			       	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranKursus/addPembayaranKursus', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			}
		}
	}

	public function edit($id)
	{
		// create the data object
	    $data = new stdClass();
	    $pembayaran_kursus = $this->pkursus_model->get_pembayaran_kursus($id);
	    $data = array('pembayaran_kursus' => $pembayaran_kursus);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
    	$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[3]');
    	$this->form_validation->set_rules('periode', 'Periode', 'required');
    	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    	$this->form_validation->set_rules('diskon', 'Diskon', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/pembayaranKursus/editPembayaranKursus', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$nik = $this->input->post('nik');
			$periode = $this->input->post('periode');
			$jumlah = $this->input->post('jumlah');
			$diskon = $this->input->post('diskon');

			if ($this->pkursus_model->update_pembayaran_kursus($id, $nik, $periode, $jumlah, $diskon)) {
				$success = "update success";
	    		$pembayaran_kursus = $this->pkursus_model->get_pembayaran_kursus($id);
		        $data = array('success' => $success, 'pembayaran_kursus' => $pembayaran_kursus );

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
		          	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranKursus/editPembayaranKursus', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			} else {
				// user creation failed, this should never happen
		        $data->error = 'There was a problem creating new pembayaran kursus. Please try again.';

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
			       	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranKursus/editPembayaranKursus', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			}
		}
	}

	public function delete($id)
	{
		//$id = $this->input->get('id');
		if ($this->pkursus_model->delete_pembayaran_kursus($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'pembayaranKursus');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}
