<?php 

include('header.php');
include('db.php');

// Query to get total Inprocess count
	$sqlInprocess = "SELECT COUNT(*) AS inprocess_count FROM admission_data WHERE status = 'Inprocess'";
	$resultInprocess = mysqli_query($conn, $sqlInprocess);
	$rowInprocess = mysqli_fetch_assoc($resultInprocess);
	$inprocessCount = $rowInprocess['inprocess_count'];

// Query to get total Generated count
	$sqlGenerated = "SELECT COUNT(*) AS generated_count FROM admission_data WHERE status = 'Generated'";
	$resultGenerated = mysqli_query($conn, $sqlGenerated);
	$rowGenerated = mysqli_fetch_assoc($resultGenerated);
	$generatedCount = $rowGenerated['generated_count'];

// Query to get total Rejected count
	$sqlRejected = "SELECT COUNT(*) AS rejected_count FROM admission_data WHERE status = 'Rejected'";
	$resultRejected = mysqli_query($conn, $sqlRejected);
	$rowRejected = mysqli_fetch_assoc($resultRejected);
	$rejectedCount = $rowRejected['rejected_count'];

// Query to get total Hold count
	$sqlHold = "SELECT COUNT(*) AS hold_count FROM admission_data WHERE status = 'Hold'";
	$resultHold = mysqli_query($conn, $sqlHold);
	$rowHold = mysqli_fetch_assoc($resultHold);
	$holdCount = $rowHold['hold_count'];

// Query to get total Data Processing Error count
	$sqlDataProcessingError = "SELECT COUNT(*) AS data_processing_error_count FROM admission_data WHERE status = 'Data Processing Error'";
	$resultDataProcessingError = mysqli_query($conn, $sqlDataProcessingError);
	$rowDataProcessingError = mysqli_fetch_assoc($resultDataProcessingError);
	$dataProcessingErrorCount = $rowDataProcessingError['data_processing_error_count'];

// Query to get total EID Not Found count
	$sqlEIDNotFound = "SELECT COUNT(*) AS eid_not_found_count FROM admission_data WHERE status = 'EID Not Found'";
	$resultEIDNotFound = mysqli_query($conn, $sqlEIDNotFound);
	$rowEIDNotFound = mysqli_fetch_assoc($resultEIDNotFound);
	$eidNotFoundCount = $rowEIDNotFound['eid_not_found_count'];

// admission pie chart

	// Fetch admission types and counts from the database
		$sql = "SELECT admission_type, COUNT(*) AS admission_count FROM admission_data GROUP BY admission_type";
		$result = mysqli_query($conn, $sql);

		$admissionTypes = [];
		$counts = [];

		while ($row = mysqli_fetch_assoc($result)) {
    		$admissionTypes[] = $row['admission_type'];
    		$counts[] = $row['admission_count'];
		}






 ?>
				<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                 
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Generated</p>
								   <h4 class="my-1 text-success"><?php echo $generatedCount; ?></h4>
						
							   </div>
							      <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-check-circle'></i>
								</div>
						   </div>
					   </div>
					</div>
				  </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Rejected</p>
								   <h4 class="my-1 text-danger"><?php echo $rejectedCount; ?></h4>
								 
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-x-circle'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				 
 				<div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Inprocess</p>
								   <h4 class="my-1 text-warning"><?php echo $inprocessCount; ?></h4>
							
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-error'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>

				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Hold</p>
								   <h4 class="my-1 text-warning"><?php echo $holdCount; ?></h4>
							
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-kyoto text-white ms-auto"><i class='bx bxs-error'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				    <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Total Data Processing Error</p>
									<h4 class="my-1 text-info"><?php echo $dataProcessingErrorCount; ?></h4>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-analyse'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total EID Not Found</p>
								   <h4 class="my-1 text-danger"><?php echo $eidNotFoundCount; ?></h4>
								 
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-x-circle'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->
<!-- -------------------------------------------------------------------------------- -->

<?php
// Replace with your actual database credentials
include("db.php");
$sql = "SELECT DATE_FORMAT(fill_datetime, '%b %Y') AS month_year,
                COUNT(*) AS total_count,
                SUM(CASE WHEN status = 'Generated' THEN 1 ELSE 0 END) AS generated_count
        FROM admission_data
        GROUP BY month_year";

