<?php include('/../webs/header.php'); ?>
   <h2>จัดการข้อสอบ</h2>
<form class="form-horizontal" action="<?=$this->data->action?>" method="post">
  <div class="form-group">
    <label for="partNo" class="col-md-2 control-label">เลขที่ Part</label>
    <div class="col-md-10">
      <input type="text" 
             class="form-control" 
             id="partNo" 
             name="partNo" 
             placeholder="เลข Part ข้อสอบ"
             value="<?=$this->data->exam['part_no']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-md-2 control-label">ชื่อ Part</label>
    <div class="col-md-10">
      <input type="text" 
             class="form-control" 
             id="name" 
             name="name" 
             placeholder="กรอกชื่อข้อสอบ"
             value="<?=$this->data->exam['part_name']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-md-2 control-label">คำอธิบาย</label>
    <div class="col-md-10">
      <input type="text" 
             class="form-control" 
             id="description" 
             name="description" 
             placeholder="กรอกชื่อข้อสอบ"
             value="<?=$this->data->exam['part_description']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="detail" class="col-md-2 control-label">รายละเอียด</label>
    <div class="col-md-10">
      <textarea class="form-control" name="detail" id="detail"  rows="3">
        <?=$this->data->exam['part_detail']?>
      </textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
       <button type="submit" class="btn btn-primary"><?=$this->data->buttonName?></button>
       <?php if($this->data->action=='addExamPart'):?>
            <input type="hidden" name="examID" value="<?=$this->data->examID?>">
        <?php endif; ?>
        <?php if($this->data->action=='editExamPart'):?>
            <input type="hidden" name="partID" value="<?=$this->data->partID?>">
        <?php endif; ?>
    </div>
  </div>
   
</form>
<?php include('/../webs/footer.php'); ?>