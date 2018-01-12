<?php
    session_start();

    if(!isset($_SESSION["libsearch_results"]) && !isset($_SESSION["search_message"])){
        if(isset($_SESSION["liblast_option"])){
            if($_SESSION["liblast_option"] == "all"){
                $redirect = "./php/alllibs.php";
            }else{
                $redirect = "./php/searchlib.php";
            }
        }else{
            $redirect = "./index.php";
        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<?php if(!isset($_SESSION["libsearch_results"]) && !isset($_SESSION["search_message"])){ ?>
<meta HTTP-EQUIV="REFRESH" content="0; url=<?php echo $redirect;?>" />
<?php } ?>
<title>Βιβλιοθήκες και Υπηρεσίες Πληροφόρησης - Αρχική Σελίδα</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="css/search.css" rel="stylesheet" type="text/css">
<link href="css/libsearchResults.css" rel="stylesheet" type="text/css">
<link href="css/search_library.css" rel="stylesheet" type="text/css">
<script src="scripts/login.js" type="text/javascript"></script>
<script src="scripts/searchswitch.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body style="
    min-width: 1040px;
    min-height: 960px;
    background-color: #ffffff;
    background: linear-gradient(to right, #ffffff, #cce5ff);">
<div id="container">
    <div id="header">
        <div id="logo">
            <a href="index.php"><img src="images/uoa.png" alt="logo"></a>
        </div>
        <h1><a href="index.php">
            Βιβλιοθήκες <br/>
                και Υπηρεσίες Πληροφόρησης</a></h1>
        <div id="login">
            Καλώς ήρθες, <?php if(!isset($_SESSION["logged_user"])){?><a class="link1" href='register.php'>Εγγραφή</a> ή <a class="link2"href='#' onclick="toggle_login('login', 'loginBox')">Σύνδεση</a><?php }else{?><a class="link1" href='./php/borrow-profile.php'><?php echo $_SESSION["logged_user"]; ?></a> (<a class="link2"href='./php/logout.php'>Αποσύνδεση</a>)<?php } ?>
        </div>
        <div style="color:red;font-size:x-small">
            <?php
                if(isset($_SESSION["login_message"])){
                    echo "<p>".$_SESSION["login_message"]."</p>";
                    unset($_SESSION["login_message"]);
                }
            ?>
        </div>
        <div id="loginBox">
            <div id="uoaAuth"><img class="img1" src="images/education_icons_IF-02-512.png" width="45" height="39"><a class="text" href='#'>Είσοδος μέσω <span class="empty"></span>Κεντρικής </br> Υπηρεσίας Πιστοποίησης</a><img class="img2" src="images/256.png" width="25" height="25">
            </div>
            <form class="nonUoaAuth" method="POST" action="php/login.php">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="password" placeholder="Συνθηματικό">
                <input type="submit" name="login" class="submit" value="Σύνδεση">
            </form>
            <button class="cancel" onclick="toggle_login('loginBox', 'login')">Ακύρωση</button>
        </div>
    </div>
    <div style="clear:both"></div>
    <div id="menu">
    <ul class="button-list">
        <li class="button">
            <div id="dd" class="dropdown-button" tabindex="1">ΥΠΗΡΕΣΙΕΣ
                <ul class="dropdown">
                    <li><a href="#" onclick="toggle_search('searchboxLib', 'searchbox')">Αναζήτηση Περιεχομένου</a></li>
                    <li><a href="#">Σύνθετη Αναζήτηση</a></li>
                </ul>
            </div>
        </li>
        <li class="button">
            <div id="dd1" class="dropdown-button" tabindex="2">ΒΙΒΛΙΟΘΗΚΕΣ
                <ul class="dropdown">
                    <li><a href="#" onclick="toggle_search('searchbox', 'searchboxLib')">Αναζήτηση</a></li>
                    <li><a href="./php/alllibs.php">Πλοήγηση</a></li>
                </ul>
            </div>
        </li>
        <li class="button">
            <div class="link"><a href='#'>ΑΝΑΚΟΙΝΩΣΕΙΣ</a></div>
        </li>
        <li class="button">
            <div class="link"><a class="link" href='#'>ΒΟΗΘΕΙΑ</a></div>
        </li>
        <?php if(isset($_SESSION["logged_user"])){?>
        <li class="button">
            <div id="dd2" class="dropdown-button" tabindex="3"><?php echo $_SESSION["logged_user"]; ?>
                <ul class="dropdown">
                    <li><a href="./php/borrow-profile.php">Προφίλ</a></li>
                    <li><a href="./php/logout.php">Αποσύνδεση</a></li>
                </ul>
            </div>
        </li><?php }?>
    </ul>
    </div>
    <div style="clear:both"></div>
    <div id="announcements">
        <div class="title"> Πρόσφατες Ανακοινώσεις</div>
            <ul class="annlist">
                <li class="announcement">a</li>
                <li class="announcement">b</li>
                <li class="announcement">c</li>
                <li class="announcement">d</li>
            </ul>
    </div>
    <div id="rest">
        <form id="searchbox" method="POST" action="./php/search.php">
            <div class="fields">
                <input id="search" type="text" placeholder="Αναζήτηση Περιεχομένου" name="search">
                <input id="submit" type="submit" value="Αναζήτηση">
                <select id="search-options" name="option">
                    <option value="title">Τίτλος</option>
                    <option value="author">Συγγραφέας</option>
                </select>
                <a class="advanced-search" href="#">Σύνθετη Αναζήτηση</a>
            </div>
        </form>
        <form id="searchboxLib" method="POST" action="./php/searchlib.php">
        <div class="fieldsLib">
            <input id="searchLib" type="text" placeholder="Αναζήτηση Βιβλιοθήκης" name="libsearch">
            <input id="submitLib" type="submit" value="Αναζήτηση">
            <div style="clear:both"></div>
            <select id="search-optionsLib" name="liboption">
                <option value="libName">Όνομα</option>
                <option value="department">Τμήμα</option>
                <option value="address">Διεύθυνση</option>
            </select>
        </div>
        </form>
        <div class="infobox">
            <div style="color:red;text-align:center">
            <?php
                if(isset($_SESSION["search_message"])){
                    echo "<p>".$_SESSION["search_message"]."</p>";
                    unset($_SESSION["search_message"]);
            ?>
            </div>
            <ul class="resultList">
            <?php
                }else{
                    if(isset($_SESSION["libsearch_results"])){
                        $results = $_SESSION["libsearch_results"];
                        $count = $_SESSION["libsearch_count"];
                        unset($_SESSION["libsearch_results"]);
                        unset($_SESSION["libsearch_count"]);

                    for($i = 0; $i < $count; $i++){
            ?>
                <li class="result">
                    <div class="resultText">
                    <div style="font-size:20px;font-weight:bold;color:black;">
                        <?php if($results[$i]["website"] != null){ ?>
                        <a href="<?php echo $results[$i]["website"] ?>">
                        <?php } ?>
                            <?php echo $results[$i]["libName"] ?>
                        <?php if($results[$i]["website"] != null){ ?>
                        </a>
                        <?php } ?>
                    </div>
                    <div style="font-size:16px;color:black;">
                        <b>Τμήμα:</b> <?php echo $results[$i]["department"] ?> <b>Διευθυνση:</b> <?php echo $results[$i]["address"] ?>
                    </div>
                    <div style="font-size:16px;color:black;">
                        <b>Στοιχεία επικοινωνίας:</b> <a href="tel:<?php echo $results[$i]["telNum"] ?>"><?php echo $results[$i]["telNum"] ?></a> <a href="mailto:<?php echo $results[$i]["email"] ?>"><?php echo $results[$i]["email"] ?></a>
                    </div>
                    </div>
                    <form name="hiddenForm<?php echo $i ?>" method="POST" action="./php/search.php">
                    <input type="hidden" name="option" value="libName">
                    <input type="hidden" name="search" value="<?php echo $results[$i]["libName"] ?>">
                    <a href="javascript:document.forms['hiddenForm<?php echo $i ?>'].submit()"><div class="lendButton">Έγγραφα</div></a>
                    </form>
                    <br style="clear:both"/>
                </li>
            <?php
                    }}
                }
            ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="scripts/menu.js"></script>
</body>
</html>
