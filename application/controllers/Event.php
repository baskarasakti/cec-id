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
		$title = 'User Events';

		$event = $this->event_model->get_event_all();
		$data = array('event' => $event );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
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
		$this->form_validation->set_rules('email', 'Email Event', 'trim|required|valid_email|min_length[10]|is_unique[user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');

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

	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'Email Event', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('loginEvent');
			$this->load->view('master/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->event_model->resolve_user_event_login($username, $password)) {
				
				$user_id = $this->event_model->get_user_event_id_from_username($username);
				$user = $this->event_model->get_user_event($user_id);
				
				$newdata = array(
				        'username'  => (string)$user->user_event,
				        'nama_event'=> (string)$user->nama_event,
				        'tanggal'	=> (string)$user->tanggal_event,
				        'lokasi'	=> (string)$user->lokasi_event,
				        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				
				// user login ok
				$this->load->helper('url');
				header('location:'.base_url().'event/dashboard');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('loginEvent', $data);
				$this->load->view('master/footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->helper('url');
				header('location:'.base_url().'event/login');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			$this->load->helper('url');
				header('location:'.base_url().'event/login');
			
		}
		
	}

	public function dashboard()
	{
		// create the data object
		$data = new stdClass();
		$title = 'Event Dashboard';

		$event = $this->event_model->get_event_all();
		$data = array('event' => $event );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigationEvent');
			$this->load->view('event/dashboardEvent', $data);
			$this->load->view('master/jsDashboard');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'event/login');
		}
	}

	public function viewPeserta()
	{
		// create the data object
		$data = new stdClass();
		$nama_event = $this->session->userdata('nama_event');
		$title = 'Peserta '.$nama_event;

		$peserta = $this->event_model->get_peserta_all();
		$data = array('peserta' => $peserta, 'title' => $title );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigationEvent');
			$this->load->view('event/peserta/viewPeserta', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'event/login');
		}
	}

	public function addPeserta()
	{
		// create the data object
		$data = new stdClass();

		$this->load->helper('form');
		$this->load->library('form_validation');

		// set validation rules
		$this->form_validation->set_rules('nama', 'Nama peserta', 'required');
		$this->form_validation->set_rules('alamat', 'Lokasi peserta', 'required');
		$this->form_validation->set_rules('notelp', 'No. Telp', 'required');
		$this->form_validation->set_rules('kategori', 'No. Telp', 'required');
		$this->form_validation->set_rules('kelas', 'No. Telp', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigationEvent');
				$this->load->view('event/peserta/addPeserta');
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {

			//$idpeserta = $this->peserta_model->get_last_id_peserta();
			$idpeserta = $this->input->post('idpeserta');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$notelp = $this->input->post('notelp');
			$kategori = $this->input->post('alamat');
			$kelas = $this->input->post('kelas');

			if ($this->event_model->create_peserta($idpeserta, $nama, $alamat, $notelp, $kategori, $kelas)) {

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigationEvent');
					$this->load->view('event/peserta/addPeserta', $data);
					$this->load->view('master/jsAdd');
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
					$this->load->view('master/navigationEvent');
					$this->load->view('event/peserta/addPeserta');
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function viewCostEvent()
	{
		// create the data object
		$data = new stdClass();
		$nama_event = $this->session->userdata('nama_event');
		$title = 'Operational Cost '.$nama_event;

		$costEvent = $this->event_model->get_costEvent_all();
		$data = array('costEvent' => $costEvent, 'title' => $title );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigationEvent');
			$this->load->view('event/costEvent/viewCostEvent', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'event/login');
		}
	}

	public function addCostEvent()
	{
		// create the data object
		$data = new stdClass();

		$this->load->helper('form');
		$this->load->library('form_validation');

		// set validation rules
		$this->form_validation->set_rules('item', 'Item', 'required');
		$this->form_validation->set_rules('periode', 'periode', 'required');
		$this->form_validation->set_rules('jumlah', 'jumlah cost', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigationEvent');
				$this->load->view('event/costEvent/addCostEvent');
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {

			//$idpeserta = $this->peserta_model->get_last_id_peserta();
			$item = $this->input->post('item');
			$periode = $this->input->post('periode');
			$jumlah = $this->input->post('jumlah');
			$deksripsi = $this->input->post('deskripsi');

			if ($this->event_model->create_costEvent($item, $periode, $jumlah, $deksripsi)) {

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigationEvent');
					$this->load->view('event/costEvent/addCostEvent', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			} else {
			// user creation failed, this should never happen
				$data->error = 'There was a problem creating new cost event. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigationEvent');
					$this->load->view('event/costEvent/addCostEvent');
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function viewRepEvent()
	{
		// create the data object
		$data = new stdClass();
		$nama_event = $this->session->userdata('nama_event');
		$title = 'Report '.$nama_event;

		$event = $this->event_model->get_event_all();
		$data = array('event' => $event, 'title' => $title );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigationEvent');
			$this->load->view('event/repEvent/viewRepEvent', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'event/login');
		}
	}

	public function addRepEvent()
	{
		# code...
	}
}
