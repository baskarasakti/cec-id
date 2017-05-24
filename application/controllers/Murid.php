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
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('murid_model');
    $this->load->model('outlet_model');
    $this->load->model('jadwal_model');
    
  }

  public function index()
  {
    // create the data object
    $data = new stdClass();
    $title = 'Master Murid';
    $checked_outlet = $this->input->get('outlet');

    if ($this->session->userdata('role_id') > 0) {
      $checked_outlet = $this->session->userdata('outlet');
    }

    if ($checked_outlet > 0) {
      $murid = $this->murid_model->get_murid_per_outlet($checked_outlet);
    } else {
      $murid = $this->murid_model->get_murid_all();
    }
    $outlet = $this->outlet_model->get_outlet_all();

    $data = array(
            'murid' => $murid, 
            'outlet' => $outlet,
            'title' => $title );    

    $this->load->library('session');
    if ($this->session->has_userdata('username')) {
      $this->load->helper('url');
      $this->load->view('master/header', $data);
      $this->load->view('master/navigation');
      $this->load->view('pages/murid/viewMurid', $data);
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
    $data = array('outlet' => $outlet);
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

      $otl = $this->input->post('otl');
      $cat = $this->input->post('cat');
      $lvl = $this->input->post('lvl');
      $num = $this->murid_model->get_last_nik($otl,$cat,$lvl);

      $nik = $otl.$cat.$lvl.$num;
      $nama = $this->input->post('nama');
      $tgllahir = $this->input->post('tgllahir');
      $gender = $this->input->post('gender');
      $alamat = $this->input->post('alamat');
      $notelp = $this->input->post('notelp');
      $kategori = $this->input->post('kategori');
      $level = $this->input->post('level');
      $pajak = $this->input->post('pajak');
      $price = $this->input->post('price');
      $outlet = $this->input->post('outlet');

      if ($this->murid_model->create_murid($nik, $nama, $tgllahir, $gender, $alamat, $notelp, $kategori, $level, $pajak, $price, $outlet)) {

        $success = "creation success";
        $outlet = $this->outlet_model->get_outlet_all();
        $data = array('success' => $success, 'nik' => $nik, 'outlet' => $outlet );

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
        $data = array('outlet' => $outlet);

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

  public function edit($nik)
  {
    // create the data object
    $data = new stdClass();
    //$nik = $this->input->get('nik');
    $murid = $this->murid_model->get_murid($nik);
    $outlet = $this->outlet_model->get_outlet_all();
    $data = array('murid' => $murid, 'outlet' => $outlet);

    // set validation rules
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
    $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required|min_length[7]');
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

      $nik = $this->input->post('nik');
      $nama = $this->input->post('nama');
      $tgllahir = $this->input->post('tgllahir');
      $gender = $this->input->post('gender');
      $alamat = $this->input->post('alamat');
      $notelp = $this->input->post('notelp');
      $pajak = $this->input->post('pajak');
      $price = $this->input->post('price');
      $outlet = $this->input->post('outlet');
      $keluar = $this->input->post('keluar');

      //$asd = $this->murid_model->update_murid($nik, $nama, $tgllahir, $gender, $alamat, $notelp, $pajak, $price, $outlet,$keluar);

      if ($this->murid_model->update_murid($nik, $nama, $tgllahir, $gender, $alamat, $notelp, $pajak, $price, $outlet,$keluar)) {

        $success = "update success";
        $outlet = $this->outlet_model->get_outlet_all();
        $murid = $this->murid_model->get_murid($nik);
        $data = array('success' => $success,'outlet'=>$outlet,'nik'=>$nik,'murid'=>$murid );

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
        $data->error = 'There was a problem updating murid. Please try again.';

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
}
