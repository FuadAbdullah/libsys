<!--<?php 

include('conn1.php');

//$_sql="SELECT * FROM person_t";

//mysqli_close($conn1);

$_sql= "SELECT
          CASE 
            WHEN p_age BETWEEN 30 AND 31 THEN '30-31'
            WHEN p_age BETWEEN 32 AND 33 THEN '32-33'
            WHEN p_age BETWEEN 34 AND 35  THEN '34-35'
            WHEN p_age BETWEEN 36 AND 37  THEN '36-37'
            WHEN p_age BETWEEN 38 AND 39  THEN '38-39'
            WHEN p_age = 40 THEN '40'
          END AS age_range,
          COUNT(*) AS age_count
          FROM person_t
        GROUP BY age_range
        ORDER BY age_range";

$_query = mysqli_query($conn1, $_sql);

$_numrows = mysqli_num_rows($_query);

if ($_numrows <= 0)
{
  echo "<script>alert('Failed to retrieve any records from the database!');</script>";
  die("<script>window.location.hostname = 'www.google.com'</script>");
}

$_counter = 0;


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Age', 'Number of Person'],
          
          <?php
          while ($_rows = mysqli_fetch_assoc($_query))
          {
            $_age_range = $_rows['age_range'];
            $_age_list = $_rows['age_count'];

            if(++$_counter == $_numrows)
            {
              echo "['" . $_age_range . "', " . $_age_list . "]";
            }
            else
            {
              echo "['" . $_age_range . "', " . $_age_list . "],";
            }
            
          }
          ?>

          /*['30-31', <?php echo '18'; ?>],
          ['32-33', <?php echo '28'; ?>],
          ['34-35', <?php echo '19'; ?>],
          ['36-37', <?php echo '14'; ?>],
          ['38-39', <?php echo '14'; ?>],
          ['40', <?php echo '7'; ?>]*/

        ]);

        var options = {
          title: 'Number of People between the Age of 30 - 40'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>-->

<!--<?php //SECOND METHOD

include('conn1.php');

//$_sql="SELECT * FROM person_t";

//mysqli_close($conn1);

$_sql= "SELECT
          CASE 
            WHEN p_age BETWEEN 30 AND 31 THEN '30-31'
            WHEN p_age BETWEEN 32 AND 33 THEN '32-33'
            WHEN p_age BETWEEN 34 AND 35  THEN '34-35'
            WHEN p_age BETWEEN 36 AND 37  THEN '36-37'
            WHEN p_age BETWEEN 38 AND 39  THEN '38-39'
            WHEN p_age = 40 THEN '40'
          END AS age_range,
          COUNT(*) AS age_count
          FROM person_t
        GROUP BY age_range
        ORDER BY age_range";

$_query = mysqli_query($conn1, $_sql);

$_numrows = mysqli_num_rows($_query);

if ($_numrows <= 0)
{
  echo "<script>alert('Failed to retrieve any records from the database!');</script>";
  die("<script>window.location.hostname = 'www.google.com'</script>");
}

$_counter = 0;
$_age_range = array();
$_age_list = array();

while($_rows = mysqli_fetch_assoc($_query))
{
  $_age_range[] = $_rows['age_range'];
  $_age_list[] = $_rows['age_count'];
}


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Age', 'Number of Person'],

          <?php

          while($_counter < $_numrows)
          {
            if(++$_counter == $_numrows)
            {
              echo "['" . $_age_range[$_counter - 1] . "', " . $_age_list[$_counter - 1] . "]";
            }
            else
            {
              echo "['" . $_age_range[$_counter - 1] . "', " . $_age_list[$_counter - 1] . "],";
            }
            
          }

          ?>
          /*
          ['30-31', <?php echo '18'; ?>],
          ['32-33', <?php echo '28'; ?>],
          ['34-35', <?php echo '19'; ?>],
          ['36-37', <?php echo '14'; ?>],
          ['38-39', <?php echo '14'; ?>],
          ['40', <?php echo '7'; ?>]*/

        ]);

        var options = {
          title: 'Number of People between the Age of 30 - 40'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>-->

<!--pending bar chart

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawBasic);

      function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('timeofday', 'Time of Day');
            data.addColumn('number', 'Motivation Level');

            data.addRows([
              [{v: [8, 0, 0], f: '8 am'}, 1],
              [{v: [9, 0, 0], f: '9 am'}, 2],
              [{v: [10, 0, 0], f:'10 am'}, 3],
              [{v: [11, 0, 0], f: '11 am'}, 4],
              [{v: [12, 0, 0], f: '12 pm'}, 5],
              [{v: [13, 0, 0], f: '1 pm'}, 6],
              [{v: [14, 0, 0], f: '2 pm'}, 7],
              [{v: [15, 0, 0], f: '3 pm'}, 8],
              [{v: [16, 0, 0], f: '4 pm'}, 9],
              [{v: [17, 0, 0], f: '5 pm'}, 10],
            ]);

            var options = {
              title: 'Motivation Level Throughout the Day',
              hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                  min: [7, 30, 0],
                  max: [17, 30, 0]
                }
              },
              vAxis: {
                title: 'Rating (scale of 1-10)'
              }
            };

            var chart = new google.visualization.ColumnChart(
              document.getElementById('chart_div'));

            chart.draw(data, options);
          }

    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>-->
