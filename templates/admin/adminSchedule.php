<?php include('/../webs/header.php'); ?>
<h2>จัดการตารางเรียน</h2><br>
    <form class="form-horizontal" action="<?=$this->data->action?>" method="post">
  <div class="form-group">
    <label for="scheduleDate" class="col-md-2">วันที่</label>
    <div class="col-md-4">
        <input type="text" class="form-control" id="scheduleDate" name="scheduleDate" placeholder="ลง วันที่"
            value="<?=Utility::toDisplayDate($this->data->schedule['date'])?>">
    </div>
  </div>
  <div class="form-group">
    <label for="startTime" class="col-md-2">เวลา</label>
    <div class="col-md-4">
        <input type="time" class="form-control" id="startTime" name="startTime" placeholder="เริ่ม"
            value="<?=$this->data->schedule['start_time']?>"
        >
    </div>
    <label for="endDate" class="col-md-2">ถึง</label>
    <div class="col-md-4">
        <input type="time" class="form-control" id="endTime" name="endTime" placeholder="ถึงเวลา"
            value="<?=$this->data->schedule['end_time']?>"
        >
    </div>
  </div>
  <div class="form-group">
    <label for="room" class="col-md-2">เลือกห้องเรียน(สำหรับคอร์สวีดีโอ)</label>
    <div class="col-md-4">
      <select name="room" id="room" class="form-control">
           <?php echo Utility::createOption($this->data->roomList,$this->data->schedule['room_id']);?>
       </select>
     <!--    <input type="text" class="form-control" id="maxSeat" name="maxSeat" placeholder="ลงจำนวนที่นั่งเรียน"
            value="<?=$this->data->schedule['max_seat']?>"  > -->
    </div>
  </div>
  <div class="form-group">
    <label for="teacher" class="col-md-2">อาจารย์</label>
    <div class="col-md-4">
       <select name="teacher" id="teacher" class="form-control">
           <option value="">เลือก อาจารย์</option>
           <?php echo Utility::createOption($this->data->teacherList,$this->data->schedule['teacher_id']);?>
       </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><?=$this->data->buttonName?></button>
      <?php if($this->data->action =='addSchedule'):?>
        <input type="hidden" name="courseID" value="<?=$this->data->schedule['course_id']?>">
      <?php elseif($this->data->action =='editSchedule'):?>
         <input type="hidden" name="scheduleID" value="<?=$this->data->schedule['schedule_id']?>">
      <?php endif; ?>
    </form>

<?php include('/../webs/footer.php'); ?>

<script src="js/bootstrap-datepicker.js"></script>
<script>
  $("#scheduleDate").datepicker({
    format : 'dd/mm/yyyy'
  });
</script>
   