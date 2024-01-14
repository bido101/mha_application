<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Admin Templates & Dashboard UI Kits">
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="<?php echo base_url('resort/assets/img/plmun-logo2.png'); ?>" />

		<!-- Title -->
		<title><?php echo $title; ?></title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/bootstrap.min.css'); ?>">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/font/style.css'); ?>">

		<!-- Main css -->
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/main.min.css'); ?>">


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/daterange.css'); ?>"/>

		<!-- Chartist css -->
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/chartist.min.css'); ?>" />
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/chartist-custom.css'); ?>" />

		<!-- Data Tables -->
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/datatables/dataTables.bs4.css'); ?>" />
		<link rel="stylesheet" href="<?php echo site_url('resort/dashboard_assets/dcss/datatables/dataTables.bs4-custom.css'); ?>" />
		<link href="<?php echo site_url('resort/dashboard_assets/dcss/datatables/buttons.bs.css'); ?>" rel="stylesheet" />
		<link href="<?php echo site_url('resort/dashboard_assets/dcss/classic.css'); ?>" rel="stylesheet" />
		<link href="<?php echo site_url('resort/dashboard_assets/dcss/classic.date.css'); ?>" rel="stylesheet" />
		<link href="<?php echo base_url('resort/assets/css/toastr.min.css'); ?>" rel="stylesheet">
	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">
				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="<?php echo site_url('/student'); ?>" class="logo">
						<img src="<?php echo base_url('resort/assets/img/plmun-logo.png'); ?>" alt="PLMUN LOGO" />
					</a>
					<a href="index.html" class="logo-sm">
						<img src="<?php echo base_url('resort/assets/img/plmun-logo2.png'); ?>" alt="PLMUN LOGO" />
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<li class="header-menu">General</li>
							<li class="sidebar-dropdown active">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Dashboards</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="<?php echo site_url('/counselor'); ?>" <?php if ($isActiveSideBar == 'isForDashboard'){echo 'class="current-page"'; } ?>>Counselor Dashboard</a>
										</li>
										<li>
											<a href="<?php echo site_url('/counselor/list_of_student_assessment?id=1'); ?>">Assessements</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->
			</nav>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<!-- Header start -->
				<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
					</div>
					<div class="header-items">

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name"><?php echo ucwords($this->session->userdata('firstName').' '.$this->session->userdata('middleName')[0].'. '.$this->session->userdata('lastName')); ?></span>
									<span class="avatar"><?php echo ucfirst($this->session->userdata('firstName')[0].''.$this->session->userdata('lastName')[0]); ?><span class="status busy"></span></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="<?php echo site_url('resort/assets/img/doctors/doctors-1.jpg'); ?>" alt="Admin Template">
											</div>
											<h5><?php echo ucwords($this->session->userdata('firstName').' '.$this->session->userdata('lastName')); ?></h5>
											<p><?php echo ucwords($this->session->userdata('role')); ?></p>
										</div>
										<!-- <a href="user-profile.html"><i class="icon-user1"></i> My Profile</a>
										<a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a> -->
										<a href="<?php echo site_url('authentication/logout'); ?>"><i class="icon-log-out1"></i> Sign Out</a>
									</div>
								</div>
							</li>
						</ul>
						<!-- Header actions end -->
					</div>
				</header>
				<!-- Header end -->

				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Dashboards</li>
						<li class="breadcrumb-item active"><?php echo $pagination; ?></li>
					</ol>

					<ul class="app-actions">
						<li>
							<a href="#" id="reportrange">
								<span class="range-text"></span>
								<i class="icon-chevron-down"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Page header end -->