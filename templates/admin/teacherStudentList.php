<?php include(__DIR__.'/../webs/header.php'); ?>
    <h2>เช็คชื่อนักเรียน</h2>
    <div class="row">
        <div class="col-md-10">
            <form action="/engLesson/checkStudent" method="post">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach ($this->data->course as $key => $student):?>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="student[<?=$key?>]" value="<?=$student['user_id']?>">
                                <?=$student['firstname'].' '.$student['lastname']?>
                              </label>
                            </div>
                        <?php endforeach ; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">เช็คชื่อนักเรัยน</button>
                <input type="hidden" name="scheduleID" value="<?=$this->data->scheduleID?>">
               
            </form>
        </div>
    </div>
<?php include('/../webs/footer.php'); ?>