<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require APPPATH. "libraries/Format.php";
	require APPPATH. "libraries/RestController.php";
	use chriskacerguis\RestServer\RestController;

	/**
	 * 
	 */
	class GetHospital extends RestController
	{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('ModelHospital');
		}
		public function index_get(){

			$hospital = new ModelHospital;
			$resulthospital = $hospital->get_hospital();
			$this->response($resulthospital,200);

		}
	}
?>