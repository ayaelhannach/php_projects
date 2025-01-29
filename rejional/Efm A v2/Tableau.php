<?php

    // $T = array("aya" => 18 , "souhaila" => 19 , "romayssae" => 19 , "Btissam" =>19);

    // foreach($T as $etudiant => $note){
    //     echo "$etudiant = $note <br>";
    // }



    // $etudiants = array(
    //     array("aya" , "el hannach",18),
    //     array("souahila" , "akka",19),
    // );

    // for($i = 0  ; $i<3 ; $i++){
    //     for($j =0 ;$j<3 ; $j++){
    //         echo  $etudiants[$i][$j]."<br>";
    //     }
    // }


    $etudiants = array(
        array("nom" => "aya" , "prenom" =>"el hannach","age" =>18),
        array("nom" => "souahila" ,  "prenom" => "akka","age" => 19),
    );
    

    foreach($etudiants as $etudiant){
        echo $etudiant["nom"]."<br>";
        echo $etudiant["prenom"]."<br>";
        echo $etudiant["age"]."<br>";
    }
?>