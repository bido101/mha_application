<!-- Main container start -->
<div class="main-container">
  
  <!-- Row start -->
          <div class="row gutters">
            <div class="col-xl-2 col-sm-4 col-6">
              <div class="info-tiles">
                <div class="info-icon">
                  <i class="icon-account_circle"></i>
                </div>
                <div class="stats-detail">
                  <h3><?php echo $users; ?></h3>
                  <p>Users</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

  <div class="row gutters">
    <div class="col-xl-6 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">No. of Student Requested Per Departments</div>
        </div>
        <div class="card-body">
          <div id="basic-pie-graph-gradient"></div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">No. of Student Requested Per Courses</div>
        </div>
        <div class="card-body">
            <div id="basic-pie-graph"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main container end -->