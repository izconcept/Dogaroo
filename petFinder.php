<?php
if(isset($_POST["Breed"])) {
        $entry = 1;
        $breed = $_POST["Breed"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $traits = "";
        $results = "<h1 class=\"pageTitle\">Search Results</h1><br><p>Pets found: <strong>$entry</strong></p>";
        
        if(isset($_POST["dfriend"])) {
            $traits = $traits."Dog Friendly, ";
        }
        if(isset($_POST["cfriend"])) {
            $traits = $traits."Cat Friendly, ";
        }
        if(isset($_POST["chfriend"])) {
            $traits = $traits."Child Friendly ";
        }
        
        $traitsArr = explode(",", $traits);
        
        $handle = fopen("pets.txt", "r");
        
        while(!feof($handle)) {
            $line = fgets($handle);
            $arr = explode(":", $line);
            if(isset($arr[2]))
            {
                $search = "dog"
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
                $results = "$search $criteria";
                if(strcmp($search, $criteria) == 0) {
                    foreach($traitsArr as $x) {
                        if(strpos($arr[9],$x)){
                            $results = $results.
                                "</br></br><h3>Pet #$entry</h3>
                                <p><strong>Type : </strong>$arr[2]</p>
                                <p><strong>Breed : </strong>$arr[3]</p>
                                <p><strong>Age : </strong>$arr[4]</p>
                                <p><strong>Gender :</strong>$arr[5]</p>
                                <p><strong>Behavioural Traits : </strong>$arr[9]</p>
                                <p><strong>Comments : </strong>$arr[10]</p>
                                <p><strong>Owner : </strong>$arr[6] $arr[7]</p>
                                <p><strong>Owner Email : </strong>$arr[8]</p>
                                ";
                            $entry++;
                        }
                    }
                }
            }
        }
        fclose($handle);
    }
?>