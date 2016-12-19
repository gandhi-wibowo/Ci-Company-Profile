<?php
class Model_login extends CI_Model{


  function CekUser($uname,$pwd){
    $query = $this->db->query("SELECT * FROM users WHERE user_login='$uname' AND user_password='$pwd'");
    if($query->num_rows()>0){
      return True;
    }
    else{
      return False;
    }
  }
}
