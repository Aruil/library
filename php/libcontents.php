<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $redirect = "../results.php";

    $query = "SELECT * FROM documents WHERE libName='".$_POST["library"]."' GROUP BY title;";
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

        $query = "SELECT title,isLended FROM documents WHERE ".$type."='$search'";
        $result2 = $mysqli->query($query);

        $i = 0;
        $count = 0;
        $row = $result2->fetch_assoc();
        $temp = $row["title"];
        if($row["isLended"] == 1){
            $count++;
        }
        while($row = $result2->fetch_assoc()){
            if($row["title"] == $temp ){
                if($row["isLended"] == 1){
                    $count++;
                }
            }else{
                $temp = $row["title"];
                $lendedArray[$i] = $count;
                $count = 0;
                $i++;
            }
        }
        $lendedArray[$i] = $count;

        $_SESSION["search_results"] = $returnArray;
        $_SESSION["search_count"] = $count;

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
