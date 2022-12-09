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
                <li><a href="<?php echo base_url() ?>maps" class="st-smooth-move">Maps</a></li>
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
          <h1 class="st-page-heading-title">Get Your Vaccine</h1>
          <div class="st-page-heading-subtitle">Find the nearest vaccination site</div>
        </div>
      </div>
    </div><!-- .st-page-heading -->
    <div class="st-height-b100 st-height-lg-b80"></div>
    <div class="row no-gutters">
      <div class="col">
          <div class="padding-45px">

              <!-- Listing Search -->
              <div class="listing-search">
                  <form class="row no-gutters">
                      <div class="col-md-4 col-6">
                          <div class="keywords">
                              <input class="listing-form first" type="text" placeholder="Keywords..." value="">
                          </div>
                      </div>
                      <div class="col-md-4 col-6">
                          <div class="categories dropdown">
                              <a class="listing-form d-block" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Categories</a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <button class="dropdown-item text-up-small" type="button">Doctors</button>
                                  <button class="dropdown-item text-up-small" type="button">Clinics</button>
                                  <button class="dropdown-item text-up-small" type="button">Pharmacies</button>
                                  <button class="dropdown-item text-up-small" type="button">Labs</button>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4 col-6">
                          <a class="listing-bottom background-dark box-shadow" href="#">Search Now</a>
                      </div>
                  </form>
              </div>
              <!-- // Listing Search -->

              <hr>
              <div class="float-left">14 Results Found</div>
              <div class="clearfix"></div>
              <hr>


              <div class="margin-tb-45px">
                  
                  <!-- clinic -->
                  <?PHP foreach($listvk->result() as $row){?>
                    <div class="background-white thum-hover box-shadow hvr-float full-width margin-bottom-45px">
                        <div class="float-lg-left margin-right-30px sm-mr-0px text-center sm-mt-35px">
                            <img src="http://placehold.it/200x200" alt="">
                        </div>
                        <div class="padding-lr-25px padding-tb-50px">
                            <span class="text-grey-2"><i class="far fa-map"></i> <?PHP echo $row->h_alamat?></span>
                            <h2><a href="#" class="d-block text-dark text-capitalize text-medium margin-tb-15px"><?PHP echo $row->h_name?></a></h2>
                            <div class="row no-gutters">
                                <div class="col-4"><a href="#" class="text-lime"><i class="far fa-bookmark"></i> Open Now!</a></div>
                                <div class="col-4 text-center"><a href="#" class="text-red"><i class="far fa-heart"></i> Save</a></div>
                                <div class="col-4 text-right"><a href="<?PHP echo base_url()?>hospital/detail?id=<?PHP echo $row->id_hospital?>" class="text-blue"><i class="far fa-hospital"></i> Details</a></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                  <?PHP }?>
                  <!-- // clinic -->
                  
                  
        
                  
              </div>
              <ul class="pagination pagination-md ">
                  <li class="page-item disabled"><a class="page-link rounded-0" href="#" tabindex="-1">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link rounded-0" href="#">Next</a></li>
              </ul>

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
