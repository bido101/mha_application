<!-- Main container start -->
<div class="main-container">

	<!-- Row start -->
	<div class="row gutters">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Deparment Management Panel:</div>
				</div>
				<div class="card-body">
					<div class="custom-btn-group">
						<a href="<?php echo site_url('admin/department'); ?>" <?php if($isActiveTab == 'forDepartment'){echo 'class="btn btn-success btn-rounded"';}else{echo 'class="btn btn-rounded"';} ?> style="border: solid black 1px;">All Departments</a>
						<button type="button" class="btn btn-rounded" style="border: solid black 1px;" data-toggle="modal" data-target="#addDepartmentModal">+ Add Department</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Add Category Modal -->
	<div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="customModalTwoLabel">+ Add Department</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
<form action="<?php echo site_url('admin/addDepartment'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="department-name" class="col-form-label">Department:</label>
						<input type="text" class="form-control" id="department-name" name="departmentName" required>
					</div>
					<div class="form-group">
						<label for="abbreviation-name" class="col-form-label">Abbreviation:</label>
						<input type="text" class="form-control" id="abbreviation-name" name="departmentAbbreviation" required>
					</div>
				</div>
				<div class="modal-footer custom">
					<div class="left-side">
						<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
					</div>
					<div class="divider"></div>
					<div class="right-side">
						<button type="submit" class="btn btn-link success" name="btnAddDepartment">Save</button>
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
				<div class="t-header">Department</div>
				<div class="table-responsive">
					<table id="copy-print-csv" class="table custom-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Department</th>
								<th>Abbreviation</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								foreach ($departments as $department): ?>
								<tr>
									<td><?php echo $num++.'.'; ?></td>
									<td><?php echo ucwords($department['departmentName']); ?></td>
									<td><?php echo strtoupper($department['departmentAbbreviation']); ?></td>
									<td>
										<div class="td-actions">
											<a href="#" class="icon blue" data-toggle="modal" data-placement="top" title="" data-original-title="Add Row" data-target="#editDepartmentModal<?php echo $department['dID']; ?>">
												<i class="icon-pencil"></i>											
											</a>
											<a href="<?php echo site_url('admin/removeDepartment?rID='.$department['dID']); ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Row" onclick="alert('Are you sure you want to delete this data?')">
												<i class="icon-cancel"></i>
											</a>
										</div>
									</td>
								</tr>

								<!-- Add Category Modal -->
								<div class="modal fade" id="editDepartmentModal<?php echo $department['dID']; ?>" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="customModalTwoLabel">Edit Department</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
							<form action="<?php echo site_url('admin/editDepartment?eID='.$department['dID']); ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label for="department-name" class="col-form-label">Department:</label>
													<input type="text" class="form-control" id="department-name" name="departmentName" value="<?php echo ucwords($department['departmentName']); ?>" required>
												</div>
												<div class="form-group">
													<label for="abbreviation-name" class="col-form-label">Abbreviation:</label>
													<input type="text" class="form-control" id="abbreviation-name" name="departmentAbbreviation" value="<?php echo strtoupper($department['departmentAbbreviation']); ?>" required>
												</div>
											</div>
											<div class="modal-footer custom">
												<div class="left-side">
													<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
												</div>
												<div class="divider"></div>
												<div class="right-side">
													<button type="submit" class="btn btn-link success" name="btnUpdateDeparatment">Save</button>
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
<!-- Main container end -->