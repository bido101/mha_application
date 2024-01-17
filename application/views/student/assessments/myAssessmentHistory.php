<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
	<div class="row gutters">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="card"  style="padding-left: 10px;padding-right: 10px;">
				<div class="card-header">
					<div class="card-title">Assessment History</div>
					<hr>
				</div>
				<div class="card-body p-0">
					<?php foreach ($pre_assess as $pavalue): ?>						
							<div class="row">
								<div class="col-sm-6">
									<?php foreach ($category as $cvalue): ?>
										<div class="accordion" id="withIconsAccordion" style="margin-bottom: 10px;">
											<div class="accordion-container">
												<div class="accordion-header" id="withIconOne">
													<a href="" class="" data-toggle="collapse" aria-expanded="true" aria-controls="collapseWithIconOne">
														<i class="icon icon-shield1"></i><?php echo $cvalue['categoryName']; ?>
													</a>
												</div>
												<div class="collapse show" aria-labelledby="withIconOne"
														data-parent="#withIconsAccordion">
													<div class="accordion-body">
														<?php  
															$unser = unserialize($pavalue['questionID']);
															foreach ($unser as $unservalue){
																foreach ($allquestions as $aqvalue){
																	if ($unservalue == $aqvalue['id']){
																		if ($cvalue['gcID'] == $aqvalue['catID']) {
														?>
															<div class="col-lg-4">
																<div class="form-check form-check-inline" style="background-color: #1a8e5f;padding: 5px;margin-bottom: 10px;border-radius: 5px;color: #fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">	
																	<label class="form-check-label"><?php echo $aqvalue['question']; ?></label>
																</div>
															</div>
														<?php
																		}
																	}
																}  
															}
														?>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
								<div class="col-sm-6">
									<div class="accordion" id="withIconsAccordion">
										<div class="accordion-container">
											<div class="accordion-header" id="withIconOne">
												<a href="" class="" data-toggle="collapse" aria-expanded="true" aria-controls="collapseWithIconOne">
													<i class="icon icon-info"></i>Appointment Details
												</a>
											</div>
											<div class="collapse show" aria-labelledby="withIconOne"
													data-parent="#withIconsAccordion">
												<div class="accordion-body">
													<label>Status: </label>
														<a href="<?php echo site_url('counselor/list_of_student_assessment?id=1'); ?>" <?php if ($this->input->get('id') == 1){echo 'class="active"';} ?>>
															<i class="icon-tag1"></i> Requesting to Assess
														</a>
														<a href="<?php echo site_url('counselor/list_of_student_assessment?id=5'); ?>" <?php if ($this->input->get('id') == 5){echo 'class="active"';} ?>>
															<i class="icon-check"></i> Approved Request
														</a>
														<a href="<?php echo site_url('counselor/list_of_student_assessment?id=2'); ?>" <?php if ($this->input->get('id') == 2){echo 'class="active"';} ?>>
															<i class="icon-error"></i> Done Assessing
														</a>
														<a href="<?php echo site_url('counselor/list_of_student_assessment?id=3'); ?>" <?php if ($this->input->get('id') == 3){echo 'class="active"';} ?>>
															<i class="icon-stars"></i> Declined
														</a>
														<a href="<?php echo site_url('counselor/list_of_student_assessment?id=4'); ?>" <?php if ($this->input->get('id') == 4){echo 'class="active"';} ?>>
															<i class="icon-receipt"></i> All 
														</a>
													<br>
													<div class="form-group">
														<label for="gcName">Guidance Counselor Name:</label>
														<input type="text" class="form-control" id="gcName" placeholder="Guidance Counselor Name" readonly>
													</div>
													<div class="form-group">
														<label for="apptD">Appoitment Date:</label>
														<input type="text" class="form-control" id="apptD" placeholder="Appoitment Date" readonly>
													</div>	
													<div class="form-group">
														<label for="vl">Virtual Link:</label>
														<input type="text" class="form-control" id="vl" placeholder="Virtual Link" readonly>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php endforeach ?>
					<br>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>	
	</div>
</div>
<!-- Main container end -->