<!DOCTYPE HTML>

<html>
<head>
    
    <title>Give Away your Pet</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" href="theme.css">
    
    <script src="clock.js" type="text/javascript"></script>
    
</head>
    
    
<body>
    
    <?php 
    include 'header.php';
    $message = "";
    $login = "";
    $giveaway = "";
    if(isset($_SESSION['login'])) {
        $login="<a href=\"register.php\"><li class=\"menuItem\">Create an Account</li></a>";
        $giveaway ="<a href=\"login.php\"><li class=\"menuItem\">Login</li></a>";
    } else {
        $login="<a href=\"logout.php\"><li class=\"menuItem\">Logout</li></a>";
        $giveaway ="<a href=\"petGiveaway.php\"><li class=\"menuItem\" style=\"background-color:#69C26A;\">Have a pet to Give Away?</li></a>";
    }
    if(isset($_POST["animal"])) {
        session_start();
        $index = 0;
        $user = $_SESSION['login'];
        $type = $_POST["animal"];
        $breed = $_POST["Breed"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $first = $_POST["firstName"];
        $last = $_POST["lastName"];
        $email = $_POST["email"];
        $traits = "";
        $comment = "";
        
        $reader=fopen("pets.txt", "r");
        while(!feof($reader)) {
            fgets($reader);
            $index++;
        }
        fclose($reader);

        if(isset($_POST["dfriend"])) {
            $traits = $traits."Dog Friendly, ";
        }
        if(isset($_POST["cfriend"])) {
            $traits = $traits."Cat Friendly, ";
        }
        if(isset($_POST["chfriend"])) {
            $traits = $traits."Child Friendly ";
        }
        if(isset($_POST["comments"])) {
            $comments = $_POST["comments"];
        }
        
        $info = "$index:$user:$type:$breed:$age:$gender:$first:$last:$email:$traits:$comments\n";
        
        $handle=fopen("pets.txt", "a+");
        
        if(fwrite($handle, $info)) {
            $message = "<span style=\"font-size:0.8em;\">Pet entry created!</span>";
        }
        fclose($handle);
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
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <?php echo $login; ?>
        
        </ul>
    
    </div>
    
    <div id="contentArea">

        <h1 class="pageTitle">Finding your cat a new home</h1>
        
        <form name="search" method="post" onsubmit="return giveChecker()">
        
            <fieldset>
            
                <legend>Animal Description</legend>
            
                Animal Type
                <label><input id="typeDog" type="radio" value="dog" name="animal" onchange="breedSwitch()"/>
                Dog</label>
                <label><input id="typeCat" type="radio" value="cat" name="animal" onchange="breedSwitch()"/>
                Cat</label>
            
                <br/><br/><hr/><br/>
                
                Breed
                <select name="Breed" id="breed">
                    
                </select>
                
                <br><br/><hr/><br/>
                
                Age
                <select name="age">
                    <option value="null">--------------Select--------------</option>
                    <option value="pup">NewBorn(Under 12 months)</option>
                    <option value="Young">Child(Under 3 years)</option>
                    <option value="Adult">Adult(3-8years)</option>
                </select>
                
                <br/><br/><hr/><br/>
                
                Gender: 
                <label><input type="radio" value="female" name="gender"/>
                Female</label>
                <label><input type="radio" value="male" name="gender"/>
                Male</label>
                
                <br/><br/><hr/><br/>
                
                Behavioural Traits
                <br/>
                <label><input type="checkbox" value="dogfriend" name="dfriend">Dog Friendly</label>
                <br/>
                <label><input type="checkbox" value="catfriend" name="cfriend">Cat Friendly</label>
                <br/>
                <label><input type="checkbox" value="childfriend" name="chfriend">Child Friendly</label>
            
                <br/><br/><hr/><br/>
            
                <label>Comments
                <br/>
                <input type="text" style="height: 50px; width:400px" name="comments"/></label>
                
                <br/><br/><hr/><br/>
                <label>Given Name<input type="text" placeholder="John" name="firstName"/></label>
                
                <label>Last Name<input type="text" placeholder="Smith" name="lastName"/></label>
                
                <br/><br/>
                <label>Email Address<input type="text" placeholder="kevinunderscore95@concordia.ca" style="width:220px;" name="email"/></label>
                
            </fieldset>
            
            <br/>
            
            <input type="submit" value="Submit" action="submit"/>
            <input type="submit" value="Reset" action="reset"/>
            <?php echo $message ?>
            
            
        </form>
        
    </div>
    
    
    </div>
    
    <?php include 'footer.php' ?>
    
    <script type="text/javascript">
    
        function breedSwitch() {
            if(document.getElementById("typeDog").checked) {
                document.getElementById("breed").innerHTML = '<option value="null">-------------Select-------------</option><option value="LabRetriever">Labrador Retriever</option><option value="Bull">Bulldog</option><option value="GerShep">German Shepherd</option><option value="GoldRet">Golden Retriever</option><option value="YorkTer">Yorkshire Terrier</option><option value="Poodle">Poodle</option><option value="Beagle">Beagle</option><option value="SibHusk">Siberian Husky</option><option value="Chihuaha">Chihuaha</option><option value="Boxer">Boxer</option><option value="Pug">Pug</option><option value="EnglMast">English Mastiff</option><option value="Rotweiler">Rotweiler</option><option value="Dob">Doberman</option>';
            }
            if(document.getElementById("typeCat").checked) {
                document.getElementById("breed").innerHTML = '<option value="null">-------------Select-------------</option><option value="Sieamese">Siamese</option><option value="Perisan">Persian</option><option value="MainnCo">Maine Coon</option><option value="Britshort">British Shorthair</option><option value="Abyss">Abyssinian cat</option><option value="Ragdoll">Ragdoll</option><option value="Amercan Shorthair">American Shorthair</option><option value="Sphynx">Sphynx</option><option value="Exoticshort">Exotic Shorthair</option><option value="Burmese">Burmese</option><option value="Birman">Birman</option><option value="ScottishFold">Scottish Fold</option><option value="Himalayan">Himalayan</option><option value="Siberian">Siberian</option>';
            }
        }
    
    </script>
</body>
</html>