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
        <title>FACILITIES AVAILABLE</title>
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
    
        $count1=array(0,0,0,0,0);
        $value1=array("Excellent","Good","Satisfactory","Poor","Not Applicable");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery1 = "SELECT q1 FROM  facilities where inst='$i'";
        $query1 = "SELECT q1 from facilities  where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result1 = $dbhandle->query($strQuery1) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result1i = $dbhandle->query($query1) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result1i->num_rows>0)
        {
            while($row1=$result1->fetch_assoc()){
                if($row1["q1"]=="Excellent"){
                    $count1[0]+=1;
                }
                else if($row1["q1"]=="Good"){
                    $count1[1]+=1;
                }
                else if($row1["q1"]=="Satisfactory"){
                    $count1[2]+=1;
                }
                else if($row1["q1"]=="Poor"){
                    $count1[3]+=1;
                }
                else if($row1["q1"]=="Not Applicable"){
                    $count1[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result1) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData1 = array(
        	    "chart" => array(
                  "caption" => "How do you rate the quality of Leave facilities and services available in the campus",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData1["data"] = array();

	// Push the data into the array
        	for($x1 = 0; $x1 < 5; $x1++) {
           	array_push($arrData1["data"], array(
              	"label" => $value1[$x1],
              	"value" => $count1[$x1]
              	)
           	);
        	}

        	

        	$jsonEncodedData1 = json_encode($arrData1);
        	$columnChart1 = new FusionCharts("column2D", "myFirstChart1" , 600, 300, "chart-1", "json", $jsonEncodedData1);

        	// Render the chart
        	$columnChart1->render();

        	// Close the database connection
                //$dbhandle->close();
     	}
        ?>
    <?php
        $count2=array(0,0,0,0,0);
        $value2=array("Excellent","Good","Satisfactory","Poor","Not Applicable");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery2 = "SELECT q2 FROM facilities  where inst='$i'";
        $query2 = "SELECT q2 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result2 = $dbhandle->query($strQuery2) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result2i = $dbhandle->query($query2) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result2i->num_rows>0)
        {
            while($row2=$result2->fetch_assoc()){
                if($row2["q2"]=="Excellent"){
                    $count2[0]+=1;
                }
                else if($row2["q2"]=="Good"){
                    $count2[1]+=1;
                }
                else if($row2["q2"]=="Satisfactory"){
                    $count2[2]+=1;
                }
                else if($row2["q2"]=="Poor"){
                    $count2[3]+=1;
                }
                else if($row2["q2"]=="Not Applicable"){
                    $count2[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result2) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData2 = array(
        	    "chart" => array(
                  "caption" => "How do you rate the quality of Healthcare facilities and services available in the campus",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData2["data"] = array();

	// Push the data into the array
        	for($x10 = 0; $x10 < 5; $x10++) {
           	array_push($arrData2["data"], array(
              	"label" => $value2[$x10],
              	"value" => $count2[$x10]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData2 = json_encode($arrData2);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart2 = new FusionCharts("column2D", "myFirstChart2" , 600, 300, "chart-2", "json", $jsonEncodedData2);

        	// Render the chart
        	$columnChart2->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count11=array(0,0,0,0,0);
        $value11=array("Excellent","Good","Satisfactory","Poor","Not Applicable");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery11 = "SELECT q3 FROM facilities  where inst='$i'";
        $query11 = "SELECT q3 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result11 = $dbhandle->query($strQuery11) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result11i = $dbhandle->query($query11) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result11i->num_rows>0)
        {
            while($row11=$result11->fetch_assoc()){
                if($row11["q3"]=="Excellent"){
                    $count11[0]+=1;
                }
                else if($row11["q3"]=="Good"){
                    $count11[1]+=1;
                }
                else if($row11["q3"]=="Satisfactory"){
                    $count11[2]+=1;
                }
                else if($row11["q3"]=="Poor"){
                    $count11[3]+=1;
                }
                else if($row11["q3"]=="Not Applicable"){
                    $count11[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result11) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData11 = array(
        	    "chart" => array(
                  "caption" => "How do you rate the quality of Infrastructure facilities and services available in the campus",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData11["data"] = array();

	// Push the data into the array
        	for($x11 = 0; $x11 < 5; $x11++) {
           	array_push($arrData11["data"], array(
              	"label" => $value11[$x11],
              	"value" => $count11[$x11]
              	)
           	);
        	}
                $jsonEncodedData11 = json_encode($arrData11);
        	$columnChart11 = new FusionCharts("column2D", "myFirstChart11" , 600, 300, "chart-3", "json", $jsonEncodedData11);
        	// Render the chart
        	$columnChart11->render();
        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
    
        $count12=array(0,0,0,0,0);
        $value12=array("Excellent","Good","Satisfactory","Poor","Not Applicable");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery12 = "SELECT q4 FROM facilities where inst='$i' ";
        $query12 = "SELECT q4 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result12 = $dbhandle->query($strQuery12) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result12i = $dbhandle->query($query12) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result12i->num_rows>0)
        {
            while($row12=$result12->fetch_assoc()){
                if($row12["q4"]=="Excellent"){
                    $count12[0]+=1;
                }
                else if($row12["q4"]=="Good"){
                    $count12[1]+=1;
                }
                else if($row12["q4"]=="Satisfactory"){
                    $count12[2]+=1;
                }
                else if($row12["q4"]=="Poor"){
                    $count12[3]+=1;
                }
                else if($row12["q4"]=="Not Applicable"){
                    $count12[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result12) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData12 = array(
        	    "chart" => array(
                  "caption" => "How do you rate the quality of Resource facilities and services available in the campus",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData12["data"] = array();

	// Push the data into the array
        	for($x12 = 0; $x12 < 5; $x12++) {
           	array_push($arrData12["data"], array(
              	"label" => $value12[$x12],
              	"value" => $count12[$x12]
              	)
           	);
        	}

        	

        	$jsonEncodedData12 = json_encode($arrData12);

	

        	$columnChart12 = new FusionCharts("column2D", "myFirstChart12" , 600, 300, "chart-4", "json", $jsonEncodedData12);

        	// Render the chart
        	$columnChart12->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
    
        $count13=array(0,0);
        $value13=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery13 = "SELECT q5 FROM facilities where inst='$i' ";
        $query13 = "SELECT q5 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result13 = $dbhandle->query($strQuery13) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result13i = $dbhandle->query($query13) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result13i->num_rows>0)
        {
            while($row13=$result13->fetch_assoc()){
                if($row13["q5"]=="Yes"){
                    $count13[0]+=1;
                }
                else if($row13["q5"]=="No"){
                    $count13[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result13) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData13 = array(
        	    "chart" => array(
                  "caption" => "Have you applied for funds from the institute/department in the last 6 months",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData13["data"] = array();

	// Push the data into the array
        	for($x13 = 0; $x13 < 2; $x13++) {
           	array_push($arrData13["data"], array(
              	"label" => $value13[$x13],
              	"value" => $count13[$x13]
              	)
           	);
        	}
        	$jsonEncodedData13 = json_encode($arrData13);
        	$columnChart13 = new FusionCharts("column2D", "myFirstChart13" , 600, 300, "chart-5", "json", $jsonEncodedData13);
        	// Render the chart
        	$columnChart13->render();
        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count14=array(0,0);
        $value14=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery14 = "SELECT q6 FROM facilities  where inst='$i'";
        $query14 = "SELECT q6 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result14 = $dbhandle->query($strQuery14) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result14i = $dbhandle->query($query14) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result14i->num_rows>0)
        {
            while($row14=$result14i->fetch_assoc()){
                if($row14["q6"]=="Yes"){
                    $count14[0]+=1;
                }
                else if($row14["q6"]=="No"){
                    $count14[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result14) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData14 = array(
        	    "chart" => array(
                  "caption" => "Have you initiated research grant submission in the last 6 months",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData14["data"] = array();

	// Push the data into the array
        	for($x14 = 0; $x14 < 2; $x14++) {
           	array_push($arrData14["data"], array(
              	"label" => $value14[$x14],
              	"value" => $count14[$x14]
              	)
           	);
        	}

        	

        	$jsonEncodedData14 = json_encode($arrData14);

	

        	$columnChart14 = new FusionCharts("column2D", "myFirstChart14" , 600, 300, "chart-6", "json", $jsonEncodedData14);

        	// Render the chart
        	$columnChart14->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count15=array(0,0);
        $value15=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery15 = "SELECT q7 FROM facilities where inst='$i' ";
        $query15 = "SELECT q7 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result15 = $dbhandle->query($strQuery15) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result15i = $dbhandle->query($query15) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result15i->num_rows>0)
        {
            while($row15=$result15i->fetch_assoc()){
                if($row15["q7"]=="Yes"){
                    $count15[0]+=1;
                }
                else if($row15["q7"]=="No"){
                    $count15[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result15) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData15 = array(
        	    "chart" => array(
                  "caption" => "Have you availed facilities from the University to attend workshop/publish research work",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData15["data"] = array();

	// Push the data into the array
        	for($x15 = 0; $x15 < 2; $x15++) {
           	array_push($arrData15["data"], array(
              	"label" => $value15[$x15],
              	"value" => $count15[$x15]
              	)
           	);
        	}
        	$jsonEncodedData15 = json_encode($arrData15);
                $columnChart15 = new FusionCharts("column2D", "myFirstChart15" , 600, 300, "chart-7", "json", $jsonEncodedData15);
        	// Render the chart
        	$columnChart15->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count16=array(0,0);
        $value16=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery16 = "SELECT q8 FROM facilities where inst='$i' ";
        $query16 = "SELECT q8 from facilities where inst='$i'";
        
     	// Execute the query, or else return the error message.
     	$result16 = $dbhandle->query($strQuery16) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result16i = $dbhandle->query($query16) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result16i->num_rows>0)
        {
            while($row16=$result16i->fetch_assoc()){
                if($row16["q8"]=="Yes"){
                    $count16[0]+=1;
                }
                else if($row16["q8"]=="No"){
                    $count16[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result16) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData16 = array(
        	    "chart" => array(
                  "caption" => "Would you recommend your guide to other candidates?(For final year only)",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData16["data"] = array();

	// Push the data into the array
        	for($x16 = 0; $x16 < 2; $x16++) {
           	array_push($arrData16["data"], array(
              	"label" => $value16[$x16],
              	"value" => $count16[$x16]
              	)
           	);
        	}
        	$jsonEncodedData16 = json_encode($arrData16);
        	$columnChart16 = new FusionCharts("column2D", "myFirstChart16" , 600, 300, "chart-8", "json", $jsonEncodedData16);
        	// Render the chart
        	$columnChart16->render();
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
                <button class="btn " id="2nd" onclick="chang2()">Student View</button>
            </li>
            <li><a href="Logout.php">LOGOUT</a></li>
        </ul>
    </div>
</nav>
   <div class="container" style="position: relative;">
        <div id="mySidenav" class="sidenav" style="width:25%;">
            <a class="btn active" href="HoIFacilitiesGraph.php" style="background-color: #FF8A65; height: 96px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn " href="HoICourseGraph.php" style="background-color: #C21E17; height: 96px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn " href="HoIProgressGraph.php" style="background-color: #A11913; height: 96px; padding-top: 30px;" >PROGRESS</a>
            <a href="HoIGuidanceGraph.php" class="btn " style="background-color: #861510; height: 96px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn " href="HoIWorkBalGraph.php" style="background-color: #670F0B ;height: 96px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 100px;  height :480px;">
            <div style="margin-top: 25px;">
                <div style="margin-left: 130px" id="chart-1"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-2"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-3"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-4"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-5"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-6"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-7"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-8"><!-- Fusion Charts will render here--></div><br>
                <ul class="pager">
                    <li class="next"><a href="HoICourseGraph.php">Next</a></li>
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