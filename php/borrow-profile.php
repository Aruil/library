<?php
	session_start();
	$mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
	$mysqli->set_charset("utf8");
	if($mysqli->connect_errno){echo 'could not connect to database';}

	$redirect = "../profile.php";

	$query = "SELECT * FROM documents WHERE useridLended=".$_SESSION["logged_user_id"]." order BY title;";
    $result = $mysqli->query($query);

    if($result->num_rows == 0){
        $_SESSION["lended_message"] = "Δεν έχετε δανειστεί κανένα έγγραφο ακόμη.";
    }else{
    	$count=0;
    	$returnArray = array(array());

    	while($row = $result->fetch_assoc()){
            $returnArray[$count] = $row;
            $count++;
        }
        $_SESSION["lended_results"]=$returnArray;
        $_SESSION["profile_count"]=$count;
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
