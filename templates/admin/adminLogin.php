<?php include('/../webs/header.php'); ?>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
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