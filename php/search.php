<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'eamuser6', 'slimkarelias!', 'eamuser6');
    $mysqli->set_charset("utf8");
    if($mysqli->connect_errno){echo 'could not connect to database';}

    $redirect = "../results.php";

    if((isset($_POST) && array_key_exists('search',$_POST)) ||
       isset($_SESSION["last_option"])){
        if(isset($_POST) && array_key_exists('search',$_POST)){
            $type = $_POST["option"];
            $search = $_POST["search"];
            $_SESSION["last_option"] = $type;
            $_SESSION["last_search"] = $search;
        }else{
            $type = $_SESSION["last_option"];
            $search = $_SESSION["last_search"];
        }

        $query = "SELECT *,count(*) FROM documents WHERE ".$type."='$search' group BY title,author;";
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

            $_SESSION["search_results"] = $returnArray;
            $_SESSION["search_count"] = $count;

            $query = "SELECT title,isLended FROM documents WHERE ".$type."='$search' ORDER BY title,author";
            $result2 = $mysqli->query($query);

            $i = 0;
            $count = 0;
            $row = $result2->fetch_assoc();
            $temp = $row["title"];
            if($row["isLended"] == 1){
                $count++;
            }
            while($row = $result2->fetch_assoc()){
                if($row["title"] != $temp ){
                    $temp = $row["title"];
                    $lendedArray[$i] = $count;
                    $count = 0;
                    $i++;
                }
                if($row["isLended"] == 1){
                    $count++;
                }
            }
            $lendedArray[$i] = $count;

            $_SESSION["lended_count"] = $lendedArray;
            $result2->close();
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
