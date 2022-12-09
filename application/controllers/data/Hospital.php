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
class Hospital extends CI_Controller {
//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

	function __construct()
	{
		parent::__construct();
		$this->auth->isLogin();
		$this->FORM = $this->form();



		//============================================ PLEASE CHANGE THIS SETTINGS ========================================
		$this->main_table = "hospital";
		$this->primary_key = "id_hospital";
		//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

		//============================================ excel ==============================
		

		
	}

	private function form(){

		//============================================ PLEASE CHANGE THIS SETTINGS ========================================
		$field = array(
			[
				"db_field_name" 		=> "h_name",
				"html_required"			=> true,
				"html_field_name"		=> "Nama",
				"html_placeholder"		=> "Nama Tempat",
				"html_type_input" 		=> "text",
				"html_field_note"		=> "*isikan nama sesuai dengan nama tempat",			
			],
			[
				"db_field_name" 		=> "h_is_hospital",
				"html_required"			=> true,
				"html_field_name"		=> "Rumah Sakit/Tidak",
				"html_type_input" 		=> "select",
				"html_options"		    => array(array("isi" => "ya","value" => 1), array("isi" => "tidak","value" => 0)),		
				"html_option_value"		=> "value",
				"html_option_text"		=> ['isi'],				
			],
            [
				"db_field_name" 		=> "h_alamat",
				"html_required"			=> true,
				"html_field_name"		=> "Alamat",
				"html_placeholder"		=> "Alamat Rumah Sakit",
				"html_type_input" 		=> "text",	
			],
			[
				"db_field_name" 		=> "lat",
				"html_required"			=> true,
				"html_field_name"		=> "Latitude",
				"html_placeholder"		=> "Latitude Lokasi",
				"html_type_input" 		=> "text",	
			],
			[
				"db_field_name" 		=> "lng",
				"html_required"			=> true,
				"html_field_name"		=> "Longitude",
				"html_placeholder"		=> "Longitude Lokasi",
				"html_type_input" 		=> "text",	
			],
            [
				"db_field_name" 		=> "h_map",
				"html_required"			=> true,
				"html_field_name"		=> "Map",
				"html_placeholder"		=> "Embeded Map",
				"html_type_input" 		=> "textarea",
				"html_field_note"		=> "*isikan link map yang sudah ter-Embed",			
			],
            [
				"db_field_name" 		=> "h_worktime",
				"html_required"			=> true,
				"html_field_name"		=> "Time",
				"html_placeholder"		=> "Waktu Kerja",
				"html_type_input" 		=> "textarea",		
			],
            [
				"db_field_name" 		=> "h_pfizer",
				"html_required"			=> true,
				"html_field_name"		=> "Pfizer",
				"html_type_input" 		=> "select",
				"html_options"		    => array(array("isi" => "ya","value" => 1), array("isi" => "tidak","value" => 0)),	
				"html_option_value"		=> "value",
				"html_option_text"		=> ['isi'],				
			],
            [
				"db_field_name" 		=> "h_moderna",
				"html_required"			=> true,
				"html_field_name"		=> "Moderna",
				"html_type_input" 		=> "select",
				"html_options"		    => array(array("isi" => "ya","value" => 1), array("isi" => "tidak","value" => 0)),	
				"html_option_value"		=> "value",
				"html_option_text"		=> ['isi'],				
			],
            [
				"db_field_name" 		=> "h_sinovac",
				"html_required"			=> true,
				"html_field_name"		=> "Sinovac",
				"html_type_input" 		=> "select",
				"html_options"		    => array(array("isi" => "ya","value" => 1), array("isi" => "tidak","value" => 0)),	
				"html_option_value"		=> "value",
				"html_option_text"		=> ['isi'],				
			],
            [
				"db_field_name" 		=> "h_az",
				"html_required"			=> true,
				"html_field_name"		=> "Astrazeneca",
				"html_type_input" 		=> "select",
				"html_options"		    => array(array("isi" => "ya","value" => 1), array("isi" => "tidak","value" => 0)),		
				"html_option_value"		=> "value",
				"html_option_text"		=> ['isi'],				
			],
		);
		//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

		return $field;
	}




