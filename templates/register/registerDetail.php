<?php include( '/../webs/header.php'); ?>
<div class="row">
  <div class="col-md-12">
      <h2>ข้อมูลผู้เรียน</h2>
        <form action="register" method="post">
          <div class="panel panel-default">
            <div class="panel-body">
              <p>
                 <?=$this->data->user['firstname'].' '.$this->data->user['lastname']?> 
                Level.<?=$this->data->user['level']?>
              </p>
            </div>
          </div>
          <h2>ข้อมูลการสมัคร</h2>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$this->data->course['course_name']?> Level.<?=$this->data->course['level']?></h3>
            </div>
            <div class="panel-body">
              <p>
                ราคา <?=number_format($this->data->course['price'],2)?> บาท
                ที่นั่ง : <?=$this->data->course['max_seat']?> 
                เหลือที่นั่ง : <?=$this->data->course['remain_seat']?>
              </p>
              <p>Start: <?=Utility::toDisplayDate($this->data->course['start_date'])?> 
                  End : <?=Utility::toDisplayDate($this->data->course['end_date'])?></p>
            </div>
            <?php if( empty($this->data->register) ) :?>
            <div class="panel-footer">
              <input type="hidden" name="courseID" value="<?=$this->data->course['course_id']?>">
              <input type="hidden" name="userID" value="<?=$this->data->user['user_id']?>">
              <button type="submit" class="btn btn-success">ยืนยันการสมัคร</button>
            </div>
           <?php endif; ?>
          </div>
        </form>
        <?php if( !empty($this->data->register) ) :?>
        <h2>ข้อมูลการจ่ายเงิน</h2>
       <form action="sendPaymentFile" method="post" enctype="multipart/form-data"> 
      <!--   <form action="libs/upload.php" method="post" enctype="multipart/form-data"> -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$this->data->register['status'].' '.$this->data->register['pay_date']?> </h3>
            </div>
            <div class="panel-body">
              <p>Register Date : <?=$this->data->register['register_date']?></p>
              <?php if( empty($this->data->register['pay_date']) ) : ?>
               <p>Expired  Date : <?=$this->data->register['register_end_date']?></p>
               <div class="form-group">
                  <label for="fileUpload">เอกสารการจ่ายเงิน</label>
                  <input type="file"   name="fileUpload" id="fileUpload">
                  <input type="hidden" name="registerID" value="<?=$this->data->register['register_id']?>">
                </div>
               <button type="submit" class="btn btn-success">แนบเอกสารจ่ายเงิน</button>
            </div>
            <?php else: ?>
             <a target="_blank" href="files/<?=$this->data->register['file_name']?>">เอกสารการจ่ายเงิน</a>
            <?php endif; ?>
          </div>
        </form>
        <?php endif; ?>
  </div>
</div>
<?php include('/../webs/footer.php'); ?>