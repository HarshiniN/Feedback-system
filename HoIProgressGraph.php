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
        <title>PROGRESS</title>
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
        $count22=array(0,0);
        $value22=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery22 = "SELECT q1 FROM progress where inst='$i' ";
        $query22 = "SELECT q1 from progress where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result22 = $dbhandle->query($strQuery22) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result22i = $dbhandle->query($query22) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result22i->num_rows>0)
        {
            while($row22=$result22->fetch_assoc()){
                if($row22["q1"]=="Yes"){
                    $count22[0]+=1;
                }
                else if($row22["q1"]=="No"){
                    $count22[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result22) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData22 = array(
        	    "chart" => array(
                  "caption" => "Have you started writing your thesis",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData22["data"] = array();

	// Push the data into the array
        	for($x22 = 0; $x22 < 2; $x22++) {
           	array_push($arrData22["data"], array(
              	"label" => $value22[$x22],
              	"value" => $count22[$x22]
              	)
           	);
        	}
        	$jsonEncodedData22 = json_encode($arrData22);
        	$columnChart22 = new FusionCharts("column2D", "myFirstChart22" , 600, 300, "chart-1", "json", $jsonEncodedData22);
        	// Render the chart
        	$columnChart22->render();
        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
     <?php
        $count25=array(0,0,0,0,0);
        $value25=array("Excellent","Good","Satisfactory","Poor","Not Applicable");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery25 = "SELECT q2 FROM progress where inst='$i'";
        $query25 = "SELECT q2 from progress where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result25 = $dbhandle->query($strQuery25) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result25i = $dbhandle->query($query25) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result25i->num_rows>0)
        {
            while($row25=$result25->fetch_assoc()){
                if($row25["q2"]=="Excellent"){
                    $count25[0]+=1;
                }
                else if($row25["q2"]=="Good"){
                    $count25[1]+=1;
                }
                else if($row25["q2"]=="Satisfactory"){
                    $count25[2]+=1;
                }
                else if($row25["q2"]=="Poor"){
                    $count25[3]+=1;
                }
                else if($row25["q2"]=="Not Applicable"){
                    $count25[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result25) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData25 = array(
        	    "chart" => array(
                  "caption" => "How do you rate the PhD program overall",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData25["data"] = array();

	// Push the data into the array
        	for($x25 = 0; $x25 < 5; $x25++) {
           	array_push($arrData25["data"], array(
              	"label" => $value25[$x25],
              	"value" => $count25[$x25]
              	)
           	);
        	}
        	$jsonEncodedData25 = json_encode($arrData25);
                $columnChart25 = new FusionCharts("column2D", "myFirstChart25" , 600, 300, "chart-2", "json", $jsonEncodedData25);
        	// Render the chart
        	$columnChart25->render();

        	// Close the database connection
        	$dbhandle->close();
     	}
        ?>
   <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
            <ul style="list-style-type: none">
             <li class="navbar-brand"><img src="images/mahe.png" style="height: 38px;width: 250px; background-color: white; margin-left: -110px;margin-top: -10px;"></li>
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
            <a class="btn active"  href="HoIProgressGraph.php" style="background-color: #FF8A65; height: 96px; padding-top: 30px;" >PROGRESS</a>
            <a href="HoIGuidanceGraph.php" class="btn " style="background-color: #861510; height: 96px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn " href="HoIWorkBalGraph.php" style="background-color: #670F0B ;height: 96px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 100px; ;  height :480px;">
            <div style="margin-top: 25px;">
                <div style="margin-left: 130px" id="chart-1"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-2"><!-- Fusion Charts will render here--></div><br>
                <ul class="pager">
                    <li class="previous"><a href="HoICourseGraph.php">Previous</a></li>
                    <li class="next"><a href="HoIGuidanceGraph.php">Next</a></li>
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