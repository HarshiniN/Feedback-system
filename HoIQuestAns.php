<?php 
session_start();
if(!isset($_SESSION["hoilogin"]))
{
    header("Location: Logout.php");
}
$i=$_SESSION["institute"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width:device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="footer_css/css/zerogrid.css">
        <link rel="stylesheet" href="footer_css/css/style.css">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
    $("tr:nth-child(odd)").css("background-color", "#1d262b");
    $("tr:nth-child(even)").css("background-color", "#252e33");
});</script>
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
        <title>Questions</title>
</head>
<body style="background-color: #CF4747">
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
                <button class="btn" onclick="chang()" id="1st">Graph View</button>
                <button class="btn btn-success" id="2nd" onclick="chang2()">Student View</button>
            </li>
            <li><a href="Logout.php">LOGOUT</a></li>
        </ul>
    </div>
</nav>
    <?php
    $r=$_POST["regno"];
    $con=  mysqli_connect("localhost", "root", "", "feedback1");
    $query1="select * from facilities where regno=$r";
    $result1=$con->query($query1) or exit($con->errno);
    $row1 = $result1->fetch_assoc();
    $query2="select * from course where regno=$r";
    $result2=$con->query($query2) or exit($con->errno);
    $row2 = $result2->fetch_assoc();
    $query3="select * from progress where regno=$r";
    $result3=$con->query($query3) or exit($con->errno);
    $row3 = $result3->fetch_assoc();
    $query4="select * from guidance where regno=$r";
    $result4=$con->query($query4) or exit($con->errno);
    $row4 = $result4->fetch_assoc();
    $query5="select * from workbal where regno=$r";
    $result5=$con->query($query5) or exit($con->errno);
    $row5 = $result5->fetch_assoc();
    $query6="select * from challenges where regno=$r";
    $result6=$con->query($query6) or exit($con->errno);
    $row6 = $result6->fetch_assoc();
    ?>
    <div class="container">
        <div class="scrollable des" style="margin-top: 90px;">
            <table class="table table-hover table-striped" style="color: white;">
                <tbody>
                    <tr>
                        <th>Questions</th>
                        <th>Answers</th>
                    </tr>
                    <tr>
                        <td><b>How do you rate the quality of the following facilities and services available in the campus</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Leave</td>
                        <td><?php echo $row1["q1"]; ?></td>
                    </tr>
                    <tr>
                        <td>HealthCare</td>
                        <td><?php echo $row1["q2"]; ?></td>
                    </tr>
                    <tr>
                        <td>Infrastructure</td>
                        <td><?php echo $row1["q3"]; ?></td>
                    </tr>
                    <tr>
                        <td>Resource</td>
                        <td><?php echo $row1["q4"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Have you applied for funds from the Institute/Department in the last 6 months</b></td>
                        <td><?php echo $row1["q5"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Have you initiated research grant submission from an external agency in the last 6 months</b></td>
                        <td><?php echo $row1["q6"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Have you availed facilities from the University to attend workshop/publish research work</b></td>
                        <td><?php echo $row1["q7"]; ?></td>
                    </tr>
                    <tr>
                        <td><b>Have you initiated requests to procure new paid resources</b> </td>
                        <td><?php echo $row1["q8"]; ?></td>
                    </tr>
                    <tr>
                        <td>What kind of course are you currently enrolled in</td>
                        <td><?php echo $row2["q10"]; ?></td>
                    </tr>
                    <tr>
                        <td>What do you prefer</td>
                        <td><?php echo $row2["q11"]; ?></td>
                    </tr>
                    <tr>
                        <td>Suggestion Regarding Course Work(12 credits) </td>
                        <td><?php echo $row2["q12"]; ?></td>
                    </tr>
                    <tr>
                        <td>Have you published any conference paper/journal paper in last 6 months </td>
                        <td><?php echo $row3["q1"]; ?></td>
                    </tr>
                    <tr>
                        <td>How do you rate the PhD program overall</td>
                        <td><?php echo $row3["q2"]; ?></td>
                    </tr>
                    <tr>
                        <td>Details of conference/journal paper </td>
                        <td><?php echo $row3["q3"]; ?></td>
                    </tr>
                    <tr>
                        <td>To what extent is your guide available when you had queries/issues</td>
                        <td><?php echo $row4["q1"]; ?></td>
                    </tr>
                    <tr>
                        <td>How useful is your guide's feedback</td>
                        <td><?php echo $row4["q2"]; ?></td>
                    </tr>
                    <tr>
                        <td>To what extent does your guide review the paper/report and presentation on time</td>
                        <td><?php echo $row4["q3"]; ?></td>
                    </tr>
                    <tr>
                        <td>To what extent has your guide encouraged you to interact with external experts</td>
                        <td><?php echo $row4["q4"]; ?></td>
                    </tr>
                    <tr>
                        <td>How often do you receive guidance or feedback from your guide</td>
                        <td><?php echo $row4["q5"]; ?></td>
                    </tr>
                    <tr>
                        <td>Do you feel your guide is biased</td>
                        <td><?php echo $row4["q6"]; ?></td>
                    </tr>
                    <tr>
                        <td>Would you recommend your guide to other candidates</td>
                        <td><?php echo $row4["q7"]; ?></td>
                    </tr>
                    <tr>
                        <td>To what extent do you receive support from the Head of the Department</td>
                        <td><?php echo $row4["q8"]; ?></td>
                    </tr>
                    <tr>
                        <td>Have you completed DAC in the last 6 months</td>
                        <td><?php echo $row4["q9"]; ?></td>
                    </tr>
                    <tr>
                        <td>Did you receive support from your guide during DAC</td>
                        <td><?php echo $row4["q10"]; ?></td>
                    </tr>
                    <tr>
                        <td>Did you receive feedback from DAC members</td>
                        <td><?php echo $row4["q11"]; ?></td>
                    </tr>
                    <tr>
                        <td>How do you rate the work atmosphere in your department</td>
                        <td><?php echo $row5["q1"]; ?></td>
                    </tr>
                    <tr>
                        <td>How many hours do you put in for research work per week</td>
                        <td><?php echo $row5["q2"]; ?></td>
                    </tr>
                    <tr>
                        <td>Are you able to balance your personal life and research work</td>
                        <td><?php echo $row5["q3"]; ?></td>
                    </tr>
                    <tr>
                        <td>Which of the following would you say is the most difficult for PhD's in your discipline</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Learning what career possibilities exist</td>
                        <td><?php 
                        if($row5["q4"]=="Learning what career possibilities exist")
                        {echo "Yes";}
                        if($row5["q4"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Finding research careers within academia</td>
                        <td><?php 
                        if($row5["q5"]=="Finding research careers within academia")
                        {echo "Yes";}
                        if($row5["q5"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Finding research careers within industry</td>
                        <td><?php 
                        if($row5["q6"]=="Finding research careers within industry")
                        {echo "Yes";}
                        if($row5["q6"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Finding research careers within government</td>
                        <td><?php 
                        if($row5["q7"]=="Finding research careers within government")
                        {echo "Yes";}
                        if($row5["q7"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Finding research careers with charity/non-profit organisations</td>
                        <td><?php 
                        if($row5["q8"]=="Finding research careers with charity/non-profit organisations")
                        {echo "Yes";}
                        if($row5["q8"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Finding non-research careers that use your skills</td>
                        <td><?php 
                        if($row5["q9"]=="Finding non-research careers that use your skills")
                        {echo "Yes";}
                        if($row5["q9"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Others</td>
                        <td><?php 
                        if($row5["q10"]=="Others")
                        {echo "Yes";}
                        if($row5["q10"]=="NO")
                        {echo "No";}
                        ?></td>
                    </tr>
                    <tr>
                        <td>What is the scope for your work</td>
                        <td><?php echo $row6["q1"]; ?></td>
                    </tr>
                    <tr>
                        <td>Any Other Comments</td>
                        <td><?php echo $row6["q2"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>