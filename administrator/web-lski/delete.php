<?PHP
include "connect.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "cek-login.php";
$did = $_GET["did"];
switch($did)	{
	case "1": $del = "personilutama";
	break;
	case "2": $del = "personiltambahan";
	break;
	case "3": $del = "personilmahasiswa";
	break;
	case "4": $del = "skripsi";
	break;
	case "5": $del = "publikasi";
	break;
	case "6": $del = "pengabdian";
	break;
	case "7": $del = "kerjasama";
	break;
	case "11": $del = "tujuan";
	break;
}
$id = $_GET["id"];
$sql = "DELETE FROM `$del` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("location: admin.php");
?>