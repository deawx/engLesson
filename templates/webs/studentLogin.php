<?php include('header.php'); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
  <form class="form-signin" action="login" method="post">
    <h2 class="form-signin-heading">นักเรียนเข้าสู่ระบบ</h2>
    <label for="username" >Username</label>
    <input type="text" 
          name="username" 
          id="username" 
          class="form-control" 
          placeholder="User นักเรียน" 
          required="" 
          autofocus="">
    <label for="password" >Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password ของนักเรียน" required="">
    <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
  </form>
  </div>
</div>
<div class="option-register">
   <ul>
      <li> <a href="pretest"  >คลิก ถ้าท่านยังไมไ่ด้ทำแบบทดสอบก่อนเรียน</a></li>
      <li> <a href="signInPretest"  >คลิก ถ้าท่านทำแบบทดสอบก่อนเรียนแล้วแต่ยังไม่ได้ลงทะเบียน</a></li>
    </ul>
</div>
<?php include('footer.php'); ?>

