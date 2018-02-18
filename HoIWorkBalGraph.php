<?php 
session_start();
if(!isset($_SESSION["hoilogin"]))
{
    header("Location: Logout.php");
}
$i=$_SESSION["institute"];
include("./php-wrapper/fusioncharts.php");
$hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "feedback1";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width:device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="footer_css/css/zerogrid.css">
        <link rel="stylesheet" href="footer_css/css/style.css">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <link  rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="js1/fusioncharts.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title>WORK AND LIFE</title>
        <script>
        function chang(){
            document.getElementById("1st").onclick = location.href = "HoIFacilitiesGraph.php";
        }
    </script>
    <script>
        function chang2(){
            document.getElementById("2nd").onclick = location.href = "HoITableReview.php";
        }
    </script>
</head>
<body style="background-color: #CF4747">
   
    <?php
    
        $count17=array(0,0,0,0);
        $value17=array("Excellent","Good","Satisfactory","Poor");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery17 = "SELECT q1 FROM  workbal where inst='$i'";
        $query17 = "SELECT q1 from workbal where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result17 = $dbhandle->query($strQuery17) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result17i = $dbhandle->query($query17) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result17i->num_rows>0)
        {
            while($row17=$result17->fetch_assoc()){
                if($row17["q1"]=="Excellent"){
                    $count17[0]+=1;
                }
                else if($row17["q1"]=="Good"){
                    $count17[1]+=1;
                }
                else if($row17["q1"]=="Satisfactory"){
                    $count17[2]+=1;
                }
                else if($row17["q1"]=="Poor"){
                    $count17[3]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result17) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData17 = array(
        	    "chart" => array(
                  "caption" => "How do you rate the work atmosphere in your department",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData17["data"] = array();

	// Push the data into the array
        	for($x17 = 0; $x17 < 4; $x17++) {
           	array_push($arrData17["data"], array(
              	"label" => $value17[$x17],
              	"value" => $count17[$x17]
              	)
           	);
        	}

        	

        	$jsonEncodedData17= json_encode($arrData17);
        	$columnChart17 = new FusionCharts("column2D", "myFirstChart17" , 600, 300, "chart-1", "json", $jsonEncodedData17);

        	// Render the chart
        	$columnChart17->render();

        	// Close the database connection
                //$dbhandle->close();
     	}
        ?>
    <?php
        $count18=array(0,0,0,0,0,0,0,0,0);
        $value18=array("Less than 11 hours","11-20 hours","21-20 hours","31-40 hours","41-50 hours","51-60 hours","61-70 hours","71-80 hours","More than 80 hours");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery18 = "SELECT q2 FROM workbal where inst='$i'";
        $query18 = "SELECT q2 from workbal where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result18 = $dbhandle->query($strQuery18) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result18i = $dbhandle->query($query18) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result18i->num_rows>0)
        {
            while($row18=$result18i->fetch_assoc()){
                if($row18["q2"]=="Less than 11 hours"){
                    $count18[0]+=1;
                }
                else if($row18["q2"]=="11-20 hours"){
                    $count18[1]+=1;
                }
                else if($row18["q2"]=="21-20 hours"){
                    $count18[2]+=1;
                }
                else if($row18["q2"]=="31-40 hours"){
                    $count18[3]+=1;
                }
                else if($row18["q2"]=="41-50 hours"){
                    $count18[4]+=1;
                }
                else if($row18["q2"]=="51-60 hours"){
                    $count18[5]+=1;
                }
                else if($row18["q2"]=="61-70 hours"){
                    $count18[6]+=1;
                }
                else if($row18["q2"]=="71-80 hours"){
                    $count18[7]+=1;
                }
                else if($row18["q2"]=="More than 80 hours"){
                    $count18[8]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result18) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData18 = array(
        	    "chart" => array(
                  "caption" => "How many hours do you put in for research work per week",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData18["data"] = array();

	// Push the data into the array
        	for($x18 = 0; $x18 < 9; $x18++) {
           	array_push($arrData18["data"], array(
              	"label" => $value18[$x18],
              	"value" => $count18[$x18]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData18 = json_encode($arrData18);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart18 = new FusionCharts("column2D", "myFirstChart18" , 600, 300, "chart-2", "json", $jsonEncodedData18);

        	// Render the chart
        	$columnChart18->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
    
        $count20=array(0,0);
        $value20=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery20 = "SELECT q3 FROM workbal where inst='$i'";
        $query20 = "SELECT q3 from workbal where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result20 = $dbhandle->query($strQuery20) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result20i = $dbhandle->query($query20) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result20i->num_rows>0)
        {
            while($row20=$result20->fetch_assoc()){
                if($row20["q3"]=="Yes"){
                    $count20[0]+=1;
                }
                else if($row20["q3"]=="No"){
                    $count20[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result20) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData20 = array(
        	    "chart" => array(
                  "caption" => "Are you able to balance your personal life and research work",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData20["data"] = array();

	// Push the data into the array
        	for($x20 = 0; $x20 < 2; $x20++) {
           	array_push($arrData20["data"], array(
              	"label" => $value20[$x20],
              	"value" => $count20[$x20]
              	)
           	);
        	}
        	$jsonEncodedData20 = json_encode($arrData20);
        	$columnChart20 = new FusionCharts("column2D", "myFirstChart20" , 600, 300, "chart-3", "json", $jsonEncodedData20);
        	// Render the chart
        	$columnChart20->render();
        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count26=array(0,0,0,0,0,0,0);
        $value26=array("Learning what career possibilities exist","Finding research careers within academia","Finding research careers within industry","Finding research careers within government","Finding research careers with charity/non-profit organisations","Finding non-research careers that use your skills","Others");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery26 = "SELECT * FROM workbal where inst='$i'";
        $query26 = "SELECT * from workbal where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result26 = $dbhandle->query($strQuery26) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result26i = $dbhandle->query($query26) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result26i->num_rows>0)
        {
            while($row26=$result26->fetch_assoc()){
                if($row26["q4"]=="Learning what career possibilities exist"){
                    $count26[0]+=1;
                }
                if($row26["q5"]=="Finding research careers within academia"){
                    $count26[1]+=1;
                }
                if($row26["q6"]=="Finding research careers within industry"){
                    $count26[2]+=1;
                }
                if($row26["q7"]=="Finding research careers within government"){
                    $count26[3]+=1;
                }
                if($row26["q8"]=="Finding research careers with charity/non-profit organisations"){
                    $count26[4]+=1;
                }
                if($row26["q9"]=="Finding non-research careers that use your skills"){
                    $count26[5]+=1;
                }
                if($row26["q10"]=="Others"){
                    $count26[6]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result26) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData26 = array(
        	    "chart" => array(
                  "caption" => "Which of the following would you say is the most difficult for PhD's in your discipline",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData26["data"] = array();

	// Push the data into the array
        	for($x26 = 0; $x26 < 7; $x26++) {
           	array_push($arrData26["data"], array(
              	"label" => $value26[$x26],
              	"value" => $count26[$x26]
              	)
           	);
        	}
        	$jsonEncodedData26 = json_encode($arrData26);
        	$columnChart26 = new FusionCharts("column2D", "myFirstChart26" , 600, 400, "chart-4", "json", $jsonEncodedData26);
        	// Render the chart
        	$columnChart26->render();
        	// Close the database connection
        	$dbhandle->close();
     	}
        ?>
   <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
            <ul style="list-style-type: none">
             <li class="navbar-brand"><img src="images/mahe.png" style="height: 43px;width: 250px; background-color: white; margin-left: -110px;margin-top: -10px;"></li>
            <li class="navbar-brand" style="padding-left: 320px"></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            
             <li style="margin-top: 10px;margin-right: 50px;">
                <button class="btn btn-success" onclick="chang()" id="1st">Graph View</button>
                <button class="btn" id="2nd" onclick="chang2()">Student View</button>
            </li>
            <li><a href="Logout.php">LOGOUT</a></li>
        </ul>
    </div>
</nav>
   <div class="container" style="position: relative;">
        <div id="mySidenav" class="sidenav" style="width:25%;">
            <a class="btn" href="HoIFacilitiesGraph.php" style="background-color: #C21E17; height: 96px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn " href="HoICourseGraph.php" style="background-color: #A11913; height: 96px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn " href="HoIProgressGraph.php" style="background-color: #861510; height: 96px; padding-top: 30px;" >PROGRESS</a>
            <a class="btn " href="HoIGuidanceGraph.php"style="background-color: #670F0B; height: 96px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn active" href="HoIWorkBalGraph.php" style="background-color: #FF8A65 ;height: 96px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 100px;  height :480px;">
            <div style="margin-top: 25px;">
                <div style="margin-left: 130px" id="chart-1"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-2"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-3"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-4"><!-- Fusion Charts will render here--></div><br>
                <ul class="pager">
                    <li class="previous"><a href="HoIGuidanceGraph.php">Previous</a></li>
                </ul>
        </div>
            </div>
   <footer >
       <div style=" position: fixed;height: 30px;background-color: black;bottom: 0px;left: 0px;right: 0px;margin-bottom: 0px;">
           <center style="color: whitesmoke;">Designed and Developed by Information and Communication Technology Department.</center>
       </div>
</footer>
   </div>
</body>
</html>