	</div>
	<!-- Page content end -->
</div>
		<!-- Page wrapper end -->

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/jquery.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/bootstrap.bundle.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/moment.js'); ?>"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/slimscroll.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/custom-scrollbar.js'); ?>"></script>

		<!-- Daterange -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/daterange.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/custom-daterange.js'); ?>"></script>

		<!-- Chartist JS -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/chartist.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/chartist-tooltip.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/chartist-tooltip.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/bar-chart-orders.js'); ?>"></script>

		<!-- jVector Maps -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/jquery-jvectormap-2.0.3.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/world-mill-en.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/gdp-data.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/world-map-markers2.js'); ?>"></script>

		<!-- Rating JS -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/raty.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/raty-custom.js'); ?>"></script>


		<!-- Data Tables -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/dataTables.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/dataTables.bootstrap.min.js'); ?>"></script>

		<!-- Custom Data tables -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/custom-datatables.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/fixedHeader.js'); ?>"></script>

		<!-- Download / CSV / Copy / Print -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/buttons.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/jszip.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/pdfmake.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/vfs_fonts.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/html5.min.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/datatables/buttons.print.min.js'); ?>"></script>
		<!-- Datepickers -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/picker.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/picker.date.js'); ?>"></script>
		<script src="<?php echo site_url('resort/dashboard_assets/djs/custom-picker.js'); ?>"></script>

		<!-- Main JS -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/main.js'); ?>"></script>
		<script src="<?php echo base_url('resort/assets/js/toastr.min.js'); ?>"></script>

		<!-- Apex Charts -->
		<script src="<?php echo site_url('resort/dashboard_assets/vendor/apex/apexcharts.min.js'); ?>"></script>


		<?php if ($this->session->flashdata('successSubmittedAssessment')): ?>
		    <script type="text/javascript">
		      $(function(){
		        toastr.success("Your Pre-Assessment has Successfully been submitted");
		      });
		    </script>
		<?php elseif ($this->session->flashdata('errorSubmittingAssessment')): ?>
		 	<script type="text/javascript">
		      $(function(){
		        toastr.error("Error in Submitting your Assessnent, Plase try again");
		      });
		    </script>
		<?php elseif ($this->session->flashdata('errorNoSelectedData')): ?>
		 	<script type="text/javascript">
		      $(function(){
		        toastr.error("Please Select of the Corresponding Questions");
		      });
		    </script>
		 <?php elseif($this->session->flashdata('successUpdateAssessment')): ?>
		 	<script type="text/javascript">
		      $(function(){
		        toastr.success("Approved Request");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorUpdatingAssessment')): ?>
		 	<script type="text/javascript">
		      $(function(){
		        toastr.error("Error to Update Assessment");
		      });
		    </script>
		<?php elseif ($this->session->flashdata('successInsertRemarks')): ?>
			<script type="text/javascript">
		      $(function(){
		        toastr.success("Successfully Submmited the Remarks");
		      });
		    </script>
		<?php elseif ($this->session->flashdata('errorInsertingRemarks')): ?>
			<script type="text/javascript">
		      $(function(){
		        toastr.error("Error");
		      });
		    </script>
		<?php endif ?>
		<!-- Notification for user profile Panel -start- -->
		<?php if ($this->session->flashdata('messageupdateProfile')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Inserted");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorToUpdateProfile')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error to Update Profile");
		      });
		    </script>
		<?php endif ?>
		<!-- Notification for user profile Panel -start- -->
		<script>
		  var loadFile = function(event) {
		  var reader = new FileReader();
		      reader.onload = function(){
		          var output = document.getElementById('output');
		                          
		          output.src = reader.result;

		      };
		      reader.readAsDataURL(event.target.files[0]);
		  };
		</script>

		<script type="text/javascript">
			var options = {
				chart: {
					width: 400,
					type: 'pie',
				},
				labels: [<?php foreach ($departments as $department) {echo '"'.strtoupper($department['departmentAbbreviation']).'",';}?>],
				series: [
							<?php  
								foreach ($departments as $department) {
									$res = 0;
									foreach ($assessments as $assessment) {
										if ($department['dID'] == $assessment['deptID']) {
												$res += 1;
										}
									}	
									echo $res.',';
								}	
							?>
						],
				responsive: [{
					breakpoint: 480,
					options: {
						chart: {
							width: 200
						},
						legend: {
							position: 'bottom'
						}
					}
				}],
				stroke: {
					width: 0,
				},
				fill: {
					type: 'gradient',
				},
				colors: ['#1a8e5f', '#262b31', '#434950', '#63686f', '#868a90'],
			}
			var chart = new ApexCharts(
				document.querySelector("#basic-pie-graph-gradient"),
				options
			);
			chart.render();
		</script>

		<script type="text/javascript">
			var options = {
				chart: {
					width: 400,
					type: 'pie',
				},
				labels: [<?php foreach ($courses as $course) {echo '"'.strtoupper($course['courseAbbreviation']).'",';}?>],
				series: [
							<?php  
								foreach ($courses as $course) {
									$res = 0;
									foreach ($assessments as $assessment) {
										if ($course['cID'] == $assessment['courseID']) {
												$res += 1;
										}
									}	
									echo $res.',';
								}	
							?>
						],
				responsive: [{
					breakpoint: 480,
					options: {
						chart: {
							width: 200
						},
						legend: {
							position: 'bottom'
						}
					}
				}],
				stroke: {
					width: 0,
				},
				colors: ['#1a8e5f', '#262b31', '#434950', '#63686f', '#868a90'],
			}
			var chart = new ApexCharts(
				document.querySelector("#basic-pie-graph"),
				options
			);
			chart.render();
		</script>

	</body>

</html>