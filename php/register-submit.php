<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $name = $_POST["first_name"];
    $surname = $_POST["last_name"];
    $mail = $_POST["user_email"];
    $pass = $_POST["user_password"];
    $username = $_POST["username"];
    $department = $_POST["department"];
    $exists = false;

    $query = "SELECT email FROM users";
    $result = $mysqli->query($query);
    while($row = $result->fetch_assoc()){
        if($row["email"] == $mail){
            $exists = true;
            break;
        }
    }
    $result->close();

    $redirect = "";

    if($exists){
        $redirect = "../register.php";
        $_SESSION["register_message"] = "Το mail που δώσατε υπάρχει ήδη.";
    }else{
        $query = "INSERT INTO users(username,surname,email,department,name,password) VALUES('$username','$surname','$mail','$department','$name','$pass')";
        $mysqli->query($query);

        $_SESSION["logged_user"] = $username;
        $redirect = "../index.php";
        unset($_SESSION["register_message"]);
    }

    $mysqli->close();
?>
<html>
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=<?php echo $redirect;?>" />
</head>
<body>
</body>
</html>
