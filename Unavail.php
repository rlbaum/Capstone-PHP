<?php
/*This page, Unavail.php, is used to create a unavailable time listing. 
 * It requires the user_id of the person you wish to see unavailable times for.
 * Connecting to the actual database has been withdrawn, since this will be publicly
 * visible on github.
*/
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
//Something went wrong. 
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