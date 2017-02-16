<!DOCTYPE HTML>

<html>
<head>
    
    <title>Home Page</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" href="theme.css">
    
    <script src="clock.js" type="text/javascript"></script>
    
</head>
    
    
<body>
    
    <?php 
    include 'header.php'; 
    session_start();
    $login = "";
    $giveaway = "";
    if(isset($_SESSION['login'])) {
        $login="<a href=\"logout.php\"><li class=\"menuItem\">Logout</li></a>";
        $giveaway ="<a href=\"petGiveaway.php\"><li class=\"menuItem\">Have a pet to Give Away?</li></a>";
    } else {
        $login="<a href=\"register.php\"><li class=\"menuItem\">Create an Account</li></a>";
        $giveaway ="<a href=\"login.php\"><li class=\"menuItem\">Login</li></a>";
    }
    ?>
    
    <div id="mainBody">
    
    <div id="sideMenu">
    
        <ul>
            
            <a href="index.php"><li style="background-color:#69C26A;" class="menuItem">Home Page</li></a>
            <a href="findAPet.php"><li class="menuItem">Find a Pet</li></a>
            <a href="dogCare.php"><li class="menuItem">Dog Care</li></a>
            <a href="catCare.php"><li class="menuItem">Cat Care</li></a>
            <?php echo $giveaway; ?>
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <?php echo $login; ?>
        
        </ul>
    
    </div>
    
    <div id="contentArea">
        
        <h1 class="pageTitle">Home</h1>

        <img style="width: 100%; height:75%"src="logo.png"/>
        
        <p class="symbol"> Welcome to Dogaroo, the world's <span class="strongText">NUMBER ONE</span> destination for all things pet related. We cater to cats as well! Just don't bring your pet rattlesnake in!</p>
        
        <br/>
        
        <p class="symbol"> Find your next pet or give your current pet a loving and caring new family!</p>
    
    </div>
        
    <div id="bottomLeft"></div>
        
    </div>
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>