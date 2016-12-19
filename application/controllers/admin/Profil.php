<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model(array('Model_profil','Model_gambar'));
    $this->CekLogin();
  }
  function CekLogin(){
    if($this->session->userdata('login_status') != 1){
      $this->session->set_flashdata(array('class'=>'warning','alert'=>' !','value'=>'Silahkan Login Terlebih dahulu'));
      Redirect('admin/Login');
    }
  }
  function index(){
    $this->Ubah();
  }
  function HapusPic(){
    $id = $this->uri->segment(4);
    $name = $this->uri->segment(6);
    if($this->Model_profil->HapusPic($id)){
      if(unlink('img/'.$name)){
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Gambar anda sudah<strong> Dihapus</strong>'));
        Redirect('admin/Profil');
      }else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Gambar anda gagal <strong> Dihapus</strong>'));
        Redirect('admin/Profil');
      }
    }else{
      $this->session->set_flashdata(array('class'=>'warning','alert'=>'Gagal !','value'=>'Gambar anda gagal <strong> Dihapus</strong>'));
      Redirect('admin/Profil');
    }
  }

  function AddPic(){
    if(isset($_POST['AddPic'])){
      if(!empty($_FILES['images']['size'][0])){
        $content_id = $this->input->post('content_id');
        uplodGambar($content_id);
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Gambar telah dirubah '));
        Redirect('admin/Profil');
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Tidak ada Gambar yang dipilih '));
        Redirect('admin/Profil');
      }
    }
    else{
      Redirect('admin/Profil');
    }
  }

  function Ubah(){
    if(isset($_POST['ubah'])){
      $id = $this->uri->segment(4);
      $idP = $this->uri->segment(5);
      $oldName = $this->uri->segment(6);
      $folder = "img/";
      $date   = date('Ymd His');
      $name   = str_replace(" ","_",$date);
      if(!empty($_FILES['images']['type'])){
        $jenis_gambar = $_FILES['images']['type'];
        $uploadFile = $_FILES['images'];
        $extractFile = pathinfo($uploadFile['name']);
        $newName = $name.'.'.$extractFile['extension'];
        $gambar = $folder.basename($newName);
        if(move_uploaded_file($_FILES['images']['tmp_name'],$gambar)){
          $this->Model_gambar->UpdateFoto($idP,$newName);
          unlink("img/".$oldName);
          $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Gambar telah dirubah '));
          Redirect('admin/Profil');
        }
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Tidak ada Gambar yang dipilih '));
        Redirect('admin/Profil');
      }
      //uplod gambar, update
    }else{
      $data['profil'] = $this->Model_profil->Data();
      $this->template->load('template/admin','admin/profil/edit',$data);
    }
  }

  function UbahKet(){
    if(isset($_POST['ubahKet'])){
      $id = $this->input->post('content_id');
      $ket = $this->input->post('keterangan');
      $update = $this->Model_profil->Ubah($id,$ket);
      if($update){
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Keterangan Profil Telah Diupdate'));
        Redirect('admin/Profil');
      }
      else{
        $this->session->set_flashdata(array('class'=>'warning','alert'=>'Gagal !','value'=>'Keterangan Profil Gagal Diupdate'));
        Redirect('admin/Profil');
      }
    }
    else{
      Redirect('admin/Profil');
    }
  }
}
