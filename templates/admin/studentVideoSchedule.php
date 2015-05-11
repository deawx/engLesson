<?php include('/../webs/header.php'); ?>
    <h2>ตรวจสอบรายชื่อนักเรียน</h2>
    <?php foreach ($this->data->course as $courseID => $course) : ?>
        <div class="list-group">
            <a href="showStudentVideoSchedule/<?=$courseID?>" class="list-group-item active">
                <?=$course['course_name']?> <strong>Date</strong>  
                <?=Utility::toDisplayDate($course['start_date'])?> - 
                <?=Utility::toDisplayDate($course['end_date'])?> 
             
            </a>
            <?php foreach ($course['schedule'] as $scheduleID => $schedule):?>
                <a class="list-group-item"> 
                    <strong>Date</strong>
                    <?=Utility::toDisplayDate($schedule['schedule_date'])?>
                    <strong>Time</strong> 
                    <?=$schedule['start_time'].' - '.$schedule['end_time']?>
                </a> 
            <?php endforeach ; ?>
        </div>
    <?php endforeach;?>
<?php include('/../webs/footer.php'); ?>