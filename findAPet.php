<!DOCTYPE HTML>

<html>
<head>
    
    <title>Find a Dog</title>
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <link rel="stylesheet" type="text/css" href="theme.css">
    
    <script src="clock.js" type="text/javascript">
    
        
    
    </script>
    
</head>
    
    
<body>
    
    <?php 
    include 'header.php'; 
    session_start();
    $login = "";
    $giveaway = "";
    $results = "";
    if(isset($_SESSION['login'])) {
        $login="<a href=\"logout.php\"><li class=\"menuItem\">Logout</li></a>";
        $giveaway ="<a href=\"petGiveaway.php\"><li class=\"menuItem\">Have a pet to Give Away?</li></a>";
    } else {
        $login="<a href=\"register.php\"><li class=\"menuItem\">Create an Account</li></a>";
        $giveaway ="<a href=\"login.php\"><li class=\"menuItem\">Login</li></a>";
    }
    
    if(isset($_POST["Breed"])) {
        $entry = 1;
        $breed = $_POST["Breed"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $traits = null;
        $results = "<h1 class=\"pageTitle\">Search Results</h1><br>";
        
        if(isset($_POST["dfriend"])) {
            $traits = $traits."Dog Friendly, ";
        }
        if(isset($_POST["cfriend"])) {
            $traits = $traits."Cat Friendly, ";
        }
        if(isset($_POST["chfriend"])) {
            $traits = $traits."Child Friendly, ";
        }
        
        $traitsArr = explode(",", $traits);
        
        $handle = fopen("pets.txt", "r");
        
        while(!feof($handle)) {
            $line = fgets($handle);
            $arr = explode(":", $line);
            if(isset($arr[2]))
            {
                $search = "dog";
                $criteria = "$arr[2]";
                if(strcmp($breed,"Other") != 0) {
                    $search = $search.":$breed"; 
                    $criteria = $criteria.":$arr[3]";
                }
                if(strcmp($age, "Any") != 0) {
                    $search = $search.":$age";
                    $criteria = $criteria.":$arr[4]";
                }
                if(strcmp($gender, "anySexe") != 0) {
                    $search = $search.":$gender";
                    $criteria = $criteria.":$arr[5]";
                }
                if(strcmp($search, $criteria) == 0) {
                    if(isset($traitsArr[1]))
                    {
                        foreach($traitsArr as $x) {
                            if(strpos($arr[9],$x) === false){
                                continue 2;
                            }
                        }
                    }
                    $results = $results.
                            "</br></br><h3>Pet #$entry</h3>
                            <p><strong>Type : </strong>$arr[2]</p>
                            <p><strong>Breed : </strong>$arr[3]</p>
                            <p><strong>Age : </strong>$arr[4]</p>
                            <p><strong>Gender :</strong>$arr[5]</p>
                            <p><strong>Behavioural Traits :</strong>$arr[9]</p>
                            <p><strong>Comments : </strong>$arr[10]</p>
                            <p><strong>Owner : </strong>$arr[6] $arr[7]</p>
                            <p><strong>Owner Email : </strong>$arr[8]</p>";
                    $entry++;
                }
            }
        }
        $entry--;
        $results = "<p>Pets found: <strong>$entry</strong></p>".$results;
        fclose($handle);
    }
    ?>
    
    <div id="mainBody">
    
    <div id="sideMenu">
    
        <ul>
            
            <a href="index.php"><li class="menuItem">Home Page</li></a>
            <a href="findAPet.php"><li class="menuItem" style="background-color:#69C26A;">Find a Pet</li></a>
            <a href="dogCare.php"><li class="menuItem">Dog Care</li></a>
            <a href="catCare.php"><li class="menuItem">Cat Care</li></a>
            <?php echo $giveaway; ?>
            <a href="contact.php"><li class="menuItem">Contact</li></a>
            <?php echo $login; ?>
        
        </ul>
    
    </div>
    
    <div id="contentArea">
        
        <div class="topBar">
        
            <a href="findAPet.php"><div class="topOption" style="background-color:#7A54E3;"><p class="topMenuItem">DOG</p></div></a>
            
            <a href="findCat.php"><div class="topOption"><p class="topMenuItem">CAT</p></div></a>
        
        </div>
        
        <h1 class="pageTitle">Find your new Pet</h1>
        
        <br/>
        
        <form name="search" method="post" onsubmit="return findChecker()">
        
            <fieldset>
            
                <legend>Dog Search Criteria</legend>
                
                Dog Breed
                <select name="Breed">
                    <option value="null">-------------Select-------------</option>
                    <option value="LabRetriever">Labrador Retriever</option>
                    <option value="Bull">Bulldog</option>
                    <option value="GerShep">German Shepherd</option>
                    <option value="GoldRet">Golden Retriever</option>
                    <option value="YorkTer">Yorkshire Terrier</option>
                    <option value="Poodle">Poodle</option>
                    <option value="Beagle">Beagle</option>
                    <option value="SibHusk">Siberian Husky</option>
                    <option value="Chihuaha">Chihuaha</option>
                    <option value="Boxer">Boxer</option>
                    <option value="Pug">Pug</option>
                    <option value="EnglMast">English Mastiff</option>
                    <option value="Rotweiler">Rotweiler</option>
                    <option value="Dob">Doberman</option>
                    <option value="Other">Dosn't matter...</option>
                </select>
                
                <br><br/><hr/><br/>
                
                Preferred Age
                <select name="age">
                    <option value="null">--------------Select--------------</option>
                    <option value="pup">NewBorn(Under 12 months)</option>
                    <option value="Young">Child(Under 3 years)</option>
                    <option value="Adult">Adult(3-8years)</option>
                    <option value="Any">Any age</option>
                </select>
                
                <br/><br/><hr/><br/>
                
                Prefered Gender: 
                <label><input type="radio" value="female" name="gender"/>
                Female</label>
                <label><input type="radio" value="male" name="gender"/>
                Male</label>
                <label><input type="radio" value="anySexe" name="gender"/>
                Any</label>
                
                <br/><br/><hr/><br/>
                
                Behavioural Traits
                <br/>
                <label><input type="checkbox" value="dogfriend" name="dfriend">Dog Friendly</label>
                <br/>
                <label><input type="checkbox" value="catfriend" name="cfriend">Cat Friendly</label>
                <br/>
                <label><input type="checkbox" value="childfriend" name="chfriend">Child Friendly</label>
            </fieldset>
            <br/>
            <input type="submit" value="Submit" action="find"/>
            <input type="submit" value="Reset" action="reset"/>
            
        </form>
        
        <?php echo $results; ?>

        
    
    </div>
    
        
    </div>
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>