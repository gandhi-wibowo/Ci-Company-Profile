<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
    parent::__construct();
		$this->load->model('Model_home');
  }

	public function index()
	{
		$data['kegiatan'] = $this->Model_home->GetKegAll();
		$this->template->load('template/front','home',$data);
	}
	function Detail(){
		$id = $this->uri->segment(3);
		$data['detail'] = $this->Model_home->Detail($id);
		$this->template->load('template/front','detail',$data);
	}
	function Visi(){
		$this->template->load('template/front','visi');
	}
	function Misi(){
		$this->template->load('template/front','misi');
	}
	function Sejarah(){
		$this->template->load('template/front','sejarah');
	}
	function Struktur(){
		$this->template->load('template/front','struktur');
	}
	function Profil(){
		$data['profil'] = $this->Model_home->Profil();
		$this->template->load('template/front','profil',$data);
	}
	function Kontak(){
		$data['kontak'] = $this->Model_home->Kontak();
		$this->template->load('template/front','kontak',$data);
	}

}
