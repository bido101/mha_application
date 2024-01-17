<!-- Main container start -->
<div class="main-container">

	<!-- Row start -->
	<div class="row gutters">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Courses Management Panel:</div>
				</div>
				<div class="card-body">
					<div class="custom-btn-group">
						<a href="<?php echo site_url('admin/courses'); ?>" <?php if($isActiveTab == 'forCourses'){echo 'class="btn btn-success btn-rounded"';}else{echo 'class="btn btn-rounded"';} ?> style="border: solid black 1px;">Courses</a>
						<button type="button" class="btn btn-rounded" style="border: solid black 1px;" data-toggle="modal" data-target="#addCourseModal">+ Add Course</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Add Category Modal -->
	<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="customModalTwoLabel">+ Add Course</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
<form action="<?php echo site_url('admin/addCourse'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="department-name" class="col-form-label">Department:</label>
						<select class="form-control" name="deptID" required id="department-name">
							<option value="0">-Select Department-</option>
							<?php foreach ($departments as $department): ?>
								<option value="<?php echo ucwords($department['dID']); ?>">
									<?php echo $department['departmentName'].'-('.strtoupper($department['departmentAbbreviation']).')'; ?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="course-name" class="col-form-label">Course:</label>
						<input type="text" class="form-control" id="course-name" name="courseName" required>
					</div>
					<div class="form-group">
						<label for="abbreviation-name" class="col-form-label">Abbreviation:</label>
						<input type="text" class="form-control" id="abbreviation-name" name="courseAbbreviation" required>
					</div>
				</div>
				<div class="modal-footer custom">
					<div class="left-side">
						<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
					</div>
					<div class="divider"></div>
					<div class="right-side">
						<button type="submit" class="btn btn-link success" name="btnAddCourse">Save</button>
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
				<div class="t-header">Courses</div>
				<div class="table-responsive">
					<table id="copy-print-csv" class="table custom-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Courses</th>
								<th>Abbreviation</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								foreach ($courses as $course): ?>
								<tr>
									<td><?php echo $num++.'.'; ?></td>
									<td><?php echo ucwords($course['courseName']); ?></td>
									<td><?php echo strtoupper($course['courseAbbreviation']); ?></td>
									<td>
										<div class="td-actions">
											<a href="#" class="icon blue" data-toggle="modal" data-placement="top" title="" data-original-title="Add Row" data-target="#editCourseModal<?php echo $course['cID']; ?>">
												<i class="icon-pencil"></i>											
											</a>
											<a href="<?php echo site_url('admin/removeCourse?rID='.$course['cID']); ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Row" onclick="alert('Are you sure you want to delete this data?')">
												<i class="icon-cancel"></i>
											</a>
										</div>
									</td>
								</tr>

								<!-- Add Category Modal -->
								<div class="modal fade" id="editCourseModal<?php echo $course['cID']; ?>" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="customModalTwoLabel">Edit Course</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
							<form action="<?php echo site_url('admin/editCourse?eID='.$course['cID']); ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label for="department-name" class="col-form-label">Department:</label>
													<select class="form-control" name="">
														<?php foreach ($departments as $department): ?>
															<option value="<?php echo $department['dID']; ?>" <?php if ($course['deptID'] == $department['dID']){echo 'selected';} ?>>
																<?php echo $department['departmentName']; ?>
															</option>
														<?php endforeach ?>
													</select>
												</div>
												<div class="form-group">
													<label for="course-name" class="col-form-label">Course:</label>
													<input type="text" class="form-control" id="course-name" name="courseName" value="<?php echo strtoupper($course['courseName']); ?>" required>
												</div>
												<div class="form-group">
													<label for="abbreviation-name" class="col-form-label">Abbreviation:</label>
													<input type="text" class="form-control" id="abbreviation-name" name="courseAbbreviation" value="<?php echo strtoupper($course['courseAbbreviation']); ?>" required>
												</div>
											</div>
											<div class="modal-footer custom">
												<div class="left-side">
													<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
												</div>
												<div class="divider"></div>
												<div class="right-side">
													<button type="submit" class="btn btn-link success" name="btnUpdateCourse">Save</button>
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