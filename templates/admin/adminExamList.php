<?php include('/../webs/header.php'); ?>
    <h2>จัดการข้อมูลข้อสอบ</h2>
    <?php foreach ($this->data->exam as $examID => $exam):?>
        <ul  class="list-group">
            <li href="#" class="list-group-item active"> 
                <?=$exam['exam_name']?>
                <a href="showExamDetail?examID=<?=$examID?>" role="button" class="btn btn-info">แก้ไขข้อสอบ</a>
                <a href="deleteExam?examID=<?=$examID?>" role="button" class="btn btn-danger">ลบข้อสอบ</a>
                <!-- <a href="addExamPart?examID=<?=$examID?>" role="button" class="btn btn-success">เพิ่ม Part ข้อสอบ</a> -->
                <a href="showPartDetail?examID=<?=$examID?>" role="button" class="btn btn-success">จัดการ Part ข้อสอบ</a>
            </li>
            <?php foreach ($exam['part'] as $partID => $examPart): ?>  
                <?php if(!empty($partID) ): ?>
                    <li href="#" class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                <?=$examPart['partNo'].'. '.$examPart['partName']?>
                                ( <?=$examPart['partDescription']?> ) 

                            </div>
                           <!--   <div class="col-md-offset-10"> <a  href="editExamPart?partID=<?=$partID?>" 
                                class="btn btn-primary" role="button">แก้ไข</a>
                                </div> -->
                        </div>   
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul >
    <?php endforeach ; ?>
    <a href="showExamDetail" role="button" class="btn btn-success">เพิ่มข้อสอบ</a>
<?php include('/../webs/footer.php'); ?>