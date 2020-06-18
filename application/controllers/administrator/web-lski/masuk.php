<?PHP
include "connect.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM admin WHERE email='$email' && password='$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1)	{
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	header("location:admin.php");

}	else {
	header("location:relogin.php");
}
$conn->close();
?>