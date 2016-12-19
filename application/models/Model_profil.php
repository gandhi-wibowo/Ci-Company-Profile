<?php
class Model_profil extends CI_Model{

  function Data(){
    $query = $this->db->query("SELECT * FROM profil");
    if($query->num_rows()>0){
      return $query->row();
    }
    else{
      return FALSE;
    }
  }

  function Gambar($id){
    $query = $this->db->get_where('image',array('image_content'=>$id));
    if($query->num_rows()>0){
      return $query;
    }
    else{
      $img = "no_image.jpg";
      return $img;
    }
  }

  function HapusPic($id){
    $this->db->where('image_id', $id);
    if($this->db->delete('image')){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  function Tambah($id,$text){
    $data = array(
      'profil_id'=>$id,
      'profil_keterangan'=>$text
    );
    $exe = $this->db->insert('profil',$data);
    if($exe){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  function Ubah($id,$text){
    $data = array(
      'profil_keterangan'=>$text
    );
    $this->db->where('profil_id',$id);
    if($this->db->update('profil',$data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  
}
