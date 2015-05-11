<?php include('/../webs/header.php'); ?>
<h2>จัดการคอร์สเรียน</h2><br>
    <form class="form-horizontal" action="<?=$this->data->action?>" method="post">
      <div class="form-group">
        <label for="courseName" class="col-md-2">ชื่อคอร์ส</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="courseName" name="courseName" placeholder="กรอก ชื่อคอร์ส"
                value="<?=($this->data->course['course_name'])?>">
        </div>
      </div>
      <div class="form-group">
        <label for="courseType" class="col-md-2">ชนิดคอร์สเรียน</label>
        <div class="col-md-4">
          <select name="courseType" id="courseType" class="form-control">
            <option value="Live" 
               <?=($this->data->course['course_type'] =='Live')? 'selected' : '' ;?> >Live</option>
            <option value="Video" 
              <?=($this->data->course['course_type'] =='Video')? 'selected' : '' ;?> >Video</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="maxSeat" class="col-md-2">เลือกห้องเรียน (สำหรับคอร์สเรียนสด)</label>
        <div class="col-md-4">
           <!-- <select name="maxSeat" id="maxSeat" class="form-control">
           <?php echo Utility::createOption($this->data->roomList);?>
       </select> -->
           <input type="text" class="form-control" id="maxSeat" name="maxSeat" placeholder="ลง จำนวนที่นั่ง"
                value="<?=($this->data->course['max_seat'])?>"> 
        </div>
      </div>
      <div class="form-group">
        <label for="startDate" class="col-md-2">เริ่มเรียนวันที่</label>
        <div class="col-md-4">
            <input type="text" class="form-control date-pick" id="startDate" name="startDate" placeholder="ลง วันที่เปิดคอร์ส"
                value="<?=Utility::toDisplayDate($this->data->course['start_date'])?>">
        </div>
      </div>
      <div class="form-group">
        <label for="endDate" class="col-md-2">สิ้นสุดวันที่</label>
        <div class="col-md-4">
            <input type="text" class="form-control date-pick" id="endDate" name="endDate" placeholder="ลง วันสิ้นสุดคอร์ส"
                value="<?=Utility::toDisplayDate($this->data->course['end_date'])?>">
        </div>
      </div>
      <div class="form-group">
        <label for="price" class="col-md-2">ราคา</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="price" name="price" placeholder="ลง ราคาเรียน"
                value="<?=($this->data->course['price'])?>">
        </div>
      </div>
      <div class="form-group">
        <label for="level" class="col-md-2">ระดับ</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="level" name="level" placeholder="ลง ระดับของคอร์สเรียน"
                value="<?=($this->data->course['level'])?>">
        </div>
      </div>
    <div class="col-md-4 col-md-offset-2">
      <button type="submit" class="btn btn-primary"><?=$this->data->buttonName?></button>
      <?php if($this->data->action == 'editCourseDetail'): ?>
        <input type="hidden" name="courseID" value="<?=$this->data->course['course_id']?>">
      <?php endif; ?>
     </div>
    </form>
<?php include('/../webs/footer.php'); ?>
<script src="js/bootstrap-datepicker.js"></script>
<script>
  $(".date-pick").datepicker({
    format : 'dd/mm/yyyy'
  });
</script>
   