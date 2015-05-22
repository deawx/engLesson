<?php include('/../webs/header.php'); ?>
    <h2>จัดการข้อมูลการจ่ายเงิน</h2>
    <table class="table">
        <thead>
            <tr>
                <th>คอร์สเรียน</th>
                <th>ชนิดคอร์ส</th>
                <th>ชื่อ</th>
                <th>RegisterDate</th>
                <th>EndDate</th>
                <th>Status</th>
                <th>PayDate</th>
                <th>Doc.</th>
                <th>Confirm</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data->course as $key => $course): 
                $body = "Already Comfirm your payment course ".$course['course_name'].' you can reserve for your seat now';
            ?>
                <tr>
                    <td><?=$course['course_name']?></td>
                    <td class="success"><?=$course['course_type']?></td>
                    <td><?=$course['firstname'].' '.$course['lastname']?></td>
                    <td><?=Utility::toDisplayDate($course['register_date'])?></td>
                    <td><?=Utility::toDisplayDate($course['register_end_date'])?></td>
                    <td><?=$course['status']?></td>
                    <td class="text-right"><?=Utility::toDisplayDate($course['pay_date'])?></td>
                    <td> <a target="_blank" href="files/<?=$course['file_name']?>">เอกสาร</a></td>
                    <?php if($course['status'] !='Confirmed'):?>
                    <td> <a href="updatePaymentStatus/<?=$course['register_id']?>/Confirmed" role="button" class="btn btn-success">ยืนยันการสมัคร</a></td>
                    <td> <a href="updatePaymentStatus/<?=$course['register_id']?>/Cancel" role="button" class="btn btn-danger">ยกเลิกการสมัคร</a></td>

                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php include('/../webs/footer.php'); ?>