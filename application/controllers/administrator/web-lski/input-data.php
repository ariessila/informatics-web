<?PHP
include "connect.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "cek-login.php";
$iid = $_POST["iid"];
switch($iid){
	case "1":
		$Nama = $_POST["Nama"];
		$Jabatan = $_POST["Jabatan"];
		$Foto = $_POST["Foto"];
		$sql = "INSERT INTO `personilutama` (`Nama`,`Jabatan` , `Foto`) VALUES ('$Nama','$Jabatan', '$Foto');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "2":
		$Nama = $_POST["Nama"];
		$Jabatan = $_POST["Jabatan"];
		$sql = "INSERT INTO `personiltambahan` (`Nama`,`Jabatan`) VALUES ('$Nama','$Jabatan');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "3":
		$Nama = $_POST["Nama"];
		$NIM = $_POST["NIM"];
		$sql = "INSERT INTO `personilmahasiswa` (`Nama`,`NIM`) VALUES ('$Nama','$NIM');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "4":
		$Judul = $_POST["Judul"];
		$Tahun = $_POST["Tahun"];
		$sql = "INSERT INTO `skripsi` (`Judul`,`Tahun`) VALUES ('$Judul','$Tahun');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "5":
		$Judul = $_POST["Judul"];
		$Volume = $_POST["Volume"];
		$Nama = $_POST["Nama"];
		$sql = "INSERT INTO `publikasi` (`Judul`,`Volume` , `Nama`) VALUES ('$Judul','$Volume', '$Nama');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "6":
		$Nama = $_POST["Nama"];
		$Oleh = $_POST["Oleh"];
		$Deskripsi = $_POST["Deskripsi"];
		$sql = "INSERT INTO `pengabdian` (`Nama`,`Oleh` , `Deskripsi`) VALUES ('$Nama','$Oleh', '$Deskripsi');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "7":
		$Nama = $_POST["Nama"];
		$Jenis = $_POST["Jenis"];
		$sql = "INSERT INTO `kerjasama` (`Nama`,`Jenis`) VALUES ('$Nama','$Jenis');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "8":
		$email = $_POST["email"];
		$password = $_POST["password"];
		$kondisi = $_POST["kondisi"];
		if ($kondisi == "add") {$sql = "INSERT INTO `admin` (`email`, `password`) VALUES ('$email', '$password');";}
		elseif ($kondisi == "del")	{$sql="DELETE FROM `admin` WHERE email='$email' && password='$password'";}
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "9":
		$pengantar = $_POST["pengantar"];
		$sql = "UPDATE `pengantar` SET `pengantar`='$pengantar';";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "10":
		$pengirim = $_POST["pengirim"];
		$pesan = $_POST["pesan"];
		$sql = "INSERT INTO `pengumuman` (`pengirim`,`pesan`) VALUES ('$pengirim','$pesan');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "11":
		$visi = $_POST["visi"];
		$sql = "UPDATE `visimisi` SET `visi`='$visi';";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "12":
		$misi = $_POST["misi"];
		$sql = "UPDATE `misi` SET `misi`='$misi';";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "13":
		$tujuan = $_POST["tujuan"];
		$sql = "INSERT INTO `tujuan` (`tujuan`) VALUES ('$tujuan');";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	case "14":
		$urlid = $_POST["urlid"];
		$url = $_POST['url'];
		$sql = "UPDATE `dokumentasi` SET `url`='$url' WHERE id='$urlid';";
		$result = mysqli_query($conn, $sql);
		header("location: admin.php");
	break;
	default:
		header("location: admin.php");
	break;

}
?>