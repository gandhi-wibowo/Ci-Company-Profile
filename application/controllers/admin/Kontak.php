<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model(array('Model_kontak'));
    $this->CekLogin();
  }
  function CekLogin(){
    if($this->session->userdata('login_status') != 1){
      $this->session->set_flashdata(array('class'=>'warning','alert'=>' !','value'=>'Silahkan Login Terlebih dahulu'));
      Redirect('admin/Login');
    }
  }
  function index(){
    if(isset($_POST['ubahKontak'])){
      $id = $this->input->post('kontak_id');
      $alamat = $this->input->post('alamat');
      $hp = $this->input->post('hp');
      $email = $this->input->post('email');
      $exe = $this->Model_kontak->Edit($id,$alamat,$hp,$email);
      if($exe){
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Kontak anda sudah <strong> Dirubah</strong>'));
        Redirect('admin/Kontak');
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Kontak anda Gagal <strong> Dirubah</strong>'));
        Redirect('admin/Kontak');
      }
    }
    else{
      $data['kontak'] = $this->Model_kontak->Data();
      $this->template->load('template/admin','admin/kontak/edit',$data);
    }
  }
}
