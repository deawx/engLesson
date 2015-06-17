<?php include('/../webs/header.php'); ?>
<h2>รายชื่อผู้สอน</h2>
<ul class="list-group">
    <?php foreach ($this->data->teacher as $key => $teacher) :?>
        <li class="list-group-item">
            <a href="editTeacher?userID=<?=$teacher['user_id']?>">
                <?=$teacher['firstname'].' '.$teacher['lastname']?>
            </a>
            <a class="btn btn-success" href="editTeacher?userID=<?=$teacher['user_id']?>" role="button">แก้ไข</a>
            <a class="btn btn-danger" href="deleteTeacher?userID=<?=$teacher['user_id']?>" role="button">ลบ</a>
        </li>
    <?php endforeach ;  ?>
</ul>
<a class="btn btn-primary" href="addTeacher" role="button">เพิ่มผู้สอน</a>
<?php include('/../webs/footer.php'); ?>