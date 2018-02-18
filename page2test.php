<?php
session_start();
$_SESSION["facilities"]=1;
if(!isset($_SESSION["login"]))
{
    header("Location: Logout.php");
}
if(isset($_SESSION["guidance"]))
{
    header("Location: GuidanceReceived.php");
}
if(isset($_SESSION["walb"]))
{
    header("Location: WALB.php");
}
if(isset($_SESSION["progress"]))
{
    header("Location: Progress.php");
}
if(isset($_SESSION["challenges"]))
{
    header("Location: Challenges.php");
}
if(isset($_SESSION["course"]))
{
    header("Location: courseWork.php");
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
        <title>FACILITIES AVAILABLE</title>
        <script>
            function showfunc(){
                document.getElementById("Showthis").style.display = "block";
            }
            function hidefunc(){
                document.getElementById("Showthis").style.display = "none";
            }
            function show1func(){
                document.getElementById("Showthis1").style.display = "block";
            }
            function hide1func(){
                document.getElementById("Showthis1").style.display = "none";
            }
        </script>
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
            <a class="btn active" href="page2test.php" style="background-color: #FF8A65; height: 80px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn " disabled href="#" style="background-color: #C21E17; height: 80px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn " disabled href="#" style="background-color: #A11913; height: 80px; padding-top: 30px;" >PROGRESS</a>
            <a href="#" class="btn " disabled style="background-color: #861510; height: 80px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn " disabled href="#" style="background-color: #670F0B ;height: 80px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            <a class="btn " disabled href="#" style="background-color: #4A0707; height: 80px; padding-top: 30px;">CHALLENGES</a>
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 90px;  height :480px;">
            <div style="margin-top: 25px;">
                <marquee style="color:#111111; font-family: Soho Gothic Pro;background:#FF8A65; margin-left: 1px"><strong>Welcome to Manipal University Feedback system portal!</strong></marquee><br><br>
                <?php
                $var1=1;
                if (isset($_SESSION['varname1']))
                {
                    $var1 = $_SESSION['varname1'];
                }
                if($var1 == 0)
                {?>
                <div class='alert alert-danger'>
                    <strong>Please answer all the questions</strong>
                </div>
                <?php
                }
                ?>
                <form class="form-group formwidth" method="post" action="dataUpdateBalance.php">
            <h2>How do you rate the quality of the following facilities and services available in the campus?</h2><br><br>
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Options</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Satisfactory</th>
                        <th>Poor</th>
                        <th>Not Applicable</th>
                    </tr>
                    <tr>
                        <td>Leave</td>
                        <td><input type="radio" name="leave" value="Excellent"></td>
                        <td><input type="radio" name="leave" value="Good"></td>
                        <td><input type="radio" name="leave" value="Satisfactory"></td>
                        <td><input type="radio" name="leave" value="Poor"></td>
                        <td><input type="radio" name="leave" value="Not Applicable"></td>
                    </tr>
                    <tr>
                        <td>HealthCare</td>
                        <td><input type="radio" name="healthcare" value="Excellent"></td>
                        <td><input type="radio" name="healthcare" value="Good"></td>
                        <td><input type="radio" name="healthcare" value="Satisfactory"></td>
                        <td><input type="radio" name="healthcare" value="Poor"></td>
                        <td><input type="radio" name="healthcare" value="Not Applicable"></td>
                    </tr>
                    <tr>
                        <td>Infrastructure</td>
                        <td><input type="radio" name="infrastructure" value="Excellent"></td>
                        <td><input type="radio" name="infrastructure" value="Good"></td>
                        <td><input type="radio" name="infrastructure" value="Satisfactory"></td>
                        <td><input type="radio" name="infrastructure" value="Poor"></td>
                        <td><input type="radio" name="infrastructure" value="Not Applicable"></td>
                    </tr>
                    <tr>
                        <td>Resource<br>(Ex: Software,Equipments, Chemicals)</td>
                        <td><input type="radio" name="resource" value="Excellent"></td>
                        <td><input type="radio" name="resource" value="Good"></td>
                        <td><input type="radio" name="resource" value="Satisfactory"></td>
                        <td><input type="radio" name="resource" value="Poor"></td>
                        <td><input type="radio" name="resource" value="Not Applicable"></td>
                    </tr>
                </tbody>
            </table><br><br>
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Questions</th>
                        <th>Yes</th>
                        <th>No</th>
                    </tr>
                    <tr>
                        <td>Have you applied for funds from the Institute/Department in the last 6 months?</td>
                        <td><input type="radio" name="q5" value="Yes"></td>
                        <td><input type="radio" name="q5" value="No"></td>
                    </tr>
                    <tr>
                        <td>Have you initiated research grant submission from an external agency in the last 6 months?</td>
                        <td><input type="radio" name="q6" value="Yes" onclick="showfunc()" onclick="showfunc1()"></td>
                        <td><input type="radio" name="q6" value="No" onclick="hidefunc()" onclick="hidefunc1()"></td>
                    </tr>
                    <tr>
                        <td>Have you availed facilities from the University to attend workshop/publish research work?</td>
                        <td><input type="radio" name="q7" value="Yes"></td>
                        <td><input type="radio" name="q7" value="No"></td>
                    </tr>
                    <tr>
                        <td>Have you initiated requests to procure new paid resources (ex: software, equipment, chemicals)?</td>
                        <td><input type="radio" name="q8" value="Yes"></td>
                        <td><input type="radio" name="q8" value="No"></td>
                    </tr>
                </tbody>
            </table><br>
            
   
            <textarea id="Showthis" style="height: 100px;color: black;display:none; width: 500px;padding-top: 0px; line-height: none;background-color: white;"
                      name="q9" placeholder="Details of the research grant submission from an external agency"></textarea><br><br>
            
            <button class="btn btn-primary bottom-right " style="margin-left: 45%">Submit</button>
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