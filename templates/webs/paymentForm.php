<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <link href="/engLesson/css/bootstrap.css" rel="stylesheet">
      <script src="/engLesson/js/jquery-ui/js/jquery-1.10.2.js"></script>
 <!--    <link href="/engLesson/css/datepicker.css" rel="stylesheet"> -->
    <link href="/engLesson/css/mainpage.css" rel="stylesheet">
    </head>
    <div class="container print-page">
        <div class="row">
            <div class="col-xs-5 col-centered">
                <h3>แบบฟอร์มการชำระเงิน</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h4><strong>ข้อมูลผู้สมัคร</strong></h4>
            </div>
            <div class="col-xs-6">
                <h4>รหัส <?php  echo $paymentPrintID;?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
               ชื่อ : <?=$this->data->course['firstname'].' '.$this->data->course['lastname']?>
            </div>
            <div class="col-xs-6">
               Level : <?=$this->data->course['user_level']?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
               เบอร์โทรศัพท์ : <?=$this->data->course['mobile']?>
            </div>
            <div class="col-xs-6">
               Email : <?=$this->data->course['email']?>
            </div>
        </div>
        <hr>
        <h4><strong>ขั้นตอนการชำระเงิน</strong></h4>
        <ul>
            <li>นำแบบฟอร์มการชำระเงิน ติดต่อที่เคาน์เตอร์ธนาคารเพื่อชำระเงินได้ 3 ธนาคาร</li>
            <li><img src="photo/ktb.jpg" alt="" width="20" height="20"> ธนาคารกรุงไทย   014 – 3 – 77248 - 3 </li>                      
              <li>  <img src="photo/scb.jpg" alt="" width="20" height="20"> ธนาคารไทยพาณิชย์  493 – 2 – 39427 - 0 </li>                                       
              <li><img src="photo/ksb.jpg" alt="" width="20" height="20"> ธนาคารกรุงศรี 201 – 4 – 21830 - 4</li>  
            <li>เมื่อชำระเงินเรียบร้อยแล้ว ต้องแนบไฟล์ส่งให้กับทางสถาบันเพื่อเป็นหลักฐานยืนยันชำระเงินแล้ว</li>
        </ul>
        <hr>
        <h4><strong>*หมายเหตุเงื่อนไขการชำระเงิน</strong></h4>
        <span>ผู้สมัครเรียนต้องชำระเงิน ภายใน 3 วัน หลังจากวันที่สมัคร มิฉะนั้นการสมัครเรียนจะถูกยกเลิก</span>
        <hr>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
                <h3>ใบชำระค่าเรียน</h3>
            </div>
        </div>
        <div class="row">
            <ul>
                <li><img src="photo/ktb.jpg" alt="" width="20" height="20"> ธนาคารกรุงไทย 014 – 3 – 77248 - 3  </li>
                <li><img src="photo/scb.jpg" alt="" width="20" height="20"> ธนาคารไทยพาณิชย์ 493 – 2 – 39427 - 0</li>
                <li><img src="photo/ksb.jpg" alt="" width="20" height="20"> ธนาคารกรุงศรี 201 – 4 – 21830 - 4</li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-xs-4">
               ชื่อ : <?=$this->data->course['firstname'].' '.$this->data->course['lastname']?>
            </div>
            <div class="col-xs-4">
                รหัส <?php  echo $paymentPrintID;?>
            </div>
            <div class="col-xs-4">
               Level : <?=$this->data->course['user_level']?>
            </div>
            
        </div>
        <div class="row">
            <div class="col-xs-4">
               เบอร์โทรศัพท์ : <?=$this->data->course['mobile']?>
            </div>
            <div class="col-xs-6">
               จำนวนเงิน : <?=number_format($this->data->course['price'],2)?>
            </div>
        </div>
        <div class="row" id="printButton">
                 <div class="col-lg-1 col-centered">
                <button type="button" 
                class="btn btn-success" 
                onclick="$('#printButton').hide();window.print();"
                href="printForm?registerID=<?=$this->data->course['register_id']?>">พิมพ์ฟอร์ม</button>
            </div>
        </div>
    </div>

</html>