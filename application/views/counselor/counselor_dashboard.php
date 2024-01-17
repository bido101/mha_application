<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
	<div class="row gutters">
		<div class="col-sm-12">
			<div class="table-container">
				<div class="t-header">List of Scheduled Appoitments</div>
				<div class="table-responsive">
					<table id="copy-print-csv" class="table custom-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Student Name</th>
								<th>Scheduled Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								foreach ($assessment as $avalue){
									if ($avalue['assessment_status'] == 5){
							?>
										<tr>
											<td><?php echo $num++.'.'; ?></td>
											<td>
												<?php echo ucwords($avalue['firstName'].' '.$avalue['lastName']); ?>
											</td>
											<td>
												<?php echo $avalue['appointmentDate'];?>
											</td>
											<td>
												<div class="td-actions">
													<a href="#" class="icon blue" data-placement="top" title="View" data-toggle="modal" data-target=".bd-example-modal-xl<?php echo $avalue['id']; ?>">
														<i class="icon-visibility"></i>											
													</a>
												</div>
											</td>
										</tr>

										<div class="modal fade bd-example-modal-xl<?php echo $avalue['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-xl">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="myExtraLargeModalLabel">View</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
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
																			<div class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
																				<div class="accordion-body">
																					<?php  
																						$unser = unserialize($avalue['questionID']);
																						foreach ($unser as $unservalue){
																							foreach ($questions as $aqvalue){
																								if ($unservalue == $aqvalue['id']){
																									if ($cvalue['gcID'] == $aqvalue['catID']) {
																					?>
																										<div class="col-lg-4">
																											<div class="form-check form-check-inline" style="background-color: #1a8e5f;padding: 5px;margin-bottom: 10px;border-radius: 5px;color: #fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">	
																												<label class="form-check-label">
																													<?php echo ucwords($aqvalue['question']); ?>
																												</label>
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
																			<a href="" class="" data-toggle="collapse" aria-expanded="true" aria-controls="SollapseWithIconOne">
																				<i class="icon icon-info"></i>Appointment Details
																			</a>
																		</div>
																		<div class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
																			<div class="accordion-body">
																				<label>Status: </label>
																				<?php if ($avalue['assessment_status'] == 1): ?>
																					<span class="badge badge-pill badge-warning">Pending</span>
																				<?php elseif($avalue['assessment_status'] == 5): ?>
																					<span class="badge badge-pill badge-success">Approved</span>
																				<?php endif ?>	
																				<br>
																				<div class="form-group">
																					<label for="gcName">Student Name:</label>
																					<input type="text" class="form-control" id="gcName" placeholder="Student Name" value="<?php echo ucwords($avalue['firstName'].' '.$avalue['lastName']); ?>" readonly>
																				</div>
																				<form action="<?php echo site_url('counselor/appointStudent?assessmentID='.$avalue['id']); ?>" method="post">
																					<div class="form-group">
																						<label for="apptD">Appoitment Date:</label>
																						<input type="datetime-local" class="form-control" id="apptD" placeholder="Appoitment Date" value="<?php echo $avalue['appointmentDate']; ?>" required name="appointmentDate" <?php if (!empty($avalue['appointmentDate'])){ echo 'readonly'; } ?>>
																					</div>	
																					<div class="form-group">
																						<label for="vl">Virtual Link:</label>
																							<br>
																							<a href="<?php echo $avalue['virtualLink']; ?>" target="_blank" style="color: blue;">
																								<b><i><?php echo $avalue['virtualLink']; ?></i></b>
																							</a>
																					</div>
																				</form>	
																				<hr>
																				<div class="row gutters">
																					<div class="col-xl-12 col-sm-12">
																						<div class="alert-notify info">
																							<div class="alert-notify-body">
																								<span class="type">Info</span>
																								<div class="alert-notify-title">Note: After Assessing Virtual the Student please input remarks<img src="<?php echo site_url('resort/dashboard_assets/img/notification-info.svg'); ?>" alt="Admin Templates &amp; Dashboard UI Kits"></div>
																								<div class="alert-notify-text"></div>
																							</div>
																						</div>
																					</div>									
																				</div>
																				<form action="<?php echo site_url('counselor/insertRemarks?id='.$avalue['id']); ?>" method="post">
																					<div class="form-group">
																						<textarea placeholder="Remarks" class="form-control" required name="assess_remarks"></textarea>
																					</div>
																					<button type="submit" class="btn btn-warning">Submit</button>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>						
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												</div>
											</div>
										</div>	
							<?php 
									}
								} 
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main container end -->