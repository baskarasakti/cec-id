<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('murid_model');
		$this->load->model('pkursus_model');
		$this->load->model('opcost_model');
		$this->load->model('staff_model');
		$this->load->model('user_model');
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
    	$data = new stdClass();
    	$checked_outlet = $this->session->userdata('outlet');
    	if ($checked_outlet > 0) {
    		$murid = $this->murid_model->get_murid_outlet_count($checked_outlet);
    		$murid_belumbayar = $this->pkursus_model->get_murid_belumbayar_outlet_count($checked_outlet, date('m-Y'));
    		$staff = $this->staff_model->get_staff_outlet_count($checked_outlet);
    		$operational_cost = $this->opcost_model->get_operational_cost_outlet($checked_outlet);
    		$murid_per_level = $this->murid_model->get_murid_per_outlet_per_level($checked_outlet)->result();
    	} else {
    		$murid = $this->murid_model->get_murid_count();
    		$murid_belumbayar = $this->pkursus_model->get_murid_belumbayar_count("");
    		$staff = $this->staff_model->get_staff_count();
    		$operational_cost = $this->opcost_model->get_operational_cost_per_month()->result();
    		$murid_per_level = "";
    	}
    	$user = $this->user_model->get_user_count();
    	$outlet = $this->outlet_model->get_outlet_count();
    	
    	$data = array(	'murid'=>$murid, 
    					'murid_belumbayar' => $murid_belumbayar, 
    					'murid_per_level' => $murid_per_level, 
    					'operational_cost' => $operational_cost,
    					'staff' => $staff,
    					'user' => $user,
    					'outlet' => $outlet);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			if ($this->session->userdata('role_id') == 0) {
				$this->load->view('pages/dashboardOwner', $data);
				$this->load->view('master/jsDashboardOwner');
			} else {
				$this->load->view('pages/dashboardAdmin', $data);
				$this->load->view('master/jsDashboardAdmin');
			}
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}
}
