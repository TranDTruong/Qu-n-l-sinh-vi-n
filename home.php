<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if ($_SESSION['login_type'] == 1) : ?>
  <br>
  <h2>Trang chủ</h2>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <a href="./index.php?page=student_list" class="nav-link nav-student_list tree-item">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b>Tổng số sinh viên</b></span>
            <span class="info-box-number">
              <?php echo $conn->query("SELECT * FROM students")->num_rows; ?>
            </span>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
      <a href="./index.php?page=classes" class="nav-link nav-classes">
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-th-list"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b>Tổng số lớp học</b></span>
            <span class="info-box-number">
              <?php echo $conn->query("SELECT * FROM classes")->num_rows; ?>
            </span>
          </div>
        </div>
      </a>
    </div>
    
    <div class="col-12 col-sm-6 col-md-4">
      <a href="./index.php?page=subjects" class="nav-link nav-subjects">
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-book"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><b>Tổng số môn học</b></span>
            <span class="info-box-number">
              <?php echo $conn->query("SELECT * FROM subjects")->num_rows; ?>
            </span>
          </div>
        </div>
      </a>
    </div>
  </div>

<?php else : ?>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        Welcome <?php echo $_SESSION['login_name'] ?>!
      </div>
    </div>
  </div>

<?php endif; ?>