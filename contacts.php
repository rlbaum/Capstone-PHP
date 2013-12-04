<?php
//This page, contacts.php, takes a string user_id as an argument and returns a 
//list of contacts for that user.
//Password removed since code is publicly viewable on GitHub. Code will NOT
//Work without filling in the connection first!
$connection = mysql_connect("localhost", "root", "PASSWORD");
$query = "SELECT u.user_id, u.email, u.f_name, u.l_name FROM Users u, Contacts c "
        . "WHERE c.user_id_c ='". $_GET['user_id']. "' AND c.friend_id =u.user_id";
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

//echo "<contacts user_id =".$_GET['user_id'].">";
while ($row = mysql_fetch_assoc($result)) {
    echo $row["user_id"]."\n";
    echo $row["email"]."\n";
    echo $row["f_name"]."\n";
    echo $row["l_name"]."\n";
}
//echo "</contacts>\n";
mysql_free_result($result);
?>}