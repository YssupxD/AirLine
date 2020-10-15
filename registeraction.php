<?php

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";

if ($password == $re_password) {
    //establish connection
    $conn = mysqli_connect("localhost", "root", "9512", "Airline");
    //prepare query line
    $sql_select = "SELECT username FROM Userinfo WHERE username = '$username'";
    //execute qurey.
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret);
    //check if username has been taken
    if ($username == $row['username']) {
        //username has been taken, error info
        header("Location:register.php?err=1");
    } else {
        //username has not been
        $sql_insert = "INSERT INTO Userinfo(username,password) VALUES('$username','$password')";
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //close connection
    mysqli_close($conn);
} else {
    header("Location:register.php?err=2");
}
?>