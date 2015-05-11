<?php 
class Utility
{
    public static function createOption($data,$selectedValue='')
    {
        $selectBox='';
        foreach($data as $key => $option)
        {
            $selectBox.='<option value="'.$option['Value'].'" ';
            if( $option['Value'] == $selectedValue)
                $selectBox.='selected';
            $selectBox.='>'.$option['Name'].'</option>';
        }
        return $selectBox;
    }
    public static function toDisplayDate ($mysqldate) {
        if ($mysqldate != "") {
            $year = substr($mysqldate, 0, 4);
            $month = substr($mysqldate, 5, 2);
            $day = substr($mysqldate, 8, 2);
            return ($day."/".$month."/".$year);
        } else {
            return ("00/00/0000");
        }
    }
    public static function toMysqlDate ($displaydate) {
        if ($displaydate != "") {
            $day = substr($displaydate, 0, 2);
            $month = substr($displaydate, 3, 2);
            $year = substr($displaydate, 6, 4);
            return ($year."-".$month."-".$day);
        } else {
            return ("0000-00-00");
        }
    }
    public static function getMonthList()
    {
        $months=array(
            '1'  => 'มกราคม',
            '2'  => 'กุมภาพันธ์',
            '3'  => 'มีนาคม',
            '4'  => 'เมษายน',
            '5'  => 'พฤษภาคม',
            '6'  => 'มิถุนายน',
            '7'  => 'กรกฎาคส',
            '8'  => 'สิงหาคม',
            '9'  => 'กันยายน',
            '10' => 'ตุลาคม',
            '11' => 'พฤศจิกายน',
            '12' => 'ธันวาคม',
        );
        foreach ($months as $key => $month) {
            $data[ $key ]['Value'] = $key;
            $data[ $key ]['Name']  = $month;
        }
        return $data;
    }
    public static function getYearList()
    {
        for ($year=date('Y'); $year <= ( date('Y')+10 )  ; $year++) 
        { 
            $data[ $year ]['Value'] = $year;
            $data[ $year ]['Name']  = $year;
        }
        return $data;
    }
}