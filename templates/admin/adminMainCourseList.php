<?php include('/../webs/header.php'); ?>
        <ul  class="list-group">
            <li href="#" class="list-group-item active">  ข้อมูลหลักสูตร  </li>
            <?php foreach ($this->data->course as $key => $course): ?>  
                <li href="#" class="list-group-item">
                    <div class="row">
                        <div class="col-md-9">
                             <?=$course['course_name']?>
                            ( <?=Utility::toDisplayDate( $course['create_date'] )?> )
                        </div>
                        <div class="col-md-3">
                            <a  href="showMainCourseDetail?mainCourseID=<?=$course['main_course_id']?>" 
                                class="btn btn-primary" role="button">แก้ไข</a>
                            <a  href="deleteMainCourse?mainCourseID=<?=$course['main_course_id']?>" 
                                class="btn btn-danger" role="button">ลบ</a>
                        </div>
                    </div>
                   
                    
                </li>
            <?php endforeach; ?>
        </ul >
    <a href="showMainCourseDetail" role="button" class="btn btn-success">เพิ่มหลักสูตร</a>
<?php include('/../webs/footer.php'); ?>