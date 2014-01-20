<?php
/*This page, AddMeeting.php, is used to create a new meeting. There are multiple
 * arguments required for this file.
 *      owner: the user id of the user creating the meeting
 *      start: datetime value of the startpoint of the meeting
 *      end: datetime value of the endpoint of the meeting
 *      location: a string of up to 128 characters that describes the meeting and
 *          where it will be held. 
 * Connecting to the actual database has been withdrawn, since this will be publicly
 * visible on github.
*/
$connection = mysql_connect("localhost", "root", "PASSWORD");
$query = "INSERT INTO Meetings (owner, start, end, location) VALUES ("
         .$_GET["owner"].", ".$_GET["start"].", ".$_GET["end"].", "
        .$_GET["location"].")";

 if (!$connection) {
    echo "Connection to database failed: ". mysql_error();
    exit;
}
if (!mysql_select_db("Capstone")) {
    echo "Unable to select Capstone: ".mysql_error();
    exit;
}

$result = mysql_query($query);
if (!$result) { //Something broke. Check the formatting of all arguments.
    echo "Unable to run query \"".$query." from database: ". mysql_error();
    exit;
}
else {
	echo "Success.";
}
mysql_free_result($result);
?>}