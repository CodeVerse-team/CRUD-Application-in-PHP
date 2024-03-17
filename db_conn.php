<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "sql109.infinityfree.com"; // MySQL server name
$username = "if0_35643907"; // MySQL username
$password = "jViHUJhuKaKp5w"; // MySQL password
$dbname = "if0_35643907_team_members"; // MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// SQL query to alter table
$sql = "ALTER TABLE `members` MODIFY COLUMN `id` INT AUTO_INCREMENT";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
