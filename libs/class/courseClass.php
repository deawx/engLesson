<?php 
    class Course
    {
        public $connect;
        public $sql;
        public $course;
        public $schedule;
        public $booking;
        public function __construct($connect)
        {
            $this->connect = $connect;
            $this->select = "SELECT c.course_id,c.course_name,c.course_type,c.max_seat ,
                                c.start_date,c.end_date,c.price,c.level,
                                c.max_seat - SuM(IF(r.register_id IS NULL,0,1)   ) remain_seat  ";
            $this->courseField  ="c.course_id,c.course_name,c.course_type,c.max_seat ,
                                c.start_date,c.end_date,c.price,c.level";
            $this->scheduleField = "s.schedule_id,s.date schedule_date,s.start_time,s.end_time,s.max_seat video_max_seat";
            $this->registerField = "r.register_id,r.user_id,r.status ,r.register_date,r.register_end_date,r.pay_date";
            $this->userField     = " u.firstname,u.lastname,u.level user_level,u.email,u.mobile";
            $this->from          = "FROM course c ";
            $this->join          = "LEFT JOIN register r ON r.course_id=c.course_id";
            $this->group         = "GROUP BY c.course_id";
            $this->having        = "HAVING remain_seat> 0";
            $this->condition     = "c.Enabled='Y'";
            $this->order         =  "ORDER BY c.Level DESC";
            $this->reportOrder   = "ORDER BY c.level,c.course_type,c.course_name";

            $this->totalStudyQuery="(SELECT COUNT(*) FROM `booking` b 
                                        INNER JOIN `schedule` ss ON ss.schedule_id=b.schedule_id
                                        INNER JOIN course cc ON cc.course_id=ss.course_id
                                        WHERE b.user_id=r.user_id 
                                        AND cc.course_id=c.course_id 
                                        AND b.booking_status='Study')";
            $this->totalScheduleQuery="(
                    SELECT
                        COUNT(sss.schedule_count)count
                    FROM
                        (
                            SELECT
                                COUNT(*)schedule_count,s.course_id
                            FROM
                                `schedule` s
                            
                            GROUP BY
                                s.date
                        )sss WHERE
                                c.course_id = sss.course_id
                )";
            
         
        }
        public function getCourseListForSelectBox( $filter=array())
        {
             $this->sql="SELECT {$this->courseField} {$this->from} 
                    GROUP BY c.course_id {$this->reportOrder}" ;
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setCourseListForSelectBox( $filter=array())
        {
            foreach ($this->course as $key => $value) {
                $data[$key]['Name']  = ' (Lv.'.$value['level'].' '.$value['course_type'].') '.$value['course_name'];
                $data[$key]['Value'] = $value['course_id'];
            }
            return $data;
        }
        public function getCourseDetail($filter)
        {
             $this->sql = "{$this->select} 
                            {$this->from} 
                            {$this->join}
                            WHERE {$this->condition} 
                            AND c.course_id={$filter['id']}  
                            {$this->group} 
                            {$this->having} ";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getCourseDetailFromBooking($filter)
        {
            $this->sql="SELECT c.course_id,c.`level` FROM course c
                        INNER JOIN `schedule` s ON s.course_id=c.course_id
                        INNER JOIN booking b ON b.schedule_id=s.schedule_id
                        WHERE b.booking_id='{$filter['bookingID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getCourseVideoList($filter)
        {
            $this->sql="SELECT * FROM video v WHERE v.level='{$filter['level']}' ORDER BY video_no";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getCourseListByUserLevel($filter)
        {
            $this->sql = "{$this->select} 
                            {$this->from} 
                            {$this->join}
                        WHERE {$this->condition}  
                        AND c.`level` <={$filter['level']} 
                        {$this->group} 
                        {$this->having}
                        {$this->order} ";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDetailFromRegisterID($filter)
        {
            $this->sql="SELECT  
                    {$this->courseField},
                    {$this->registerField},
                    {$this->userField}
                    FROM register r 
                    INNER JOIN course c ON c.course_id=r.course_id 
                    INNER JOIN student u ON u.user_id=r.user_id
                    WHERE r.register_id='{$filter['registerID']}'";
              $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function setCourseListByCourseType($filter)
        {
            $data=array();
            foreach ($this->course as $key => $value) 
            {
                $index      = $value['course_id'];
                $courseType = $value['course_type'];
                $data[ $courseType ][ $index ]['course_name'] = $value['course_name'];
                $data[ $courseType ][ $index ]['course_type'] = $value['course_type'];
                $data[ $courseType ][ $index ]['max_seat']    = $value['max_seat'];
                $data[ $courseType ][ $index ]['remain_seat'] = $value['remain_seat'];
                $data[ $courseType ][ $index ]['start_date']  = $value['start_date'];
                $data[ $courseType ][ $index ]['end_date']    = $value['end_date'];
                $data[ $courseType ][ $index ]['price']       = $value['price'];
                $data[ $courseType ][ $index ]['level']       = $value['level'];
            }
            $this->course = $data;
        }
        public function getUserRegisterCourse($filter)
        {
            $this->sql="SELECT *,
                         IF((rr.total_study / rr.total_schedule)>= 0.74,'Pass','NotPass') pass_status
                        FROM(SELECT 
                                {$this->courseField} , 
                                {$this->registerField} , 
                                ({$this->totalScheduleQuery}) total_schedule,
                                {$this->totalStudyQuery} total_study,e.score,e.test_id
                            FROM register r 
                            INNER JOIN course c ON c.course_id=r.course_id 
                            LEFT JOIN exam e ON e.register_id = r.register_id
                            WHERE r.user_id='{$filter['userID']}' ) rr";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);

        }
        public function setUserRegisterCourse()
        {
            foreach ($this->course as $key => $value) {

                // $totalSchedule[]
                 $this->course[$key]['total_schedule'] = $this->getTotalSchedule($value['course_id']);
            }
        }
        public function getTotalSchedule($courseID)
        {
            $this->sql="SELECT
                        COUNT(sss.schedule_count)count
                    FROM
                        (
                            SELECT
                                COUNT(*)schedule_count,s.course_id,s.date
                            FROM
                                `schedule` s
                             WHERE
                                s.course_id ={$courseID}
                            GROUP BY
                                s.date
                        )sss ";
              $query= $this->connect->prepare($this->sql);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data['count'];
        }
        public function getRegisterDetail($filter)
        {
            $this->sql="SELECT * FROM register r 
                    WHERE r.register_id='{$filter['registerID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getUserCourseList($filter)
        {
            $condition='';
            if(!empty($filter['courseID']))
                $condition=" AND c.course_id='{$filter['courseID']}'";
            $checkBookingField= "(SELECT IF(count(*) > 0 ,'booking','notbooking')  FROM booking ub 
                                    INNER JOIN schedule us ON us.schedule_id=ub.schedule_id 
                                    WHERE us.date=s.date AND ub.user_id=r.user_id ) check_booking";
            $this->sql="SELECT c.course_id,c.course_name,c.course_type,c.start_date,c.end_date,
                        c.level,c.max_seat live_max_seat,
                        s.schedule_id,s.date schedule_date,
                        WEEK(s.date) schedule_week,WEEK(CURDATE()) current_week,
                        IF( YEARWEEK(s.date) = YEARWEEK( CURDATE() ),1,'' ) schedule_this_week,
                        s.start_time,s.end_time,s.max_seat video_max_seat,
                        ub.booking_status,ub.booking_id,
                        teacher.firstname,teacher.lastname,
                        s.max_seat - SuM(IF(b.booking_id IS NULL,0,1)   ) remain_seat  ,
                        row.row_name,col.column_name,r.status register_status ,{$checkBookingField}
                    FROM register r 
                    INNER JOIN course c ON c.course_id=r.course_id 
                    INNER JOIN schedule s ON s.course_id=c.course_id 
                    LEFT JOIN user teacher ON teacher.user_id=s.teacher_id
                     LEFT JOIN booking b ON s.schedule_id=b.schedule_id 
                    LEFT JOIN booking ub ON ub.schedule_id = b.schedule_id AND r.user_id = ub.user_id 
                   LEFT JOIN  room_seat rs ON rs.room_seat_id =ub.room_seat_id
                   LEFT JOIN room_row row ON row.row_id =rs.row_id
                   LEFT JOIN room_column col ON col.column_id =rs.column_id
                    WHERE r.user_id='{$filter['userID']}'  {$condition}
                    GROUP BY s.schedule_id";//AND s.date >= CURDATE()
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function checkUserRegisterThisCourse( $filter=array())
        {
            $this->sql="SELECT COUNT(*) count FROM register r 
                        WHERE r.course_id='{$filter['courseID']}'
                        AND r.user_id='{$filter['userID']}'";
             $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);     
            return $this->course['count'] > 0;
        }
        public function setUserCourseList()
        {
            $data=array();
            foreach ($this->course as $key => $value) 
            {
                $courseID   = $value['course_id'];
                $scheduleID = $value['schedule_id'];
                $data[ $courseID ]['course_name'] = $value['course_name'];
                $data[ $courseID ]['course_type'] = $value['course_type'];
                $data[ $courseID ]['start_date']  = $value['start_date'];
                $data[ $courseID ]['end_date']    = $value['end_date'];
                $data[ $courseID ]['level']       = $value['level'];
                $data[ $courseID ]['register_status']       = $value['register_status'];

                $schedule = &$data[ $courseID ]['schedule'];
                $schedule[ $scheduleID ]['schedule_date']  = $value['schedule_date'];
                $schedule[ $scheduleID ]['video_max_seat'] = $value['video_max_seat'];
                $schedule[ $scheduleID ]['remain_seat']    = $value['remain_seat'];
                $schedule[ $scheduleID ]['start_time']     = $value['start_time'];
                $schedule[ $scheduleID ]['end_time']       = $value['end_time'];
                $schedule[ $scheduleID ]['booking_id']     = $value['booking_id'];
                $schedule[ $scheduleID ]['booking_status'] = $value['booking_status'];
                $schedule[ $scheduleID ]['check_booking'] = $value['check_booking'];
                $schedule[ $scheduleID ]['firstname']      = $value['firstname'];
                $schedule[ $scheduleID ]['lastname']       = $value['lastname'];
                $schedule[ $scheduleID ]['schedule_this_week']       = $value['schedule_this_week'];
                $schedule[ $scheduleID ]['seat_name']       = $value['row_name'].$value['column_name'];
            }
            $this->course = $data;
        }
        public function registerCourse($filter)
        {

        }
        public function getCourseList($filter)
        {
           $this->sql="SELECT  
                    c.course_id,c.course_name,c.course_type,c.start_date,c.end_date,
                    c.level,c.max_seat live_max_seat,
                    s.schedule_id,s.date schedule_date,s.start_time,s.end_time,s.max_seat video_max_seat,
                    teacher.firstname,teacher.lastname
                    FROM course c 
                    LEFT JOIN schedule s ON s.course_id=c.course_id 
                    LEFT JOIN user teacher ON teacher.user_id=s.teacher_id
                    WHERE c.enabled='Y' ";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setCourseList($filter)
        {
             $data=array();
           foreach ( $this->course as $key => $value) 
           {
               $courseID = $value['course_id'];
                $scheduleID = $value['schedule_id'];
                $data[ $courseID ]['course_name'] = $value['course_name'];
                $data[ $courseID ]['course_type'] = $value['course_type'];
                $data[ $courseID ]['start_date']  = $value['start_date'];
                $data[ $courseID ]['end_date']    = $value['end_date'];
                $data[ $courseID ]['level']       = $value['end_date'];

                $schedule = &$data[ $courseID ]['schedule'];
                $schedule[ $scheduleID ]['schedule_date']  = $value['schedule_date'];
                $schedule[ $scheduleID ]['video_max_seat'] = $value['video_max_seat'];
                $schedule[ $scheduleID ]['start_time']     = $value['start_time'];
                $schedule[ $scheduleID ]['end_time']       = $value['end_time'];;
                $schedule[ $scheduleID ]['firstname']      = $value['firstname'];
                $schedule[ $scheduleID ]['lastname']       = $value['lastname'];
           }
           $this->course = $data;
        }
        public function getScheduleDetail($filter)
        {
            $this->sql="SELECT * FROM schedule WHERE schedule_id='{$filter['scheduleID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getMatinCourseList($filter)
        {
            $this->sql="SELECT * FROM main_course WHERE enabled='Y'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getMainCourseDetail($filter)
        {
            $this->sql="SELECT * FROM main_course 
                    WHERE enabled='Y' 
                    AND main_course_id='{$filter['mainCourseID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function getCourseDetailForAdmin($filter)
        {
            if( empty($filter['courseID']) )
            {
                $this->sql="SHOW COLUMNS FROM course";
                $query= $this->connect->prepare($this->sql);
                $query->execute();
                $columns = $query->fetchAll(PDO::FETCH_COLUMN);
                foreach ($columns as $key => $column) {
                    $value='';
                    if($column =='start_date' || $column =='end_date')
                        $value=date('Y-m-d');
                    if($column == 'course_type')
                        $value='Video';
                    $this->course[$column] =$value;
                }
            }
            else
            {
                $this->sql="SELECT * FROM course 
                        WHERE course_id='{$filter['courseID']}' ";
                $query= $this->connect->prepare($this->sql);
                $query->execute();
                $this->course = $query->fetch(PDO::FETCH_ASSOC);
            }
        }
        public function getRegisterList($filter=array())
        {
            $condition='';
            if(empty( $filter['paymentStatus'] ))
                $filter['paymentStatus']=FALSE;
            
            if($filter['paymentStatus'])
                $condition="WHERE r.Status IN ('Pending','Printed','Paid','Confirmed') ORDER BY r.Status DESC";
            if(!empty($filter['month'])  && !empty($filter['year']))
                $condition="WHERE MONTH(r.pay_date)='{$filter['month']}' 
                            AND YEAR(r.pay_date)='{$filter['year']}' 
                            AND r.pay_date IS NOT NULL";
            $this->sql="SELECT 
                r.file_name,r.register_id,r.`status`,
                r.register_date,r.register_end_date,r.pay_date,
                s.firstname,s.lastname,s.email,
                {$this->courseField}
                FROM register r 
                INNER JOIN course c ON c.course_id=r.course_id
                INNER JOIN student s ON s.user_id = r.user_id 
                {$condition}";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getReportIncomeData( $filter=array() )
        {
             if(!empty($filter['month'])  && !empty($filter['year']))
                $condition="WHERE MONTH(r.pay_date)='{$filter['month']}' 
                            AND YEAR(r.pay_date)='{$filter['year']}' 
                            AND r.pay_date IS NOT NULL";
            $this->sql="SELECT 
                r.file_name,r.register_id,r.`status`,
                r.register_date,r.register_end_date,r.pay_date,
                s.firstname,s.lastname,s.email,
                SUM(c.Price) sum_price,
                {$this->courseField}
                FROM register r 
                INNER JOIN course c ON c.course_id=r.course_id
                INNER JOIN student s ON s.user_id = r.user_id 
                {$condition} GROUP BY c.level";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setReportPopularData()
        {
            $col1 =array(
                "id" =>"",
                "label" => "Course Namee",
                "pattern" => "",
                "type" => "string"
            );
            $col2 =array(
                "id" =>"",
                "label" => "Popular",
                "pattern" => "",
                "type" => "number"
            );
            $data['cols']=array($col1,$col2);
            $data['rows']=array();
            $report=array();
            foreach($this->course as $key => $value) 
            {
                $pieColumnName = array('v' => $value['course_name']);
                $pieAmount = array('v' => $value['count']);
                $report['c']=array($pieColumnName,$pieAmount);
                array_push($data['rows'], $report);
                # code...
            }
            return $data;
            // $v1 = array( 'v' => 'work');
            // $v2 = array( 'v' => 70);

            // $v3 = array( 'v' => 'work2');
            // $v4 = array( 'v' => 70);

            // $v5 = array( 'v' => 'work3');
            // $v6 = array( 'v' => 70);
            //  $report['c']=array($v1,$v2);array_push($data['rows'], $report);
            //  $report['c']=array($v3,$v4);array_push($data['rows'], $report);
            //  $report['c']=array($v5,$v6);array_push($data['rows'], $report);
            //  $report['c']=array($v1,$v2);
            //     array_push($data['rows'], $report);
            //     // echo '<pre>';
            // echo json_encode($data);
        }
        public function getPopularCourse($filter=array())
        {
            $condition='';
            if(!empty($filter['month'])  && !empty($filter['year']))
                $condition="WHERE MONTH(r.register_date)='{$filter['month']}' 
                            AND YEAR(r.register_date)='{$filter['year']}' 
                            AND r.register_date IS NOT NULL";
            $this->sql="SELECT * FROM (SELECT COUNT(*) count,{$this->courseField}
                FROM register r 
                INNER JOIN course c ON c.course_id=r.course_id
                {$condition}
                GROUP BY r.course_id ) report_table ORDER BY report_table.count DESC";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getTeacherSchedule( $filter )
        {
            $this->sql="SELECT {$this->courseField},{$this->scheduleField} 
                    FROM `schedule` s 
                    INNER JOIN course c ON c.course_id=s.course_id
                    WHERE c.course_type='Live' 
                    AND s.teacher_id='{$filter['teacherID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getStudentVideoSchedule( $filter=array())
        {
            $this->sql="SELECT {$this->courseField},{$this->scheduleField} 
                    FROM `schedule` s 
                    INNER JOIN course c ON c.course_id=s.course_id
                    WHERE c.course_type='Video' ";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setTeacherScheduleData( $filter=array() )
        {
            $data=array();
            foreach ($this->course as $key => $value) 
            {
                $courseID   = $value['course_id'];
                $scheduleID = $value['schedule_id']; 
                $data[ $courseID ]['course_name'] = $value['course_name'];   
                $data[ $courseID ]['start_date']  = $value['start_date'];   
                $data[ $courseID ]['end_date']    = $value['end_date'];   
                $data[ $courseID ]['level']       = $value['level'];   

                $schedule = &$data[ $courseID ]['schedule'];
                $schedule[ $scheduleID ]['schedule_date'] = $value['schedule_date'];
                $schedule[ $scheduleID ]['start_time']    = $value['start_time'];
                $schedule[ $scheduleID ]['end_time']      = $value['end_time'];
            }
            $this->course = $data;
        }
        public function getStudentList( $filter )
        {
            $this->sql="SELECT u.user_id, u.firstname,u.lastname FROM register r 
                        INNER JOIN student u ON u.user_id = r.user_id 
                        WHERE r.course_id='{$filter['courseID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getTotalStudyQuery($filter=array())
        {   
            $sql ="(SELECT COUNT(*) FROM `booking` b 
                    INNER JOIN `schedule` ss ON ss.schedule_id=b.schedule_id
                    INNER JOIN course cc ON cc.course_id=ss.course_id
                    WHERE b.user_id=r.user_id AND cc.course_id=c.course_id AND b.booking_status='Study')";
            return $sql;
        }
        public function getTotalScheduleQuery($filter=array())
        {
            $sql="(SELECT  COUNT(*)  FROM  `schedule` s  WHERE s.course_id = c.course_id )";
            return $sql;
        }
        public function getStudentsInCourse( $filter =array() )
        {
           $this->sql="SELECT r.course_id,
                        {$this->registerField} , 
                        {$this->scheduleField},
                        u.firstname,u.lastname,u.user_id,
                        b.booking_id,b.booking_status,c.course_name
                        FROM register r 
                        INNER JOIN schedule s ON s.course_id=r.course_id  
                        INNER JOIN course c ON c.course_id=r.course_id
                        INNER JOIN student u ON u.user_id=r.user_id 
                        LEFT JOIN booking b ON b.user_id = u.user_id 
                            AND b.schedule_id=s.schedule_id 
                            AND b.booking_status='Study'
                        WHERE r.course_id='{$filter['courseID']}' 
                        ORDER BY s.date,u.firstname";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setStudentsInCourse( $filter=array() )
        {
            // echo '<pre>';print_r($this->course);echo '</pre>';
            $data=array();
            $booking=array();
            $schedule=array();
            $this->schedule=array();
            $this->booking=array();
            foreach ($this->course as $key => $value) 
            {
                $registerID = $value['register_id'];
                $courseID   = $value['course_id'];
                $scheduleID = $value['schedule_date']; 
                $userID     = $value['user_id']; 
                $bookingID  = $value['booking_id']; 
                
                $schedule[ $scheduleID ]['schedule_date'] = $value['schedule_date'];
                $schedule[ $scheduleID ]['start_time']    = $value['start_time'];
                $schedule[ $scheduleID ]['end_time']      = $value['end_time'];

                $data[ $registerID ]['course_id']   = $value['course_id'];   
                $data[ $registerID ]['user_id']     = $value['user_id'];   
                $data[ $registerID ]['schedule_id'] = $value['schedule_id'];   
                $data[ $registerID ]['name'] = $value['firstname'].' '.$value['lastname'];   
                if(!empty($bookingID))
                {
                    $booking[ $scheduleID ][ $userID ]['booking_id'] = $bookingID;
                    $booking[ $scheduleID ][ $userID ]['booking_status'] = $value['booking_status'];
                }
                $booking[ $scheduleID ][ $userID ]['booking'] = !empty($bookingID);
            }
            $this->booking  = $booking;
            $this->schedule = $schedule;
            $this->course   = $data;
        }
        public function reportPostExam( $filter =array())
        {
            $condition='';
            if(!empty($filter['courseID']))
                $condition=" WHERE c.course_id='{$filter['courseID']}'";
             $this->sql="SELECT {$this->courseField} ,{$this->registerField},
                        u.firstname,u.lastname,
                        e.score,e.ispass,e.test_date
                        FROM register r 
                        INNER JOIN course c ON c.course_id=r.course_id 
                        INNER JOIN student u ON u.user_id=r.user_id 
                        LEFT JOIN exam e ON e.register_id=r.register_id 
                        {$condition}
                        {$this->reportOrder}";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->course = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setReportPostExamData( $filter=array())
        {
            $data=array();
            foreach ($this->course as $key => $value) 
            {    
                $courseID = $value['course_id'];
                $registerID = $value['register_id'];
                $data[$courseID]['course_name'] = $value['course_name'];
                $data[$courseID]['course_type'] = $value['course_type'];
                $data[$courseID]['start_date']  = $value['start_date'];
                $data[$courseID]['end_date']    = $value['end_date'];
                $data[$courseID]['level']       = $value['level'];

                $student = &$data[$courseID]['student'];

                $student[ $registerID ]['name'] = $value['firstname'].' '.$value['lastname'];
                $student[ $registerID ]['status'] = $value['status'];
                $student[ $registerID ]['score'] = $value['score'];

                $passStatus="ยังไม่ได้ทำการสอบ";
                $alertStatus="warning";
                if($value['ispass'] =='N')
                {
                    $passStatus="ไม่ผ่านการทดสอบ";
                    $alertStatus="danger";
                }
                if($value['ispass'] =='Y')
                {
                     $passStatus="ผ่านการทดสอบ";
                     $alertStatus="success";
                }
                 $student[ $registerID ]['passStatus']  = $passStatus;
                 $student[ $registerID ]['alertStatus'] = $alertStatus;
            }
            $this->course = $data;
            return $this->course;
        }
        public function getCoursePrint($filter=array())
        {
            $this->sql="SELECT {$this->registerField},
            {$this->userField} ,
            {$this->courseField}
                    FROM register r 
                    INNER JOIN student u ON u.user_id=r.user_id 
                    INNER JOIN course c ON c.course_id=r.course_id
                    WHERE r.register_id='{$filter['registerID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            return $this->course = $query->fetch(PDO::FETCH_ASSOC);
        }
        public function checkScheduleTime($data)
        {
            $checkTime =" AND (start_time BETWEEN '{$data['startTime']}' AND '{$data['endTime']}') 
                        AND (end_time BETWEEN '{$data['startTime']}' AND '{$data['endTime']}')";
            $this->sql="SELECT COUNT(*) count FROM schedule 
                        WHERE course_id='{$data['courseID']}' 
                        AND date='{$data['scheduleDate']}' 
                        AND room_id='{$data['room']}' 
                        {$checkTime}";
             $query= $this->connect->prepare($this->sql);
            $query->execute();
            $count = $query->fetch(PDO::FETCH_ASSOC);
            $teacherCanLessonThisTime = $count['count'] ==0;
            return  $teacherCanLessonThisTime;
        }
    }