	public function index()
	{

		

		$pfizer = 0;
		$moderna = 0;
		$sinovac = 0;
		$az = 0;

		$cekvaksinrs = $this->db->query("SELECT * FROM $this->main_table WHERE h_is_hospital = 1 AND is_deleted IS  NULL");
		foreach($cekvaksinrs->result() as $row){
			$pfizer += $row->h_pfizer;
			$moderna += $row->h_moderna;
			$sinovac += $row->h_sinovac;
			$az += $row->h_az;
		}

		$chartData = [[
	        "label"=> "Pfizer",
	        "value" => $pfizer
	    ], [
	        "label"=> "Moderna",
	        "value"=> $moderna
	    ], [
	        "label"=> "Sinovac",
	        "value"=>$sinovac
	    ], [
	        "label"=> "Astrazaneca",
	        "value"=> $az
	    ]];


	    $pfizer = 0;
		$moderna = 0;
		$sinovac = 0;
		$az = 0;

		$cekvaksinrs = $this->db->query("SELECT * FROM $this->main_table WHERE h_is_hospital = 0 AND is_deleted IS  NULL");
		foreach($cekvaksinrs->result() as $row){
			$pfizer += $row->h_pfizer;
			$moderna += $row->h_moderna;
			$sinovac += $row->h_sinovac;
			$az += $row->h_az;
		}

		$chartData2 = [[
	        "label"=> "Pfizer",
	        "value" => $pfizer
	    ], [
	        "label"=> "Moderna",
	        "value"=> $moderna
	    ], [
	        "label"=> "Sinovac",
	        "value"=>$sinovac
	    ], [
	        "label"=> "Astrazaneca",
	        "value"=> $az
	    ]];

	    $pfizer = 0;
		$moderna = 0;
		$sinovac = 0;
		$az = 0;

		$cekvaksin = $this->db->query("SELECT * FROM $this->main_table WHERE  is_deleted IS  NULL");
		foreach($cekvaksin->result() as $row){
			$pfizer += $row->h_pfizer;
			$moderna += $row->h_moderna;
			$sinovac += $row->h_sinovac;
			$az += $row->h_az;
		}

		$chartData3 = [[
	        "label"=> "Pfizer",
	        "value" => $pfizer
	    ], [
	        "label"=> "Moderna",
	        "value"=> $moderna
	    ], [
	        "label"=> "Sinovac",
	        "value"=>$sinovac
	    ], [
	        "label"=> "Astrazaneca",
	        "value"=> $az
	    ]];

		$rs = 0;
		$nonrs = 0;
		

		$ceklokasi = $this->db->query("SELECT * FROM $this->main_table WHERE h_is_hospital = 1 AND is_deleted IS  NULL");
		foreach($ceklokasi->result() as $row){
			$rs += $row->h_is_hospital;
			
		}
		
		$ceklokasi2 = $this->db->query("SELECT * FROM $this->main_table WHERE h_is_hospital = 0 AND is_deleted IS  NULL");
		foreach($ceklokasi2->result() as $row){
			$nonrs += 1;
		}

		$chartData4 = [[
	        "label"=> "Rumah Sakit",
	        "value" => $rs
	    ], [
	        "label"=> "Non Rumah sakit",
	        "value"=> $nonrs
	    ]];


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
			$datatable = $this->db->query("SELECT id_hospital, h_name, h_is_hospital, h_alamat, h_map , lat, lng, h_worktime, h_pfizer,
            h_moderna, h_sinovac, h_az ,updated_date from hospital");
		}


		// HTML INFORMATION
		$HTMLDATA["vaksinRS"] = $chartData;
		$HTMLDATA["vaksinnonRS"] = $chartData2;
		$HTMLDATA["vaksin"] = $chartData3;
		$HTMLDATA["lokasi"] = $chartData4;
		
		$HTMLDATA["controller_name"] 	= "hospital"; // nama controller untuk URL
		$HTMLDATA["main_menu"] 			= "referensi"; // main menu yang dibuka/aktif
		$HTMLDATA["sub_menu"] 			= "hospital";	// sub menu yang aktif

		// DATATABLE SETTING
		$HTMLDATA["datatable_id"] 		= "id_hospital"; // primary key data, pastikan sama dengan query diatas
		$HTMLDATA["is_id_hide"] 		= true; // kalau id tidak ingin ditampilkan di datatable, set True
		
		
		//============================================ END - PLEASE CHANGE THIS SETTINGS ========================================

		

		$this->load->view("data/v_data_management",$HTMLDATA);

	}


	
	
	function upload_excel(){
		$insertbatch = [];
		if ($this->input->method() === 'post') {
			// the user id contain dot, so we must remove it
			$file_name = date("Y-m-d H:i:s");
			$config['upload_path']          = FCPATH.'/uploads/';
			$config['allowed_types']        = 'xlsx';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 11024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('inputexcel')) {
				$data['error'] = $this->upload->display_errors();
				$this->session->set_flashdata('error', $data['error']);
				redirect('data/hospital');
			} else {
				$uploaded_data = $this->upload->data();
				$namafile = $uploaded_data['file_name'];
				$this->load->library("SimpleXLSX");

				if ( $xlsx = SimpleXLSX::parse(FCPATH.'/uploads/'.$namafile) ) {
				   	
				   	$i = 0;
					foreach($xlsx->rows() as $row){
						if($i>0){
							$newdata = array(
								'h_name' => $row[1],
								'h_is_hospital' => $row[2],
								'h_alamat' => $row[3],
								'h_map' => $row[4],
								'lat' => $row[5],
								'lng' => $row[6],
								'h_worktime' => $row[7],
								'h_pfizer' => $row[8],
								'h_moderna' => $row[9],
								'h_sinovac' => $row[10],
								'h_az' => $row[11],
							);
							array_push($insertbatch, $newdata);
						}
						$i++;
					}
					$this->simple->insert_batch('hospital',$insertbatch);
					$this->session->set_flashdata('success', 'Data berhasil diperbaharui');
					redirect('data/hospital');
					

				} else {
				    echo SimpleXLSX::parseError();
				}
				die();

				
		
				
			}
		}
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
