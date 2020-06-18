<?PHP
include "connect.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
            <a class="nav-link js-scroll-trigger" href="login.php" style="color:white; background-color:red">Halaman Admin</a>
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
          <p class="mb-5"><?PHP echo $data_pengantar['pengantar']; ?></p>
          <?PHP
        }}
        ?>
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
              <div class="subheading mb-1"><i><?PHP echo $data_visimisi['visi']; ?></i></div>
            </div>
          </div>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Misi</h3>
              <div class="subheading mb-1"><i><?PHP echo $data_visimisi['misi']; ?></i></div>
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
              <p class="mb-0"><?PHP echo $data_tujuan['tujuan']; ?></p>
              <?PHP }} ?>
            </div>
          </div>
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
                </tr>
                <?PHP
                }} ?>
              </table>
            <h3 align="center">Anggota Laboratorium</h3>
              <table border="2" align="center">
                <tr>
                  <th bgcolor="#000000" width="80%"><a style="color:white">Nama</a></th>
                  <th bgcolor="#000000" width="20%"><a style="color:white">Jabatan</a></th>
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
                </tr>
                <?PHP
                }} ?>
              </table>
            <h3 align="center">Mahasiswa Peneliti di Laboratorium</h3>
              <table border="2" align="center">
                <tr>
                  <th bgcolor="#000000" width="90%"><a style="color:white">Nama</a></th>
                  <th bgcolor="#000000" width="20%"><a style="color:white">NIM</a></th>
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
                </tr>
                <?PHP
                }} ?>
              </table>        
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
            </tr>
            <?PHP
             }} ?>
          </table>
          </ul>   
          <h4>Publikasi</h4>
          <ul class="fa-ul mb-1">  
          <table border="2" align="center">
            <tr>
              <th bgcolor="#000000" width="65%"><a style="color:white">Judul</a></th>
              <th bgcolor="#000000"><a style="color:white">Volume</a></th>
              <th bgcolor="#000000"><a style="color:white">Penerbit</a></th>
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
            </tr>
            <?PHP
          }}
            ?>
          </table>
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
                  </tr>
                  <?PHP
                   }} ?>
                </table>
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
                      </tr>
                      <?PHP
                       }} ?>
                    </table>

            </div>
          </div>
      </section>

      <style>
      .imgDok {
          border: 1px solid #ddd;
          border-radius: 4px;
          padding: 5px;
          width: 240;
      }

      .imgDok:hover {
          box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
      }
      </style>

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
                      <td><a target="_blank" href='<?PHP echo $url["1"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["1"]; ?>' alt="gambar_dok"></a>
                      </td>
                      <td><a target="_blank" href='<?PHP echo $url["2"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["2"]; ?>' alt="gambar_dok"></a></td>
                      <td><a target="_blank" href='<?PHP echo $url["3"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["3"]; ?>' alt="gambar_dok"></a></td>
                    </tr>
                    <tr>
                      <td><a target="_blank" href='<?PHP echo $url["4"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["4"]; ?>' alt="gambar_dok"></a>
                      </td>
                      <td><a target="_blank" href='<?PHP echo $url["5"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["5"]; ?>' alt="gambar_dok"></a></td>
                      <td><a target="_blank" href='<?PHP echo $url["6"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["6"]; ?>' alt="gambar_dok"></a></td>
                    </tr>
                    <tr>
                      <td><a target="_blank" href='<?PHP echo $url["7"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["7"]; ?>' alt="gambar_dok"></a>
                      </td>
                      <td><a target="_blank" href='<?PHP echo $url["8"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["8"]; ?>' alt="gambar_dok"></a></td>
                      <td><a target="_blank" href='<?PHP echo $url["9"]; ?>'><img height="150" width="240" class="imgDok" src='<?PHP echo $url["9"]; ?>' alt="gambar_dok"></a></td>
                    </tr>
                    </div>
                  </table>
          </div>
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