$result = $conn->query($sql);
$data = array();

// Create an associative array to store data for all months, initialized with zero counts
$allMonthsData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $allMonthsData[$row['month_year']] = $row;
    }
}

// Determine the current year
$currentYear = date('Y');

// Generate the months list for the current year
$monthsList = array();
for ($month = 1; $month <= 12; $month++) {
    $monthName = date('M', mktime(0, 0, 0, $month, 1, $currentYear));
    $monthsList[] = $monthName . ' ' . $currentYear;
}

// Create data for all months (initialize with zero counts if not present)
$finalData = array();

foreach ($monthsList as $month) {
    if (isset($allMonthsData[$month])) {
        $finalData[] = $allMonthsData[$month];
    } else {
        // If there's no data for a month, initialize with zero counts
        $finalData[] = array(
            "month_year" => $month,
            "total_count" => 0,
            "generated_count" => 0
        );
    }
}

$conn->close();
?>


				<div class="row">
                   <div class="col-12 col-lg-6 d-flex">
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0"> Overview</h6>
								</div>
								
							</div>
						</div>
						  <div class="card-body">
							
							<div class="chart-container-1" style="height: 390px;">
    							<canvas id="chart11"></canvas>
							</div>

						  </div>
						  
					  </div>
				   </div>

<!-- ---------------------------------------------------------------------------------- -->

				   <div class="col-12 col-lg-6 d-flex">
                       <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Admission Types</h6>
								</div>

							</div>
						</div>
						   <div class="card-body">
							<div class="chart-container-2" >
								<canvas id="chart21" ></canvas>
								
							  </div>
						   </div>
						
						 <ul class="list-group list-group-flush" id="admissionList">

  						  </ul>
					   </div>
				   </div>
				</div><!--end row-->

		<!--end row-->


			</div>
		</div>
		<!--end page wrapper -->




		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
	 function updateChartAndList() {
	 	 // Define an array of background colors
        const backgroundColors = [
            'rgba(255, 193, 7, 0.8)',
            'rgba(40, 167, 69, 0.8)',
            'rgba(220, 53, 69, 0.8)',
            'rgba(0, 123, 255, 0.8)',
            'rgba(0, 255, 255, 0.8)'
        ];
    // Debugging: Display the data received from PHP
    // console.log("admissionTypes:", <?php echo json_encode($admissionTypes); ?>);
    // console.log("counts:", <?php echo json_encode($counts); ?>);

    const admissionTypes = <?php echo json_encode($admissionTypes); ?>;
    const counts = <?php echo json_encode($counts); ?>;


    const ctx = document.getElementById('chart21').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: admissionTypes,
            datasets: [{
                label: 'Count',
                data: counts,
                backgroundColor: backgroundColors,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Update the list
        const admissionList = document.getElementById('admissionList');
        admissionList.innerHTML = ''; // Clear existing list items

        for (let i = 0; i < admissionTypes.length; i++) {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex bg-transparent justify-content-between align-items-center';
            listItem.style.backgroundColor = backgroundColors[i]; // Assign background color
            listItem.innerHTML = `${admissionTypes[i]} <span class="badge rounded-pill" style="background-color: ${backgroundColors[i]}; color: white;">${counts[i]}</span>`;
            admissionList.appendChild(listItem);
        }
    }
     // Call the function to initially update the chart and list
    updateChartAndList();

</script>

 <script>
        // Extract PHP data into JavaScript variable
        var chartData = <?php echo json_encode($finalData); ?>;

        // Function to create the chart
        function createChart(data) {
            const labels = data.map(item => item.month_year);
            const totalCounts = data.map(item => item.total_count);
            const generatedCounts = data.map(item => item.generated_count);

            // Create the chart
            var ctx = document.getElementById("chart11").getContext("2d");
            var chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Total Count",
                            data: totalCounts,
                            backgroundColor: "rgba(20, 171, 239, 0.7)",
                        },
                        {
                            label: "Generated Count",
                            data: generatedCounts,
                            backgroundColor: "rgba(255, 193, 7, 0.7)",
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                        },
                    },
                },
            });
        }

        // Call the createChart function to create the chart with PHP data
        createChart(chartData);
    </script>



	<!--start switcher-->
	

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/chart.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
</body>

</html>

