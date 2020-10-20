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
    <span style="color: floralwhite; font-size: 60px; float:right"><a href="userinfo.php">Account></a>
    <a href="logoutsucc.php"><img class="login_icon" src="Res/logout.jpg"></a></span>

</div>


<div class="maintable">
    <form id="check_table" method="post" action="bookingaction.php">
        <table class="table1" >

            <tr>
                <td colspan="2" class = "td1"><h1>Please check details of the Flight: </h1></td>
            </tr>

            <tr>
            </tr>
            <tr>
                <td  class = "td1" >Aircraft model: </td>
                <td  class = "td1" ><?php  echo $_POST['aircraft'] ?></td>
                <td  class = "td1" ></td>
                <?php $aircraft = $_POST['aircraft'];
                echo "<input name=aircraft id = aircraft type=hidden value=$aircraft >" ?>

            </tr>


            <tr>
                <td  class = "td1" >Date: </td>
                <td  class = "td1" ><?php echo $_POST['book_date'] ?></td>
                <td  class = "td1" ></td>
                <?php $book_date = $_POST['book_date'];
                echo "<input name=book_date id=book_date type=hidden value=$book_date ]>" ?>
            </tr>

            <tr>
                <td  class = "td1" >Time: </td>
                <td  class = "td1" ><?php echo $_POST['flt_time'] ?></td>
                <td  class = "td1" ></td>
                <?php $flt_time = $_POST['flt_time'];
                echo "<input name=flt_time id=flt_time type=hidden value=$flt_time >" ?>
            </tr>

            <tr>
                <td  class = "td1" >Destination</td>
                <td  class = "td1" >From: <?php echo $_POST['from_w'] ?></td>
                <td  class = "td1" >To:  <?php echo $_POST['to_w'] ?></td>
                <?php $from_w = $_POST['from_w'];
                      $to_w = $_POST['to_w'];
                 echo "<input name=from_w id=from_w type=hidden value=$from_w>";
                 echo "<input name=to_w id=to_w type=hidden value=$to_w>" ?>
            </tr>

            <tr>
                <td  class = "td1" ></td>
                <td  class = "td1" ><input type="submit" value="OK"></td>
                <td  class = "td1" ><input onclick="history.go(-1)" type="button" value="CANCEL"></td>
            </tr>

        </table>
    </form>
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
