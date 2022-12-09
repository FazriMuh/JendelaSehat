<?php
class Simple extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	
	function view($table,$order,$sort){
		$this->db->order_by($order,$sort);
		return $this->db->get($table);
	}
	
	function insert($table,$data){
		$ret = $this->db->insert($table,$data);
		if ($ret){
			return $this->db->insert_id();
		}else{
			return $this->db->error();
		}
	}
	function insert_batch($table,$data){
		$this->db->insert_batch($table, $data);
	}

	function update($table,$data,$id,$val)
	{
		$this->db->where($id,$val);
		$this->db->update($table,$data);
	}
	
	function delete($table,$id,$val)
	{
		$this->db->where($id,$val);
		$this->db->delete($table);
	}

}
?>