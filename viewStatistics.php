<?php 

include('conn1.php');

//To eliminate startup no POST value error
//Set the value to default
if (!isset($_POST['optionA']) && !isset($_POST['optionB']) && !isset($_POST['optionC']))
{
    $_POST['optionA'] = 'genre';
    $_POST['optionB'] = 'genre';
    $_POST['optionC'] = 'genre';
}

//The selector used to switch between variables on chart view
$_getOptionA = $_POST['optionA'];
$_getOptionB = $_POST['optionB'];
$_getOptionC = $_POST['optionC'];
//echo $_getOptionX; this is for debugging purposes

//PHP file to include all functions
require('funcblock.php');

//Switch module to swap between different variables to be displayed on chart
//Core module of this feature
require('filterfuncA.php');
require('filterfuncB.php');
require('filterfuncC.php');

$_counterA = 0;
$_counterB = 0;
$_counterC = 0;

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChartView1);
      google.charts.setOnLoadCallback(drawChartView2);
      google.charts.setOnLoadCallback(drawChartView3);

      function drawChartView1() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', '<?php echo $_xaxisA; ?>'); //Adding column for x-axis with string type
        data.addColumn('number', '<?php echo $_yaxisA; ?>'); //Adding column for y-axis with number type
        data.addColumn( { type: 'string', role: 'style'} )
        data.addRows([
  
          <?php
          
          require('chpopfuncA.php');

          ?> 
      ]);

      //For Bar 
      var bar_options = {
        width: 596,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
        title: '<?php echo $_titleA; ?>',
      };

      //Load Bar
      var bar_chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      bar_chart.draw(data, bar_options);
      };

      function drawChartView2() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', '<?php echo $_xaxisB; ?>'); //Adding column for x-axis with string type
        data.addColumn('number', '<?php echo $_yaxisB; ?>'); //Adding column for y-axis with number type
        data.addColumn( { type: 'string', role: 'style'} )
        data.addRows([
  
          <?php
          
          require('chpopfuncB.php');

          ?> 
      ]);

      //For Column
      var col_options = {
        width: 596,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
        title: '<?php echo $_titleB; ?>',
      };

      //Load Column
      var col_chart = new google.visualization.ColumnChart(document.getElementById("colchart_values"));
      col_chart.draw(data, col_options);

      };

      function drawChartView3() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', '<?php echo $_xaxisC; ?>'); //Adding column for x-axis with string type
        data.addColumn('number', '<?php echo $_yaxisC; ?>'); //Adding column for y-axis with number type
        data.addColumn( { type: 'string', role: 'style'} )
        data.addRows([
  
          <?php
          
          require('chpopfuncC.php');

          ?> 
      ]);

      //For Pie
       var pie_options = {
        width: 596,
        height: 400,
        groupWidth: "20%",
        legend: { position: "right" },
        title: '<?php echo $_titleC; ?>',
        //is3D: 'true',
      };

      //Load Pie
      var pie_chart = new google.visualization.PieChart(document.getElementById("piechart_values"));
      pie_chart.draw(data, pie_options);

      };

    </script>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="contact">
    <form method="post" class="php-email-form" name="chartForm"> <!--don't use action if it's referring to the same page son-->
      <div class="row" style="margin-left: 25%;">
      <div class="col-lg-6">
      <div class="form-row">
      <div class="form-group">
        <select style="width: 300px;" name="optionA" class="form-control" onchange="chartForm.submit()">
          <option value="<?php echo $_getOptionA; ?>" selected=""><?php echo $_filterdispA; ?></option>
          <option disabled="">----------------------------------</option>
          <option value="genre">Genre</option>
          <option value="priority">Priority</option>
          <option disabled="">---------CLIENT----------</option>
          <option value="c_gender">Gender</option>
          <option value="c_dob">Date of Birth</option>
          <option value="c_state">State</option>
          <option disabled="">--------LIBRARIAN--------</option>
          <option value="l_gender">Gender</option>
          <option value="l_dob">Date of Birth</option>
          <option value="l_state">State</option>
          <option disabled="">----------ADMIN----------</option>
          <option value="a_gender">Gender</option>
          <option value="a_dob">Date of Birth</option>
          <option value="a_state">State</option>      
        </select>
      </div>
      </div>
      </div>
      </div>

    <div class="row" style="margin-left: 25%;">
    <div class="col-lg-6">
    <div class="form-row">
    <div class="form-group">
      <div id="barchart_values" style="box-shadow: 0 0 30px rgb(214 215 216 / 60%)"></div>
    </div>  
    </div>
    </div>
    </div>

    <div class="row" style="margin-left: 25%;" onchange="chartForm.submit()">
    <div class="col-lg-6">
    <div class="form-row">
    <div class="form-group">
      <select style="width: 300px;" name="optionB" class="form-control">
        <option value="<?php echo $_getOptionB; ?>" selected=""><?php echo $_filterdispB; ?></option>
        <option disabled="">----------------------------------</option>
        <option value="genre">Genre</option>
        <option value="priority">Priority</option>
        <option disabled="">---------CLIENT----------</option>
        <option value="c_gender">Gender</option>
        <option value="c_dob">Date of Birth</option>
        <option value="c_state">State</option>
        <option disabled="">--------LIBRARIAN--------</option>
        <option value="l_gender">Gender</option>
        <option value="l_dob">Date of Birth</option>
        <option value="l_state">State</option>
        <option disabled="">----------ADMIN----------</option>
        <option value="a_gender">Gender</option>
        <option value="a_dob">Date of Birth</option>
        <option value="a_state">State</option>      
      </select>
    </div>
    </div>
    </div>
    </div>
    
    <div class="row" style="margin-left: 25%;"> 
    <div class="col-lg-6">
    <div class="form-row">
    <div class="form-group">
      <div id="colchart_values" style="box-shadow: 0 0 30px rgb(214 215 216 / 60%)"></div>
    </div>  
    </div>
    </div>
    </div>

    <div class="row" style="margin-left: 25%;" onchange="chartForm.submit()">
    <div class="col-lg-6">
    <div class="form-row">
    <div class="form-group">
      <select style="width: 300px;" name="optionC" class="form-control">
        <option value="<?php echo $_getOptionC; ?>" selected=""><?php echo $_filterdispC; ?></option>
        <option disabled="">----------------------------------</option>
        <option value="genre">Genre</option>
        <option value="priority">Priority</option>
        <option disabled="">---------CLIENT----------</option>
        <option value="c_gender">Gender</option>
        <option value="c_dob">Date of Birth</option>
        <option value="c_state">State</option>
        <option disabled="">--------LIBRARIAN--------</option>
        <option value="l_gender">Gender</option>
        <option value="l_dob">Date of Birth</option>
        <option value="l_state">State</option>
        <option disabled="">----------ADMIN----------</option>
        <option value="a_gender">Gender</option>
        <option value="a_dob">Date of Birth</option>
        <option value="a_state">State</option>      
      </select>
    </div>
    </div>
    </div>
    </div>

    <div class="row" style="margin-left: 25%;">
    <div class="col-lg-6">
    <div class="form-row">
    <div class="form-group">
      <div id="piechart_values" style="box-shadow: 0 0 30px rgb(214 215 216 / 60%)"></div>
    </div>  
    </div>
    </div>
    </div>
    </form>
    </div>
  </body>
</html>

<!-- REFERENCES

Stack Overflow, 2013. How can I submit a form using JavaScript?. [Online] 
Available at: https://stackoverflow.com/questions/9855656/how-can-i-submit-a-form-using-javascript
[Accessed 15 February 2021].

-->