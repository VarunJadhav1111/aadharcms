<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/auth-cover-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 07:24:57 GMT -->
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
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>पंचायत समिती भुदरगड आधार नोंदणी केंद्र, गारगोटी</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="assets/images/login-images/login-cover.svg" class="img-fluid auth-img-cover-login" width="650" alt=""/>
							</div>
						</div>
						
					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
										<h1 style="font-weight: bold; font-size: 2em;">पंचायत समिती भुदरगड आधार नोंदणी केंद्र, गारगोटी</h1>
									</div>
									<div class="mb-3 text-center">
										<img src="assets/images/logo-icon.png" width="220" alt="">
									</div>
									<div class="text-center mb-4">
										<h5 class="">Admin Login</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3">
											<div class="col-12">
												<label for="email" class="form-label" >Email</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="jhon@example.com">
											</div>
											<div class="col-12 first_box">
												<div class="d-grid">
													<button type="button" class="btn btn-primary" onclick="send_otp()">Send Otp</button>
												</div>
											</div>
											<div class="col-12 second_box">
												<label for="otp" class="form-label">Otp</label>
												<div class="input-group" >
													<input type="text" class="form-control border-end-0" id="otp" value="" placeholder="Enter Otp"> <a href="" class="input-group-text bg-transparent"></a>
												</div>
											</div>
											
											
											<div class="col-12 second_box">
												<div class="d-grid">
													<button type="button" class="btn btn-primary" onclick="submit_otp()">Sign in</button>
												</div>
											</div>
											<!-- <div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Don't have an account yet? <a href="#">Sign up here</a>
													</p>
												</div>
											</div> -->
										</form>
									</div>
									

								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<!-- <script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script> -->
	<script>
function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send_otp.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			if(result=='yes'){
				jQuery('.second_box').show();
				jQuery('.first_box').hide();
			}
			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}
		}
	});
}

function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='index.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>

<style>
.second_box{display:none;}
.field_error{color:red;}
</style>


</body>



</html>