<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranBuku extends CI_Controller {

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
		$this->load->model('pbuku_model');
		$this->load->model('buku_model');
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
    	$data = new stdClass();
    	$title = 'Pembayaran Buku';
    	$outlet = $this->input->get('outlet');
    	$outlet_lists = $this->outlet_model->get_outlet_all();
    	if ($outlet > 0) {
    		$pembayaran_buku = $this->pbuku_model->get_pembayaran_buku_per_outlet($outlet);
    	} else {
    		$pembayaran_buku = $this->pbuku_model->get_pembayaran_buku_all();
    	}
    	$data = array('pembayaran_buku' => $pembayaran_buku, 'title' => $title, 'outlet' => $outlet_lists ); 

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/pembayaranBuku/viewPembayaranBuku', $data);
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
	    $buku = $this->buku_model->get_buku_all();
	    $data = array('buku' => $buku);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
    	$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[3]');
    	$this->form_validation->set_rules('judul', 'Judul', 'required');
    	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    	$this->form_validation->set_rules('periode', 'Periode', 'required');

    	if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/pembayaranBuku/addPembayaranBuku', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$nik = $this->input->post('nik');
			$temp_buku = $this->input->post('judul');
			$tempss = explode('-', $temp_buku);
			$idbuku = $tempss[0];
			$judul = $tempss[1];
			$jumlah = $this->input->post('jumlah');
			$periode = $this->input->post('periode');

			if ($this->pbuku_model->create_pembayaran_buku($nik, $idbuku, $judul, $jumlah, $periode)) {
				$success = "creation success";
	    		$buku = $this->buku_model->get_buku_all();
		        $data = array('success' => $success, 'buku' => $buku );

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
		          	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranBuku/addPembayaranBuku', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			} else {
				// user creation failed, this should never happen
		        $data->error = 'There was a problem creating new pembayaran buku. Please try again.';

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
			       	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranBuku/addPembayaranBuku', $data);
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
	    $buku = $this->buku_model->get_buku_all();
	    $pbuku = $this->pbuku_model->get_pembayaran_buku($id);
	    $data = array('buku' => $buku, 'pembayaran_buku' => $pbuku);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
    	$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[3]');
    	$this->form_validation->set_rules('judul', 'Judul', 'required');
    	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    	$this->form_validation->set_rules('periode', 'Periode', 'required');

    	if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/pembayaranBuku/editPembayaranBuku', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$nik = $this->input->post('nik');
			$temp_buku = $this->input->post('judul');
			$tempss = explode('-', $temp_buku);
			$idbuku = $tempss[0];
			$judul = $tempss[1];
			$jumlah = $this->input->post('jumlah');
			$periode = $this->input->post('periode');

			if ($this->pbuku_model->update_pembayaran_buku($id, $nik, $idbuku, $judul, $jumlah, $periode)) {
				$success = "update success";
	    		$buku = $this->buku_model->get_buku_all();
	    		$pbuku = $this->pbuku_model->get_pembayaran_buku($id);
		        $data = array('success' => $success, 'buku' => $buku, 'pembayaran_buku' => $pbuku );

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
		          	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranBuku/editPembayaranBuku', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			} else {
				// user creation failed, this should never happen
		        $data->error = 'There was a problem creating new pembayaran buku. Please try again.';

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
			       	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/pembayaranBuku/editPembayaranBuku', $data);
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
		if ($this->pbuku_model->delete_pembayaran_buku($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'pembayaranBuku');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}
