<?php include('header.php'); ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h2> ทำแบบทดสอบก่อนเรียน</h2>
    <form action="signUpPretestExam" method="POST">
      <div class="form-group">
        <label for="firstname">ชื่อ</label>
        <input type="text" class="form-control" id="firstname" placeholder="กรอก ชื่อ">
      </div>
      <div class="form-group">
        <label for="lastname">นามสกุล</label>
        <input type="text" class="form-control" id="lastname" placeholder="กรอก นามสกุล">
      </div>
   
      <button type="submit" class="btn btn-primary">เริ่มทำแบบทดสอบ</button>
    </form>
  </div>

</div>
<?php include('footer.php'); ?>
