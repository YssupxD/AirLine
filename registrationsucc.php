<!DOCTYPE html>
<html>
<head>
    <title>Login Successfully!</title>
    <meta name="content-type";
          charset="UTF-8">
</head>
<body>
<div>
    <?php
    session_start();
    $username = isset($_SESSION['user']) ? $_SESSION['user'] : "";
    if (true) { ?>
        <h1>Registration Successfully！</h1>
        Welcome you!
        <?php
        echo $username;
        ?>
        <?php
        header("refresh:3;url=index.php");
        print('Jumping to login page in 3s...<br>');
        ?>
        <?php
    } else {
        ?>
        <h1>Have no permission to visit.</h1>
        <?php
    }
    ?>
</div>
</body>
</html>