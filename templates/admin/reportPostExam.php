<?php include('reportHeader.php');?>
<h2>รายงานผลทดสอบหลังเรียน</h2>
 <table class="table table-condensed table-bordered">
   
    <tbody>
        <?php foreach ($this->data->course as $courseID => $course) : ?>
            <tr>
                <th colspan="3" class="course-detail">
                    <p><?=$course['course_name']?> 
                    ชนิด : <?=$course['course_type']?> 
                    ระดับ : <?=$course['level']?> </p>
                    <p>
                    วันที่เปิดคอร์ส     : <?=Utility::toDisplayDate($course['start_date'])?>
                    วันที่สิ้นสุดคอร์ส : <?=Utility::toDisplayDate($course['end_date'])?></p>
                </th>
            </tr>
            <tr>
                <th>ชื่อนักเรียน</th>
                <th>คะแนน</th>
                <th>ผลทดสอบ</th>
            </tr>
            <?php foreach ($course['student'] as $registerID => $student) :?>
                <tr>
                    <td><?=$student['name']?></td>
                    <td class="text-right"><?=$student['score']?></td>
                    <td><span class="label label-<?=$student['alertStatus']?>"><?=$student['passStatus']?></span></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include('reportFooter.php');