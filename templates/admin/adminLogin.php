<?php include('/../webs/header.php'); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <?php if(!empty($this->data['status']) ):?>
        <?php if($this->data['status'] =='notApprove'):?>
          <div class="alert alert-danger" role="alert">โปรดตรวจสอบอีเมล์ของท่านเพื่อนยืนยัน user เข้าใช้งาน</div>
         <?php elseif($this->data['status'] =='approved'):?>
         <div class="alert alert-success" role="alert">ท่านได้ยืนยันตัวตนเข้าใช้งานแล้ว</div>
        <?php endif; ?>
    <?php endif;?>
  <form class="form-signin" action="adminLogin" method="post">
    <h2 class="form-signin-heading">Login</h2>
    <label for="username" >Username</label>
    <input type="text" 
          name="username" 
          id="username" 
          class="form-control" 
          placeholder="Enter Username" 
          required="" 
          autofocus="">
    <label for="password" >Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>
  </div>
</div>

<?php include('/../webs/footer.php'); ?>