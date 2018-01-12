<?php
	session_start();
	$mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
	$mysqli->set_charset("utf8");
	if($mysqli->connect_errno){echo 'could not connect to database';}

	$redirect = "./borrow-profile.php";

	$query = "UPDATE documents SET returnDate = DATE_ADD(returnDate,INTERVAL 7 DAY) WHERE idDocuments = ".$_POST["docID"];
	echo $_POST["docID"];
    $result = $mysqli->query($query);

    if($result){
        $_SESSION["refresh_message"] = "Η Προθεσμία Δανεισμού Ανανεώθηκε Με Επιτυχία.";
    }else{
    	$_SESSION["refresh_message"] = "Η Ανανέωση Απέτυχε";
    	echo $query;
    }
    $mysqli->close();
?>

<html>
<head>
<meta charset="utf-8">
<meta HTTP-EQUIV="REFRESH" content="0; url=<?php echo $redirect;?>"/>
</head>
<body>
</body>
</html>
