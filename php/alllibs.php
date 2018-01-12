<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $redirect = "../libresults.php";
    $_SESSION["liblast_option"] = "all";

    $query = "SELECT * FROM libraries;";
    $result = $mysqli->query($query);

    if($result->num_rows == 0){
        $_SESSION["search_message"] = "Δεν βρέθηκαν αποτελέσματα.";
    }else{
        $count = 0;
        $returnArray = array(array());
        $lendedArray = array();

        while($row = $result->fetch_assoc()){
            $returnArray[$count] = $row;
            $count++;
        }

        $_SESSION["libsearch_results"] = $returnArray;
        $_SESSION["libsearch_count"] = $count;

    }
    $result->close();

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
