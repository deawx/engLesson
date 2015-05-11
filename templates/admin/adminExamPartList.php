<?php include('/../webs/header.php'); ?>
    <h2>จัดการข้อมูลข้อสอบ</h2>
    <?php foreach ($this->data->exam as $partID => $part):?>
        <ul  class="list-group">
            <li href="#" class="list-group-item active"> 
                Part <?=$part['partNo'].'. '.$part['partName'].' '.$part['partDescription']?>
                <a href="showPartData?partID=<?=$partID?>" role="button" class="btn btn-info">แก้ไขPartข้อสอบ</a>
                <a href="deletePartExam?partID=<?=$partID?>" role="button" class="btn btn-danger">ลบ Partข้อสอบ</a>
                <a href="showQuestionDetail?partID=<?=$partID?>" role="button" class="btn btn-success">เพิ่มคำถาม</a>
            </li>
            <?php foreach ($part['questionList'] as $questionID => $question): ?>  
                <?php if(!empty($questionID) ): ?>
                    <li href="#" class="list-group-item">
                        <p><?=$question['questionNo'].'. '.$question['question']?>
                            <a href="showQuestionDetail?questionID=<?=$questionID?>" role="button" class="btn btn-info">แก้ไขคำถาม</a>
                            <a href="deleteQuestion?questionID=<?=$questionID?>" role="button" class="btn btn-danger">ลบคำถาม</a>
                        </p>
                        <ul>
                            <?php foreach ($question['questionChoice'] as $choiceID => $choice): ?>
                                <li><?=$choice['choiceNo'].'. '.$choice['choice']?></li>  
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul >
    <?php endforeach ; ?>
    <a href="showPartData?examID=<?=$this->data->examID?>" role="button" class="btn btn-success">เพิ่ม Partข้อสอบ</a>
<?php include('/../webs/footer.php'); ?>