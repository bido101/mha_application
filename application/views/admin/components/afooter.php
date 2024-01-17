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

		<!-- Apex Charts -->
		<script src="<?php echo site_url('resort/dashboard_assets/vendor/apex/apexcharts.min.js'); ?>"></script>

		<!-- Main JS -->
		<script src="<?php echo site_url('resort/dashboard_assets/djs/main.js'); ?>"></script>
		<script src="<?php echo base_url('resort/assets/js/toastr.min.js'); ?>"></script>
		  <?php if ($this->session->flashdata('successInsertCategory')): ?>
		    <script type="text/javascript">
		      $(function(){
		        toastr.success("Successfully Inserted");
		      });
		    </script>
		  <?php endif ?>
		  <?php if ($this->session->flashdata('errorInsertCategory')): ?>
		    <script type="text/javascript">
		      $(function(){
		        toastr.error("Error to Insert");
		      });
		    </script>
		  <?php endif ?>
		<!-- Notification for Question Panel -Start- -->
		<?php if ($this->session->flashdata('errorForNotCategory')): ?>
		    <script type="text/javascript">
		      $(function(){
		        	toastr.error("Please Select Category");
		      });
		    </script>
		<?php elseif ($this->session->flashdata('successInsertQuestion')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Inserted Question");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorInsertQuestion')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error on Inserting");
		      });
		    </script>
		<?php elseif($this->session->flashdata('successUpdateQuestion')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Update Question");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorUpdateQuestion')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error");
		      });
		    </script>
		<?php elseif($this->session->flashdata('successRemovedQuestion')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.info("Successfully Removed Question");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorRemovingQuestion')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error");
		      });
		    </script>
		<?php endif ?>
		<!-- Notification for Question Panel -End- -->

		<!-- Notification for Users Panel -Start- -->
		<?php if($this->session->flashdata('successregmessage')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Inserted User");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorregmessage')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error");
		      });
		    </script>
		<?php elseif($this->session->flashdata('removedUsers')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Removed");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorToInsertUsers')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Error to Remove Users");
		      });
		    </script>
		<?php endif ?>
		<!-- Notification for Users Panel -End- -->
		<!-- Notification for Departments Panel -start- -->
		<?php if ($this->session->flashdata('insertedDepartment')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Inserted");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorToInsertDepartment')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error to insert Department");
		      });
		    </script>
		<?php elseif($this->session->flashdata('removedDepartment')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Removed");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorToInsertDepartment')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error to Remove Department");
		      });
		    </script>
		<?php endif ?>
		<!-- Notification for Department Panel -End- -->
		<!-- Notification for Course Panel -Start- -->
		<?php if ($this->session->flashdata('errorSelectCourseCategory')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Please Select Category");
		      });
		    </script>
		<?php elseif($this->session->flashdata('successInsertCourse')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Inserted Course");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorInsertCourse')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error to Insert Course");
		      });
		    </script>
		<?php elseif($this->session->flashdata('insertedCourse')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Inserted");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorToInsertCourse')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error to insert Course");
		      });
		    </script>
		<?php elseif($this->session->flashdata('removedCourse')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.success("Successfully Removed");
		      });
		    </script>
		<?php elseif($this->session->flashdata('errorToInsertCourse')): ?>
			<script type="text/javascript">
		      $(function(){
		        	toastr.error("Error to Remove Course");
		      });
		    </script>
		<?php endif ?>
		<!-- Notification for Course Panel -end- -->
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