<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaksin extends CI_Controller {

	
	public function index()
	{
		$data = array(
			"listvk" => $this->db->query("SELECT * FROM hospital WHERE is_deleted IS NULL AND h_is_hospital = 0"),
		);
		$this->load->view('blog-right-sidebar1', $data);
	}
	public function detail()
	{
		$id = $this->input->get("id");
		$data = array(
			"selectedvk" => $this->db->query("SELECT * FROM hospital WHERE id_hospital = $id"),
			"selectedvx" => $this->db->query("SELECT * FROM hospital WHERE id_hospital = $id"),
		);
		$this->load->view('blog-right-sidebar2',$data);
	}
}
