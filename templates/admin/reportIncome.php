<?php include('reportHeader.php');?>
<h2>รายงานรายรับ ประจำเดือน <?=$this->data->month?> ปี <?=$this->data->year?></h2>
 <table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>คอร์สเรียน</th>
            <th>ชนิดคอร์ส</th>
            <th>ชื่อ</th>
            <th>CourseDate</th>
            <th>RegisterDate</th>
            <th>Status</th>
            <th>PayDate</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0;
            foreach ($this->data->course as $key => $course): 
                $total += $course['price'];
        ?>
            <tr>
                <td><?=$course['course_name']?></td>
                <td class="success"><?=$course['course_type']?></td>
                <td><?=$course['firstname'].' '.$course['lastname']?></td>
                <td><?=Utility::toDisplayDate($course['start_date'])?></td>
                <td><?=Utility::toDisplayDate($course['register_date'])?></td>
                <td><?=$course['status']?></td>
                <td class="text-right"><?=Utility::toDisplayDate($course['pay_date'])?></td>
                <td class="text-right"><?=number_format($course['price'],2)?></td>
               
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan="7">สรุปรายรับ</th>
            <th class="text-right"><?=number_format($total,2)?></th>
        </tr>
    </tfoot>
</table>
<?php include('reportFooter.php');