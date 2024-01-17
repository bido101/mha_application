<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
					<div class="row gutters">
						<div class="col-sm-12">
							<div class="task-section">
								<!-- Row start -->
								<div class="row no-gutters">
									<div class="col-lg-2 col-sm-3 col-4">
										<div class="labels-container">
											<div class="mt-5"></div>
											<div class="lablesContainerScroll">
												<div class="filters-block">
													<h5>Filters</h5>
													<div class="filters">
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
													</div>
												</div>
												<div class="tags-block">
													<h5>Tags</h5>
													<div class="tags">
														<a href="#">
															<i class="icon-label text-primary"></i> Done
														</a>
														<a href="#">
															<i class="icon-label text-warning"></i> Pending
														</a>
														<a href="#">
															<i class="icon-label text-secondary"></i> Declined
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-10 col-sm-9 col-8">
										<div class="tasks-container">
											<div class="tasks-header">
												<h3>
													<?php 
														if ($this->input->get('id') == 1){
															echo 'List Students of Requesting to be Assess';
														}elseif ($this->input->get('id') == 2) {
															echo 'List of Students Successfully Assessed';
														}elseif ($this->input->get('id') == 3) {
															echo 'List of Students Declined';
														}elseif ($this->input->get('id') == 4) {
															echo 'All Activities';
														}elseif ($this->input->get('id') == 5) {
															echo 'Approved Request';
														}
													?>
												 </h3>
											</div>
											<div class="tasksContainerScroll">
												<!-- Row start -->
												<div class="row no-gutters justify-content-center">
													<div class="col-sm-12">
														<section class="task-list">
															<?php foreach ($assessment as $avalue): ?>	
																<?php if ($this->input->get('id') == $avalue['assessment_status']): ?>
																	<!-- Task #1 -->
																	<div class="task-block">
																		<div class="task-details">
																			<div class="task-name">
																				<?php echo ucwords($avalue['firstName'].' '.$avalue['lastName']); ?>
																			</div>
																			<div class="task-desc" style="display: block;text-overflow: ellipsis;word-wrap: break-word;overflow: hidden;max-height: 3.6em;line-height: 1.8em;">
																				Requesting for Guidance..,
																				<?php 
																					$unser = unserialize($avalue['questionID']);
																					foreach ($unser as $uvalue) {
																						foreach ($questions as $qvalue) {
																							if ($uvalue == $qvalue['id']) {
																								echo $qvalue['question'].',';
																							}
																						}
																					}
																				?>
																			</div>
																		</div>
																		<ul class="task-actions">
																			<li>
																				<a href="" class="star" data-placement="top" title="View" data-toggle="modal" data-target=".bd-example-modal-xl<?php echo $avalue['id']; ?>">
																					<i class="icon-visibility" style="color: blue;"></i>
																				</a>
																			</li>
																		</ul>
																	</div>

																	<div class="modal fade bd-example-modal-xl<?php echo $avalue['id']; ?>" tabindex="-1" role="dialog"
																		aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
																											<div class="collapse show" aria-labelledby="withIconOne"
																													data-parent="#withIconsAccordion">
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
																											<a href="" class="" data-toggle="collapse" aria-expanded="true" aria-controls="collapseWithIconOne">
																												<i class="icon icon-info"></i>Appointment Details
																											</a>
																										</div>
																										<div class="collapse show" aria-labelledby="withIconOne"
																												data-parent="#withIconsAccordion">
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
																														<label for="apptD">Pick Date for Appoitment:</label>
																														<input type="datetime-local" class="form-control" id="apptD" placeholder="Appoitment Date" value="<?php echo $avalue['appointmentDate']; ?>" required name="appointmentDate" <?php if (!empty($avalue['appointmentDate'])){ echo 'readonly'; } ?>>
																													</div>	
																													<div class="form-group">
																														<label for="vl">Input Virtual Link:</label>
																														<?php if (empty($avalue['virtualLink'])): ?>	
																															<textarea placeholder="Virtual Link" class="form-control" id="vl"  required name="virtualLink"></textarea>
																														<?php else: ?>
																															<br>
																															<a href="<?php echo $avalue['virtualLink']; ?>" target="_blank">
																																<b><i><?php echo $avalue['virtualLink']; ?></i></b>
																															</a>
																														<?php endif ?>	
																													</div>
																													<?php if ($avalue['assessment_status'] == 1): ?>
																														<button type="submit" class="btn btn-primary">Appoint</button>
																														<button type="button" class="btn btn-secondary">Decline</button>
																													<?php endif ?>
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

																<?php endif ?>
															<?php endforeach ?>
														</section>
													</div>
												</div>
												<!-- Row end -->
											</div>
										</div>
									</div>
								</div>
								<!-- Row end -->
							</div>
						</div>
					</div>
					<!-- Row end -->
</div>
<!-- Main container end -->