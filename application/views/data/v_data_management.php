<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />

    <link href="<?PHP echo base_url()?>assets/css/data/data.css?version=<?PHP echo date('YmdHis')?>" rel="stylesheet" >


    <title>Jendela Sehat | Dashboard</title>
	<link rel="icon" href="<?php echo base_url() ?>assets/img/mini-logo.png" />

	<!-- fusion chart -->
	<link  rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- You need to include the following JS file to render the chart.
    When you make your own charts, make sure that the path to this JS file is correct.
    Else, you will get JavaScript errors. -->
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script> 
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script> 
  </head>
  <body>

  	<?PHP 
  		$af = array(
				"db_field_name" 		=> null, // i: untuk dijadikan field id, baiknya diberi nama field di db, pastikan harus unik
				"html_field_name"		=> null,  // i: akan dijadikan nama kolom isian (nama field di HTML)
				"html_readonly"			=> null,
				"html_init_value"		=> null, // i: untuk set default value di kolom isian
				"html_type_input" 		=> null, //value: text|number|select|textarea|date|email|password = https://www.w3schools.com/tags/tag_input.asp
				"html_placeholder"		=> null, // i: placeholder (text before input)
				"html_field_note"		=> null, // i: untuk memberikan catatan kaki pada field form
				"html_max"				=> null, // i: max value, berlaku untuk field date|number
				"html_min"				=> null, // i: min value, berlaku untuk field date|number
				"html_minlength"		=> null, // i: untuk minimum panjang karakter
				"html_options"			=> null, // i: CI query, data pada select option
				"html_option_value"		=> null, // i: value dari query yang akan dijadikan base value untuk kolom ini
				"html_option_multiple"	=> null, // i: selectionnya bisa multiple value atau enggak
				"html_option_text"		=> null, // i: text yang akan ditampilkan pada option select (max 30 char per attribute)
				"js_cascade_field"		=> null, // i: nama field lain yang akan mempengaruhi selection field ini
				"js_cascade_col"		=> null, // i: nama attribut di field ini yang akan dipengaruhi oleh isian field lain
				"js_cascade_col"		=> null, // i: nama attribut di field ini yang akan dipengaruhi oleh isian field lain
				"js_cascade_other_val"	=> null, // i:apabila kolom pada cascade parent berbeda dari value yang dipilih
				"custom_id"				=> null, //i: id field, jika null, id_field akan menggunakan db_field_name
				"custom_class"			=> null, //i: jika ingin menambahkan kelas pada field ini
				"custom_js"				=> null, //i: additional javascript
		);
  	?>

  	<!-- HEADER MENU -->
    <div class="container-fluid our-header border-bottom mb-3">
      <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
          
          <div class="col-md-3 ">
		  	<a class="st-site-branding" href="index.html"><img src="../assets/img/logo.png" alt="Jendela Sehat" width="150px"></a>
          </div>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?PHP echo base_url()?>home" class="nav-link px-2 link-secondary">Website</a></li>
            <li><a href="<?PHP echo base_url()?>login" class="nav-link px-2 link-primary">Data Management</a></li>
          </ul>
        </header>
      </div>
    </div> 

    <div class="container-fluid">
    	<div class="row">

    		<?PHP $this->load->view("data/v_inc_sidebar");?>

			<!-- KONTEN -->
			<div class="col-10">
				<!-- FORM INPUT -->

				<div class="col-md-12 mb-3">

					<?PHP if(!$selected_id && $form != null && $sub_menu != 'rev_awp' && $this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
					<div class="col-12 position-relative text-center">

						<?PHP if($sub_menu == "hospital"){?>
							<div class="card card-body mt-3 rounded border-none text-left mb-5">
								<form action="<?= base_url('data/hospital/upload_excel'); ?>" method="POST" enctype="multipart/form-data">
									<div class="mb-3">
								    <label for="exampleInputEmail1" class="form-label">Pilih File Excel</label>
								    <input type="file" class="form-control" name="inputexcel" id="file" aria-describedby="file">
								    <div id="emailHelp" class="form-text">import file excel untuk mengisi database dengan excel.</div>
								  </div>
								  <button type="submit" class="btn btn-primary">Submit</button>
								</form>
								<hr/>
								<div class="row">
									
									<div class="col-md-6" id="chart-container">
										<!-- render dari javascript ngegambar chart -->
									</div>
									<div class="col-md-6" id="chart-container2">
										<!-- render dari javascript ngegambar chart -->
									</div>
									<div class="col-md-6" id="chart-container3">
										<!-- render dari javascript ngegambar chart -->
									</div>
									<div class="col-md-6" id="chart-container4">
										<!-- render dari javascript ngegambar chart -->
									</div>
								</div>
								<div class="row">
									
									<!-- <div class="col-md-6" id="chart-container2">
										render dari javascript ngegambar chart
									</div> -->
								</div>
							</div>
						<?PHP }?>
						


			          <span class="sc">Berikut adalah seluruh data dari basis data. Jika ingin menambahkan, klik tombol </span> <a class="ms-2 px-2 btn btn-sm m-auto fc text-white rounded-pill" id="collapse-button-filter" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
			              Tambah data baru <i id="iconfilter-collapse" class="fas fa-chevron-circle-down"></i>
			          </a>
			        </div>
			        <?PHP }?>
			        <div class="<?PHP if(!$selected_id){echo 'collapse';}?>" id="collapseExample">
			          <div class="card card-body mt-3 rounded border-none">
			          	<form method="post" action="<?PHP echo base_url().'data/'.$controller_name.'/input';?>">
				            <div class="row">
				              <input type="hidden" name="id" value="<?PHP echo $this->encryption->encrypt($selected_id)?>">
				              <?PHP foreach ($form as $key) {
				              		foreach ($af as $k => $v) {
				              			if(!isset($key[$k])){
				              				$key[$k] = $v;
				              			}
				              		}
				              ?>
				              	<?PHP if($key['html_type_input'] == 'split'){ ?>
				              		<div class="col-md-12 mb-2 mt-4">
						                <div class="input-group input-group-sm">
						                  	<h5><?PHP echo $key['html_field_name'];?></h5>
						                </div>
						            </div>
				              	<?PHP }else if($key['html_type_input'] == 'text'){ ?>
				              		<div class="col-md-12 mb-3">
						                <div class="input-group input-group-sm">
						                  <span class="input-group-text"><?PHP echo $key['html_field_name'];?></span>
						                  <input type="text" id="fid-<?PHP echo $key['db_field_name'];?>" placeholder="<?PHP echo $key['html_placeholder']; ?>" name="<?PHP echo $key['db_field_name'];?>" minlength="<?PHP echo $key['html_minlength']; ?>" class="form-control" <?PHP if($key['html_required']){echo 'required';}?> <?PHP if($key['html_readonly']){echo 'readonly';}?>
						                  value="<?PHP echo $key['html_init_value'];?>">
						                </div>
						                <?PHP if($key['html_field_note'] !=null){?>
						                	<small class="form-text text-muted"><?PHP echo $key['html_field_note']; ?></small>
						                <?PHP }?>
						            </div>
						        <?PHP }else if($key['html_type_input'] == 'password'){ ?>
				              		<div class="col-md-12 mb-3">
						                <div class="input-group input-group-sm">
						                  <span class="input-group-text"><?PHP echo $key['html_field_name'];?></span>
						                  <input type="password" id="fid-<?PHP echo $key['db_field_name'];?>" placeholder="<?PHP echo $key['html_placeholder']; ?>" name="<?PHP echo $key['db_field_name'];?>" minlength="<?PHP echo $key['html_minlength']; ?>" class="form-control" <?PHP if($key['html_required']){echo 'required';}?> <?PHP if($key['html_readonly']){echo 'readonly';}?>
						                  value="<?PHP echo $key['html_init_value'];?>">
						                </div>
						                <?PHP if($key['html_field_note'] !=null){?>
						                	<small class="form-text text-muted"><?PHP echo $key['html_field_note']; ?></small>
						                <?PHP }?>
						            </div>
						        <?PHP }else if($key['html_type_input'] == 'number'){ ?>
				              		<div class="col-md-12 mb-3">
						                <div class="input-group input-group-sm">
						                  <span class="input-group-text"><?PHP echo $key['html_field_name'];?></span>
						                  <input type="number" id="fid-<?PHP echo $key['db_field_name'];?>" name="<?PHP echo $key['db_field_name'];?>" class="form-control" placeholder="<?PHP echo $key['html_placeholder']; ?>" <?PHP if($key['html_required']){echo 'required';}?> <?PHP if($key['html_readonly']){echo 'readonly';}?>
						                  value="<?PHP echo $key['html_init_value'];?>">
						                </div>
						                <?PHP if($key['html_field_note'] !=null){?>
						                	<small class="form-text text-muted"><?PHP echo $key['html_field_note']; ?></small>
						                <?PHP }?>
						            </div>
						        <?PHP }else if($key['html_type_input'] == 'select'){ ?>
						        	<div class="col-md-12 mb-3">
						                <div class="input-group input-group-sm">
						                  <span class="input-group-text"><?PHP echo $key['html_field_name']?></span>
						                  <select autocomplete="on" id="fid-<?PHP echo $key['db_field_name'];?>" name="<?PHP echo $key['db_field_name'];?><?PHP if($key['html_option_multiple'] == true){echo "[]";}?>" class="form-select form-select-sm filter-form" aria-label=".form-select-sm example" <?PHP if($key['html_required']){echo 'required';}?> <?PHP if($key['html_readonly']){echo 'disabled="true"';}?> 
						                  	<?PHP if($key['html_option_multiple'] == true){echo "multiple";}?> >
						                  	<?PHP if($key['html_placeholder'] != null){ ?>
							                  	<option value="">
							                  		<?PHP echo $key['html_placeholder']; ?>
							                  	</option>
							                <?PHP }?>
						                    <?PHP foreach ($key['html_options'] as $row) { $row = (array) $row;
						                    	$str = str_replace("|| ","||",$key['html_init_value']);
						                    	$str = str_replace(" ||","||",$str);
						                    	$initvalue = explode("||", $str);
						                    ?>
						                    	

						                    	<option class="cls-opt-<?PHP echo $key['db_field_name'];?>" 
						                    			value="<?PHP echo $row[$key['html_option_value']];?>" 
						                    			<?PHP if(in_array($row[$key['html_option_value']], $initvalue)){echo "selected";}?>
						                    		<?PHP foreach ($row as $k=>$v) {
						                    			echo 'attr-'.$k.'="'.$v.'" ';
						                    		}?>>
						                    		<?PHP $lp = []; 
						                    			foreach($key['html_option_text'] as $hpt){ 
						                    				// khusus untuk kuartal pada anual workplan
						                    					if($hpt == 'a_kuartal'){
						                    						array_push($lp, 'Q'.$row[$hpt]); 
						                    				// end khusus
						                    					}else{
						                    						array_push($lp, $row[$hpt]); 
						                    					}
						                    				
						                    				
						                    			} 
						                    			print(implode(" | ", $lp));?>
						                    	</option>
						                    <?PHP }?>
						                  </select>
						                </div>
						                <?PHP if($key['html_field_note'] !=null){?>
						                	<small class="form-text text-muted"><?PHP echo $key['html_field_note']; ?></small>
						                <?PHP }?>
						            </div>
						        <?PHP }else if($key['html_type_input'] == 'textarea'){ ?>
				              		<div class="col-md-12 mb-3">
						                <div class="input-group input-group-sm">
						                  <span class="input-group-text"><?PHP echo $key['html_field_name'];?></span>
						                  <textarea id="fid-<?PHP echo $key['db_field_name'];?>" placeholder="<?PHP echo $key['html_placeholder']; ?>" name="<?PHP echo $key['db_field_name'];?>" class="form-control" <?PHP if($key['html_required']){echo 'required';}?> <?PHP if($key['html_readonly']){echo 'readonly';}?>
						                  rows="4" cols="50">
										    <?PHP echo $key['html_init_value'];?>
										  </textarea>
						                </div>
						                <?PHP if($key['html_field_note'] !=null){?>
						                	<small class="form-text text-muted"><?PHP echo $key['html_field_note']; ?></small>
						                <?PHP }?>
						            </div>
						        <?PHP }}?>
				              <div class="col-md-12 mb-3 text-end">
				                <button type="submit"class="btn btn-sm fc text-white">Simpan</button>
				                </form>
				                <?PHP if($controller_name != "profile"){?>
				                	<a href="<?PHP echo base_url().'data/'.$controller_name?>" class="btn btn-sm fourth-gradient text-white">Batal</a>
				                <?PHP }else{?>
				                	<a href="<?PHP echo base_url().'login'?>" class="btn btn-sm fourth-gradient text-white">Batal</a>
				                <?PHP }?>
				              </div>
				            </div>
			        	
			            
			          </div>
			        </div>
			        <div class="mt-3">
				        <?PHP if(null !== $this->session->flashdata('success')){?>
				        <div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong>Yey!</strong> <?PHP echo $this->session->flashdata('success');?>
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?PHP }else if(null !== $this->session->flashdata('danger')){?>
				        <div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Oops!</strong> <?PHP echo $this->session->flashdata('danger');?>
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?PHP }else if(null !== $this->session->flashdata('warning')){?>
				        <div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <strong>Warning!</strong> <?PHP echo $this->session->flashdata('warning');?>
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?PHP }else if(null !== $this->session->flashdata('info')){?>
				        <div class="alert alert-primary alert-dismissible fade show" role="alert">
						  <strong>Info!</strong> <?PHP echo $this->session->flashdata('info');?>
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?PHP }?>
					</div>
					
				</div>

				<!-- DATATABLE -->
				<?PHP if(!$selected_id){?>
				<div class="col-md-12 p-3 bg-white">
					<div class="col-md-12">
						<table id="example" class="table <?PHP if($main_menu!='record'){ echo 'table-striped';}?>" style="width:100%">
			                <thead>
			                    <tr>
			                    	<?PHP if(!isset($is_no_hide)){?>
			                    		<th>No.</th>
			                    	<?PHP }?>

			                        <?PHP foreach($datatable->list_fields() as $col){ 
			                        	if($main_menu == 'record' && ($col == 'dibuat' || $col == 'revisi' || $col == 'realisasi')){
			                        		if($col == 'realisasi'){
				                				echo "<th>Status</th>";
				                			}
			                        	}else{
				                        	if($is_id_hide){
				                        		if($col != $datatable_id){
				                        			echo "<th>".$col."</th>";
				                        		}
				                        	}else{
				                        		echo "<th>".$col."</th>";
				                        	}
				                        }
			                        	
			                        }?>
			                        <?PHP if(isset($is_final)){?>
			                        	<th>Lihat</th>
			                        <?PHP }else if($this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
			                        	<th>Lihat/Ubah</th>
			                        <?PHP }?>
			                        <?PHP if($sub_menu == 'awp'){?>
			                        	<th>Aktifitas</th>
			                        <?PHP }?>
			                        <?PHP if($sub_menu == 'the_finalisasi_rencana_realisasi'){?>
			                        	<th>Revisi</th>
			                        <?PHP }?>
			                        <?PHP if(isset($is_final)){?>
			                        	<th>Selesai?</th>
			                        <?PHP }else{?>
			                        	<?PHP if($sub_menu == 'rev_awp'){?>
			                        		<th>Tolak</th>
			                        	<?PHP }else if($main_menu == 'record'){?>
			                        		<th>Ubah</th>
			                        	<?PHP }else if($this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
			                        		<th>Hapus</th>
			                        	<?PHP }?>
			                        <?PHP }?>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?PHP $i=0; foreach($datatable->result() as $row){ $theid=0; $i++;
			                		$status = '<td>Error</td>';
			                		$isfinal = 0;
			                		if($main_menu == 'record'){
			                			if($row->dibuat == 1){
			                				$status = "<td class='buttons-csv text-center'>Tahap Revisi</td>";
			                			}
			                			if($row->revisi == 1){
			                				$status = "<td class='buttons-excel text-center'>Tahap Realisasi</td>";
			                			}
			                			if($row->realisasi == 1){
			                				$status = "<td class='buttons-copy text-center'>Final</td>";
			                				$isfinal = 1;
			                			}
			                		}
			                	?>
			                	<tr>
			                		<?PHP if(!isset($is_no_hide)){?>
			                    		<td><?PHP echo $i; ?></td>
			                    	<?PHP }?>
			                		
			                		<?PHP foreach($row as $k => $v){ 
			                			if($main_menu == 'record' && ($k == 'dibuat' || $k == 'revisi' || $k == 'realisasi')){
				                			if($k == 'realisasi'){
				                				echo $status;
				                			}
				                        }else{
				                        	if($is_id_hide){
				                        		if($k != $datatable_id){
				                        			echo "<td>".$v."</td>";
				                        		}else{
				                        			$theid = $v;
				                        		}
				                        	}else{
				                        		if($k == $datatable_id){
				                        			$theid = $v;
				                        		}
				                        		echo "<td>".$v."</td>";
				                        	}
				                        }

			                		}?>
			                		<?PHP if($this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
			                		<td>
			                			<?PHP if(isset($is_final) || $main_menu == 'record'){?>
			                				<form method="post" action="<?PHP echo base_url()."data/".$controller_name?>/detail">
				                				<input type="hidden" name="id" value="<?PHP echo $this->encryption->encrypt($theid);?>">
				                				<button type="submit" class="btn btn-sm sc btn-edit-link"><i class="far fa-file-alt"></i> Lihat</button>
				                			</form>
				                        <?PHP }else{?>
				                        	<form method="post" action="<?PHP echo base_url()."data/".$controller_name?>">
				                				<input type="hidden" name="id" value="<?PHP echo $this->encryption->encrypt($theid);?>">
				                				<button type="submit" class="btn btn-sm sc btn-edit-link"><i class="fas fa-edit"></i> Lihat/Ubah</button>
				                			</form>
				                        <?PHP }?>
			                		</td>
			                		<?PHP }?>

			                		<?PHP if($sub_menu == "awp"){?>
			                        <td>
			                        	<a href="<?PHP echo base_url()?>data/detail_awp?kuartal=1&id_awp=<?PHP echo $theid;?>" class="text-decoration-none">
			                        	<button class="btn btn-sm sc btn-delete text-success">
			                        		<i class="fas fa-list"></i> Detail Aktifitas
			                        	</button>
			                        	
			                        </td>
					                <?PHP }?>

			                		<?PHP if($sub_menu == "the_finalisasi_rencana_realisasi"){?>
			                        <td>
			                        	<button onClick="deleteData('<?PHP echo $this->encryption->encrypt($theid);?>',<?PHP echo $i;?>)" class="btn btn-sm sc btn-delete text-danger">
			                        		<i class="fas fa-undo"></i> Revisi
			                        	</button>
			                        </td>
					                <?PHP }?>
		                			
		                			<?PHP if($this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
	                				<td>
			                			<?PHP if(isset($is_final)){?>
				                        	<button onClick="finalizeData('<?PHP echo $this->encryption->encrypt($theid);?>',<?PHP echo $i;?>)" class="btn btn-sm sc btn-delete text-success"><i class="fas fa-check-double"></i> Selesaikan</button>

				                        <?PHP }else if($main_menu == 'record' && $isfinal == 0){?>
				                        	<p class="text-dark text-center">-</p>
				                        <?PHP }else{?>
				                        	<button onClick="deleteData('<?PHP echo $this->encryption->encrypt($theid);?>',<?PHP echo $i;?>)" class="btn btn-sm sc btn-delete text-danger">
				                        		<?PHP if($sub_menu == 'rev_awp'){?>
				                        			<i class="fas fa-undo"></i> Tolak
				                        		<?PHP }else if($main_menu == 'record' && $isfinal == 1){?>
				                        			<i class="fas fa-undo"></i> Kembali
				                        		<?PHP }else{?>
				                        			<i class="fas fa-trash-alt"></i> Hapus
				                        		<?PHP }?>
				                        	</button>
				                        <?PHP }?>
			                        </td>
			                        <?PHP }?>
			                	</tr>
			                	<?PHP }?>
			                </tbody>
			                <tfoot>
			                    <tr>
			                    	<?PHP if(!isset($is_no_hide)){?>
			                    		<th>No.</th>
			                    	<?PHP }?>

			                        <?PHP foreach($datatable->list_fields() as $col){ 
			                        	if($main_menu == 'record' && ($col == 'dibuat' || $col == 'revisi' || $col == 'realisasi')){
			                        		if($col == 'realisasi'){
				                				echo "<th>Status</th>";
				                			}
			                        	}else{
				                        	if($is_id_hide){
				                        		if($col != $datatable_id){
				                        			echo "<th>".$col."</th>";
				                        		}
				                        	}else{
				                        		echo "<th>".$col."</th>";
				                        	}
				                        }
			                        	
			                        }?>
			                        <?PHP if(isset($is_final)){?>
			                        	<th>Lihat</th>
			                        <?PHP }else if($this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
			                        	<th>Lihat/Ubah</th>
			                        <?PHP }?>
			                        <?PHP if($sub_menu == 'awp'){?>
			                        	<th>Aktifitas</th>
			                        <?PHP }?>
			                        <?PHP if($sub_menu == 'the_finalisasi_rencana_realisasi'){?>
			                        	<th>Revisi</th>
			                        <?PHP }?>
			                        <?PHP if(isset($is_final)){?>
			                        	<th>Selesai?</th>
			                        <?PHP }else{?>
			                        	<?PHP if($sub_menu == 'rev_awp'){?>
			                        		<th>Tolak</th>
			                        	<?PHP }else if($main_menu == 'record'){?>
			                        		<th>Ubah</th>
			                        	<?PHP }else if($this->encryption->decrypt($this->session->userdata('ua')) != "Kementerian"){?>
			                        		<th>Hapus</th>
			                        	<?PHP }?>
			                        <?PHP }?>
			                    </tr>
			                </tfoot>
			            </table>
					</div>
				</div>
				<?PHP }?>
			</div>
		</div>
	</div>
   
    
      

	<!-- Modal -->
	<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalDelete">
	        	Konfirmasi 
	        	<?PHP if($sub_menu == 'rev_awp'){?>
		        	Menolak 
		        <?PHP }else if($main_menu == 'record' || $main_menu == 'realisasi'){?>
		        	Mengembalikan
		        <?PHP }else{?>
		        	Menghapus
		        <?PHP }?>
	        	Data
	    	</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        Apakah anda yakin akan 
	        <?PHP if($sub_menu == 'rev_awp'){?>
	        	menolak 
	        <?PHP }else if($main_menu == 'record'){?>
		        	mengembalikan ke pengaturan realisasi untuk 
		    <?PHP }else if($main_menu == 'realisasi'){?>
		        	mengembalikan ke pengaturan revisi untuk
	        <?PHP }else{?>
	        	menghapus
	        <?PHP }?>
	        data <span class="fw-bold">No.</span> <span id="numdel" class="fw-bold">-</span> ?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tidak!</button>
	        <form method="post" action="<?PHP echo base_url()."data/".$controller_name."/delete"?>">
				<input id="delete-id" type="hidden" name="id" value="">
				<button type="submit" class="btn btn-sm btn-danger">
					<?PHP if($sub_menu == 'rev_awp'){?>
			        	Ya, Tolak!
			        <?PHP }else if($main_menu == 'record' || $main_menu == 'realisasi'){?>
			        	Ya, Kembalikan! 
			        <?PHP }else{?>
			        	Ya, Hapus!
			        <?PHP }?>
				</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="modalFinalize" tabindex="-1" aria-labelledby="modalFinalize" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalDelete">Konfirmasi Finalisasi Data</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        Apakah anda yakin data <span class="fw-bold">No.</span> <span id="numfin" class="fw-bold">-</span> sudah selesai ?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tidak</button>
	        <form method="post" action="<?PHP echo base_url()."data/".$controller_name."/finalize"?>">
				<input id="finalize-id" type="hidden" name="id" value="">
				<button type="submit" class="btn btn-sm btn-primary">Ya, Selesai</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>



  <div class="footer mt-5"></div>
  </body>

  	<?PHP if($sub_menu == "hospital"){?>
  		<!-- Step 1 - Include the fusioncharts core library -->
	    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	    <!-- Step 2 - Include the fusion theme -->
	    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  	<?PHP }?>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
   <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.2.1/d3.min.js" integrity="sha512-wkduu4oQG74ySorPiSRStC0Zl8rQfjr/Ty6dMvYTmjZw6RS5bferdx8TR7ynxeh79ySEp/benIFFisKofMjPbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script type="text/javascript">
        const BASE_URL = "<?PHP echo base_url()?>"; 

        function hideShowOpt(id,val,cascade,isedit=0) {
        	// console.log(id,cascade,val);
        	if(!isedit){
        		$("#fid-"+id).val([]);
        	}
        	console.log(".cls-opt-"+id+"[attr-"+cascade+"="+val+"]");
        	$(".cls-opt-"+id).hide();
        	$(".cls-opt-"+id+"[attr-"+cascade+"="+val+"]").show();
        } 
        function deleteData(id,number){
        	var deleteModal = new bootstrap.Modal(document.getElementById('modalDelete'), {
			  keyboard: false
			})
			$("#numdel").html(number)
			$("#delete-id").val(id);
        	deleteModal.show();
        }   

        function finalizeData(id,number){
        	var finalizeModal = new bootstrap.Modal(document.getElementById('modalFinalize'), {
			  keyboard: false
			})
			$("#numfin").html(number);
			$("#finalize-id").val(id);
        	finalizeModal.show();
        }


        $(document).ready(function() {

			var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

			tinymce.init({
			  selector: 'textarea#fid-b_content',
			  plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
			  tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
			  tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
			  tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
			  tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
			  mobile: {
			    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
			  },
			  menu: {
			    tc: {
			      title: 'Comments',
			      items: 'addcomment showcomments deleteallconversations'
			    }
			  },
			  menubar: 'file edit view insert format tools table tc help',
			  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
			  autosave_ask_before_unload: true,
			  autosave_interval: '30s',
			  autosave_prefix: '{path}{query}-{id}-',
			  autosave_restore_when_empty: false,
			  autosave_retention: '2m',
			  image_advtab: true,
			  link_list: [
			    { title: 'My page 1', value: 'https://www.tiny.cloud' },
			    { title: 'My page 2', value: 'http://www.moxiecode.com' }
			  ],
			  image_list: [
			    { title: 'My page 1', value: 'https://www.tiny.cloud' },
			    { title: 'My page 2', value: 'http://www.moxiecode.com' }
			  ],
			  image_class_list: [
			    { title: 'None', value: '' },
			    { title: 'Some class', value: 'class-name' }
			  ],
			  importcss_append: true,
			  templates: [
			        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
			    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
			    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
			  ],
			  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
			  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
			  height: 600,
			  image_caption: true,
			  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
			  noneditable_noneditable_class: 'mceNonEditable',
			  toolbar_mode: 'sliding',
			  spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
			  tinycomments_mode: 'embedded',
			  content_style: '.mymention{ color: gray; }',
			  contextmenu: 'link image imagetools table configurepermanentpen',
			  a11y_advanced_options: true,
			  skin: useDarkMode ? 'oxide-dark' : 'oxide',
			  content_css: useDarkMode ? 'dark' : 'default',
			  /*
			  The following settings require more configuration than shown here.
			  For information on configuring the mentions plugin, see:
			  https://www.tiny.cloud/docs/plugins/premium/mentions/.
			  */
			  mentions_selector: '.mymention',
			  mentions_item_type: 'profile'
			});






        	kol = $("#fid-indikator_awp_id").attr("attr-ref_indikator_id");
        	<?PHP if(!$selected_id){?>
	            $('#example tfoot th').each(function () {
			        var title = $(this).text();
			        if(title != "No." && title != "Lihat/Ubah" && title != "Hapus" && title != "Aktifitas"){
			        	$(this).html('<input type="text" placeholder="Search ' + title + '" />');
			        }
			    });
	            OUR_DATA_TABLE = $('#example').DataTable({
	              dom: 'Bfrtip',
	              scrollX: true,
	              buttons: [
	                  'copy', 'excel', 'csv'
	              ],
	              initComplete: function () {
			            // Apply the search
			            this.api()
			                .columns()
			                .every(function () {
			                    var that = this;
			 
			                    $('input', this.footer()).on('keyup change clear', function () {
			                        if (that.search() !== this.value) {
			                            that.search(this.value).draw();
			                        }
			                    });
			                });
			        },
	            });
            <?PHP } ?>

            <?PHP if($form != null){foreach ($form as $key) {
	          		foreach ($af as $k => $v) {
	          			if(!isset($key[$k])){
	          				$key[$k] = $v;
	          			}
	          	    }
	          	    if(isset($key['js_cascade_field'])){
	          	    	if(isset($key['js_cascade_other_val'])){
	          	    		echo '$("#fid-'.$key['js_cascade_field'].'").on("change",function(){ hideShowOpt("'.$key['db_field_name'].'",$("#fid-'.$key['js_cascade_field'].'").find(":selected").attr("attr-'.$key['js_cascade_other_val'].'"),"'.$key['js_cascade_col'].'"); });';
	          	    	}else{
	          	    		echo '$("#fid-'.$key['js_cascade_field'].'").on("change",function(){ hideShowOpt("'.$key['db_field_name'].'",$("#fid-'.$key['js_cascade_field'].'").val(),"'.$key['js_cascade_col'].'"); });';
	          	    	}
	          	    	
	          	    }
	          	  }}
	         ?>

	         setTimeout(function(){
	         	try {
				  <?PHP if($form != null){foreach ($form as $key) {
		          		foreach ($af as $k => $v) {
		          			if(!isset($key[$k])){
		          				$key[$k] = $v;
		          			}
		          	    }
		          	    if(isset($key['js_cascade_field'])){
		          	    	if(isset($key['js_cascade_other_val'])){
		          	    		echo 'hideShowOpt("'.$key['db_field_name'].'",$("#fid-'.$key['js_cascade_field'].'").find(":selected").attr("attr-'.$key['js_cascade_other_val'].'"),"'.$key['js_cascade_col'].'",1);';
		          	    	}else{
		          	    		echo 'hideShowOpt("'.$key['db_field_name'].'",$("#fid-'.$key['js_cascade_field'].'").val(),"'.$key['js_cascade_col'].'",1);';
		          	    	}
		          	    }
		          	  }}
		         ?>
				}
				catch(err) {
				  // console.log(err.message);
				}
		         
	     	},500);
	        
        });




			// FUSHIONCHART
			//STEP 2 - Chart Data
	    // const chartData = [{
	    //     "label": "Venezuela",
	    //     "value": "290"
	    // }, {
	    //     "label": "Saudi",
	    //     "value": "260"
	    // }, {
	    //     "label": "Canada",
	    //     "value": "180"
	    // }, {
	    //     "label": "Iran",
	    //     "value": "140"
	    // }, {
	    //     "label": "Russia",
	    //     "value": "115"
	    // }, {
	    //     "label": "UAE",
	    //     "value": "100"
	    // }, {
	    //     "label": "US",
	    //     "value": "30"
	    // }, {
	    //     "label": "China",
	    //     "value": "30"
	    // }];
	    <?PHP if (isset($vaksinRS)){?>
		    const chartData = <?PHP echo json_encode($vaksinRS);?>;
		    const chartConfig = {
		    type: 'column2d',
		    renderAt: 'chart-container',
		    width: '100%',
		    height: '400',
		    dataFormat: 'json',
		    dataSource: {
		        // Chart Configuration
		        "chart": {
		            "caption": "Statistik vaksin pada Rumah Sakit ",
		            "subCaption": "Made by Putri Maulani",
		            "xAxisName": "Vaksin",
		            "yAxisName": "Jumlah Rumah sakit",
		            // "numberSuffix": "K",
		            "theme": "fusion",
		            },
		        // Chart Data
		        "data": chartData
		        }
		    };
		    FusionCharts.ready(function(){
		    var fusioncharts = new FusionCharts(chartConfig);
		    fusioncharts.render();
		    });


		    const chartData2 = <?PHP echo json_encode($vaksinnonRS);?>;
		    const chartConfig2 = {
		    type: 'column2d',
		    renderAt: 'chart-container2',
		    width: '100%',
		    height: '400',
		    dataFormat: 'json',
		    dataSource: {
		        // Chart Configuration
		        "chart": {
		            "caption": "Statistik vaksin pada non Rumah Sakit ",
		            "subCaption": "Made by Salsabila Chairunnisa",
		            "xAxisName": "Vaksin",
		            "yAxisName": "Jumlah non Rumah sakit",
		            // "numberSuffix": "K",
		            "theme": "fusion",
		            },
		        // Chart Data
		        "data": chartData2
		        }
		    };
		    FusionCharts.ready(function(){
		    var fusioncharts2 = new FusionCharts(chartConfig2);
		    fusioncharts2.render();
		    });

		    const chartData3 = <?PHP echo json_encode($vaksin);?>;
		    const chartConfig3 = {
		    type: 'column2d',
		    renderAt: 'chart-container3',
		    width: '100%',
		    height: '400',
		    dataFormat: 'json',
		    dataSource: {
		        // Chart Configuration
		        "chart": {
		            "caption": "Statistik vaksin pada data ",
		            "subCaption": "Made by Ramzy Syafiq",
		            "xAxisName": "Vaksin",
		            "yAxisName": "Jumlah Lokasi",
		            // "numberSuffix": "K",
		            "theme": "fusion",
		            },
		        // Chart Data
		        "data": chartData3
		        }
		    };
		    FusionCharts.ready(function(){
		    var fusioncharts3 = new FusionCharts(chartConfig3);
		    fusioncharts3.render();
		    });

		    const chartData4 = <?PHP echo json_encode($lokasi);?>;
		    const chartConfig4 = {
		    type: 'pie2d',
		    renderAt: 'chart-container4',
		    width: '100%',
		    height: '400',
		    dataFormat: 'json',
		    dataSource: {
		        // Chart Configuration
		        "chart": {
		            "caption": "Statistik Jumlah Lokasi ",
		            "subCaption": "Made by Mhd Fazri Nahar",
		            "xAxisName": "Jenis Lokasi",
		            "yAxisName": "Total",
		            // "numberSuffix": "K",
		            "theme": "fusion",
		            },
		        // Chart Data
		        "data": chartData4
		        }
		    };
		    FusionCharts.ready(function(){
		    var fusioncharts4 = new FusionCharts(chartConfig4);
		    fusioncharts4.render();
		    });
		<?PHP }?>

        
    </script>
    <script type="text/javascript" src="<?PHP echo base_url()?>assets/js/data/data-management.js?version=<?PHP echo date("YmdHis")?>"></script>


    

    
    
  </body>
</html>




