<?php 
session_start();
if(!isset($_SESSION["drlogin"]))
{
    header("Location: Logout.php");
}
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
        <title>GUIDANCE RECEIVED</title>
        <script>
        function chang(){
            document.getElementById("1st").onclick = location.href = "DRFacilitiesGraph.php";
        }
    </script>
    <script>
        function chang2(){
            document.getElementById("2nd").onclick = location.href = "DRTableReview.php";
        }
    </script>
</head>
<body style="background-color: #CF4747">
   
    <?php
    
        $count33=array(0,0);
        $value33=array("PartTime","FullTime");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery33 = "SELECT q10 FROM course";
        $query33 = "SELECT q10 from course";
        
     	// Execute the query, or else return the error message.
     	$result33 = $dbhandle->query($strQuery33) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result33i = $dbhandle->query($query33) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result33i->num_rows>0)
        {
            while($row33=$result33->fetch_assoc()){
                if($row33["q10"]=="PartTime"){
                    $count33[0]+=1;
                }
                else if($row33["q10"]=="FullTime"){
                    $count33[1]+=1;
                } 
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result33) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData33 = array(
        	    "chart" => array(
                  "caption" => "What kind of course are you currently enrolled in",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData33["data"] = array();

	// Push the data into the array
        	for($x33 = 0; $x33 < 2; $x33++) {
           	array_push($arrData33["data"], array(
              	"label" => $value33[$x33],
              	"value" => $count33[$x33]
              	)
           	);
        	}

        	

        	$jsonEncodedData33 = json_encode($arrData33);
        	$columnChart33 = new FusionCharts("column2D", "myFirstChart33" , 600, 300, "chart-1", "json", $jsonEncodedData33);

        	// Render the chart
        	$columnChart33->render();

        	// Close the database connection
                //$dbhandle->close();
     	}
        ?>
    <?php
        $count34=array(0,0,0,0);
        $value34=array("First 3 months Full Time","Within First 6 months","2-3 hours everyday","Within One year");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery34 = "SELECT q11 FROM course ";
        $query34 = "SELECT q11 from course";
        
     	// Execute the query, or else return the error message.
     	$result34 = $dbhandle->query($strQuery34) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result34i = $dbhandle->query($query34) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result34i->num_rows>0)
        {
            while($row34=$result34->fetch_assoc()){
                if($row34["q11"]=="First 3 months Full Time"){
                    $count34[0]+=1;
                }
                else if($row34["q11"]=="Within First 6 months"){
                    $count34[1]+=1;
                }
                else if($row34["q11"]=="2-3 hours everyday"){
                    $count34[2]+=1;
                }
                else if($row34["q11"]=="Within One year"){
                    $count34[3]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result34) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData34 = array(
        	    "chart" => array(
                  "caption" => "What do you prefer",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData34["data"] = array();

	// Push the data into the array
        	for($x34 = 0; $x34 < 4; $x34++) {
           	array_push($arrData34["data"], array(
              	"label" => $value34[$x34],
              	"value" => $count34[$x34]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData34 = json_encode($arrData34);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart34= new FusionCharts("column2D", "myFirstChart34" , 600, 300, "chart-2", "json", $jsonEncodedData34);

        	// Render the chart
        	$columnChart34->render();

        	// Close the database connection
        	$dbhandle->close();
     	}
        ?>
   <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
            <ul style="list-style-type: none">
             <li class="navbar-brand"><img src="mahe.png" style="height: 43px;width: 250px; background-color: white; margin-left: -110px;margin-top: -10px;"></li>
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
            <a class="btn" href="DRFacilitiesGraph.php" style="background-color: #C21E17; height: 96px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn active" href="#" style="background-color: #FF8A65; height: 96px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn " href="DRProgressGraph.php" style="background-color: #A11913; height: 96px; padding-top: 30px;" >PROGRESS</a>
            <a href="DRGuidanceGraph.php" class="btn " style="background-color: #861510; height: 96px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn " href="DRWorkBalGraph.php" style="background-color: #670F0B ;height: 96px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 100px; ;  height :480px;">
            <div style="margin-top: 25px;">
                <div style="margin-left: 130px" id="chart-1"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-2"><!-- Fusion Charts will render here--></div><br>
                <ul class="pager">
                    <li class="previous"><a href="DRFacilitiesGraph.php">Previous</a></li>
                    <li class="next"><a href="DRProgressGraph.php">Next</a></li>
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