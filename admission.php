<?php 
 
include('header.php');
$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "aadharcenter";
try{
	$con=new PDO("mysql:host=$mysql_db_hostname;dbname=$mysql_db_database","$mysql_db_user","$mysql_db_password");
}catch(PDOExection $e){
	echo $e->getMessage();
}

$sql="select id,name from district";
$stmt=$con->prepare($sql);
$stmt->execute();
$arrdistrict=$stmt->fetchAll(PDO::FETCH_ASSOC);

 ?>

 <script>
 	

        function validateAadhar() {
            const input = document.getElementById("aadhar_number").value;
            
            if (!/^\d{12}$/.test(input)) {
                //alert("Please enter a valid 12-digit number.");
                Swal.fire({
                    icon: "error",
                    title: "Invalid Aadhar Number",
                    text: "Enter proper 12 digit number",
                });
                return false;
            }
            
            return true;
        }

        function validateMobile() {
            const input = document.getElementById("mobile").value;
            
            if (!/^\d{10}$/.test(input)) {
               Swal.fire({
                    icon: "error",
                    title: "Invalid Mobile Number",
                    text: "Enter proper 10 digit number",
                });
                return false;
            }
            
            return true;
        }
    </script>



		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Forms</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Wizard</li>
							</ol>
						</nav>
					</div>
					
				</div>
			  <!--end breadcrumb-->

			  <!--start stepper one--> 
			   
			    <h6 class="text-uppercase">Non Linear</h6>
			    <hr>
				<div id="stepper1" class="bs-stepper">
				  <div class="card">
					
					<div class="card-header">
						<div class="d-lg-flex flex-lg-row align-items-lg-center justify-content-lg-between" role="tablist">
							<div class="bs-stepper-line"></div>
							<div class="step" data-target="#test-l-1">
							  <div class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
								<div class="bs-stepper-circle">1</div>
								<div class="">
									<h5 class="mb-0 steper-title">Machin Info</h5>
									<p class="mb-0 steper-sub-title">Enter Machin Type</p>
								</div>
							  </div>
							</div>
							<div class="bs-stepper-line"></div>
							<div class="step" data-target="#test-l-2">
								<div class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
								  <div class="bs-stepper-circle">2</div>
								  <div class="">
									  <h5 class="mb-0 steper-title">Aadhar Form</h5>
									  <p class="mb-0 steper-sub-title">Aadhar Enrolment/Update Form</p>
								  </div>
								</div>
							  </div>
							 <div class="bs-stepper-line"></div>
							<!--<div class="step" data-target="#test-l-3">
								<div class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
								  <div class="bs-stepper-circle">3</div>
								  <div class="">
									  <h5 class="mb-0 steper-title">Payment</h5>
									  <p class="mb-0 steper-sub-title">Payment Details</p>
								  </div>
								</div>
							  </div> -->
							 
						  </div>
					</div>
				    <div class="card-body">
					
					  <div class="bs-stepper-content">
						<form class="needs-validation"  novalidate>
						  <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
							<h5 class="mb-1">Machin Type And Admission Type</h5>
							<p class="mb-4">Enter your machin type(ex: WCD) and admission type(ex: New,Update)</p>

							<div class="row g-3">
								<div class="col-12 col-lg-6">
									<label for="machinetype" class="form-label">Machine Type</label>
									<select class="form-select" name="machinetype" id="machinetype" aria-label="Default select example" required>
										<option selected>Select Machine</option>
										<option value="WCD1">WCD 1</option>
											<option value="WCD2">WCD 2</option>
											<option value="DIT">DIT</option>
											<option value="Other1">Other 1</option>
											<option value="Other2">Other 2</option>
									  </select>
								</div>
								<div class="col-12 col-lg-6">
									<label for="admissiontype" class="form-label">Admission Type</label>
									<select class="form-select" name="admissiontype" id="admissiontype" aria-label="Default select example" required />
										<option selected>Select Type</option>
										
										<option value="New">New</option>
										<option value="Mandatory Biometric">Mandatory Biometric</option>
										<optgroup label="Update">
    										<option value="Biometric">Biometric</option>
											<option value="Demographic">Demographic</option>
											<option value="KYC">KYC</option>
  										</optgroup>
									  </select>
								</div>
								<div class="col-12 col-lg-6">
									<!-- <button class="btn btn-primary px-4" onclick="fetchData(); stepper1.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button> -->

									<button class="btn btn-primary px-4" onclick="validateFormAndNext();stepper1.next();fetchData()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>

								</div>
							</div><!---end row-->
							
						  </div>

						  <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">

							<h5 class="mb-1">Customer Details</h5>
							<p class="mb-4"></p>


							<?php
								date_default_timezone_set("Asia/Kolkata");
							?>


							<div class="row g-3">
								<div class="col-12 col-lg-4">
									<label for="fill_date" class="form-label">Date</label>
									<input class="form-control" name="fill_date" id="fill_date" type="date" placeholder="" aria-label="readonly input example"  value="" required />
								</div>
								<!-- <div class="col-12 col-lg-4">
									<label for="fill_time" class="form-label">Time</label>
									<input class="form-control" name="fill_time" id="fill_time" type="time" placeholder="" aria-label="readonly input example" value="">
								</div> -->
								<div class="col-12 col-lg-4">
    								<label for="fill_time" class="form-label">Time</label>
    								<input class="form-control" name="fill_time" id="fill_time" type="text" placeholder="HH:MM:SS" oninput="autoFormatTime(this)" required />
								</div>
								<div class="col-12 col-lg-4">
									<label for="registration_num" class="form-label">Enrollment No.</label>
									<input class="form-control" name="registration_num" id="registration_num" type="text" placeholder="" aria-label="readonly input example"  readonly="" value="" required >
								</div>

								<div class="col-12 col-lg-6">
									<label for="registration_no" class="form-label">Enrollment No.</label>
									<input class="form-control limit-input" name="registration_no" id="registration_no" type="text" maxlength="5" placeholder="xxxxx"  value="" required/>
								</div>
								<div class="col-12 col-lg-6">
									<label for="aadhar_number" class="form-label">Aadhar No.</label>
									<input class="form-control limit-input" name="aadhar_number" id="aadhar_number" type="text" placeholder="xxxx xxxx xxxx"  value="" onchange="validateAadhar()" maxlength="12" required/>
								</div>

								<div class="col-12 col-lg-4">
									<label for="full_name" class="form-label">Full Name</label>
									<input class="form-control" name="full_name" id="full_name" type="text" placeholder="Name of customer"  value="" required/>
								</div>

								<div class="col-12 col-lg-4">
									<label for="mobile" class="form-label ">Mobile No.</label>
									<input class="form-control limit-input" name="mobile" id="mobile" type="text" placeholder="xxxxxxxxxx" maxlength="10"  value="" onchange="validateMobile()" required/>
								</div>

								<div class="col-12 col-lg-4">
									<label for="dob" class="form-label">Date Of Birth</label>
									<input class="form-control" name="dob" id="dob" type="date" placeholder="" aria-label="readonly input example"  value="" required/>
								</div>



								<!--start dist/taluka/village -->
								<div class="col-12 col-lg-4">
									<label for="district" class="form-label">Select District</label>
									<select class="form-control" name="district" id="district" aria-label="Default select example" required/>
										<option value="-1">-- Select District --</option>
										<?php
							foreach($arrdistrict as $district){
								?>
								<option value="<?php echo $district['id']?>"><?php echo $district['name']?></option>
								<?php
							}
							?>
										
									  </select>
								</div>
								<div class="col-12 col-lg-4">
									<label for="taluka" class="form-label">Select Taluka</label>
									<select class="form-select" name="taluka" id="taluka" aria-label="Default select example" required/>
										 <option value="">-- Select Taluka --</option>
									  </select>
								</div>
								<div class="col-12 col-lg-4">
									<label for="village" class="form-label">Select Village</label>
									<select class="form-select" name="village" id="village" aria-label="Default select example" required/>
										<option value="">-- Select Village --</option>
										
									  </select>
								</div>
					
								<div class="col-12">
									<div class="col-12">
									<div class="d-flex align-items-center gap-3">
										<button class="btn btn-primary px-4" onclick="stepper1.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
										<button class="btn btn-success px-4" id="submit_button" type="submit" onclick="validateFormAndNext();submitForm()">Submit</button>
									</div>
								</div>
								</div>
							</div>
							</div><!---end row-->
							
						  </div>

						  <div id="test-l-3" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger3">
							<h5 class="mb-1">Your Education Information</h5>
							<p class="mb-4">Inform companies about your education life</p>

							
								
							</div>
							<!--end row-->
							 
						  </div>

						 
							
						  </div>
						</form>
					  </div>
					   
					</div>
				   </div>
				 </div>
				<!--end stepper one--> 
				  
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->

	<!-- search modal -->
    
    <!-- end search modal -->




	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
	<script src="assets/plugins/bs-stepper/js/main.js"></script>
	
	<!--app JS-->
	<script src="assets/js/app.js"></script>

	
	<!--notification js -->
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
<script>
    $(document).ready(function() {
        var admissionTypeSelect = $('#admissiontype');
        var aadharNumberInput = $('#aadhar_number');

        admissionTypeSelect.on('change', function() {
            var selectedAdmissionType = admissionTypeSelect.val();
            if (selectedAdmissionType === 'New') {
                aadharNumberInput.prop('disabled', true);
            } else {
                aadharNumberInput.prop('disabled', false);
            }
        });
    });
