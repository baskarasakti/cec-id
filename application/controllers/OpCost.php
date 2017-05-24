<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpCost extends CI_Controller {

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
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
    	$data = new stdClass();

    	if ($this->session->userdata('role') > 0) {
    		$outlet = $this->session->userdata('outlet');
    		$operational_cost = $this->outlet_model->get_operational_cost_per_outlet($outlet);
    	} else {
    		$outlet = $this->outlet_model->get_outlet_all();
    		$operational_cost = $this->opcost_model->get_operational_cost_all();
    	}
    	$data = array('operational_cost' => $operational_cost,'outlet'=>$outlet ); 

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			$this->load->view('pages/opCost/viewCost', $data);
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
	    $data = array('outlet'=>$outlet);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
    	$this->form_validation->set_rules('item', 'Item', 'required|min_length[3]');
    	$this->form_validation->set_rules('periode', 'Periode', 'required');
    	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    	$this->form_validation->set_rules('outlet', 'Outlet', 'required');

    	if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/opCost/addCost', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$item = $this->input->post('item');
			$periode = $this->input->post('periode');
			$jumlah = $this->input->post('jumlah');
			$deskripsi = $this->input->post('deskripsi');
			$outlet = $this->input->post('outlet');

			if ($this->opcost_model->create_operational_cost($item, $periode, $jumlah, $deskripsi, $outlet)) {
				$success = "creation success";
				$outlet = $this->outlet_model->get_outlet_all();
		        $data = array('success' => $success, 'outlet'=>$outlet );

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
		          	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/opCost/addCost', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			} else {
				// user creation failed, this should never happen
		        $data->error = 'There was a problem creating new operational cost. Please try again.';

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
			       	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/opCost/addCost', $data);
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
	    $op_cost = $this->opcost_model->get_operational_cost($id);
	    $outlet = $this->outlet_model->get_outlet_all();
	    $data = array('op_cost' => $op_cost, 'outlet'=>$outlet);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
    	$this->form_validation->set_rules('item', 'Item', 'required|min_length[3]');
    	$this->form_validation->set_rules('periode', 'Periode', 'required');
    	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
    	$this->form_validation->set_rules('outlet', 'Outlet', 'required');

    	if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/opCost/editCost', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$item = $this->input->post('item');
			$periode = $this->input->post('periode');
			$jumlah = $this->input->post('jumlah');
			$deskripsi = $this->input->post('deskripsi');
			$outlet = $this->input->post('outlet');

			if ($this->opcost_model->update_operational_cost($id, $item, $periode, $jumlah, $deskripsi, $outlet)) {
				$success = "update success";
	    		$op_cost = $this->opcost_model->get_operational_cost($id);
	    		$outlet = $this->outlet_model->get_outlet_all();
		        $data = array('success' => $success, 'op_cost' => $op_cost, 'outlet'=>$outlet );

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
		          	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/opCost/editCost', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
		        } else {
		          $this->load->helper('url');
		          header('location:'.base_url().'user/login');
		        }
			} else {
				// user creation failed, this should never happen
		        $data->error = 'There was a problem creating new operational cost. Please try again.';

		        $this->load->library('session');
		        if ($this->session->has_userdata('username')) {
			       	$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/opCost/editCost', $data);
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
		if ($this->opcost_model->delete_operational_cost($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'report/repCost');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}
