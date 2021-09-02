<?php

//  require_once '/projects/system/scripts/Encryption.php';

// ==========================================
// the connection string is already encrypted
// we use Encryption::encrypt($variable) to encrypt the servername, dbname, username, and password
// ==========================================

// $servername = "35.240.28.196";
// $servername = "34.89.238.35";
// $servername ="10.88.224.3";
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "rest_api_demo";
// $dbname = "stg_imported_clone";

// =================
// Create connection
// =================

// =================
// Standard non Encrytped
// =================
$conn = new mysqli($servername, $username, $password, $dbname);

// =================
// Encrytped
// =================
//$conn = new mysqli(Encryption::decrypt($servername), Encryption::decrypt($username), Encryption::decrypt($password), Encryption::decrypt($dbname));
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo "Start of sql";
echo "\n";
echo "Today is " . date("Y/m/d") . "<br>";
echo "\n";
echo "The time is " . date("h:i:sa"). "<br>";
echo "\n";

// =================
// Select and show
// =================
$sql = "SELECT * from users";
// $sql = "SELECT * from wp_users";
// $sql = "show processlist \G";
// $sql="select * from INFORMATION_SCHEMA.PROCESSLIST where db = 'stg_imported_VI'";
// $sql = "CALL SP_SEARCH_ITEMS(1,10,NULL,NULL,'HEB',32.937138138928,37.075121461072,33.819481339808,29.285612838599)";
// $sql = "SELECT i.`SN`, i.`post_id`, g.`ID`, g.`LONGITUDE`, g.`LATITUDE` FROM `IDEA_SYNC_GPLACE` g INNER JOIN `IDEA_SYNC_ITEM_DATA` AS d ON g.`ID` = d.`Code` INNER JOIN `IDEA_SYNC_ITEMS` AS i ON d.`SN` = i.`SN` WHERE i.`is_published` = 1 AND i.`ITEM_TYPE_CODE` = '23'";
// $sql = "SELECT t.*, tt.* FROM wp_terms AS t INNER JOIN wp_term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy IN ('official') ORDER BY t.name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "num_rows : " . $result->num_rows . "\n";
    while($row = $result->fetch_assoc()) {
        // echo $row['nid'] . "\n";
        print_r ($row) ;
    }
} else {
    echo "0 results";
}

echo "num_rows : " . $result->num_rows . "\n";

echo "End of sql";
echo "\n";
echo "Today is " . date("Y/m/d") . "<br>";
echo "\n";
echo "The time is " . date("h:i:sa"). "<br>";
echo "\n";
$conn->close();
?>
