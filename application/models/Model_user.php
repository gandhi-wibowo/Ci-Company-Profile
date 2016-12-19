<?php
class Model_user extends CI_Model{

  function Data(){
    $query = $this->db->query("SELECT * FROM users");
    if($query->num_rows()>0){
      return $query->row();
    }
    else{
      return FALSE;
    }
  }
  function EditPwd($id,$password){
    $data = array('user_password'=>$password);
    $this->db->where('user_id',$id);
    if($this->db->update('users',$data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  function CekPwd($id,$pwd){
    $query = $this->db->query("SELECT * FROM users WHERE user_id='$id' AND user_password='$pwd'");
    if($query->num_rows()>0){
      return True;
    }
    else{
      return False;
    }
  }
  function Edit($id,$login,$name){
    $data = array(
      'user_login'=>$login,
      'user_name'=>$name
    );
    $this->db->where('user_id',$id);
    if($this->db->update('users',$data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
}
