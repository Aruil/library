<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $mail = $_POST["email"];
    $pass = $_POST["password"];

    $query = "SELECT idUsers,username,email,password FROM users";
    $result = $mysqli->query($query);
    $success = false;
    while($row = $result->fetch_assoc()){
        if($row["email"] == $mail){
            if($row["password"] == $pass){
                $user = $row["username"];
                $id = $row["idUsers"];
                $success = true;
            }
            break;
        }
    }
    $result->close();

    if($success){
        $redirect = "../index.php";
        $_SESSION["logged_user"] = $user;
        $_SESSION["logged_user_id"] = $id;
        unset($_SESSION["login_message"]);
    }else{
        $redirect = "../index.php";
        $_SESSION["login_message"] = "Λανθασμένο Όνομα Χρήστη ή/και Κωδικός.";
    }

    $mysqli->close();
?>
<html>
<head>
<meta charset="utf-8">
<meta HTTP-EQUIV="REFRESH" content="0; url=<?php echo $redirect;?>" />
</head>
<body>
</body>
</html>
