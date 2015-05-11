<?php 
    class Exam
    {
        public $connect;
        public $sql;
        public $exam;
        public function __construct($connect)
        {
            $this->connect           =  $connect;
            $this->examListField     = "e.exam_list_id,e.exam_name,e.level";
            $this->examPartField     = "p.exam_part_id,p.part_name,p.part_detail,p.part_no,p.part_description";
            $this->examQuestionField = "q.exam_question_id,q.no question_no , q.question";
            $this->examChoiceField   = "c.exam_choice_id,c.no choice_no,c.choice";
            $this->from ="FROM exam_list e";
            $this->join ="INNER JOIN exam_part p ON p.exam_list_id=e.exam_list_id
                          INNER JOIN exam_question q ON q.exam_part_id = p.exam_part_id 
                          INNER JOIN exam_choice c ON c.exam_question_id =q.exam_question_id ";
             $this->leftJoin ="LEFT JOIN exam_part p ON p.exam_list_id=e.exam_list_id
                          LEFT JOIN exam_question q ON q.exam_part_id = p.exam_part_id 
                          LEFT JOIN exam_choice c ON c.exam_question_id =q.exam_question_id ";
            $this->joinExamPart ="INNER JOIN exam_part p ON p.exam_list_id=e.exam_list_id";
        }
        public function setEmptyData()
        {
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $columns = $query->fetchAll(PDO::FETCH_COLUMN);
            foreach ($columns as $key => $column) 
            {
                $value=' ';
                $this->exam[$column] =$value;
            }
        }
        public function getExamList( $filter =array())
        {
            $this->sql="SELECT *  FROM exam_list WHERE level='{$filter['level']}'";
            $sth = $this->connect->prepare($this->sql);
            $sth->execute();
            $this->exam = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($this->exam as $key => $value) {
                $examID = $value['exam_list_id'];
               $data[ $examID ] = $examID;
            }
            $this->exam = $data;
        }
        public function getPretestExam($filter=array())
        {
            $this->sql="SELECT 
                    {$this->examListField} ,
                    {$this->examPartField} ,
                    {$this->examQuestionField} ,
                    {$this->examChoiceField} 
                    {$this->from}
                    {$this->join}
                WHERE e.exam_list_id='{$filter['examID']}' ";
            $sth = $this->connect->prepare($this->sql);
            $sth->execute();
            $this->exam = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setPretestExam($filter)
        {
            $examList=array();
            foreach ($this->exam as $key => $exam) 
            {
                $partID      = $exam['exam_part_id'];
                $questionID  = $exam['exam_question_id'];
                $choiceIndex = $exam['exam_choice_id'];

                $examList[$partID]['partName']        = $exam['part_name'];
                $examList[$partID]['partDetail']      = $exam['part_detail'];
                $examList[$partID]['partDescription'] = $exam['part_description'];
                $examList[$partID]['partNo']          = $exam['part_no'];

                $examData = &$examList[$partID]['questionList'];
                $examData[$questionID]['question']         = $exam['question'];
                $examData[$questionID]['questionNo']       = $exam['question_no'];

                $examChoice = &$examData[$questionID]['questionChoice'];
                $examChoice[$choiceIndex]['choiceNo'] = $exam['choice_no'];
                $examChoice[$choiceIndex]['choice']   = $exam['choice'];
            }
            $this->exam = $examList;
        }
        public function getExamListForAdmin($filter)
        {
            $this->sql="SELECT 
                    {$this->examListField} ,
                    {$this->examPartField} 
                    {$this->from}
                    LEFT JOIN exam_part p ON p.exam_list_id=e.exam_list_id ";
            $sth = $this->connect->prepare($this->sql);
            $sth->execute();
            $this->exam = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setExamListForAdmin($filter)
        {
            $exam=array();
            foreach ($this->exam as $key => $value) 
            {
                $examID = $value['exam_list_id'];
                $partID = $value['exam_part_id'];

                $exam[ $examID ]['exam_name'] = $value['exam_name'];
                $exam[ $examID ]['level']     = $value['level'];

                $examPart = &$exam[$examID]['part'];
                $examPart[$partID]['partName']        = $value['part_name'];
                $examPart[$partID]['partDetail']      = $value['part_detail'];
                $examPart[$partID]['partDescription'] = $value['part_description'];
                $examPart[$partID]['partNo']          = $value['part_no'];
            }
            $this->exam = $exam;
        }
        public function getExamDetailForAdmin($filter)
        {
            $condition='';
            if( !empty($filter['partID']) )
                $condition ="e.exam_part_id='{$filter['partID']}'";
            if( !empty($filter['examID']) )
                $condition ="e.exam_list_id='{$filter['examID']}'";
             $this->sql="SELECT 
                    {$this->examListField} ,
                    {$this->examPartField} ,
                    {$this->examQuestionField} ,
                    {$this->examChoiceField} 
                    {$this->from}
                    {$this->leftJoin}
                WHERE  {$condition}";
            $sth = $this->connect->prepare($this->sql);
            $sth->execute();
            $this->exam = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setExamPartForAdmin($filer)
        {
             $examList=array();
            foreach ($this->exam as $key => $exam) 
            {
                $partID      = $exam['exam_part_id'];
                $questionID  = $exam['exam_question_id'];
                $choiceIndex = $exam['exam_choice_id'];

                $examList[$partID]['partName']        = $exam['part_name'];
                $examList[$partID]['partDetail']      = $exam['part_detail'];
                $examList[$partID]['partDescription'] = $exam['part_description'];
                $examList[$partID]['partNo']          = $exam['part_no'];

                $examData = &$examList[$partID]['questionList'];
                $examData[$questionID]['question']         = $exam['question'];
                $examData[$questionID]['questionNo']       = $exam['question_no'];

                $examChoice = &$examData[$questionID]['questionChoice'];
                $examChoice[$choiceIndex]['choiceNo'] = $exam['choice_no'];
                $examChoice[$choiceIndex]['choice']   = $exam['choice'];
            }
            $this->exam = $examList;
        }
        public function getExamDetail( $filter )
        {
            if( empty($filter['examID']))
            {
                $this->sql="SHOW COLUMNS FROM exam_list";
                $this->setEmptyData();
            }
            else
            {
                $this->sql="SELECT 
                    {$this->examListField} 
                    {$this->from}
                WHERE e.exam_list_id='{$filter['examID']}' ";
                $sth = $this->connect->prepare($this->sql);
                $sth->execute();
                $this->exam = $sth->fetch(PDO::FETCH_ASSOC);
            }
        }
        public function getExamPartDetail($filter)
        {
            if( empty($filter['examID']))
            {
                $this->sql="SHOW COLUMNS FROM exam_list";
                $this->setEmptyData();
            }
            else
            {
                $this->sql="SELECT 
                    {$this->examListField} 
                    {$this->from}
                WHERE e.exam_list_id='{$filter['examID']}' ";
                $sth = $this->connect->prepare($this->sql);
                $sth->execute();
                $this->exam = $sth->fetch(PDO::FETCH_ASSOC);
            }
        }
        public function getExamPartData( $filter )
        {
            if( empty($filter['partID']))
            {
                $this->sql="SHOW COLUMNS FROM exam_part";
                $this->setEmptyData();
            }
            else
            {
                $this->sql="SELECT p.exam_list_id,
                    {$this->examPartField} 
                    FROM exam_part p
                WHERE p.exam_part_id='{$filter['partID']}' ";
                $sth = $this->connect->prepare($this->sql);
                $sth->execute();
                $this->exam = $sth->fetch(PDO::FETCH_ASSOC);
            }
        }
        public function getExamQuestionDetail( $filter )
        {
            if( empty($filter['questionID']) )
            {
                $this->sql="SHOW COLUMNS FROM exam_question";
                $this->setEmptyData();
                $data                =  $this->exam;
                $data['question_no'] = '';
                for ($choice = 1; $choice <= 4 ; $choice++) 
                { 
                    $data['choice'][$choice]['exam_choice_id'] = '';
                    $data['choice'][$choice]['choice_no']      = '';
                    $data['choice'][$choice]['choice']         = '';
                }
                $this->exam = $data ;
            }
            else
            {
                $this->sql="SELECT q.exam_part_id,q.answer,
                            {$this->examQuestionField},
                            {$this->examChoiceField} 
                            FROM exam_question q 
                            INNER JOIN exam_choice c ON c.exam_question_id =q.exam_question_id 
                            WHERE q.exam_question_id='{$filter['questionID']}'";
                 $sth = $this->connect->prepare($this->sql);
                $sth->execute();
                $this->exam = $sth->fetchall(PDO::FETCH_ASSOC);
            }
        }
        public function setExamQuestionDetail($filter=array())
        {
            // echo '<pre>';print_r($filter);
            foreach ($this->exam as $key => $value) 
            {
               $choiceIndex = $value['choice_no'];
               $data['exam_question_id'] = $value['exam_question_id'];
               $data['question_no']      = $value['question_no'];
               $data['question']         = $value['question'];
               $data['answer']           = $value['answer'];

               $data['choice'][ $choiceIndex ]['exam_choice_id'] = $value['exam_choice_id'];
               $data['choice'][ $choiceIndex ]['choice_no']      = $value['choice_no'];
               $data['choice'][ $choiceIndex ]['choice']         = $value['choice'];
            }
            $this->exam = $data;
        }
        public function getQuestionAnswer($filter)
        {
            $condition ="exam_question_id='{$filter['questionID']}' AND no='{$filter['answer']}'";
            $this->sql="SELECT {$this->examChoiceField} 
                FROM exam_choice c 
                WHERE {$condition}";
            $sth = $this->connect->prepare($this->sql);
            $sth->execute();
            $this->exam = $sth->fetch(PDO::FETCH_ASSOC);
        }
        public function findExamID($filter)
        {
            if( !empty($filter['questionID']) )
                $condition =" q.exam_question_id='{$filter['questionID']}'";
            $this->sql="SELECT e.exam_list_id FROM exam_list e 
                INNER JOIN exam_part p ON p.exam_list_id=e.exam_list_id
                INNER JOIN exam_question q ON q.exam_part_id = p.exam_part_id 
                WHERE {$condition}";
            $sth = $this->connect->prepare($this->sql);
            $sth->execute();
            $this->exam = $sth->fetch(PDO::FETCH_ASSOC);

            return $this->exam['exam_list_id'];
        }
        public function getExamAnswer( $filter )
        {
            $this->sql="SELECT q.exam_question_id,q.answer FROM exam_question q 
                        INNER JOIN exam_part p ON p.exam_part_id = q.exam_part_id
                        WHERE p.exam_list_id='{$filter['examID']}'";
            $query=$this->connect->prepare($this->sql);
            $query->execute();
            $examAnswers = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($examAnswers as $key => $examAnswer) {
                $index = $examAnswer['exam_question_id'];
                $answers[$index]['answer'] = $examAnswer['answer'];
            }
            return $answers;
        }
        public function getTestScore( $studentAnswer , $examAnswer)
        {
            $score =0;
            foreach ($studentAnswer as $questionID => $choice) {
                // echo $choice.'>>>>...'.$answers[$questionID]['answer'].'<hr>';
                $correctAnswer = $choice == $examAnswer[$questionID]['answer'];
                if( $correctAnswer )
                    $score++;
            }
            return $score;
        }
    }
