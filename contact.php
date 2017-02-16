<!DOCTYPE HTML>

<html>
<head>
    
    <title>Contact</title>
    
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
            
            <a href="index.php"><li  class="menuItem">Home Page</li></a>
            <a href="findAPet.php"><li class="menuItem">Find a Pet</li></a>
            <a href="dogCare.php"><li class="menuItem">Dog Care</li></a>
            <a href="catCare.php"><li class="menuItem">Cat Care</li></a>
           <?php echo $giveaway; ?>
            <a href="contact.php"><li class="menuItem" style="background-color:#69C26A;">Contact</li></a>
            <?php echo $login; ?>
        
        </ul>
    
    </div>
    
    <div id="contentArea">

        <h1 class="pageTitle">Contact Us</h1>
        
        <h3 class="subtitle">Name</h3>
        
        <p class="para1">Kevin Zhang</p>
        
        <h3 class="subtitle">Student ID</h3>
        <p class="para1">27755597</p>
        
        <h3 class="subtitle">Address</h3>
        <p class="para1">1600 Pennsylvania Ave NW, Washington</p>
        
        <h3 class="subtitle"></h3>
        <p class="para1"></p>
        
        <h3 class="subtitle">Email</h3>
        <p class="para1">kevinunderscore1995@gmail.com</p>
        
        <h3 class="subtitle">Phone</h3>
        <p class="para1">+1 202-456-1111</p>
        
        <h3 class="subtitle">Sources</h3>
        <a class="para1" style="padding-left:4px;" href="http://www.clipartbest.com/cliparts/ecM/k5g/ecMk5g7Mi.png">Header Logo</a>
        <br/>
        <a class="para1" style="padding-left: 4px;" href="http://33.media.tumblr.com/669dbc24fb94f8958c38984fe2f8051e/tumblr_inline_n0rle1eZuu1s0subn.png">Home Page Picture</a>
    
    </div>
    
    </div>
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>