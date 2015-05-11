<?php include('/../webs/header.php'); ?>
   <h2>จัดการข้อมูลผู้ใช้</h2>
<form class="form-horizontal" action="<?=$this->data->action?>" method="post">
     
     <!--  <div class="form-group">
         <label for="username" class="col-md-2 control-label">Confirm Password</label>
          <div class="col-md-6">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password">
          </div>
      </div> -->
      <div class="form-group">
         <label for="email" class="col-md-2 control-label">ชื่อ</label>
          <div class="col-md-6">
            <input 
                  class="form-control" 
                  id="firstname" 
                  name="firstname" 
                  placeholder="Enter Firstname"
                  value="<?=$this->data->user['firstname']?>">
          </div>
      </div>
      <div class="form-group">
         <label for="email" class="col-md-2 control-label">นามสกุล</label>
          <div class="col-md-6">
            <input class="form-control" id="lastname" name="lastname" 
                placeholder="Enter Lastname" value="<?=$this->data->user['lastname']?>">
          </div>
      </div>
      <div class="form-group">
         <label for="email" class="col-md-2 control-label">E-mail</label>
          <div class="col-md-6">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail"
                value="<?=$this->data->user['email']?>">
          </div>
      </div>
      <div class="form-group">
         <label for="mobile" class="col-md-2 control-label">Mobile</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile"
                value="<?=$this->data->user['mobile']?>">
          </div>
      </div>
      <hr>
        <h3>เปลี่ยน Password</h3>
       <div class="form-group">
         <label for="username" class="col-md-2 control-label">New Password</label>
          <div class="col-md-6">
            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="กรณีต้องการเปลี่ยน Password">
          </div>
      </div>
      <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="userID" value="<?=$this->data->user['user_id']?>">
      <button type="submit" class="btn btn-primary">ยืนยืนข้อมูลผู้ใช้</button>
    </div>
  </div>
    </form>
<?php include('/../webs/footer.php'); ?>