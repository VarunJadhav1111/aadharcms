
<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){ ?>

<!doctype html>
<html lang="en">


<head>
<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/bs-stepper/css/bs-stepper.css" rel="stylesheet" />

	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>पंचायत समिती भुदरगड आधार नोंदणी केंद्र, गारगोटी</title>

	 <style>
        /* Hide the number input spinners */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }
        
        /* Restore the appearance for browsers that don't support the above CSS */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

<!-- <script src="js/sweetalert2.all.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.all.min.js
"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.min.css
" rel="stylesheet">

<!-- extra links from district ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- modal content -->

     <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@1.0.1/css/themify-icons.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style type="text/css">
  .modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}

.modal-content {
  background-color: #fff;
  margin: 15% auto;
  padding: 10px;
  border: 1px solid #888;
  border-radius: 5px;
  max-width: 450px;
}

.close {
  display: block;
  float: right;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover {
  color: #fff;
}

.form1 {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
</style>


</head>

<body>
	
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">AADHAR</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Customer</div>
					</a>
					<ul>
						<li> <a href="admission.php"><i class='bx bx-radio-circle'></i>Add New</a>
						</li>
						<li> <a href="form_data.php"><i class='bx bx-radio-circle'></i>List</a>
						</li>
						<li> <a href="biometric.php"><i class='bx bx-radio-circle'></i>Biometric</a>
						
							<ul>
					
						<li> <a href="receivedcall.php"><i class='bx bx-radio-circle'></i>Received Calls</a>
						</li>
						
					</ul>
						</li>
						
					</ul>
				</li>
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Enrollment</div>
					</a>
					<ul>
						<li> <a href="registration.php"><i class='bx bx-radio-circle'></i>Enrollment No Form</a>
						</li>
						<li> <a href="registration_data.php"><i class='bx bx-radio-circle'></i>Enrollment No Data</a>
						</li>
					</ul>
				</li>
				
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>	
<!-- do not touch this -->
					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
						
							<li class="nav-item   d-none d-sm-flex">
								<a class="nav-link " href="" data-bs-toggle=""><img src="" width="22" alt="">
								</a>
								
							</li>
							<li class="nav-item ">
								<a class="nav-link " data-bs-toggle="" href=""><i class=''></i></a>
								<div class="">
									<div class="app-container p-2 my-2">
									  <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
									  </div><!--end row-->
									</div>
								</div>
							</li>
							<li class="">
								<a class="" href="" data-bs-toggle="">
									</a>
								<div class=" ">
									
									<div class="header-notifications-list">
										
										<a class="" href="">
											
										</a>
										
									</div>
									
								</div>
							</li>
							<li class="nav-item ">
								<a class="" href="" role="" data-bs-toggle="" aria-expanded="false"> 
									
								</a>
								<div class="">
									
									<div class="header-message-list">
										
										<a class="dropdown-item" href="">
											
										</a>
									</div>
									<a href="">
										
									</a>
								</div>
							</li>
						</ul>
					</div>
<!-- do not touch this -->
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">Admin Login</p>
								<p class="designattion mb-0">Logout</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				<!-- 	<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info">

								<p class="user-name mb-0">Admin Login</p>
								
								<a class="user-name mb-0" href="logout.php">Log Out</a>
							</div>
						</a>
						
					</div> -->
				</nav>
			</div>
		</header>

<?php	
}else{
	header('location:signin.php');
	die();
}
?>
		<!--end header -->