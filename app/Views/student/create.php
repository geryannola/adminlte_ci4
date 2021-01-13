<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Student</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('student/store'); ?>" method="post">
              <div class="card">
                <div class="card-body">
                  <?php 
                  $inputs = session()->getFlashdata('inputs');
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
 
                  <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="student_name" placeholder="Enter student name" value="<?php echo $inputs['student_name']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">School</label>
                      <input type="text" class="form-control" name="student_school" placeholder="Enter student school" value="<?php echo $inputs['student_school']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="student_email" placeholder="Enter student email" value="<?php echo $inputs['student_email']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Phone Number</label>
                      <input type="text" class="form-control" name="student_phone_number" placeholder="Enter student phone number" value="<?php echo $inputs['student_phone_number']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Grade</label>
                      <select name="student_grade" id="" class="form-control">
                          <option value="">Choose Grade</option>
                          <option <?php echo $inputs['student_grade'] == "Kelas 1" ? "selected" : ""; ?> value="Kelas 1">Kelas 1</option>
                          <option <?php echo $inputs['student_grade'] == "Kelas 2" ? "selected" : ""; ?> value="Kelas 2">Kelas 2</option>
                          <option <?php echo $inputs['student_grade'] == "Kelas 3" ? "selected" : ""; ?> value="Kelas 3">Kelas 3</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Department</label>
                      <select name="student_department" id="" class="form-control">
                          <option value="">Choose Department</option>
                          <option <?php echo $inputs['student_department'] == "TKJ" ? "selected" : ""; ?> value="TKJ">TKJ</option>
                          <option <?php echo $inputs['student_department'] == "RPL" ? "selected" : ""; ?> value="RPL">RPL</option>
                          <option <?php echo $inputs['student_department'] == "MM" ? "selected" : ""; ?> value="MM">MM</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('student'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>