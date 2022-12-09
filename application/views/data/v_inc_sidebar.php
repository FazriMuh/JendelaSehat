<!-- SIDE BAR MENU -->
<?PHP $reference_list = ["user","hospital","blog", "tabel"
 ];?>

<div class="border-end side-menu">
    <ul class="list-unstyled ps-0">
      <!-- <li class="mb-1">
        <a href="<?PHP // echo base_url();?>main_dashboard" class=" link-dark rounded" style="text-decoration: none"><button class="btn btn-single align-items-center rounded">
          <i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard
        </button></a>
      </li> -->
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded <?PHP if($main_menu == 'referensi'){echo 'collapsed';}?>" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="<?PHP if($main_menu == 'referensi'){echo 'true';}?>">
          Referensi
        </button>
        <div class="collapse <?PHP if($main_menu == 'referensi'){echo 'show';}?>" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <?PHP foreach ($reference_list as $val) {
              $cls = 'link-secondary';
              if($val == $controller_name){
                $cls = 'link-dark fw-bold';
              }
              $nm = str_replace("ref_","",$val);
              $nm = str_replace('_'," ",$nm);
              $nm = ucwords($nm);
              if ($nm == "Aktivitas"){
                $nm = "Activity ID";
              }
              echo '<li><a href="'.base_url().'data/'.$val.'" class="'.$cls.' rounded">'.$nm.'</a></li>';
            }?>
            
          </ul>
        </div>
      </li>
      <hr/>
      <li class="mb-1">
        <a href="<?PHP echo base_url();?>data/profile" class=" link-dark rounded" style="text-decoration: none"><button class="btn btn-single align-items-center rounded <?PHP if($main_menu == 'profile'){echo 'fw-bold';}?>">
          <i class="fas fa-user-edit"></i>&nbsp;&nbsp;Edit Profil
        </button></a>
      </li>
      <li class="mb-1">
        <a href="<?PHP echo base_url();?>login/logout" class=" link-dark rounded" style="text-decoration: none"><button class="btn btn-single align-items-center rounded <?PHP if($main_menu == 'logout'){echo 'fw-bold';}?>">
          <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
        </button></a>
      </li>
    </ul>
</div>