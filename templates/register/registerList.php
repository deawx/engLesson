<?php include( '/../webs/header.php'); ?>
<div class="row">
  <div class="col-md-12">
      <h2>รายการสมัครเรียนของผู้ใช้</h2>
        <?php foreach ($this->data->course as $key => $course) :  ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <a href="registerDetail?id=<?=$course['course_id']?>&registerID=<?=$course['register_id']?>">
                <?=$course['course_name']?>
              </a> 
              Level.<?=$course['level']?>
            </h3>
          </div>
          <div class="panel-body">
            <span>
              <?php if($course['status'] =='Pending' || $course['status'] =='Printed'):?>
                <a target="_blank" href="printPaymentForm?id=<?=$course['course_id']?>&registerID=<?=$course['register_id']?>" class="btn btn-warning">พิมพ์แบบฟอร์มชำระเงิน</a>
              <?php endif; ?>

              <?php if($course['status'] =='Printed'):?>
               <a href="registerDetail?id=<?=$course['course_id']?>&registerID=<?=$course['register_id']?>" class="btn btn-info">แนบเอกสารการจ่ายเงิน</a>
               <?php endif; ?>
               <?php if($course['status'] =='Confirmed'):?>
                  <?php if( $course['course_type'] =='Video') : ?>
                      <a href="reserve?courseID=<?=$course['course_id']?>" class="btn btn-primary">จัดการเวลาเรียน</a>
                  <?php elseif( $course['course_type'] =='Live') : ?>
                      <a href="roomLive?courseID=<?=$course['course_id']?>" class="btn btn-primary">จัดการเวลาเรียน</a>
                  <?php endif; ?>
               <?php endif; ?>
              <?php if($course['pass_status'] =='Pass' && empty($course['test_id'])  ):?>
                 <a href="posttest?level=<?=$course['level']?>&registerID=<?=$course['register_id']?>" class="btn btn-success">ทดสอบหลังเรียน</a>
              <?php endif; ?>
              <?php if($course['status'] =='PassTest'):?>
                    <span class="label label-success">ผ่านหลักสูตร</span>
                    <span><strong>ได้คะแนน <?=$course['score']?> คะแนน</strong></span>
              <?php endif; ?>
              <?php if($course['status'] =='NotPassTest'):?>
                   <span class="label label-danger">ไม่ผ่าน</span>
                   <span><strong>ได้คะแนน <?=$course['score']?> คะแนน</strong></span>
              <?php endif; ?>
            </span>
          </div>
        </div>
        <?php endforeach;?>
  </div>
</div>
<?php include('/../webs/footer.php'); ?>