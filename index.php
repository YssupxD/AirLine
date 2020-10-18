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
</div>


<div class="maintable" >
    <form id="loginform" action="loginaction.php" method="post">
        <table class="table1" >
            <tr>
                <td colspan="2" class = "td1"><h1>Login</h1></td>
            </tr>

            <tr>
               <td class="td1"> <span class="error">* required filed</span></td>
            </tr>

            <tr>
                <td  class = "td1" >Username:
                    <input type="text" placeholder="Enter Username" name="username" id="username" required = "required"
                           value = "<?php echo isset($_COOKIE[""]) ? $_COOKIE[""] : ""; ?>"> *
                </td>
            </tr>

            <tr>
                <td  class = "td1" >Password:
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" required="required"> *</td>
            </tr>

            <tr>
                <td class = "td1" colspan="2"> <input type="checkbox" name="remember"><small>Remember me</td>
            </tr>

            <tr>
                <td class = "td1" colspan="2" style="color:red;font-size:20px;">
                    <?php
                    $err = isset($_GET["err"]) ? $_GET["err"] : "";
                    switch ($err) {
                        case 1:
                            echo "Username or password wrong！";
                            break;

                        case 2:
                            echo "Username or password empty！";
                            break;
                    }
                    ?>
                </td>
            </tr>

            <tr> <td class="td1" colspan="2">
                    <input type="submit" id="login" name="login" value="Login">
                    <input type="reset" id="reset" name="reset" value="Reset">
                </td>
            </tr>

            <tr>
                <td class ="td1">Don't have an account? <a href = "registration.php">Sign up</a> </td>
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