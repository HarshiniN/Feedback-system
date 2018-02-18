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
        <title>Details</title>
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
    $con=  mysqli_connect("localhost", "root", "", "feedback1");
    $query="select * from phd where filled='true' and inst='$i'";
    $result=$con->query($query) or exit($con->errno);
    ?>
    <div class="container">
        <div class="scrollable des" style="margin-top: 90px;">
            <table class="table table-hover table-striped" style="color: white;">
                <tbody>
                    <tr style="color: white;">
                <th>Registration Number</th>
                <th>Student Name</th>
                <th>Guide Name</th>
                <th>Operation</th>
                    </tr>
                    <?php
                    while($row=$result->fetch_assoc())
                    {
                    ?>
                    <tr>
                    <td><?php echo $row["regno"]?></td>  
                    <td><?php echo $row["name"]?></td>
                    <td><?php echo $row["gname"]?></td>
                    <td><form action="HoIQuestAns.php" method="post">
                            <input type="submit" value="Show" style="background-color: #CF4747"/>
                            <input type="hidden" name="regno" value=<?php echo $row["regno"] ?> />
                            </form></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>