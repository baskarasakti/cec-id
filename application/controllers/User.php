<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {
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
		$this->load->model('user_model');
		$this->load->model('role_model');
		$this->load->model('outlet_model');
		
	}
	
	
	public function index() {
		
		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		$outlet = $this->outlet_model->get_outlet_all();
		$data = array('outlet' => $outlet);
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|min_length[10]|is_unique[user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('user_level', 'User Level', 'required');
		$this->form_validation->set_rules('outlet', 'Outlet', 'required');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/user/addUser', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$name = $this->input->post('name');
			$user_level = $this->input->post('user_level');
			$outlet = $this->input->post('outlet');
			$password = $this->input->post('password');
			$password = $this->input->post('outlet');
			
			if ($this->user_model->create_user($username, $user_level, $password, $name, $outlet)) {
				
				$success = "creation success";
				$outlet = $this->outlet_model->get_outlet_all();
				$data = array('success' => $success, 'outlet' => $outlet );
				// user creation ok
				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/user/addUser', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating new account. Please try again.';
				
				// send error to the view
				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/user/addUser', $data);
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
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('login');
			$this->load->view('master/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user = $this->user_model->get_user($user_id);
				$role = $this->role_model->get_role($user->flag);
				
				$newdata = array(
					'username'  => (string)$user->username,
					'name'		=> (string)$user->name,
					'outlet'	=> (string)$user->outlet,
					'role'		=> (string)$role->rolename,
					'role_id'	=> (string)$role->id,
					'logged_in' => TRUE
					);

				$this->session->set_userdata($newdata);
				
				// user login ok
				$this->load->helper('url');
				header('location:'.base_url().'dashboard');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('login', $data);
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
			header('location:'.base_url().'user/login');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
			
		}
		
	}

	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function lists() {
		// create the data object
		$data = new stdClass();
		$title = 'User Lists';

		$user = $this->user_model->get_user_all();
		$data = array('user' => $user, 'title' => $title );    

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/user/viewUser', $data);
			$this->load->view('master/delete');
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function edit($id) {
		
		// create the data object
		$data = new stdClass();
		//$id = $this->input->get('id');
		$user = $this->user_model->get_user($id);
		$outlet = $this->outlet_model->get_outlet_all();
		$data = array('user' => $user, 'outlet' => $outlet);

		if($this->input->post('username') != $user->username) {
		   $is_unique =  '|is_unique[users.user_name]';
		} else {
		   $is_unique =  '';
		}

		if($this->input->post('password') != "") {
		   $required =  '|required';
		} else {
		   $required =  '';
		}
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|min_length[10]'.$is_unique, array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]'.$required);
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|min_length[6]|matches[password]'.$required);
		$this->form_validation->set_rules('user_level', 'User Level', 'required');
		$this->form_validation->set_rules('outlet', 'Outlet', 'required');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/user/editUser', $data);
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$name = $this->input->post('name');
			$user_level = $this->input->post('user_level');
			$outlet = $this->input->post('outlet');
			$password = $this->input->post('password');
			$password = $this->input->post('outlet');
			
			if ($this->user_model->update_user($id, $username, $user_level, $password, $name, $outlet)) {
				
				$success = "creation success";
				$user = $this->user_model->get_user($id);
				$outlet = $this->outlet_model->get_outlet_all();
				$data = array('success' => $success, 'user' => $user, 'outlet' => $outlet );
				// user creation ok
				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/user/editUser', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating new account. Please try again.';
				
				// send error to the view
				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/user/editUser', $data);
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
		if ($this->user_model->delete_user($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'user/lists');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}