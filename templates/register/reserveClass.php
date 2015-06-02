<?php include('/../webs/header.php');  ?>
    <?php foreach ($this->data->course as $courseID => $course): ?>
        <ul  class="list-group">
            <li href="#" class="list-group-item active"> <?=$course['course_name']?></li>
            <?php foreach ($course['schedule'] as $scheduleID => $schedule): ?>  
                <li href="#" class="list-group-item">
                    <?=Utility::toDisplayDate($schedule['schedule_date'])?>
                    Start : <?=$schedule['start_time']?>
                    End : <?=$schedule['end_time']?>
                    <?php  if( empty($schedule['booking_status'] ) ): ?>
                        <?php  if( $course['course_type']=='Video' 
                                    && $course['register_status'] == 'Confirmed'  
                                    && $schedule['check_booking'] == 'notbooking' 
                                    && !empty($schedule['schedule_this_week']) 
                                    ): ?>
                       <!--  <a  href="reserveSeat?scheduleID=<?=$scheduleID?>" class="btn btn-primary" role="button">จองที่นั่ง</a> -->
                            <a  href="room?scheduleID=<?=$scheduleID?>" class="btn btn-primary" role="button">จองที่นั่ง</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if( $schedule['booking_status'] == 'Cancel'):?>
                             <span class="label label-danger"><?=$schedule['booking_status']?></span>
                        <?php elseif( $schedule['booking_status'] == 'Study'):?>
                             <span class="label label-success"><?=$schedule['booking_status']?></span>
                             <?php elseif( $schedule['booking_status'] == 'NotStudy'):?>
                             <span class="label label-danger"><?=$schedule['booking_status']?></span>
                        <?php else:?>
                            <span class="label label-info"><?=$schedule['booking_status']?></span>
                            <span class="label label-info">ที่นั่ง <?=$schedule['seat_name']?></span>
                            <?php if($course['course_type'] =='Video'): ?>
                            <a  href="study?bookingID=<?=$schedule['booking_id']?>" class="btn btn-success" role="button">เข้าเรียน</a>
                            <a  href="cancelSeat?bookingID=<?=$schedule['booking_id']?>" class="btn btn-danger" role="button">ยกเลิกที่นั่ง</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul >
    <?php endforeach; ?>

<?php include('/../webs/footer.php'); ?>