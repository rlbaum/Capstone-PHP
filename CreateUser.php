
<?php\
// This page, CreateUser.php, generates a user ID for an inputted 
// f_name, l_name and email.

$connection = mysql_connect("localhost", "root", "PASSWORD");
//This query will insert a new user's ID and information into the user's
//table

$query = "INSERT INTO Users (user_id, email, f_name, l_name, timezone) 
          VALUES ( uniqid (rand (),true), $_GET["f_name"], $_GET["l_name"], "
         ."NULL".")";

 if (!$connection) {
    echo "Connection to database failed: ". mysql_error();
    exit;
}
if (!mysql_select_db("Capstone")) {
    echo "Unable to select Capstone: ".mysql_error();
    exit;
}


//Now we try to add the new user to the Users table and return
//success if it works
$result = mysql_query($query);
if (!$result) {
    echo "Unable to run query \"".$query." from database: ". mysql_error();
    exit;
}
 else {
     echo "Success\n";
 }
mysql_free_result($result);
?>}