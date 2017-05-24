<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->model('opcost_model');
		$this->load->model('pkursus_model');
		$this->load->model('outlet_model');

	}

	public function allReport()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'All Report';
	    $outlet = $this->outlet_model->get_outlet_all();
	    $tahun = $this->input->get('tahun');
	    if ($tahun == "") {
	    	$tahun = date('Y');
	    }
	    //$report = $this->opcost_model->get_report_per_periode();
		$data = array('title' => $title,'outlet'=>$outlet,'tahun'=>$tahun );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/report/allReport');
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function repCost()
	{
	    $data = new stdClass();
	    $title = 'Report Operational Cost';

	    $checked_outlet = $this->input->get('outlet');
    	if ($checked_outlet > 0) {
    		$outlet = $this->outlet_model->get_outlet_all();
    		$operational_cost = $this->opcost_model->get_operational_cost_per_outlet($checked_outlet);
    	} elseif ($this->session->userdata('role_id') > 0) {
    		$checked_outlet = $this->session->userdata('outlet');
    		$operational_cost = $this->opcost_model->get_operational_cost_per_outlet($checked_outlet);
    		$outlet = "";
    	} else {
    		$outlet = $this->outlet_model->get_outlet_all();
    		$operational_cost = $this->opcost_model->get_operational_cost_all();
    	}
    	$data = array('operational_cost' => $operational_cost,'outlet'=>$outlet, 'title' => $title );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/report/repCost', $data);
			$this->load->view('master/delete');
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function repBelum()
	{
		// create the data object
    	$data = new stdClass();
    	$title = 'Report Murid Belum Bayar Kursus';
    	$periode = $this->input->get('periode');
    	if ($periode == "" || $periode == "0") {
    		$periode = date('m-Y');
    	}
    	$murid_belumbayar = $this->pkursus_model->get_murid_belumbayar($periode);
    	$data = array(	'murid_belumbayar' => $murid_belumbayar, 
    					'title' => $title,
    					'periode' => $periode );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/report/repBelum', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function repBuku()
	{
		$data = new stdClass();
	    $title = 'Report Belum Bayar Buku';
		$data = array('title' => $title);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/report/repBuku');
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function add()
	{
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
	}
}
