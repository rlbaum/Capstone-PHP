<?php
/*This page, Unavail.php, is used to create a unavailable time listing. 
//It requires 3 arguments; the user id of the person making the entry as well
//as the start and end time of the unavailable period.
*/

//Password removed since code is publicly viewable on GitHub. Code will NOT
//Work without filling in the connection first!
$connection = mysql_connect("localhost", "root", "PASSWORD");
$query = "SELECT e.unavailable_start, e.unavailable_end FROM Events e WHERE "
        ."e.user_id_e =".$_GET["user_id"];
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
//echo "<unavailable_times>";
while ($row = mysql_fetch_assoc($result)) {
    echo $row["unavailable_start"]."\n";
    echo $row["unavailable_end"]."\n";
}
//echo "</unavailable_times>\n";
mysql_free_result($result);
?>}