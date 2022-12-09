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
  <link rel="icon" href="<?PHP echo base_url()?>assets/img/mini-logo.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/fontawesome.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/flaticon.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/slick.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/lightgallery.min.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/animate.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/select2.min.css" />
  <link rel="stylesheet" href="<?PHP echo base_url()?>assets/css/style.css" />
</head>

<body>
  <!-- Start Header Section -->
  <header class="st-site-header st-style1 st-sticky-header">
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-main-header-left">
            <a class="st-site-branding" href="index.html"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="Jendela Sehat" width="150px"></a>
          </div>
          <div class="st-main-header-right">
            <div class="st-nav">
              <ul class="st-nav-list">
                <li><a href="<?php echo base_url() ?>home">Home</a></li>
                <li><a href="<?php echo base_url() ?>vaksin">Vaccine</a></li>
                <li><a href="<?php echo base_url() ?>hospital">Hospitals</a></li>
                <li><a href="<?php echo base_url() ?>blog">Blog</a></li>
                <li><a href="<?php echo base_url() ?>home#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->

  <div class="st-content">
    <div class="st-page-heading st-dynamic-bg" data-src="../assets/img/hero-bg17.jpg">
      <div class="container">
        <div class="st-page-heading-in text-center">
          <h1 class="st-page-heading-title"><?PHP echo $selectedblog->row()->b_judul?></h1>
          
          <!-- <?PHP if($selectedblog->row()->pfizer == 1){?>
            <h1 class="st-page-heading-title"><?PHP echo $selectedblog->row()->b_judul?></h1>
          <?PHP }?>
          <?PHP if($selectedblog->row()->moderna == 1){?>
            <h1 class="st-page-heading-title"><?PHP echo $selectedblog->row()->b_judul?></h1>
          <?PHP }?> -->
          
          <div class="st-post-label">
            <span>By <a href="#">Admin</a></span>
            <span><?PHP $time = strtotime($selectedblog->row()->b_judul); $newformat = date('d M Y',$time); echo $newformat?> </span>
          </div>
        </div>
      </div>
    </div><!-- .st-page-heading -->
    <div class="st-height-b100 st-height-lg-b80"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-md-1">
          <div class="st-post-details st-style1">
           <?PHP echo $selectedblog->row()->b_content?>
          </div>
          
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
  <script src="<?PHP echo base_url()?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/isotope.pkg.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/jquery.slick.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/mailchimp.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/counter.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/lightgallery.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/ripples.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/wow.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/select2.min.js"></script>
  <script src="<?PHP echo base_url()?>assets/js/main.js"></script>
</body>
</html>
