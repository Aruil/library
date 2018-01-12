<?php
    session_start();
    if(isset($_SESSION["libsearch_results"])) unset($_SESSION["libsearch_results"]);
    if(isset($_SESSION["search_message"])) unset($_SESSION["search_message"]);
    if(isset($_SESSION["search_results"])) unset($_SESSION["search_results"]);
    if(isset($_SESSION["liblast_option"])) unset($_SESSION["liblast_option"]);
    if(isset($_SESSION["last_option"])) unset($_SESSION["last_option"]);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>Βιβλιοθήκες και Υπηρεσίες Πληροφόρησης - Αρχική Σελίδα</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="css/search.css" rel="stylesheet" type="text/css">
<link href="css/register.css" rel="stylesheet" type="text/css">
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

        <form id="regform" method="POST" action="./php/register-submit.php">

        <h1>Φόρμα Εγγραφής</h1>
          <div style="float:left;">
          <label for="name">* Όνομα:</label>
          <input type="text" id="name" name="first_name">
          </div>
          <div style="float:left;">
          <label for="surname">* Επώνυμο:</label>
          <input type="text" id="surname" name="last_name">
          </div>
          <div style="clear:both;"/>
          <div style="float:left;">
          <label><for="username">* Όνομα Χρήστη:</label>
          <input type="text" id="username" name="username">
          </div>
          <div style="float:left;">
          <label for="mail">* E-mail:</label>
          <input type="email" id="mail" name="user_email">
          </div>
          <div style="clear:both;"/>
          <div style="float:left;">
          <label for="password">* Κωδικός Πρόσβασης:</label>
          <input type="password" id="password" name="user_password">
          </div>
          <div style="float:left;">
          <label for="confirm_pass">* Επιβεβαίωση Κωδικού Πρόσβασης:</label>
          <input type="password" id="confirm_pass" name="confirm_password">
          </div>
          <div style="clear:both;"/>
          <label for="department">* Τμήμα:</label>
          <input type="text" id="department" name="department">
        <h4>* Τα πεδία με αστερίσκο είναι υποχρεωτικά</h4>

        <div style="color:red">
        <?php
            if(isset($_SESSION["register_message"])){
                echo "<p>".$_SESSION["register_message"]."</p>";
                unset($_SESSION["register_message"]);
            }
        ?>
        </div>
        <button type="submit" onClick="return validateForm(this.form);">Εγγραφή</button>
      </form>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="scripts/menu.js"></script>
<script language="javascript">

  function validateForm(form)
  {
    var name = form.first_name.value;
    if (name == "")
    {
      alert("Please give a name");
      return false;
    }
    var surname = form.last_name.value;
    if (name == "")
    {
      alert("Please give a surname");
      return false;
    }
    var surname = form.username.value;
    if (surname == "")
    {
      alert("Please give a username");
      return false;
    }
    var email = form.user_email.value;
    if (!isValidEmail(email))
    {
            form.txtEmail.focus();
      form.txtEmail.select();
      alert("Please give a valid email");
      return false;
    }
    var pass = form.user_password.value;
    if(pass == "")
    {
      alert("Please give a password");
      return false;
    }
    var confirm_pass = form.confirm_password.value;
    if(confirm_pass==""){
      alert("Please confirm your password");
      return false;
    }
    if(confirm_pass!=pass){
      alert("Passwords don't match");
      return false;
    }
    var department = form.department.value;
    if (department == "")
    {
      alert("Please give a department");
      return false;
    }
    return true;
  }

  function isValidEmail(strEmail)
  {
    validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;
      if (strEmail.search(validRegExp) == -1)
    {
      return false;
    }
    return true;
  }

  </script>
</body>
</html>
