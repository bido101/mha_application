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
						<a href="<?php echo site_url('question'); ?>" class="btn btn-success btn-rounded" style="border: solid black 1px;">Overall Questions</a>
						<button type="button" class="btn btn-rounded" style="border: solid black 1px;" data-toggle="modal" data-target="#addCategoryModal">+ Add Category</button>
						<button type="button" class="btn btn-rounded" style="border: solid black 1px;" data-toggle="modal" data-target="#addQuestionModal">+ Add Question</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Add Category Modal -->
	<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="customModalTwoLabel">+ Add Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
<form action="<?php echo site_url('question/addCategory'); ?>" method="post">
				<div class="modal-body">
						<div class="form-group">
							<label for="category-name" class="col-form-label">Category:</label>
							<input type="text" class="form-control" id="category-name" name="categoryName" required>
						</div>
				</div>
				<div class="modal-footer custom">
					<div class="left-side">
						<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
					</div>
					<div class="divider"></div>
					<div class="right-side">
						<button type="submit" class="btn btn-link success" name="btnAddCat">Save</button>
					</div>
				</div>
</form>
			</div>
		</div>
	</div>

	<!-- Add Category Modal -->
	<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="customModalTwoLabel">+ Add Questions</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
<form action="<?php echo site_url('question/addQuestion'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="select-category" class="col-form-label">Select Category:</label>
						<select class="form-control" name="catID">
							<option value="0">-Select Category-</option>
							<?php foreach ($category as $cvalue): ?>
								<option value="<?php echo $cvalue['gcID']; ?>"><?php echo $cvalue['categoryName']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="questions-text" class="col-form-label">Questions:</label>
						<textarea class="form-control" id="questions-text" name="question" required></textarea>
					</div>
				</div>
				<div class="modal-footer custom">
					<div class="left-side">
						<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
					</div>
					<div class="divider"></div>
					<div class="right-side">
						<button type="submit" class="btn btn-link success" name="btnAddQuestion">Save</button>
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
				<div class="t-header">Questions</div>
				<div class="table-responsive">
					<table id="copy-print-csv" class="table custom-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Categories</th>
								<th>Questions</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								foreach ($question as $qvalue): 
							?>
								<tr>
									<td><?php echo $num++.'.'; ?></td>
									<td><?php echo $qvalue['categoryName']; ?></td>
									<td><?php echo $qvalue['question']; ?></td>
									<td>
										<div class="td-actions">
											<a href="#" class="icon blue" data-toggle="modal" data-placement="top" title="" data-original-title="Add Row" data-target="#editQuestionModal<?php echo $qvalue['id']; ?>">
												<i class="icon-pencil"></i>											
											</a>
											<a href="<?php echo site_url('question/removeQuestion?id='.$qvalue['id']); ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Row" onclick="alert('Are you sure you want to delete this data?')">
												<i class="icon-cancel"></i>
											</a>
										</div>
									</td>
								</tr>

								<!-- Add Category Modal -->
								<div class="modal fade" id="editQuestionModal<?php echo $qvalue['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="customModalTwoLabel">Edit Questions</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
							<form action="<?php echo site_url('question/updateQuestion?id='.$qvalue['id']); ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label for="select-category" class="col-form-label">Select Category:</label>
													<select class="form-control" name="catID">
														<?php foreach ($category as $cvalue): ?>
															<option value="<?php echo $cvalue['gcID']; ?>" <?php if ($cvalue['gcID'] == $qvalue['catID']){echo 'selected';} ?>><?php echo $cvalue['categoryName']; ?></option>
														<?php endforeach ?>
													</select>
												</div>
												<div class="form-group">
													<label for="questions-text" class="col-form-label">Questions:</label>
													<textarea class="form-control" id="questions-text" name="question" required><?php echo $qvalue['question']; ?></textarea>
												</div>
											</div>
											<div class="modal-footer custom">
												<div class="left-side">
													<button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
												</div>
												<div class="divider"></div>
												<div class="right-side">
													<button type="submit" class="btn btn-link success" name="btnUpdateQuestion">Save</button>
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