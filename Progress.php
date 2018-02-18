<?php 
session_start();
$_SESSION["progress"]=1;
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
        <title>PROGRESS</title>
        <script>
            function showfunct(){
                if(document.getElementById("question").value == "Yes"){
                    document.getElementById("show").style.display = "block";
                }
                if(document.getElementById("question").value == "--Choose an option--" || document.getElementById("question").value === "No")
                {
                    document.getElementById("show").style.display = "none";
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
        <div id="mySidenav" class="sidenav" style="width:25%; margin-top: -10px ">
    <a class="btn" disabled href="#" style="background-color: #C21E17; height: 80px; padding-top: 15px">FACILITIES <br>AVAILABLE</a>
            <a class="btn " disabled href="#" style="background-color: #A11913; height: 80px; padding-top: 30px;">COURSE WORK</a>
            <a class="btn active"  href="Progress.php" style="background-color: #FF8A65; height: 80px; padding-top: 30px;" >PROGRESS</a>
            <a href="#" class="btn " disabled style="background-color: #861510; height: 80px; padding-top: 15px" >GUIDANCE<br> RECEIVED</a>
            <a class="btn " disabled href="#" style="background-color: #670F0B ;height: 80px; padding-top: 15px">WORK AND LIFE<br> BALANCE</a>
            <a class="btn " disabled href="#" style="background-color: #4A0707; height: 80px; padding-top: 30px;">CHALLENGES</a>
        </div>
        <div class="scrollable des" style="margin-left: 25%; margin-top: 90px; ;  height :480px;">
            <div style="margin-top: 25px;">
                <marquee style="color:#111111; font-family: Soho Gothic Pro;background:#FF8A65; margin-left: 1px"><strong>Welcome to Manipal University Feedback system portal!</strong></marquee><br><br>
                <?php
                $var1=1;
                if (isset($_SESSION['varname3']))
                {
                    $var1 = $_SESSION['varname3'];
                }
                if($var1 == 0)
                {?>
                <div class='alert alert-danger'>
                    <strong>Please answer all the questions</strong>
                </div>
                <?php
                }
                ?>
                <form class="form-group formwidth" method="post" action="dataUpdateProgress.php">
            <h2>How do you rate the quality of the following facilities and services available in the campus?</h2><br><br>
            
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td>Have you published any conference paper/journal paper in last 6 months?</td>
                        <td><select style="background-color:#1d262b;width : 200px;" name="q1" onchange="showfunct()" id="question">
                                <option value="--Choose an option--">--Choose an option--</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>How do you rate the PhD program overall?</td>
                        <td>
                        <select style="background-color:#1d262b;width : 200px;" name="q2">
                                <option>--Choose an option--</option>
                                <option value="Excellent">Excellent</option>
                                <option value="Good">Good</option>
                                <option value="Satisfactory">Satisfactory</option>
                                <option value="Poor">Poor</option>
                                <option value="Not Applicable">Not applicable</option></select>
                        </td>
                    </tr>
                </tbody>
            </table><br>
            
            <textarea style="height: 100px; width: 500px; color: black; display: none;" name="q3" id="show" placeholder="Details of Conference/Journal Paper" ></textarea><br><br>
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