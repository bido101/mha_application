<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mental Health Assessment - PLMUN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('resort/assets/img/plmun-logo2.png'); ?>" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('resort/assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/animate.css/animate.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('resort/assets/css/style.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resort/assets/css/toastr.min.css'); ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:plmuncomm@plmun.edu.ph">plmuncomm@plmun.edu.ph</a>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">PLMUN</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo me-auto"><img src="<?php echo base_url('resort/assets/img/plmun-logo.png'); ?>" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero"><i class="bi bi-house"></i>&nbsp;Home</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <?php if (!empty($this->session->userdata('userID'))): ?>
        <a class="appointment-btn scrollto" type="button" class="btn btn-primary" href="<?php echo site_url('/').$this->session->userdata('role'); ?>">
          <i class="bi bi-person-square"></i> Go to Dashboard <i class="bi bi-arrow-bar-right"></i>
        </a>
      <?php elseif(empty($this->session->userdata('userID'))): ?>
        <a class="appointment-btn scrollto" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>

        <a class="appointment-btn scrollto" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
          <i class="bi bi-box-arrow-in-right"></i> Register
        </a>
      <?php endif ?>

    </div>
  </header>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background: linear-gradient(90deg, rgba(255,204,0,1) 0%, rgba(6,59,58,1) 0%, rgba(11,142,88,1) 100%, rgba(255,204,0,1) 100%);">
          <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: #fff;"><i class="bi bi-box-arrow-in-right"></i> Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('/authentication'); ?>" method="post">
            <div class="mb-3 mt-3">
              <label for="id" class="form-label">PLMUN Identification No. <b>(ID)</b>:</label>
              <input type="number" class="form-control" id="id" placeholder="Employee/Student ID" name="identification_ID">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-warning" style="color: #fff;" name="btnLogin">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background: linear-gradient(90deg, rgba(255,204,0,1) 0%, rgba(6,59,58,1) 0%, rgba(11,142,88,1) 100%, rgba(255,204,0,1) 100%);">
          <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: #fff;"><i class="bi bi-box-arrow-in-right"></i> Registration</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('authentication/postRegisterUsers'); ?>" method="post">
            <div class="mb-3 mt-3">
              <label for="identification_ID" class="form-label">PLMUN Identification No. <b>(ID)</b>:</label>
              <input type="number" class="form-control" id="identification_ID" placeholder="Student ID" name="identification_ID">
            </div>
            <div class="mb-3 mt-3">
              <label for="firstname" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstname" placeholder="Input First Name" name="firstName">
            </div>
            <div class="mb-3 mt-3">
              <label for="middlename" class="form-label">Middle Name</label>
              <input type="text" class="form-control" id="middlename" placeholder="Input Middle Name" name="middleName">
            </div>
            <div class="mb-3 mt-3">
              <label for="lastname" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastname" placeholder="Input Last Name" name="lastName">
            </div>
            <div class="mb-3 mt-3">
              <label for="department" class="form-label">Courses</label>
              <select class="form-control" name="courseID" required id="department-name">
                <option value="0">-Select Course-</option>
                <?php foreach ($courses as $course): ?>
                  <option value="<?php echo ucwords($course['cID']); ?>">
                    <?php echo $course['courseName'].'-('.strtoupper($course['courseAbbreviation']).')'; ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">email</label>
              <input type="text" class="form-control" id="email" placeholder="Input Email" name="email">
            </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="mb-3">
              <label for="conpwd" class="form-label">Confirm Password:</label>
              <input type="password" class="form-control" id="conpwd" placeholder="Confirm password" name="conpassword">
            </div>
            <button type="submit" class="btn btn-warning" style="color: #fff;" name="btnRegister">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h3 style="color: #ffc107;">
        <u>Mental Health Assessment</u><br>
        <i style="text-shadow: 1px 1px 4px #000000;">Pamantasan ng Lungsod ng Muntinlupa</i>
      </h3>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="content">
              <h3>Mental Health Assessment</h3>
              <p style="text-align: justify;text-justify: inter-word; word-spacing: -2px;">
                The Mental Health Assessment program at PLMUN aims to proactively address the well-being of its community members by early detection and intervention of mental health challenges. Designed for confidentiality and individualized support, the program collaborates with mental health professionals, contributing to a stigma-free culture and continuous improvement in response to evolving needs. PLMUN's commitment to holistic development underscores the importance of mental health within the academic setting, fostering an environment that prioritizes well-being and resilience.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4 style="color: #fff;">Vision</h4>
                    <p style="text-align: justify;text-justify: inter-word; word-spacing: -2px;">
                      A dynamic and highly competitive Higher Education Institution (HEI) committed to people empowerment towards building a humane society.
                    </p>
                  </div>
                </div>
                <div class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-rocket"></i>
                    <h4 style="color: #fff;">Mission</h4>
                    <p style="text-align: justify;text-justify: inter-word; word-spacing: -2px;">
                      To provide quality, affordable and relevant education responsive to the changing needs of the local and global communities through effective and efficient integration of instruction, research and extension; to develop productive and God-loving individuals in society.
                    </p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.764610245657!2d121.00041258147458!3d14.391167052214712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1047d11d4fb%3A0x672c55f2cba8880!2sPamantasan%20ng%20Lungsod%20ng%20Muntinlupa!5e0!3m2!1sen!2sph!4v1703416042269!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>plmuncomm@plmun.edu.ph</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="<?php echo base_url('resort/forms/contact.php'); ?>" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>PLMUN</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('resort/assets/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
  <script src="<?php echo base_url('resort/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('resort/assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
  <script src="<?php echo base_url('resort/assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo base_url('resort/assets/js/main.js'); ?>"></script>
  <script src="<?php echo base_url('resort/assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('resort/assets/js/toastr.min.js'); ?>"></script>
  <?php if ($this->session->flashdata('successregmessage')): ?>
    <script type="text/javascript">
      $(function(){
        toastr.success("Successfully Registered");
      });
    </script>
  <?php endif ?>
  <?php if ($this->session->flashdata('errorregmessage')): ?>
    <script type="text/javascript">
      $(function(){
        toastr.error("Error in Registration");
      });
    </script>
  <?php endif ?>
  <?php if ($this->session->flashdata('errorlogin')): ?>
    <script type="text/javascript">
      $(function(){
        toastr.error("Error in Login");
      });
    </script>
  <?php endif ?>

</body>

</html>