<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $redirect = "./search.php";

    $userid = $_SESSION["logged_user_id"];
    $title = $_POST["title"];

    $query = "SELECT * FROM documents WHERE title='".$title."' and isLended=0;";
    $result = $mysqli->query($query);

    $row = $result->fetch_assoc();
    $docid = $row["idDocuments"];
    $result->close();
    $interval = 'P7D';
    $date = new DateTime("NOW");
    $date->add(new DateInterval($interval));

    $query = "UPDATE documents SET returnDate='{$date->format('Y-m-d H:i:s')}', useridLended=".$userid.", isLended=1 WHERE idDocuments=".$docid.";";
    $result = $mysqli->query($query);

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
