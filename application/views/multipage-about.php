<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <!-- Page Title -->
  <title>Jendela Sehat </title>
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/mini-logo.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/flaticon.css" />
  <link rel="stylesheet" href="assets/css/slick.css" />
  <link rel="stylesheet" href="assets/css/lightgallery.min.css" />
  <link rel="stylesheet" href="assets/css/animate.css" />
  <link rel="stylesheet" href="assets/css/select2.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />

  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,700,400i,500%7CDancing+Script:700%7CDancing+Script:700" rel="stylesheet">
  <!-- animate -->
  <link rel="stylesheet" href="assets1/css/animate.css" />
  <!-- owl Carousel assets -->
  <link href="assets1/css/owl.carousel.css" rel="stylesheet">
  <link href="assets1/css/owl.theme.css" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
  <!-- hover anmation -->
  <link rel="stylesheet" href="assets1/css/hover-min.css">
  <!-- flag icon -->
  <link rel="stylesheet" href="assets1/css/flag-icon.min.css">
  <!-- main style -->
  <link rel="stylesheet" href="assets1/css/style.css">
  <!-- colors -->
  <link rel="stylesheet" href="assets1/css/colors/main.css">
  <!-- elegant icon -->
  <link rel="stylesheet" href="assets1/css/elegant_icon.css">
  <!-- maps -->
  <style>
    #map {
      height: 800px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
    #mapid{
      width: 100%; 
      height: 800px;
    }

  </style>
  <!-- leaflet -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
</head>

