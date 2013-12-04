<?php
/*This page, AddContact.php, is used to create a new contact listing. 
//It requires two arguments; user_id, the user making the entry, and friend_id,
//the person to be added as a contact.
//Connecting to the actual database has been withdrawn, since this will be publicly
//visible on github.
*/

//Potentially revise this query to take an email as the friend argument rather 
//than an ID
//Password removed since code is publicly viewable on GitHub. Code will NOT
//Work without filling in the connection first!
$connection = mysql_connect("localhost", "root", "PASSWORD"); 
$query = "INSERT INTO Contacts (user_id_c, friend_id) VALUES ("
         .$_GET["user_id"].", ".$_GET["friend_id"].")";
 
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