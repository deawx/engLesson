<?php include('header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <h2> ผลการทดสอบก่อนเรียนของคุณ คือ <?=$this->data->score?> คะแนน อยู่ในระดับ <?=$this->data->level?></h2>
    <h3> กรุณากรอกข้อมูล เพื่อใช้ในการสมัครเรียน</h3>
    <form class="form-horizontal" action="studentData" method="post">
      <div class="form-group">
         <label for="username" class="col-md-2 control-label">Username</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
          </div>
      </div>
      <div class="form-group">
         <label for="username" class="col-md-2 control-label">Password</label>
          <div class="col-md-6">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
          </div>
      </div>
      <div class="form-group">
         <label for="email" class="col-md-2 control-label">E-mail</label>
          <div class="col-md-6">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail">
          </div>
      </div>
      <div class="form-group">
         <label for="mobile" class="col-md-2 control-label">Mobile</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile">
          </div>
      </div>
      <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="userID" value="<?=$this->data->userID?>">
      <button type="submit" class="btn btn-primary">ยืนยืนข้อมูลผู้ใช้</button>
    </div>
  </div>
    </form>
  </div>

</div>
<?php include('footer.php'); ?>
