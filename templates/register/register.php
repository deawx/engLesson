<?php include( '/../webs/header.php'); ?>
<div class="row">
  <div class="col-md-12">
      <?php foreach ($this->data->courseType as $courseType => $typeName): ?>
        <h2>สมัครเรียน<?=$typeName?></h2>
        <?php if( !empty($this->data->course[$courseType])  ):?>
        <?php  foreach ($this->data->course[$courseType] as $index => $courseLive): ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                <a href="registerDetail?id=<?=$index?>"><?=$courseLive['course_name']?></a> 
                Level.<?=$courseLive['level']?>
              </h3>
            </div>
            <div class="panel-body">
              <p>
                ราคา <?=number_format($courseLive['price'],2)?> บาท
                ที่นั่ง : <?=$courseLive['max_seat']?> 
                เหลือที่นั่ง : <?=$courseLive['remain_seat']?>
              </p>
            </div>
            <div class="panel-footer">
              <p>Start: <?=Utility::toDisplayDate($courseLive['start_date'])?> End : <?=Utility::toDisplayDate($courseLive['end_date'])?></p>
            </div>
          </div>
        <?php endforeach; ?>
        <?php endif;?>
      <?php endforeach; ?>
  </div>
</div>
<?php include('/../webs/footer.php'); ?>