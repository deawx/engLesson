<?php 
    class Room
    {
        public $connect;
        public $sql;
        public $data;
        public function __construct($connect)
        {
            $this->connect =  $connect;
            $this->roomDetailField="r.room_id,r.room_name,
                                rs.room_seat_id,rs.row_id,rs.column_id,
                                row.row_name,col.column_name";
            $this->from="room r";
            $this->roomJoin="INNER JOIN room_seat rs ON rs.room_id = r.room_id 
                        INNER JOIN room_row row ON row.row_id=rs.row_id
                        INNER JOIN room_column col ON col.column_id =rs.column_id ";
        }
        public  function getRoomListForSelectBox()
        {
            $this->sql="SELECT r.room_id,r.room_name,COUNT(*) total_seat FROM room r 
                    INNER JOIN room_seat rs ON rs.room_id=r.room_id 
                    GROUP BY r.room_id";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
           return  $this->data = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setRoomListForSelectBox()
        {
            $data=array();
           foreach ($this->data as $key => $value) 
           {
              $data[$key]['Name']  = 'ห้อง '.$value['room_name'].' ('.$value['total_seat'].' ที่นั่ง)';
              $data[$key]['Value'] = $value['total_seat'];
           }
           $this->data=$data;
        }
        public function setRoomListByRoomIDForSelectBox()
        {
            $data=array();
           foreach ($this->data as $key => $value) 
           {
              $data[$key]['Name']  = 'ห้อง '.$value['room_name'].' ('.$value['total_seat'].' ที่นั่ง)';
              $data[$key]['Value'] = $value['room_id'];
           }
           $this->data=$data;
        }
        public function getRoomDetail( $filter=array() )
        {
            $this->sql="SELECT {$this->roomDetailField},
                        b.booking_id,s.schedule_id,s.course_id
                        FROM {$this->from}
                       {$this->roomJoin}
                        INNER JOIN schedule s ON s.room_id = r.room_id
                        LEFT JOIN booking b ON b.room_seat_id = rs.room_seat_id 
                            AND b.schedule_id=s.schedule_id
                        WHERE s.schedule_id='{$filter['scheduleID']}' 
                        ORDER BY row.row_id,col.column_id";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
           return  $this->data = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getRoomLiveDetail($filter=array())
        {
            $this->sql="SELECT {$this->roomDetailField},
                        b.booking_id,s.schedule_id,s.course_id
                        FROM {$this->from}
                       {$this->roomJoin}
                        INNER JOIN schedule s ON s.room_id = r.room_id
                        LEFT JOIN booking b ON b.room_seat_id = rs.room_seat_id 
                            AND b.schedule_id=s.schedule_id
                        WHERE s.course_id='{$filter['courseID']}' 
                        GROUP BY rs.room_seat_id
                        ORDER BY row.row_id,col.column_id";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
           return  $this->data = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function setRoomDetail($filter=array())
        {
            $seat= array();
            foreach ($this->data as $key => $value) 
            {
                $columnID   = $value['column_id'];
                $rowID      = $value['row_id'];
                $seatID     = $value['room_seat_id'];
                $bookingID  = $value['booking_id'];
                $scheduleID = $value['schedule_id'];
                $courseID   = $value['course_id'];
                $roomID     = $value['room_id'];

                $seat[ $rowID ][ $columnID ]['room_seat_id'] = $seatID;
                $seat[ $rowID ][ $columnID ]['columnName']   = $value['column_name'];
                $seat[ $rowID ][ $columnID ]['rowName']      = $value['row_name'];
                //booking
                $seat[ $rowID ][ $columnID ]['booking_id']   = $bookingID;
                $seat[ $rowID ][ $columnID ]['schedule_id']  = $scheduleID;
                $seat[ $rowID ][ $columnID ]['course_id']    = $courseID;
                $seat[ $rowID ][ $columnID ]['room_id']      = $roomID;

            }
            return $seat;
        }
        public function checkRoomSize( $filter =array())
        {
            $this->sql="SELECT COUNT(*) count FROM room r 
                        INNER JOIN room_seat rs ON rs.room_id = r.room_id
                        WHERE r.room_id='{$filter['roomID']}'";
         $query= $this->connect->prepare($this->sql);
            $query->execute();
             $data = $query->fetch(PDO::FETCH_ASSOC);
             return $data['count'];
        }
        public function checkReserveSeatQuantity( $filter=array())
        {
            $this->sql="SELECT COUNT(*) count FROM booking 
                        WHERE schedule_id='{$filter['scheduleID']}'";
            $query= $this->connect->prepare($this->sql);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);
             return $data['count'];
        }
        public function checkFullRoom( $filter=array())
        {
            $roomSize        = $this->checkRoomSize($filter);
            $reserveQuantity = $this->checkReserveSeatQuantity($filter);

            return ($reserveQuantity >= $roomSize) ; 
        }
    }