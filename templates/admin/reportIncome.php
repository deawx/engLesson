<?php include('reportHeader.php');?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h2>รายงานรายรับ ประจำเดือน <?=$this->data->month?> ปี <?=$this->data->year?></h2>

          </div>
          <div class="panel-body">
            <p>ผู้ออกรายงาน : ceo</p>
            <p>วันที่พิมพ์ <?=date('d/m/Y');?></p>
          </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-10">
<div class="panel panel-default">
    <div class="panel-body">
     <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <th>คอร์สเรียน</th>
                <th>ชนิดคอร์ส</th>
                <th>ชื่อ</th>
                <th>CourseDate</th>
                <th>RegisterDate</th>
             <!--    <th>Status</th> -->
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
                    <!-- <td><?=$course['status']?></td> -->
                    <td class="text-right"><?=Utility::toDisplayDate($course['pay_date'])?></td>
                    <td class="text-right"><?=number_format($course['price'],2)?></td>
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center" colspan="6">สรุปรายรับ</th>
                <th class="text-right"><?=number_format($total,2)?></th>
            </tr>
        </tfoot>
    </table>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">
              <p>รวมรายรับเดือน <?=$this->data->month?> </p>
          </div>
          <div class="panel-body">
            <p>สรุปรายรับ <?=number_format($total,2)?> บาท</p>
          </div>
        </div>

    </div>
</div>
<?php include('reportFooter.php');
?>
