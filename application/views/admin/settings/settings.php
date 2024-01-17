<!-- Main container start -->
<div class="main-container">

	<!-- Row start -->
	<div class="row gutters">
		<div class="col-lg-3 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-body">
					<div class="account-settings">
						<div class="user-profile">
							<div class="user-avatar">
								<?php if (!empty($myProfile['profilePicture'])): ?>
									<img src="<?php echo site_url('/').$myProfile['profilePicture']; ?>"/>
								<?php elseif(empty($myProfile['profilePicture'])): ?>
									<img src="<?php echo site_url('resort/assets/img/avatar-2048x2048.jpeg'); ?>" alt="Admin Templates & Dashboards" />
								<?php endif ?>
							</div>
							<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#updateProfilePicture">
								Update Profile
							</button>
							<hr>
							<h5 class="user-name">
								<?php echo ucwords($myProfile['firstName'].' '.$myProfile['middleName'][0].'. '.$myProfile['lastName']); ?>
							</h5>
							<h6 class="user-email"><?php echo $myProfile['email']; ?></h6>
						</div>
						<div class="setting-links">
							<a href="<?php echo site_url('admin/settings?str=profile'); ?>">
								<i class="icon-user"></i>
								Profile&nbsp;&nbsp;&nbsp;
								<?php if ($this->input->get('str') == 'profile'): ?>
									<span class="badge badge-pill badge-primary">Active</span>
								<?php endif ?>
							</a>
							<a href="<?php echo site_url('admin/settings?str=updatePassword'); ?>">
								<i class="icon-lock1"></i>
								Update Password&nbsp;&nbsp;&nbsp;
								<?php if ($this->input->get('str') == 'updatePassword'): ?>
									<span class="badge badge-pill badge-primary">Active</span>
								<?php endif ?>
							</a>
						</div>
					</div>
				</div>	
			</div>
		</div>


		<!-- Add Category Modal -->
	<div class="modal fade" id="updateProfilePicture" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="customModalTwoLabel">Update Profile Picture</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
	<form action="<?php echo site_url('admin/updateProfilePicture?userID='.$myProfile['userID']); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div align="center">
						<img id="output" style="width: 50%;height: auto;" src=""/>
					</div>
                    <br>
                    <label for="exampleInputFile">Input Image</label>
                                                      
                    <input type="file" name="profilePicture" accept="image/gif, image/jpg, image/png, image/jpeg" onchange="loadFile(event)" required>
				</div>
				<div class="modal-footer custom">
					<div class="left-side">
						<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
					</div>
					<div class="divider"></div>
					<div class="right-side">
						<button type="submit" class="btn btn-link success" name="btnUpdatePic">Save</button>
					</div>
				</div>
	</form>
			</div>
		</div>
	</div>


		<div class="col-lg-9 col-sm-12 col-12">
			<div class="card h-100">
				<div class="card-header">
					<div class="card-title">
						<?php if ($this->input->get('str') == 'profile'): ?>
							Personal Information
						<?php elseif ($this->input->get('str') == 'updatePassword'): ?>
							Update Password
						<?php endif ?>
					</div>
				</div>
				<div class="card-body">
					<?php if ($this->input->get('str') == 'profile'): ?>
						<form action="<?php echo site_url('admin/updateProfile?userID='.$this->session->userdata('userID')); ?>" method="post">
							<div class="row gutters">
								<div class="col-sm-12 col-12">
									<div class="row gutters">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="firstName">First Name</label>
												<input type="text" class="form-control" id="firstName" value="<?php echo $myProfile['firstName']; ?>" name="firstName">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="middlename">Middle Name</label>
												<input type="text" class="form-control" id="middlename" value="<?php echo $myProfile['middleName']; ?>" name="middleName">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="lastname">Last Name</label>
												<input type="text" class="form-control" id="lastname" value="<?php echo $myProfile['lastName']; ?>" name="lastName">
											</div>
										</div>
									</div>
									<div class="row gutters">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" id="email" value="<?php echo $myProfile['email']; ?>" name="email">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="address">Address</label>
												<input type="text" class="form-control" id="address" value="<?php echo $myProfile['address']; ?>" name="address">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="bday">Birthday</label>
												<input type="date" class="form-control" id="bday" value="<?php echo $myProfile['bDay']; ?>" name="bDay">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="text-right">
										<button type="submit" id="submit" class="btn btn-success" name="btnUpdateProfile">Update Profile</button>
									</div>
								</div>
							</div>
						</form>
					<?php elseif ($this->input->get('str') == 'updatePassword'): ?>
						<form action="<?php echo site_url('admin/updatePassword?userID='.$this->session->userdata('userID')); ?>" method="post">
							<div class="row gutters">
								<div class="col-sm-12 col-12">
									<div class="row gutters">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="password">New Password</label>
												<input type="password" class="form-control" id="password" name="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label for="confirmPassword">Confirm New Password</label>
												<input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="text-right">
										<button type="submit" name="btnUpdatePassword" class="btn btn-success">Update Password</button>
									</div>
								</div>
							</div>
						</form>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Row end -->

</div>
<!-- Main container end -->