</script>



<!-- --------------------- -->


	<script type="text/javascript">
		function limitInputToAlphabets(inputElement) {
    	inputElement.addEventListener("input", function() {
        // Remove non-alphabetic characters and spaces
        this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
    	});
	}

	const inputField = document.getElementById("full_name");

	// Automatically call the function on every change
	limitInputToAlphabets(inputField);
	</script>
<script>
    function limitInputLengthAndNumbersOnly(inputElement, maxLength) {
        inputElement.addEventListener("input", function() {
            // Remove non-numeric characters
            this.value = this.value.replace(/[^0-9]/g, "");

            // Limit input length
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });
    }

    const inputFields = document.querySelectorAll(".limit-input");
    inputFields.forEach(function(inputField) {
        let maxLength = parseInt(inputField.getAttribute("maxlength"));
        limitInputLengthAndNumbersOnly(inputField, maxLength);
    });
</script>
<script>
    function autoFormatTime(inputField) {
        const value = inputField.value;

        // Remove non-numeric characters
        const cleanedValue = value.replace(/[^\d]/g, '');

        // Split cleaned value into hours, minutes, and seconds
        const hours = cleanedValue.substring(0, 2);
        const minutes = cleanedValue.substring(2, 4);
        const seconds = cleanedValue.substring(4, 6);

        // Construct the formatted time with colons
        const formattedTime = `${hours}:${minutes}:${seconds}`;

        // Update the input field
        inputField.value = formattedTime;
    }
