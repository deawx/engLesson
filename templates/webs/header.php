<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>English Test</title>

    <!-- Bootstrap -->
    <link href="/engLesson/css/bootstrap.css" rel="stylesheet">
    <link href="/engLesson/css/datepicker.css" rel="stylesheet">
    <link href="/engLesson/css/mainpage.css" rel="stylesheet">

  </head>
  <body>
    <?php $request = substr($_SERVER['REQUEST_URI'],11);?>
    <div class="container">
       <div class="row head-web">
          <div class="col-md-9 col-md-offset-2">
            <!-- <h1 class="text-title">ระบบบริหารการจัดการสถาบันสอนภาษาอังกฤษ</h1> -->
          </div>   
       </div>
       <div class="row">
         <nav class="navbar navbar-default eng-navbar ">
          <div class="container-fluid">
            <div class="navbar-header">
              <a id="eng-nav" class="navbar-brand" href="mainCourse">หน้าแรก</a>
            </div>
            <div>

              <ul class="nav navbar-nav">
                <li class="<?=(isset($_GET['menu']) && $_GET['menu']=='showCourse')? 'active':'' ;?>">
                  <a href="/engLesson/showCourse?menu=showCourse">แสดงตารางเรียน</a></li>
                <li class="<?=(isset($_GET['menu']) && $_GET['menu']=='exam')? 'active':'' ;?>">
                  <a href="/engLesson/examList?menu=exam">ทำแบบทดสอบ</a></li>
           <!--      <li class="<?=(isset($_GET['menu']) && $_GET['menu']=='register')? 'active':'' ;?>">
                  <a href="register?menu=register">สมัครเรียน</a></li> -->
                <!-- <li><a href="registerList">ชำระเงิน</a></li> -->
                <li class="<?=(isset($_GET['menu']) && $_GET['menu']=='contactUs')? 'active':'' ;?>">
                  <a href="/engLesson/contactUs?menu=contactUs">ติดต่อเรา</a></li>
                <li class="<?=(isset($_GET['menu']) && $_GET['menu']=='admin')? 'active':'' ;?>">
                  <a href="/engLesson/admin?menu=admin">เข้าสู่ระบบ</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <section>
      <div class="row">
        <?php if( !empty($_SESSION['loginUser']) ): ?>
          <aside>
            <div class="col-md-2 side-menu">
                <nav class="navbar navbar-default" role="navigation">
                  <div class="navbar-header">Student Menu</div>

                  <div class="side-menu-container">
                    <div class="user-detail">
                    <p>User : <?=$_SESSION['userDetail']['username']?></p>
                    <p>Name : <?=$_SESSION['userDetail']['firstname'].' '.$_SESSION['userDetail']['lastname']?></p>
                  </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="studentMenu">
                          <span class="glyphicon glyphicon-plane"></span>Student Menu</a></li>
                        <li><a href="logout"><span class="glyphicon glyphicon-cloud"></span> Logout</a></li>
                    </ul>
                  </div>
                 
                </nav>
            
            </div>
          </aside>
        <?php endif; ?>
        <?php if( !empty($_SESSION['admin']) ): ?>
          <aside>
            <div class="col-md-2 side-menu">
                <nav class="navbar navbar-default" role="navigation">
                  <div class="navbar-header">Admin Menu</div>
                  <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li  class="<?=($request =='showMainCourseList')? 'active':'' ;?>">
                          <a href="/engLesson/showMainCourseList"><span class="glyphicon glyphicon-send"> </span> ข้อมูลหลักสูตร</a></li>
                        <li  class="<?=($request =='adminCourse')? 'active':'' ;?>">
                          <a href="/engLesson/adminCourse"><span class="glyphicon glyphicon-send"> </span> ข้อมูลคอร์สเรียน</a></li>
                        <li  class="<?=($request =='showExamList')? 'active':'' ;?>">
                          <a href="/engLesson/showExamList"><span class="glyphicon glyphicon-send"> </span> ข้อมูลแบบทดสอบ</a></li>
                        <li  class="<?=($request =='showRegisterList')? 'active':'' ;?>">
                          <a href="/engLesson/showRegisterList"><span class="glyphicon glyphicon-send"> </span> ข้อมูลการจ่ายเงิน</a></li>
                         <?php if($_SESSION['userDetail']['user_type'] == 'Admin'):?>
                         <li  class="<?=($request =='showStudentVideo')? 'active':'' ;?>">
                          <a href="/engLesson/showStudentVideo"><span class="glyphicon glyphicon-send"> </span>ข้อมูลการเข้าเรียนคอร์สวีดีโอ</a></li>
                         <?php endif; ?>
                          <?php if($_SESSION['userDetail']['user_type'] == 'Teacher'):?>
                        <li  class="<?=($request =='showTeacherSchedule')? 'active':'' ;?>">
                          <a href="/engLesson/showTeacherSchedule"><span class="glyphicon glyphicon-send"> </span> เช็คชื่อนักเรียน</a></li>
                         <?php endif; ?>
                        <?php if($_SESSION['userDetail']['user_type'] == 'executive'):?>
                        <li class="active"><a href="/engLesson/report">
                          <span class="glyphicon glyphicon-plane"></span>รายงาน</a></li>
                        <?php endif; ?>
                        <li><a href="logout"><span class="glyphicon glyphicon-cloud"></span> Logout</a></li>
                        
                    </ul>
                  </div>
                 
                </nav>
            
            </div>
          </aside>
        <?php endif; ?>
        <section>
          <?php if(empty($_SESSION['admin']) && empty($_SESSION['loginUser']) ): ?>
          <div class="col-md-12">
          <?php else : ?>
          <div class="col-md-10">
          <?php endif; ?>
            <article>