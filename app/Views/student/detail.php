<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Student</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('student/update'); ?>" method="post">
              <div class="card">
                <div class="card-body">
                  <?php 
                  $errors = session()->getFlashdata('errors');
                  if(!empty($errors)){ ?>
                  <div class="alert alert-danger" role="alert">
                    Whoops! Ada kesalahan saat input data, yaitu:
                    <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                  </div>
                  <?php } ?>
 
                  <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                  <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" value="<?php echo $student['student_name']; ?>" class="form-control" name="student_name" placeholder="Enter student name" disabled>
                  </div>
                  <div class="form-group">
                      <label for="">School</label>
                      <input type="text" value="<?php echo $student['student_school']; ?>" class="form-control" name="student_school" placeholder="Enter student school" disabled>
                  </div>
                  <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" value="<?php echo $student['student_email']; ?>" class="form-control" name="student_email" placeholder="Enter student email" disabled>
                  </div>
                  <div class="form-group">
                      <label for="">Phone Number</label>
                      <input type="text" value="<?php echo $student['student_phone_number']; ?>" class="form-control" name="student_phone_number" placeholder="Enter student phone number" disabled>
                  </div>
                  <div class="form-group">
                      <label for="">Grade</label>
                      <input type="text" value="<?php echo $student['student_grade']; ?>" class="form-control" name="student_grade" placeholder="Enter student grade" disabled>
                  </div>
                  <div class="form-group">
                      <label for="">Department</label>
                      <input type="text" value="<?php echo $student['student_department']; ?>" class="form-control" name="student_department" placeholder="Enter student department" disabled>
                  </div>
 
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('student'); ?>" class="btn btn-outline-info">Back</a>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
 
</div>
<?php echo view('_partials/footer'); ?>