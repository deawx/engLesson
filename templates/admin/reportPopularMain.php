<?php include('/../webs/header.php'); ?>
<h2>รายงาน</h2>
<form  target="_blank" class="form-inline" action="reportPopular" method="post">
    <div class="panel panel-primary">
      <div class="panel-heading">รายงาน หลักสูตรที่นิยม</div>
      <div class="panel-body form-group">
        <label for="month">เดือน</label>
        <select name="month" id="month">
            <option value="">ทั้งหมด</option>
            <?php echo Utility::createOption($this->data->monthList) ?>
        </select>
        <label for="year">ปี</label>
        <select name="year" id="year">
            <option value="">เลือกปี</option>
            <?php echo Utility::createOption($this->data->yearList,date('Y')) ?>
        </select>
        <button type="submit" class="btn btn-success">Show</button>
      </div>
    </div>
</form>

<?php include('/../webs/footer.php'); ?>