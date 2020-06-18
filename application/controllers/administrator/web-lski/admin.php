<?PHP
include "connect.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "cek-login.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LSKI - Departemen Elekto FT-UH</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="slider-doc.css">
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">LSKI</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#gambaran">Gambaran Umum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#visimisi">Visi, Misi, dan Tujuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#personil">Personil LSKI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#penelitian">Penelitian Dihasilkan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#pengabdian">Pengabdian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#kerjasama">Kerjasama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#dokumentasi">Dokumentasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#daftaradmin">Daftar Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php" style="color:white; background-color:red">KELUAR</a>
          </li>          
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="gambaran">
        <div class="my-auto">
          <h3 class="mb-0">LABORATORIUM SISTEM KENDALI DAN INSTRUMENTASI
          </h3>
          <div class="subheading mb-5">Departemen Teknik Elektro, Fakultas Teknik, Universitas Hasanuddin.
          </div>
            <?PHP
            $sql = "SELECT * FROM pengantar";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($data_pengantar = $result->fetch_assoc())  {
            ?>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Ganti Pengantar Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="9">
                  <textarea cols="100" rows="15" name="pengantar"><?PHP echo $data_pengantar['pengantar']; ?></textarea><br><br>
                  <input type="submit" value="Edit">
                </fieldset>
              </form>
          <?PHP
        }}
        ?><br>
         <h3 class="mb-3"><a style="color:white; background-color: black;"> PENGUMUMAN LABORATORIUM </a>
          </h3>
            <?PHP
            $sql = "SELECT * FROM pengumuman";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($data_pengumuman = $result->fetch_assoc())  {
            ?>
          <p class="mb-0">Oleh <b><?PHP echo $data_pengumuman['pengirim'];?></b> bahwa <i><?PHP echo $data_pengumuman['pesan']; ?></i></p>
          <?PHP
        }}
        ?>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Pengumuman Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="10">
                  <a style="color:black;">Pengirim :</a><br>
                  <input type="text" name="pengirim" value="Nama Pengirim"><br>
                  <a style="color:black;">Pesan:</a><br>
                  <textarea cols="100" rows="2" name="pesan"></textarea><br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
        </div>

      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="visimisi">
        <div class="my-auto">
          <h2 class="mb-5">Visi, Misi, dan Tujuan</h2>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <?PHP
            $sql = "SELECT * FROM visimisi";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($data_visimisi = $result->fetch_assoc())  {
            ?>
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Visi</h3>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Ganti Visi Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="11">
                  <textarea cols="100" rows="3" name="visi"><?PHP echo $data_visimisi['visi']; ?></textarea><br><br>
                  <input type="submit" value="Edit">
                </fieldset>
              </form>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Misi</h3>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Ganti Misi Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="12">
                  <textarea cols="100" rows="3" name="misi"><?PHP echo $data_visimisi['misi']; ?></textarea><br><br>
                  <input type="submit" value="Edit">
                </fieldset>
              </form>
            </div>
          </div>
          <?PHP }} ?>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Tujuan</h3>
              <p> </p>
            <?PHP
            $sql = "SELECT * FROM tujuan";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($data_tujuan = $result->fetch_assoc())  {
            ?>
              <p class="mb-0"><?PHP echo $data_tujuan['tujuan']; ?> <a style="color:white; background-color: black;" href="delete.php?did=11&id=<?PHP echo $data_tujuan['id'];?>">DELETE</a></p>
              <?PHP }} ?>
            </div>
          </div>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Tujuan Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="13">
                  <a style="color:black;">Tujuan:</a><br>
                  <textarea cols="100" rows="2" name="tujuan"></textarea><br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="personil">
        <div class="my-auto">
          <h2 class="mb-3">Personil LSKI</h2>
            <h3 align="center">Pimpinan Laboratorium</h3>
              <table border="2" align="center">
                <tr>
                  <th bgcolor="#000000" width="50%"><a style="color:white">Nama</a></th>
                  <th bgcolor="#000000" width="45%"><a style="color:white">Jabatan</a></th>
                  <th bgcolor="#000000"><a style="color:white">Foto</a></th>
                  <th bgcolor="#000000" width="45%"><a style="color:white">EDIT</a></th>
                </tr>
                <?PHP
                $sql = "SELECT * FROM personilutama";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($data_personilutama = $result->fetch_assoc())  {
                ?>
                <tr>
                  <th><?PHP echo $data_personilutama["Nama"]; ?></th>
                  <th><?PHP echo $data_personilutama["Jabatan"]; ?></th>
                  <th><a href="<?PHP echo $data_personilutama['Foto'] ?>"><img src="<?PHP echo $data_personilutama['Foto']?>" height="160" width="120"></a></th>
                  <th bgcolor="#000000"><a style="color:white" href="delete.php?did=1&id=<?PHP echo $data_personilutama['id'];?>">DELETE</a></th>
                </tr>
                <?PHP
                }} ?>
              </table>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Pimpinan Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="1">
                  <a style="color:black;">Nama :</a><br>
                  <input type="text" name="Nama" value="Nama Pimpinan"><br>
                  <a style="color:black;">Jabatan :</a><br>
                  <input type="text" name="Jabatan" value="Jabatan"><br>
                  <a style="color:black;">URL Foto :</a><br>
                  <input type="text" name="Foto" value="URL" size="30"><br><br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
            <h3 align="center">Anggota Laboratorium</h3>
              <table border="2" align="center">
                <tr>
                  <th bgcolor="#000000" width="80%"><a style="color:white">Nama</a></th>
                  <th bgcolor="#000000" width="20%"><a style="color:white">Jabatan</a></th>
                  <th bgcolor="#000000" width="20%"><a style="color:white">EDIT</a></th>
                </tr>
                <?PHP
                $sql = "SELECT * FROM personiltambahan";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($data_personiltambahan = $result->fetch_assoc())  {
                ?>
                <tr>
                  <th><?PHP echo $data_personiltambahan["Nama"]; ?></th>
                  <th><?PHP echo $data_personiltambahan["Jabatan"]; ?></th>
                  <th bgcolor="#000000"><a style="color:white" href="delete.php?did=2&id=<?PHP echo $data_personiltambahan['id'];?>">DELETE</a></th>
                </tr>
                <?PHP
                }} ?>
              </table>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Anggota Laboratorium</a></legend>
                  <input type="hidden" name="iid" value="2">
                  <a style="color:black;">Nama :</a><br>
                  <input type="text" name="Nama" value="Nama"><br>
                  <a style="color:black;">Jabatan :</a><br>
                  <input type="text" name="Jabatan" value="Jabatan"><br></br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
            <h3 align="center">Mahasiswa Peneliti di Laboratorium</h3>
              <table border="2" align="center">
                <tr>
                  <th bgcolor="#000000" width="90%"><a style="color:white">Nama</a></th>
                  <th bgcolor="#000000" width="20%"><a style="color:white">NIM</a></th>
                  <th bgcolor="#000000" width="20%"><a style="color:white">EDIT</a></th>
                </tr>
                <?PHP
                $sql = "SELECT * FROM personilmahasiswa";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($data_personilmahasiswa = $result->fetch_assoc())  {
                ?>
                <tr>
                  <th><?PHP echo $data_personilmahasiswa["Nama"]; ?></th>
                  <th><?PHP echo $data_personilmahasiswa["NIM"]; ?></th>
                  <th bgcolor="#000000"><a style="color:white" href="delete.php?did=3&id=<?PHP echo $data_personilmahasiswa['id'];?>">DELETE</a></th>
                </tr>
                <?PHP
                }} ?>
              </table>        
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Mahasiswa Peneliti</a></legend>
                  <input type="hidden" name="iid" value="3">
                  <a style="color:black;">Nama :</a><br>
                  <input type="text" name="Nama" value="Nama Mahasiswa"><br>
                  <a style="color:black;">NIM :</a><br>
                  <input type="text" name="NIM" value="NIM"><br></br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="penelitian">
        <div class="my-auto">
          <h2 class="mb-3">PENELITIAN DIHASILKAN</h2>
          <h4>Skripsi</h4>
          <ul class="fa-ul mb-0">
          <table border="2" align="center">
            <tr>
              <th bgcolor="#000000" width="100%"><a style="color:white">Judul</a></th>
              <th bgcolor="#000000"><a style="color:white">Tahun</a></th>
              <th bgcolor="#000000"><a style="color:white">EDIT</a></th>
            </tr>
            <?PHP
            $sql = "SELECT * FROM skripsi";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($data_skripsi = $result->fetch_assoc())  {
            ?>
            <tr>
              <th><?PHP echo $data_skripsi["Judul"]; ?></th>
              <th><?PHP echo $data_skripsi["Tahun"]; ?></th>
              <th bgcolor="#000000"><a style="color:white" href="delete.php?did=4&id=<?PHP echo $data_skripsi['id'];?>">DELETE</a></th>
            </tr>
            <?PHP
             }} ?>
          </table>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Skripsi</a></legend>
                  <input type="hidden" name="iid" value="4">
                  <a style="color:black;">Judul :</a><br>
                  <textarea cols="40" rows="5" name="Judul">Judul</textarea><br>
                  <a style="color:black;">Tahun :</a><br>
                  <input type="text" name="Tahun" value="Tahun"><br></br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
          </ul>   
          <h4>Publikasi</h4>
          <ul class="fa-ul mb-1">  
          <table border="2" align="center">
            <tr>
              <th bgcolor="#000000" width="65%"><a style="color:white">Judul</a></th>
              <th bgcolor="#000000"><a style="color:white">Volume</a></th>
              <th bgcolor="#000000"><a style="color:white">Penerbit</a></th>
              <th bgcolor="#000000"><a style="color:white">Edit</a></th>
            </tr>
            <?PHP
            $sql = "SELECT * FROM publikasi";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)  {
              while ($data_penelitian = $result->fetch_assoc()) {
            ?>
            <tr>
              <th><b><?PHP echo $data_penelitian["Judul"]; ?></b>  </th>
              <th><b><?PHP echo $data_penelitian["Volume"]; ?></b>  </th>
              <th><?PHP echo $data_penelitian["Nama"]; ?></th>
              <th bgcolor="#000000"><a style="color:white" href="delete.php?did=5&id=<?PHP echo $data_penelitian['id'];?>">DELETE</a></th>
            </tr>
            <?PHP
          }}
            ?>
          </table>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Publikasi</a></legend>
                  <input type="hidden" name="iid" value="5">
                  <a style="color:black;">Judul :</a><br>
                  <textarea cols="40" rows="5" name="Judul">Judul</textarea><br>
                  <a style="color:black;">Volume :</a><br>
                  <input type="text" name="Volume" value="Volume"><br>
                  <a style="color:black;">Penerbit :</a><br>
                  <input type="text" name="Nama" value="Penerbit"><br></br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
          </ul>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="pengabdian">
        <div class="my-auto">
          <h2 class="mb-5">Pengabdian</h2>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
                <table border="2" align="center">
                  <tr>
                    <th bgcolor="#000000"><a style="color:white">Nama Pengabdian</a></th>
                    <th bgcolor="#000000"><a style="color:white">Oleh</a></th>
                    <th bgcolor="#000000" width="45%"><a style="color:white">Deskripsi</a></th>
                    <th bgcolor="#000000"><a style="color:white">EDIT</a></th>
                  </tr>
                  <?PHP
                  $sql = "SELECT * FROM pengabdian";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($data_pengabdian = $result->fetch_assoc())  {
                  ?>
                  <tr>
                    <th><?PHP echo $data_pengabdian["Nama"]; ?></th>
                    <th><?PHP echo $data_pengabdian["Oleh"]; ?></th>
                    <th><i><a style="font-size: 12px;"><?PHP echo $data_pengabdian["Deskripsi"]; ?></a></i></th>
                    <th bgcolor="#000000"><a style="color:white" href="delete.php?did=6&id=<?PHP echo $data_pengabdian['id'];?>">DELETE</a></th>
                  </tr>
                  <?PHP
                   }} ?>
                </table>
              <form action="input-data.php" method="post">
                <fieldset>
                  <legend><a style="color:black;">Tambah Pengabdian</a></legend>
                  <input type="hidden" name="iid" value="6">
                  <a style="color:black;">Nama :</a><br>
                  <input type="text" name="Nama" value="Nama"><br>
                  <a style="color:black;">Oleh :</a><br>
                  <input type="text" name="Oleh" value="Oleh"><br>
                  <a style="color:black;">Deskripsi :</a><br>
                  <textarea cols="40" rows="5" name="Deskripsi">Deskripsi</textarea><br><br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
            </div>
          </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="kerjasama">
        <div class="my-auto">
          <h2 class="mb-5">Kerjasama Dalam dan Luar Negeri</h2>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
                <table border="2" align="center">
                      <tr>
                        <th bgcolor="#000000"><a style="color:white">Kerjasama</a></th>
                        <th bgcolor="#000000"><a style="color:white">Jenis</a></th>
                        <th bgcolor="#000000"><a style="color:white">EDIT</a></th>
                      </tr>
                      <?PHP
                      $sql = "SELECT * FROM kerjasama";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($data_kerjasama = $result->fetch_assoc())  {
                      ?>
                      <tr>
                        <th><?PHP echo $data_kerjasama["Nama"]; ?></th>
                        <th><?PHP if ($data_kerjasama["Jenis"] == "D") {echo "Dalam Negeri";} else {echo "Luar Negeri";}; ?></th>
                        <th bgcolor="#000000"><a style="color:white" href="delete.php?did=7&id=<?PHP echo $data_kerjasama['id'];?>">DELETE</a></th>
                      </tr>
                      <?PHP
                       }} ?>
                    </table>
                <form action="input-data.php" method="post">
                 <fieldset>
                  <legend><a style="color:black;">Tambah Kerjasama</a></legend>
                  <input type="hidden" name="iid" value="7">
                  <a style="color:black;">Nama :</a><br>
                  <textarea cols="40" rows="2" name="Nama">Nama</textarea><br>
                  <a style="color:black;">Jenis :</a><br>
                  <select name="Jenis">
                    <option value="D">Dalam Negeri</option>
                    <option value="L">Luar Negeri</option>
                  </select><br><br>
                  <input type="submit" value="Tambah">
                </fieldset>
              </form>
            </div>
          </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="dokumentasi">
        <h2 class="mb-5">Dokumentasi</h2>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
                 <div class="resume-item d-flex flex-column flex-EDITd-row mb-5">
                  <?PHP
                  $sql = "SELECT * FROM dokumentasi";
                  $result = $conn->query($sql);
                  $i = 1;
                  if ($result->num_rows > 0) {
                  while ($data_dokumentasi = $result->fetch_assoc())  {
                    $url[$i] = $data_dokumentasi['url'];
                    $i++;
                  }}
                  ?>
                  <table>
                    <tr>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["1"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="1"><br>
                            <input type="text" name="url" value='<?PHP echo $url["1"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["2"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="2"><br>
                            <input type="text" name="url" value='<?PHP echo $url["2"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["3"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="3"><br>
                            <input type="text" name="url" value='<?PHP echo $url["3"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["4"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="4"><br>
                            <input type="text" name="url" value='<?PHP echo $url["4"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["5"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="5"><br>
                            <input type="text" name="url" value='<?PHP echo $url["5"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["6"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="6"><br>
                            <input type="text" name="url" value='<?PHP echo $url["6"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["7"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="7"><br>
                            <input type="text" name="url" value='<?PHP echo $url["7"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["8"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="8"><br>
                            <input type="text" name="url" value='<?PHP echo $url["8"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                      <td width="25%">
                        <form action="input-data.php" method="post">
                          <fieldset>
                            <img height="120" width="100" class="imgDok" src='<?PHP echo $url["9"]; ?>' alt="gambar_dok">
                            <input type="hidden" name="iid" value="14">
                            <input type="hidden" name="urlid" value="9"><br>
                            <input type="text" name="url" value='<?PHP echo $url["9"]; ?>'><br>
                            <input type="submit" value="Ganti">
                          </fieldset>
                        </form>
                      </td>
                    </tr>
                    </div>
                  </table>
          </div>
      </section>


      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="daftaradmin">
        <h2 class="mb-5">Daftar Admin</h2>
           <table border="2" align="center">
            <tr>
              <th bgcolor="#000000"><a style="color:white">Email</a></th>
              <th bgcolor="#000000"><a style="color:white">Password (Setelah di-<i>enkripsi</i>)</a></th>
            </tr>
            <?PHP
            $sql = "SELECT * FROM  admin";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while ($data_admin = $result->fetch_assoc())  {
            ?>
            <tr>
              <th><?PHP echo $data_admin["email"]; ?></th>
              <th><?PHP echo hash('ripemd128',$data_admin["password"]); ?></th>
            <tr>
            <?PHP
            }} ?>
            </table>
              <form action="input-data.php" method="post">
                 <fieldset>
                  <legend><a style="color:black;">Tambah / Hapus Admin</a></legend>
                  <input type="hidden" name="iid" value="8">
                  <a style="color:black;">Email :</a><br>
                  <input type="text" name="email" value="Email"><br>
                  <a style="color:black;">Password :</a><br>
                  <input type="password" name="password" value="Password"><br>
                  <a style="color:black;">Keadaan :</a><br>
                  <select name="kondisi">
                    <option value="add">Tambah Admin Baru</option>
                    <option value="del">Hapus Admin Dimaksud</option>
                  </select><br><br>
                  <input type="submit" value="Edit">
                </fieldset>
              </form>
      </section>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 9000);    
}
</script>


    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
<?PHP
$conn->close();
?>