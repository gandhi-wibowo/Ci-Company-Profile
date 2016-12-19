<?php
class Model_kontak extends CI_Model{

  function Data(){
    $query = $this->db->query("SELECT * FROM kontak");
    if($query->num_rows()>0){
      return $query->row();
    }
    else{
      return FALSE;
    }
  }

  function Edit($id,$alamat,$hp,$email){
    $data = array(
      'kontak_email'=>$email,
      'kontak_hp'=>$hp,
      'kontak_alamat'=>$alamat
    );
    $this->db->where('kontak_id',$id);
    if($this->db->update('kontak',$data)){
      return TRUE;
    }
    else{
      return FALSE;
    }    
  }
}
