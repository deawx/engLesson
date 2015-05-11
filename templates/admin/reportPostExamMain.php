<?php include('/../webs/header.php'); ?>
<h2>รายงาน</h2>
<form target="_blank" class="form-inline" action="reportPostExam" method="post">
    <div class="panel panel-primary">
      <div class="panel-heading">รายงาน ผลการทดสอบหลังเรียน</div>
      <div class="panel-body form-group">
        <label for="courseID">เลือกคอร์ส</label>
        <select name="courseID" id="courseID">
            <option value="">ทั้งหมด</option>
            <?php echo Utility::createOption($this->data->courseList) ?>
        </select>
        
        <button type="submit" class="btn btn-success">Show</button>
      </div>
    </div>
</form>

<?php include('/../webs/footer.php'); ?>