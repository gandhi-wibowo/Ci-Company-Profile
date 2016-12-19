<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model(array('Model_user'));
    $this->CekLogin();
  }
  function CekLogin(){
    if($this->session->userdata('login_status') != 1){
      $this->session->set_flashdata(array('class'=>'warning','alert'=>' !','value'=>'Silahkan Login Terlebih dahulu'));
      Redirect('admin/Login');
    }
  }
  function index(){
    if(isset($_POST['ubahUser'])){
      $id = $this->input->post('user_id');
      $name = $this->input->post('user_name');
      $login = $this->input->post('user_login');
      $exe = $this->Model_user->Edit($id,$login,$name);
      if($exe){
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data anda sudah <strong> Dirubah</strong>'));
        Redirect('admin/User');
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Data anda Gagal <strong> Dirubah</strong>'));
        Redirect('admin/User');
      }
    }
    else{
      $data['user'] = $this->Model_user->Data();
      $this->template->load('template/admin','admin/user/edit',$data);
    }
  }

  function UbahPwd(){
    if(isset($_POST['ubahPwd'])){
      $id = $this->input->post('user_id');
      $passwordOld = md5($this->input->post('user_password_old'));
      $passwordNew = md5($this->input->post('user_password_new'));
      $cek = $this->Model_user->CekPwd($id,$passwordOld);
      if($cek){
        $this->Model_user->EditPwd($id,$passwordNew);
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Password anda sudah <strong> Dirubah</strong>'));
        Redirect('admin/User');
      }
      else{
        $this->session->set_flashdata(array('class'=>'warning','alert'=>'Gagal !','value'=>'Password Lama anda <strong> Salah</strong>'));
        Redirect('admin/User');
      }
    }
  }
}
