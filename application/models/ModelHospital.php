<?php

class ModelHospital extends CI_Model {

	public function get_hospital(){
		return $this->db->get('hospital')->result();
		
	}
	
}
?>