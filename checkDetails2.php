<?php
function weekday($time)
{
    $weekarray=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
    return $weekarray[date("w",strtotime($time))];
}
/* firstname lastname Airplane time */
function search_result($des, $timeA, $timeB){
    //check connection with the database
    $link = mysqli_connect('localhost', 'jojo', 'spaceman');
    if (!$link) {
        exit('Did not connect with the database');
    }
    mysqli_set_charset($link, 'utf8');
    //select database
    mysqli_select_db($link, 'Airline');
    //table Aircraft, Destinations, Routes, TimeTable
    //$sql_Air = "SELECT * FROM Aircraft WHERE model='$des'";
    //$result = $link->query($sql_Air);
    if($des=="YSSY"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='YSSY') or (point1='YSSY' and point2='NZNE');";
        $sql_time = "SELECT * FROM TimeTable WHERE origin='YSSY' and detDay ='Sun'";
    }
    if($des=="NZRO"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZRO') or (point1='NZRO' and point2='NZNE');";
        $sql_time = "SELECT * FROM TimeTable WHERE origin='NZRO' and (detDay ='Fri' or detDay ='Thu' or detDay ='Wed' or detDay ='Tue' or detDay ='Mon')";
    }
    if($des=="NZCI"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZCI') or (point1='NZCI' and point2='NZNE');";
        $sql_time = "SELECT * FROM TimeTable WHERE origin='NZCI' and (detDay ='Sat' or detDay ='Wed')";
    }
    if($des=="NZGB"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZGB') or (point1='NZGB' and point2='NZNE');";
        $sql_time = "SELECT * FROM TimeTable WHERE origin='NZGB' and (detDay ='Fri' or detDay ='Sat' or detDay ='Tue')";
    }
    if($des=="NZTL"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZTL') or (point1='NZTL' and point2='NZNE');";
        $sql_time = "SELECT * FROM TimeTable WHERE origin='NZTL' and detDay ='Fri'";
    }
    //weekdate of timeA and timeB
    $weekA = weekday($timeA);
    $weekB = weekday($timeB);
    //the weekday needed
    $weekday = $link->query($sql_time);
    //check the period between timeA and timeB
    $days = (strtotime($timeB)-strtotime($timeA))/86400+1;
    $date = array();
    for($i=0; $i<$days; $i++){
        $date[] = date('Y-m-d', strtotime($timeA)+(86400*$i));
    }
    $result = $link->query($join);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            echo '<tr><td class = "td1">'."Aircraft model: </td><td class = \"td1\">".$row["model"].'</td><td class="td1">'.$timeA.'</td><td class="td1">'.$timeB.'</td></tr>';
        }
    } else {
        echo "<tr><td class = \"td1\">There is NO result.</td></tr>";
    }

    if ($weekday->num_rows > 0) {
        while ($row = $weekday->fetch_assoc()){
            for($i=0; $i<$days; $i++){
                if(weekday($date[$i]) == $row["detDay"]){
                    echo '<form method="post" action="bookDetails.php"><tr></td><td class = "td1">'."Date and Time: </td><td class = \"td1\">".$date[$i]." ".$row["depTime"].'</td></td><td class = "td1">'."Flight Time: ".$row["flightTime"].'</td><td  class = "td1" ><input type="submit" value="BOOK"></td></tr></form>';
                }
            }
        }
    } else {
        echo "<tr><td class = \"td1\">There is NO result.</td></tr>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <style>
        a:link, a:visited {text-decoration: none;}
        .header{
            overflow: hidden;
            height: 80px;
            width: 100%;
        }
        .login_icon{
            float: right;
            width: 60px;
            height: 60px;
            margin-top: 10px;
            margin-right: 10px;
        }
        body{
            background: url("Res/airplane.jpg") no-repeat;
            background-size: cover;
            z-index: 10;
        }
        .maintable{
            background: black;
            opacity: 50%;
            align-content: center;
            margin-bottom: 10px;
        }
        .connect_us{
            background: floralwhite;
            opacity: 88%;
            align-content: center;
            height: 30px;
        }
        .td1{
            text-align:left;
            color: floralwhite;
            width:250px;
            overflow:hidden;
        }
        .table1{
            margin: auto;
            border-collapse:separate;
            border-spacing:0px 30px;
            width: 1000px;
        }
        footer {
            width: 100%;
            position:fixed;
            bottom:0px;
        }
    </style>
</head>


<body>


<div class="header">
    <!--a href to go home page: logo-->
    <a href="airplane.php"><img src="Res/logo.png" style="height: 60px; width: 60px; float: left; margin: 10px 10px">
        <span style="color: floralwhite; font-size: 60px;">Air159339<span></a>
    <span style="color: floralwhite; font-size: 60px; float:right"><a href="Userinfo.php">Hello, <?php      echo '&nbsp;&nbsp;';?></a>
    <a herf=""><img class="login_icon" src="Res/logout.jpg"></a></span>

</div>


<div class="maintable" method="post">
    <table class="table1" >
        <tr>
            <td colspan="2" class = "td1"><h1>Flights: </h1></td>
        </tr>

        <tr>
            <td  class = "td1" >Destination</td>
            <td  class = "td1" >From:  <?php   echo $_POST['fly_from'] ;      ?> </td>
            <td  class = "td1" >To:  NZNE</td>
        </tr>

        <?php
        //print_r($_POST);
        $fly_from = $_POST['fly_from'];
        $d = strtotime($_POST['the_timeA']);
        $timeA = date("Y/m/d h:i:sa", $d);
        $d2 = strtotime($_POST['the_timeB']);
        $timeB = date("Y/m/d h:i:sa", $d2);
        search_result($fly_from, $timeA, $timeB);
        ?>


    </table>
</div>

<footer>
    <div class="connect_us" style="font-size:large; text-align: center">
        <span>Help & support</span>
        <span style="margin-left: 7%">Ph:123-456789</span>
        <span style="margin-left: 7%">Email: 123-456789@339.com</span>
    </div>
</footer>
</body>
</html>
