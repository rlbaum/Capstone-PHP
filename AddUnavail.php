<?php
/*This page, AddUnavail.php, is used to add a new unavailable time frame for a 
 * given user. This requires a user id in addition to a start and end DATETIME for
 * the time in question. 
 */
//Password removed since code is publicly viewable on GitHub. Code will NOT
//Work without filling in the connection first!
$connection = mysql_connect("localhost", "root", "PASSWORD");
$query = "INSERT INTO Events (user_id_e, unavailable_start, unavailable_end)"
        . "VALUES (".$_GET["user_id"].",".$_GET["start"].",".$_GET["end"].")";
if (!$connection) {
    echo "Connection to database failed: ". mysql_error();
    exit;
}
if (!mysql_select_db("Capstone")) {
    echo "Unable to select Capstone: ".mysql_error();
    exit;
}

$result = mysql_query($query);
if (!$result) {
    echo "Unable to run query \"".$query." from database: ". mysql_error();
    exit;
}
 else {
     echo "Success";
 }
mysql_free_result($result);
?>}