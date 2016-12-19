<?php
class Model_home extends CI_Model{

  function GetKegAll(){
    return $this->db->query("SELECT * FROM `kegiatan` WHERE `kegiatan_publish`='1' ORDER BY kegiatan_id DESC");
  }

  function Gambar($id){
    $query = $this->db->query("SELECT * FROM `image` WHERE image_content='$id'");
    if($query->num_rows()>0){
      return $query;
    }
    else{
      $x = "no_image.jpg";
      return $x;
    }
  }

  function Detail($id){
    $query = $this->db->query("SELECT * FROM `kegiatan` WHERE `kegiatan_publish`='1' AND `kegiatan_id`='$id'");
    return $query->row();
  }

  function Profil(){
    $query = $this->db->query("SELECT * FROM `profil`");
    return $query->row();
  }
  function Kontak(){
    $query = $this->db->query("SELECT * FROM `kontak`");
    return $query->row();
  }

}