</script>



	<!-- script for district/taluka/villages -->
<script>
	$(document).ready(function(){
		jQuery('#district').change(function(){
			var id=jQuery(this).val();
			if(id=='-1'){
				jQuery('#taluka').html('<option value="-1">Select taluka</option>');
			}else{
				$("#divLoading").addClass('show');
				jQuery('#taluka').html('<option value="-1">Select taluka</option>');
				jQuery('#village').html('<option value="-1">Select village</option>');
				jQuery.ajax({
					type:'post',
					url:'get_data.php',
					data:'id='+id+'&type=taluka',
					success:function(result){
						$("#divLoading").removeClass('show');
						jQuery('#taluka').append(result);
					}
				});
			}
		});
		jQuery('#taluka').change(function(){
			var id=jQuery(this).val();
			if(id=='-1'){
				jQuery('#village').html('<option value="-1">Select village</option>');
			}else{
				$("#divLoading").addClass('show');
				jQuery('#village').html('<option value="-1">Select village</option>');
				jQuery.ajax({
					type:'post',
					url:'get_data.php',
					data:'id='+id+'&type=village',
					success:function(result){
						$("#divLoading").removeClass('show');
						jQuery('#village').append(result);
					}
				});
			}
		});
	});
	</script>


	<!-- end of district/taluka/village -->



<!-- script for fetching registration number -->

<script>
    function fetchData() {
        var selectedMachineType = document.getElementById("machinetype").value;

        $.ajax({
            url: "fetch_data.php",
            method: "POST",
            data: { machineType: selectedMachineType },
            dataType: "json",

            success: function (data) {
                if (data.error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error Fetching Data",
                        text: "Select Correct Machine Type",
                        timer: 2000,
                        showConfirmButton: false,
                        // 
                    }).then(function () {
                window.location.href = "admission.php"; // Redirect to admission.php
            });
                } 
                else {
                    document.getElementById("registration_num").value = data.registration_num;

                    Swal.fire({
                        icon: "success",
                        title: "Data Fetched Successfully",
                        timer: 1000,
                        showConfirmButton: false,
                    });
                }
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Error Fetching Data",
                    text: "An error occurred while fetching data.",
                });
            },
        });
    }
</script>




<script>
    function validateFormAndNext() {
        const forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms).forEach(function (form) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        });

        // If the form is valid, navigate to the next step
        // if (document.querySelector('.needs-validation.was-validated') === null) {
        //     stepper1.next();
        // }
    }
    </script>
    <script>
    
    // Define your submitForm() function as before
       function submitForm() {
        // const formattedDateTime = autoFormatDateTime();
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(document.querySelector('form')); // Get form data
        
        // Append the formattedDateTime to the formData
        //formData.append("formattedDateTime", formattedDateTime);

        $.ajax({
            url: "insert_data.php", // Replace with your PHP script URL
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Data Submitted Successfully",
                     text: response,
                    timer: 3000,
                    showConfirmButton: false,
                }).then(function () {
                    window.location.href = "admission.php"; // Redirect to admission.php
                });
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Error Submitting Data",
                    text: "An error occurred while submitting data.",
                });
            },
        });
    }
</script>



</body>

</html>
