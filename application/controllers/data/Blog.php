<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/* FORM INFORMATION 
	$field = [
		{
			"db_field_name" 		: "kabupaten", // i: untuk dijadikan field id, harus menggunakan nama field di db, pastikan harus unik
			"html_field_name"		: "Kabupaten",  // i: akan dijadikan nama kolom isian (nama field di HTML)
			"html_readonly"			: true, untuk matiin input
			"html_init_value"		: "3101", // i: untuk set default value di kolom isian
			"html_type_input" 		: "select", //value: text|number|select|textarea|date|email| = https://www.w3schools.com/tags/tag_input.asp
			"html_placeholder"		: "Please select an option", // i: placeholder (text before input)
			"html_field_note"		: "please ensure your province is correct", // i: untuk memberikan catatan kaki pada field form
			"html_max"				: null, // i: max value, berlaku untuk field date|number
			"html_min"				: null, // i: min value, berlaku untuk field date|number
			"html_required"			: true|false,
			"html_options"			: $this->db->query("SELECT * FROM ref_kabupaten ORDER BY LENGTH(rp_name")->result(), // i: CI query, data pada select option
			"html_option_value"		: "id_ref_provinsi", // i: value dari query yang akan dijadikan base value untuk kolom ini
			"html_option_text"		: ["id_ref_provinsi","rp_name"], // i: text yang akan ditampilkan pada option select (max 30 char per attribute)
			"html_option_multiple"	; true, //multiple selection
			"js_cascade_field"		: "ref_provinsi_id", // i: nama field lain yang akan mempengaruhi selection field ini
			"js_cascade_col"		: "ref_provinsi_id", // i: FK . nama attribut di field ini yang akan dipengaruhi oleh isian field lain
			"js_cascade_other_val"	: true //apabila kolom pada cascade parent berbeda dari value yang dipilih
			"custom_id"				: "sel_lokasi", //i: id field, jika null, id_field akan menggunakan db_field_name
			"custom_class"			: "class_select", //i: jika ingin menambahkan kelas pada field ini
			"custom_js"				: "$('#sel_lokasi').on('change',function(console.log('done')))", //i: additional javascript
		},
	];
 */ 


//============================================ PLEASE CHANGE THIS SETTINGS ========================================
class Blog extends CI_Controller {
//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

	function __construct()
	{
		parent::__construct();
		$this->auth->isLogin();
		$this->FORM = $this->form();



		//============================================ PLEASE CHANGE THIS SETTINGS ========================================
		$this->main_table = "blog";
		$this->primary_key = "id_blog";
		//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================


		
	}

	private function form(){

		//============================================ PLEASE CHANGE THIS SETTINGS ========================================
		$field = array(
			[
				"db_field_name" 		=> "b_judul",
				"html_required"			=> true,
				"html_field_name"		=> "Title",
				"html_placeholder"		=> "Title",
				"html_type_input" 		=> "text",		
			],
			[
				"db_field_name" 		=> "b_img",
				"html_required"			=> true,
				"html_field_name"		=> "Link Image",
				"html_placeholder"		=> "https://sampleimage.png",
				"html_type_input" 		=> "text",		
			],
			[
				"db_field_name" 		=> "b_abstrak",
				"html_required"			=> false,
				"html_field_name"		=> "Abstrak",
				"html_placeholder"		=> "Abstrak",
				"html_type_input" 		=> "textarea",		
			],
			[
				"db_field_name" 		=> "b_content",
				"html_required"			=> false,
				"html_field_name"		=> "Konten",
				"html_placeholder"		=> "Konten",
				"html_type_input" 		=> "textarea",		
			],
		);
		//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

		return $field;
	}




	public function index()
	{

		$updateid= $this->encryption->decrypt($this->input->post('id'));
		$datatable = array();
		if($updateid){
			$getval = (array) $this->db->query("SELECT * FROM $this->main_table WHERE $this->primary_key = $updateid")->result();
			$getval = (array) $getval[0];
			foreach ($this->FORM as $key => $value) {
				$this->FORM[$key]['html_init_value'] = $getval[$this->FORM[$key]['db_field_name']];
			}
		}
		$HTMLDATA['form'] = $this->FORM;
		$HTMLDATA['selected_id'] = $updateid;
		$HTMLDATA['datatable'] = &$datatable;



		//============================================ PLEASE CHANGE THIS SETTINGS ========================================

		if(!$this->input->get('id')){
			$datatable = $this->db->query("SELECT id_blog, b_judul, updated_date from blog");
		}


		// HTML INFORMATION
		$HTMLDATA["controller_name"] 	= "blog"; // nama controller untuk URL
		$HTMLDATA["main_menu"] 			= "referensi"; // main menu yang dibuka/aktif
		$HTMLDATA["sub_menu"] 			= "blog";	// sub menu yang aktif

		// DATATABLE SETTING
		$HTMLDATA["datatable_id"] 		= "id_blog"; // primary key data, pastikan sama dengan query diatas
		$HTMLDATA["is_id_hide"] 		= true; // kalau id tidak ingin ditampilkan di datatable, set True
		
		
		//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

		

		$this->load->view("data/v_data_management",$HTMLDATA);
	}








	
	public function delete(){
		$updateid= $this->encryption->decrypt($this->input->post('id'));
		if($updateid){
			$data =array(
				"is_deleted" => 1
			);
			$update = $this->simple->update($this->main_table,$data,$this->primary_key,$updateid);
			$this->session->set_flashdata('info', 'Data berhasil dihapus');
		}
		redirect('data/'.$this->main_table);
	}

	public function input(){
		$id = $this->encryption->decrypt($this->input->post('id'));
		$form = $this->form();
		$data = array();
		foreach ($form as $f) {
			if($f['db_field_name']!=null){
				if($f['db_field_name']=='u_password'){
	            	$data[$f['db_field_name']] = $this->encryption->encrypt($this->input->post($f['db_field_name']));    
	        	}else{
                	$data[$f['db_field_name']] = $this->input->post($f['db_field_name']);   
                }	 
            }
		}
		//============ IF YOU NEED TO CHANGE THE VALUE MANUALLY =======
			/* IF YOU NEED TO CHANGE THE VALUE MANUALLY
				print_r($data); //kalau mau ngecek data yang bakal diinputin ke DB, 
				$data['rk_name'] = "ganti nama";  //kalau misalnya mau manual nimpah data
			*/
		//============ END - IF YOU NEED TO CHANGE THE VALUE MANUALLY =======
		
		if(!$id){ //INSERT NEW ROW	
			$insert = $this->simple->insert($this->main_table,$data);
			if(isset($insert['code'])){
				$this->session->set_flashdata('danger', 'Data gagal dimasukkan, '.$insert['message']);
			}else{
				$this->session->set_flashdata('success', 'Data baru berhasil dimasukkan');
			}
			redirect('data/'.$this->main_table);

		}else{ // UPDATE EXISTING ROW
			$update = $this->simple->update($this->main_table,$data,$this->primary_key,$id);
			if(isset($update['code'])){
				$this->session->set_flashdata('danger', 'Data gagal diubah, '.$update['message']);
			}else{
				$this->session->set_flashdata('success', 'Data berhasil diperbaharui');
			}
			redirect('data/'.$this->main_table);
		}
		
	}


}
