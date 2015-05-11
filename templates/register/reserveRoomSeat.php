<?php include('/../webs/header.php'); ?>
    <?php if($this->data->thisClassIsFull):?>
        <div class="alert alert-danger" role="alert">มีนักเรียนทำการจองเต็มแล้ว</div>
    <?php else : ?>
    <h2>จองที่นั่งเรียน</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ที่นั่ง</th>
                <?php foreach ($this->data->room[1] as $columnID => $column):  ?>
                    <th><?=$column['columnName']?></th>
                <?php endforeach  ;?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($this->data->room as $rowID => $row) : ?>
            <tr>
                <td><?=$row[$rowID]['rowName']?></td>
                <?php foreach ($row as $columnID => $column) :?>
                    <td>
                        <?php if(!empty($column['booking_id']) ):?>
                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                        <?php  else : ?>
                            <a onclick="confirm('ยืนยันการจองที่นั่ง')" href="reserveSeatRoom?seatID=<?=$column['room_seat_id']?>&scheduleID=<?=$column['schedule_id']?>">
                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            </a>
                        <?php endif  ; ?>
                    </td>
                <?php endforeach  ; ?>
            </tr>
        <?php endforeach  ;?>
        </tbody>
    </table>
    <?php endif;?>
<?php include('/../webs/footer.php'); ?>