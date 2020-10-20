<?php

$conn = mysqli_connect("localhost", "root", "9512", "Airline");

if($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
$sql = "SELECT username FROM Userinfo WHERE logged = 'Yes'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
    $username = $row['username'];
}
echo  print_r($_POST);

$aircraft = isset($_POST['aircraft']) ? $_POST['aircraft'] : "";
$origin = isset($_POST['from_w']) ? $_POST['from_w'] : "";
$dest = isset($_POST['to_w']) ? $_POST['to_w'] : "";
$date = isset($_POST['book_date']) ? $_POST['book_date'] : "";
$depTime = isset($_POST['flt_time']) ? $_POST['flt_time'] : "";
echo "AC=$aircraft\n";

$sql_insert = "INSERT INTO Booking (username,aircraft,origin,dest,date,depTime)
               VALUES ('$username','$aircraft','$origin','$dest','$date','$depTime')";
echo "$sql_insert";
mysqli_query($conn, $sql_insert);
mysqli_close($conn);
header("Location:userinfo.php");

