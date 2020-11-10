<?php
require_once (__DIR__).("/system/mysqli.php");
  session_start();
    


    $user1 = $_SESSION["email"];
    $user2 = $_REQUEST["name"];
    $qry = $mysqli->query("SELECT * FROM chat WHERE send = '".$user1."' AND receive = '".$user2."'");
    $qry2 = $mysqli->query("SELECT * FROM chat WHERE send = '".$user2."' AND receive = '".$user1."'");
    $array = array();
    //time = datetime
    while($info = $qry->fetch_assoc())
    {
        $row = array();
        $row["text"] = $info["text"];
        $row["send"] = $info["send"];
        $row["time"] = $info["time"];
        array_push($array,$row);
    }
    while($info = $qry2->fetch_assoc())
    {
        $row = array();
        $row["text"] = $info["text"];
        $row["send"] = $info["send"];
        $row["time"] = $info["time"];
        array_push($array,$row);
    }
    //sort to find who send first
    function date_compare($element1, $element2) { 
        $datetime1 = strtotime($element1['time']); 
        $datetime2 = strtotime($element2['time']); 
        return $datetime1 - $datetime2; 
    }  
    
    usort($array, 'date_compare'); 
    if (!empty($array)) {
        echo json_encode($array);
    }
    
?>