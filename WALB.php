<?php 
session_start();
$_SESSION["walb"]=1;
if(!isset($_SESSION["login"]))
{
    header("Location: Logout.php");
}
if(isset($_SESSION["challenges"]))
{
    header("Location: Challenges.php");
}
if(isset($_SESSION["thanks"]))
{
    header("Location: Thanks.php");
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
        <script src="js/bootstrap.min.js"></script>
        <title>WORK & LIFE</title>
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
            
            <li><a href="Logout.php">LOGOUT</a></li>
        </ul>
    </div>
</nav>
        <div class="container">
        <div id="mySidenav" class="sidenav" style="width:25%; margin-top: -10px">
                            <a class="btn" disabled href="#" style="background-color: #C21E17; height: 80px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn " disabled href="#" style="background-color: #A11913; height: 80px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn " disabled  href="#" style="background-color: #861510; height: 80px; padding-top: 30px;" >PROGRESS</a>
            <a href="#" class="btn " disabled  href="#"style="background-color: #670F0B; height: 80px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn active" href="WALB.php" style="background-color: #FF8A65 ;height: 80px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            <a class="btn " disabled href="#" style="background-color: #4A0707; height: 80px; padding-top: 30px;">CHALLENGES</a>
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 90px;  height :480px;">
        <div style="margin-top : 2%;">
            <marquee style="color:#111111; font-family: Soho Gothic Pro;background:#FF8A65; margin-left: 1px"><strong>Welcome to Manipal University Feedback system portal!</strong></marquee><br><br>
            <?php
                $var1=1;
                if (isset($_SESSION['varname5']))
                {
                    $var1 = $_SESSION['varname5'];
                }
                if($var1 == 0)
                {?>
                <div class='alert alert-danger'>
                    <strong>Please answer all the questions</strong>
                </div>
                <?php
                }
                ?>
            <form class="form-group formwidth" method="post" action="dataUpdateWALB.php">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>How do you rate the work atmosphere in your department?</td>
                    <td><select style="background-color:#1d262b;width : 200px;" name="q1">
                    <option>--Choose an option--</option>
                    <option value="Excellent" >Excellent</option>
                    <option value="Good" >Good</option>
                    <option value="Satisfactory" >Satisfactory</option>
                    <option value="Poor">Poor</option>
                </select></td>
                        </tr>
                        <tr>
                            <td>How many hours do you put in for research work per week?</td>
                            <td><select style="background-color:#1d262b;width : 200px;" name="q2">
                    <option>--Choose an option--</option>
                    <option value="Less than 11 hours">Less than 11 hours</option>
                    <option value="11-20 hours" >11-20 hours</option>
                    <option value="21-20 hours" >21-30 hours</option>
                    <option value="31-40 hours" >31-40 hours</option>
                    <option value="41-50 hours" >41-50 hours</option>
                    <option value="51-60 hours" >51-60 hours</option>
                    <option value="61-70 hours" >61-70 hours</option>
                    <option value="71-80 hours" >71-80 hours</option>
                    <option value="More than 80 hours" >More than 80 hours</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Are you able to balance your personal life and research work?</td>
                            <td><select style="background-color:#1d262b;width : 200px;" name="q3">
                    <option>--Choose an option--</option>
                    <option value="Yes">Yes</option>
                    <option value="No" >No</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                
                <h3>Which of the following would you say is the most difficult for PhD's in your discipline? </h3><br>
                <input type="checkbox" name="q4" value="Learning what career possibilities exist">Learning what career possibilities exist<br>
                <input type="checkbox" name="q5" value="Finding research careers within academia">Finding research careers within academia<br>
                <input type="checkbox" name="q6" value="Finding research careers within industry">Finding research careers within industry<br>
                <input type="checkbox" name="q7" value="Finding research careers within government">Finding research careers within government<br>
                <input type="checkbox" name="q8" value="Finding research careers with charity/non-profit organisations">Finding research careers with charity/non-profit organisations<br>
                <input type="checkbox" name="q9" value="Finding non-research careers that use your skills">Finding non-research careers that use your skills<br>
                <input type="checkbox" name="q10" value="Others">Others<br>
                
                <br>    
                <button class="btn btn-primary" style="margin-left: 45%">Submit</button> 
            </form>
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
