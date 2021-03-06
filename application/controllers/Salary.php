<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

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
		$this->load->model('salary_model');
		$this->load->model('staff_model');
		$this->load->model('outlet_model');

	}

	public function index()
	{
		// create the data object
		$data = new stdClass();
		$title = 'Salary';
		$checked_outlet = $this->input->get('outlet');
		$outlet = $this->outlet_model->get_outlet_all();
		
		if ($checked_outlet > 0) {
			$salary = $this->salary_model->get_salary_outlet($checked_outlet);
		} elseif ($this->session->userdata('role_id') > 0) {
			$checked_outlet = $this->session->userdata('outlet');
			$salary = $this->salary_model->get_salary_outlet($checked_outlet);
		} else {
			$salary = $this->salary_model->get_salary_all();
		}
		$data = array('salary' => $salary, 'title' => $title, 'outlet' => $outlet );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/salary/viewSalary', $data);
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
		$nik = $this->input->get('nik');
		if ($nik != "") {
			$staff = $this->staff_model->get_staff($nik);
		} else {
			$staff = "";
		}
		$data = array('staff' => $staff);
		//var_dump($data);

		$this->load->helper('form');
		$this->load->library('form_validation');

    	// set validation rules
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gajipokok', 'Gaji Pokok', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/salary/addSalary', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('pages/salary/jsSalary');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$nik = $this->input->post('nik');
			$gajipokok = $this->input->post('gajipokok');
			$bonus = $this->input->post('bonus');
			$tgl = $this->input->post('tgl');

			if ($this->salary_model->create_salary($nik, $gajipokok, $bonus, $tgl)) {

				$success = "creation success";
				$staff = $this->staff_model->get_staff($nik);
				$data = array('success' => $success, 'staff' => $staff, 'nik' => $nik );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/salary/addSalary', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('pages/salary/jsSalary');
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
					$this->load->view('pages/salary/addSalary', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('pages/salary/jsSalary');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function edit($nik)
	{
		 // create the data object
		$data = new stdClass();
		$id = $this->input->get('id');
		$salary = $this->salary_model->get_salary($id);
		if ($nik != "") {
			$staff = $this->staff_model->get_staff_salary($nik);
		} else {
			$staff = "";
		}
		$data = array('staff' => $staff, 'salary' => $salary);
		//var_dump($data);

		$this->load->helper('form');
		$this->load->library('form_validation');

    	// set validation rules
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('gajipokok', 'Gaji Pokok', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/salary/editSalary', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('pages/salary/jsSalary');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$id = $this->input->post('id');
			$nik = $this->input->post('nik');
			$gajipokok = $this->input->post('gajipokok');
			$bonus = $this->input->post('bonus');
			$tgl = $this->input->post('tgl');

			if ($this->salary_model->update_salary($id, $gajipokok, $bonus, $tgl)) {

				$success = "creation success";
				$staff = $this->staff_model->get_staff($nik);
				$salary = $this->salary_model->get_salary($id);
				$data = array('success' => $success, 'staff' => $staff, 'nik' => $nik, 'salary' => $salary );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/salary/editSalary', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('pages/salary/jsSalary');
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
					$this->load->view('pages/salary/editSalary', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('pages/salary/jsSalary');
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
		if ($this->salary_model->delete_salary($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'salary');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}