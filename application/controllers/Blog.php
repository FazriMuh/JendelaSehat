<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	
	public function index()
	{
		$data = array(
			"listBlog" => $this->db->query("SELECT * FROM blog WHERE is_deleted IS NULL OR is_deleted != 0"),
		);
		$this->load->view('blog-no-sidebar',$data);
	}

	public function readmore()
	{
		$id = $this->input->get("id");
		$data = array(
			"selectedblog" => $this->db->query("SELECT * FROM blog WHERE id_blog = $id"),
		);
		$this->load->view('blog-details-no-sidebar',$data);
	}
}
