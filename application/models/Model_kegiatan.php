<?php
class Model_kegiatan extends CI_Model{
  function Data(){
    $query = $this->db->query("SELECT * FROM `kegiatan` ORDER BY kegiatan_id DESC");
    return $query;
  }
  function Data_one($id){
    $query = $this->db->get_where('kegiatan',array('kegiatan_id'=>$id));
    return $query->row();
  }

  function Tambah($id,$judul,$text){
    $data = array(
      'kegiatan_id'=>$id,
      'kegiatan_judul'=>$judul,
      'kegiatan_tanggal'=>date('Y-m-d H:i:s'),
      'kegiatan_text'=>$text,
      'kegiatan_publish'=>1
    );
    $exe = $this->db->insert('kegiatan',$data);
    if($exe){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  function Ubah($id,$judul,$text){
    $data = array(
      'kegiatan_judul'=>$judul,
      'kegiatan_text'=>$text
    );
    $this->db->where('kegiatan_id',$id);
    if($this->db->update('kegiatan',$data)){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  function Hapus($id){
    $this->db->where('kegiatan_id', $id);
    $this->db->delete('kegiatan');
  }
  function HapusPic($id){
    $this->db->where('image_id', $id);
    $this->db->delete('image');
  }
  function Publish($id,$publish){
    $data = array(
      'kegiatan_publish'=>$publish
    );
    $this->db->where('kegiatan_id',$id);
    $this->db->update('kegiatan',$data);
  }
}
