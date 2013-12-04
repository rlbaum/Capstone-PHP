<?php

/*This page, GetUserID, returns the user_id associated with a specific email address, 
 * which is entered as the only argument. As discussed in one of our meetings, 
 * this is probably incredibly bad practice and should be changed during our second
 * revision once we start adding Google authentication.
 * 
 */
//Password removed since code is publicly viewable on GitHub. Code will NOT
//Work without filling in the connection first!
$connection = mysql_connect("localhost", "root", "PASSWORD");
$query = "SELECT u.user_id, u.email FROM Users u WHERE u.email=".$_GET["email"];
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
	while ($row = mysql_fetch_assoc($result)){
	echo $row["user_id"];
	}
	
}
echo "\n";
mysql_free_result($result);
?>}