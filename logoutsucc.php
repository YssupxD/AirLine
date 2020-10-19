<!DOCTYPE html>
<html>
<head>
    <title>Logout Successfully!</title>
    <meta name="content-type";
          charset="UTF-8">
</head>
<body>
<div>

        <h1>Logout Successfully！</h1>
        See you!
        <?php

        $conn = mysqli_connect('localhost', 'jojo', 'spaceman', 'AirLine');
        $sql_select = "SELECT username FROM Userinfo WHERE logged = 'Yes'";
        $ret = mysqli_query($conn, $sql_select);

        session_start();
        $sql_update = "UPDATE Userinfo SET logged = 'No' WHERE logged = 'Yes' ";
        $update = mysqli_query($conn, $sql_update);
        mysqli_close($conn);

        header("refresh:3;url=index.php");
        print('Jumping to index page in 3s...<br>');

        ?>
</div>
</body>
</html>
