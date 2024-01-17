<!-- Main container start -->
<div class="main-container">
	<div class="col-xl-4 col-sm-12">
		<div class="alert-notify info">
			<div class="alert-notify-body">
				<span class="type">Info</span>
				<div class="alert-notify-title">Give your Answer for us to evaluate.<img src="<?php echo site_url('resort/dashboard_assets/img/notification-info.svg'); ?>" alt="Admin Templates &amp; Dashboard UI Kits"></div>
				<div class="alert-notify-text"></div>
			</div>
		</div>
	</div>

	<div class="row gutters">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">
						<h3>Guidance and Counseling</h3>
						<h5>NEED ANALYSIS SURVEY</h5>
						<hr>
					</div>
				</div>
				<div class="card-body">
					<!-- Row start -->
					<div class="row gutters">
						<?php if ($paging == 'off'): ?>
							<div class="col-lg-2 col-sm-2 col-2"></div>
							<div class="col-lg-8 col-sm-8 col-8">
								<div class="doc-block">
									<div class="doc-icon">
										<img src="<?php echo site_url('resort/dashboard_assets/img/patch-question.svg'); ?>" alt="Free & Premium HTML5 CSS3 Admin Templates" />
									</div>
									<div class="doc-title">To start with your assessment please click "START"</div>
									<a href="<?php echo site_url('student/start_assessment'); ?>" class="btn btn-primary btn-lg">Start</a> 
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-2"></div>
						<?php elseif($paging == 'on'): ?>
							<form action="<?php echo site_url('/student/submitting_assessment'); ?>" method="post">
								<?php foreach ($sections as $svalue): ?>
									<div class="col-sm-12" style="margin-bottom: 10px;">
										<div class="accordion toggle-icons lg" id="toggleIcons" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
											<div class="accordion-container">
												<div class="accordion-header" id="toggleIconsOne" style="box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
													<a href="" class="" data-toggle="collapse" aria-expanded="true" aria-controls="toggleIconsCollapseOne">
														<?php echo ucwords($svalue['categoryName']); ?>
													</a>
												</div>
												<div class="collapse show" aria-labelledby="toggleIconsOne" data-parent="#toggleIcons">
													<div class="accordion-body">
														<div class="row gutters">
															<?php foreach ($sections_content as $scvalue): ?>
																<?php if ($scvalue['catID'] == $svalue['gcID']): ?>
																		<div class="col-lg-4 col-sm-4 col-4">
																			<div class="form-check form-check-inline" style="background-color: #1a8e5f;padding: 5px;margin-bottom: 10px;border-radius: 5px;color: #fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
																				<input class="form-check-input" type="checkbox" id="inlineCheckbox<?php echo $scvalue['id']; ?>" value="<?php echo $scvalue['id']; ?>" name="studAnswer[]">
																				<label class="form-check-label" for="inlineCheckbox<?php echo $scvalue['id']; ?>"><?php echo ucwords($scvalue['question']); ?></label>
																			</div>
																		</div>
																<?php endif ?>
															<?php endforeach ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>
								<button class="btn btn-primary btn-block active" type="submit" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">Submit Assessment</button>
							</form>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main container end -->