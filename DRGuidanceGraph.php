<?php 
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
</head>
<body style="background-color: #CF4747">
   
    <?php
    
        $count=array(0,0,0,0,0);
        $value=array("Always Available","Available most of the time","Sometimes available","Rarely Available","Not available at all");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT q1 FROM guidance ";
        $query = "SELECT q1 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result1 = $dbhandle->query($query) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result1->num_rows>0)
        {
            while($row=$result1->fetch_assoc()){
                if($row["q1"]=="Always Available"){
                    $count[0]+=1;
                }
                else if($row["q1"]=="Available most of the time"){
                    $count[1]+=1;
                }
                else if($row["q1"]=="Sometimes available"){
                    $count[2]+=1;
                }
                else if($row["q1"]=="Rarely Available"){
                    $count[3]+=1;
                }
                else if($row["q1"]=="Not available at all"){
                    $count[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "To what extent is your guide available when you had queries/issues",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	for($x = 0; $x < 5; $x++) {
           	array_push($arrData["data"], array(
              	"label" => $value[$x],
              	"value" => $count[$x]
              	)
           	);
        	}

        	

        	$jsonEncodedData = json_encode($arrData);
        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
                //$dbhandle->close();
     	}
        ?>
    <?php
        $count2=array(0,0,0,0,0);
        $value2=array("Extremely useful","Very useful","Moderately useful","Rarely useful","Not useful at all");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery2 = "SELECT q2 FROM guidance ";
        $query2 = "SELECT q2 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result2 = $dbhandle->query($strQuery2) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result2i = $dbhandle->query($query2) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result2i->num_rows>0)
        {
            while($row2=$result2i->fetch_assoc()){
                if($row2["q2"]=="Extremely useful"){
                    $count2[0]+=1;
                }
                else if($row2["q2"]=="Very useful"){
                    $count2[1]+=1;
                }
                else if($row2["q2"]=="Moderately useful"){
                    $count2[2]+=1;
                }
                else if($row2["q2"]=="Rarely useful"){
                    $count2[3]+=1;
                }
                else if($row2["q2"]=="Not useful at all"){
                    $count2[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result2) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData2 = array(
        	    "chart" => array(
                  "caption" => "How useful is your guide's feedback",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData2["data"] = array();

	// Push the data into the array
        	for($x2 = 0; $x2 < 5; $x2++) {
           	array_push($arrData2["data"], array(
              	"label" => $value2[$x2],
              	"value" => $count2[$x2]
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
        $count3=array(0,0,0,0,0);
        $value3=array("Always on time","Mostly on time","Sometimes on time","Rarely on time","Not at all");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery3 = "SELECT q3 FROM guidance ";
        $query3 = "SELECT q3 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result3 = $dbhandle->query($strQuery3) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result3i = $dbhandle->query($query3) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result3i->num_rows>0)
        {
            while($row3=$result3i->fetch_assoc()){
                if($row3["q3"]=="Always on time"){
                    $count3[0]+=1;
                }
                else if($row3["q3"]=="Mostly on time"){
                    $count3[1]+=1;
                }
                else if($row3["q3"]=="Sometimes on time"){
                    $count3[2]+=1;
                }
                else if($row3["q3"]=="Rarely on time"){
                    $count3[3]+=1;
                }
                else if($row3["q3"]=="Not at all"){
                    $count3[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result3) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData3 = array(
        	    "chart" => array(
                  "caption" => "To what extent does your guide review the paper/report and presentation on time",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData3["data"] = array();

	// Push the data into the array
        	for($x3 = 0; $x3 < 5; $x3++) {
           	array_push($arrData3["data"], array(
              	"label" => $value3[$x3],
              	"value" => $count3[$x3]
              	)
           	);
        	}
                $jsonEncodedData3 = json_encode($arrData3);
        	$columnChart3 = new FusionCharts("column2D", "myFirstChart3" , 600, 300, "chart-3", "json", $jsonEncodedData3);
        	// Render the chart
        	$columnChart3->render();
        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
    
        $count4=array(0,0,0,0,0);
        $value4=array("Greatly encouraged","Encouraged","Moderately encouraged","Rarely encouraged","Not at all");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery4 = "SELECT q4 FROM guidance ";
        $query4 = "SELECT q4 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result4 = $dbhandle->query($strQuery4) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result4i = $dbhandle->query($query4) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result4i->num_rows>0)
        {
            while($row4=$result4i->fetch_assoc()){
                if($row4["q4"]=="Greatly encouraged"){
                    $count4[0]+=1;
                }
                else if($row4["q4"]=="Encouraged"){
                    $count4[1]+=1;
                }
                else if($row4["q4"]=="Moderately encouraged"){
                    $count4[2]+=1;
                }
                else if($row4["q4"]=="Rarely encouraged"){
                    $count4[3]+=1;
                }
                else if($row4["q4"]=="Not at all"){
                    $count4[4]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result4) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData4 = array(
        	    "chart" => array(
                  "caption" => "To what extend has your guide encouraged you to interact with external experts",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData4["data"] = array();

	// Push the data into the array
        	for($x4 = 0; $x4 < 5; $x4++) {
           	array_push($arrData4["data"], array(
              	"label" => $value4[$x4],
              	"value" => $count4[$x4]
              	)
           	);
        	}

        	

        	$jsonEncodedData4 = json_encode($arrData4);

	

        	$columnChart4 = new FusionCharts("column2D", "myFirstChart4" , 600, 300, "chart-4", "json", $jsonEncodedData4);

        	// Render the chart
        	$columnChart4->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
    
        $count5=array(0,0,0,0);
        $value5=array("Weekly","Once a month","Twice a month","Once a semester");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery5 = "SELECT q5 FROM guidance ";
        $query5 = "SELECT q5 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result5 = $dbhandle->query($strQuery5) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result5i = $dbhandle->query($query5) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result5i->num_rows>0)
        {
            while($row5=$result5i->fetch_assoc()){
                if($row5["q5"]=="Weekly"){
                    $count5[0]+=1;
                }
                else if($row5["q5"]=="Once a month"){
                    $count5[1]+=1;
                }
                else if($row5["q5"]=="Twice a month"){
                    $count5[2]+=1;
                }
                else if($row5["q5"]=="Once a semester"){
                    $count5[3]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result5) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData5 = array(
        	    "chart" => array(
                  "caption" => "How often do you receive guidance or feedback from your guide",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData5["data"] = array();

	// Push the data into the array
        	for($x5 = 0; $x5 < 4; $x5++) {
           	array_push($arrData5["data"], array(
              	"label" => $value5[$x5],
              	"value" => $count5[$x5]
              	)
           	);
        	}
        	$jsonEncodedData5 = json_encode($arrData5);
        	$columnChart5 = new FusionCharts("column2D", "myFirstChart5" , 600, 300, "chart-5", "json", $jsonEncodedData5);
        	// Render the chart
        	$columnChart5->render();
        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count6=array(0,0);
        $value6=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery6 = "SELECT q6 FROM guidance ";
        $query6 = "SELECT q6 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result6 = $dbhandle->query($strQuery6) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result6i = $dbhandle->query($query6) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result6i->num_rows>0)
        {
            while($row6=$result6i->fetch_assoc()){
                if($row6["q6"]=="Yes"){
                    $count6[0]+=1;
                }
                else if($row6["q6"]=="No"){
                    $count6[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result6) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData6 = array(
        	    "chart" => array(
                  "caption" => "Do you feel your guide/co-guide is biased",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData6["data"] = array();

	// Push the data into the array
        	for($x6 = 0; $x6 < 2; $x6++) {
           	array_push($arrData6["data"], array(
              	"label" => $value6[$x6],
              	"value" => $count6[$x6]
              	)
           	);
        	}

        	

        	$jsonEncodedData6 = json_encode($arrData6);

	

        	$columnChart6 = new FusionCharts("column2D", "myFirstChart6" , 600, 300, "chart-6", "json", $jsonEncodedData6);

        	// Render the chart
        	$columnChart6->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count7=array(0,0);
        $value7=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery7 = "SELECT q7 FROM guidance ";
        $query7 = "SELECT q7 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result7 = $dbhandle->query($strQuery7) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result7i = $dbhandle->query($query7) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result7i->num_rows>0)
        {
            while($row7=$result7i->fetch_assoc()){
                if($row7["q7"]=="Yes"){
                    $count7[0]+=1;
                }
                else if($row7["q7"]=="No"){
                    $count7[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result7) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData7 = array(
        	    "chart" => array(
                  "caption" => "Have you noticed any improvement in guidance from last feedback submitted",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData7["data"] = array();

	// Push the data into the array
        	for($x7 = 0; $x7 < 2; $x7++) {
           	array_push($arrData7["data"], array(
              	"label" => $value7[$x7],
              	"value" => $count7[$x7]
              	)
           	);
        	}
        	$jsonEncodedData7 = json_encode($arrData7);
                $columnChart7 = new FusionCharts("column2D", "myFirstChart7" , 600, 300, "chart-7", "json", $jsonEncodedData7);
        	// Render the chart
        	$columnChart7->render();

        	// Close the database connection
        	//$dbhandle->close();
     	}
        ?>
    <?php
        $count8=array(0,0);
        $value8=array("Yes","No");
        // Form the SQL query that returns the top 10 most populous countries
     	$strQuery8 = "SELECT q8 FROM guidance ";
        $query8 = "SELECT q8 from guidance";
        
     	// Execute the query, or else return the error message.
     	$result8 = $dbhandle->query($strQuery8) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        $result8i = $dbhandle->query($query8) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if($result8i->num_rows>0)
        {
            while($row8=$result8i->fetch_assoc()){
                if($row8["q8"]=="Yes"){
                    $count8[0]+=1;
                }
                else if($row8["q8"]=="No"){
                    $count8[1]+=1;
                }
            }
        }
     	// If the query returns a valid response, prepare the JSON string
     	if ($result8) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData8 = array(
        	    "chart" => array(
                  "caption" => "Would you recommend your guide to other candidates?(For final year only)",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData8["data"] = array();

	// Push the data into the array
        	for($x8 = 0; $x8 < 2; $x8++) {
           	array_push($arrData8["data"], array(
              	"label" => $value8[$x8],
              	"value" => $count8[$x8]
              	)
           	);
        	}
        	$jsonEncodedData8 = json_encode($arrData8);
        	$columnChart8 = new FusionCharts("column2D", "myFirstChart8" , 600, 300, "chart-8", "json", $jsonEncodedData8);
        	// Render the chart
        	$columnChart8->render();
        	// Close the database connection
        	$dbhandle->close();
     	}
        ?>
   <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
            <ul style="list-style-type: none">
            <li class="navbar-brand">MANIPAL UNIVERSITY</li>
            <li class="navbar-brand" style="padding-left: 320px">PH.D FEEDBACK</li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            
            <li><a href="Login.php">LOGOUT</a></li>
        </ul>
    </div>
</nav>
   <div class="container" style="position: relative;">
        <div id="mySidenav" class="sidenav" style="width:25%;">
            <a href="DRGuidanceGraph.php" class="btn active " style="background-color: #FF8A65; height: 90px; padding-top: 20px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn "  href="DRFacilitiesGraph.php" style="background-color: #C21E17; height: 90px; padding-top: 20px">FACILITIES <br>AVAILABLE</a>
            <a class="btn "  href="DRWorkBalGraph.php" style="background-color: #A11913 ;height: 90px; padding-top: 20px">WORK AND LIFE<br> BALANCE</a>
            <a class="btn "  href="DRProgressGraph.php" style="background-color: #861510; height: 90px; padding-top: 30px;" >PROGRESS</a>
            <a class="btn "  href="DRChallengesGraph.php" style="background-color: #670F0B; height: 90px; padding-top: 30px;">CHALLENGES</a>
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 100px; ;  height :450px;">
            <div style="margin-top: 25px;">
                <div style="margin-left: 130px" id="chart-1"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-2"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-3"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-4"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-5"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-6"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-7"><!-- Fusion Charts will render here--></div><br>
                <div style="margin-left: 130px" id="chart-8"><!-- Fusion Charts will render here--></div><br>
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