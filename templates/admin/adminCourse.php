<?php include('/../webs/header.php'); ?>
<ol class="breadcrumb">
  <li><a href="adminCourse?level=1">เลเวล 1</a></li>
  <li><a href="adminCourse?level=2">เลเวล 2</a></li>
  <li><a href="adminCourse?level=3">เลเวล 3</a></li>
  <li><a href="adminCourse?level=4">เลเวล 4</a></li>
  <li><a href="adminCourse?level=5">เลเวล 5</a></li>
</ol>
    <?php foreach ($this->data->course as $courseID => $course): ?>
        <ul  class="list-group">
            <li href="#" class="list-group-item active"> 
                <?=$course['course_name']?>
                <a href="courseDetail?courseID=<?=$courseID?>" role="button" class="btn btn-info">แก้ไขคอร์สเรียน</a>
                <a href="manageScheduleData?courseID=<?=$courseID?>" role="button" class="btn btn-success">เพิ่มตารางเรียน</a>
                <a href="deleteCourse?courseID=<?=$courseID?>" role="button" class="btn btn-danger">ลบคอร์สเรียน</a>
            </li>
            <?php foreach ($course['schedule'] as $scheduleID => $schedule): ?>  
                <?php if(!empty($scheduleID) ): ?>
                    <li href="#" class="list-group-item">
                        <?=Utility::toDisplayDate($schedule['schedule_date'])?>
                        Start :   <?=$schedule['start_time']?>
                        End :     <?=$schedule['end_time']?> 
                        Teacher : <?=$schedule['firstname'].' '.$schedule['lastname']?>
                        <a  href="manageScheduleData?scheduleID=<?=$scheduleID?>" class="btn btn-primary" role="button">แก้ไข</a>
                        <a  href="deleteSchedule?scheduleID=<?=$scheduleID?>" class="btn btn-danger" role="button">ลบ</a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul >
    <?php endforeach; ?>
    <a href="courseDetail" role="button" class="btn btn-success">เพิ่มคอร์สเรียน</a>
<?php include('/../webs/footer.php'); ?>
