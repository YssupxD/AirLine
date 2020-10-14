<?php
    /* firstname lastname Airplane time */
function search_result($des, $timeA, $timeB){
    //check connection with the database
    $link = mysqli_connect('localhost', 'root', '9512');
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
    }
    if($des=="NZRO"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZRO') or (point1='NZRO' and point2='NZNE');";
    }
    if($des=="NZCI"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZCI') or (point1='NZCI' and point2='NZNE');";
    }
    if($des=="NZGB"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZGB') or (point1='NZGB' and point2='NZNE');";
    }
    if($des=="NZTL"){
        $join = "select * from Routes,Aircraft where Routes.craftID=Aircraft.craftID and (point1='NZNE' and point2='NZTL') or (point1='NZTL' and point2='NZNE');";
    }

    $result = $link->query($join);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            echo '<tr><td class = "td1">'."Aircraft model: </td><td class = \"td1\">".$row["model"].'</td><td class="td1">'.$timeA.'</td><td class="td1">'.$timeB.'</td></tr>';
        }

    } else {
        echo "There is NO result.";
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
            position: absolute;
            bottom: 0;
        }
    </style>
</head>


<body>


<div class="header">
    <!--a href to go home page: logo-->
    <a href="#"><img src="Res/logo.png" style="height: 60px; width: 60px; float: left; margin: 10px 10px">
        <span style="color: floralwhite; font-size: 60px;">Air159339<span></a>
    <a href="Login.html"><img class="login_icon" src="login.jpg"></a>
</div>


<div class="maintable" method="post">
    <table class="table1" >
        <tr>
            <td colspan="2" class = "td1"><h1>Please check your details: </h1></td>
        </tr>

        <tr>
        </tr>

        <tr>
            <td  class = "td1" >First Name: </td>
            <td  class = "td1" >Not finished, read from db</td>
            <td  class = "td1" ></td>
        </tr>

        <tr>
            <td  class = "td1" >Second Name: </td>
            <td  class = "td1" >Not finished, read from db</td>
            <td  class = "td1" ></td>
        </tr>

        <tr>
            <td  class = "td1" >Destination and time: </td>
            <td  class = "td1" >Not finished, read from db</td>
            <td  class = "td1" ></td>
        </tr>

        <?php
        //print_r($_POST);
        $fly_to = $_POST['fly_to'];
        $d = strtotime($_POST['the_timeA']);
        $timeA = date("Y/m/d h:i:sa", $d);
        $d2 = strtotime($_POST['the_timeB']);
        $timeB = date("Y/m/d h:i:sa", $d2);
        search_result($fly_to, $timeA, $timeB);
        ?>

        <tr>
            <td colspan="2" class = "td1" style="text-align: center; font-size: large">OK</td>
        </tr>


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
