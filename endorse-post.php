<?php
    $jsonFile = "JSON.JSON";
    $arrayToAdd = array("name" => $_POST["name"], "date" => $_POST["date"], "endorse" => $_POST["endorse"]);
    $arrayToAdd = ", \n  " . json_encode($arrayToAdd) . "]";
    echo $arrayToAdd;
    $handle=fopen($jsonFile, 'r+');
    fseek($handle,-2,SEEK_END);
    fwrite($handle, $arrayToAdd);
    fclose($handle);
    header ("Location: endorsements.php");
?>