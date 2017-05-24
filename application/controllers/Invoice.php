<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	
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
    	$this->load->model('murid_model');
    	$this->load->model('staff_model');
    	$this->load->model('pkursus_model');
    	$this->load->model('pbuku_model');
    	$this->load->model('opcost_model');

	}

	public function index()
	{
		$data = new stdClass();
		$nik = $this->input->get('nik');
		$murid = $this->murid_model->get_murid($nik);
		$data = array('murid' => $murid);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/invoice/invoice', $data);
			//$this->load->view('pages/invoice/invoiceJS');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function staff()
	{
		$data = new stdClass();
		$nik = $this->input->get('nik');
		$staff = $this->staff_model->get_staff($nik);
		$data = array('staff' => $staff);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/invoice/invoicestaff', $data);
			//$this->load->view('pages/invoice/invoiceJS');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function report()
	{
		$data = new stdClass();
		$periode = $this->input->get('periode');

		$pembayaran_kursus = $this->pkursus_model->get_pembayaran_kursus_periode($periode);
		$pembayaran_buku = $this->pbuku_model->get_pembayaran_buku_periode($periode);
		$operational_cost = $this->opcost_model->get_operational_cost_per_periode($periode);
		$murid_belumbayar = $this->pkursus_model->get_murid_belumbayar_count($periode);
		$murid_belumbayar_total = $this->pkursus_model->get_murid_belumbayar_total($periode);

		$total_income = $pembayaran_kursus->jumlah+$pembayaran_buku->jumlah;
		$amount_get = $total_income-$operational_cost->jumlah;

		$data = array(	
			'pembayaran_kursus'=>$pembayaran_kursus,
			'pembayaran_buku'=>$pembayaran_buku,
			'operational_cost'=>$operational_cost,
			'murid_belumbayar'=>$murid_belumbayar,
			'murid_belumbayar_total'=>$murid_belumbayar_total,
			'total_income'=>$total_income,
			'amount_get'=>$amount_get);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/invoice/invoicereport', $data);
			//$this->load->view('pages/invoice/invoiceJS');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function reportOutlet()
	{
		$data = new stdClass();
		$periode = $this->input->get('periode');
		$outlet = $this->input->get('outlet');

		$pembayaran_kursus = $this->pkursus_model->get_pembayaran_kursus_periode_outlet($periode,$outlet);
		$pembayaran_buku = $this->pbuku_model->get_pembayaran_buku_periode_outlet($periode,$outlet);
		$operational_cost = $this->opcost_model->get_operational_cost_per_periode_outlet($periode,$outlet);
		$murid_belumbayar = $this->pkursus_model->get_murid_belumbayar_outlet_count($outlet,$periode);
		$murid_belumbayar_total = $this->pkursus_model->get_murid_belumbayar_outlet_total($outlet,$periode);

		$total_income = $pembayaran_kursus->jumlah+$pembayaran_buku->jumlah;
		$amount_get = $total_income-$operational_cost->jumlah;

		$data = array(	
			'pembayaran_kursus'=>$pembayaran_kursus,
			'pembayaran_buku'=>$pembayaran_buku,
			'operational_cost'=>$operational_cost,
			'murid_belumbayar'=>$murid_belumbayar,
			'murid_belumbayar_total'=>$murid_belumbayar_total,
			'total_income'=>$total_income,
			'amount_get'=>$amount_get);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/invoice/invoicereport', $data);
			//$this->load->view('pages/invoice/invoiceJS');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}
}
