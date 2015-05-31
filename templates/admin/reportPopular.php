<?php include('reportHeader.php');?>
<h2>รายงานหลักสูตรที่ได้รับความนิยม ประจำเดือน <?=$this->data->month?> ปี <?=$this->data->year?></h2>
<!--  <table class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>คอร์สเรียน</th>
            <th>ชนิดคอร์ส</th>
            <th>StartDate</th>
            <th>EndDate</th>
            <th>Level</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0;
            foreach ($this->data->course as $key => $course): 
                $total += $course['count'];
        ?>
            <tr>
                <td><?=$course['course_name']?></td>
                <td class="success"><?=$course['course_type']?></td>
                <td><?=Utility::toDisplayDate($course['start_date'])?></td>
                <td><?=Utility::toDisplayDate($course['end_date'])?></td>
                <td><?=$course['level']?></td>
                <td class="text-right"><?=number_format($course['count'],0)?></td>
               
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="text-center" colspan="5">สรุปจำนวน</th>
            <th class="text-right"><?=number_format($total,0)?></th>
        </tr>
    </tfoot>
</table> -->
<div id="chart_div"></div>
<?php include('reportFooter.php');
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
      // var jsonData = $.ajax({
      //     url: "reportIncomeData",
      //     dataType:"json",
      //     async: false
      //     }).responseText;
    var jsonData = <?php echo $this->data->jsonData;?>;
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
         chart.draw(data, {width: 1000, height: 600});
      }
    </script>
