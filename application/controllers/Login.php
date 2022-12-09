<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	
	public function index($err=0){
		$this->auth->goToPage();
		$data= array(
			'error' => 0,
		);
		if($err != 0){
			$data['error'] = 1;
		}
		$this->load->view('login.php',$data);
	}

	public function login(){
		$username = $this->input->post('username');
		
		$pass = $this->input->post('password');
		$cek = $this->db->query("SELECT * FROM user where u_username = '$username' ");
		if($cek->num_rows() == 1){
			
			if($this->encryption->decrypt($cek->row()->u_password) != $pass){
				redirect('login/index/1');
			}
			$data = array(
				'uid'   		=> $this->encryption->encrypt($cek->row()->id_user),
				'un'          	=> $cek->row()->u_name,
				'uk'          	=> $cek->row()->u_username,
				'ua'          	=> $this->encryption->encrypt($cek->row()->u_hakakses),
				'logged'		=> true
			);
			$this->session->set_userdata($data);

			redirect('data/hospital');
			
		}else{
			$data= array(
				'error' => 1,
			);
			$this->load->view('login.php',$data);
		}
	}

	public function logout(){
		session_destroy();
		$this->session->sess_destroy();
		redirect("login");
	}

}
