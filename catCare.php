<!DOCTYPE HTML>

<html>
<head>
    
    <title>Cat Care</title>
    
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
            <a href="catCare.php"><li class="menuItem" style="background-color:#69C26A;">Cat Care</li></a>
            <?php echo $giveaway; ?>
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <?php echo $login; ?>
        
        </ul>
    
    </div>
    
    <div id="contentArea" >

        <h1 class="pageTitle">Cat Care</h1>
        
        <h3 class="subtitle">Give your cat regular exams</h3>
        
        <p class="para1">Like dogs, cats require annual checkups to stay healthy, cats are subseptible to multiple diseases and checks are vital to detect them and prescribe the correct treatment.</p>
        
        <h3 class="subtitle">Beware of toxic substances</h3>
        
        <p class="para1">Many household foods are poisonous for cats; the most common of which are chocolate and raisins. Chocolate contains theobromine which is toxic towards animals such as dogs and cats. Just a small dose of a few mg of theobroine is sufficient enough to kill your cat. It is advised to simlply not feed your cat human food.</p>
        
        <h3 class="subtitle">Cut your cats nails</h3>
        
        <p class="para1">If you plan on keeping your cat indoors at all times, it is recommended to have his nails cut or permanantly removed. Unlike dogs, it is much more difficult to train cats to stop scratching up your lovely new leather sofa. Therefore removing his or her nails would be beneficial. However, if you plan on letting the cat outside, it may be prudent to leave his or her nails uncut so he or she may defend himself effectively. The cats nails are its primary source of defense and removing effectively renders a cat useless outside</p>
        
        <h3 class="subtitle">Regulate your cats food</h3>
        
        <p class="para1">A cats health is directly related to his or her weight. An overweight cat won't be as active and can develop several diseases. It is imperative that you feed your cat the correct amount of food each day. It is also important to refrain from feeding your cat human food as many human foods are hard to digest for your cat and some, such as chocolate, are even poisonous.</p>
        
        <h3 class="subtitle">Regular vaccinations</h3>
        
        <p class="para1">Regular vaccinations are critical in insuring your cats health. Cats are subseptible to multiple diseases and viruses and getting them vaccinated is there number 1 defense to prevent your cat from contracting these harmful diseases</p>
    
    
    </div>
    
    
    </div>
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>