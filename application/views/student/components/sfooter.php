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
		<?php endif ?>
	</body>

</html>