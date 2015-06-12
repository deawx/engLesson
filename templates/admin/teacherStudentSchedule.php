<?php include('/../webs/header.php'); ?>
    <h2>ตรวจสอบการเข้าเรียน ของหลักสูตร <?=$this->data->courseName?></h2>
   <form action="/engLesson/checkStudentUgly" method="post">
    <table class="table">
        <thead>
            <tr>
                <th>รายชื่อนักเรียน / คาบเรียน</th>
                <?php foreach ($this->data->schedule as $scheduleID => $schedule) : ?>
                    <th><?=Utility::toDisplayDate($schedule['schedule_date'])?></th>
                <?php endforeach;?>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->data->course as $registerID => $course) : 
                $sumStudentStudy  = 0;
                $sumTotalSchedule = 0;
                $userID = $course['user_id'];
            ?>
                <tr>
                    <td><?=$course['name']?></td>
                    <?php foreach ($this->data->schedule as $scheduleID => $schedule) : 

                        $sumTotalSchedule++;
                        $studentIsBooking = !empty( $this->data->booking[ $scheduleID ][ $userID ]['booking_id'] );
                        $studentStudyThisClass = $studentIsBooking
                         && $this->data->booking[ $scheduleID ][ $userID ]['booking_status']=='Study';
                        $studentNotStudy = $studentIsBooking && $this->data->booking[ $scheduleID ][ $userID ]['booking_status']=='NotStudy';
                        if($studentStudyThisClass)
                            $sumStudentStudy ++;
                       
                    ?>
                        <td class="text-center">
                            <?php if( $studentStudyThisClass ):?>
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <?php elseif( $studentNotStudy ):?>
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <?php else : ?>
                                <input type="checkbox" autocomplete="off" name="booking[<?=$scheduleID ?>][<?=$userID ?>]">
                            </div>
                            <?php endif; ?>
                        </td>
                    <?php endforeach;?>
                    <td class="text-center"><?=$sumStudentStudy?></td>
                    <td class="text-center">
                        <?php $userIsPass = ($sumStudentStudy / $sumTotalSchedule) >=0.8; ?>
                        <?php if($userIsPass):?>
                            <span class="label label-success">Pass</span>
                        <?php else : ?>
                            <span class="label label-danger">Not Pass</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
     <input type="hidden" name="courseID" value="<?=$this->data->courseID?>">
    <button type="submit" class="btn btn-primary">เช็คชื่อนักเรัยน</button>
    </form>
<?php include('/../webs/footer.php'); ?>