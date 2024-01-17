<!-- Main container start -->
<div class="main-container">
	<!-- Row start -->
	<div class="row gutters">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Questionnaire Management Panel:</div>
				</div>
				<div class="card-body">
					<div class="custom-btn-group">
						<a href="<?php echo site_url('admin/user_management'); ?>" class="btn btn-success btn-rounded" style="border: solid black 1px;">Overall Users</a>
						<button type="button" class="btn btn-rounded" style="border: solid black 1px;" data-toggle="modal" data-target="#addUsersModal">+ Add Users</button>
					</div>
				</div>
			</div>
		</div>
	</div>

		<!-- Add Category Modal -->
	<div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="customModalTwoLabel">+ Add Users</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
<form action="<?php echo site_url('admin/addUser'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="select-role" class="col-form-label">User Type:</label>
						<select class="form-control" name="role">
							<option value="0">-Select Role-</option>
							<option value="admin">Admin</option>
							<option value="counselor">counselor</option>
							<option value="student">student</option>
						</select>
					</div>
					<div class="form-group">
						<label for="select-role" class="col-form-label">User Type:</label>
						<input type="number" placeholder="Input Identification Number" name="identification_ID" class="form-control">
					</div>
					<div class="form-group">
						<label for="select-role" class="col-form-label">First Name:</label>
						<input type="text" placeholder="First Name" name="firstName" class="form-control">
					</div>
					<div class="form-group">
		              <label for="middlename" class="form-label">Middle Name</label>
		              <input type="text" class="form-control" id="middlename" placeholder="Input Middle Name" name="middleName">
		            </div>
		            <div class="form-group">
		              <label for="lastname" class="form-label">Last Name</label>
		              <input type="text" class="form-control" id="lastname" placeholder="Input Last Name" name="lastName">
		            </div>
		            <div class="form-group">
		              <label for="email" class="form-label">email</label>
		              <input type="text" class="form-control" id="email" placeholder="Input Email" name="email">
		            </div>
		            <div class="form-group">
		              <label for="pwd" class="form-label">Password:</label>
		              <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
		            </div>
		            <div class="form-group">
		              <label for="conpwd" class="form-label">Confirm Password:</label>
		              <input type="password" class="form-control" id="conpwd" placeholder="Confirm password" name="conpassword">
		            </div>
				</div>
				<div class="modal-footer custom">
					<div class="left-side">
						<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
					</div>
					<div class="divider"></div>
					<div class="right-side">
						<button type="submit" class="btn btn-link success" name="btnAddUsers">Save</button>
					</div>
				</div>
</form>
			</div>
		</div>
	</div>

	<!-- Row start -->
	<div class="row gutters">
		<div class="col-sm-12">
			<div class="table-container">
				<div class="t-header">Users</div>
				<div class="table-responsive">
					<table id="copy-print-csv" class="table custom-table">
						<thead>
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								foreach ($users as $user): 
							?>
								<tr>
									<td><?php echo $num++.'.'; ?></td>
									<td><?php echo $user['identification_ID']; ?></td>
									<td>
										<?php
											if (!empty($user['middleName'])) {
												echo ucwords($user['firstName'].' '.$user['middleName'][0].'. '.$user['lastName']); 
											}else{
												echo ucwords($user['firstName'].' '.$user['lastName']);
											}
										?>
									</td>
									<td><?php echo $user['email']; ?></td>
									<td><?php echo $user['role']; ?></td>
									<td>
										<div class="td-actions">
											<a href="#" class="icon blue" data-toggle="modal" data-placement="top" title="" data-original-title="Add Row" data-target="#editQuestionModal<?php echo $user['userID']; ?>">
												<i class="icon-pencil"></i>											
											</a>
											<a href="<?php echo site_url('admin/removeUsers?userID='.$user['userID']); ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Row" onclick="alert('Are you sure you want to delete this data?')">
												<i class="icon-cancel"></i>
											</a>
										</div>
									</td>
								</tr>

								<!-- Add Category Modal -->
								<div class="modal fade" id="editQuestionModal<?php echo $user['userID']; ?>" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="customModalTwoLabel">Edit Questions</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
							<form action="<?php echo site_url('admin/editUser?id='.$user['userID']); ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label for="select-role" class="col-form-label">User Type:</label>
													<select class="form-control" name="role">
														<option value="admin" <?php if($user['role'] == 'admin'){echo 'selected';} ?>>Admin</option>
														<option value="counselor" <?php if($user['role'] == 'counselor'){echo 'selected';} ?>>Counselor</option>
														<option value="student" <?php if($user['role'] == 'student'){echo 'selected';} ?>>Student</option>
													</select>
												</div>
												<div class="form-group">
													<label for="select-role" class="col-form-label">User Type:</label>
													<input type="number" placeholder="Input Identification Number" name="identification_ID" class="form-control" value="<?php echo $user['identification_ID']; ?>">
												</div>
												<div class="form-group">
													<label for="select-role" class="col-form-label">First Name:</label>
													<input type="text" placeholder="First Name" name="firstName" class="form-control" value="<?php echo $user['firstName']; ?>">
												</div>
												<div class="form-group">
									              <label for="middlename" class="form-label">Middle Name</label>
									              <input type="text" class="form-control" id="middlename" placeholder="Input Middle Name" name="middleName" value="<?php echo $user['middleName']; ?>">
									            </div>
									            <div class="form-group">
									              <label for="lastname" class="form-label">Last Name</label>
									              <input type="text" class="form-control" id="lastname" placeholder="Input Last Name" name="lastName" value="<?php echo $user['lastName']; ?>">
									            </div>
									            <div class="form-group">
									              <label for="email" class="form-label">email</label>
									              <input type="text" class="form-control" id="email" placeholder="Input Email" name="email"  value="<?php echo $user['email']; ?>">
									            </div>
											</div>
											<div class="modal-footer custom">
												<div class="left-side">
													<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
												</div>
												<div class="divider"></div>
												<div class="right-side">
													<button type="submit" class="btn btn-link success" name="btnEditUsers">Save</button>
												</div>
											</div>
							</form>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>