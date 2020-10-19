<!DOCTYPE html>
<html lang="en">
<head>
    <title>Info</title>
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
            width: 750px;
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
    <a href="index.php"><img class="login_icon" src="Res/logout.jpg"></a>
</div>


<div class="maintable">
        <table class="table1">
            <tr>
                <td colspan="2" class = "td1"><h1>User Information</h1></td>
            </tr>


            <tr>
                <td  class = "td1" >
                    <?php
                    $username = "";
                    $conn = mysqli_connect("localhost", "root", "9512", "Airline");

                    if($conn->connect_error) {
                        die("Connection Failed" . $conn->connect_error);
                    }

                    $sql = "SELECT Userinfo.username, Userinfo.firstname, Userinfo.lastname, Booking.origin, Booking.dest
                    FROM Userinfo
                    INNER JOIN Booking
                    WHERE Userinfo.logged = 'Yes'";
                    $result = mysqli_query($conn, $sql);
                    if($result = 'NULL'){
                        echo "You have not booked any Flight";
                    }else{
                        while($row = mysqli_fetch_array($result))
                        {
                            $username = $row['username'];
                            echo "Username:" . $row['username'];
                            echo "<br>";
                            echo "Name: " . $row['firstname'] . " " . $row['lastname'];
                            echo "<br>";
                            echo "From: " . $row['origin'];
                            echo "<br>";
                            echo "To: " . $row['dest'];
                            echo "<br>";
                        }
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td colspan="2" class = "td1">
                    <input onclick="document.location.href='logoutsucc.php'" type="button" id="logout" name="logout" value="Log out">
                </td>
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