<body>
  <!-- Start Header Section -->
  <header class="st-site-header st-style1 st-sticky-header">
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-main-header-left">
            <a class="st-site-branding" href="index.html"><img src="assets/img/logo.png" alt="Jendela Sehat" width="150px"></a>
          </div>
          <div class="st-main-header-right">
            <div class="st-nav">
              <ul class="st-nav-list">
                <li><a href="<?php echo base_url() ?>home" class="st-smooth-move">Home</a></li>
                <li><a href="<?php echo base_url() ?>vaksin">Vaccine</a></li>
                <li><a href="<?php echo base_url() ?>hospital">Hospitals</a></li>
                <li><a href="<?php echo base_url() ?>blog">Blog</a></li>
                <li><a href="<?php echo base_url() ?>home#contact" class="st-smooth-move">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->

  <div class="st-content">
    <div class="st-page-heading st-size-md st-dynamic-bg" data-src="assets/img/hero-bg6.jpg">
      <div class="container">
        <div class="st-page-heading-in text-center">
          <h1 class="st-page-heading-title">Location Bogor Mapping</h1><br>
          <div class="st-page-heading-subtitle">Find the nearest location</div>
        </div>
      </div>
    </div><!-- .st-page-heading -->
    <div class="st-height-b100 st-height-lg-b80"></div>
    <div class="row no-gutters">
      <div class="col">
          <div class="padding-45px">
              <!-- This map content-->
              <!--The div element for the map -->
              <h1 class="st-hero-title cd-headline slide">
              Copy this link to get our API 
              </h1><br>
              <h3> API KEY : http://localhost/JendelaSehat4/api/hospital </h3><br>
              <div id="mapid"></div>

              

              <!-- 
               The `defer` attribute causes the callback to execute after the full HTML
               document has been parsed. For non-blocking uses, avoiding race conditions,
               and consistent behavior across browsers, consider loading using Promises
               with https://www.npmjs.com/package/@googlemaps/js-api-loader.
              -->
              <script>
                

                //leaflet

                var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11'
                  });

                var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/satellite-v9'
                  });


                var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                  });

                var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/dark-v10'
                  });


                var iconrs = L.icon({
                  iconUrl :'./././assets1/Marker/hospital_loc.png',
                  iconSize:[40,40],
                });
                var iconvk = L.icon({
                  iconUrl :'./././assets1/Marker/vaccine_loc.png',
                  iconSize:[40,40],
                });
                

                var baseMaps = {
                    "Default": peta1,
                    "Satelite": peta2,
                    "Street" : peta3,
                    "Dark" : peta4,
                };
                var rs = L.layerGroup();
                var vk = L.layerGroup();
                var overlayMaps = {
                  "Rumah Sakit": rs,
                  "Non Rumah Sakit":vk,
                };

                <?php foreach($listrs->result() as $row){?>

                  L.marker([<?PHP echo $row->lat?>, <?PHP echo $row->lng?> ],{icon:iconrs}).bindPopup(

                    '<h5><?PHP echo $row->h_name?></h5><?PHP echo $row->h_alamat?><br><br>Tersedia Vaksin :<br><br><div class="row"><?PHP if($row->h_pfizer == 1){?><a href="#" class="d-block border-radius-15 width-120px heigth-40px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Pfizer</div></a><?PHP }?><?PHP if($row->h_moderna == 1){?><a href="#" class="d-block border-radius-15 width-120px heigth-200px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Moderna</div></a><?PHP }?><?PHP if($row->h_sinovac == 1){?><a href="#" class="d-block border-radius-15 width-120px heigth-40px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Sinovac</div></a><?PHP }?><?PHP if($row->h_az == 1){?><a href="#" class="d-block border-radius-15 width-120px text-center heigth-20px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Astrazaneca</div></a><?PHP }?></div><a  href="<?PHP echo base_url()?>hospital/detail?id=<?PHP echo $row->id_hospital?>"><button type="button" class="btn btn-primary btn-sm">Detail</button></a></a></div>'
                    ).addTo(rs);

                <?PHP }?>
                <?php foreach($listvk->result() as $row){?>

                  L.marker([<?PHP echo $row->lat?>, <?PHP echo $row->lng?> ],{icon:iconvk}).bindPopup(
                    '<h5><?PHP echo $row->h_name?></h5><?PHP echo $row->h_alamat?><br><br><br><div class="row"><?PHP if($row->h_pfizer == 1){?><a href="#" class="d-block border-radius-15 width-120px heigth-40px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Pfizer</div></a><?PHP }?><?PHP if($row->h_moderna == 1){?><a href="#" class="d-block border-radius-15 width-120px heigth-200px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Moderna</div></a><?PHP }?><?PHP if($row->h_sinovac == 1){?><a href="#" class="d-block border-radius-15 width-120px heigth-40px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Sinovac</div></a><?PHP }?><?PHP if($row->h_az == 1){?><a href="#" class="d-block border-radius-15 width-120px text-center heigth-20px padding-left-15px margin-bottom-15px hvr-float"><div class="background-main-color text-white border-radius-15 padding-15px text-center opacity-hover-7"><div class="icon margin-bottom-15px opacity-7"><img src="<?php echo base_url() ?>assets/img/vaccine-bottle.png" alt=""></div>Astrazaneca</div></a><?PHP }?></div><a  href="<?PHP echo base_url()?>hospital/detail?id=<?PHP echo $row->id_hospital?>"><button type="button" class="btn btn-primary btn-sm">Detail</button></a></a></div>'
                    ).addTo(vk);

                <?PHP }?>
                var map = L.map('mapid', {
                    center: [-6.589, 106.807],
                    zoom: 13,
                    layers: [peta1,rs,vk]
                });
                var layerControl = L.control.layers(baseMaps,overlayMaps).addTo(map);
                


                
              </script>
              
          </div>
      </div>
    </div>
    <div class="st-height-b100 st-height-lg-b80"></div>
  </div>

  <!-- Start Footer -->
  <footer class="st-site-footer st-sticky-footer st-dynamic-bg" data-src="assets/img/footer-bg.png">
    <div class="st-main-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <div class="st-text-field">
                <img src="assets/img/footer-logo.png" alt="Nischinto" class="st-footer-logo">
                <div class="st-height-b25 st-height-lg-b25"></div>
                <div class="st-footer-text">We care about your health, we do something to make your lifestyle better and healthier.
                  Let’s get fully vaccinated with Jendela Sehat.</div>
                <div class="st-height-b25 st-height-lg-b25"></div>
                <ul class="st-social-btn st-style1 st-mp0">
                  <li><a href="https://www.instagram.com/jendela.sehat/"><i class="fab fa-instagram-square"></i></a></li>
                  <li><a href="https://www.instagram.com/jendela.sehat/"><i class="fab fa-facebook-square"></i></a></li>
                  <li><a href="https://www.instagram.com/jendela.sehat/"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="https://www.instagram.com/jendela.sehat/"><i class="fab fa-twitter-square"></i></a></li>
                </ul>
              </div>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title">Useful Links</h2>
              <ul class="st-footer-widget-nav st-mp0">
                <li><a href="#"><i class="fas fa-chevron-right"></i>FAQs</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Blog</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Weekly timetable</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i>Terms & Conditions</a></li>
              </ul>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title">Pages</h2>
              <ul class="st-footer-widget-nav st-mp0">
                <li><a href="blog-right-sidebar1.html"><i class="fas fa-chevron-right"></i>Vaccine</a></li>
                <li><a href="blog-right-sidebar.html"><i class="fas fa-chevron-right"></i>Hospitals</a></li>
                <li><a href="blog-no-sidebar.html"><i class="fas fa-chevron-right"></i>Blog</a></li>
              </ul>
            </div>
          </div><!-- .col -->
          <div class="col-lg-3">
            <div class="st-footer-widget">
              <h2 class="st-footer-widget-title">Contacts</h2>
              <ul class="st-footer-contact-list st-mp0">
                <li><span class="st-footer-contact-title">Address:</span> Jl. Kumbang No.14, Kota Bogor, Jawa Barat 16128
                </li>
                <li><span class="st-footer-contact-title">Email:</span> jendelsehat.js@gmail.com</li>
                <li><span class="st-footer-contact-title">Phone:</span> (+62) - 821 2323 2022
            </div>
          </div><!-- .col -->
        </div>
      </div>
    </div>
    <div class="st-copyright-wrap">
      <div class="container">
        <div class="st-copyright-in">
          <div class="st-left-copyright">
            <div class="st-copyright-text">Copyright 2022</div>
          </div>
          <div class="st-right-copyright">
            <div id="st-backtotop"><i class="fas fa-angle-up"></i></div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Start Video Popup -->
  <div class="st-video-popup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
      <div class="st-video-popup-layer"></div>
      <div class="st-video-popup-container">
        <div class="st-video-popup-align">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="about:blank"></iframe>
          </div>
        </div>
        <div class="st-video-popup-close"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->

  <!-- Scripts -->
  <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="assets/js/isotope.pkg.min.js"></script>
  <script src="assets/js/jquery.slick.min.js"></script>
  <script src="assets/js/mailchimp.min.js"></script>
  <script src="assets/js/counter.min.js"></script>
  <script src="assets/js/lightgallery.min.js"></script>
  <script src="assets/js/ripples.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/select2.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
