<!DOCTYPE HTML>

<html>
<head>
    
    <title>Dog Care</title>
    
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
            <a href="dogCare.php"><li class="menuItem" style="background-color:#69C26A;">Dog Care</li></a>
            <a href="catCare.php"><li class="menuItem">Cat Care</li></a>
            <?php echo $giveaway; ?>
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <?php echo $login; ?>
        
        </ul>
    
    </div>
    
    <div id="contentArea">

        <h1 class="pageTitle">Dog Care</h1>
        
        <h3 class="subtitle">Give your dog regular exams</h3>
        
        <p class="para1">Getting your dog checked every 6 months is vital to keeping him or her healthy. Much like humans, dogs can devlelop a plethora of health problems such as arthritis and cavities</p>
        
        <h3 class="subtitle">Neuter your dog</h3>
        
        <p class="para1">Making your dog infertile may not seem that important to the health of your dog, but it controls the population of dogs considerably. Every year, more and more dogs are found without homes and the principle cause of this can be attributed to lack of population control amongst pets</p>
        
        <h3 class="subtitle">Prevent fleas</h3>
        
        <p class="para1">Fleas are the most common parasites that can effect your dog. They cause iritation, hair loss and several other health related issues for your do. Animals can also become infected from fleas carrying harmful diseases and viruses. Tapeworms, the most common disease amongst dogs, is attributed to fleas.</p>
        
        <h3 class="subtitle">Maintain his or her weight</h3>
        
        <p class="para1">Much like humans, the weight of an animal will have a direct impact on his life expectancy, health, and overall quality of life. Unlike humans, dogs need constant control to make sure they don't over eat. It's a good habit to feed your dog only his food and not human food.</p>
        
        <h3 class="subtitle">Regular vaccinations</h3>
        
        <p class="para1">Regular vaccinations are critical in insuring your dogs' health. Dogs are subseptible to multiple diseases and viruses and getting them vaccinated is there number 1 defense to prevent your dog from contracting these harmful diseases</p>
    
    </div>
        
        
    
    </div>
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>