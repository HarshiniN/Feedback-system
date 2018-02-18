<?php 
session_start();
$_SESSION["guidance"]=1;
if(!isset($_SESSION["login"]))
{
    header("Location: Logout.php");
}
if(isset($_SESSION["walb"]))
{
    header("Location: WALB.php");
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
        <title>Guidance Received</title>
        <script>
                function showfunc(){
                if (document.getElementById("quest").value == "Yes"){
                document.getElementById("Show1").style.display = "block";
                document.getElementById("Show2").style.display = "block";
            }
            if (document.getElementById("quest").value == "No" || document.getElementById("quest").value == "--Chose an option--" ){
                document.getElementById("Show1").style.display = "none";
                document.getElementById("Show2").style.display = "none";
            }
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
   <div class="container" style="position: relative;">
        <div id="mySidenav" class="sidenav" style="width:25%; margin-top: -10px">
                <a class="btn" disabled href="#" style="background-color: #C21E17; height: 80px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn " disabled href="#" style="background-color: #A11913; height: 80px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn " disabled  href="" style="background-color: #861510; height: 80px; padding-top: 30px;" >PROGRESS</a>
            <a href="#" class="btn active"  href="GuidanceReceived.php"style="background-color: #FF8A65; height: 80px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn " disabled href="#" style="background-color: #670F0B ;height: 80px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            <a class="btn " disabled href="#" style="background-color: #4A0707; height: 80px; padding-top: 30px;">CHALLENGES</a>
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 90px; ;  height :480px;">
            <div style="margin-top: 25px;">
                <marquee style="color:#111111; font-family: Soho Gothic Pro;background:#FF8A65; margin-left: 1px"><strong>Welcome to Manipal Academy of Higher Education Feedback system portal!</strong></marquee><br><br>
                <?php
                $var1=1;
                if (isset($_SESSION['varname4']))
                {
                    $var1 = $_SESSION['varname4'];
                }
                if($var1 == 0)
                {?>
                <div class='alert alert-danger'>
                    <strong>Please answer all the questions</strong>
                </div>
                <?php
                }
                ?>
                <form class="form-group formwidth" method="post" action="dataUpdate.php">
            <table class="table table-hover table-bordered">
            <tr>
                <td>To what extent is your guide available when you had queries/issues?</td>
            <td><select style="background-color: #1d262b;width: 200px ;margin-top: 5px" name="available">
                <option>--Choose an option--</option>
                <option  value="Always Available" >Always Available</option>
                <option  value="Available most of the time">Available most of the time</option>
                <option  value="Sometimes available">Sometimes available</option>
                <option  value="Rarely Available">Rarely Available</option>
                <option  value="Not available at all">Not available at all</option>
                </select></td>
            </tr>
            <tr>
                <td>How useful is your guide's feedback?</td>
            <td><select style="background-color: #1d262b;width: 200px;margin-top: 5px " name="feedback">
                    <option>--Choose an option--</option>
                <option  value="Extremely useful">Extremely useful</option>
                <option  value="Very useful">Very useful</option>
                <option  value="Moderately useful">Moderately useful</option>
                <option  value="Rarely useful">Rarely useful</option>
                <option  value="Not useful at all">Not useful at all</option>
                </select></td>
            </tr>
            <tr>
                <td>To what extent does your guide review the paper/report and presentation on time?</td>
            <td><select style="background-color: #1d262b;width: 200px;margin-top: 5px" name="review">
                    <option>--Choose an option--</option>
                <option  value="Always on time">Always on time</option>
                <option  value="Mostly on time">Mostly on time</option>
                <option  value="Sometimes on time">Sometimes on time</option>
                <option  value="Rarely on time">Rarely on time</option>
                <option  value="Not at all">Not at all</option>
                </select></td>
            </tr>
            <tr>
                <td>To what extent has your guide encouraged you to interact with external experts?</td>
            <td><select style="background-color: #1d262b;width: 200px;margin-top: 5px" name="encourage">
                    <option>--Choose an option--</option>
                <option  value="Greatly encouraged">Greatly encouraged</option>
                <option  value="Encouraged">Encouraged</option>
                <option  value="Moderately encouraged">Moderately encouraged</option>
                <option  value="Rarely encouraged">Rarely encouraged</option>
                <option  value="Not at all">Not at all</option>
                </select></td>
            </tr>
            <tr>
                <td>How often do you receive guidance or feedback from your guide?</td>
            <td><select style="background-color: #1d262b;width: 200px;margin-top: 5px " name="guidance">
                    <option>--Choose an option--</option>
                <option  value="Weekly" >Weekly</option>
                <option  value="Once a month">Once a month</option>
                <option  value="Twice a month">Twice a month</option>
                <option  value="Once a semester">Once a semester</option>
                </select></td>
            </tr>
            <tr>
                <td>Do you feel your guide is biased?</td>
            <td><select style="background-color: #1d262b;width: 200px;margin-top: 5px " name="biased">
                    <option>--Choose an option--</option>
                <option  value="Yes">Yes</option>
                <option  value="No">No</option>
                </select></td>
            </tr>
            <tr>
            <td>Would you recommend your guide to other candidates?</td>
            <td><select style="background-color: #1d262b;width: 200px;margin-top: 5px " name="recommend">
                    <option>--Choose an option--</option>
                <option  value="Yes">Yes</option>
                <option  value="No">No</option>
                </select></td>
            </tr>
            <tr>
                    <td>To what extent do you receive support from the Head of the Department?</td>
                    <td><select style="background-color:#1d262b;width : 200px;" name="support">
                    <option>--Choose an option--</option>
                    <option value="Extremely Supportive" >Extremely Supportive</option>
                    <option value="Moderately Supportive" >Moderately Supportive</option>
                    <option value="Slightly Supportive" >Slightly Supportive</option>
                    <option value="Not at all supportive" >Not at all supportive</option>
                </select></td>
            </tr>
                                <tr>
                        <td>Have you completed DAC in the last 6 months?</td>
                        <td><select style="background-color:#1d262b;width : 200px;" onchange="showfunc()"name="DAC" id="quest">
                                <option value="--Choose an option--">--Choose an option--</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option></select></td>
                    </tr>
                    <tr id="Show1" style="display: none;">
                        <td>Did you receive support from your guide during DAC? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><select style="background-color:#1d262b;width : 200px;" name="DACi">
                                        <option value="--Choose an option--">--Choose an option--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                            </select></td>
                    </tr>
                    <tr id="Show2" style="display: none;">
                        <td>Did you receive feedback from DAC members?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><select style="background-color:#1d262b;width : 200px;" name="DACii">
                                        <option value="--Choose an option--">--Choose an option--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                            </select></td>
                    </tr>
                    
             </table>
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