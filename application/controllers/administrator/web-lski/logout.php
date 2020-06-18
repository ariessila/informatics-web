<?PHP
include "connect.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
session_destroy();
header("location: index.php");
?>