<?php include('header.php'); ?>
<?php if(!$this->data->firstTest): ?>
        <div class="alert alert-danger" role="alert">คุณเคยทำแบบทดสอบแล้ว</div>
     <?php endif ; ?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2><?=$this->data->pageTitle;?></h2>
    <form action="<?=$this->data->action?>" method="POST">
      <div class="form-group">
        <label for="firstname">ชื่อ</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรอก ชื่อ">
      </div>
      <div class="form-group">
        <label for="lastname">นามสกุล</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรอก นามสกุล">
      </div>
   
      <button type="submit" class="btn btn-primary"><?=$this->data->submitName?></button>

    </form>
  </div>

</div>
<?php include('footer.php'); ?>
