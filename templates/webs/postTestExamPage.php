<?php include('header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <h2> <?=$this->data->examName?></h2>
    <form action="posttest" method="POST">
      <input type="hidden" name="registerID"  value="<?=$this->data->registerID?>">
      <input type="hidden" name="userID"  value="<?=$this->data->userID?>">
      <input type="hidden" name="examID"    value="<?=$this->data->examID?>">
      <?php foreach ($this->data->examData as $partID => $examPart) : ?>
         <div class="form-group">
            <hr>
            <h3>Part <?=$examPart['partNo'].'. '.$examPart['partName']?></h3>
            <p><?=$examPart['partDescription']?></p>
            <p><?=$examPart['partDetail']?></p>
            <hr>
         </div>
        <?php foreach ($examPart['questionList'] as $questionID => $exam) : ?>
          <div class="form-group"><h3><?=$exam['questionNo'].'. '.$exam['question']?></h3>
            <?php foreach ($exam['questionChoice'] as $choiceID => $choice) :?>
              <ul>
                <li>
                  <input type="radio" 
                         name="choice[<?=$questionID?>]" 
                         id="choice-<?=$questionID?>" 
                         value="<?=$choiceID?>">
                  <?=$choice['choiceNo'].'. '.$choice['choice']?> 
                </li>
              </ul>
            <?php endforeach ; ?>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
        <div>
          <button type="submit" class="btn btn-success">ส่งข้อสอบ</button>
        </div>
    </form>
  </div>

</div>
<?php include('footer.php'); ?>
