<?php

$username = isset($_POST['username']) ? $_POST['username'] : "";
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
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
        header("Location:registration.php?err=1");
    } else {
        //username has not been taken
        $sql_insert = "INSERT INTO Userinfo(username,password,firstname,lastname) VALUES('$username','$password','$firstname', '$lastname')";
        mysqli_query($conn, $sql_insert);
        header("Location:registration.php?err=3");
        print('Loading home page in 3s...<br>');
    } //close connection
    header("Location:registrationsucc.php");
    mysqli_close($conn);
} else {
    header("Location:registration.php?err=2");
}
?>