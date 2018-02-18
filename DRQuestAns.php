<?php 
session_start();
if(!isset($_SESSION["drlogin"]))
{
    header("Location: Logout.php");
}
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
            document.getElementById("1st").onclick = location.href = "DRFacilitiesGraph.php";
        }
        function chang2(){
            document.getElementById("2nd").onclick = location.href = "DRTableReview.php";
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
        <div class="scrollable" style="margin-top: 90px;">
            <table class="table table-hover table-striped table-bordered table-responsive">
                <tbody>
                    <tr>
                        <th style="background-color: #111111;color: #ffffff"><h4>Questions</h4></th>
                        <th style="background-color: #111111;color:#ffffff"><h4>Answers</h4></th>
                    </tr>
                    <tr>
                        <td class="outer" ><b>How do you rate the quality of the following facilities and services available in the campus</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Leave</b></td>
                        <td class="answer"><b><?php echo $row1["q1"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Health Care</b></td>
                        <td  class="answer " ><b><?php echo $row1["q2"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Infrastructure</b></td>
                        <td class="answer" ><b><?php echo $row1["q3"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Resource</b></td>
                        <td class="answer"><b><?php echo $row1["q4"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Have you applied for funds from the Institute/Department in the last 6 months</b></td>
                        <td class="answer" ><b><?php echo $row1["q5"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Have you initiated research grant submission from an external agency in the last 6 months</b></td>
                        <td class="answer"><b><?php echo $row1["q6"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Have you availed facilities from the University to attend workshop/publish research work</b></td>
                        <td class="answer" ><b><?php echo $row1["q7"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Have you initiated requests to procure new paid resources</b> </td>
                        <td class="answer"><b><?php echo $row1["q8"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>What kind of course are you currently enrolled in</b></td>
                        <td class="answer" ><b><?php echo $row2["q10"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>What do you prefer</b></td>
                        <td class="answer" ><b><?php echo $row2["q11"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Suggestion Regarding Course Work(12 credits)</b> </td>
                        <td class="answer" ><b><?php echo $row2["q12"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Have you published any conference paper/journal paper in last 6 months </b></td>
                        <td class="answer" ><b><?php echo $row3["q1"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>How do you rate the PhD program overall</b></td>
                        <td class="answer" ><b><?php echo $row3["q2"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Details of conference/journal paper </b></td>
                        <td class="answer"><b><?php echo $row3["q3"]; ?></b></td>
                    </tr>
                    <tr>
                        <td  class="outer" ><b>To what extent is your guide available when you had queries/issues</b></td>
                        <td class="answer" ><b><?php echo $row4["q1"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>How useful is your guide's feedback</b></td>
                        <td class="answer" ><b><?php echo $row4["q2"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>To what extent does your guide review the paper/report and presentation on time</b></td>
                        <td class="answer" ><b><?php echo $row4["q3"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>To what extent has your guide encouraged you to interact with external experts</b></td>
                        <td class="answer" ><b><?php echo $row4["q4"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>How often do you receive guidance or feedback from your guide</b></td>
                        <td class="answer" ><b><?php echo $row4["q5"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Do you feel your guide is biased</b></td>
                        <td class="answer" ><b><?php echo $row4["q6"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Would you recommend your guide to other candidates</b></td>
                        <td class="answer" ><b><?php echo $row4["q7"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>To what extent do you receive support from the Head of the Department</b></td>
                        <td class="answer"><b><?php echo $row4["q8"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Have you completed DAC in the last 6 months</b></td>
                        <td class="answer"><b><?php echo $row4["q9"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Did you receive support from your guide during DAC</b></td>
                        <td class="answer" ><b><?php echo $row4["q10"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Did you receive feedback from DAC members</b></td>
                        <td class="answer"><b><?php echo $row4["q11"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>How do you rate the work atmosphere in your department</b></td>
                        <td class="answer" ><b><?php echo $row5["q1"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>How many hours do you put in for research work per week</b></td>
                        <td class="answer" ><b><?php echo $row5["q2"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Are you able to balance your personal life and research work</b></td>
                        <td class="answer"><b><?php echo $row5["q3"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer"><b>Which of the following would you say is the most difficult for PhD's in your discipline</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Learning what career possibilities exist</b></td>
                        <td class="answer" ><b><?php 
                        if($row5["q4"]=="Learning what career possibilities exist")
                        {echo "Yes";}
                        if($row5["q4"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner"><b>Finding research careers within academia</b></td>
                        <td class="answer"><b><?php 
                        if($row5["q5"]=="Finding research careers within academia")
                        {echo "Yes";}
                        if($row5["q5"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Finding research careers within industry</b></td>
                        <td class="answer" ><b><?php 
                        if($row5["q6"]=="Finding research careers within industry")
                        {echo "Yes";}
                        if($row5["q6"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Finding research careers within government</b></td>
                        <td class="answer" ><b><?php 
                        if($row5["q7"]=="Finding research careers within government")
                        {echo "Yes";}
                        if($row5["q7"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner" ><b>Finding research careers with charity/non-profit organisations</b></td>
                        <td class="answer"><b><?php 
                        if($row5["q8"]=="Finding research careers with charity/non-profit organisations")
                        {echo "Yes";}
                        if($row5["q8"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner"><b>Finding non-research careers that use your skills</b></td>
                        <td  class="answer" ><b><?php 
                        if($row5["q9"]=="Finding non-research careers that use your skills")
                        {echo "Yes";}
                        if($row5["q9"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="inner"><b>Others</b></td>
                        <td class="answer" ><b><?php 
                        if($row5["q10"]=="Others")
                        {echo "Yes";}
                        if($row5["q10"]=="NO")
                        {echo "No";}
                        ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>What is the scope for your work</b></td>
                        <td class="answer"><b><?php echo $row6["q1"]; ?></b></td>
                    </tr>
                    <tr>
                        <td class="outer" ><b>Any Other Comments</b></td>
                        <td class="answer" ><b><?php echo $row6["q2"]; ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>