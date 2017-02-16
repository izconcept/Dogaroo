<!DOCTYPE HTML>

<html>
<head>
    
    <title>Login</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" href="theme.css">
    
    <script src="clock.js" type="text/javascript"></script>
    
</head>
    
    
<body>
    
    <?php 
    include 'header.php'; 
    
    $message = "";
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
                $userErr = "Your username should only contain letters and digits.";
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
                $passErr = "Password should contain at least 4 characters";
            }
            elseif (!preg_match("#[0-9]+#", $pass)) {
                $passErr = "Password should contain at least 1 number";
            }
            elseif (!preg_match("#[a-zA-Z]+#", $pass)) {
                $passErr = "Passsword should contain at least one letter";
            } else {
                $passTrue = true;
            }
        }
    }
    
    if($userTrue && $passTrue) {
        $info = "$user:$pass\n";
        $handle = fopen('login.txt', 'r');
        $line = "";
        while(!feof($handle)) {
            $line = fgets($handle);
            if(strcmp($line,$info) == 0) {
                echo '<script type="text/javascript">alert("Successfully logged in!")</script>';
                fclose($handle);
                session_start();
                $message = "sessions started";
                $_SESSION['login']=$user;
                header('location: petGiveaway.php');
            }
        }
        fclose($handle);
        if($userTrue) {
            $message = "Wrong username or password";
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
            <a href="login.php"><li class="menuItem" style="background-color:#69C26A;">Login</li></a>
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <a href="register.php"><li class="menuItem">Create an Account</li></a>
        
        </ul>
    
    </div>
    
    <div id="contentArea">
        
        <h1 class="pageTitle">Login</h1>
        
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
            
            <p style="font-size: 0.8em;">No Account? Register <a id="registerLink" href="register.php">here</a>.</p>
        
            
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