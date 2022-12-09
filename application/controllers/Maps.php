<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	
	public function index()
	{
		$data = array(
			"listrs" => $this->db->query("SELECT * FROM hospital WHERE is_deleted IS NULL AND h_is_hospital = 1"),
			"listvk" => $this->db->query("SELECT * FROM hospital WHERE is_deleted IS NULL AND h_is_hospital = 0"),
		);
		$this->load->view('multipage-about', $data);
	}
	public function detail()
	{
		$id = $this->input->get("id");
		$data = array(
			"selectedvh" => $this->db->query("SELECT * FROM hospital WHERE id_hospital = $id"),
			"selectedvk" => $this->db->query("SELECT * FROM hospital WHERE id_hospital = $id"),
		);
		$this->load->view('blog-right-sidebar2', $data);
	}
}
