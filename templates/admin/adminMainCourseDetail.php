<?php include('/../webs/header.php'); ?>
   <h2>จัดการหลักสูตร</h2>
<form class="form-horizontal" action="<?=$this->data->action?>" method="post">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">ชื่อหลักสูตร</label>
    <div class="col-sm-10">
      <input type="text" 
             class="form-control" 
             id="name" 
             name="name" 
             placeholder="กรอกชื่อหลักสูตร"
             value="<?=$this->data->course['course_name']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="detail" class="col-sm-2 control-label">รายละเอียดหลักสูตร</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="detail" name="detail" placeholder="กรอกรายละเอียด" 
                    ><?=$this->data->course['course_detail']?>
        </textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-primary"><?=$this->data->buttonName?></button>
        <?php if($this->data->action=='editMainCourse'):?>
            <input type="hidden" name="mainCourseID" value="<?=$this->data->mainCourseID?>">
        <?php endif; ?>
    </div>
  </div>
   
</form>
<?php include('/../webs/footer.php'); ?>