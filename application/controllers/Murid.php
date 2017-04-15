<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {
  
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
    
  }

  public function index()
  {
    $this->load->library('session');
    if ($this->session->has_userdata('username')) {
      $this->load->helper('url');
      $this->load->view('master/header');
      $this->load->view('master/navigation');
      $this->load->view('pages/murid/viewMurid');
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
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
    $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|min_length[7]');
    $this->form_validation->set_rules('kategori', 'Category', 'required');
    $this->form_validation->set_rules('level', 'Level', 'required');
    $this->form_validation->set_rules('pajak', 'Pajak', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required');

    if ($this->form_validation->run() === false) {

      $this->load->library('session');
      if ($this->session->has_userdata('username')) {
        $this->load->helper('url');
        $this->load->view('master/header');
        $this->load->view('master/navigation');
        $this->load->view('pages/murid/addMurid', $data);
        $this->load->view('pages/murid/addMuridjs');
        $this->load->view('master/footer');
      } else {
        $this->load->helper('url');
        header('location:'.base_url().'user/login');
      }

    } else {

      $nama = $this->input->post('nama');
      $tgllahir = $this->input->post('tgllahir');
      $gender = $this->input->post('gender');
      $alamat = $this->input->post('alamat');
      $notelp = $this->input->post('notelp');
      $kategori = $this->input->post('kategori');
      $level = $this->input->post('level');
      $pajak = $this->input->post('pajak');
      $price = $this->input->post('price');

      if ($this->murid_model->create_murid($nama, $tgllahir, $gender, $alamat, $notelp, $kategori, $level, $pajak, $price)) {

        $success = "creation success";
        $data = array('success' => $success );

        $this->load->library('session');
        if ($this->session->has_userdata('username')) {
          $this->load->helper('url');
          $this->load->view('master/header');
          $this->load->view('master/navigation');
          $this->load->view('pages/murid/addMurid', $data);
          $this->load->view('pages/murid/addMuridjs');
          $this->load->view('master/footer');
        } else {
          $this->load->helper('url');
          header('location:'.base_url().'user/login');
        }

      } else {

        // user creation failed, this should never happen
        $data->error = 'There was a problem creating new murid. Please try again.';

        $this->load->library('session');
        if ($this->session->has_userdata('username')) {
          $this->load->helper('url');
          $this->load->view('master/header');
          $this->load->view('master/navigation');
          $this->load->view('pages/murid/addMurid', $data);
          $this->load->view('pages/murid/addMuridjs');
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
    $this->load->library('session');
    if ($this->session->has_userdata('username')) {
      $this->load->helper('url');
      $this->load->view('master/header');
      $this->load->view('master/navigation');
      $this->load->view('pages/murid/editMurid');
      $this->load->view('master/jsAdd');
      $this->load->view('master/footer');
    } else {
      $this->load->helper('url');
      header('location:'.base_url().'user/login');
    }
  }
}
