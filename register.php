<!DOCTYPE HTML>

<html>
<head>
    
    <title>Register</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" href="theme.css">
    
    <script src="clock.js" type="text/javascript"></script>
    
</head>
    
    
<body>
    
    <?php 
    include 'header.php'; 
    
    $message = "Your username may contain letters and digits.\nYour password must be at least 4 characters long and and contain at least 1 digit and 1 letter.";
    $userErr = $passErr = "";
    $user = $pass = "";
    $userTrue = $passTrue = false;
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["user"])) {
            $userErr = "Please enter a username.";
        }
        else {
            $user = $_POST["user"];
            if(!preg_match("/^[a-zA-Z0-9 ]*$/",$user)) {
                $userErr = "Your username can only contain letters and digits.";
            } else {
                $userTrue = true;
            }
        }
        if(empty($_POST["pass"])) {
            $passErr = "Please enter a password.";
        }
        else {
            $pass = $_POST["pass"];
            if (strlen($pass) < 4) {
                $passErr = "Password must contain at least 4 characters";
            }
            elseif (!preg_match("#[0-9]+#", $pass)) {
                $passErr = "Password must contain at least 1 number";
            }
            elseif (!preg_match("#[a-zA-Z]+#", $pass)) {
                $passErr = "Passsword must contain at least one letter";
            } else {
                $passTrue = true;
            }
        }
    }
    
    if($userTrue && $passTrue) {
        $info = "$user:$pass\n";
        $handle = fopen('login.txt', 'r');
        $temp = "";
        $line = "";
        while(!feof($handle)) {
            $line = fgets($handle);
            $arr = explode(":",$line);
            $temp = $arr[0];
            if(strcmp($temp,$user) == 0) {
                $message = "That account already exists!";
                $userTrue = false;
            }
        }
        fclose($handle);
        if($userTrue) {
            $handle = fopen('login.txt', 'a+');
            if(fwrite($handle, $info)) {
                $message = "Account Created!";
            }
            fclose($handle);
        }
    }
    
    
    ?>
    
    <div id="mainBody">
    
    <div id="sideMenu">
    
        <ul>
            
            <a href="index.php"><li class="menuItem">Home Page</li></a>
            <a href="findAPet.php"><li class="menuItem">Find a Pet</li></a>
            <a href="dogCare.php"><li class="menuItem">Dog Care</li></a>
            <a href="catCare.php"><li class="menuItem">Cat Care</li></a>
            <a href="login.php"><li class="menuItem">Login</li></a>
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <a href="register.php"><li class="menuItem" style="background-color:#69C26A;">Create an Account</li></a>
        
        </ul>
    
    </div>
    
    <div id="contentArea">
        
        <h1 class="pageTitle">Register</h1>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
            <fieldset>
        
                <legend>Account Information</legend>
                
                <label>Username:
                <input type="text" name="user"></label>
                    <span class="red"> <?php echo $userErr ?> </span>
                <br/><br/>
                
                <label>Password:
                <input type="password" name="pass"></label>
                <span class="red"> <?php echo$passErr ?></span>
                <br/><br/>
                
                <input type="submit" value="Submit">
            
            </fieldset>
        
            
        </form>
        
        <?php
        
        echo $message;
        
        ?>
    
    </div>
        
    <div id="bottomLeft"></div>
        
    </div>
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>