<?php 
    class User
    {
        public $connect;
        public $sql;
        public $user;
        public $userID;
        public $userType;
        public function __construct($connect,$session=array(),$userType='student')
        {
             $this->userType = $userType;
            $this->connect  = $connect;
            if(!empty( $session['loginUser'] ))
                $this->userID   = $session['loginUser'];
            if(!empty( $session['admin'] ))
                $this->userID   = $session['admin'];
           
            if( !empty( $session['loginUser'] ) || !empty( $session['loginUser'] ))
                $this->getUserData();
        }
        public function getUserData()
        {
            $this->sql="SELECT * FROM {$this->userType} WHERE user_id='{$this->userID}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->user = $query->fetch(PDO::FETCH_ASSOC);
        }
        public  function getTeacherList()
        {
            $this->sql="SELECT * FROM {$this->userType} WHERE user_type='Teacher'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $this->user = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public  function setTeacherList()
        {
            $data=array();
           foreach ($this->user as $key => $user) 
           {
              $data[$key]['Name']  = $user['firstname'].' '.$user['lastname'];
              $data[$key]['Value'] = $user['user_id'];
           }
           $this->user=$data;
        }
        public function checkThisPeopleDidPretestExam($firstname='',$lastname='')
        {
             $this->sql="SELECT COUNT(*) count FROM student 
                        WHERE firstname='{$firstname}' 
                        AND lastname='{$lastname}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
             $data = $query->fetch(PDO::FETCH_ASSOC);
            return ($data['count'] > 0);
        }
        public function deleteRegisterDataWhenExpiredDate()
        {
            $this->sql="DELETE FROM register WHERE register_end_date <= CURDATE() AND status='Pending'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
        }
        public function deleteExpiredPretestExam()
        {
            $this->sql=" DELETE e,u
                    FROM exam e 
                    INNER JOIN student u ON u.user_id =e.user_id
                    WHERE e.level =0 
                    AND DATE_ADD(e.test_date, INTERVAL 30 DAY) < curdate() 
                    AND u.username = ''";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
        }
        public function clearExpiredDate()
        {
            $this->deleteRegisterDataWhenExpiredDate();
            $this->deleteExpiredPretestExam();
        }
    }