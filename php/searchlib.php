<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $redirect = "../libresults.php";

    if(isset($_POST) && array_key_exists('libsearch',$_POST) ||
       isset($_SESSION["liblast_option"])){
        if(isset($_POST) && array_key_exists('libsearch',$_POST)){
            $type = $_POST["liboption"];
            $search = $_POST["libsearch"];
            $_SESSION["liblast_option"] = $type;
            $_SESSION["liblast_search"] = $search;
        }else{
            $type = $_SESSION["liblast_option"];
            $search = $_SESSION["liblast_search"];
        }

        $query = "SELECT * FROM libraries WHERE ".$type."='$search';";
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
    }else{
        $_SESSION["search_message"] = "Δεν γράψατε κάτι προς αναζήτηση.";
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
