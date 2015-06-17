<?php include('/../webs/header.php'); 
    $teacher = $this->data->teacher;
?>
<h2>รายชื่อผู้สอน</h2>

<form class="form-horizontal" action="<?=$this->data->action?>" method="POST">
  
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?=$teacher['username']?>">
    </div>
  </div>
  <?php if($this->data->action =='addTeacher'):?>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value="<?=$teacher['password']?>">
        </div>
      </div>
    <?php endif; ?>
 
     <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">Firstname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname" value="<?=$teacher['firstname']?>">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Lastname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname" value="<?=$teacher['lastname']?>">
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" value="<?=$teacher['email']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="mobile" class="col-sm-2 control-label">Mobile</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?=$teacher['mobile']?>">
    </div>
  </div>
  <hr>
  <?php if($this->data->action =='editTeacher'):?>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value="">
        </div>
      </div>
    <?php endif; ?>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">ยืนยันข้อมูล</button>
      <?php if(!empty($this->data->userID) ) :?>
        <input type="hidden" name="userID" value="<?=$this->data->userID?>">
    <?php endif;?>
    </div>
  </div>
</form>

<?php include('/../webs/footer.php'); ?>