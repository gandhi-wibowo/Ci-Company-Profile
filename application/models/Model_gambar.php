<?php
class Model_gambar extends CI_Model{

  function InserFoto($foto_id,$content,$namaFoto){
    $data = array(
      'image_id'=>$foto_id,
      'image_content'=>$content,
      'image_name'=>$namaFoto
    );
    $exe = $this->db->insert('image',$data);
    if($exe){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  function UpdateFoto($id,$namaFoto){
    $data = array(
      'image_name'=>$namaFoto
    );
    $this->db->where('image_id',$id);
    if($this->db->update('image',$data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

}
