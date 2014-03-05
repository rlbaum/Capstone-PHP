<?php
/*This page, AttendMeeting.php, is used to update the visible name associated to a user id. 
 * It requires 2 arguments: meeting_id and user_id
 * Returns on success the start and end times to run in the AddUnavail.php script
 */

$connection = mysql_connect("localhost", "root", "PASSWORD");
//This query will give us the user id associated with an email
$query="INSERT INTO Attendees (meeting_id, user_id) VALUES (".$_GET["meeting_id"].", ".$_GET["user_id"].")";
$timeSE="SELECT m.start, m.end FROM Meetings m WHERE m.meeting_id=".$_GET["meeting_id"].")";
if (!$connection) {
    echo "Connection to database failed: ".mysql_error();
    exit;
}
if (!mysql_select_db("Capstone")) {
    echo "Unable to select Capstone: ".mysql_error();
    exit;
}

//Now we try to add the record
$result = mysql_query($query);
if (!$result) {
    echo "Unable to run query \"".$query." from database: ". mysql_error();
    exit;
}
else {
    $result2 = mysql_query($timeSE);
    if(!$result2){
        echo "Unable to obtain time slice \"".$query2." from database: ".mysql_error();
    }
    else{
        echo $result2["start"]."\n";
        echo $result2["end"]."\n";
    }
}
mysql_free_result($result);
mysql_free_result($result2);
?>}
