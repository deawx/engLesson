<?php 
 ini_set('display_errors', 1);
 error_reporting(E_ALL);

// error_reporting( error_reporting() & ~E_NOTICE );

session_start();
// if(!isset($_SESSION['loginUser']))
//     $_SESSION['loginUser']='';
    require_once 'libs/connect.php';
    require_once 'libs/utility.php';
    require_once 'libs/Slim/Slim/Slim.php';
    // require_once 'libs/Slim-1.6.7/Slim.php';
    require_once 'libs/class/courseClass.php';
    require_once 'libs/class/userClass.php';
    require_once 'libs/class/examClass.php';
    require_once 'libs/class/roomClass.php';

    require_once 'libs/PHPMailer/PHPMailerAutoload.php';

    use \Slim\Slim;
// $loader = new Slim();
// $loader->register();

    Slim::registerAutoloader();
    $app = new Slim();
    //database connect
    $app->db = $dbClass->connect; 
    $app->db->exec("set names utf8");
    //set Email
    $app->mail = new PHPMailer(); // create a new object
    $app->mail->IsSMTP(); // enable SMTP
    $app->mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
    $app->mail->SMTPAuth = true; // authentication enabled
    $app->mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $app->mail->Host = "smtp.gmail.com";
    $app->mail->Port = 465; // or 587
    $app->mail->IsHTML(true);
    $app->mail->Username = "ttwtnt2d@gmail.com";
    $app->mail->Password = "tt2038353";
    $app->mail->SetFrom("ttwtnt2d@gmail.com");

    //set view template folder
    $view = $app->view();
    $view->setTemplatesDirectory('./templates');
    //routes
    $app->get('/', 'home');
    $app->get('/mainCourse', 'mainCourse');
    $app->get('/pretest', 'sigUpPretest');
    $app->get('/posttest', 'showPostTestExam');
    $app->get('/signInPretest', 'signInPretest');
    $app->get('/logout', 'logout');


    $app->post('/login', 'login');
    $app->post('/signUpPretestExam', 'signUpPretestExam');
    $app->post('/checkPretestScore', 'checkPretestScore');
    $app->post('/pretest', 'checkPretestExam');
    $app->post('/posttest', 'checkPosttestExam');
   

    $app->get('/examList', 'examList');
    $app->get('/room', 'showRoom');
    $app->get('/roomLive', 'showRoomLive');

    $app->get('/showCourse', 'showCoursePage');
    $app->get('/approveUser', 'approveUser');
     $app->post('/register', 'registerCourse');
    $app->get('/register', 'showCourseList');
    $app->get('/reserve', 'showClassList');
    $app->get('/reserveSeatRoom', 'reserveSeatRoom');
    $app->get('/reserveSeatLiveRoom', 'reserveSeatLiveRoom');
    $app->get('/registerList', 'showRegisterList');
    $app->get('/studentMenu', 'showStudentMenu');
    
    $app->get('/registerDetail', 'registerDetail');
    $app->get('/reserveSeat', 'reserveSeat');
    $app->get('/cancelSeat', 'cancelSeat');
    $app->get('/printPaymentForm', 'printPaymentForm');
    $app->get('/printForm', 'printForm');
    $app->get('/study', 'study');
    $app->get('/studentStudyData', 'studentStudyData');
    $app->post('/studentData','updateStudentData');
    $app->post('/sendPaymentFile','sendPaymentFile');
    //ADMIN
    $app->get('/admin', 'showAdminPage');
    $app->get('/report', 'showReportList');
    $app->get('/adminLogin', 'showAdminLoginPage');
    $app->get('/studentInformation', 'showStudentInformation');
    $app->post('/studentInformation', 'editStudentInformation');
    $app->post('/adminLogin', 'loginForAdmin');

    $app->get('/adminCourse', 'showCourseListForAdmin');
    $app->get('/courseDetail', 'showCourseDetail');
    $app->post('/addCourseDetail', 'addCourseDetail');
    $app->post('/editCourseDetail', 'editCourseDetail');

    $app->get('/manageScheduleData', 'manageScheduleData');
    $app->post('/addSchedule', 'addSchedule');
    $app->post('/editSchedule', 'editSchedule');
    $app->post('/reportIncome', 'reportIncome');
    $app->post('/reportPopular', 'reportPopular');
    $app->post('/reportPostExam', 'reportPostExam');

    $app->get('/showExamList', 'showExamList');
    $app->get('/showExamDetail', 'showExamDetail');
    $app->get('/showPartDetail', 'showPartDetail');
    $app->get('/showQuestionDetail', 'showQuestionDetail');
    $app->post('/addExamPart', 'addExamPart');
    $app->post('/editExamPart', 'editExamPart');
    $app->post('/addExamDetail', 'addExamDetail');
    $app->post('/editExamDetail', 'editExamDetail');
    $app->post('/addExamQuestion', 'addExamQuestion');
    $app->post('/editExamQuestion', 'editExamQuestion');
    $app->post('/checkStudent', 'checkStudent');

    $app->get('/showRegisterList', 'showRegisterListForAdmin');
    $app->get('/showTeacherSchedule', 'showTeacherSchedule');
    $app->get('/showTeacherList', 'showTeacherList');
    $app->get('/showStudentList/:courseID/:scheduleID', 'showStudentList');
    $app->get('/showStudentSchedule/:courseID', 'showStudentSchedule');
    $app->get('/showStudentVideoSchedule/:courseID', 'showStudentVideoSchedule');
    $app->get('/showStudentVideo/', 'showStudentVideo');

    $app->get('/showPartData', 'showPartData');
    $app->get('/deleteMainCourse', 'deleteMainCourse');
    $app->get('/deleteCourse', 'deleteCourse');
    $app->get('/deleteSchedule', 'deleteSchedule');
    $app->get('/deletePartExam', 'deletePartExam');
    $app->get('/deleteQuestion', 'deleteQuestion');
    $app->get('/deleteExam', 'deleteExam');
    $app->get('/contactUs', 'contactUs');
    $app->get('/sendMail', 'sendMail');
    $app->get('/editTeacher', 'editTeacher');
    $app->post('/editTeacher', 'editTeacherData');
    $app->get('/addTeacher', 'addTeacher');
    $app->post('/addTeacher', 'addTeacherData');
    $app->get('/deleteTeacher', 'deleteTeacher');

    $app->get('/reportIncomeMain'  , 'reportIncomeMain');
    $app->get('/reportPopularMain' , 'reportPopularMain');
    $app->get('/reportPostExamMain', 'reportPostExamMain');

     $app->get('/reportIncomeData'  , 'reportIncomeData');


    $app->get('/updatePaymentStatus/:registerID/:status', 'updatePaymentStatus');

    $app->get('/showMainCourseList', 'showMainCourseList');
    $app->get('/showMainCourseDetail', 'showMainCourseDetail');
    $app->post('/editMainCourse', 'editMainCourse');
    $app->post('/addMainCourse', 'addMainCourse');
    $app->post('/checkStudentUgly', 'checkStudentUgly');
    $app->get('/checkScheduleTime', 'checkScheduleTime');
    $app->get('/checkCourseDate', 'checkCourseDate');

    $app->run(); 
    function home($username='')
    {
        $app = Slim::getInstance();
        $app->render('login-form.php',array('username'=>$username));
    }
    function mainCourse()
    {
         $app = Slim::getInstance();
         $page="webs/mainCourse.php";
         $sql="SELECT * FROM main_course";
         $sth = $app->db->prepare($sql);
         $sth->execute();
         $result = $sth->fetchAll(PDO::FETCH_ASSOC);
         $data=array(
            'course' => $result
        );

         $app->render($page,$data);
    }
    function checkAuthenticatedUser($session)
    {
        $app = Slim::getInstance();
        if( empty( $session['loginUser'] ) )
        {
            // $app->render('login-form.php',array('username'=> 'Insert New Login'));
           $app->redirect('../engLesson');exit;
        }
    }
    function checkUserIsLogined($app,$session,$page,$data)
    {
        if( empty( $session['loginUser'] ) )
        {
            $data['username'] ='Insert New Login';
            // $app->render('webs/studentLogin.php',array('username'=> 'Insert New Login'));
            $app->render('admin/adminLogin.php',$data);
        }
        else
        {
            $user = new User($app->db,$session,'student');
            $data['user'] = $user->user;

            // $data=array('user' => $user->user);
            // echo '<pre>';print_r($data);
            $app->render($page,$data);
        }
    }
    function sendPaymentFile()
    {
        $app = Slim::getInstance();
        $request = $app->request();
        $post = $request->post();
        if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"files/".$_FILES["fileUpload"]["name"]))
        {
             $query = $app->db->prepare("UPDATE register SET 
                status ='Paid',
                file_name=:fileName ,
                pay_date = CURDATE()
                WHERE register_id=:registerID " );
            $query->bindParam(':fileName', $_FILES["fileUpload"]["name"] );
            $query->bindParam(':registerID', $post['registerID']);
            $query->execute();
        }
        $app->redirect('../engLesson/studentMenu');
    }
    function approveUser()
    {
        $app       = Slim::getInstance();
        $sql="UPDATE student SET status='Y' WHERE user_id=:userID";
          $query = $app->db->prepare($sql);
            $query->bindParam(':userID', $_GET['userID']);
            $query->execute();
         $app->redirect('../engLesson/studentMenu?status=approved');
    }
    function signUpPretestExam()
    {
        $app       = Slim::getInstance();
        $request   = $app->request();
        $post      = $request->post();
        $userClass = new User($app->db);
        $thisPeopleAlreadyTestPretest = $userClass->checkThisPeopleDidPretestExam($post['firstname'],$post['lastname']);
        if($thisPeopleAlreadyTestPretest)
        {
            $app->redirect('/engLesson/pretest?firstTest=FALSE');
        }
        $examClass = new Exam($app->db);
        $examClass->getExamList(array('level' => 0));

        $randomExam =array_rand($examClass->exam);
        $examClass->getPretestExam($filter=array('examID' => $randomExam ));

        $examName = $examClass->exam[0]['exam_name'];
        $examID   = $examClass->exam[0]['exam_list_id'];
        $examClass->setPretestExam($filter=array());
        $data=array(
            'firstname' =>  $post['firstname'],
            'lastname'  =>  $post['lastname'],
            'examName'  =>  $examName,
            'examID'    =>  $examID,
            'examData'  =>  $examClass->exam
        );
        $app->render('webs/preTestExamPage.php',$data);
    }
    function checkPosttestExam()
    {
        $app       = Slim::getInstance();
        $request   = $app->request();
        $post      = $request->post();

        $isPass    = 'N';
        $classStatus ='NotPassTest';
        $examClass = new Exam($app->db);
        $examClass->getExamDetail(array('examID' => $post['examID']));
        $examData  = $examClass->exam;
        $answers   = $examClass->getExamAnswer( array('examID' => $post['examID']));
        $score     = $examClass->getTestScore( $post['choice'] , $answers);

        $totalQuestion = count($answers);
        $studentIsPass = $score/$totalQuestion >=0.8;
        if($studentIsPass)
        {
            $isPass='Y';
            $classStatus ='PassTest';
        }
        $scoreQuery = $app->db->prepare("INSERT INTO exam 
                (user_id, score,level,test_date,exam_list_id,ispass,register_id) 
                VALUES (:userID, :score ,:level,CURDATE(),:examID,:isPass,:registerID)");
            $scoreQuery->bindParam(':userID', $post['userID']);
            $scoreQuery->bindParam(':score', $score);
            $scoreQuery->bindParam(':level', $examData['level']);
            $scoreQuery->bindParam(':examID', $post['examID']);
            $scoreQuery->bindParam(':isPass', $isPass);
            $scoreQuery->bindParam(':registerID', $post['registerID']);
            $scoreQuery->execute();
        
        $passClassQuery = $app->db->prepare("UPDATE register 
            SET status='{$classStatus}' 
            WHERE register_id='{$post['registerID']}'");
        $passClassQuery->execute();

        $app->redirect('/engLesson/registerList');
        // print_r( $scoreQuery->errorInfo() ); 
    }
    function checkPretestExam()
    {
        //find answer > check answer > insert user data > insert pretest exam result
         $app = Slim::getInstance();
        $request = $app->request();
        $post = $request->post();
        // echo '<pre>';print_r($post);
        $sql="SELECT q.exam_question_id,q.answer FROM exam_question q 
            INNER JOIN exam_part p ON p.exam_part_id = q.exam_part_id
            WHERE p.exam_list_id='{$post['examID']}'";
        $query=$app->db->prepare($sql);
        $query->execute();
        $examAnswers = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($examAnswers as $key => $examAnswer) {
            $index = $examAnswer['exam_question_id'];
            $answers[$index]['answer'] = $examAnswer['answer'];
        }
        // echo '<pre>';print_r($answers);
        $score =0;
        foreach ($post['choice'] as $questionID => $choice) {
            // echo $choice.'>>>>...'.$answers[$questionID]['answer'].'<hr>';
            $correctAnswer = $choice == $answers[$questionID]['answer'];
            if( $correctAnswer )
                $score++;
        }

        //check this user userd to test pretest
        $checkUserQuery = $app->db->prepare("SELECT COUNT(*) 
            FROM student 
            WHERE firstname='{$post['firstname']}'
            AND lastname='{$post['lastname']}'");
         $checkUserQuery->execute();
         $userNeverTestPretest = $checkUserQuery->fetchColumn()==0;
        
        if($userNeverTestPretest)
        {
            if($score <=8)
                $level=1;
            else if($score <=16)
                $level=2;
            else if($score <=24)
                $level=3;
            elseif($score <=32)
                $level=4;
            else
                $level=5;
            $stmt = $app->db->prepare("INSERT INTO student (firstname, lastname,create_date,level) 
                    VALUES (:firstname, :lastname ,CURDATE(),:level)");
            $stmt->bindParam(':firstname', $post['firstname']);
            $stmt->bindParam(':lastname', $post['lastname']);
            $stmt->bindParam(':level', $level);
            $stmt->execute();
            // echo '<pre>';print_r($post);
            $userID = $app->db->lastInsertId(); 

            
               // echo $level;exit;
            $pretestLevel= 0;
            $scoreQuery = $app->db->prepare("INSERT INTO exam (user_id, score,level,test_date,exam_list_id) 
                VALUES (:userID, :score ,:level,CURDATE(),:examID)");
            $scoreQuery->bindParam(':userID', $userID);
            $scoreQuery->bindParam(':score', $score);
            $scoreQuery->bindParam(':level', $pretestLevel);
            $scoreQuery->bindParam(':examID', $post['examID']);
            $scoreQuery->execute();
            $app->render('webs/preTestResultPage.php',array(
                'score'  => $score,
                'level'  => $level,
                'userID' => $userID
            ));
        }
        else
            $app->redirect('examList');
    }
    function showClassList()
    {
        checkAuthenticatedUser($_SESSION);
        $app         = Slim::getInstance();
        $courseClass = new Course($app->db);
        $courseID='';
        $studyData ='';
        if(!empty( $_GET['courseID'] ) )
            $courseID = $_GET['courseID'];
        if(!empty( $_GET['studyData'] ) )
            $studyData = $_GET['studyData'];
        $courseClass->getUserCourseList(array(
            'userID'   => $_SESSION['loginUser'],
            'courseID' => $courseID,
            'studyData' => $studyData,
        ));
         $presentDate = date('Y-m-d');
        foreach ($courseClass->course as $key => $value) 
        {
            $scheduleDataIsPassed = $presentDate > $value['schedule_date'];
            $studentAlreadyBooking = !empty($value['booking_id']);
            $studentIsNotComeToClass = $value['booking_status'] !='Study';
           
            if($studentAlreadyBooking &&  $studentIsNotComeToClass  && $scheduleDataIsPassed )
            {
                $sql="UPDATE booking SET booking_status='NotStudy' 
                WHERE booking_id='{$value['booking_id']}'";
                 $query = $app->db->prepare($sql);
                 $query->execute();
                // echo $sql;
            }
        }
        $courseClass->setUserCourseList();
        // echo '<pre>';
        // print_r($courseClass->course);
        $page = 'register/reserveClass.php';
        $data = array( 'course'  => $courseClass->course );
        checkUserIsLogined($app,$_SESSION,$page,$data);
    }
    function showRegisterList()
    {
        $app         = Slim::getInstance();
        $request     = $app->request();
        $get         = $request->get();
        $page        = 'register/registerList.php';
        $courseClass = new Course($app->db);
        $courseClass->getUserRegisterCourse(array(
            'userID' => $_SESSION['loginUser']
        ));
        $courseClass->setUserRegisterCourse();
        // echo '<pre>';print_r($courseClass->course);echo '</pre>';
        $data=array(
            'course' => $courseClass->course
        );
        checkUserIsLogined($app,$_SESSION,$page,$data);
    }
    function registerCourse()
    {
        $app         = Slim::getInstance();
        $request     = $app->request();
        $post        = $request->post();
        $page        = 'register/registerList.php';
        $courseClass = new Course($app->db);

        $userNeverRegisterThisCourse = !$courseClass->checkUserRegisterThisCourse(array(
            'courseID' => $post['courseID'],
            'userID' => $post['userID']
        ));
        if( $userNeverRegisterThisCourse )
        {
            $query = $app->db->prepare("INSERT INTO register (
                        user_id, course_id,status,
                        register_date,register_end_date) 
                    VALUES (:userID, :courseID,'Pending' ,
                        CURDATE(),
                        DATE_ADD(curdate(), INTERVAL 1 DAY) )");
            $query->bindParam(':userID', $post['userID']);
            $query->bindParam(':courseID', $post['courseID']);
            $query->execute();
        }
        $courseClass->getUserRegisterCourse(array(
            'userID' => $post['userID']
        ));
        $data=array(
            'course' => $courseClass->course
        );
        // echo '<pre>';print_r($data);
        checkUserIsLogined($app,$_SESSION,$page,$data);
    }
    function showCoursePage()
    {
        $app         = Slim::getInstance();
        $app->render('webs/showCourse.php');
    }
    function showCourseList()
    {
        $app         = Slim::getInstance();
        $page        = 'register/register.php';
        $data        = array();
        $userClass   = new User($app->db,$_SESSION,'student');
        $courseClass = new Course($app->db);
        $courseClass->getCourseListByUserLevel(array(
            'level' => $userClass->user['level'],
            'userID'=> $userClass->user['user_id']
        ));
        $courseClass->setCourseListByCourseType($filter=array());
        $data = array(
            'course'     => $courseClass->course,
            'courseType' => array('Live' => 'สด','Video' => 'ผ่านวีดีโอ')
        );
        checkUserIsLogined($app,$_SESSION,$page,$data);
    }
    function registerDetail()
    {
        $app         = Slim::getInstance();
        $request     = $app->request();
        $get         = $request->get();
        // echo '<pre>';print_r($get);exit;
        $page        = 'register/registerDetail.php';
        $userClass   = new User($app->db,$_SESSION,'student');
        $courseClass = new Course($app->db);
        $courseClass->getCourseDetail(array(
            'id' => $get['id']
        ));
        $courseData = $courseClass->course;
        $registerData=array();
        if( !empty($get['registerID']) )
        {
            $registerClass = new Course($app->db);
            $registerClass->getRegisterDetail(array(
                'registerID' => $get['registerID']
            ));
            $registerData = $registerClass->course;
        }
        $data = array(
            'course'   => $courseData,
            'user'     => $userClass->user,
            'register' => $registerData 
        );
         // echo '<pre>';print_r($data);
        checkUserIsLogined($app,$_SESSION,$page,$data);
    }
    function examList()
    {

         $app = Slim::getInstance();
        $data=array();
        if(!empty($_SESSION['admin']))
        {
            $app->render('admin/adminMenu.php');
        }
        else
        {
            $app->render('webs/examListPage.php',$data);
        }
    }
    function showStudentMenu()
    {
         $app = Slim::getInstance();
         $page ="webs/studentMenu.php";
         $data=array();
         if(!empty($_GET['status']))
        {
            $data=$_GET;
        }
        
          checkUserIsLogined($app,$_SESSION,$page,$data);
    }
    function updateStudentData()
    {
        $app     = Slim::getInstance();
        $request = $app->request();
        $post    = $request->post();
// echo '<pre>';print_r($_SERVER);echo '</pre>';exit;
        $hostname = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
        $body ="<h1>คลิ๊กเพื่อยืนยัน user เข้าใช้งาน</h1><a href='http://{$hostname}/engLesson/approveUser?userID={$post['userID']}'>Approve</a>";
        Utility::sendMail($app->mail,array(
            'Subject' => 'Approve your account',
            'Body'    => $body,
            'Address' => $post['email']
        )); 
        // exit;
        // echo '<pre>';print_r( $post );echo '</pre>';exit;
        $query = $app->db->prepare("UPDATE student SET 
            username=:username ,
            password=md5(:password) ,
            email=:email,
            mobile=:mobile 
            WHERE user_id=:userID " );
        $query->bindParam(':username', $post['username']);
        $query->bindParam(':password', $post['password']);
        $query->bindParam(':email', $post['email']);
        $query->bindParam(':mobile', $post['mobile']);
        $query->bindParam(':userID', $post['userID']);
        $query->execute();

        
         $app->redirect('../engLesson/studentMenu?status=notApprove');
        // $_SESSION['loginUser'] = $post['userID'];
        // $userClass= new User($app->db);
        //     $userClass->userType='student';
        //     $userClass->userID=$_SESSION['loginUser'];
        //     $userClass->getUserData();
        //     $_SESSION['userDetail'] =$userClass->user;

        // $page ="webs/studentMenu.php";
        // $data=array(
        //     'userID' => $post['userID']
        // );
        // checkUserIsLogined($app,$_SESSION,$page,$data);
    } 
    function checkPretestScore()
    {
        $app = Slim::getInstance();
         $request = $app->request();
        $post = $request->post();
        $checkUserQuery = $app->db->prepare("SELECT COUNT(*) count ,user_id,level
            FROM student 
            WHERE firstname='{$post['firstname']}'
            AND lastname='{$post['lastname']}'");
        $checkUserQuery->execute();
        $user = $checkUserQuery->fetch(PDO::FETCH_ASSOC);
        $userUsedToTestPretest = $user['count']>0;
        if( $userUsedToTestPretest )
        {
            $sql="SELECT score FROM exam WHERE user_id='{$user['user_id']}' ORDER BY test_id DESC";
            $checkUserPrestestScoreQuery = $app->db->prepare($sql);
            $checkUserPrestestScoreQuery->execute();
            $exam = $checkUserPrestestScoreQuery->fetch(PDO::FETCH_ASSOC);

            $app->render('webs/preTestResultPage.php',array(
                'score'  => $exam['score'],
                'userID' => $user['user_id'],
                'level'  => $user['level']
            ));
        }
        else
        {
            echo 'ยังไม่ได้ทำแบบทดสอบ';
            $app->redirect('examList');
        }
        // $userNeverTestPretest = $checkUserQuery->fetchColumn()==0;
    }
    function sigUpPretest()
    {
        $firstTest=TRUE;
        if(!empty($_GET['firstTest']))
            $firstTest=FALSE;
        $app = Slim::getInstance();
        $data=array(
            'firstTest' => $firstTest,
            'pageTitle' => 'ทำแบบทดสอบก่อนเรียน',
            'action'    => 'signUpPretestExam',
            'submitName'=> 'เริ่มทำแบบทดสอบ',
        );
        $app->render('webs/signUpPretestPage.php',$data);
    }
    function signInPretest()
    {
        $app = Slim::getInstance();
        $data=array(
            'firstTest' => FALSE,
            'pageTitle' => 'ตรวจสอบแบบทดสอบก่อนเรียน',
            'action'    => 'checkPretestScore',
            'submitName'=> 'ตรวจสอบคะแนน',
        );
        $app->render('webs/signUpPretestPage.php',$data);
    }
    function logout()
    {
         $app = Slim::getInstance();
        session_destroy();
        unset($_SESSION['loginUser']);
        unset($_SESSION['admin']);
        $app->render('webs/examListPage.php',array('username'=> 'After Logout'));
    }
    function login()
    {
        $app = Slim::getInstance();
        $request = $app->request();
        $post = $request->post(); 

        $username = ($post['username']);
        $password = ($post['password']);
        $sql= "SELECT COUNT(*) count,username ,user_id
                FROM student 
                WHERE username='{$username}' 
                AND password=md5('{$password}') 
                AND status='Y'";
        $query = $app->db->prepare($sql);
        $query->execute();

        $result         = $query->fetch();
        $loginIsCorrect = $result['count'] > '0';
        
        if( $loginIsCorrect )
        {
            session_destroy();
            session_start();
            $_SESSION['loginUser']= $result['user_id'];
            $userClass= new User($app->db);
            $userClass->userType='student';
            $userClass->userID=$_SESSION['loginUser'];
            $userClass->getUserData();
            $_SESSION['userDetail'] =$userClass->user;

            $userClass->clearExpiredDate();
            // $_SESSION['admin']='';
        }
        else
        {
            session_destroy();
        }
        // echo $app->request()->getPathInfo();exit;
        // checkAuthenticatedUser($_SESSION);
        // $app->render('logincomplete.php');
        checkUserIsLogined($app,$_SESSION,'webs/studentMenu.php',$data=array());
    } 
    function reserveSeat()
    {
        $app = Slim::getInstance();
        $request = $app->request();
        $get = $request->get(); 
        //check user never reserve this class
        $sql="SELECT COUNT(*) count FROM booking 
                WHERE user_id='{$_SESSION['loginUser']}' 
                AND schedule_id='{$get['scheduleID']}'";
        $checkQuery = $app->db->prepare($sql);
        $checkQuery->execute();
        $result         = $checkQuery->fetch();
        $userNeverBookingThisClass = $result['count'] == '0';

        if( $userNeverBookingThisClass )
        {
            $query = $app->db->prepare("INSERT INTO booking (user_id,schedule_id,booking_status) 
                VALUES (:userID,:scheduleID,'Reserved') " );
            $query->bindParam(':userID', $_SESSION['loginUser']);
            $query->bindParam(':scheduleID', $get['scheduleID']);
            $query->execute();
        }
        $app->redirect('../engLesson/register');
    }
    function cancelSeat()
    {
        $app     = Slim::getInstance();
        $request = $app->request();
        $get     = $request->get(); 
        $sql="UPDATE booking 
                SET booking_status='Cancel' 
                WHERE booking_id='{$get['bookingID']}'";
        $query = $app->db->prepare($sql);
        $query->execute();
        $app->redirect('../engLesson/reserve');
    }
    function study()
    {
        $app     = Slim::getInstance();
        $request = $app->request();
        $get     = $request->get(); 
        $courseClass = new Course($app->db);
        $courseClass->getCourseDetailFromBooking(array(
            'bookingID' => $get['bookingID']
        ));

        $videoClass = new Course($app->db);
        $videoClass->getCourseVideoList(array(
            'level' => $courseClass->course['level']
        ));
       // echo '<pre>';print_r($videoClass->course);exit;
        $sql="UPDATE booking 
                SET booking_status='Study' 
                WHERE booking_id='{$get['bookingID']}'";
        $query = $app->db->prepare($sql);
        $query->execute();
        // $app->render('register/study.php');
        checkUserIsLogined($app,$_SESSION,'register/study.php',$data=array(
            'course' => $videoClass->course
        ));
        // $app->redirect('../engLesson/reserve');
    }
    ////////////////////////////////ADMIN ?////////////////////////////////
    function showAdminPage()
    {
        $app = Slim::getInstance();
        checkAdminLoggedIn($_SESSION);
         $app->render('admin/adminMenu.php');
    }
    function checkAdminLoggedIn($session)
    {
        // print_r($session);
        $app = Slim::getInstance();
        $data=array();
        if( empty( $session['admin'] ) && empty($session['loginUser']))
        {
           // $app->redirect('../adminPage');exit;
            $app->render('admin/adminLogin.php',$data);
            exit;
        }
    }
    function loginForAdmin()
    {
        $app = Slim::getInstance();
        $request = $app->request();
        $post = $request->post(); 

        $username = ($post['username']);
        $password = ($post['password']);
        $sql= "SELECT COUNT(*) count,username ,user_id,firstname,lastname,user_type
                FROM user 
                WHERE username='{$username}' 
                AND password=md5('{$password}')";

        $query = $app->db->prepare($sql);
        $query->execute();

        $result         = $query->fetch();
        $loginIsCorrect = $result['count'] > '0';
        if( $loginIsCorrect )
        {
            session_destroy();
            session_start();
             $_SESSION['admin']= $result['user_id'];
             $userClass= new User($app->db);
            $userClass->userType='user';
            $userClass->userID=$_SESSION['admin'];
            $userClass->getUserData();
            $_SESSION['userDetail'] =$userClass->user;

             $userClass->clearExpiredDate();
             // echo '<pre>';print_r($_SESSION);exit;
             // $_SESSION['loginUser']='';
             $app->redirect('/engLesson/showMainCourseList');
        }
        else
        {

            login();
            // echo 'cannot login';
            
            // session_destroy();
            //  $app->render('admin/adminLogin.php');
        }
    }
    function showAdminLoginPage()
    {

    }
    function showReportList()
    {
        $app = Slim::getInstance();
        checkAdminLoggedIn($_SESSION);

        $monthList = Utility::getMonthList();
        $yearList  = Utility::getYearList();
        $userClass= new User($app->db);
        $userClass->userType='user';
        $userClass->userID=$_SESSION['admin'];
        $userClass->getUserData();
      

        $data = array(
            'monthList' => $monthList,
            'yearList'  => $yearList
        );
        $app->render('admin/reportLists.php',$data );
    }
    function showCourseListForAdmin()
    {
         $app = Slim::getInstance();
         checkAdminLoggedIn($_SESSION);
         $courseClass = new Course($app->db);
         $filter=array();
         $mainPage='';
         if(!empty($_GET['level']))
            $filter['level'] = $_GET['level'];
        if(!empty($_GET['courseID']))
            $filter['courseID'] = $_GET['courseID'];
        if(!empty($_GET['mainPage']))
            $mainPage = $_GET['mainPage'];
         $courseClass->getCourseList( $filter );
         $courseClass->setCourseList( $filter=array() );
         $data=array(
            'course' => $courseClass->course ,
            'mainPage' => $mainPage
         );
         $app->render('admin/adminCourse.php',$data);
    }
    function manageScheduleData()
    {
        $app     = Slim::getInstance();
        $request = $app->request();
        $get     = $request->get(); 
        checkAdminLoggedIn($_SESSION);

        $userClass= new User($app->db,$_SESSION,'user');
        $userClass->getTeacherList();
        $userClass->setTeacherList();

        $roomClass= new Room($app->db);
        $roomClass->getRoomListForSelectBox();
        $roomClass->setRoomListByRoomIDForSelectBox();
        $addSchedule  = !empty( $get['courseID'] );
        $editSchedule = !empty( $get['scheduleID'] );
        if( $addSchedule )
        {
            $schedule=array(
                'course_id'    => $get['courseID'],
                'date'         => date('Y-m-d'),
                'startDate'    => '',
                'start_time'   => '09:00',
                'end_time'     => '12:00',
                'max_seat'      => '',
                'teacher_id'   => '',
                'room_id'      => ''
            );
            $data=array(
                'schedule'     => $schedule,
                'action'       => 'addSchedule',
                'buttonName'   => 'เพิ่มตารางเรียน'  ,
                'teacherList'  => $userClass->user,
                'roomList'     => $roomClass->data
            );
        }
        if( $editSchedule )
        {
            $courseClass= new Course($app->db);
            $courseClass->getScheduleDetail(array( 
                'scheduleID' => $get['scheduleID'] 
            ));
            $data=array(
                'schedule'     => $courseClass->course,
                'action'       => 'editSchedule',
                'buttonName'   => 'แก้ไขตารางเรียน'  ,
                'teacherList'  => $userClass->user,
                'roomList'     => $roomClass->data
            );
        }
        $app->render('admin/adminSchedule.php',$data);
    }
    function addSchedule()
    {
        $app = Slim::getInstance();
        $scheduleDate = Utility::toMysqlDate($_POST['scheduleDate']);
        $query = $app->db->prepare("INSERT INTO schedule (course_id,teacher_id,date,start_time,end_time,max_seat,room_id) 
                VALUES (:courseID,:teacherID,:scheduleDate,:startTime,:endTime,:maxSeat,:roomID ) " );
        $query->bindParam(':courseID', $_POST['courseID']);
        $query->bindParam(':teacherID', $_POST['teacher']);
        $query->bindParam(':scheduleDate', $scheduleDate );
        $query->bindParam(':startTime', $_POST['startTime']);
        $query->bindParam(':endTime', $_POST['endTime']);
        $query->bindParam(':maxSeat', $_POST['maxSeat']);
        $query->bindParam(':roomID', $_POST['room']);
        $query->execute();
        $app->redirect('../engLesson/adminCourse?courseID='.$_POST['courseID']);
    }
    function editSchedule()
    {
        $app = Slim::getInstance();
        $scheduleDate = Utility::toMysqlDate($_POST['scheduleDate']);
        $sql="UPDATE schedule 
            SET teacher_id=:teacherID,
                date=:scheduleDate,
                start_time=:startTime,
                end_time=:endTime,
                max_seat=:maxSeat,
                room_id=:roomID
            WHERE schedule_id=:scheduleID";
        $query = $app->db->prepare($sql);
        $query->bindParam(':scheduleID', $_POST['scheduleID']);
        $query->bindParam(':teacherID', $_POST['teacher']);
        $query->bindParam(':scheduleDate', $scheduleDate );
        $query->bindParam(':startTime', $_POST['startTime']);
        $query->bindParam(':endTime', $_POST['endTime']);
        $query->bindParam(':maxSeat', $_POST['maxSeat']);
        $query->bindParam(':roomID', $_POST['room']);
        $query->execute();
        $app->redirect('../engLesson/adminCourse?courseID='.$_POST['courseID']);
    }
    function showCourseDetail()
    {
        $app = Slim::getInstance();
        $courseClass = new Course($app->db);
        $roomClass= new Room($app->db);

        $roomClass->getRoomListForSelectBox();
        $roomClass->setRoomListForSelectBox();

        if( empty($_GET['courseID']) )
        {
            $courseClass->getCourseDetailForAdmin($filter=array());
            $data = array(
                'course'     => $courseClass->course,
                'action'     => 'addCourseDetail',
                'buttonName' => 'เพิ่มคอร์สเรียน',
                'roomList'   => $roomClass->data
            );
        }
        else
        {
            $courseClass->getCourseDetailForAdmin($filter=array(
                'courseID' => $_GET['courseID']
            ));
            // echo '<pre>';print_r($courseClass->course);exit;
            $data = array(
                'course'     => $courseClass->course,
                'action'     => 'editCourseDetail',
                'buttonName' => 'แก้ไขคอร์สเรียน',
                 'roomList'   => $roomClass->data
            );
        }
        $app->render('admin/adminCourseDetail.php',$data);
    }
    function addCourseDetail()
    {
        $app       = Slim::getInstance();
        $startDate = Utility::toMysqlDate( $_POST['startDate'] );
        $endDate   = Utility::toMysqlDate( $_POST['endDate'] );
        $query = $app->db->prepare("INSERT INTO course 
                (course_name,course_type,max_seat,start_date,end_date,price,level) 
                VALUES (:courseName,:courseType,:maxSeat,:startDate,:endDate,:price,:level ) " );
        $query->bindParam(':courseName', $_POST['courseName']);
        $query->bindParam(':courseType', $_POST['courseType']);
        $query->bindParam(':maxSeat',    $_POST['maxSeat']);
        $query->bindParam(':startDate',  $startDate);
        $query->bindParam(':endDate',    $endDate);
        $query->bindParam(':price',      $_POST['price']);
        $query->bindParam(':level',      $_POST['level']);
        $query->execute();
        $app->redirect('../engLesson/adminCourse');
    }
    function editCourseDetail()
    {
        $app       = Slim::getInstance();
        $startDate = Utility::toMysqlDate( $_POST['startDate'] );
       
        $endDate   = Utility::toMysqlDate( $_POST['endDate'] );
        $sql="UPDATE course SET course_name=:courseName,course_type=:courseType,max_seat=:maxSeat,
                start_date=:startDate,end_date=:endDate,price=:price,level=:level 
                WHERE course_id=:courseID";
        $query = $app->db->prepare($sql);
        $query->bindParam(':courseName', $_POST['courseName']);
        $query->bindParam(':courseType', $_POST['courseType']);
        $query->bindParam(':maxSeat',    $_POST['maxSeat']);
        $query->bindParam(':startDate',  $startDate);
        $query->bindParam(':endDate',    $endDate);
        $query->bindParam(':price',      $_POST['price']);
        $query->bindParam(':level',      $_POST['level']);
        $query->bindParam(':courseID',      $_POST['courseID']);
        $query->execute();
        // echo '<pre>';print_r($query->errorInfo() );echo '</pre>';exit;
        $app->redirect('../engLesson/adminCourse');
    }
    function showMainCourseList()
    {
        // echo '<pre>';print_r($_SESSION);exit;
        $app = Slim::getInstance();
         checkAdminLoggedIn($_SESSION);
         $courseClass = new Course($app->db);
         $courseClass->getMatinCourseList( $filter=array() );
        $data=array(
            'course' => $courseClass->course
         );
         $app->render('admin/adminMainCourseList.php',$data);
    }
    function showMainCourseDetail()
    {
        $app = Slim::getInstance();
        checkAdminLoggedIn($_SESSION);
        $data=array(
            'course'     => array('course_name' => '','course_detail' =>''),
            'action'     => 'addMainCourse',
            'buttonName' => 'เพิ่มหลักสูตร'
        );
        if( !empty($_GET['mainCourseID']) )
        {
            $courseClass = new Course($app->db);
            $courseClass->getMainCourseDetail( array(
                'mainCourseID' => $_GET['mainCourseID']
            ));
            $data=array(
                'course'       => $courseClass->course,
                'action'       => 'editMainCourse',
                'buttonName'   => 'แก้ไขหลักสูตร',
                'mainCourseID' => $_GET['mainCourseID']
             );
        }
         $app->render('admin/adminMainCourseDetail.php',$data);
    }
    function editMainCourse()
    {
        $app = Slim::getInstance();
        $query = $app->db->prepare("UPDATE main_course SET 
                course_name=:courseName,
                course_detail=:courseDetail
                WHERE main_course_id=:mainCourseID" );
        $query->bindParam(':courseName', $_POST['name']);
        $query->bindParam(':courseDetail', $_POST['detail']);
        $query->bindParam(':mainCourseID', $_POST['mainCourseID']);
        $query->execute();
        $app->redirect('../engLesson/showMainCourseList');
    }
    function addMainCourse()
    {
        $app = Slim::getInstance();
        $query = $app->db->prepare("INSERT INTO main_course (course_name,course_detail,create_date) 
                VALUES (:courseName,:courseDetail,CURDATE() ) " );
        $query->bindParam(':courseName', $_POST['name']);
        $query->bindParam(':courseDetail', $_POST['detail']);
        $query->execute();
        $app->redirect('../engLesson/showMainCourseList');
    }
    function showExamList()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        $examClass->getExamListForAdmin($filter=array());
        $examClass->setExamListForAdmin($filter=array());

        // echo '<pre>';print_r($examClass->exam);exit;

        $app->render('admin/adminExamList.php',$data=array(
            'exam' => $examClass->exam
        ));
    }
    function addExamPart()
    {
        $app = Slim::getInstance();
        $sql="INSERT INTO exam_part 
                (exam_list_id,part_name,part_description,part_detail,part_no) 
                VALUES(:examID,:partName,:partDescription,:partDetail,:partNo)";
        $query = $app->db->prepare($sql);
        $query->bindParam(':examID', $_POST['examID']);
        $query->bindParam(':partName', $_POST['name']);
        $query->bindParam(':partDescription', $_POST['description']);
        $query->bindParam(':partDetail', $_POST['detail']);
        $query->bindParam(':partNo', $_POST['partNo']);
        $query->execute();
         $app->redirect('../engLesson/showPartDetail?examID='.$_POST['examID']);
    }
    function editExamPart()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        $examClass->getExamPartData(array(
            'partID'=> $_POST['partID']
        ));
        $examID = $examClass->exam['exam_list_id'];
        $sql="UPDATE exam_part SET 
                part_name=:partName,
                part_description=:partDescription,
                part_detail=:partDetail,
                part_no=:partNo
                WHERE exam_part_id=:partID";
        $query = $app->db->prepare($sql);
        $query->bindParam(':partID', $_POST['partID']);
        $query->bindParam(':partName', $_POST['name']);
        $query->bindParam(':partDescription', $_POST['description']);
        $query->bindParam(':partDetail', $_POST['detail']);
        $query->bindParam(':partNo', $_POST['partNo']);
        $query->execute();
        $app->redirect('../engLesson/showPartDetail?examID='.$examID);
    }
    function showExamDetail()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        if( empty($_GET['examID']))
        {
            $examClass->getExamDetail($filter=array());
            $data=array(
                'exam'       => $examClass->exam,
                'action'     => 'addExamDetail',
                'buttonName' => 'เพิ่มข้อสอบ'
            );
        }
        else
        {
            $examClass->getExamDetail($filter=array(
                'examID' => $_GET['examID']
            ));
            $data=array(
                'exam'       => $examClass->exam,
                'examID'     => $_GET['examID'],
                'action'     => 'editExamDetail',
                'buttonName' => 'แก้ไขรายละเอียดข้อสอบ'
            );
        }
        $app->render('admin/adminExamDetail.php',$data);
    }
    function addExamDetail()
    {
         $app = Slim::getInstance();
        $query = $app->db->prepare("INSERT INTO exam_list (exam_name,level) 
                VALUES (:examName,:level ) " );
        $query->bindParam(':examName', $_POST['name']);
        $query->bindParam(':level', $_POST['level']);
        $query->execute();
        $app->redirect('../engLesson/showExamList');
    }
    function editExamDetail()
    {
          $app = Slim::getInstance();
        $sql="UPDATE exam_list SET exam_name=:examName,level=:level WHERE exam_list_id=:examID";
        $query = $app->db->prepare($sql);
        $query->bindParam(':examName', $_POST['name']);
        $query->bindParam(':level', $_POST['level']);
        $query->bindParam(':examID', $_POST['examID']);
        $query->execute();
        $app->redirect('../engLesson/showExamList');
    }
    function showPartDetail()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        $examClass->getExamDetailForAdmin(array(
            'examID' => $_GET['examID']
        ));
        $examClass->setPretestExam($filter=array());
        // echo '<pre>';print_r($examClass->exam);
        $app->render('admin/adminExamPartList.php',$data=array(
            'exam'   => $examClass->exam,
            'examID' => $_GET['examID']
        ));
    }
    function showPartData()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        if( empty($_GET['partID']))
        {
            $examClass->getExamPartData($filter=array());
            $data=array(
                'exam'       => $examClass->exam,
                'examID'     => $_GET['examID'],
                'action'     => 'addExamPart',
                'buttonName' => 'เพิ่มPartข้อสอบ'
            );
        }
        else
        {
            $examClass->getExamPartData($filter=array(
                'partID' => $_GET['partID']
            ));
            $data=array(
                'exam'       => $examClass->exam,
                'partID'     => $_GET['partID'],
                'action'     => 'editExamPart',
                'buttonName' => 'แก้ไขรายละเอียดPartข้อสอบ'
            );
        }
        $app->render('admin/adminExamPartDetail.php',$data);
    }
    function showQuestionDetail()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        if( empty($_GET['questionID']))
        {
            $examClass->getExamQuestionDetail($filter=array());
            // echo '<pre>';print_r($examClass->exam);
            $data=array(
                'exam'       => $examClass->exam,
                'partID'     => $_GET['partID'],
                'action'     => 'addExamQuestion',
                'buttonName' => 'เพิ่มคำถาม'
            );
        }
        else
        {
            $examClass->getExamQuestionDetail($filter=array(
                'questionID' => $_GET['questionID']
            ));
            $examClass->setExamQuestionDetail();
            $data=array(
                'exam'       => $examClass->exam,
                'questionID' => $_GET['questionID'],
                'action'     => 'editExamQuestion',
                'buttonName' => 'แก้ไขคำถาม'
            );
        }
        // echo '<pre>';print_r($data);
        $app->render('admin/adminExamQuestionDetail.php',$data);
    }
    function addExamQuestion()
    {

         $app = Slim::getInstance();
         $examClass =new Exam($app->db);

         $sql="INSERT INTO exam_question (exam_part_id,no,question) VALUES(:partID,:questionNo,:question)";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':partID'    , $_POST['partID']);
        $query->bindParam(':questionNo', $_POST['questionNo']);
        $query->bindParam(':question'  , $_POST['question']);
        $query->execute();
        $questionID = $app->db->lastInsertId();
        foreach ($_POST['choice'] as $choiceNo => $choice) 
        {
            $sqlChoice ="INSERT INTO exam_choice (exam_question_id,no,choice) 
                        VALUES(:questionID,:choiceNo,:choice)";
            $query = $app->db->prepare( $sqlChoice );
            $query->bindParam(':questionID'    , $questionID);
            $query->bindParam(':choiceNo', $choiceNo);
            $query->bindParam(':choice'  , $choice);
            $query->execute();
        }
        $examClass->getQuestionAnswer(array(
            'questionID' => $questionID,
            'answer'     => $_POST['answer']
        ));

        $sqlUpdateAnswer = "UPDATE exam_question 
            SET answer='{$examClass->exam['exam_choice_id']}'
            WHERE exam_question_id='{$questionID}'";
        $query = $app->db->prepare( $sqlUpdateAnswer );
        $query->execute();

        $examID = $examClass->findExamID( array('questionID' => $questionID) );
        if(!empty($_POST['nextQuestionButton']))
            $app->redirect('../engLesson/showQuestionDetail?partID='.$_POST['partID']);
        else
            $app->redirect('../engLesson/showPartDetail?examID='.$examID);
    }
    function editExamQuestion()
    {
         $app = Slim::getInstance();
         $examClass =new Exam($app->db);

        $sql="UPDATE exam_question 
                SET no=:questionNo,
                question=:question,
                answer=:answer
                WHERE exam_question_id=:questionID";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':questionID' , $_POST['questionID']);
        $query->bindParam(':questionNo' , $_POST['questionNo']);
        $query->bindParam(':question'   , $_POST['question']);
        $query->bindParam(':answer'     , $_POST['choiceID'][ $_POST['answer'] ]);
        $query->execute();

        foreach ($_POST['choice'] as $choiceNo => $choice) 
        {
            $choiceID = $_POST['choiceID'][$choiceNo];
            $sqlChoice="UPDATE exam_choice SET choice=:choice WHERE exam_choice_id=:choiceID";
            $query = $app->db->prepare( $sqlChoice );
            $query->bindParam(':choiceID', $choiceID);
            $query->bindParam(':choice'  , $choice);
            $query->execute();
        }
        $examID = $examClass->findExamID( array('questionID' => $_POST['questionID']) );
        $app->redirect('../engLesson/showPartDetail?examID='.$examID);
    }
    function showRegisterListForAdmin()
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $courseClass->getRegisterList(array('paymentStatus' => TRUE));
        $app->render('admin/adminRegisterList.php',$data=array(
            'course' => $courseClass->course 
        ));
    }
    function updatePaymentStatus( $registerID , $status )
    {
        $app = Slim::getInstance();
        $examClass =new Exam($app->db);
        $courseClass= new Course($app->db);
        $courseClass->getDetailFromRegisterID(array(
            'registerID' => $registerID
        ));
        // echo '<pre>';print_r($courseClass->course);echo '</pre>';exit;
        $sql="UPDATE register 
                SET status=:status
                WHERE register_id=:registerID";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':registerID' , $registerID);
        $query->bindParam(':status'     , $status);
        $query->execute();
        if($status=='Confirmed')
        {
             $body = "Already Comfirm your payment course ".$courseClass->course['course_name'].' you can reserve for your seat now';
            Utility::sendMail($app->mail,array(
                'Subject' => 'Update Your Payment Status',
                'Body'    => $body,
                'Address' => $courseClass->course['email']
            )); 
        }

        $app->redirect('/engLesson/showRegisterList');
    }
    function reportPostExam()
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);

        $filter=array();
        if(!empty($_POST['courseID']))
            $filter=array('courseID'=> $_POST['courseID']);
        $courseClass->reportPostExam($filter);
        $courseClass->setReportPostExamData();
        $app->render('admin/reportPostExam.php',$data=array(
            'course' => $courseClass->course 
        ));

    }
    function reportIncome()
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $monthName='มกราคม - ธันวาคม';
        $year = 'ทั้งหมด';

        if(!empty($_POST['month']))
        {
            $monthList = Utility::getMonthList();
            $monthName = $monthList[ $_POST['month'] ]['Name'];
        }
        if(!empty($_POST['year']))
            $year = $_POST['year'];

        $courseClass->getRegisterList(array(
            'month'     => $_POST['month'],
            'year'      => $_POST['year']
        ));
        $app->render('admin/reportIncome.php',$data=array(
            'course' => $courseClass->course ,
            'month'  => $monthName,
            'year'   => $year
        ));
    }
    function reportPopular()
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $monthName='มกราคม - ธันวาคม';
        $year = 'ทั้งหมด';
       if(!empty($_POST['month']))
        {
            $monthList = Utility::getMonthList();
            $monthName = $monthList[ $_POST['month'] ]['Name'];
        }
        if(!empty($_POST['year']))
            $year = $_POST['year'];

        $courseClass->getPopularCourse(array(
            'month'     => $_POST['month'],
            'year'      => $_POST['year']
        ));
        $courseData =$courseClass->setReportPopularData();
        $jsonData = json_encode($courseData);
        $app->render('admin/reportPopular.php',$data=array(
            'course' => $courseClass->course ,
            'month'  => $monthName,
            'year'   => $year,
            'jsonData' => $jsonData
        ));
    }
    function showTeacherSchedule()
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $courseClass->getTeacherSchedule(array(
            'teacherID' => $_SESSION['admin']
        ));

        $courseClass->setTeacherScheduleData();
        // echo '<pre>';print_r( $courseClass->course );echo '</pre>';
        $teacherCourse = $courseClass->course;
        foreach ($teacherCourse as $courseID => $course) {
            
        }

        $app->render('admin/teacherSchedule.php',$data=array(
            'course' => $teacherCourse
        ));
    }
    function showStudentList( $courseID ,$scheduleID )
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $courseClass->getStudentList(array(
            'courseID' => $courseID
        ));
        $app->render('admin/teacherStudentList.php',$data=array(
            'course'     => $courseClass->course,
            'scheduleID' => $scheduleID
        ));
    }
    function checkStudent()
    {
         $app = Slim::getInstance();
         foreach ($_POST['student'] as $key => $studentID) 
         {
            $sql="INSERT INTO booking (user_id,schedule_id,booking_status) VALUES
                    (:userID,:scheduleID,'Study')";
            $query = $app->db->prepare( $sql );
            $query->bindParam(':userID'    , $studentID);
            $query->bindParam(':scheduleID', $_POST['scheduleID']);
            $query->execute();
            // 2
         }
         $app->redirect('/engLesson/showTeacherSchedule');
    }
    function deleteMainCourse()
    {
        $app = Slim::getInstance();
        $sql="DELETE FROM main_course WHERE main_course_id='{$_GET['mainCourseID']}'";
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/showMainCourseList');
    }
    function deleteCourse()
    {
        $app = Slim::getInstance();
        $sql="DELETE FROM course WHERE course_id='{$_GET['courseID']}'";
        $query = $app->db->prepare( $sql );
        $query->execute();

        $sql="DELETE FROM schedule WHERE course_id='{$_GET['courseID']}'";
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/adminCourse');
    }
    function deleteSchedule()
    {
        $app = Slim::getInstance();
        $sql="DELETE FROM schedule WHERE schedule_id='{$_GET['scheduleID']}'";
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/adminCourse');
    }
    function deletePartExam()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        $examClass->getExamPartData(array(
            'partID'=> $_GET['partID']
        ));
        $examID = $examClass->exam['exam_list_id'];

        $sql="DELETE p,q,c  FROM exam_part p 
                INNER JOIN exam_question q ON q.exam_part_id = p.exam_part_id
                INNER JOIN exam_choice c ON c.exam_question_id=q.exam_question_id 
                WHERE p.exam_part_id='{$_GET['partID']}'";
       // echo $sql;exit;
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/showPartDetail?examID='.$examID);
    }
    function deleteQuestion()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        $examID = $examClass->findExamID( array('questionID' => $_GET['questionID']) );
        $sql="DELETE q,c  FROM  exam_question q 
                INNER JOIN exam_choice c ON c.exam_question_id=q.exam_question_id 
                WHERE q.exam_question_id='{$_GET['questionID']}'";
       // echo $sql;exit;
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/showPartDetail?examID='.$examID);
    }
    function deleteExam()
    {
        $app = Slim::getInstance();
        $sql="DELETE l,p,q,c  FROM exam_list l
                LEFT JOIN exam_part p  ON p.exam_list_id=l.exam_list_id
                LEFT JOIN exam_question q ON q.exam_part_id = p.exam_part_id
                LEFT JOIN exam_choice c ON c.exam_question_id=q.exam_question_id 
                WHERE l.exam_list_id='{$_GET['examID']}'";
       // echo $sql;exit;
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/showExamList');

    }
    function contactUs()
    {
         $app = Slim::getInstance();
        $app->render('webs/contactUs.php');
    }
    function printPaymentForm()
    {
         $app = Slim::getInstance();
        $examClass =new Exam($app->db);
         $status ='Printed';
        $sql="UPDATE register 
                SET status=:status
                WHERE register_id=:registerID";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':registerID' , $_GET['registerID']);
        $query->bindParam(':status'     , $status);
         $query->execute();

        $courseClass = new Course($app->db);
        $courseClass->getCoursePrint(array(
            'registerID' => $_GET['registerID'] 
        ));
        $paymentPrintID =  rand(10000, 99999);
        $app->render('webs/paymentForm.php',array(
            'course' => $courseClass->course,
            'paymentPrintID' =>  $paymentPrintID
        ));
        // $app->redirect('/engLesson/register');
    }
    function printForm()
    {
          $app = Slim::getInstance();
        // $examClass =new Exam($app->db);
       
        $app->redirect('/engLesson/register');
    }
    function showStudentSchedule($courseID)
    {
        $app = Slim::getInstance();
        $courseClass = new Course($app->db);
        
        $sql="SELECT r.user_id,r.register_id,r.course_id,s.schedule_id,s.date schedule_date ,
            b.booking_id,b.booking_status
            FROM `schedule` s 
            INNER JOIN course c ON c.course_id=s.course_id AND c.course_type='Live' 
            INNER JOIN register r ON r.course_id=c.course_id 
            LEFT JOIN booking b ON b.schedule_id=s.schedule_id AND r.user_id=b.user_id
            WHERE YEARWEEK(s.date) < YEARWEEK( CURDATE() ) AND s.course_id='{$courseID}' ";

          $query= $app->db->prepare($sql);
            $query->execute();
            $studentsInClass = $query->fetchAll(PDO::FETCH_ASSOC);
            // echo '<pre>';print_r($studentsInClass);echo '</pre>';exit;
        foreach ($studentsInClass as $key => $value) {
           
           $studentNotStudy =  $value['booking_status'] !='Study';
           $studentNotBooking = empty($value['booking_id']);
           $studentNotStudyAndTeacherNotChecked =$value['booking_status']!='NotStudy';
           $studentBookingButNotStudy = $value['booking_status']=='Reserved';
            if($studentNotStudy && $studentNotStudyAndTeacherNotChecked)
            {
                if($studentNotBooking)
                {
                    $sql="INSERT INTO booking (user_id,schedule_id,booking_status) VALUES
                    (:userID,:scheduleID,'NotStudy')";
                }
                if($studentBookingButNotStudy)
                {
                    $sql="UPDATE booking SET booking_status='NotStudy' WHERE user_id=:userID AND schedule_id=:scheduleID";
                }
                  // echo $sql.'<hr>';
                $query = $app->db->prepare( $sql );
                $query->bindParam(':userID'    , $value['user_id']);
                $query->bindParam(':scheduleID', $value['schedule_id']);
                $query->execute();
                // echo '<pre>';print_r($query->errorInfo());echo '</pre>';
            }

        }

        $courseClass->getStudentsInCourse(array(
            'courseID' => $courseID,
            'courseType' => 'Live'
        ));
        $courseName='';
        if(!empty( $courseClass->course ))
            $courseName = $courseClass->course[0]['course_name'];
        $courseClass->setStudentsInCourse(array(
            'courseType' => 'Live'
        ));
// echo $courseClass->sql;
        $app->render('admin/teacherStudentSchedule.php',array(
            'course'     => $courseClass->course,
            'courseID'   => $courseID,
            'courseName' => $courseName,
            'schedule'   => $courseClass->schedule,
            'booking'    => $courseClass->booking
        ));
    }
    function showStudentVideoSchedule($courseID)
    {
        $app = Slim::getInstance();
        $courseClass = new Course($app->db);
        $courseClass->getStudentsInCourse(array(
            'courseID' => $courseID
        ));
        $courseName='';
        if(!empty( $courseClass->course ))
            $courseName = $courseClass->course[0]['course_name'];
        $courseClass->setStudentsInCourse();
        $app->render('admin/VideoStudentSchedule.php',array(
            'course'     => $courseClass->course,
            'courseID'   => $courseID,
            'courseName' => $courseName,
            'schedule'   => $courseClass->schedule,
            'booking'    => $courseClass->booking
        ));
    }
    function showStudentInformation()
    {
        $app = Slim::getInstance();
        $userClass = new User($app->db,$_SESSION,'student');
        $app->render('webs/studentInformation.php',array( 
            'user'   => $userClass->user,
            'action' => 'studentInformation'
        ));
        // echo '<pre>';print_r($userClass->user);echo '</pre>';
    }
    function editStudentInformation()
    {
        $app = Slim::getInstance();
        if(!empty($_POST['newPassword']) )
        {
            $sql="UPDATE student 
                    SET password=md5('{$_POST['newPassword']}') 
                    WHERE user_id='{$_POST['userID']}'";
            $query = $app->db->prepare( $sql );
            $query->execute();
        }
        $sql="UPDATE student 
                SET firstname=:firstname ,
                lastname=:lastname,
                email=:email,
                mobile=:mobile
                WHERE user_id=:userID";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':userID'    , $_POST['userID']);
        $query->bindParam(':firstname' , $_POST['firstname']);
        $query->bindParam(':lastname'  , $_POST['lastname']);
        $query->bindParam(':email'     , $_POST['email']);
        $query->bindParam(':mobile'    , $_POST['mobile']);
        $query->execute();
        $app->redirect('/engLesson/studentMenu');
        // echo '<pre>';print_r($_POST);echo '</pre>';
    }
    function showPostTestExam()
    {
        $app = Slim::getInstance();
        $examClass = new Exam($app->db);
        $examClass->getExamList(array('level' => $_GET['level']));

        $randomExam =array_rand($examClass->exam);
        $examClass->getPretestExam($filter=array('examID' => $randomExam ));
        $examName = $examClass->exam[0]['exam_name'];
        $examID   = $examClass->exam[0]['exam_list_id'];
        $examClass->setPretestExam($filter=array());
        $data=array(
            'userID'    =>  $_SESSION['loginUser'],
            'registerID' => $_GET['registerID'],
            'examName'  =>  $examName,
            'examID'    =>  $examID,
            'examData'  =>  $examClass->exam
        );
        $app->render('webs/postTestExamPage.php',$data);
    }
    function showRoom()
    {
        $app       = Slim::getInstance();
        $roomClass = new Room($app->db);
        $roomClass->getRoomDetail(array(
            'scheduleID'=> $_GET['scheduleID']
        ));
        $roomID =$roomClass->data[0]['room_id'];
        $thisClassIsFull = $roomClass->checkFullRoom(array(
            'roomID'     => $roomID,
            'scheduleID' => $_GET['scheduleID']
        ));
        $room = $roomClass->setRoomDetail();
        $app->render('register/reserveRoomSeat.php',array(
            'room' => $room,
            'thisClassIsFull' => $thisClassIsFull
        ));
        
    }
    function reserveSeatRoom()
    {
        $app = Slim::getInstance();
        $request = $app->request();
        $get = $request->get(); 
        //check user never reserve this class
        $sql="SELECT COUNT(*) count FROM booking 
                WHERE user_id='{$_SESSION['loginUser']}' 
                AND schedule_id='{$get['scheduleID']}'";
        $checkQuery = $app->db->prepare($sql);
        $checkQuery->execute();
        $result         = $checkQuery->fetch();
        $userNeverBookingThisClass = $result['count'] == '0';
        // $userNeverBookingThisClass=TRUE;
        if( $userNeverBookingThisClass )
        {
            $query = $app->db->prepare("INSERT INTO booking 
                (user_id,schedule_id,booking_status,room_seat_id) 
                VALUES (:userID,:scheduleID,'Reserved',:seatID) " );
            $query->bindParam(':userID'     , $_SESSION['loginUser']);
            $query->bindParam(':scheduleID' , $get['scheduleID']);
            $query->bindParam(':seatID'     , $get['seatID']);
            $query->execute();
        }
        $app->redirect('/engLesson/reserve');
    }
    function reserveSeatLiveRoom()
    {
        $app = Slim::getInstance();
        $request = $app->request();
        $get = $request->get(); 
        //check user never reserve this class
        $sql="SELECT COUNT(*) count FROM booking  b 
                INNER JOIN schedule s ON s.schedule_id=b.schedule_id
                WHERE b.user_id='{$_SESSION['loginUser']}' 
                AND s.course_id='{$get['courseID']}'";
        $checkQuery = $app->db->prepare($sql);
        $checkQuery->execute();
        $result         = $checkQuery->fetch();
        $userNeverBookingThisClass = $result['count'] == '0';

        //get scheudld adata form course id 
         $sql="SELECT s.schedule_id  FROM schedule s
                WHERE s.course_id='{$get['courseID']}'";
        $checkQuery = $app->db->prepare($sql);
        $checkQuery->execute();
        $scheduleDatas = $checkQuery->fetchAll(PDO::FETCH_ASSOC);

        // $userNeverBookingThisClass=TRUE;
        if( $userNeverBookingThisClass )
        {
            foreach ($scheduleDatas as $key => $value) 
            {
                $scheduleID = $value['schedule_id'];
                 $query = $app->db->prepare("INSERT INTO booking 
                (user_id,schedule_id,booking_status,room_seat_id) 
                VALUES (:userID,:scheduleID,'Reserved',:seatID) " );
                $query->bindParam(':userID'     , $_SESSION['loginUser']);
                $query->bindParam(':scheduleID' , $scheduleID);
                $query->bindParam(':seatID'     , $get['seatID']);
                $query->execute();

            }
           
        }
        $app->redirect('/engLesson/reserve');
    }
    function reportIncomeMain()
    {
        $app = Slim::getInstance();
        $monthList = Utility::getMonthList();
        $yearList  = Utility::getYearList();
      
        $data = array(
            'monthList' => $monthList,
            'yearList'  => $yearList
        );

        $app->render('admin/reportIncomeMain.php',$data);
    }
    function reportPopularMain()
    {
        $app = Slim::getInstance();
        $monthList = Utility::getMonthList();
        $yearList  = Utility::getYearList();
      
        $data = array(
            'monthList' => $monthList,
            'yearList'  => $yearList
        );
         $app->render('admin/reportPopularMain.php',$data);
    }
    function reportPostExamMain()
    {
        $app = Slim::getInstance();
        $courseClass = new Course($app->db);
        $courseClass->getCourseListForSelectBox();

        $courseList = $courseClass->setCourseListForSelectBox();

         $app->render('admin/reportPostExamMain.php',array(
            'courseList' => $courseList
        ));
    }
    function checkStudentUgly()
    {
         $app = Slim::getInstance();
         // echo '<pre>';print_r($_POST);echo '</pre>';exit;
         foreach ($_POST['booking'] as $scheduleID => $shedule) 
         {
            // echo '<pre>';print_r($shedule);echo '</pre>';
            foreach ($shedule as $studentID => $value) 
            {
                $sql="SELECT COUNT(*) count FROM booking WHERE user_id='{$studentID}' AND schedule_id='{$scheduleID}'";
                // echo $sql.'<hr>';
                 $checkQuery = $app->db->prepare( $sql );
                  $checkQuery->execute();
                 $data = $checkQuery->fetch(PDO::FETCH_ASSOC);

                 $userNotBooking = $data['count'] ==0;
                 if($userNotBooking)
                {
                    $sql="INSERT INTO booking (user_id,schedule_id,booking_status) VALUES
                    (:userID,:scheduleID,'Study')";
                }
                 else
                {
                     $sql="UPDATE booking SET booking_status='Study' WHERE user_id=:userID AND schedule_id=:scheduleID";
                }
               
                $query = $app->db->prepare( $sql );
                $query->bindParam(':userID'    , $studentID);
                $query->bindParam(':scheduleID', $scheduleID);
                $query->execute();

                // print_r( $query ); 
            }
         }
         // exit;
          $app->redirect('/engLesson/showStudentSchedule/'.$_POST['courseID']);
    }
    function showRoomLive()
    {
        $app       = Slim::getInstance();
        $roomClass = new Room($app->db);
        $roomClass->getRoomLiveDetail(array(
            'courseID'=> $_GET['courseID']
        ));
        $roomID =$roomClass->data[0]['room_id'];
        // $thisClassIsFull = $roomClass->checkFullRoom(array(
        //     'roomID'     => $roomID,
        //     'scheduleID' => $_GET['scheduleID']
        // ));
        $room = $roomClass->setRoomDetail();
        // echo $roomClass->sql;
        // echo '<pre>';print_r($room);echo '</pre>';
        $app->render('register/reserveRoomLiveSeat.php',array(
            'room' => $room , 
            'thisClassIsFull' => FALSE
        ));
    }
    function showStudentVideo()
    {
         $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $courseClass->getStudentVideoSchedule();

        $courseClass->setTeacherScheduleData();
        // echo '<pre>';print_r( $courseClass->course );echo '</pre>';
        $videoCourse = $courseClass->course;

        $app->render('admin/studentVideoSchedule.php',$data=array(
            'course' => $videoCourse
        ));
    }
    function sendMail()
    {
       $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "unplugged2d@gmail.com";
        $mail->Password = "halflink";
        $mail->SetFrom("unplugged2d@gmail.com");
        $mail->Subject = "Test";
        $mail->Body = "hello";
        $mail->AddAddress("unplugged2d@gmail.com");
         if(!$mail->Send())
            {
            echo "Mailer Error: " . $mail->ErrorInfo;
            }
            else
            {
            echo "Message has been sent";
            }
    }
    function checkScheduleTime()
    {
          $app = Slim::getInstance();

          $_GET['scheduleDate']= Utility::toMysqlDate( $_GET['scheduleDate'] );
        $courseClass= new Course($app->db);
        $canInsertSchduleThisTime = $courseClass->checkScheduleTime( $_GET );
        $canInsertSchduleThisDay  = $courseClass->checkPresentScheduleDate( $_GET );
        $canInsertSchdule = $canInsertSchduleThisTime && $canInsertSchduleThisDay;
        if($canInsertSchdule)
            echo 'can';
        else
            echo 'cannot';
    }
    function reportIncomeData()
    {
        $app = Slim::getInstance();
        $courseClass= new Course($app->db);
        $courseClass->setReportIncomeData();
    }
    function studentStudyData()
    {
         $app = Slim::getInstance();
        $courseClass= new Course($app->db);
    }
    function showTeacherList()
    {
         $app = Slim::getInstance();
         $userClass = new User($app->db);
         $userClass->userType = 'user';
         $userClass->getTeacherList();
        $app->render('admin/teacherList.php',array(
            'teacher' => $userClass->user
        ));

    }
    function editTeacher()
    {
        $app = Slim::getInstance();
         $userClass = new User($app->db);
         $userClass->userType = 'user';
         $userClass->userID = $_GET['userID'];
         $userClass->getUserData();
         $teacher = $userClass->user;

        $app->render('admin/teacherEdit.php',array(
            'action' => 'editTeacher',
            'userID' => $_GET['userID'],
            'teacher'=> $teacher
        ));
    }
    function addTeacher()
    {
        $app = Slim::getInstance();
        $teacher =array(
            'username'  => '',
            'lastname'  => '',
            'password'  => '',
            'firstname' => '',
            'lastname'  => '',
            'email'     => '',
            'mobile'    => ''
        );
        $app->render('admin/teacherEdit.php',array(
            'action'  => 'addTeacher',
            'teacher' => $teacher
        ));
    }
    function deleteTeacher()
    {
         $app = Slim::getInstance(); 
         $sql="DELETE FROM user WHERE user_id='{$_GET['userID']}'";
        $query = $app->db->prepare( $sql );
        $query->execute();
        $app->redirect('/engLesson/showTeacherList');  
    }
    function addTeacherData()
    {
        $app = Slim::getInstance(); 
          $userClass = new User($app->db);
        $userID = $userClass->getNewUserID();
          $sql="INSERT INTO user (user_id,username,password,firstname,lastname,email,mobile,user_type,create_date) VALUES (
                    :userID ,
                    :username ,
                    md5(:password) ,
                    :firstname,
                    :lastname,
                    :email,
                    :mobile ,
                    'Teacher',CURDATE() )";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':userID', $userID);
        $query->bindParam(':username', $_POST['username']);
        $query->bindParam(':password', $_POST['password']);
        $query->bindParam(':firstname', $_POST['firstname']);
        $query->bindParam(':lastname', $_POST['lastname']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':mobile', $_POST['mobile']);
        
      
        $query->execute();
        $app->redirect('/engLesson/showTeacherList');  
    }
    function editTeacherData()
    {
        $app = Slim::getInstance(); 
           $sql="UPDATE user SET
                    username=:username ,
                    firstname=:firstname,
                    lastname=:lastname,
                    email=:email,
                    mobile=:mobile 
            WHERE user_id=:userID  ";
        $query = $app->db->prepare( $sql );
        $query->bindParam(':username', $_POST['username']);
        $query->bindParam(':firstname', $_POST['firstname']);
        $query->bindParam(':lastname', $_POST['lastname']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':mobile', $_POST['mobile']);
        $query->bindParam(':userID', $_POST['userID']);
        
        $query->execute();
        // echo '<pre>';print_r($query->errorInfo());echo '</pre>';exit;
        if(!empty($_POST['password']))
        {
            $sqlPassword="UPDATE user SET  password=md5(:password)  WHERE user_id=:userID  )";
            $queryPassword = $app->db->prepare( $sqlPassword );
            $queryPassword->bindParam(':password', $_POST['password']);
            $queryPassword->bindParam(':userID', $_POST['userID']);
             $queryPassword->execute();
        }
        $app->redirect('/engLesson/showTeacherList'); 
    }
    function checkCourseDate()
    {
           $app = Slim::getInstance();

          $_GET['startDate']= Utility::toMysqlDate( $_GET['startDate'] );
        $courseClass= new Course($app->db);
       
        $canInsertSchduleThisDay  = $courseClass->checkPresentCourseDate( $_GET );
     
        if($canInsertSchduleThisDay)
            echo 'can';
        else
            echo 'cannot';
    }

