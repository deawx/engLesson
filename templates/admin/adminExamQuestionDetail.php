<?php include('/../webs/header.php'); ?>
   <h2>จัดการข้อสอบ</h2>
<form class="form-horizontal" action="<?=$this->data->action?>" method="post">
  <div class="form-group">
    <label for="questionNo" class="col-md-2 control-label">ข้อ</label>
    <div class="col-md-2">
      <input type="text" 
             class="form-control" 
             id="questionNo" 
             name="questionNo" 
             placeholder="กรอกเลขข้อ"
             value="<?=$this->data->exam['question_no']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="question" class="col-md-2 control-label">คำถาม</label>
    <div class="col-md-10">
      <input type="text" 
             class="form-control" 
             id="question" 
             name="question" 
             placeholder="กรอกคำถาม"
             value="<?=$this->data->exam['question']?>">
    </div>
  </div>
  <hr>
  <div class="form-group">
    <label for="an" class="col-md-2 control-label">คำตอบ</label>
  </div>
  <?php for ($choice=1; $choice <=4 ; $choice++) : 
    $thisChoiceIsAnswer = $this->data->exam['answer'] == $this->data->exam['choice'][$choice]['exam_choice_id'];
    $choiceData         = $this->data->exam['choice'][$choice];
  ?>
  <div class="form-group">
    <label for="choice" class="col-md-2 control-label"><?=$choice?></label>
    <div class="radio" >
      <label for="answer" class="col-md-10" >
        <input type="radio"  name="answer" value=<?=$choice?> <?=( $thisChoiceIsAnswer )? 'checked': '' ; ?> >
        <input type="text" 
             class="form-control" 
             id="choice-<?=$choice?>" 
             name="choice[<?=$choice?>]" 
             placeholder="กรอกคำตอบ"
             value="<?=$choiceData['choice']?>">
        <?php if($this->data->action=='editExamQuestion'):?>
            <input type="hidden" name="choiceID[<?=$choice?>]" value="<?=$choiceData['exam_choice_id']?>">
        <?php endif; ?>
      </label>
    </div>
  <!--   <div class="col-md-4">
      
    </div> -->
  </div>
  <?php endfor; ?>

  
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
       <button type="submit" class="btn btn-primary"><?=$this->data->buttonName?></button>
       <?php if($this->data->action=='addExamQuestion'):?> 
            <button type="submit" class="btn btn-primary" value="nextQuestion" name="nextQuestionButton">เพิ่มคำถามถัดไป</button>
            <input type="hidden" name="partID" value="<?=$this->data->partID?>">
        <?php endif; ?>
        <?php if($this->data->action=='editExamQuestion'):?>
            <input type="hidden" name="questionID" value="<?=$this->data->questionID?>">
        <?php endif; ?>
    </div>
  </div>
   
</form>
<?php include('/../webs/footer.php'); ?>