<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model(array('Model_kegiatan','Model_gambar','Model_profil'));
    $this->CekLogin();
  }
  function CekLogin(){
    if($this->session->userdata('login_status') != 1){
      $this->session->set_flashdata(array('class'=>'warning','alert'=>' !','value'=>'Silahkan Login Terlebih dahulu'));
      Redirect('admin/Login');
    }
  }
  function index(){
    $data['kegiatan'] = $this->Model_kegiatan->Data()->result();
    $this->template->load('template/admin','admin/kegiatan/data',$data);
  }

  function Publish(){
    $id = $this->uri->segment(4);
    $this->Model_kegiatan->Publish($id,1);
    $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data anda sudah <strong>Ditampilkan</strong>'));
    Redirect('admin/Kegiatan');
  }

  function Unpublish(){
    $id = $this->uri->segment(4);
    $this->Model_kegiatan->Publish($id,2);
    $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data anda sudah <strong>Disembunyikan</strong>'));
    Redirect('admin/Kegiatan');
  }

  function Ubah(){
    if(isset($_POST['ubah'])){
      $id = $this->input->post('id');
      $judul = $this->input->post('judul');
      $text = $this->input->post('text');
      if($this->Model_kegiatan->Ubah($id,$judul,$text)){
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data anda sudah <strong>Diubah</strong>'));
        Redirect('admin/Kegiatan');
      }else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Data anda gagal <strong>Diubah</strong>'));
        Redirect('admin/Kegiatan');
      }
    }
    else{
      $id = $this->uri->segment(4);
      $data['kegiatan'] = $this->Model_kegiatan->Data_one($id);
      $this->template->load('template/admin','admin/kegiatan/edit',$data);
    }
  }
  function Hapus(){
    $id = $this->uri->segment(4);
    $gambar = $this->Model_profil->Gambar($id);
    if($gambar != 'no_image.jpg'){
      $this->Model_kegiatan->Hapus($id);
      foreach ($gambar->result() as $key) {
        unlink('img/'.$key->image_name);
        $this->Model_kegiatan->HapusPic($key->image_id);
      }
      $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data anda sudah<strong> Dihapus</strong>'));
      Redirect('admin/Kegiatan');
    }
    else{
      $this->Model_kegiatan->Hapus($id);
      $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data anda sudah<strong> Dihapus</strong>'));
      Redirect('admin/Kegiatan');
    }
  }
  function Tambah(){
    if(isset($_POST['tambah'])){
      $id = Code('KEG',LastCode('kegiatan','kegiatan_id'),11,3);
      $judul = $this->input->post('judul');
      $text = $this->input->post('text');
      if($this->Model_kegiatan->Tambah($id,$judul,$text)){
        uplodGambar($id);
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Data sudah <strong>Ditambahkan</strong>'));
        Redirect('admin/Kegiatan');
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Data gagal <strong>Ditambahkan</strong>'));
        Redirect('admin/Kegiatan');
      }
    }
    else{

      $this->template->load('template/admin','admin/kegiatan/tambah');
    }
  }

  function HapusPic(){
    $id = $this->uri->segment(4);
    $idKeg = $this->uri->segment(5);
    $name = $this->uri->segment(6);
    if($this->Model_profil->HapusPic($id)){
      if(unlink('img/'.$name)){
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Gambar anda sudah<strong> Dihapus</strong>'));
        Redirect('admin/Kegiatan/Ubah/'.$idKeg);
      }else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Gambar anda gagal <strong> Dihapus</strong>'));
        Redirect('admin/Kegiatan/Ubah/'.$idKeg);
      }
    }else{
      $this->session->set_flashdata(array('class'=>'warning','alert'=>'Gagal !','value'=>'Gambar anda gagal <strong> Dihapus</strong>'));
      Redirect('admin/Kegiatan/Ubah/'.$idKeg);
    }
  }

  function AddPic(){
    if(isset($_POST['AddPic'])){
      if(!empty($_FILES['images']['size'][0])){
        $content_id = $this->input->post('content_id');
        uplodGambar($content_id);
        $this->session->set_flashdata(array('class'=>'success','alert'=>'Berhasil !','value'=>'Gambar telah dirubah '));
        Redirect('admin/Kegiatan/Ubah/'.$content_id);
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Tidak ada Gambar yang dipilih '));
        Redirect('admin/Kegiatan/Ubah/'.$content_id);
      }
    }
    else{
      Redirect('admin/Kegiatan/Ubah/'.$content_id);
    }
  }

  function UbahPic(){
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
          Redirect('admin/Kegiatan/Ubah/'.$id);
        }
      }
      else{
        $this->session->set_flashdata(array('class'=>'danger','alert'=>'Gagal !','value'=>'Tidak ada Gambar yang dipilih '));
        Redirect('admin/Kegiatan/Ubah/'.$id);
      }
      //uplod gambar, update
    }else{
      $data['profil'] = $this->Model_profil->Data();
      $this->template->load('template/admin','admin/Kegiatan/Ubah',$data);
    }
  }
}
