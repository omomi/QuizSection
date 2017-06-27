<?php

$con = mysqli_connect("servername", "username", "password", "databasename");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

    $Id = "";
    $dateofentry = "";

    header('Content-Type: application/json');

    if ($Id == "")
        $Id = mysqli_real_escape_string($con, $_GET['id']);

    if ($Id == "all") {
        $check = "SELECT * FROM highscoretable order by score desc LIMIT 0 , 30";
        $result = mysqli_query($con, $check);

        $arr = array();

        while ($row = mysqli_fetch_array($result)) {
            $row_array['id'] = $row['userid'];
            $row_array['score'] = $row['score'];
            $row_array['player'] = $row['name'];
            $row_array['time'] = $row['timestamp'];
            array_push($arr, $row_array);
        }
    } else {
        $check = "SELECT * FROM highscoretable WHERE userid =" . $Id . "	LIMIT 0 , 30";

        $result = mysqli_query($con, $check);
        $row = mysqli_fetch_array($result);
        $row_cnt = mysqli_num_rows($result);
        if ($row_cnt > 0) {
            $arr = array();
            $row_array['id'] = $row['userid'];
            $row_array['score'] = $row['score'];
            $row_array['player'] = $row['name'];
            $row_array['time'] = $row['timestamp'];
            if ($row_array['score'] >= $_GET['score']) {
                $arr = array("status" => "Your Score Is Low");
            } else {
                $score = $_GET['score'];

                $update = "UPDATE highscoretable SET 
				score =  " . $score . "
				WHERE userid  =  '" . $Id . "' LIMIT 1 ;		
				";
                mysqli_query($con, $update);
                $row_array = "Your Score Updated";
                array_push($arr, $row_array);
            }
        } else {
            $Score = $_GET['score'];
            $player = $_GET['name'];
            if ($dateofentry == "")
                $dateofentry = date("Y-m-d H:i:s");
            if ($Id == "")
                $arr = array("status" => "Unsuccessful");
            else if ($Score == "")
                $arr = array("status" => "Unsuccessful");
            else if ($player == "")
                $arr = array("status" => "Unsuccessful");
            else {

                $insert = "INSERT INTO highscoretable (
					userid ,
					score ,
					timestamp,
					name
					)
					VALUES (
					'" . $Id . "',  '" . $Score . "', '" . $dateofentry . "', '" . $player . "'
					);
				";
                //echo $insert;
                mysqli_query($con, $insert);

                $arr = array("status" => "Your Score Saved.");
            }
        }
    }
    echo json_encode($arr);
}

mysqli_close($con);
?>