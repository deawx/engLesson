<?php include('/../webs/header.php'); ?>
<h2>รายงาน</h2>
<ul class="list-group">
  <?php if($_SESSION['userDetail']['user_type'] == 'executive'):?>
  <li class="list-group-item"><a href="reportIncomeMain">รายงานรายรับ</a></li>
  <li class="list-group-item"><a href="reportPopularMain">รายงาน หลักสูตรที่ได้รับความนิยม</a></li>
  <?php endif; ?>
  <li class="list-group-item"><a href="reportPostExamMain">รายงานผลทดสอบหลังเรียน</a></li>
</ul>
<?php include('/../webs/footer.php'); ?>