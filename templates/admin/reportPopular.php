<?php include('reportHeader.php');?>
<h2>รายงานหลักสูตรที่ได้รับความนิยม ประจำเดือน <?=$this->data->month?> ปี <?=$this->data->year?></h2>
 <table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>คอร์สเรียน</th>
            <th>ชนิดคอร์ส</th>
            <th>StartDate</th>
            <th>EndDate</th>
            <th>Level</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0;
            foreach ($this->data->course as $key => $course): 
                $total += $course['count'];
        ?>
            <tr>
                <td><?=$course['course_name']?></td>
                <td class="success"><?=$course['course_type']?></td>
                <td><?=Utility::toDisplayDate($course['start_date'])?></td>
                <td><?=Utility::toDisplayDate($course['end_date'])?></td>
                <td><?=$course['level']?></td>
                <td class="text-right"><?=number_format($course['count'],0)?></td>
               
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan="5">สรุปจำนวน</th>
            <th class="text-right"><?=number_format($total,0)?></th>
        </tr>
    </tfoot>
</table>
<?php include('reportFooter.php');
