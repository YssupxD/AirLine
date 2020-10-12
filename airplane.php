<!DOCTYPE html>
<html lang="en">
<head>
    <title>159.339 air</title>
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
            background: url("airplane.jpg") no-repeat;
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
    <a href="airplane.php"><img src="logo.png" style="height: 60px; width: 60px; float: left; margin: 10px 10px">
        <span style="color: floralwhite; font-size: 60px;">Air159339<span></a>
    <a href="Login.php"><img class="login_icon" src="login.jpg"></a>
</div>


<div class="maintable">

    <table class="table1" method="post">
        <tr><td colspan="2" class = "td1"><h1>Customize Your Trip</h1></td></tr>

        <tr>
            <td  class = "td1" >Search a fight</td>
            <td  class = "td1" >From:
              <select>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
              </select>
            </td>
            <td  class = "td1" >To:
                <select>
                    <option label="1">1</option>
                    <option label="2">2</option>
                    <option label="3">3</option>
                </select>
            </td>
            <td  class = "td1" >
                <input type="datetime-local" id="the_time1"
                       name="the_time"
                       min="2020-10-15T00:00" max="2021-12-31T00:00">
            </td>
            <td  class = "td1" >SEARCH</td>
        </tr>

        <tr>
            <td  class = "td1" >Book a fight</td>
            <td  class = "td1" >From:
                <select>
                    <option label="1">1</option>
                    <option label="2">2</option>
                    <option label="3">3</option>
                </select>
            </td>
            <td  class = "td1" >To:
                <select>
                    <option label="1">1</option>
                    <option label="2">2</option>
                    <option label="3">3</option>
                </select>
            </td>
            <td  class = "td1" >
                <input type="datetime-local" id="the_time2"
                       name="the_time"
                       min="2020-10-15T00:00" max="2021-12-31T00:00">
            </td>
            <td  class = "td1" >BOOK</td>
        </tr>
        <tr></tr>

    <table>
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