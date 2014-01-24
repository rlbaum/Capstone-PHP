<?php
/*This page, AddMeeting.php, is used to create a new meeting. There are multiple
 * arguments required for this file.
 *      owner: the user id of the user creating the meeting
 *      start: datetime value of the startpoint of the meeting
 *      end: datetime value of the endpoint of the meeting
 *      description: a string of up to 256 characters that describes the meeting and
 *          where it will be held. 
 * Connecting to the actual database has been withdrawn, since this will be publicly
 * visible on github.
*/
$connection = mysql_connect("localhost", "root", "PASSWORD");
$query = "INSERT INTO Meetings (meeting_id, owner, start, end, created, description) VALUES ("
         ."NULL".", ".$_GET["owner"].", ".$_GET["start"].", ".$_GET["end"].", "
        ."CURRENT_TIMESTAMP".", ".$_GET["description"].")";


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
else { //The query was a success, so we need to return the meeting_id of the newly created meeting
    //This query will get the meeting id of the most recently created meeting for the supplied user
    $query = "SELECT meeting_id from Meetings where owner =".$_GET["owner"]
            ." order by meeting_id desc limit 1";
    $id_result = mysql_query($query);
    if (!$id_result) { //for some reason, our query above was unsuccessful 
        echo "Meeting was created, but something failed when we tried to retrieve"
        . " the meeting_id.\n".mysql_error();
        exit;
    }
    while ($row = mysql_fetch_assoc($id_result)){
	echo $row["meeting_id"];
	}
}
echo "\n";
mysql_free_result($result);
mysql_free_result($id_result);
?>}