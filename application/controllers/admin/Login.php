<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Model_login');
  }

  function Logout(){
		$data = array('login_status','username','user_id','user_akses');
		$this->session->unset_userdata($data);
    $this->session->sess_destroy();
    Redirect('admin/Login');
  }

  function index(){
    if($this->session->userdata('login_status') == 1){
      Redirect('admin/Kegiatan');
    }
    else{
      $this->load->view('login/formLogin');
    }
  }

  function CekLogin(){
    if($this->session->userdata('login_status') == 1){
      Redirect('admin/Kegiatan');
    }
    else{
      $this->session->set_flashdata(array('class'=>'warning','alert'=>' !','value'=>'Silahkan Login Terlebih dahulu'));
      Redirect('admin/Login');
    }
  }

  function Login(){
    if(isset($_POST['login'])){
      $uname = $this->input->post('username');
      $password = md5($this->input->post('password'));
      $cek = $this->Model_login->CekUser($uname,$password);
      if($cek){
        $data = array(
          'login_status'=>'1',
          'username'=>$cek->user_name,
          'user_id'=>$cek->user_id
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Selamat Datang <strong>'.$uname.'</strong>'));
        Redirect('admin/Kegiatan');
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Username / Password anda <strong> Salah </strong>'));
        // password salah
        Redirect('admin/Login');
      }
    }
    else{
      Redirect('admin/Login');
    }
  }
  // algo nya
  // pertama kunjungi admin login
  // kalau sudah login, kirim ke Kegiatan
  // kalau belum login
  // tampilkan admin login x
  // isikan username dan password
  // cek username dan password
  // kalau benar kirim ke Kegiatan
  // kalau salah tetap di admin login


}
