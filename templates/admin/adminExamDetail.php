<?php include('/../webs/header.php'); 

// echo '<pre>';print_r($this->data->exam);exit;
?>
   <h2>จัดการข้อสอบ</h2>
<form class="form-horizontal" action="<?=$this->data->action?>" method="post">
  <div class="form-group">
    <label for="name" class="col-md-2 control-label">ชื่อข้อสอบ</label>
    <div class="col-md-10">
      <input type="text" 
             class="form-control" 
             id="name" 
             name="name" 
             placeholder="กรอกชื่อข้อสอบ"
             value="<?=$this->data->exam['exam_name']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="detail" class="col-md-2 control-label">ระดับข้อสอบ</label>
    <div class="col-md-2">
      <input type="text" 
             class="form-control" 
             id="level" 
             name="level" 
             placeholder="กรอก ระดับข้อสอบ"
             value="<?=$this->data->exam['level']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
       <button type="submit" class="btn btn-primary"><?=$this->data->buttonName?></button>
        <?php if($this->data->action=='editExamDetail'):?>
            <input type="hidden" name="examID" value="<?=$this->data->examID?>">
        <?php endif; ?>
    </div>
  </div>
   
</form>
<?php include('/../webs/footer.php'); ?>