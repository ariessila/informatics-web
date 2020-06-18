-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2020 at 01:27 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_informatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) NOT NULL,
  `absensi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `blokir`) VALUES
(3, 'robert', '8ff861bcfd87bd85e9b207ea74cb6596', 'Robert Ratuan', 'vanbiyanabaga@gmail.com', 'N'),
(5, 'amil', '0e6ff1fa6d695ab2ca1375cdfe5f5543', 'Amil', 'amil@uh.ac.id', 'N'),
(6, 'admin', '$2y$10$n.3.aTNlVYf7RsqVbjA/2urQfdbOqrxYGTt5haUZtKVki4wyEeXyG', 'admin', 'lopisquenak@gmail.com', 'N'),
(7, 'dedi', '$2y$10$j0sO1k.5/leGcCftKIUeeuV4dKmWQtH5EcEu6Ylx28vZWJw5kwZ3a', 'dedi', 'lopisquenak@gmail.com', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nama`, `tanggal`, `link`) VALUES
(1, 'GAMBAR UTAMA', '2015-04-01', 'gambar-utama.html');

-- --------------------------------------------------------

--
-- Table structure for table `album_detail`
--

CREATE TABLE `album_detail` (
  `id` int(11) NOT NULL,
  `id_album` bigint(20) NOT NULL,
  `nama_file` varchar(150) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `link` varchar(165) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_detail`
--

INSERT INTO `album_detail` (`id`, `id_album`, `nama_file`, `keterangan`, `link`) VALUES
(26, 555, '55292b174afe5.jpg', 'Foto dokumentasi', ''),
(31, 555, '5533dc3e4b117.jpg', '12', ''),
(34, 111, '5534c7057cda5.png', 'gambar 1 merry', ''),
(40, 198305102014041001, '554960f638653.JPG', 'Kampus Gowa', ''),
(46, 197404262005011002, '55924be9ecc61.jpg', '24 Core AMD. Platform Penelitian Pemrograman dan Komputasi Paralel', ''),
(48, 42112282, '56a5d982a7708.jpg', 'Boxman', ''),
(49, 42112282, '56a5d99be6bb3.jpg', 'Elektro Pagi', ''),
(56, 1, '5d14232ba010c.JPG', 'Profil Informatika Unhas (Video)', 'https://eng.unhas.ac.id/aai/video/promo_tif.mp4'),
(57, 1, '5d1424f1024cc.JPG', 'AIMP Research Group (video)', 'https://eng.unhas.ac.id/aai/video/promo_aimp.mp4'),
(59, 1, '5d96debba366a.jpeg', 'Pengumuman Peserta Lulus Seleksi FGA DTS 2019 Unhas Batch 2', 'https://eng.unhas.ac.id/informatika/id/news/97-pengumuman-seleksi-peserta-digital-talent-scholarship-fresh-graduate-academy-2019-batch-2-kemkominfo---universitas-has');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `bahasa` enum('en','id') NOT NULL DEFAULT 'id',
  `penulis` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `bahasa`, `penulis`, `link`, `publish`, `counter`) VALUES
(68, 'Google - Browsing di Android & Chrome 4x lebih cepat!', '<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><strong>Liputan6.com, Jakarta -&nbsp;</strong>Google akan menggelar uji coba fitur baru untuk mempercepat penelusuran di laman situsnya dan lebih hemat data. Fitur baru ini nantinya dapat digunakan melalui browser Chrome atau browser Android.&nbsp;</span><br /><br /><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Google tengah berusaha agar para pengguna internet di Indonesia bisa menjelajahi web atau situs melalui ponsel dengan lebih cepat dan hemat data. Sayangnya kecepatan internet yang sering kali lambat mempersulit pengguna untuk mendapatkan informasi melalui ponsel dan kadang membuat frustasi.</span><br /><br /><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Karena itu, Google berusaha mengatasi masalah tersebut. Dua pekan lagi, perusahaan akan menguji coba fitur baru yang diharapkan bisa membuat laman situs dapat diakses dengan lebih cepat.</span><br /><br /><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">\"Jika Anda tinggal di Indonesia dan menggunakan ponsel Android dengan koneksi lambat seperti 2G, Anda akan melihat bahwa laman web bisa dimuat lebih cepat dengan data yang lebih hemat, melalui Chrome atau browser Android,\" jelas Product Manager Google Search Team, Hiroto Tokusei, dalam keterangan resminya, Minggu (3/5/2015).</span><br /><br /><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Berdasarkan eksperimen Google sebelumnya, fitur baru ini dapat membuat laman web bisa dimuat empat kali lebih cepat. Selain itu bisa lebih hemat data hingga 80 persen dan menampilkan 50 persen lebih banyak konten di laman web.</span><br /><br /><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">\"Laman yang dioptimalkan dan lebih cepat ini akan membantu penayang dan pengiklan menjangkau audiens baru,\" ungkap Tokusei.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">SUMBER :&nbsp;http://tekno.liputan6.com/read/2224811/browsing-di-android-atau-chrome-bakal-4x-lebih-cepat</span></p>', '5ac043964330e.jpg', '2018-02-19', 'id', 'riefqy', 'google---browsing-di-android-danamp;-chrome-4x-lebih-cepat!.html', 'Y', 0),
(71, 'Dorong UKM, Twitter Luncurkan Twitter Ads', '<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Twitter resmi merilis fitur terbarunya, Twitter Ads. Fitur ini menyasar kalangan Usaha Kecil dan Menangah (UKM). Menurut media sosial berlogo burung itu, dirilisnya fitur ini sebagai bentuk dorongan terhadap para pelaku bisnis retail di Indonesia.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">\"Kami ingin mendorong semua bisnis retail dan ingin menjadi bagian dari perkembangan UKM di Indonesia,\" ucap Aliza Knox, Managing Director Online Sales Twitter Asia Pacific di Jakarta, Selasa (21/4).</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Jejaring sosial yang juga identik dengan huruf &ldquo;t&rdquo; itu bukan tanpa alasan mengeluarkan fitur terbarunya itu di Indonesia. Knox menyebut Indonesia merupakan pasar global terbesar Twitter dengan jumlah pengguna aktif setiap hari. Sementara, dipilihnya UKM sebagai sasaran Twitter Ads, imbuh Knox, tidak terlepas dari realita bisnis saat ini yang bergantung pada pengguna.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Pentingya bisnis UKM bagi denyut nadi perekonomian Indonesia juga menjadi alasan lain jejaring sosial yang dinahkodai Dick Castolo itu untuk mengeluarkan fitur anyarnya itu di negara ini. Merujuk pada data dari Kementrian Koperasi dan Usaha Kecil dan Menengah, ada sekitar 56 juta UKM. Jumlah tersebut mampu berkontribusi terhadap Gross Domestic Product (GDP) hingga 60%.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">\"Bisnis skala kecil adalah tulang punggung perekonomian Indonesia, yang meliputi berbagai jenis usaha, &ldquo; sambunganya lagi.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Sementara itu, dengan Twitter Ads, para pelaku UKM bisa berinteraksi secara real-time dengan pelanggan. Hal ini akan berdampak pada peningkatan penjualan. Apalagi mengingat jumlah pengguna aktif Twitter yang cukup tinggi, menembus 288 juta.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Untuk memanfaatkan layanan Twitter Ads, para pelaku UKM bisa menggunakan fitur promotted acccounts yang akan bermanfaat untuk meningkatkan jumlah followers, promoted tweet in targeting keywords, interest and username. Meski fitur itu berbayar, tetapi biaya hanya akan dikenakan saat interaksi terjadi.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">SUMBER :&nbsp;http://beritanet.com/Technology/Berita-IT/dorong-ukm-twitter-luncurkan-twitter-ads.html</span></p>', '5ac0435c8f65a.png', '2018-04-01', 'id', 'riefqy', 'dorong-ukm,-twitter-luncurkan-twitter-ads.html', 'Y', 0),
(74, 'KKN 89 - UPT KKN dan Pemkot Makassar Tinjau Lorong Percontohan', '<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Lepas sebulan berjalannya Kuliah Kerja Nyata Gelombang 89, Pihak Pemerintah Kota Makassar dan UPT KKN Unhas melakukan kunjungan untuk memantau perkembangan program kerja wajib, yakni lorong percontohan. Diharapkan program tersebut dapat menjadi acuan keberhasilan dan keberlanjutan KKN perkotaan yang berkolaborasi dengan pemerintah.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Ada empat lokasi yang menjadi sampel dalam peninjauan tersebut. Yakni, Kelurahan Kampung Buyang di Kecamatan Mariso, Kelurahan Bara-Barayya di Kecamatan Makassar, Kelurahan Panampu Kecamatan Tallo, dan Kelurahan Ujung Tanah.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Turut hadir Kepala UPT KKN Unhas, Dr Hasrullah MA, beserta sekertaris, supervisor dan staf UPT, Kepala Bagian Pemerintahan Kota Makassar Sudarmawan Mahir, beserta perangkat pemerintahan kota Makassar, Wakapolrestabes Makassar Abdul Azis dan Staf Ahli Polda SulSelBar Dr Adi Suryadi Culla MA.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Ketua UPT KKN Unhas, seusai memantau lorong 41 sebagai lorong percontohan di kelurahan Bara-Barayya menuturkan bahwa perubahan fisik terlihat sudah cukup baik. Perkembangan optimal pada tiga minggu kedepan penting sebagai hasil akhir dari penataan lorong percontohan.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">&ldquo;Perubahan fisik sudah terlihat, tapi harus lebih optimal untuk merubah mindset masyarakat. Proses adaptasi ini harus membumi setiap lorong, sebab tentunya ini untuk kepentingan masyarakat juga,&rdquo; terang Hasrullah, Rabu (15/4).</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Fitri (45), warga lorong 41 kelurahan Bara-Barayya berinisiatif dengan membuat tanaman merambat markisa yang tergantung diatas sepanjang jalan depan rumahnya. &ldquo;Yang dilakukan oleh Bapak itu menarik dan patut dijadikan contoh. Jadi inisiatif ini paling tidak dihadirkan di depan rumah masing-masing warga,&rdquo; ucapnya. Kendati inisiatif belum menyentuh di seluruh warga lorong 41, namun hal ini patut untuk diapresiasi.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Sebagai bekal untuk merangkumkan program pada tiga minggu kedepan, Dosen Jurusan Ilmu Komunikasi Unhas ini menekankan agar mahasiswa KKN senantiasa dapat menjadi motivator, juga penggerak perubahan pola pikir pada masyarakat lorong. &ldquo;Lorong sebenarnya pusat peradaban, yang tidak baik ini menantikan mahasiswa untuk dilakukan penyuluhan dan sebagainya,&rdquo; tuturnya.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Sementara Kabag pemerintahan Kota Makassar, menyambut positif perkembangan penataan lorong yang telah dipantau. Menurutnya, ini menjadi cerminan bahwa telah terbangun hubungan dan partisipasi aktif antara masyarakat, pemerintah dan mahasiswa dalam membenahi lorong sebagai pusat peradaban kota.</span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">SUMBER :&nbsp;<a href=\"http://www.unhas.ac.id/kkn/upt-kkn-dan-pemkot-makassar-tinjau-lorong-percontohan/\">http://www.unhas.ac.id/kkn/upt-kkn-dan-pemkot-makassar-tinjau-lorong-percontohan/</a></span></p>\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">[mc]</span></p>', '', '2016-10-16', 'id', '', 'kkn-89---upt-kkn-dan-pemkot-makassar-tinjau-lorong-percontohan.html', 'N', 0),
(79, 'CoT News (Center of Technology Newsletter) Edisi I (Feb-Sept 2015)', '<p><a href=\"/cot/Newsletter1.pdf\" target=\"_blank\"><span style=\"font-size: 14pt;\">CoT News Edisi I (Feb-Sept 2015)</span></a></p>\r\n<p><span style=\"font-size: 14pt;\">Salah satu langkah penting yang perlu dilakukan untuk memberitakan telah tinggal landasnya FT Unhas dan capaian program-programnya adalah diterbitkannya media informasi komunikasi CoT-news. Penerbitan ini merupakan salah satu dari beberapa butir kerja yang diemban oleh Divisi Promosi Keteknikan sebagai salah satu dari enam divisi di dalam unit kerja CoT. Edisi perdana CoT-news dibuka dengan sambutan-sambutan dari Gubernur Sulawesi Selatan,Rektor Unhas, sambutan ini, kemudian dari Proyek C-BEST, dan Direktur CoT. Informasi selanjutnya memuat topik-topik berita utama, peristiwa penting (events), dan galeri foto, kesemuanya tentang kegiatan yang telah berlangsung sejak bulan Februari hingga September 2015.</span></p>\r\n<p><span style=\"font-size: 14pt;\">Kita berharap agar CoT-news dapat berperan sebagai media komunikasi multiarah, sehingga terbitan mendatang dapat menyediakan sedikit ruang untuk memuat topik opini dan umpan balik seperti suara civitas akademika ataupun suara mitra. Kita tentu juga berharap agar dapat segera terbit CoT-news edisi berikutnya dan seterusnya secara berkala dan berkelanjutan.</span></p>\r\n<p><span style=\"font-size: 14pt;\">Akhirnya, semoga media CoT-news bermanfaat bagi kita semua secara internal maupun eksternal. Saya sampaikan terimakasih kepada tim penyusun, dan semoga semua upaya mendapat ridho Allah Yang Maha Pengasih dan Maha Penyayang, Amin. (Dr-Ing. Wahyu H. Piarah, Dekan Fakultas Teknik Unhas)</span></p>', '56a5ea013be7a.jpg', '2016-02-13', 'id', 'adm', 'cot-news-(center-of-technology-newsletter)-edisi-i-(feb-sept-2015).html', 'Y', 0),
(80, 'Cyberneticscom ', '<p><strong><span style=\"font-size: 14pt;\">Organized by Informatics Department, Universitas Hasanuddin, Indonesia</span></strong></p>\r\n<p><span style=\"font-size: 14pt;\">Swiss-Belhotel Makassar, South Sulawesi, Indonesia November 22-24 2016</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><span style=\"font-family: arial,helvetica,sans-serif;\"><span style=\"color: #141823; line-height: 17.94px; white-space: pre-wrap;\">International Conference on Computational Intelligence and Cybernetics 2016</span><span style=\"color: #373e4d; line-height: 17.0667px; white-space: pre-wrap; background-color: #fefefe;\"> (CYBERNETICSCOM) aims to address current state of the technology and the outcome of the ongoing research in the area of Computational Intelligence and Cybernetics. It encourages a broad spectrum of contribution in the Computational Intelligence and Cybernetics sciences. Articles of interdisciplinary nature are particularly welcome. CyberneticsCom 2016 intends to be a major forum for scientists, engineers and practitioners interested in the study, analysis, design, modeling and implementation of Computational Intelligence and Cybernetics, both theoretically and in a broad range of application fields. It invites papers, original &amp; unpublished work from individuals active in the broad theme of the conference.</span></span></span></p>\r\n<p>&nbsp;</p>', '5844532f16523.jpg', '2019-06-27', 'en', 'amil_tif', 'cyberneticscom.html', 'Y', 0),
(81, 'MENGENAL CLOUD COMPUTING', '<p><strong>Sekilas Tentang&nbsp;<em>Cloud Computing</em></strong></p>\r\n<p><strong>Apa itu&nbsp;<em>Cloud Computing</em></strong></p>\r\n<p><em>Cloud Computing</em>&nbsp;atau komputasi awan merupakan kombinasi pemanfaatan teknologi komputer dengan pengembangan berbasis internet. Sebutan&nbsp;<em>cloud&nbsp;</em>sendiri merupakan sebuah istilah yang diberikan pada teknologi jaringan internet.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Cara Kerja&nbsp;<em>Cloud Computing</em></strong></p>\r\n<p>Sistem&nbsp;<em>Cloud</em>&nbsp;bekerja menggunakan internet sebagai server dalam mengolah data. Sistem ini memungkinkan pengguna untuk login ke internet yang tersambung ke program untuk menjalankan aplikasi yang dibutuhkan tanpa melakukan instalasi. Infrastruktur seperti media penyimpanan data dan juga instruksi/perintah dari pengguna disimpan secara virtual melalui jaringan internet kemudian perintah &ndash; perintah tersebut dilanjutkan ke server aplikasi. Setelah perintah diterima di server aplikasi kemudian data diproses dan pada proses final pengguna akan disajikan dengan halaman yang telah diperbaharui sesuai dengan instruksi yang diterima sebelumnya sehingga konsumen dapat merasakan manfaatnya.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Jenis-jenis Layanan&nbsp;<em>Cloud Computing</em></strong></p>\r\n<ol>\r\n<li>&nbsp;<em>Software as a Service</em>&nbsp;(SaaS)</li>\r\n</ol>\r\n<p>Adalah salah satu layanan dari&nbsp;<em>Cloud Computing</em>&nbsp;dimana kita tinggal memakai software (perangkat lunak) yang telah disediakan.&nbsp;<em>User</em>&nbsp;hanya tahu bahwa perangkat lunak bisa berjalan dan bisa digunakan dengan baik. Contohnya seperti Gmail, Facebook, dan lain-lain.&nbsp;</p>\r\n<ol start=\"2\">\r\n<li>&nbsp;<em>Platform as a Service</em>&nbsp;(PaaS)</li>\r\n</ol>\r\n<p>Adalah layanan dari&nbsp;<em>Cloud Computing</em>&nbsp;kalau kita analogikan dimana kita menyewa &ldquo;rumah&rdquo; berikut lingkungan-nya (sistem operasi,&nbsp;<em>network</em>,&nbsp;<em>database engine</em>,&nbsp;<em>framework</em>&nbsp;aplikasi, dll), untuk menjalankan aplikasi yang kita buat. Contohnya seperti &nbsp;Amazon Web Service</p>\r\n<ol start=\"3\">\r\n<li>&nbsp;<em>Infrastructure as a Service</em>&nbsp;(IaaS)</li>\r\n</ol>\r\n<p>Adalah layanan dari&nbsp;<em>Cloud Computing</em>&nbsp;dimana kita bisa &ldquo;menyewa&rdquo; infrastruktur IT (komputasi,<em>storage</em>,&nbsp;<em>memory</em>,&nbsp;<em>network</em>&nbsp;dsb). Kita bisa definisikan berapa besar-nya unit komputasi (CPU), penyimpanan data (<em>storage</em>) ,&nbsp;<em>memory</em>&nbsp;(RAM), bandwith, dan konfigurasi lain-nya yang akan kita sewa. Contohnya seperti TelkomCloud</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Keuntungan Menggunakan&nbsp;<em>Cloud Computing</em></strong></p>\r\n<ol>\r\n<li>&nbsp;Semua data tersimpan di server secara terpusat</li>\r\n<li>&nbsp;Keamanan data</li>\r\n<li>&nbsp;Fleksibilitas dan skalabilitas yang tinggi</li>\r\n<li>&nbsp;Investasi jangka panjang</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Sumber :</p>\r\n<p><a href=\"http://www.cloudindonesia.or.id/\">http://www.cloudindonesia.or.id/</a></p>\r\n<p><a href=\"http://www.progresstech.co.id/\">http://www.progresstech.co.id</a>/</p>\r\n<p><a href=\"http://pusatteknologi.com/\">http://pusatteknologi.com/</a></p>', '5ac0424b788df.jpg', '2017-10-25', 'id', 'riefqy', 'mengenal-cloud-computing.html', 'Y', 0),
(82, 'Bebras Indonesia 2018 [Workshop & Kuliah Tamu]', '<p>Bebras Indonesia 2018 Departemen Teknik Informatika bekerja sama dengan Himpunan Mahasiswa Informatika Fakultas Teknik Universitas Hasanuddin mengadakan kegiatan workshop dan kuliah tamu di Gedung CSA FT-UH. Kegiatan ini dilaksanakan selama dua hari yaitu pada hari Kamis, 26 Juli 2018 sampai dengan hari Jumat, 27 Juli 2018.</p>\r\n<p>Tema pada workshop kali ini mengangkat tentang Computational Thinking &amp; Bebras Challenge, Kamis (26/7). Sedangkan acara Kuliah Tamu mengangkat tema Competitive Programmer &amp; Autograder System Kegiatan ini di ikuti oleh dosen,mahasiswa, dan guru-guru dari jenjang Sd hingga SMA di berbagai sekolah di makassar.</p>\r\n<p>Kegiatan ini menhadirkan pemateri Ibu Dr. Ir. Inggriani Liem, beliau adalah ketua pembina TOKI, ketua Bebras Indonesia, sekaligus dosen di Institut Teknologi Bandung.</p>\r\n<p>Bebras adalah sebuah inisiatif yg bertujuan untuk mempromosikan computational thinking (berpikir dengan landasan komputasi atau informatika) di kalangan tenaga pengajar dan masyarakat luas. Computational Thinking adalah sebuah metode pemecehan masalah dengan mengaplikasikan atau melibatkan teknik yang digunakan oleh software engineer dalam menulis program. Berpikir komputasi tidak berarti berpikir seperti komputer, melainkan berpikir tentang komputasi dimana seseorang &nbsp;dituntut untuk memformulasikan &nbsp;masalah dalam bentuk masalah komputasi itu, yg disampaikan oleh ibu Inge pada kegiatan tersebut. Pada kegiatan tersebut beliau menyampaikan tentang pengajaran informatika sejak dini dan kurikulummya pada Guru tingkat SD, SMP SMA dan latihan bebras challenge dan olympia. Di SD sampai SMA guru harus memulai belajar programming &nbsp;karena kita ingin mengikuti &nbsp;perkembangan ucapnya dalam kegiatan Workshop Computational Thinking dan bebras challenge oleh Departemen Teknik Informatika Fakultas Teknik Universitas Hasanuddin dengan HMIF FT-UH. Harapannya dengan materi ini guru dapat meningkatkan kualitas siswa-siswinya untuk berkompetensi dibidang informatika. Ia berharap kelak indonesia tidak selalu terpuruk diposisi ke-6&nbsp; dari bawah hasil survey PISA mengenai kemampuan informatika siswa.</p>\r\n<p>Ketua Departemen Teknik Informatika Dr Amil Ahmad Ilham, S.T M.IT saat menutup kegiatan berharap kegiatan yang pertama kalinya dilakukan Departemen Informatika dengan melibatkan guru, kedepannya dapat terus dilakukan untuk meningkatkan kapasitas dan kualitas kegiatannya sehingga UNHAS sebagai perguruan tinggi &nbsp;dapat berkontribusi kepada masyarakat melalui pendidikan, ujarnya.</p>', '5b6185b054f82.jpg', '2018-08-01', 'id', 'imran', 'bebras-indonesia-2018-[workshop-danamp;-kuliah-tamu].html', 'Y', 0),
(85, 'tes judul', '<p>tes konten</p>\r\n<p>&nbsp;</p>', '', '2018-08-12', 'id', 'endy', 'tes-judul.html', 'Y', 0),
(86, 'Pelatihan Updating Website Fakultas dan Departemen ', '<p>Assalumualaikum Wr. Wb</p>\r\n<p>Pelatihan updating web fakultas dan departemen yang di ikuti oleh Dosen dan Pegawai dari berbagai departemen Fakultas Teknik Universitas Hasanuddin, Gowa yang dilaksanakan digedung CSA lantai 2 di jalan Poros Malino Raya, Kelurahan Borongloe, Kecamatan Bontomarannu, Kabupaten Gowa, Selasa (31/7/2018). Dalam pelatihan website ini Dosen dan Pegawai diajarkan bagaimana mengelola web baik fakultas maupun departemen ketika sudah login. Ketua Panitia Pelatihan, Bapak Dr. Amil Ahmad Ilham S.T M.IT mengatakan, pelatihan ini dilakukan untuk mengoptimalkan pengelolaan laman <a>http://eng.unhas.ac.id </a>serta meningkatkan kemampuan para pengelola website Fakultas Teknik Universitas Hasanuddin dalam penulisan pengunggahan content. Pelatihan updating web merupakan salah satu program kerja dari Tim Media Fakultas yang dibentuk oleh pimpinan fakultas teknik yang bertujuan untuk meningkatkan kinerja publikasi para dosen fakultas teknik. Setelah pelatihan ini , diharapkan peserta dapat menjadi web administrator dan bisa mengupdate website Fakultas maupun Departemen.</p>\r\n<p>Sekian dan Terima Kasih</p>\r\n<p>wassalamualaikum wr.wb</p>', '5b618ccdca8aa.jpg', '2018-08-01', 'id', 'imran', 'pelatihan-updating-website-fakultas-dan-departemen.html', 'Y', 0),
(87, 'Rayakan Dies Natalis ke 58  Fakultas Teknik Universitas Hasanuddin Gelar Open Campus', '<p>Fakultas Teknik Universitas Hasanuddin akan merayakan Dies Natalis ke 58 pada tanggal 22 September 2018 mendatang. Ketua Panitia Dies Natalis Fakultas Teknik Unhas Dr. Muhammad Isran kepada media di Dean Hall COT Kampus FT Unhas, Kamis (16/8/2018) siang, mengatakan segala persiapan sudah matang. Pada perayaan Dies tahun ini, panitia akan merayakan secara besar-besaran . Berbagai acara telah disiapkan termasuk kegiatan perdana yakni Open Campus.</p>\r\n<p>Kegiatan tersebut dibuka untuk umum, jadi bukan hanya kalangan mahasiswa dan alumni yang akan meramaikan event ini tapi juga terbuka untuk masyarakat umum.&nbsp; Pelaksanaan dari rangkain kegiatan Dies Natalis ke 58 FT-UH mulai digelar pada Sabtu 18 Agustus 2018. Jadi mulai Sabtu (18/8/2018), kita akan lakukan open campus. open campus ini bisa dikunjungi masyarakat luar serta pelajar SMA selain dari 1.104 Mahasiswa Baru, kata Muhammad Isran.&nbsp; Acara puncak Dies Natalis ke 59 FT-UH bertema \"Strengthening Technology Innovation\" yang akan dilakukan pada 22 September mendatang.</p>\r\n<p>Pada momen ini di isi dengan beberapa kegiatan dalam rangkaian kalender dies natalis yang akan dihadiri Gubernur SULSEL yang definitif. Selain berbagai lomba olahraga juga dilakukan pennyerahan penghargaan dari pimpinan Universitas untuk mahasiswa dan dosen berprestasi. Pengurus Ikatan Alumni Teknik (IKATEK) Unhas pun menyambut hangat kegiatan peringatan Dies Natalis ke 58 ini dalam pertemuan di Jakarta dengan Wakil&nbsp; Dekan II, Wakil Dekan III FT-UH. Ketua Ikatek Unhas Ir. Haedar Arifin Karim menyatakan kesiapan alumni untuk berpartisipasi dalam rangkaian kegiatan tersebut. Sebagai alumni, kita sangat bangga dan bahagia Teknik Unhas sudah berusia 58 tahun. Alumni tentu akan mendukung sepenuhnya demi almamater tercinta, ujarnya.</p>', '5b76dacd85ea1.jpg', '2018-08-17', 'id', 'imran', 'rayakan-dies-natalis-ke-58--fakultas-teknik-universitas-hasanuddin-gelar-open-campus.html', 'Y', 0),
(88, 'Kujungan Bapak Wakil Gubernur Sulsel dan Dekan Fakultas Teknik Universitas Hasanuddin di Stand Teknik Informatika', '<p>Sabtu (18, Agustus 2018), kegiatan yang difokuskan di Halaman Classroom Kampus Teknik Gowa di Jalan Poros Malino, Kecamatan Bontomarannu. Acara open campus dirangkaikan dengan pembukaan Dies Natalis FT-UH yang ke 58 sangat meriah. Dekan FT-UH Muhammad Arsyad Thaha mengatakan, kegiatan tersebut dimeriahkan dengan beberapa pertunjukkan. Mulai dari pameran teknologi, pementasan seni budaya, hiburan gingga parents student gathering. Di kegiatan ini selain masyarakat umum juga melibatkan siswa SMA , Mahasiswa Baru FT-UH dan tamu undangan, katanya. Stand dari 13 Departemen yang di tampilkan pada acara open campus tersebut sangat memberikan Inspirasi dan Motivasi Kepada Mahasiswa Baru 2018 dan siswa anak SMA karena berbagai macam hasil karya ditampilkan baik dari Mahasiswa maupun dari dosen. Menurut Bapak Wakil Gubernur Sulsel Andi Sudirman Sulaiman S.T&nbsp;&nbsp; Stand dari Departemen Teknik Informatika ini menarik dari segi teknologi salah satunya alat yang dibuat dari mahasiswa AIMP yaitu alat pendeteksi api, ujarnya.</p>', '5b794133ef43b.jpg', '2018-08-19', 'id', 'imran', 'kujungan-bapak-wakil-gubernur-sulsel-dan-dekan-fakultas-teknik-universitas-hasanuddin-di-stand-teknik-informatika.html', 'Y', 0),
(89, 'Kuliah Tamu [Security Metrics : So Important Yet So Overlooked] Nara Insitute Of Science and Engineering (NAIST)', '<p>Rabu, 29 Agustus 2018 Kuliah Tamu yang diadakan oleh Departemen Teknik Informatika dengan Dr. Doudou Fall, Assistant Professor, Laboratoy For Cybes Rilisience, Nara Institute Of Science and Engineering (NAIST) yang bertempat di LT.2 CSA Building Fakultas Teknik Universitas Hasanuddin, Gowa. Dr. Doudou Fall adalah salah satu pengajar di NAIST <em>Graduate School of Information Science </em>pada departemen ilmu informasi. Ia juga merupakan staf penelitian pada laboratorium di bidang ketahanan Cyber (Cyber Rilisience).&nbsp;</p>\r\n<p>Dr. Doudou Fall memperkenalkan NAIST Japan kepada Dosen dan Mahasiswa, adalah Sebuah Universitas Nasional Jepang yang berlokasi di Kansai Science City, sebuah wilayah perbatasan antara Nara, Osaka, dan Kyoto. Bagi Mahasiswa internasional dikatakannya NAIST menyambut baik orang-orang yang ingin mencari pengetahuan atau melanjutkan pendidikan Pascasarjana NAIST.</p>\r\n<p>NAIST hanya terdiri dari tiga sekolah Pascasarjana yaitu ilmu informasi, Ilmu Biologi, dan sains material. Graduate school of information menawarkan sistem pendidikan lanjutan untuk dilatih dalam penelitian tingkat pertama dan mendukung aktivasi mahasiswa internasional dengan berbagai program yang mencakup ilmu komputer, informatika media, dan informatika terapan.</p>\r\n<p>Materi yang dibawakang oleh Dr. Doudou Fall yang berlangsung di Gedung CSA LT.2 FT-UH adalah Cybersecurity, IOT Security, Cryptojacking, Vulnerability. Bagi Mahasiswa yang berprestasi tersedia beasiswa dari pemerintah Jepang dan dari sumber-sumber lainnya. NAIST juga menawarkan dukungan hidup yang komprenshif bagi siswa internasional termasuk akomodasi dikampus, Ungkapnya.</p>\r\n<p>&nbsp;</p>', '5b868e36b0cc5.jpg', '2018-08-29', 'id', 'imran', 'kuliah-tamu-[security-metrics--so-important-yet-so-overlooked]-nara-insitute-of-science-and-engineering-(naist).html', 'Y', 0),
(90, 'Sosialisasi Kebijakan Peraturan Akademik 2018', '<p style=\"text-align: justify;\">Jumat, 14 September 2018 Sosialisasi Kebijakan Peraturan Akademik yang diadakan oleh Departemen Teknik Informatika&nbsp;bertempat di LT.2 CSA Building Fakultas Teknik Universitas Hasanuddin, Gowa. Sosialisasi ini dibawakan oleh Dr. Indrabayu,S.T.,M.T.,M.Bus.Sys. yang membahas mengenai kebijakan-kebijakan baru terkait Tugas Akhir, Kerja Praktek dan hal-hal yang perlu, untuk meningkatkan kualitas mahasiswa Departemen Teknik Informatika.</p>\r\n<p style=\"text-align: justify;\">Kebijakan Baru terkait Tugas Akhir, yaitu mahasiswa yang akan mengikuti tugas akhir diwajibkan untuk mengisi form pendaftaran yang kemudian akan dikirimkan kepada reviewer sebelum melakukan presentasi. Beliau menambahkan bahwa, form pendaftaran ini diadakan agar mahasiswa mengerti alur pengerjaan Tugas Akhir mereka.</p>\r\n<p style=\"text-align: justify;\">Terkait dengan Kerja Praktek yang akan dilakukan oleh mahasiswa, harus ada persetujuan jobdesk oleh pembimbing dan mitra. Pembimbang dan Mitra sendiri akan ditentukan oleh pihak kampus. Kemudian, mahasiswa yang ikut dalam PKM dan lolos ke PIMNAS akan dibebaskan dari Kerja Praktek, dengan syarat PKM tersebut dikeluarkan oleh Departemen Teknik Informatika. Dengan kata lain, PIMNAS setara dengan Kerja Praktek.</p>\r\n<p style=\"text-align: justify;\">Kebijakan baru ini diharapkan dapat mempermudah mahasiswa untuk cepat menyelesaikan masa studinya.&nbsp;</p>', '5b9cad8c87f89.jpg', '2018-09-15', 'id', 'imran', 'sosialisasi-kebijakan-peraturan-akademik-2018.html', 'Y', 0),
(91, 'Kabar Baik dari Ajang Wirausaha Muda Mandiri (WMM)', '<p style=\"text-align: justify;\">Sabtu, 15 September 2018 Mahasiswa Teknik Informatika angkatan 2014, M Zulfikri Al Qowy terpilih sebagai Juara 2 pada Kategori Bidang Usaha Sosial. Ajang Wirausaha Muda Mandiri (WMM) ini pertama kali digelar pada tahun 2007, di mana lebih dari 36.000 wirausaha muda dari 656 perguruan tinggi di seluruh Indonesia tercatat menjadi bagian dari kompetisi ini, baik sebagai juara, finalis, maupun peserta.</p>\r\n<p style=\"text-align: justify;\">Kompetisi WMM tahun ini dimulai sejak Maret kemarin, dimana sebanyak lebih dari 800 pengusaha muda dari 34 perguruan tinggi dan 10 Komunitas/Inkubator Bisnis ikut ambil bagian pada kompetisi ini. M Zulfikri Al Qowy berhasil masuk dalam 70 wirausaha muda yang lolos dalam penjurian tahap awal untuk mengikuti penjurian final nasional pada 12 September 2018 dan lolos sebagai Pemenang kedua hingga memperoleh penghargaan WMM dan uang tunai senilai Rp 50 juta.</p>\r\n<p style=\"text-align: justify;\">Mengutip perkataan&nbsp;Menteri BUMN Rini Soemarno dari Suara.com&nbsp;\"Lewat program ini, mudah-mudahan dapat terlahir lebih banyak lagi wirausahawan-wirausahawan baru yang nantinya dapat menopang dan mendorong ekonomi Indonesia menuju ke arah yang jauh lebih baik. WMM ini juga menjadi salah satu upaya BUMN untuk selalu hadir di tengah masyarakat dan membangun negeri,\".</p>', '5b9e87ef852bb.jpg', '2018-09-16', 'id', 'imran', 'kabar-baik-dari-ajang-wirausaha-muda-mandiri-(wmm).html', 'Y', 0),
(92, 'Digital Telant Scholarship 2019 Kerjasama dengan Kemkominfo', '<p><span style=\"font-size: 14pt;\">Tahun ini Teknik Informatika Unhas menjadi salah satu tempat penyelenggara FGA pada bidang Big Data, Cloud Computing, IoT dan AI. Pelatihan akan berlangsung mulai 1 Juli s.d 15 Agustus 2019 di kampus kebanggaan Fakultas Teknik Unhas Gowa dan akan diikuti oleh 220 peserta yang telah dinyatakan lulus oleh Kemkominfo.</span></p>', '5d13f45d78cf8.JPG', '2019-06-27', 'id', 'Amil', 'digital-telant-scholarship-2019-kerjasama-dengan-kemkominfo.html', 'Y', 0),
(93, 'Digital Telant Scholarship 2019', '<p><span style=\"font-size: 14pt;\">In Collaboration with Ministry of Communication and Informatics, Department of Informatics Unhas proudly present training in Big Data, Cloud Computing, IoT dan AI as part of Digital Telant Scholarship Program 2019. This training will last from July 1st until August 15, 2019. There are 220 awardees will attend these training that will be located in FoE Unhas Campus, Gowa.</span></p>', '5d13f63c978f1.JPG', '2019-06-27', 'en', 'Amil', 'digital-telant-scholarship-2019.html', 'Y', 0),
(94, 'Weather Services', '<p><span style=\"font-size: 14pt;\">AIMP weather services. Prototype radar with IoT technology. At rooftop of Electrical Building. Target: Cheap but robust materials.</span></p>', '5d13ff9d11182.JPG', '2019-06-27', 'en', 'Amil', 'weather-services.html', 'Y', 0),
(95, 'Undangan Mengikuti Calon Evaluator IABEE', '<p><span style=\"font-size: 14pt;\">IABEE (Indonesian Accreditation Board for Engineering Education) mengundang empat orang dosen Fakultas Teknik Unhas untuk mengikuti pelatihan calon Evaluator IABEE yang akan dilaksanakan pada tanggal 12 - 14 Juli 2019 di Jakarta. Keempat dosen yang diundang adalah Dr. Ir. Muhammad Arsyad Thaha (Dekan FTUH), Dr. Amil Ahmad Ilham (Kadep Teknik Informatika), Dr. Muralia Hustim (Kadep Teknik Lingkungan) dan Dr. Muh. Asad Abdurrahman (dosen Teknik Sipil) </span></p>', '5d1435658a909.JPG', '2019-06-27', 'id', 'Amil', 'undangan-mengikuti-calon-evaluator-iabee.html', 'Y', 0),
(96, 'BATCH 2 Digital Talent Scholarship Fresh Graduate Academy Universitas Hasanuddin', '<p><span style=\"font-size: 14pt;\"><strong>Tes Substansi Online 2-3 Oktober 2019 </strong></span></p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Link Tes Substansi telah dikirimkan melalui email yang telah diregistrasi sebelumnya</strong></span></p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Mohon dicek di inbox masing-masing dengan subject : Test Substansi FGA DTS UNHAS - Bidang [NAMA BIDANG] dan sender : admin@flexiquiz.com</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Hasil Seleksi Peserta akan diumumkan pada tanggal 4 Oktober di laman <a href=\"http://eng.unhas.ac.id/informatika\">Web Informatika Unhas</a></strong></span></p>\r\n<p><span style=\"font-size: 12pt;\"><strong>&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Informasi Umum</strong></p>\r\n<p><strong>Digital Talent Scholarship</strong>&nbsp;<strong>(DTS)</strong>&nbsp;adalah program beasiswa pelatihan intensif bagi 25.000 peserta yang bertujuan untuk meningkatkan keterampilan dan daya saing SDM bidang teknologi informasi dan komunikasi dalam menyongsong revolusi industri 4.0.</p>\r\n<p><strong>Fresh Graduate Academy (FGA)</strong>&nbsp;merupakan program beasiswa pelatihan intensif untuk lulusan D3,D4,S1 bidang IT, MIPA, atau Teknik yang belum memiliki pekerjaan tetap. Program ini juga menyediakan materi kewirausahaan digital dan professional skill development bagi seluruh peserta.</p>\r\n<p><strong>Hak dan Kewajiban Peserta Pelatihan Beasiswa DTS-FGA</strong><a href=\"https://digitalent.kominfo.go.id/hak_kewajiban\">Klik di sini</a></p>\r\n<p><strong>Kelas/Program Pelatihan</strong>:</p>\r\n<ul>\r\n<li><a href=\"http://bit.ly/silabusAI-unhas\">Artificial Intelligence</a> (kuota 30 Peserta)</li>\r\n<li><a href=\"http://bit.ly/silabusBigData-unhas\">Big Data</a> (kuota 30 Peserta)</li>\r\n<li><a href=\"http://bit.ly/silabusCloud-unhas\">Cloud Computing</a> (kuota 30 Peserta)</li>\r\n<li><a href=\"http://bit.ly/silabusIOT-unhas\">Internet of Things</a>(kuota 30 Peserta)</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Jadwal Kelas:</strong></p>\r\n<p>Senin-Jumat<strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;</strong>13.00-17.00</p>\r\n<p>Sabtu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>:&nbsp;</strong>08.00-15.00</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Persyaratan Umum</strong></p>\r\n<ul>\r\n<li>Warga negara Indonesia Usia maksimal 29 Tahun pada saat mendaftar</li>\r\n<li>Lulus pendidikan D3/D4/S1 bidang IT, MIPA, atau Teknik (atau yang terkait) atau mahasiswa tingkat akhir yang sedang mengerjakan Tugas Akhir</li>\r\n<li>Belum memiliki pekerjaan tetap Lolos seleksi administrasi dan tes substansi</li>\r\n<li>Belum pernah mengikuti program pelatihan FGA/VSGA Digital Talent edisi sebelumnya</li>\r\n<li>Tidak mengundurkan diri jika dinyatakan lulus selekso</li>\r\n<li>Bersedia mengikuti peraturan dan tata tertib serta mengikuti kegiatan hingga akhir</li>\r\n</ul>\r\n<p><strong>Peserta Berhak Mendapatkan</strong>:</p>\r\n<ol>\r\n<li>Seminar Kit (Jaket, T-Shirt, dan Flash Disk)</li>\r\n<li>Uang saku diklat sebesar Rp 750.000,00/bulan (Tujuh ratus lima puluh ribu rupiah) yang akan diserahkan pada akhir pelaksanaan pelatihan sesuai ketentuan dari Kementerian Kominfo</li>\r\n<li>Sertifikat dari Kementerian Kominfo dan Certificate of Completion dari Mitra Pelatihan jika telah mengikuti pelatihan dan memenuhi persyaratan yang ditentukan</li>\r\n<li>Kesempatan untuk mengikuti pelatihan online Kewirausahaan Digital dan Soft-Skills Development</li>\r\n<li>Setelah menyelesaikan pelatihan, peserta mendapat kesempatan untuk mengikuti Program Pasca Pelatihan berupa pemagangan dan/atau penempatan kerja bagi peserta yang memenuhi kualifikasi dan belum memiliki pekerjaan penuh waktu.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Persyaratan Dokumen&nbsp;</strong></p>\r\n<ol>\r\n<li>Scan KTP</li>\r\n<li>Scan bukti kelulusan atau mahasiswa sedang menuliskan tugas akhir, dapat berupa:\r\n<ul>\r\n<li>Ijazah D3, D4 atau Strata-1</li>\r\n<li>Surat Keterangan Lulus</li>\r\n<li>Surat Keterangan dari Prodi/Departemen/Fakultas/Universitas dengan melakukan bimbingan tugas akhir</li>\r\n</ul>\r\n</li>\r\n<li>Scan Transkrip Nilai (Bagi mahasiswa tugas akhir melampirkan surat keterangan dari&nbsp;prodi/KRS yang menerangkan sedang menulis tugas akhir dan transkrip terakhir -bagian bulan dan tahun lulus diisikan expected graduation date)</li>\r\n<li>Scan sertifikat pendukung yang berhubungan dengan IT (jika ada)</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>JADWAL REGISTRASI ONLINE: </strong></p>\r\n<p><strong>14 &ndash; 28 September 2019</strong></p>\r\n<p>Link Registrasi <a href=\"http://bit.ly/fga-unhas\">http://bit.ly/fga-unhas</a></p>\r\n<p>&nbsp;</p>\r\n<p><strong>JADWAL TES SUBSTANSI (ONLINE):</strong></p>\r\n<p><strong>2-3 Oktober 2019</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>PENGUMUMAN HASIL SELEKSI</strong></p>\r\n<p><strong>4 Oktober 2019</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>JADWAL PELAKSANAAN PELATIHAN:</strong></p>\r\n<p><strong><strong>7 Oktober 2019 &ndash; 15 Nopember 2019</strong> </strong></p>\r\n<p><strong><strong>Kampus Fakultas Teknik Universitas Hasanuddin</strong></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contact Person:</strong> Whatsapp: Ais / 08114459418</p>\r\n<p>Web : <a href=\"/informatika\">https://eng.unhas.ac.id/informatika</a></p>', '5d7b393d2df47.jpeg', '2019-10-02', 'id', 'ais', 'batch-2-digital-talent-scholarship-fresh-graduate-academy-universitas-hasanuddin.html', 'Y', 0),
(97, 'Pengumuman Seleksi Peserta Digital Talent Scholarship Fresh Graduate Academy 2019 Batch 2 Kemkominfo - Universitas Hasanuddin', '<p><span style=\"font-size: 10pt;\">Dibawah ini adalah daftar peserta yang dinyatakan berhak mengikuti pelatihan Digital Talent Scholarship Fresh Graduate Academy 2019 Batch 2 di Universitas Hasanuddin untuk tiap tema pelatihan berdasarkan hasil tes substansi</span></p>\r\n<p><span style=\"font-size: 10pt;\">Beberapa hal yang perlu diperhatikan untuk peserta lulus seleksi dan peserta cadangan :&nbsp;</span></p>\r\n<ol>\r\n<li><span style=\"font-size: 10pt;\">Tiap peserta yang telah lulus akan dimasukkan ke dalam grup Whatsapp dan diberikan informasi lanjut melalui grup tersebut.</span></li>\r\n<li><span style=\"font-size: 10pt;\">Briefing teknis akan diadakan pada hari senin tanggal 7 Oktober 2019 mulai pukul 08:30 bertempat di Ruang Lecture Theater 1 Gedung CSA , Fakultas Teknik Unhas, Jalan Poros Malino Km. 6 Gowa. Seluruh peserta yang lulus seleksi wajib mengikuti briefing teknis&nbsp;</span></li>\r\n<li><span style=\"font-size: 10pt;\">Pelatiihan akan diadakan mulai hari selasa tanggal 8 Oktober 2019</span></li>\r\n<li><span style=\"font-size: 10pt;\">Peserta yang telah dinyatakan lulus, diminta untuk mulai menyiapkan beberapa dokumen yang harus diupload saat pendaftaran ke situs digitalent kominfo (scan Kartu Identitas, Ijazah/Surat keterangan Lulus/Surat keterangan Sedang Membuat Skripsi)</span></li>\r\n<li><span style=\"font-size: 10pt;\">Peserta&nbsp;cadangan akan dihubungi paling lambat hari Rabu 9 Oktober 2019 untuk menggantikan jika ada peserta lulus seleksi yang mundur atau tidak dapat mengikuti pelatihan.</span></li>\r\n<li><span style=\"font-size: 10pt;\">Jadwal Pelatihan tiap kelas akan diumumkan melalui grup Whatsapp tiap tema pelatihan</span></li>\r\n<li><span style=\"font-size: 10pt;\">Jika ada pertanyaan atau hal lain yang kurang jelas, silahkan menghubungi melalui WA 08114459418 atau email ais.prayogi@gmail.com</span></li>\r\n</ol>\r\n<table style=\"height: 427px; width: 508px;\" border=\"2\" width=\"508\" cellspacing=\"2\" cellpadding=\"5\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-size: 12pt;\"><strong>Tema Big Data Analytics</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td>Achmad Chaedar<br />Ade Kurniawan Putra Hadi. HN<br />Ade Widya Clara Pamuso<br />Aditio Putra Gazali<br />Afifah Ilham<br />Afriliya Rumaizha Ahmad<br />Ahmad Alfani<br />Alfian<br />Andi Sitti Fahmi Riyanti Hufaini<br />Ardya Dwi Rahmasari<br />Aslan Poetra Ramadhan<br />Asri Oktianawati<br />Asti Inayati Magfirah<br />Astuti Mayangsari<br />Aswar<br />Charina<br />Dian Indani<br />Diki Siswanto<br />Elsa Resa Sari<br />Fabyola Larasati Masyita<br />Ferra Andriani<br />Fikri Imam Muttaqin<br />Fitriani S<br />Grace Oktavia Yusuf<br />Handri<br />Hermawan Safrin<br />Hesti Erdayanti<br />Ismayanti<br />Jusmiati<br />Khusnul Khatima</td>\r\n<td>Laura Natalia Nainggolan<br />MALYANA ARIANI<br />Maximilian Yohannes<br />Meity Hariyani<br />Muh. Rizal Kurniawan Nur<br />Muhammad Musyawir<br />Muhammad Syafri<br />Muhammad Wahyu Santoso<br />Nishrina Nurul Amirah<br />Nur Afni Saharuddin<br />Nurhidayah A<br />Nursyafarinah<br />Nurul Hidayanti Anggraini<br />Nurul Hikmah Safitri<br />Oka Karma Putri<br />Patricia Vhiola Palada<br />Putri Ainun Syahrani Lasuwu<br />Putri Wulandari<br />Rachmat Darmawan<br />RAFSANJANI LESTARI NEGARA<br />Riny Yustica Dewi<br />Risma<br />Rya Dita Purnama<br />Safina<br />Sitti Nur Fadillah<br />Titin Nurfadhila Sudirman<br />Umniyah Nur Aprilyah<br />Yakip<br />Yudha Islami Sulistya<br />Yusuf Ramadana</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h3>&nbsp;Cadangan Tema Big Data Analytics</h3>\r\n<p>Alif tri handoyo<br />Andi Marimar Muchtamar<br />Putri Angriani<br />Dhinda Fitri Wiludjeng<br />Reka Regina</p>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 508px;\" border=\"2\" cellspacing=\"5\" cellpadding=\"5\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: center;\" colspan=\"2\">\r\n<h2><strong>Tema Artificial Intelligence</strong></h2>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Ahmad Sandi<br />Aliyah Muthmainnah<br />Andi Abdul Dzulmukmin<br />Andi Alfian Pratama Putra<br />Andi Fajrial Ichsan<br />Andi Wijaya<br />Ayu Lestari Ramadani<br />Cici Purnamasari<br />Diki Wahyudi<br />Giyan Wirayuda Pratama<br />Ibnu Gaury<br />Irham Aryandi Basir<br />Kevin Chandra<br />Lutvi Harnantik Salsabila<br />Muh Syawal</td>\r\n<td>Muh. Arief Wicaksono<br />Muh. Firmansyah<br />Muhammad Aryandi<br />Muhammad Dhiya Ulhaq<br />Muhammad Satria Putra Trinanda<br />MUHAMMAD TAKBIR MACHMUD<br />NUR IHSAN<br />Nurhidayah<br />Nurul Musfirah<br />Rizky Alfiansyah<br />Rosalia<br />Rosdiana<br />Tuti Amalia<br />Wa Ode Rahmalia Safitri<br />Wawan Firgiawan</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h3>Cadangan Tema Artificial Intelligence</h3>\r\n<p>Ahmad Husain<br />Muh Fachrul Alam<br />Rabiatul Adawiyah<br />Andi Febrina Alam</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 508px;\" border=\"2\" cellspacing=\"5\" cellpadding=\"5\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"2\">\r\n<h2 style=\"text-align: center;\"><strong>Tema Cloud Computing</strong></h2>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>A. Ardiansyah Yusuf<br />Ali Ma\'sum<br />Auraevadne. K<br />Billa Armani Abdullah<br />Andi Ayu Ningsi<br />Asrul Paelori Ahmad<br />Dewi Kurnia Safitri<br />Dila amalia<br />fathurrahman<br />Fitriani Idrus<br />Muh Feizar Bakri<br />Glenn Claudio I.P.</td>\r\n<td>Marjono Umar<br />Asiah Hani Humaerah Hamrullah<br />Imran<br />Janu Adwiyanto<br />Rivaldi maulana<br />Muhammad Rijal<br />andi mirsa riandiani agus<br />Nazila Riza Aprisa<br />Nur Arifa Isnaeni Nawir<br />rahmat hidayat<br />Rizky Nadya Fatma<br />Ulfah Rojiyyah<br />Winda Astiyanti Azis</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 508px;\" border=\"2\" cellspacing=\"5\" cellpadding=\"5\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"2\">\r\n<h2 style=\"text-align: center;\"><strong>Tema Internet of Things</strong></h2>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Abdul Rahman Khadafi<br />Andi Amelia Ramadanti<br />Andi Muh. Agung Alif Hidayat<br />Bella Regita Cahyani<br />Dandi Wisnu Shoreandi<br />Daud ali pakan<br />Dirga Utama Kamal<br />Faiz Abdul Latif<br />Fathur Rizqi<br />Ghina Syukriyah Rania<br />Hermansyah<br />Irwan Ardyansah<br />JUMADIL MUSTAMIN<br />La Ode Armin</td>\r\n<td>LUTFI QADRI<br />MUH KHAERIL SYAM<br />MUH. IBNU<br />Muhammad Irsyad Ashari<br />MUTHALIA ANNISA<br />Nurhatinah HR, S.Pd<br />Nurul azizah syafruddin<br />Raditha Dwi Khaerunnisa<br />ROHANI<br />Ryan Rafli<br />Sabtian Juliana<br />Said Syamil Amas<br />Tafrijiah Pratiwi Dunggio<br />Zhazha Alifkhamulki Ramdhani</td>\r\n</tr>\r\n</tbody>\r\n</table>', '5d96ded03d70a.jpeg', '2019-10-04', 'id', 'ais', 'pengumuman-seleksi-peserta-digital-talent-scholarship-fresh-graduate-academy-2019-batch-2-kemkominfo---universitas-hasanuddin.html', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `artikel1`
--

CREATE TABLE `artikel1` (
  `id_artikel` int(10) NOT NULL,
  `id_halaman` int(10) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `konten_artikel` text NOT NULL,
  `tanggal` date NOT NULL,
  `link_artikel` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `bahasa_artikel` enum('en','id') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel1`
--

INSERT INTO `artikel1` (`id_artikel`, `id_halaman`, `penulis`, `judul_artikel`, `konten_artikel`, `tanggal`, `link_artikel`, `picture`, `publish`, `bahasa_artikel`) VALUES
(5, 1, 'robert', 'Proposal Seminar of Final Project', '<p style=\"text-align: justify;\">\r\n	<span style=\"color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15.5555562973022px; line-height: 23.8095245361328px; text-align: justify;\">Proposal Seminar of Final Project is scheduled on Monday, December 1st, 2014 at 09:00 am. Submission deadline of proposal is on Friday, November 28th, 2014.</span></p>\r\n', '2014-11-13', 'Proposal-Seminar-of-Final-Project', '', 'Y', 'en'),
(6, 1, 'robert', 'Info Seminar Proposal Tugas Akhir', '<p style=\"text-align: justify;\">\r\n	<span style=\"color: rgb(20, 24, 35); font-family: Helvetica, Arial, \'lucida grande\', tahoma, verdana, arial, sans-serif; font-size: 14.4444446563721px; line-height: 19.3199996948242px; text-align: justify;\">Seminar Proposal Tugas Akhir dijadwalkan pada hari Senin, 1 Desember 2014 pukul 09.00 WITA. Batas akhir pemasukan proposal Tugas Akhir adalah hari Jumat, 28 November 2014.</span></p>\r\n', '2014-11-13', 'Info-Seminar-Proposal-Tugas-Akhir', '', 'Y', 'id'),
(7, 1, 'robert', 'Pelatihan Pengisian Konten Website Program Studi S1 dan S2 Fakultas Teknik', '<p style=\"text-align: justify;\">\r\n	<span style=\"color: rgb(0, 0, 0); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 21.4285717010498px;\">Pelatihan pengisian website yang dilaksanakan pada hari ini Senin, 3 November 2014 diikuti oleh Program Studi Se Fakultas Teknik UNHAS.</span></p>\r\n', '2014-11-13', 'Pelatihan-Pengisian-Konten-Website-Program-Studi-S1-dan-S2-Fakultas-Teknik', '', 'Y', 'id'),
(8, 1, 'Amil A. Ilham', 'Demo pengenalan CMS Conference, cara mudah membuat website seminar nasional dan internasional.', '<p>\r\n	Dalam rangka memfasilitasi pelaksanaan seminar nasional/internasional, Tim TI Fakultas Teknik Unhas dan Prodi Teknik Informatika Unhas akan melaksanakan demo &ldquo;Pengenalan CMS Conference, cara mudah membuat website seminar nasional dan internasional tanpa harus menyewa programmer&rdquo; yang insya Allah akan dilaksanakan pada:</p>\r\n<p>\r\n	Hari/tgl&nbsp;&nbsp; : Senin, 15 Desember 2014</p>\r\n<p>\r\n	Pukul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 09.00 - 12.00 Wita</p>\r\n<p>\r\n	Tempat&nbsp;&nbsp; : Ruang sidang Fakultas Teknik Unhas</p>\r\n<p>\r\n	Bagi yang berminat mengikuti kegiatan ini, silahkan registrasi dengan cara mengirim: Nama Lengkap, Nomor HP, dan program studi ke&nbsp; email <strong>amil_ai@yahoo.com</strong>, subject: registrasi demo CMS conference, paling lambat hari Jum&rsquo;at, 12 Desember 2014, pukul 11.00 Wita.</p>\r\n', '2004-01-08', 'Demo-pengenalan-CMS-Conference,-cara-mudah-membuat-website-seminar-nasional-dan-internasional.', '', 'Y', 'id'),
(9, 1, '', 'Pelatihan', '<p>\r\n	Pelatihan Lagi</p>\r\n', '2015-01-09', 'Pelatihan', 'Pelatihan606746246.png', 'Y', 'id');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_akreditasi`
--

CREATE TABLE `dokumen_akreditasi` (
  `id` int(11) NOT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `keterangan_dokumen` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `standar_1` int(11) DEFAULT NULL,
  `standar_2` int(11) DEFAULT NULL,
  `standar_3` int(11) DEFAULT NULL,
  `standar_4` int(11) DEFAULT NULL,
  `standar_5` int(11) DEFAULT NULL,
  `standar_6` int(11) DEFAULT NULL,
  `standar_7` int(11) DEFAULT NULL,
  `standar_8` int(11) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `a1` int(11) NOT NULL,
  `a2` int(11) NOT NULL,
  `b1` int(11) NOT NULL,
  `b2` int(11) NOT NULL,
  `b3` int(11) NOT NULL,
  `b4` int(11) NOT NULL,
  `b5` int(11) NOT NULL,
  `b6` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `d5` int(11) NOT NULL,
  `d6` int(11) NOT NULL,
  `e1` int(11) NOT NULL,
  `e2` int(11) NOT NULL,
  `e3` int(11) NOT NULL,
  `e4` int(11) NOT NULL,
  `e5` int(11) NOT NULL,
  `e6` int(11) NOT NULL,
  `e7` int(11) NOT NULL,
  `f1` int(11) NOT NULL,
  `f2` int(11) NOT NULL,
  `f3` int(11) NOT NULL,
  `f4` int(11) NOT NULL,
  `f5` int(11) NOT NULL,
  `g1` int(11) NOT NULL,
  `g2` int(11) NOT NULL,
  `g3` int(11) NOT NULL,
  `h1` int(11) NOT NULL,
  `h2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen_akreditasi`
--

INSERT INTO `dokumen_akreditasi` (`id`, `nama_dokumen`, `keterangan_dokumen`, `nama_file`, `standar_1`, `standar_2`, `standar_3`, `standar_4`, `standar_5`, `standar_6`, `standar_7`, `standar_8`, `waktu`, `a1`, `a2`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `c1`, `c2`, `c3`, `c4`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `e7`, `f1`, `f2`, `f3`, `f4`, `f5`, `g1`, `g2`, `g3`, `h1`, `h2`) VALUES
(59, '01 RENSTRA UNHAS 2016-2020 (REVISI)', '', '01_RENSTRA_UNHAS_2016_2020_(REVISI).pdf', 1, 0, 0, 0, 0, 0, 0, NULL, '2018-03-28 10:13:34', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, '02 Renstra Fakultas Teknik 2016-2020', '', '02_Renstra_Fakultas_Teknik_2016_2020.pdf', 1, 0, 0, 0, 0, 0, 0, NULL, '2018-03-28 10:13:52', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, '03 Renstra PS Teknik Informatika', '', '03_Renstra_PS_Teknik_Informatika.pdf', 1, 0, 0, 0, 0, 0, 0, NULL, '2018-03-27 14:32:54', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, '04 dokumen VMTS', '', '04_dokumen_VMTS.pdf', 1, 0, 0, 0, 0, 0, 0, NULL, '2018-03-27 14:33:53', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, '01 SK Rektor No. 25000 thn 2016 ttg OTK Fakultas dan Sekolah', '', '01_SK_Rektor_No_25000_thn_2016_ttg_OTK_Fakultas_dan_Sekolah.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:23:02', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, '02 SK Rektor No 19756 pengangkatan dan pemberhentian pimpinan', '', '02_SK_Rektor_No_19756_pengangkatan_dan_pemberhentian_pimpinan.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:27:10', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, '03 SK Dekan No 1839 tatacara pemilihan', '', '03_SK_Dekan_No_1839_tatacara_pemilihan.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:28:58', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, '04 SK Rektor  No 1870 PERATURAN_AKADEMIK_S1_2009_Unhas', '', '04_SK_Rektor_No_1870_PERATURAN_AKADEMIK_S1_2009_Unhas.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:29:31', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, '05 SK Rektor No 16644 Tahun 2012 tentang Kode Etik Dosen', '', '05_SK_Rektor_No_16644_Tahun_2012_tentang_Kode_Etik_Dosen.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:29:48', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, '06 SK Rektor No.16890 tentang Kode Etik Mahasiswa di lingkungan Unhas', '', '06_SK_Rektor_No_16890_tentang_Kode_Etik_Mahasiswa_di_lingkungan_Unhas.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:33:50', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, '01_kalender_akademik_2016_2017', '', '01_kalender_akademik_2016_2017.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:36:06', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, '02 amil SK 001 Kepengurusan APTIKOM PUSAT 2014-2018', '', '02_amil_SK_001_Kepengurusan_APTIKOM_PUSAT_2014-2018.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:37:13', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, '03 amil SK 043 KEPENGURUSAN APTIKOM WILAYAH IX SULAWESI', '', '03_amil_SK_043_KEPENGURUSAN_APTIKOM_WILAYAH_IX_SULAWESI.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:38:04', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, '04 amil SK 28 ketua_wilayah_IAII', '', '04_amil_SK_28_ketua_wilayah_IAII.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:38:27', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, '05 amil KKNI_Aptikom', '', '05_amil_KKNI_Aptikom.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:39:53', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, '06 amil SK 052 PENGANGKATAN TASK FORCE LAM-INFOKOM FIX', '', '06_amil_SK_052_PENGANGKATAN_TASK_FORCE_LAM-INFOKOM_FIX.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:40:10', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, '07 amil_ narasumber_ SNK-IF-2015 undangan_pemateri', '', '07_amil__narasumber__SNK-IF-2015_undangan_pemateri.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:40:26', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, '08 amil_kuliah tamu Unkhair', '', '08_amil_kuliah_tamu_Unkhair.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:40:45', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, '09 amil_kulah tamu UIN Mks', '', '09_amil_kulah_tamu_UIN_Mks.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:41:04', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, '10 amil_kuliah tamu Umpar', '', '10_amil_kuliah_tamu_Umpar.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:41:24', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, '11 amil_kuliah tamu Untad', '', '11_amil_kuliah_tamu_Untad.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:41:56', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, '12 sertifikat narasumber Unasman 2016', '', '12_sertifikat_narasumber_Unasman_2016.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:42:14', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, '13 indrabayu SK 1172 dewan sombere', '', '13_indrabayu_SK_1172_dewan_sombere.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:43:11', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, '14 indrabayu SK 1061 rumah software', '', '14_indrabayu_SK_1061_rumah_software.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:43:52', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, '01 RKAT 2017 Informatika', '', '01_RKAT_2017_Informatika.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:46:53', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, '02 RKAT 2018 SIK', '', '02_RKAT_2018_SIK.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:47:09', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, '03 SK Rektor No 19756 pengangkatan dan pemberhentian pimpinan', '', '03_SK_Rektor_No_19756_pengangkatan_dan_pemberhentian_pimpinan.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:47:27', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, '01 SK Rektor No 32500 tentang Organisasi Dan Tata Kerja Lembaga Universitas Hasanuddin', '', '01_SK_Rektor_No_32500_tentang_Organisasi_Dan_Tata_Kerja_Lembaga_Universitas_Hasanuddin.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:49:15', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, '02 SK Auditor 22-Mar-2018 14-40-46', '', '02_SK_Auditor_22-Mar-2018_14-40-46.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:49:48', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, '03 Laporan_Hasil_AMI_Online_Tahun_20161', '', '03_Laporan_Hasil_AMI_Online_Tahun_20161.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:50:48', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, '04 Kebijakan_mutu_LKPP', '', '04_Kebijakan_mutu_LKPP.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:51:15', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(104, '05 Manual Mutu', '', '05_Manual_Mutu.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:51:31', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, '06 Kebijakan_Pendidikan Unhas', '', '06_Kebijakan_Pendidikan_Unhas.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:55:03', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, '07 Dokumen_Manual_Mutu_LPMI_Unhas', '', '07_Dokumen_Manual_Mutu_LPMI_Unhas.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:57:05', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, '08 Pelatihan_Penjaminan_Mutu1', '', '08_Pelatihan_Penjaminan_Mutu1.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 12:58:04', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, '09 Laporan_Dies_ke_60_2016', '', '09_Laporan_Dies_ke_60_2016.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 13:56:22', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(109, '10 SK Panitia Evaluasi Materi Pembelajaran dan Penelitian Prodi T_Informatika_FTUH', '', '10_SK_Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T_Informatika_FTUH_.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 13:57:36', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, '11 Rapat-Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T_Informatika_FTUH_', '', '11_Rapat-Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T_Informatika_FTUH_.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 13:57:56', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 'D42111291_Ade Gita Ramadhani_SertifikatCCNA', '', 'D42111291_Ade_Gita_Ramadhani_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:32:50', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 'D42112106_Muhammad Mirza Rachmat Rifai_SertifikatCCNA', '', 'D42112106_Muhammad_Mirza_Rachmat_Rifai_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:33:21', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 'D42112273_SRI WAHYUNI_SertifikatCCNA', '', 'D42112273_SRI_WAHYUNI_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:33:36', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 'D42114303_Muh.Ardiansyah.AR_SertifikatCCNA', '', 'D42114303_Muh.Ardiansyah.AR_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:33:50', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 'D42114308_Yakip Y._SertifikatCCNA', '', 'D42114308_Yakip_Y._SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:34:05', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, 'D42114318_Anastasya Yuki Aprilia_SertifikatCCNA', '', 'D42114318_Anastasya_Yuki_Aprilia_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:36:24', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 'D42114509_Cindy O Lolo Bulan_SertificateCCNA', '', 'D42114509_Cindy_O_Lolo_Bulan_SertificateCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:36:39', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 'D42114512_UlfahRojiyyah_SertifikatCCNA', '', 'D42114512_UlfahRojiyyah_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:36:54', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, 'D42114518_Ahmad Kurniawan Syarif_SertifikatCCNA', '', 'D42114518_Ahmad_Kurniawan_Syarif_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:37:08', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, 'D42115001_Muh Surya Alif Utama_SertifikatCCNA', '', 'D42115001_Muh_Surya_Alif_Utama_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:37:27', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, 'D42115002_SaidSyamilAmas_SertifikatCCNA', '', 'D42115002_SaidSyamilAmas_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:37:42', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, 'D42115003_Alfina Sulfiana_SertifikatCCNA', '', 'D42115003_Alfina_Sulfiana_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:37:57', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, 'D42115004_Ainun Mardiah_SertifikatCCNA', '', 'D42115004_Ainun_Mardiah_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:38:15', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, 'D42115005_Al Imran_SertifikatCCNA', '', 'D42115005_Al_Imran_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:38:32', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, 'D42115006_KhusnulKhatima_SertifikatCCNA', '', 'D42115006_KhusnulKhatima_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:38:50', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, 'D42115007_AndiNurulSriUtami_SertifikatCCNA', '', 'D42115007_AndiNurulSriUtami_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:44:04', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, 'D42115008_SabtianJuliana_SertifikatCCNA', '', 'D42115008_SabtianJuliana_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:44:19', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(146, 'D42115009_Nur Azizah Novitami_SertifikatCCNA', '', 'D42115009_Nur_Azizah_Novitami_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:44:52', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(147, 'D42115010_RyanRafli_SertifikatCCNA.pdf', '', 'D42115010_RyanRafli_SertifikatCCNA.pdf.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:45:05', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(148, 'D42115011_ArdyaDwiRahmasari_SertifiatCCNA', '', 'D42115011_ArdyaDwiRahmasari_SertifiatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:45:21', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(149, 'D42115012_Charina_SertifikatCCNA', '', 'D42115012_Charina_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:45:40', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(150, 'D42115013_Dewi Kurnia Safitri__SertifikatCCNA', '', 'D42115013_Dewi_Kurnia_Safitri__SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:46:05', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(151, 'D42115014_Fuad Khairi Hamid_SertifikatCCNA', '', 'D42115014_Fuad_Khairi_Hamid_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:46:20', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(152, 'D42115015_Wira Satya Pratama Biantong_SertifikatCCNA', '', 'D42115015_Wira_Satya_Pratama_Biantong_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:46:33', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(153, 'D42115016_UmniyahNurAprilyah_SertifikatCCNA', '', 'D42115016_UmniyahNurAprilyah_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:46:49', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(154, 'D42115018_DianIndani_SertifikatCCNA', '', 'D42115018_DianIndani_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:47:05', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(155, 'D42115019_BillaArmaniAbdullah_SertikatCCNA', '', 'D42115019_BillaArmaniAbdullah_SertikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:47:17', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(156, 'D42115020_LauraNataliaNainggolan_SertifikatCCNA', '', 'D42115020_LauraNataliaNainggolan_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:47:29', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(157, 'D42115021_Yuliani_SertifikatCCNA', '', 'D42115021_Yuliani_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:47:43', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(158, 'D42115022_Jusmiati_SertifikatCCNA', '', 'D42115022_Jusmiati_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:48:03', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(159, 'D42115023_MarjonoUmar_SertifikatCCNA', '', 'D42115023_MarjonoUmar_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:48:15', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(160, 'D42115024_Andi Eka Putri_SertifikatCCNA', '', 'D42115024_Andi_Eka_Putri_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:48:30', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(161, 'D42115301_NazilaRizaAprisa_SertifikatCCNA', '', 'D42115301_NazilaRizaAprisa_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:48:51', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(162, 'D42115302_Muh.AriefW_SertifikatCCNA', '', 'D42115302_Muh.AriefW_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:49:10', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(163, 'D42115304_FiqarAprialim_SertifikatCCNA', '', 'D42115304_FiqarAprialim_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:49:26', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(164, 'D42115305_RosihanArdiansyah_SertifikatCCNA', '', 'D42115305_RosihanArdiansyah_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:49:44', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(165, 'D42115307_Dila Amalia__SertifikatCCNA', '', 'D42115307_Dila_Amalia__SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:49:59', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(166, 'D42115308_Kelvin_SertifikatCCNA', '', 'D42115308_Kelvin_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:50:14', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(167, 'D42115310_Achmad Chaedar_SertifikatCCNA', '', 'D42115310_Achmad_Chaedar_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:50:34', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(168, 'D42115311_Guntur Widodo H_SertifikatCCNA', '', 'D42115311_Guntur_Widodo_H_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:50:52', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(169, 'D42115312_FathurRizqi_SertifikatCCNA', '', 'D42115312_FathurRizqi_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:51:12', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(170, 'D42115313_Kevin Christian Halim_SertifikatCCNA', '', 'D42115313_Kevin_Christian_Halim_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 14:51:30', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(171, 'D42115315_MuhammadDhanyFahreza_SertifikatCCNA', NULL, 'D42115315_MuhammadDhanyFahreza_SertifikatCCNA.pdf', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-08 18:19:24', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(172, 'D42115316_MuhammadZulfachrilAsiari_SertifikatCCNA', NULL, 'D42115316_MuhammadZulfachrilAsiari_SertifikatCCNA.pdf', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-08 18:19:24', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(173, 'D42115317_Ahmad Jenar_SertifikatCCNA', NULL, 'D42115317_Ahmad Jenar_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(174, 'D42115318_RekaRegina_SertifikatCCNA', NULL, 'D42115318_RekaRegina_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(175, 'D42115319_ChristineYP_SertifikatCCNA', NULL, 'D42115319_ChristineYP_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(176, 'D42115320_FadelRezkyRamadhan_SertifikatCCNA', NULL, 'D42115320_FadelRezkyRamadhan_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(177, 'D42115321_WahidAfghaniRasyidAssykin_SertifikatCCNA', NULL, 'D42115321_WahidAfghaniRasyidAssykin_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(178, 'D42115322_BayazidSustamiMohNasir_SertifikatCCNA', NULL, 'D42115322_BayazidSustamiMohNasir_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(179, 'D42115501_Muhammad_Ainal_Munzir_SertifikatCCNA', NULL, 'D42115501_Muhammad_Ainal_Munzir_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(180, 'D42115502_AndiFathurrachman_SertifikatCCNA', NULL, 'D42115502_AndiFathurrachman_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(181, 'D42115503_MuhammadRijal_SertifikatCCNA', NULL, 'D42115503_MuhammadRijal_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(182, 'D42115505_LutviHarnantikSalsabila_sertifikatCCNA', NULL, 'D42115505_LutviHarnantikSalsabila_sertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(183, 'D42115506_ArdiWiriadinata_SertifikatCCNA', NULL, 'D42115506_ArdiWiriadinata_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(184, 'D42115507_FadhilahArmin_SertifikatCCNA', NULL, 'D42115507_FadhilahArmin_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(185, 'D42115508_ArtameviaKhairunnisa_SertifikatCCNA', NULL, 'D42115508_ArtameviaKhairunnisa_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(186, 'D42115509_Nur Arifa Isnaeni_SertifikatCCNA', NULL, 'D42115509_Nur_Arifa_Isnaeni_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:33:20', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(187, 'D42115510_A Ardiansyah Yusuf_SertifikatCCNA', NULL, 'D42115510_A_Ardiansyah_Yusuf_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:33:20', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(188, 'D42115511_SittiHarviyanthiRahayuSakti_SertifikatCCNA', NULL, 'D42115511_SittiHarviyanthiRahayuSakti_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(189, 'D42115512_Rizky Nadya Fatma_Sertifikat CCNA', NULL, 'D42115512_Rizky_Nadya_Fatma_Sertifikat CCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:33:20', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(190, 'D42115513_MuhammadFuad_SertifikatCCNA', NULL, 'D42115513_MuhammadFuad_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(191, 'D42115514_A Nurul Rahmah Akbar_SertifikatCCNA', NULL, 'D42115514_A_Nurul_Rahmah_Akbar_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:33:20', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(192, 'D42115516_Eras Ahmad Marzuki_SertifikatCCNA', NULL, 'D42115516_Eras_Ahmad_Marzuki_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:33:20', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(193, 'D42115519_KasmiraSari_SertifikatCCNA', NULL, 'D42115519_KasmiraSari_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(194, 'D42115520_A MuhOgieRahmat_SertifikatCCNA', NULL, 'D42115520_A MuhOgieRahmat_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(195, 'D42115521_GiyanWirayudaPratama_SertifikatCCNA', NULL, 'D42115521_GiyanWirayudaPratama_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(196, 'D42115701_ZULKIFLI_SertifikatCCNA', NULL, 'D42115701_ZULKIFLI_SertifikatCCNA.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:27:31', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(197, '8659', NULL, '8659.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(198, '8660', NULL, '8660.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(199, '8661', NULL, '8661.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(200, '8662', NULL, '8662.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(201, '8663', NULL, '8663.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(202, '8664', NULL, '8664.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(203, '8665', NULL, '8665.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(204, '16282', NULL, '16282.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(205, '221639', NULL, '221639.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(206, 'Andi Ahmad Fauzy_D42114019', NULL, 'Andi_Ahmad_Fauzy_D42114019.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(207, 'CCNA1_1', NULL, 'CCNA1_1.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(208, 'CCNA2_1', NULL, 'CCNA2_1.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(209, 'CiscoCertificate_AndiAhmadFauzy', NULL, 'CiscoCertificate_AndiAhmadFauzy.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(210, 'D42114310_CiscoCertificate_CCNA1_2017', NULL, 'D42114310_CiscoCertificate_CCNA1_2017.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(211, 'D42114310_CiscoCertificate_CCNA2_2017', NULL, 'D42114310_CiscoCertificate_CCNA2_2017.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(212, 'D42114310_MCP_2016', NULL, 'D42114310_MCP_2016.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(213, 'Lomba_desain_web_seis_tim', NULL, 'Lomba_desain_web_seis_tim.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(214, 'Microsoft_Certified_Professional', NULL, 'Microsoft_Certified_Professional.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(215, 'Muhammad Aryandi_D42114301', NULL, 'Muhammad_Aryandi_D42114301.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:42:46', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(216, 'Rumah_Kepemimpinan', NULL, 'Rumah_Kepemimpinan.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(217, 'XL_Future_Leaders', NULL, 'XL_Future_Leaders.pdf', 0, 1, 0, 0, 0, 0, 0, 0, '2018-04-08 18:38:47', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(218, '2012 TS-4 REKAP MABA', '', '2012_TS-4_REKAP_MABA.xls', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:44:47', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(219, '2013 TS-3 REKAP MABA', '', '2013_TS-3_REKAP_MABA.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:45:32', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(220, '2014_TS-2_REKAP_MABA', NULL, '2014_TS-2_REKAP_MABA.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:48:45', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(221, '2015_TS-1_REKAP_MABA', NULL, '2015_TS-1_REKAP_MABA.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:48:45', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(222, '2016_TS _REKAP_MABA', NULL, '2016_TS _REKAP_MABA.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:48:45', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(223, 'IPK_dan_masa_studi_lulusan_per_tahun', NULL, 'IPK_dan_masa_studi_lulusan_per_tahun.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:48:45', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(224, 'lulusan_per_tahun', NULL, 'lulusan_per_tahun.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:48:45', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(225, 'mahasiswa_TS', NULL, 'mahasiswa_TS.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 18:48:45', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(226, '2016 Sertifikat Juara Teras Usaha Mahasiswa', '', '2016_Sertifikat_Juara_Teras_Usaha_Mahasiswa.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:06:07', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(227, '2017 Sertifikat International SBC', '', '2017_Sertifikat_International_SBC.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:06:26', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(228, '8654', '', '8654.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:06:38', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(229, '8655', '', '8655.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:06:55', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(230, '8657', '', '8657.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:07:07', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(231, '8658', '', '8658.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:07:21', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(232, 'Finalist Bright Student Awards', '', 'Finalist_Bright_Student_Awards_(1).pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:07:39', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(233, 'Sertifikat Juara Teras Usaha Mahasiswa', '', 'Sertifikat_Juara_Teras_Usaha_Mahasiswa.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:07:51', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(234, '01 SK Rektor  No 1870 PERATURAN_AKADEMIK_S1_2009_Unhas', '', '01_SK_Rektor_No_1870_PERATURAN_AKADEMIK_S1_2009_Unhas.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:08:30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(235, 'Kuesioner lulusan', '', 'Kuesioner_lulusan.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:20:18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(236, 'Kuesioner pengguna lulusan', '', 'Kuesioner_pengguna_lulusan.pdf', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:20:33', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(237, 'sumbangan alumni dan lulusan', '', 'sumbangan_alumni_dan_lulusan.xlsx', 0, 0, 1, 0, 0, 0, 0, 0, '2018-04-08 19:21:02', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(238, '01 SK 42926 Tata_Cara_Seleksi_Peneriman_Calon_Pegawai_Negeri_Sipil_(CPNS)_Tendik_dan_Dosen_Unhas', '', '01_SK_42926_Tata_Cara_Seleksi_Peneriman_Calon_Pegawai_Negeri_Sipil_(CPNS)_Tendik_dan_Dosen_Unhas.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 19:24:18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(239, '02 SK 18536 Sistem_Perencanaan_Kebutuhan_Pegawai_Unhas_opt', '', '02_SK_18536_Sistem_Perencanaan_Kebutuhan_Pegawai_Unhas_opt.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 19:25:25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(240, '03 Penjatuhan_Hukuman_Disiplin', '', '03_Penjatuhan_Hukuman_Disiplin.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 19:34:14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(241, '00 Permen 47-2009 tentang serdos', '', '00_Permen_47-2009_tentang_serdos.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:46:57', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(242, '01 SK Rektor 3563 Pedoman_Beban_Kerja_Dosen_Tridharma_PT_Unhas', '', '01_SK_Rektor_3563_Pedoman_Beban_Kerja_Dosen_Tridharma_PT_Unhas.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:47:12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(243, '02 SK Rektor 030 PEMBERIAN_INSENTIF_KINERJA_DOSEN', '', '02_SK_Rektor_030_PEMBERIAN_INSENTIF_KINERJA_DOSEN.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:47:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(244, '03 SK Rektor 016 PEMBERIAN_INSENTIF_KINERJA_TENAGA_KEPENDIDIKAN_UNHAS', '', '03_SK_Rektor_016_PEMBERIAN_INSENTIF_KINERJA_TENAGA_KEPENDIDIKAN_UNHAS.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:47:41', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(245, 'amil_ijazah_s3', '', 'amil_ijazah_s3.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:48:12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(246, 'ABD RASYID R', '', 'ABD_RASYID_R.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:56:29', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(247, 'Ijazah S2 Andi Naharuddin', '', 'Ijazah_S2_Andi_Naharuddin.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:56:47', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(248, 'Ijazah S311', '', 'Ijazah_S311.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:57:02', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(249, 'Ijazah S300001', '', 'Ijazah_S300001.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:57:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(250, 'SK Golongan IVc00004', '', 'SK_Golongan_IVc00004.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:57:29', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(251, 'SK Golongan IVc00006', '', 'SK_Golongan_IVc00006.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:57:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(252, '01 beban mengajar dosen tetap', '', '01_beban_mengajar_dosen_tetap.xlsx', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:58:18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(253, '01 awal-2016-2017-beban dosen KPT 2016', '', '01_awal-2016-2017-beban_dosen_KPT_2016.xls', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:58:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(254, '02 beban MK Wajib akhir 2016-2017 KPT2016', '', '02_beban_MK_Wajib_akhir_2016-2017_KPT2016.xlsx', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 20:58:58', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(255, '2014 Lukito EN Lessons Learned Kurikulum TI UGM', '', '2014_Lukito_EN_Lessons_Learned_Kurikulum_TI_UGM.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:26:20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(256, '2015 iwan tantu', '', '2015_iwan_tantu.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:26:37', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(257, '2015_ABM_smart_machine', '', '2015_ABM_smart_machine.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:26:54', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(258, '2015_ABM_Unhas_2015_ICT_SKILL', '', '2015_ABM_Unhas_2015_ICT_SKILL.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:27:19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(259, '2015_Rila_Mandala', NULL, '2015_Rila_Mandala.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(260, '2016_cyberneticscom_01', NULL, '2016_cyberneticscom_01.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(261, '2016_Cyberneticscom_02', NULL, '2016_Cyberneticscom_02.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(262, '2016_Meetup_BigData', NULL, '2016_Meetup_BigData.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(263, '2016_workshop_power', NULL, '2016_workshop_power.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(264, '2016BigData', NULL, '2016BigData.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(265, 'ABM01', NULL, 'ABM01.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(266, 'ABM02', NULL, 'ABM02.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(267, 'IT_01', NULL, 'IT_01.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(268, 'IT_02', NULL, 'IT_02.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(269, 'IT_03', NULL, 'IT_03.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(270, 'MICEEI_2014', NULL, 'MICEEI_2014.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(271, 'RM_01', NULL, 'RM_01.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(272, 'RM_02', NULL, 'RM_02.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:40:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(273, '2016_amil_pemakalah_stmik_', NULL, '2016_amil_pemakalah_stmik_.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(274, '2016_amil_penyaji_KONIK_2016', NULL, '2016_amil_penyaji_KONIK_2016.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(275, '2016_amil_penyaji_LBE', NULL, '2016_amil_penyaji_LBE.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(276, '2016_amil_peserta_internasional_conference_ICETIA_2016', NULL, '2016_amil_peserta_internasional_conference_ICETIA_2016.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(277, '2016_amil_peserta_kuliah_umum', NULL, '2016_amil_peserta_kuliah_umum.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(278, '2016_amil_peserta_SNRIK_UMI_2016', NULL, '2016_amil_peserta_SNRIK_UMI_2016.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(279, 'amil_certificate_short_research_japan_2013', NULL, 'amil_certificate_short_research_japan_2013.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(280, 'amil-LoA', NULL, 'amil-LoA.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(281, 'Faisal-penghargaan_penelitian_LPDP_1', NULL, 'Faisal-penghargaan_penelitian_LPDP_1.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(282, 'penghargaan_penelitian_LPDP_2', NULL, 'penghargaan_penelitian_LPDP_2.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(283, 'adnan_IEEE-Print_receipt', NULL, 'adnan_IEEE-Print_receipt.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(284, 'amil_IEEE', NULL, 'amil_IEEE.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(285, 'inggrid_IEEE', NULL, 'inggrid_IEEE.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(286, 'Niswar_IEEE_MembershipCard', NULL, 'Niswar_IEEE_MembershipCard.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(287, '2016_amil_pemakalah_stmik_', NULL, '2016_amil_pemakalah_stmik_.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(288, '2016_amil_penyaji_KONIK_2016', NULL, '2016_amil_penyaji_KONIK_2016.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(289, '2016_amil_penyaji_LBE', NULL, '2016_amil_penyaji_LBE.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(290, '2016_amil_peserta_internasional_conference_ICETIA_2016', NULL, '2016_amil_peserta_internasional_conference_ICETIA_2016.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(291, '2016_amil_peserta_kuliah_umum', NULL, '2016_amil_peserta_kuliah_umum.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(292, '2016_amil_peserta_SNRIK_UMI_2016', NULL, '2016_amil_peserta_SNRIK_UMI_2016.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(293, 'amil_certificate_short_research_japan_2013', NULL, 'amil_certificate_short_research_japan_2013.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(294, 'amil-LoA', NULL, 'amil-LoA.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(295, 'Faisal-penghargaan_penelitian_LPDP_1', NULL, 'Faisal-penghargaan_penelitian_LPDP_1.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(296, 'penghargaan_penelitian_LPDP_2', NULL, 'penghargaan_penelitian_LPDP_2.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(297, 'adnan_IEEE-Print_receipt', NULL, 'adnan_IEEE-Print_receipt.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `dokumen_akreditasi` (`id`, `nama_dokumen`, `keterangan_dokumen`, `nama_file`, `standar_1`, `standar_2`, `standar_3`, `standar_4`, `standar_5`, `standar_6`, `standar_7`, `standar_8`, `waktu`, `a1`, `a2`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `c1`, `c2`, `c3`, `c4`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `e7`, `f1`, `f2`, `f3`, `f4`, `f5`, `g1`, `g2`, `g3`, `h1`, `h2`) VALUES
(298, 'amil_IEEE', NULL, 'amil_IEEE.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(299, 'inggrid_IEEE', NULL, 'inggrid_IEEE.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(300, 'Niswar_IEEE_MembershipCard', NULL, 'Niswar_IEEE_MembershipCard.pdf', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:52:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(301, 'pustakawan', '', 'pustakawan.xlsx', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:54:54', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(302, 'Tenaga_kependidikan', '', 'Tenaga_kependidikan.xls', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:55:06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(303, 'zpustakawan', '', 'zpustakawan.xlsx', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 21:55:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(304, 'tim_kurikulum_2014', '', 'tim_kurikulum_2014.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 21:55:42', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(305, '01_SK_Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T._Informatika_FTUH_', '', '01_SK_Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T._Informatika_FTUH_.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 21:57:11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(306, '02_Rapat_Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T._Informatika_FTUH_', '', '02_Rapat_Panitia_Evaluasi_Materi_Pembelajaran_dan_Penelitian_Prodi_T._Informatika_FTUH_.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 21:57:25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(307, '04_lampiran_Buku_IIIA_Teknik_Informatika_Unhas', '', '04_lampiran_Buku_IIIA_Teknik_Informatika_Unhas.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 21:57:49', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(308, '01 SK_Rektor_No_1870_PERATURAN_AKADEMIK_S1_2009_Unhas.pdf', '', '01_SK_Rektor_No_1870_PERATURAN_AKADEMIK_S1_2009_Unhas.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 21:58:57', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(309, '02 SK Rektor No 16644 Tahun 2012 tentang Kode Etik Dosen', '', '02_SK_Rektor_No_16644_Tahun_2012_tentang_Kode_Etik_Dosen.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 21:59:11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(310, '01 Peraturan Senat No. 41291 tahun 2015 ttg Organisasi dan Tata Kerja Sehat Senat Akademik', '', '01_Peraturan_Senat_No._41291_tahun_2015_ttg_Organisasi_dan_Tata_Kerja_Sehat_Senat_Akademik.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 22:00:09', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(311, '02 PP 53 tahun 2015 tentang Statuta Unhas.pdf', '', '02_PP_53_tahun_2015_tentang_Statuta_Unhas.pdf.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 22:00:24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(312, '03 PERATURAN_AKADEMIK_S1_2009_Unhas', '', '03_PERATURAN_AKADEMIK_S1_2009_Unhas.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 22:00:37', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(313, '04  perUnhas No.16644 Tahun 2012 tentang Kode Etik Dosen', '', '04_perUnhas_No.16644_Tahun_2012_tentang_Kode_Etik_Dosen.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 22:00:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(314, '05 Peraturan Unhas No.16890-UN4-KP.49-2012 tentang Kode Etik Mahasiswa di lingkungan Unhas', '', '05_Peraturan_Unhas_No.16890-UN4-KP.49-2012_tentang_Kode_Etik_Mahasiswa_di_lingkungan_Unhas.pdf', 0, 0, 0, 0, 1, 0, 0, 0, '2018-04-08 22:00:59', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(315, '01 Peraturan MWA No.46116 tahun 2016 Tentang Sistem Perencanaan dan Penganggaran PTN-BH Unhas', '', '01_Peraturan_MWA_No.46116_tahun_2016_Tentang_Sistem_Perencanaan_dan_Penganggaran_PTN-BH_Unhas.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:01:30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(316, '02 RKAT 2017 Informatika', '', '02_RKAT_2017_Informatika.xlsx', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:01:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(317, '03 RKAT 2018 SIK', '', '03_RKAT_2018_SIK.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:01:56', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(318, '01 spp penerimaan informatika', '', '01_spp_penerimaan_informatika.xlsx', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:02:23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(319, 'Data Borang S1 Informatika', '', 'Data_Borang_S1_Informatika.xlsx', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:02:46', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(320, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM', NULL, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(321, '2015_LAPORAN_KEGIATAN_PENELITIAN_dan_PKM', NULL, '2015_LAPORAN_KEGIATAN_PENELITIAN_dan_PKM.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(322, '2016_adnan_kontrak_LBE', NULL, '2016_adnan_kontrak_LBE.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(323, '2016_adnan_Laporan_LBE', NULL, '2016_adnan_Laporan_LBE.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(324, '2016_Ais_Intan_Berkas-WCU-PPI-Intan', NULL, '2016_Ais_Intan_Berkas-WCU-PPI-Intan.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(325, '2016_amil_kontrak_LBE1', NULL, '2016_amil_kontrak_LBE1.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(326, '2016_amil_laporan_LBE1', NULL, '2016_amil_laporan_LBE1.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(327, '2016_Dewi_Faizal_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_SYAFARUDDIN_ST_M_ENG_', NULL, '2016_Dewi_Faizal_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_SYAFARUDDIN_ST_M_ENG_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(328, '2016_dewiani_LP2M_UNHAS_PENELITIAN_RUNAS_ELYAS_PALANTEI_ST_M_ENG_PHD_', NULL, '2016_dewiani_LP2M_UNHAS_PENELITIAN_RUNAS_ELYAS_PALANTEI_ST_M_ENG_PHD_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(329, '2016_Dewiani_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_IR_DEWIANI_MT_', NULL, '2016_Dewiani_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_IR_DEWIANI_MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(330, '2016_indrabayu_LP2M_UNHAS_PENELITIAN_CHRISTOFORUS_YOHANNES', NULL, '2016_indrabayu_LP2M_UNHAS_PENELITIAN_CHRISTOFORUS_YOHANNES.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(331, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_RUNAS_DR_INDRABAYU_ST_MT_', NULL, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_RUNAS_DR_INDRABAYU_ST_MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(332, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_UPT', NULL, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_UPT.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(333, '2016_Ingrid_LP2M_UNHAS_LAPORAN_RUNAS_PROF_BAHARUDDIN_', NULL, '2016_Ingrid_LP2M_UNHAS_LAPORAN_RUNAS_PROF_BAHARUDDIN_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(334, '2016_Intan_adnan_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG__INTAN_SARI_ARENI_ST__MT_', NULL, '2016_Intan_adnan_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG__INTAN_SARI_ARENI_ST__MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(335, '2016_Mukarramah_LAPpenelitianLKPP', NULL, '2016_Mukarramah_LAPpenelitianLKPP.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(336, '2016_Niswar_LP2M_UNHAS_LAPORAN_PENELITIAN_HIKOM_PROF_DR_IR_YUSHINTA_FUJAYA_3', NULL, '2016_Niswar_LP2M_UNHAS_LAPORAN_PENELITIAN_HIKOM_PROF_DR_IR_YUSHINTA_FUJAYA_3.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(337, '2016_Novy_Halaman_pengesahan_LBE2016_Novy_NRA_Mokobombang', NULL, '2016_Novy_Halaman_pengesahan_LBE2016_Novy_NRA_Mokobombang.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(338, '2016_Novy_Kontrak_LBE_2016_Novy_NRA_Mokobombang.pdf', NULL, '2016_Novy_Kontrak_LBE_2016_Novy_NRA_Mokobombang.pdf.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(339, '2016_Novy_LP2M_UNHAS_PENELITIAN_UPT_MERNA_BAHARUDDIN_ST_M_TEL_ENG_PH_D_', NULL, '2016_Novy_LP2M_UNHAS_PENELITIAN_UPT_MERNA_BAHARUDDIN_ST_M_TEL_ENG_PH_D_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(340, '2016_syafruddin_syarif_LBE', NULL, '2016_syafruddin_syarif_LBE.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(341, '2016_Zahir_Z_LP2M_UNHAS_PENELITIAN_UPT', NULL, '2016_Zahir_Z_LP2M_UNHAS_PENELITIAN_UPT.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(342, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM', NULL, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(343, '2016 Mukarramah SK_Pengabdian_Masy', NULL, '2016 Mukarramah SK_Pengabdian_Masy.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(344, '2016_Indrabayu_LP2M_UNHAS-IbM_BOPTN-DR_FAIZAL_ARYA_SAMMAN_', NULL, '2016_Indrabayu_LP2M_UNHAS-IbM_BOPTN-DR_FAIZAL_ARYA_SAMMAN_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(345, '2016_Mukarramah_Laporan_Akhir_Pengabdian_Masy', NULL, '2016_Mukarramah_Laporan_Akhir_Pengabdian_Masy.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(346, '2016_Niswar_LP2M_UNHAS_IbM_BOPTN_IR_TAJUDDIN_WARIS_MT_', NULL, '2016_Niswar_LP2M_UNHAS_IbM_BOPTN_IR_TAJUDDIN_WARIS_MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(347, '2016a_Laporan_pengabdian_Nov20161', NULL, '2016a_Laporan_pengabdian_Nov20161.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(348, '2016b_Pengabdian_Mandiri_Indrabayu', NULL, '2016b_Pengabdian_Mandiri_Indrabayu.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(349, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM', NULL, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(350, '2015_LAPORAN_KEGIATAN_PENELITIAN_dan_PKM', NULL, '2015_LAPORAN_KEGIATAN_PENELITIAN_dan_PKM.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(351, '2016_adnan_kontrak_LBE', NULL, '2016_adnan_kontrak_LBE.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(352, '2016_adnan_Laporan_LBE', NULL, '2016_adnan_Laporan_LBE.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(353, '2016_Ais_Intan_Berkas-WCU-PPI-Intan', NULL, '2016_Ais_Intan_Berkas-WCU-PPI-Intan.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(354, '2016_amil_kontrak_LBE1', NULL, '2016_amil_kontrak_LBE1.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(355, '2016_amil_laporan_LBE1', NULL, '2016_amil_laporan_LBE1.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(356, '2016_Dewi_Faizal_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_SYAFARUDDIN_ST_M_ENG_', NULL, '2016_Dewi_Faizal_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_SYAFARUDDIN_ST_M_ENG_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(357, '2016_dewiani_LP2M_UNHAS_PENELITIAN_RUNAS_ELYAS_PALANTEI_ST_M_ENG_PHD_', NULL, '2016_dewiani_LP2M_UNHAS_PENELITIAN_RUNAS_ELYAS_PALANTEI_ST_M_ENG_PHD_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(358, '2016_Dewiani_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_IR_DEWIANI_MT_', NULL, '2016_Dewiani_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG_IR_DEWIANI_MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(359, '2016_indrabayu_LP2M_UNHAS_PENELITIAN_CHRISTOFORUS_YOHANNES', NULL, '2016_indrabayu_LP2M_UNHAS_PENELITIAN_CHRISTOFORUS_YOHANNES.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(360, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_RUNAS_DR_INDRABAYU_ST_MT_', NULL, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_RUNAS_DR_INDRABAYU_ST_MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(361, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_UPT', NULL, '2016_Indrabayu_LP2M_UNHAS_PENELITIAN_UPT.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(362, '2016_Ingrid_LP2M_UNHAS_LAPORAN_RUNAS_PROF_BAHARUDDIN_', NULL, '2016_Ingrid_LP2M_UNHAS_LAPORAN_RUNAS_PROF_BAHARUDDIN_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(363, '2016_Intan_adnan_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG__INTAN_SARI_ARENI_ST__MT_', NULL, '2016_Intan_adnan_LP2M_UNHAS_PENELITIAN_UPT_DR_ENG__INTAN_SARI_ARENI_ST__MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(364, '2016_Mukarramah_LAPpenelitianLKPP', NULL, '2016_Mukarramah_LAPpenelitianLKPP.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(365, '2016_Niswar_LP2M_UNHAS_LAPORAN_PENELITIAN_HIKOM_PROF_DR_IR_YUSHINTA_FUJAYA_3', NULL, '2016_Niswar_LP2M_UNHAS_LAPORAN_PENELITIAN_HIKOM_PROF_DR_IR_YUSHINTA_FUJAYA_3.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(366, '2016_Novy_Halaman_pengesahan_LBE2016_Novy_NRA_Mokobombang', NULL, '2016_Novy_Halaman_pengesahan_LBE2016_Novy_NRA_Mokobombang.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(367, '2016_Novy_Kontrak_LBE_2016_Novy_NRA_Mokobombang.pdf', NULL, '2016_Novy_Kontrak_LBE_2016_Novy_NRA_Mokobombang.pdf.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(368, '2016_Novy_LP2M_UNHAS_PENELITIAN_UPT_MERNA_BAHARUDDIN_ST_M_TEL_ENG_PH_D_', NULL, '2016_Novy_LP2M_UNHAS_PENELITIAN_UPT_MERNA_BAHARUDDIN_ST_M_TEL_ENG_PH_D_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(369, '2016_syafruddin_syarif_LBE', NULL, '2016_syafruddin_syarif_LBE.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(370, '2016_Zahir_Z_LP2M_UNHAS_PENELITIAN_UPT', NULL, '2016_Zahir_Z_LP2M_UNHAS_PENELITIAN_UPT.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(371, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM', NULL, '2014_LAPORAN_KEGIATAN_PENELITIAN_dan_PkM.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(372, '2016 Mukarramah SK_Pengabdian_Masy', NULL, '2016 Mukarramah SK_Pengabdian_Masy.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(373, '2016_Indrabayu_LP2M_UNHAS-IbM_BOPTN-DR_FAIZAL_ARYA_SAMMAN_', NULL, '2016_Indrabayu_LP2M_UNHAS-IbM_BOPTN-DR_FAIZAL_ARYA_SAMMAN_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(374, '2016_Mukarramah_Laporan_Akhir_Pengabdian_Masy', NULL, '2016_Mukarramah_Laporan_Akhir_Pengabdian_Masy.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(375, '2016_Niswar_LP2M_UNHAS_IbM_BOPTN_IR_TAJUDDIN_WARIS_MT_', NULL, '2016_Niswar_LP2M_UNHAS_IbM_BOPTN_IR_TAJUDDIN_WARIS_MT_.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(376, '2016a_Laporan_pengabdian_Nov20161', NULL, '2016a_Laporan_pengabdian_Nov20161.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(377, '2016b_Pengabdian_Mandiri_Indrabayu', NULL, '2016b_Pengabdian_Mandiri_Indrabayu.pdf', 0, 0, 0, 0, 0, 1, 0, 0, '2018-04-08 22:17:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(378, '02 lulusan dan mahasiswa yang terlibat penelitian dosen', '', '02_lulusan_dan_mahasiswa_yang_terlibat_penelitian_dosen.xlsx', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:24:31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(379, '02 mahasiswa yang terlibat penelitian dosen', '', '02_mahasiswa_yang_terlibat_penelitian_dosen.xlsx', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:24:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(380, '2014_amil_SMAP', NULL, '2014_amil_SMAP.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(381, '2016_Adnan_PANDUAN_DAN_JADWAL_SINASTEK2016', NULL, '2016_Adnan_PANDUAN_DAN_JADWAL_SINASTEK2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(382, '2016_amil_sensitif_stmik_D', NULL, '2016_amil_sensitif_stmik_D.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(383, '2016_amil01_paper_KONIK2016', NULL, '2016_amil01_paper_KONIK2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(384, '2016_amil02_paper_KONIK2016', NULL, '2016_amil02_paper_KONIK2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(385, '2016_Novy_Prosiding_SINASTEK2016_Novy_NRA_Mokobombang', NULL, '2016_Novy_Prosiding_SINASTEK2016_Novy_NRA_Mokobombang.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(386, '2016_SNRIK_UMI_2016', NULL, '2016_SNRIK_UMI_2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(387, 'Faizal_Buku_Dasar_Sistem_Kendali', NULL, 'Faizal_Buku_Dasar_Sistem_Kendali.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(388, 'Faizal_Buku_Reconfigurable', NULL, 'Faizal_Buku_Reconfigurable.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(389, 'Faizal_Buku_Sistem_Digital', NULL, 'Faizal_Buku_Sistem_Digital.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(390, '2014_amil_SMAP', NULL, '2014_amil_SMAP.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(391, '2016_Adnan_PANDUAN_DAN_JADWAL_SINASTEK2016', NULL, '2016_Adnan_PANDUAN_DAN_JADWAL_SINASTEK2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(392, '2016_amil_sensitif_stmik_D', NULL, '2016_amil_sensitif_stmik_D.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(393, '2016_amil01_paper_KONIK2016', NULL, '2016_amil01_paper_KONIK2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(394, '2016_amil02_paper_KONIK2016', NULL, '2016_amil02_paper_KONIK2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(395, '2016_Novy_Prosiding_SINASTEK2016_Novy_NRA_Mokobombang', NULL, '2016_Novy_Prosiding_SINASTEK2016_Novy_NRA_Mokobombang.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(396, '2016_SNRIK_UMI_2016', NULL, '2016_SNRIK_UMI_2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(397, 'Faizal_Buku_Dasar_Sistem_Kendali', NULL, 'Faizal_Buku_Dasar_Sistem_Kendali.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(398, 'Faizal_Buku_Reconfigurable', NULL, 'Faizal_Buku_Reconfigurable.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(399, 'Faizal_Buku_Sistem_Digital', NULL, 'Faizal_Buku_Sistem_Digital.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:31:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(400, 'DUK DOSEN JULI 2017', '', 'DUK_DOSEN_JULI_2017.xls', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 22:34:20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(401, 'DUK Tenaga kependidikan', '', 'DUK_Tenaga_kependidikan.xls', 0, 0, 0, 1, 0, 0, 0, 0, '2018-04-08 22:34:32', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(402, '01 Peraturan Rektor Unhas Nomor 25000 tentang OTK Fakultas dan Sekolah Unhas', '', '01_Peraturan_Rektor_Unhas_Nomor_25000_tentang_OTK_Fakultas_dan_Sekolah_Unhas.pdf', 0, 0, 0, 0, 0, 0, 0, 1, '2018-04-08 22:38:53', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(403, '02 peraturan rektor unhas no 1870 PERATURAN_AKADEMIK_S1_2009_Unhas', '', '02_peraturan_rektor_unhas_no_1870_PERATURAN_AKADEMIK_S1_2009_Unhas.pdf', 0, 0, 0, 0, 0, 0, 0, 1, '2018-04-08 22:39:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(404, '03 peraturan rektor unhas No 16644 tentang Kode Etik Dosen', '', '03_peraturan_rektor_unhas_No_16644_tentang_Kode_Etik_Dosen.pdf', 0, 0, 0, 0, 0, 0, 0, 1, '2018-04-08 22:39:17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(405, '04 Peraturan  rektor Unhas No.16890 tentang Kode Etik Mahasiswa', '', '04_Peraturan_rektor_Unhas_No.16890_tentang_Kode_Etik_Mahasiswa.pdf', 0, 0, 0, 0, 0, 0, 0, 1, '2018-04-08 22:39:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(406, '1 - SUIJI - 2016-2021', '', '1_-_SUIJI_-_2016-2021.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:41:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(407, '2 - KEIO UNIVERSITY 2015-2016', '', '2_-_KEIO_UNIVERSITY_2015-2016.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:41:58', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(408, '3 - TOYAMA UNIVERSITY 2012-2017', '', '3_-_TOYAMA_UNIVERSITY_2012-2017.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:42:11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(409, '4 - A-NAIST 2011-2021', '', '4_-_A-NAIST_2011-2021.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:42:25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(410, '5 - TOHOKU UNIVERSITY 2015-2020', '', '5_-_TOHOKU_UNIVERSITY_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:42:40', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(411, '6 - HIROSHIMA_UNIVERSITY_2015-2020', NULL, '6-HIROSHIMA_UNIVERSITY_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(412, '7 - KITASATO_UNIVERSITY_2014-2019', NULL, '7-KITASATO_UNIVERSITY_2014-2019.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(413, '8-UNIVERSITI_KEBANGSAAN_MALAYSIA_2015-2020', NULL, '8 - UNIVERSITI_KEBANGSAAN_MALAYSIA_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(414, '9 - UNIVERSITI_TUN_HUSSEIN_ONN_2016-2017 ', NULL, '9-UNIVERSITI_TUN_HUSSEIN_ONN_2016-2017 .pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(415, '10 - UNIVERSITI_UTARA_MALAYSIA_2015-2018', NULL, '10-UNIVERSITI_UTARA_MALAYSIA_2015-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(416, '11 - MIYAZAKI_UNIVERSITY_2013-2018', NULL, '11-MIYAZAKI_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(417, '12 - NERESUAN_UNIVERSITY_2013-2018', NULL, '12-NERESUAN_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(418, '13 - SYNCHROTRON_LIGHT_RESEARCH_INSTITUTE_2016-2019', NULL, '13-SYNCHROTRON_LIGHT_RESEARCH_INSTITUTE_2016-2019.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(419, '14 - MONASH_UNIVERSITY_2013-2018', NULL, '14-MONASH_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(420, '15 - GRIFFITH_UNIVERSITY', NULL, '15-GRIFFITH_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(421, '16 - EHIME_UNIVERSITY', NULL, '16-EHIME_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(422, '17 - GUIZHOU_NORMAL_UNIVERSITY', NULL, '17-GUIZHOU_NORMAL_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(423, '18 - HARBIN_INSTITUTE_OF_TECHNOLOGY', NULL, '18-HARBIN_INSTITUTE_OF_TECHNOLOGY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(424, '6 - HIROSHIMA_UNIVERSITY_2015-2020', NULL, '6-HIROSHIMA_UNIVERSITY_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(425, '7 - KITASATO_UNIVERSITY_2014-2019', NULL, '7-KITASATO_UNIVERSITY_2014-2019.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(426, '8-UNIVERSITI_KEBANGSAAN_MALAYSIA_2015-2020', NULL, '8 - UNIVERSITI_KEBANGSAAN_MALAYSIA_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(427, '9 - UNIVERSITI_TUN_HUSSEIN_ONN_2016-2017 ', NULL, '9-UNIVERSITI_TUN_HUSSEIN_ONN_2016-2017 .pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(428, '10 - UNIVERSITI_UTARA_MALAYSIA_2015-2018', NULL, '10-UNIVERSITI_UTARA_MALAYSIA_2015-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(429, '11 - MIYAZAKI_UNIVERSITY_2013-2018', NULL, '11-MIYAZAKI_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(430, '12 - NERESUAN_UNIVERSITY_2013-2018', NULL, '12-NERESUAN_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(431, '13 - SYNCHROTRON_LIGHT_RESEARCH_INSTITUTE_2016-2019', NULL, '13-SYNCHROTRON_LIGHT_RESEARCH_INSTITUTE_2016-2019.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(432, '14 - MONASH_UNIVERSITY_2013-2018', NULL, '14-MONASH_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(433, '15 - GRIFFITH_UNIVERSITY', NULL, '15-GRIFFITH_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(434, '16 - EHIME_UNIVERSITY', NULL, '16-EHIME_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(435, '17 - GUIZHOU_NORMAL_UNIVERSITY', NULL, '17-GUIZHOU_NORMAL_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(436, '18 - HARBIN_INSTITUTE_OF_TECHNOLOGY', NULL, '18-HARBIN_INSTITUTE_OF_TECHNOLOGY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(437, '6 - HIROSHIMA_UNIVERSITY_2015-2020', NULL, '6-HIROSHIMA_UNIVERSITY_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(438, '7 - KITASATO_UNIVERSITY_2014-2019', NULL, '7-KITASATO_UNIVERSITY_2014-2019.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(439, '8-UNIVERSITI_KEBANGSAAN_MALAYSIA_2015-2020', NULL, '8 - UNIVERSITI_KEBANGSAAN_MALAYSIA_2015-2020.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(440, '9 - UNIVERSITI_TUN_HUSSEIN_ONN_2016-2017 ', NULL, '9-UNIVERSITI_TUN_HUSSEIN_ONN_2016-2017 .pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(441, '10 - UNIVERSITI_UTARA_MALAYSIA_2015-2018', NULL, '10-UNIVERSITI_UTARA_MALAYSIA_2015-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(442, '11 - MIYAZAKI_UNIVERSITY_2013-2018', NULL, '11-MIYAZAKI_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(443, '12 - NERESUAN_UNIVERSITY_2013-2018', NULL, '12-NERESUAN_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(444, '13 - SYNCHROTRON_LIGHT_RESEARCH_INSTITUTE_2016-2019', NULL, '13-SYNCHROTRON_LIGHT_RESEARCH_INSTITUTE_2016-2019.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(445, '14 - MONASH_UNIVERSITY_2013-2018', NULL, '14-MONASH_UNIVERSITY_2013-2018.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(446, '15 - GRIFFITH_UNIVERSITY', NULL, '15-GRIFFITH_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(447, '16 - EHIME_UNIVERSITY', NULL, '16-EHIME_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(448, '17 - GUIZHOU_NORMAL_UNIVERSITY', NULL, '17-GUIZHOU_NORMAL_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(449, '18 - HARBIN_INSTITUTE_OF_TECHNOLOGY', NULL, '18-HARBIN_INSTITUTE_OF_TECHNOLOGY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:56:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(450, '19 - VICTORIA UNIVERSITY OF WELLINGTON ', '', '19_-_VICTORIA_UNIVERSITY_OF_WELLINGTON_.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:58:33', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(451, '20 - EAST TIMOR COFFEE INSTITUTE ', '', '20_-_EAST_TIMOR_COFFEE_INSTITUTE_.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:58:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(452, '21 - UNIVERSITI TEKNOLOGI MALAYSIA', '', '21_-_UNIVERSITI_TEKNOLOGI_MALAYSIA.PDF', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:59:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(453, '22 - KYOTO UNIVERSITY', '', '22_-_KYOTO_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:59:12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(454, '23 - UNIVERSIT COLLEGE BESTARI', '', '23_-_UNIVERSIT_COLLEGE_BESTARI.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:59:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(455, '24 - PT.ZTE ', '', '24_-_PT.ZTE_.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:59:40', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(456, '25 - CHUO UNIVERSITY', '', '25_-_CHUO_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 22:59:55', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(457, '26 - RIHN', '', '26_-_RIHN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:00:09', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(458, '27 - UNIVERSITY OF NEW ENGLAND', '', '27_-_UNIVERSITY_OF_NEW_ENGLAND.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:00:20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(459, '28 - SOUTHERN CROSS UNIVERSITY', '', '28_-_SOUTHERN_CROSS_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:00:32', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(460, '29 - THE PAPUA NEW GUINEA UNIVERISTY OF TECHNOLOGY', '', '29_-_THE_PAPUA_NEW_GUINEA_UNIVERISTY_OF_TECHNOLOGY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:00:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(461, '30 - THE UNIVERSITI MALAYSIA KELANTAN', '', '30_-_THE_UNIVERSITI_MALAYSIA_KELANTAN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:00:55', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(462, '31 - NAGOYA CITY UNIVERSITY', '', '31_-_NAGOYA_CITY_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:01:06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(463, '32 - PAI CHAI UNIVERSITY', '', '32_-_PAI_CHAI_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:01:17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(464, '33 - JAMES COOK UNIVERSITY, ', '', '33_-_JAMES_COOK_UNIVERSITY,_.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:01:31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(465, '34 - KYUSHU INSTITUTE OF TECHNOLOGY', '', '34_-_KYUSHU_INSTITUTE_OF_TECHNOLOGY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:01:46', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(466, '35 - CHIANG MAI UNIVERSITY', '', '35_-_CHIANG_MAI_UNIVERSITY.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:01:58', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(467, '01 Vale', '', '01_Vale.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:02:46', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(468, '08 MoU Kab. Poso', '', '08_MoU_Kab._Poso.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:03:02', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(469, '14 MoU BPJS', '', '14_MoU_BPJS.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:03:14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(470, '34 Balikpapan', '', '34_Balikpapan.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:03:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(471, '35 MoU dg FIK Univ. Al Asyariah Mandar', '', '35_MoU_dg_FIK_Univ._Al_Asyariah_Mandar.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:03:43', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(472, '36 MoU dg PT Kaltim Prima Coal', '', '36_MoU_dg_PT_Kaltim_Prima_Coal.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:03:56', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(473, '37 MoU dg TNI Angkatan Laut', '', '37_MoU_dg_TNI_Angkatan_Laut.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:04:06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(474, '01 Kegiatan Kerjasama LN', '', '01_Kegiatan_Kerjasama_LN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:05:36', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(475, '02 Poltek Manado', '', '02_Poltek_Manado.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:22:05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(476, '03 PLN', '', '03_PLN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:22:15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(477, '04 Pertamina', '', '04_Pertamina.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:22:30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(478, '05 UPH', '', '05_UPH.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:22:41', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(479, '06 UDD Denpasar', '', '06_UDD_Denpasar.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:22:53', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(480, '07 Mandiri', '', '07_Mandiri.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:23:05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(481, '09 Yayasan Komputer Mataram', '', '09_Yayasan_Komputer_Mataram.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:23:15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(482, '10 LIPI', '', '10_LIPI.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:23:28', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(483, '11 UKIP', '', '11_UKIP.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:23:40', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(484, '12 Ubaya', '', '12_Ubaya.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:23:51', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(485, '13 Unkhair', '', '13_Unkhair.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:02', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(486, '15 UMMUH Maluku Utara', '', '15_UMMUH_Maluku_Utara.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(487, '16 USM Semarang', '', '16_USM_Semarang.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(488, '17 TVRI', '', '17_TVRI.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:35', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(489, '18 BSn', '', '18_BSn.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:46', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(490, '19 Musamus', '', '19_Musamus.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:58', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(491, '19 Musamus', '', '19_Musamus.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:24:59', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(492, '20 BTPN', '', '20_BTPN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:25:10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(493, '21 UIN', '', '21_UIN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:25:27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(494, '22 Tanri Abeng', '', '22_Tanri_Abeng.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:26:10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(495, '23 BNN RI', '', '23_BNN_RI.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:26:28', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(496, '24 KSW', '', '24_KSW.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:26:41', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(497, '25 Narotama', '', '25_Narotama.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:26:52', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(498, '26 UNW Mataram', '', '26_UNW_Mataram.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:27:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(499, '27 BNI', '', '27_BNI.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:27:13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(500, '28 Widyagama Samarinda', '', '28_Widyagama_Samarinda.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:27:25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(501, '29 Garuda', '', '29_Garuda.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:27:35', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0);
INSERT INTO `dokumen_akreditasi` (`id`, `nama_dokumen`, `keterangan_dokumen`, `nama_file`, `standar_1`, `standar_2`, `standar_3`, `standar_4`, `standar_5`, `standar_6`, `standar_7`, `standar_8`, `waktu`, `a1`, `a2`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `c1`, `c2`, `c3`, `c4`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `e7`, `f1`, `f2`, `f3`, `f4`, `f5`, `g1`, `g2`, `g3`, `h1`, `h2`) VALUES
(502, '30 BTN', '', '30_BTN.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:27:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(503, '31 Antam', '', '31_Antam.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:27:55', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(504, '32 Telkomsel', '', '32_Telkomsel.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:28:07', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(505, '33 Mega Resky', '', '33_Mega_Resky.pdf', 0, 0, 0, 0, 0, 0, 1, 0, '2018-04-08 23:28:18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(506, '05 BUKU RPJP UNHAS 2030 EDISI CETAK', NULL, '05_BUKU_RPJP_UNHAS_2030_EDISI_CETAK.pdf', 1, 0, 0, 0, 0, 0, 0, 0, '2018-04-08 23:48:32', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` bigint(18) NOT NULL,
  `password` varchar(190) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `gelar_belakang` varchar(65) NOT NULL,
  `gelar_depan` varchar(65) NOT NULL,
  `jabatan_dosen` varchar(100) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `bidang_penelitian` varchar(100) NOT NULL,
  `foto_dosen` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `subdomain` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `password`, `nama_dosen`, `gelar_belakang`, `gelar_depan`, `jabatan_dosen`, `email_dosen`, `bidang_penelitian`, `foto_dosen`, `status`, `blokir`, `subdomain`) VALUES
(196007161987021002, '85b2c2b95c6a5506031f1400ffcf11b2', 'Christoforus Yohannes', 'M.T.', 'Ir.', 'Head of Computer Lab.', 'christ.mitra@gmail.com', 'Computer Ssystem', '', 0, 'N', 'informatika'),
(196108131988112001, 'e6c02360d3f897334c3ad883595881cd', 'Ingrid Nurtanio', 'M.T.', 'Dr. Ir.', 'Kepala Lab Animasi dan Multimedia', 'ingrid_unhas@yahoo.com', 'TIK', '', 0, 'N', 'informatika'),
(196404271989101002, '583fe8b7c636af1f719c5ddd3139e7c9', 'Zahir Zainuddin', 'M.Sc.', 'Dr. Ir.', 'Head Computer-based System Lab', 'zahir@unhas.ac.id', 'Computer-based System', '', 0, 'N', 'informatika'),
(197211142005012001, '193a0615b2ba141aacb84b79064c7ee6', 'Novy Nur R.A Mokobombang', 'S.T., Ms.TM.', '', 'lektor', 'novyra@gmail.com', 'ICT', '', 0, 'N', 'informatika'),
(197309221999031001, '14c99c97c918fbfe0b30cb949ff596f2', 'Muhammad Niswar', ' S.T., M.IT.', 'Dr. Eng.', 'Kepala Lab Cloud Computing and Internet Engineering', 'niswar@unhas.ac.id', 'Information Technology', '', 0, 'N', 'informatika'),
(197310101998021001, '57dd4116a3d55c4329b5824b5e739407', 'Amil Ahmad Ilham', ' S.T., M.IT.', 'Dr.', 'Head of Informatics Department', 'amil[at]unhas.ac.id', 'Computer System and Big Data', '5da675b5a964e.jpg', 0, 'N', 'informatika'),
(197404262005011002, '110402beb67bff405ab5b75790fe4c25', 'Adnan', 'S.T., M.T.', 'Dr.', 'lektor', 'adnan@unhas.co.id', 'Teknik Informatika', '', 0, 'N', 'informatika'),
(197503132009121003, 'f362ab4980c9ac6caca87b67cd832242', 'Ady Wahyudi Paundu', 'S.T., M.T.', '', 'Asisten Ahli', 'adywp [at] unhas.ac.id', 'Teknik Informatika', '', 0, 'N', 'informatika'),
(197507162002121004, '8af3bb1f92f5f9312fb81c2c4fd63295', 'Indrabayu', 'S.T., M.T., M.Bus.Sys.', 'Dr.', 'Lektor Kepala', 'indrabayu@unhas.ac.id / indrabayu16@gmail.com', 'Kecerdasan Buatan , Data Mining , Multimedia Analitic', '', 0, 'N', 'informatika'),
(198202162008122001, '82b296fc6a8aa280d163e17c5de5fcbc', 'Elly Warni', 'S.T., M.T.', '', 'Asisten Ahli', 'ellywarni82@gmail.com', 'Teknik Informatika', '', 0, 'N', 'informatika'),
(198305102014041001, '09982bafbc9622fb21f20e133d89c406', 'A. Ais Prayogi Alimuddin', 'S.T., M.Eng.', '', 'PNS', 'ais.prayogi@gmail.com', 'Information Technology', '', 0, 'N', 'informatika'),
(198310082012122003, 'f88af93c0bc55ce597eee8ff4398f019', 'Mukarramah Yusuf', 'B.Sc., M.Sc.', '', 'PNS', 'mukarramah.yusuf@gmail.com', 'Informatics', '', 0, 'N', 'informatika'),
(198404032010121004, '79a9c0e6883eb778dd1b32227e2855e6', 'Zulkifli Tahir', 'S.T., M.Sc.', 'Dr-Eng.', 'Asisten Ahli', 'zulkifli [at] unhas.ac.id', 'Electrical and Electronic Engineering and Computer Science', '', 0, 'N', 'informatika'),
(199011282019043001, '8e042037b7f858eec41df25c64b354d6', 'Iqra Aswad', 'S.T., M.T.', '', 'Member of IECC Lab', 'iqra@unhas.ac.id', 'Network, programming and Could Computing', '', 0, 'N', 'informatika');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `id_halaman` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_file` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `id_halaman`, `judul`, `nama_file`) VALUES
(19, 240317263, 'Perpres Tentang Kesehatan', '55109839e2f16.pdf'),
(20, 240317263, 'UU Terkait Dinas Kesehatan', '5510999283fb3.pdf'),
(21, 27036289, '123213', '551573528a45e.pdf'),
(22, 27036289, '123213', '5515738bab811.pdf'),
(23, 27036289, '434343', '55157398b94e5.pdf'),
(24, 27039177, 'jji', '5515e3803c8d7.pdf'),
(26, 80413135, 'aaa', '55243a5168207.pdf'),
(28, 7046179, 'pengumuman', '5526bf1c81e9d.pdf'),
(29, 110414150, 'berkas lomba', '5529292955f08.pdf'),
(30, 19045157, 'percobaan 1', '5533a8b046a3f.pdf'),
(31, 25012221, 'ini berkas', '56a5c5ec2e83a.pdf'),
(33, 25012255, '', '56a5db4640d54.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `judul_id` varchar(255) NOT NULL,
  `konten_id` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `konten_en` text NOT NULL,
  `judul_en` varchar(255) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `penulis` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul_id`, `konten_id`, `tanggal_mulai`, `tanggal_selesai`, `tempat`, `konten_en`, `judul_en`, `gambar`, `penulis`, `link`) VALUES
(23, 'Implementasi Kurikulum berbasis KKNI', '<p>Kurikulum baru bebasis KKNI akan mulai diberlakukan pada semester awal 2016/2017.</p>', '2018-08-01', '2020-01-01', 'Informatika Unhas', '<p>Implementation of KKNI-based Curriculum</p>', 'Implementation of KKNI-based Curriculum', '', 'endy', 'implementasi-kurikulum-berbasis-kkni.html');

-- --------------------------------------------------------

--
-- Table structure for table `event1`
--

CREATE TABLE `event1` (
  `id_event` int(10) NOT NULL,
  `id_halaman` int(10) NOT NULL,
  `judul_event_id` varchar(100) NOT NULL,
  `judul_event_en` varchar(100) NOT NULL,
  `konten_event_id` text NOT NULL,
  `konten_event_en` text NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event1`
--

INSERT INTO `event1` (`id_event`, `id_halaman`, `judul_event_id`, `judul_event_en`, `konten_event_id`, `konten_event_en`, `tempat`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 7, 'Demo pengenalan CMS Conference, cara mudah membuat website seminar nasional dan internasional', '-', '', '', 'Ruang sidang Fakultas Teknik Unhas', '2014-12-15', '2014-12-15'),
(2, 7, 'Pelatihan WEB', '-', '<p>\r\n	Pelatihan WEB</p>\r\n', '<p>\r\n	None</p>\r\n', 'Prodi Informatika', '2015-03-01', '2015-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_gambar` int(10) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_gambar` date NOT NULL,
  `posisi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_gambar`, `nama_gambar`, `gambar`, `tanggal_gambar`, `posisi`) VALUES
(1, 'Kampus FT-UH Gowa', '2331.jpg', '2014-10-31', 3),
(2, 'BOPTN 2014 LMS', '1663206332.jpg', '2014-11-10', 2),
(3, 'Lokakarya', '1043852738.jpg', '2014-11-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grabbing`
--

CREATE TABLE `grabbing` (
  `id_grabbing` int(10) NOT NULL,
  `konten_grabbing` varchar(50) NOT NULL,
  `status_grabbing` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grabbing`
--

INSERT INTO `grabbing` (`id_grabbing`, `konten_grabbing`, `status_grabbing`) VALUES
(1, 'pengumuman', 'N'),
(2, 'beasiswa', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int(10) NOT NULL,
  `judul_halaman_id` varchar(50) NOT NULL,
  `judul_halaman_en` varchar(50) NOT NULL,
  `parent_halaman` int(10) NOT NULL,
  `konten_id` text NOT NULL,
  `konten_en` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link_halaman_id` varchar(100) NOT NULL,
  `link_halaman_en` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `atribut` enum('default','added') NOT NULL DEFAULT 'added',
  `posisi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul_halaman_id`, `judul_halaman_en`, `parent_halaman`, `konten_id`, `konten_en`, `gambar`, `link_halaman_id`, `link_halaman_en`, `publish`, `atribut`, `posisi`) VALUES
(2, 'Profil', 'Profile', 0, '<ul style=\"list-style-type: circle;\">\r\n<li><a href=\"/informatika/id/page/10/sambutan-ketua-program-studi.html\"><span style=\"font-size: 14pt;\">Sambutan Ketua Program Studi</span></a></li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li><a href=\"/informatika/en/page/10/greeting.html\"><span style=\"font-size: 14pt;\">Greeting</span></a></li>\r\n</ul>', '', 'profil.html', 'profile.html', 'Y', 'default', 1),
(3, 'Akademik', 'Academic', 0, '<ul style=\"list-style-type: circle;\">\r\n<li><a href=\"/informatika/id/page/19059167/kurikulum.html\"><span style=\"font-size: 14pt;\">Kurikulum</span></a></li>\r\n<li><a href=\"/informatika/id/page/13/publikasi.html\"><span style=\"font-size: 14pt;\">Publikasi</span></a></li>\r\n<li><a href=\"/informatika/id/page/4/penelitian.html\"><span style=\"font-size: 14pt;\">Penelitian</span></a></li>\r\n<li><a href=\"/informatika/id/page/4/penelitian.html\"><span style=\"font-size: 14pt;\">Pengabdian Masyarakat</span></a></li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li><span style=\"font-size: 14pt;\">Curriculum</span></li>\r\n<li><span style=\"font-size: 14pt;\">Publication</span></li>\r\n<li><span style=\"font-size: 14pt;\">Research</span></li>\r\n<li style=\"text-align: left;\"><span style=\"font-size: 14pt;\">Community Services</span></li>\r\n</ul>', '', 'akademik.html', 'academic.html', 'Y', 'default', 2),
(4, 'Penelitian', 'Research', 3, '<p><span style=\"color: #000000;\"><span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">Salah satu bagian dari Tridharma Perguruan Tinggi adalah melakukan penelitian. Beberapa penelitian yang pernah dilaksanakan oleh para dosen dan civitas akademia program studi Teknik Informatika, yaitu :</span></span></p>', '<p>One of research:</p>', '', 'penelitian.html', 'research.html', 'Y', 'default', 2),
(5, 'Kerjasama', 'Partnership', 0, '<p><span style=\"color: #000000;\"><span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">Jenis kerja sama yang &nbsp;telah dijalin/ sementara dilakukan oleh Program Studi Teknik Elektro Unhas&nbsp;dengan instansi lainnya :</span></span></p>', '', '', 'Kerjasama.html', 'Partnership.html', 'Y', 'default', 0),
(10, 'Sambutan Ketua Departemen', 'Greeting', 2, '<p>Assalamualaikum wr wb</p>\r\n<p>Alhamdulillah, puji syukur marilah kita panjatkan kehadirat Allah SWT yang senantiasa melimpahkan rahmat, taufik, dan Hidayah-Nya kepada kita semua sehingga website Departemen Teknik Informatika ini dapat dikembangkan. Shalawat serta salam marilah kita curahkan kepada junjungan kita Nabi Muhammad SAW beserta para sahabat dan kerabatnya. Departemen Teknik Informatika Fakultas Teknik Universitas Hasanuddin memiliki tujuan yaitu tersedianya sumberdaya manusia di bidang Informatika yang memiliki kemampuan berkompetisi mendapatkan lapangan pekerjaan ataupun menciptakan lapangan pekerjaan secara mandiri dan kreatif. Departemen kami menyediakan program yang berkualitas dalam melakukan pendidikan bidang teknik informatika yang didukung oleh fakultas maupun universitas. Sistem pengajaran yang terbagi menjadi pembelajaran dalam ruang kelas dan praktikum yang dipandu oleh 11 staf pengajar dengan kualifikasi akademik yang sangat baik terdiri 6 Dr, dan memiliki 3 kelompok bidang keahlian yaitu Cloud Computing and Internet Engineering, IoT and Parallel Computing dan Artificial Intelligence and Multimedia Processing. Semoga dengan adanya website ini dapat menjadi sebuah wadah komunikasi baik antara pihak Departemen Teknik Informatika FT-UH dengan segenap Civitas Akademika maupun siapa saja yang ingin mengetahui lebih jauh tentang Departemen Teknik Informatika FT-UH. Dengan terjalinnya komunikasi yang baik, tentunya Departemen Teknik Informatika FT-UH akan dikenal secara luas. Kritik dan saran dari pengunjung website ini sangat kami harapkan demi kemajuan dari Departemen Teknik Informatika FT-UH.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<p>Welcome to IESP</p>', '', 'sambutan-ketua-departemen.html', 'greeting.html', 'Y', 'default', 2),
(11, 'Profil PS1TIF', 'History', 2, '<p>Program Studi Teknik Informatika Universitas Hasanuddin (PS1TIF) didirikan pada tanggal 13 Maret 2008, sesuai dengan SK yang dikeluarkan oleh Direktur Jenderal Pendidikan Tinggi, Departemen Pendidikan Nasional No. 852/D/T/2008. Sesuai dengan SK Dikti, Program Studi Teknik Informatika menyelenggarakan pendidikan untuk jenjang strata satu (S1-sarjana).</p>', '<p>Informatics Enginnering was founded in 2008 as Hasanuddin University\'s answer to the increasing need of professionals and experts in from the ever growing Information and Communication Technology industry. Informatics Engineering, as a part of Electrical Department of Hasanudding University Engineering Faculty, have acquired B accreditation in 2013 from the Ministry Of Education (09/SK/BAN-PT/Ak-XV/SII/2013)</p>', '', 'profil-ps1tif.html', 'history.html', 'Y', 'default', 1),
(12, 'Visi, Misi  dan Tujuan', 'Vision, Mission, Goal', 2, '<p><span style=\"font-size: 14pt; font-family: book antiqua,palatino;\"><strong>VISI:</strong></span></p>\r\n<p style=\"padding-left: 30px;\"><span style=\"font-size: 14pt; font-family: book antiqua,palatino;\">Pusat&nbsp;unggulan&nbsp;dalam&nbsp;pendidikan,&nbsp;penelitian&nbsp;dan&nbsp;penerapan&nbsp;teknologi&nbsp;informasi&nbsp;berbasis&nbsp;</span></p>\r\n<p style=\"padding-left: 30px;\"><span style=\"font-size: 14pt; font-family: book antiqua,palatino;\">jaringan&nbsp;komputer dan&nbsp;sistem&nbsp;cerdas&nbsp;berlandaskan&nbsp;Benua&nbsp;Maritim&nbsp;Indonesia&nbsp;tahun&nbsp;2025</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-family: book antiqua,palatino;\"><strong><span style=\"font-size: 14pt;\">MISI:</span></strong></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-family: book antiqua,palatino;\"><span style=\"font-size: 14pt;\">Menghasilkan&nbsp;lulusan&nbsp;yang&nbsp;memiliki&nbsp;sikap&nbsp;dan&nbsp;tata&nbsp;nilai&nbsp;yang&nbsp;baik,&nbsp;memiliki&nbsp;keterampilan&nbsp;umum, </span><span style=\"font-size: 14pt;\"><br /></span></span><span style=\"font-family: book antiqua,palatino;\"><span style=\"font-size: 14pt;\">keterampilan&nbsp;khusus dan&nbsp;pengetahuan&nbsp;dalam&nbsp;bidang&nbsp;Informatika&nbsp;dan&nbsp;komputer serta&nbsp;mampu&nbsp;menerapkan&nbsp;pengetahuan&nbsp;dan&nbsp;keterampilan yang&nbsp;dimiliki&nbsp;secara&nbsp;mandiri, kreatif&nbsp;dan&nbsp;inovatif&nbsp;dalam&nbsp;mengikuti&nbsp;kemajuan&nbsp;perkembangan&nbsp;teknologi.</span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: 14pt; font-family: book antiqua,palatino;\">Menghasilkan&nbsp;karya - karya&nbsp;ilmiah&nbsp;dibidang&nbsp;teknologi&nbsp;informasi&nbsp;berbasis&nbsp;jaringan&nbsp;komputer <br />dan&nbsp;sistem&nbsp;cerdas&nbsp;berlandaska Benua&nbsp;Maritim&nbsp;Indonesia, yang&nbsp;dipublikasikan secara&nbsp;nasional<br />maupun&nbsp;internasional.</span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: 14pt; font-family: book antiqua,palatino;\">Menyebarluaskan&nbsp;teknologi&nbsp;berdaya&nbsp;guna&nbsp;bagi&nbsp;masyarakat&nbsp;yang&nbsp;mendukung peningkatan&nbsp;kualitas&nbsp;hidup&nbsp;masyarakat.</span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Menjalin&nbsp;dan&nbsp;memperkuat&nbsp;kerjasama&nbsp;dengan&nbsp;institusi&nbsp;terkait,&nbsp;baik&nbsp;nasional </span><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">maupun&nbsp;internasional&nbsp;guna&nbsp;mendukung&nbsp;peningkatan kualitas&nbsp;relevansi&nbsp;dalam </span><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">pengajaran,&nbsp;penelitian&nbsp;dan&nbsp;kompetensi&nbsp;lulusan.</span></p>\r\n<p><span style=\"font-family: book antiqua,palatino;\"><span style=\"font-size: 14pt;\">&nbsp;</span><span style=\"font-size: 14pt;\"><strong>TUJUAN:</strong></span></span></p>\r\n<p><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Tersedianya&nbsp;sumber&nbsp;daya&nbsp;manusia&nbsp;di&nbsp;bidang&nbsp;Informatika&nbsp;yang&nbsp;memiliki&nbsp;kemampuan&nbsp;</span><br style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\" /><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">berkompetisi&nbsp;mendapatkan&nbsp;lapangan&nbsp;pekerjaan ataupun&nbsp;menciptakan&nbsp;lapangan&nbsp;</span><br style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\" /><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">pekerjaan&nbsp;secara&nbsp;mandiri&nbsp;dan&nbsp;kreatif</span></p>\r\n<p><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Terciptanya&nbsp;suasana&nbsp;akademik&nbsp;yang&nbsp;mendukung&nbsp;peningkatan&nbsp;pengetahuan&nbsp;di&nbsp;bidang</span><br style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\" /><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Teknologi&nbsp;Informasi&nbsp;khususnya&nbsp;dibidang&nbsp;teknologi berbasis&nbsp;jaringan&nbsp;komputer&nbsp;dan&nbsp;</span><br style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\" /><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">sistem&nbsp;cerdas&nbsp;berlandaskan&nbsp;Benua&nbsp;Maritim&nbsp;Indonesia</span></p>\r\n<p><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Terwujudnya&nbsp;komitmen&nbsp;tanggung&nbsp;jawab&nbsp;sosial&nbsp;universitas&nbsp;dalam&nbsp;rangka&nbsp;pemberdayaan</span><br style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\" /><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">&nbsp;masyarakat&nbsp;dan&nbsp;penyelesaian&nbsp;masalah&nbsp;yang dihadapi masyarakat.</span></p>\r\n<p><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Terciptanya&nbsp;relevansi&nbsp;yang&nbsp;kuat&nbsp;antara&nbsp;proses&nbsp;pendidikan,&nbsp;penelitian,&nbsp;pengembangan&nbsp;</span><br style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\" /><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">keilmuan&nbsp;dan&nbsp;&nbsp;kebutuhan&nbsp;masyarakat.</span></p>', '<p><span style=\"font-size: 14pt; font-family: \'book antiqua\', palatino;\"><strong>VISION:</strong></span></p>\r\n<p><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">\"Being the center of excelence in education, research and application that build upon computer network and smart system that based on Indonesia maritime country 2025.\"</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">MISION:</strong></p>\r\n<ol>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Create alumnus that have a great attitude and value, own a general ability, informatics and computer specific skills and knowledge, also apply their knowledge and ability independently, follow the improvement of the technology development in a creative and innovative way.</span></li>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Create scientific works in information technology section that build upon computer network and smart system that based on Indonesia maritime country that publish nationally and internationally.</span></li>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Dissaminate useful technology for the society that support the society improvement quality of life.</span></li>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Establish and strengthen cooperation between the relevant institution, nationally and internationally, in&nbsp;</span><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">order to support the improvement of the work relevance in teaching, research, and graduate competence.</span></li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\"><strong>GOALS:</strong></span></p>\r\n<ol>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Availibility of human resources in Informatics section that have an ability to compete while get a job or create jobs independently and creative.</span></li>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Create the academic athmosphere that support the increasing of informationtechnology knowledge, especially in computer network and smart system that based on Indonesia maritime country.</span></li>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Realize the university social responsibility commitment in order to empower and solving the problem of society.</span></li>\r\n<li><span style=\"font-family: \'book antiqua\', palatino; font-size: 14pt;\">Create the strength relevance between education system, research, scientific development, and society needs.</span></li>\r\n</ol>', '', 'visi,-misi--dan-tujuan.html', 'vision,-mission,-goal.html', 'Y', 'default', 3),
(13, 'Publikasi', 'Publication', 3, '', '', '', 'publikasi.html', 'publication.html', 'Y', 'default', 1),
(15, 'Struktur Organisasi', 'Structure Organization', 51115130, '', '', '552f200c223dd.PNG', 'Struktur-Organisasi.html', 'Structure-Organization.html', 'Y', 'default', 3),
(17, 'Staf/Tenaga Kependidikan', 'Staff', 51115130, '', '', '', 'staftenaga-kependidikan.html', 'staff.html', 'Y', 'default', 2),
(18, 'Dosen', 'Lecturer', 51115130, '', '', '', 'dosen.html', 'lecturer.html', 'Y', 'default', 1),
(19, 'Pengabdian Masyarakat', 'Community Service', 3, '<p>Data pengabdian masyarakat:</p>', '<p>Community service data:</p>', '', 'pengabdian-masyarakat.html', 'community-service.html', 'Y', 'default', 3),
(51115130, 'Organisasi', 'Organization', 0, '', '', '', 'organisasi.html', 'organization.html', 'Y', 'added', 3),
(130816248, 'Registrasi', 'Registration', 0, '<p><iframe src=\"https://docs.google.com/forms/d/e/1FAIpQLSdhHp6Tc_5fHfZMUdsK-Z2I2J4DvRwpqdYuET4FzHdaBr9WbQ/viewform?embedded=true\" width=\"700\" height=\"520\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\">Loading...</iframe></p>', '', '', 'registrasi.html', 'registration.html', 'Y', 'added', 4);

-- --------------------------------------------------------

--
-- Table structure for table `halaman1`
--

CREATE TABLE `halaman1` (
  `id_halaman` int(10) NOT NULL,
  `judul_halaman_id` varchar(50) NOT NULL,
  `judul_halaman_en` varchar(50) NOT NULL,
  `parent_halaman` int(10) NOT NULL,
  `konten_id` text NOT NULL,
  `konten_en` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link_halaman_id` varchar(100) NOT NULL,
  `link_halaman_en` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `atribut` enum('default','added') NOT NULL DEFAULT 'added',
  `posisi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman1`
--

INSERT INTO `halaman1` (`id_halaman`, `judul_halaman_id`, `judul_halaman_en`, `parent_halaman`, `konten_id`, `konten_en`, `gambar`, `link_halaman_id`, `link_halaman_en`, `publish`, `atribut`, `posisi`) VALUES
(1, 'Beranda', 'Home', 0, '', '', '', 'Beranda', 'Home', 'N', 'default', 0),
(2, 'Profil', 'Profile', 0, '', '', '', 'Profil', 'Profile', 'Y', 'default', 1),
(3, 'Akademik', 'Academic', 0, '', '', '', 'Akademik', 'Academic', 'Y', 'default', 2),
(4, 'Penelitian', 'Research', 0, '<p>\r\n	<span style=\"color:#000000;\"><span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">Salah satu bagian dari Tridharma Perguruan Tinggi adalah melakukan penelitian. Beberapa penelitian yang pernah dilaksanakan oleh para dosen dan civitas akademia program studi Teknik Informatika, yaitu :</span></span></p>\r\n', '', '', 'Penelitian', 'Research', 'Y', 'default', 3),
(5, 'Kerjasama', 'Partnership', 0, '<p>\r\n	<span style=\"color:#000000;\"><span style=\"font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">Jenis kerja sama yang &nbsp;telah dijalin/ sementara dilakukan oleh Program Studi Teknik Informatika Unhas&nbsp;dengan instansi lainnya, antara lain :</span></span></p>\r\n', '', '', 'Kerjasama', 'Partnership', 'Y', 'default', 4),
(6, 'Fasilitas', 'Facility', 0, '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">\r\n	<span style=\"color:#000000;\">Sistem informasi dan fasilitas yang digunakan untuk proses pembelajaran pada Program Studi Teknik Informatika Unhas antara lain</span></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; list-style-type: lower-alpha;\">\r\n	<li style=\"box-sizing: border-box; text-align: justify;\">\r\n		<span style=\"color:#000000;\">Koneksi Internet</span></li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px 0.5in; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">\r\n	<span style=\"color:#000000;\">Seluruh area dalam Program Studi Teknik Informatika Unhas telah dicakup oleh koneksi internet, baik berupa cakupan kabel maupun nirkabel.</span></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; list-style-type: lower-alpha;\">\r\n	<li style=\"box-sizing: border-box; text-align: justify;\" value=\"2\">\r\n		<span style=\"color:#000000;\">Perangkat Keras</span></li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px 0.5in; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">\r\n	<span style=\"color:#000000;\">Program Studi Teknik Informatika Unhas mempunyai empat buah laboratorium yang masing-masing berisi computer&nbsp; 40 unit (Lab. Multimedia), 10 unit (lab. Jarkom), 20 unit (lab. AI), 20 unit (lab. RPL).&nbsp; Dalam Lab. Jarkom terdapat 4 switch dan 8 router serta 1 unit videoconference system.&nbsp; Cakupan koneksi internet juga dimungkinkan oleh sebaran access point yang memadai.</span></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; list-style-type: lower-alpha;\">\r\n	<li style=\"box-sizing: border-box; text-align: justify;\" value=\"3\">\r\n		<span style=\"color:#000000;\">Perangkat Lunak</span></li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px 0.5in; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">\r\n	<span style=\"color:#000000;\">Program Studi Teknik Informatika Unhas lebih menekankan pemakaian perangkat lunak Open Source.&nbsp; Beberapa perangkat lunak proprietary yang digunakan adalah Matlab, Router Emulator.</span></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; list-style-type: lower-alpha;\">\r\n	<li style=\"box-sizing: border-box; text-align: justify;\" value=\"4\">\r\n		<span style=\"color:#000000;\">E-Learning</span></li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px 0.5in; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">\r\n	<span style=\"color:#000000;\">Program Studi Teknik Informatika Unhas dalam beberapa matakuliahnya telah memanfaatkan system e-learning yang disiapkan pada level universitas.&nbsp; Sistem e-learning ini menggunakan open-source CMS Claroline.</span></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; list-style-type: lower-alpha;\">\r\n	<li style=\"box-sizing: border-box; text-align: justify;\" value=\"5\">\r\n		<span style=\"color:#000000;\">Perpustakaan Online</span></li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px 0.5in; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;\">\r\n	<span style=\"color:#000000;\">Untuk mendapatkan referensi-referensi kebutuhan akademiknya, mahasiswa Program Studi Teknik Informatika Unhas memanfaatkan ketersediaan jaringan Internet. Selain itu, di level universitas, juga sudah berlangganan beberapa jurnal online seperti EBSCO, PROQUEST dan CENGAGE.</span></p>\r\n', '<p>\r\n	under construction</p>\r\n', '', 'Fasilitas', 'Facility', 'Y', 'default', 5),
(7, 'Agenda', 'Event', 0, '', '', '', 'Agenda', 'Event', 'Y', 'default', 6),
(8, 'Kontak', 'Contact', 0, '<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\"><span style=\"box-sizing: border-box;\"><strong style=\"box-sizing: border-box;\">Program Studi Teknik Informatika</strong></span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Jurusan Teknik Elektro</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Fakultas Teknik</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Universitas Hasanuddin</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Jalan Perintis Kemerdekaan Km. 10 Makassar, 90245</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Sulawesi Selatan, Indonesia</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Telp: +62-411 585188</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Fax: +62-411-585188</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 10px; color: rgb(130, 130, 130); font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;\">\r\n	<span style=\"color:#000000;\">Email: teknikinformatika[at]unhas.ac.id</span></p>\r\n', '<p>\r\n	under construction</p>\r\n', '', 'Kontak', 'Contact', 'Y', 'default', 7),
(10, 'Sambutan Ketua Program Studi', 'Greeting', 2, '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '', 'foto653345617.jpg', 'Sambutan-Ketua-Program-Studi', 'Greeting', 'Y', 'default', 1),
(11, 'Sejarah Singkat', 'History', 2, '', '', '', 'Sejarah-Singkat', 'History', 'Y', 'default', 2),
(12, 'Visi dan Misi', 'Vision and Mission', 2, '<p style=\"text-align: justify;\">\r\n	<strong>VISI :</strong></p>\r\n<p style=\"text-align: justify;\">\r\n	&ldquo;Menjadi pusat pendidikan, penelitian dan alih teknologi dalam bidang rekayasa informasi yang unggul secara nasional dan dikenal baik secara internasional dengan semangat budaya maritim.&rdquo;</p>\r\n<p style=\"text-align: justify;\">\r\n	&nbsp;</p>\r\n<p style=\"text-align: justify;\">\r\n	<strong>MISI :</strong></p>\r\n<ol>\r\n	<li style=\"text-align: justify;\">\r\n		Menghasilkan lulusan Teknik Informatika yang berpengetahuan dan berwawasan luas serta mampu mengembangkan pengetahuan dan keterampilan yang dimiliki secara mandiri, kreatif dan inovatif dalam mengikuti kemajuan perkembangan teknologi.</li>\r\n	<li style=\"text-align: justify;\">\r\n		Menghasilkan karya-karya ilmiah dibidang teknologi maju, teknologi terapan maupun teknologi tepat guna yang dipublikasikan secara nasional maupun internasional.</li>\r\n	<li style=\"text-align: justify;\">\r\n		Menyebarluaskan teknologi berdaya guna bagi masyarakat yang mendukung peningkatan kualitas hidup dan pelestarian sumber daya alam.</li>\r\n	<li style=\"text-align: justify;\">\r\n		Menjalin dan memperkuat kerjasama dengan institusi terkait baik nasional maupun internasional guna mendukung peningkatan kualitas relevansi dalam pengajaran, penelitian dan kompetensi lulusan.</li>\r\n</ol>\r\n<div id=\"__if72ru4sdfsdfruh7fewui_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__hggasdgjhsagd_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__if72ru4sdfsdfruh7fewui_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__hggasdgjhsagd_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__if72ru4sdfsdfruh7fewui_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__hggasdgjhsagd_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n', '<p>\r\n	under construction</p>\r\n', '', 'Visi-dan-Misi', 'Vision-and-Mission', 'Y', 'default', 3),
(13, 'Tujuan', 'Goal', 2, '<p style=\"text-align: justify;\">\r\n	Tujuan Program Studi S1 Teknik Informatika adalah menghasilkan lulusan yang berkualifikasi:</p>\r\n<ol>\r\n	<li style=\"text-align: justify;\">\r\n		Memliki kemampuan menggunakan pengetahuan dan keterampilan dalam kawasan keahliannya untuk berkompetisi mendapatkan lapangan pekerjaan ataupun menciptakan lapangan pekerjaan secara mandiri dan kreatif.</li>\r\n	<li style=\"text-align: justify;\">\r\n		Memiliki kemampuan menyelesaikan masalah di bidang keahliannya termasuk masalah yang kompleks yang mememerlukan pendekatan lintas disiplin.</li>\r\n	<li style=\"text-align: justify;\">\r\n		Memiliki kemampuan mengkomunikasikan pemikiran serta hasil-hasil karyanya baik dengan kelompok ilmu sebidang maupun dengan khalayak yang lebih luas.</li>\r\n	<li style=\"text-align: justify;\">\r\n		Memiliki integritas ilmiah dengan memahami dan menguasai pendekatan, metode, kaidah ilmiah serta keterampilan penerapannya di dalam&nbsp; mengembangkan ilmu pengetahuan dan teknologi di bidang Teknik Informatika.</li>\r\n</ol>\r\n', '<p>\r\n	under construction</p>\r\n', '', 'Tujuan', 'Goal', 'Y', 'default', 4),
(14, 'Sasaran', 'Aim', 2, '<ol>\r\n	<li style=\"text-align: justify;\">\r\n		Jumlah mahasiswa yang menyelesaikan studi tepat waktu (dalam kurung waktu 4 tahun) minimal 50%.</li>\r\n	<li style=\"text-align: justify;\" value=\"2\">\r\n		Jumlah mahasiswa yang menyelesaikan studi minimal 75% memiliki Index Prestasi Kumulatif (IPK) &gt; 3.00.</li>\r\n	<li style=\"text-align: justify;\" value=\"3\">\r\n		Setelah 4 tahun, minimal 20% dari skripsi mahasiswa setiap tahun dipublikasikan pada jurnal ilmiah.</li>\r\n	<li style=\"text-align: justify;\" value=\"4\">\r\n		Minimal 50% dari jumlah lulusan PS1TIF pada setiap periode wisuda sarjana dapat langsung bekerja atau memiliki masa tunggu kerja kurang lebih 3 bulan.Strategi pencapaian: Peningkatan kemampuan dan keterampilan mahasiswa melalui pelaksanaan Kerja Praktek 1 dan Kerja Praktek 2 di industri-industri lokal dan nasional, peningkatan penguasaan kompetensi tambahan seperti keterampilan berbahasa Inggris, kemampuan bekerja sama dalam kerja kelompok, kemampaun berkarya secara mandiri.</li>\r\n</ol>\r\n<div id=\"__if72ru4sdfsdfruh7fewui_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__hggasdgjhsagd_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n', '<p>\r\n	under construction</p>\r\n<div id=\"__if72ru4sdfsdfruh7fewui_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n<div id=\"__hggasdgjhsagd_once\" style=\"display:none;\">\r\n	&nbsp;</div>\r\n', '', 'Sasaran', 'Aim', 'Y', 'default', 5),
(15, 'Struktur Organisasi', 'Structure Organization', 2, 'strukturOrganisasi1155221705.PNG', 'strukturOrganisasi1447979096.PNG', '', 'Struktur-Organisasi', 'Structure-Organization', 'Y', 'default', 6),
(16, 'Kalender Akademik', 'Calender Academic', 3, 'kalenderAkademik268047298.jpg', 'kalenderAkademik1370791428.jpg', '', 'Kalender-Akademik', 'Calender-Academic', 'Y', 'default', 1),
(17, 'Staf/ Pengelola', 'Staff', 3, '', '', '', 'Staf-Pengelola', 'Staff', 'Y', 'default', 2),
(18, 'Dosen', 'Lecture', 3, '', '', '', 'Dosen', 'Lecture', 'Y', 'default', 3);

-- --------------------------------------------------------

--
-- Table structure for table `halaman_dosen`
--

CREATE TABLE `halaman_dosen` (
  `id_halaman` int(10) NOT NULL,
  `judul_halaman_id` varchar(50) NOT NULL,
  `judul_halaman_en` varchar(50) NOT NULL,
  `parent_halaman` int(10) NOT NULL,
  `konten_id` text NOT NULL,
  `konten_en` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link_halaman_id` varchar(100) NOT NULL,
  `link_halaman_en` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'Y',
  `atribut` enum('default','added') NOT NULL DEFAULT 'added',
  `posisi` varchar(65) NOT NULL,
  `urutan` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman_dosen`
--

INSERT INTO `halaman_dosen` (`id_halaman`, `judul_halaman_id`, `judul_halaman_en`, `parent_halaman`, `konten_id`, `konten_en`, `gambar`, `link_halaman_id`, `link_halaman_en`, `publish`, `atribut`, `posisi`, `urutan`) VALUES
(6059271, 'Proyek', 'Project', 1, '', '', '', 'Proyek.html', 'Project.html', 'Y', 'added', '198305102014041001', 2),
(25012255, 'halaman dosenku', 'my lecturer page', 1, '<p>dk,skg</p>', '<p>skgjsldij.df</p>', '56a5db6663ba1.jpg', 'halaman-dosenku.html', 'my-lecturer-page.html', 'Y', 'added', '42112282', 1),
(60510131, 'Jadwal', 'Schedule', 1, '<p>Jadwal mengajar</p>', '<p>Teaching Schedule</p>', '', 'Jadwal.html', 'Schedule.html', 'Y', 'added', '198305102014041001', 1),
(250611162, 'INFO', 'NEWS', 1, '<ul style=\"list-style-type: circle;\">\r\n<li><span style=\"font-family: comic sans ms,sans-serif; font-size: 14pt;\">Attending Training for University Collaboration Center Management at Fukuoka, Ehime, Nagoya Japan, 26 July 2015 - 9 August 2015</span></li>\r\n<li><span style=\"font-family: comic sans ms,sans-serif; font-size: 14pt;\">Visitasi Teknik Informatika Universitas Budi Luhur, Jakarta, 3-5 July 2015</span></li>\r\n<li><span style=\"font-family: comic sans ms,sans-serif; font-size: 14pt;\">Visitasi Teknik Informatika Universitas Trisakti, Jakarta, 2-3 July 2015</span></li>\r\n</ul>\r\n<p>&nbsp;</p>', '', '', 'INFO.html', 'NEWS.html', 'Y', 'added', '197310101998021001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(10) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `jenis_kerjasama` text NOT NULL,
  `tahun` varchar(6) NOT NULL,
  `masa_berlaku` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `institusi`, `jenis_kerjasama`, `tahun`, `masa_berlaku`) VALUES
(16, 'PT PLN (Persero)', '<p>Studi Penyelidikan Lapangan <em>Mobile Power Plant</em> dan PLTMG Tersebar Lokasi: <em>Cluster </em>Sulawesi 1</p>', '2015', '2015'),
(17, 'Balitbangda Pemprov. Sulsel', '<p>Pengembangan Teknologi Informasi dan Komunikasi di Sulawesi Selatan</p>', '2015', '2015'),
(18, 'Kemkominfo', '<p>Sistem Antena <em>Reconfigurable Beamsteerable </em>dan <em>Friendly Environment</em> dengan Struktur Stripmikro untuk Piranti Komputasi Bergerak LTE-<em>Advanced</em></p>', '2014', '2014'),
(19, 'PT. Kaltim Prima Coal', '<p>Kerjasama dalam bidang pendidikan, penelitian, dan pemberdayaan masyarakat</p>', '2013', '2018'),
(20, 'PT. Sulawesi Indo Energy', '<p>Pekerjaan Pengawasan Pembangunan PLTMH Belajen 2 x 4,15 MW di Kabupaten Enrekang, Provinsi Sulawesi Selatan</p>', '2014', '2016'),
(21, 'PT. PLN (Persero) Unit Pendidikan dan Pelatihan Makassar (Renewable Energy Academy)', '<p>Penyelenggaraan Pembelajaran Bidang Ketenagalistrikan</p>', '2015', '2017'),
(22, 'Fakultas Teknik Universitas Pepabri Makassar', '<p>Kerjasama dalam bidang pendidikan, penelitian, dan pengabdian masyarakat</p>', '', ''),
(23, 'Fakultas Teknik Universitas Fajar Makassar', '<p>Kerjasama dalam bidang pendidikan, penelitian, dan pengabdian masyarakat</p>', '', ''),
(24, 'Politeknik Negeri Ujung Pandang', '<p>Kerjasama dalam bidang pendidikan, penelitian, dan pengabdian masyarakat</p>', '', ''),
(25, 'National Defence University of Malaysia', '<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Kejasama promosi internasional</p>\r\n<p>-&nbsp; <em>Exchange of materials in education and research, publications, and academic information</em></p>\r\n<p>-&nbsp; <em>Exchange of faculty and research scholars</em></p>\r\n<p>-&nbsp; <em>Exchange of students</em></p>\r\n<p>-&nbsp; <em>Joint research and meetings for education and research</em></p>\r\n<p>-&nbsp; <em>Technical assistance</em></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', ''),
(26, 'Kyushu University, Japan', '<p>-&nbsp; Exchange of academic staff, administrative staff and students</p>\r\n<p>-&nbsp; Plan for joint research</p>\r\n<p>-&nbsp; Exchange of academic information and publications</p>\r\n<p>- &nbsp;Other academic exchange to which both parties agree</p>', '2013', '2018'),
(27, 'Faculty of International Resource Sciences, Akita University, Japan', '<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>-&nbsp; Exchange faculty, researchers and administrative staff</p>\r\n<p>-&nbsp; Exchange students</p>\r\n<p>-&nbsp; Conduct joint researches</p>\r\n<p>-&nbsp; Hold lectures and organize symposia</p>\r\n<p>-&nbsp; Exchange academic information and materials</p>\r\n<p>-&nbsp; Promote other academic cooperation as mutually agreed</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', ''),
(28, 'Faculty of Engineering and Graduate School of Science and Technology, Kumamoto University', '<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>-&nbsp; Exchange faculty, researchers and administrative staff</p>\r\n<p>-&nbsp; Exchange students</p>\r\n<p>-&nbsp; Conduct joint researches</p>\r\n<p>-&nbsp; Hold lectures and organize symposia</p>\r\n<p>-&nbsp; Exchange academic information and materials</p>\r\n<p>-&nbsp; Promote other academic cooperation as mutually agreed</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', ''),
(29, 'Faculty of Engineering, Ehime University', '<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>-&nbsp; Exchange faculty, researchers and administrative staff</p>\r\n<p>-&nbsp; Exchange students</p>\r\n<p>-&nbsp; Conduct joint researches</p>\r\n<p>-&nbsp; Hold lectures and organize symposia</p>\r\n<p>-&nbsp; Exchange academic information and materials</p>\r\n<p>-&nbsp; Promote other academic cooperation as mutually agreed</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', ''),
(30, 'PT. VALE  Indonesia Tbk.', '<p>Kerjasama dalam&nbsp;Bidang Pendidikan ,&nbsp;Penelitian, dan&nbsp;Pengabdian&nbsp;Masyrakat</p>', '2013', '2019'),
(31, 'Politeknik Negeri Manado', '<p>Kerjasama dalam&nbsp;Bidang Pendidikan ,&nbsp;Penelitian, dan&nbsp;Pengabdian&nbsp;Masyrakat</p>', '2015', '2020'),
(32, 'PT PLN (PERSERO)', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(33, 'PT PERTAMINA (PERSERO)', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2015', '2017'),
(34, 'UNIVERSITAS PELITA HARAPAN', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(35, 'UNIVERSITAS DWIJENDRA DENPASAR', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(36, 'PT. BANK MANDIRI', '<p>Pengelolaan dana,&nbsp;Pemanfaatan produk&nbsp;dan pelayanan jasa perbankan serta&nbsp;kerjasama di Bidang&nbsp;pendidikan</p>', '2015', '2018'),
(37, 'PEMERINTAH KABUPATEN POSO', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2016', '2019'),
(38, 'KETUA YAYASAN PENDIDIKAN EKSEKUTIP KOMPUTER MATARAM', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2016', '2021'),
(39, 'LEMBAGA ILMU PENGETAHUAN INDONESIA (LIPI)', '<p>Pendidikan dan&nbsp;penelitian ilmu&nbsp;pengetahuan dan&nbsp;teknologi</p>', '2014', '2019'),
(40, 'UNIVERSITAS KRISTEN PAPUA ', '<p>Kerjasama dalam&nbsp;rangka&nbsp;pengembangan&nbsp;kompetensi dan&nbsp;penigkatan kualitas&nbsp;sumber daya&nbsp;manusia</p>', '2015', '2020'),
(41, 'UNIVERSITAS SURABAYA', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(42, 'UNIVERSITAS KHAIRUN TERNATE', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(43, 'BPJS (BADAN PENYELENGGARA JAMINAN SOSIAL)', '<p>Jaminan Kesehatan&nbsp;Bagi Mahasiswa</p>', '2016', '2017'),
(44, 'UNIVERSITAS MUHAMMADIYAH MALUKU UTARA', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(45, 'UNIVERSITAS SEMARANG', '<p>Pembangunan Bangsa dan Negara</p>', '2015', '2020'),
(46, 'TVRI', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(47, 'BADAN STANDARISASI NASIONAL (BSN)', '<p>erjasama dalam&nbsp;pembinaan dan&nbsp;pengembangan&nbsp;Standarisasi</p>', '2015', '2020'),
(48, 'UNIVERSITAS MUSAMUS MERAUKE', '<p>Pengembangan Tri Dharma Perguruan Tinggi</p>', '2015', '2018'),
(49, 'BANK BTPN', '<p>Kerjasama dalam pembinaan dan pengembangan Standarisasi</p>', '2014', '2019'),
(50, 'UNIVERSITAS ISLAM NEGERI (UIN) ALAUDDIN MAKASSAR', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2017'),
(51, 'UNIVERSITAS TANRI ABENG', '<p>Kerjasama bidang&nbsp;Tri Dharma&nbsp;Perguruan Tinggi</p>', '2015', '2020'),
(52, 'BADAN NARKOTIKA NASIONAL', '<p>Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika</p>', '2016', '2019'),
(53, 'UNIVERSITAS KRISTEN SATYA WACANA', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2016', '2021'),
(54, 'UNIVERSITAS NAROTAMA', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2016', '2021'),
(55, 'UNIVERSITAS NAHDLATUL WATHAN MATARAM', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2015', '2020'),
(56, 'PT BNI tbk', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2014', '2019'),
(57, 'UNIVERSITAS  WIDYAGAMA MAHAKAM', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyrakat</p>', '2016', '2021'),
(58, 'PT GARUDA INDONESIA (PERSERO)', '<p>Kerjasama dalam hal&nbsp;pemberian&nbsp;coorperate price</p>', '2014', '2019'),
(59, 'PT BANK TABUNGAN NEGARA (PERSERO)', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyarakat</p>', '2014', '2019'),
(60, 'PT ANTAM (PERSERO) ', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyarakat</p>', '2014', '2019'),
(61, 'PT TELKOMSEL (PERSERO) ', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyarakat</p>', '2014', '2019'),
(62, 'STIKES MEGA REZKY MAKASSAR ', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyarakat</p>', '2014', '2019'),
(63, 'PEMERINTAH BALIKPAPAN', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyarakat</p>', '2016', '2017'),
(64, 'Universitas Al Asyariah Mandar', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pengabdian Masyarakat</p>', '2017', '2022'),
(65, 'PT. Kaltim Prima Coal', '<p>Kerjasama dalam Bidang Pendidikan , Penelitian, dan Pemberdayaan Masyarakat</p>', '2013', '2018'),
(66, 'Tentara Nasional Indonesia Angkatan Laut', '<p>Kerjasama bidang&nbsp;pendidikan,&nbsp;penelitian dan pengabdian&nbsp;masyrakat.,&nbsp;khususnya dalam&nbsp;bidang maritim</p>', '2010', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `nama_komentar` varchar(50) NOT NULL,
  `email_komentar` varchar(100) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `isi_komentar` text NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `nama_komentar`, `email_komentar`, `tanggal_komentar`, `isi_komentar`, `ip`) VALUES
(3, 66, 'Richard', 'richard_media@rocketmail.com', '2015-05-04', 'terima kasih artikelnya sangat menambah wawasan', '202.67.36.248'),
(12, 72, 'Doni', 'lopisquenak@gmail.com', '2015-05-20', 'wah, hebat ki ady', '10.10.112.2'),
(13, 72, 'rendi', 'll@ds.com', '2015-05-26', 'hebat ady', '202.67.36.236'),
(15, 69, 'nonie try melanie yakuza', '087763431257', '2015-05-28', 'kenapa tidak dicantumkan berapa calon mahasiswa yg sudah mendaftar', '180.249.189.84'),
(16, 70, 'Tri Santo Putra Payung', 'amsirbrian@yahoo.com', '2015-05-31', 'bgai mana ya bisa masuk di jurusan i2 truss lambat suda ya klau mendaftar sekarang', '36.83.141.236'),
(17, 69, 'mercy ruru', 'Rurumercy@gmail.com', '2015-06-04', 'itu daya tampungya maksutnya cuman 40orang atau 40 raungan', '114.79.62.252'),
(24, 69, 'Ainun Ayu Utami', 'ainunayuitami_a@yahoo.com', '2015-07-10', 'Apakah UNHAS masih membuka jalur POSK untuk tahun ini ?', '202.67.36.248');

-- --------------------------------------------------------

--
-- Table structure for table `kuliah`
--

CREATE TABLE `kuliah` (
  `id_kuliah` varchar(100) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `mata_kuliah` varchar(128) NOT NULL,
  `mata_kuliah_en` varchar(128) NOT NULL,
  `program` varchar(128) NOT NULL,
  `semester` varchar(16) NOT NULL,
  `sks` varchar(16) NOT NULL,
  `nip` varchar(32) NOT NULL,
  `nama_dosen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id_link` int(10) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(9) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_mahasiswa` varchar(100) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `judul_ta` varchar(200) NOT NULL,
  `pembimbing_satu` bigint(18) NOT NULL,
  `pembimbing_dua` bigint(18) NOT NULL,
  `penguji_hasil_1` bigint(18) NOT NULL,
  `penguji_hasil_2` bigint(18) NOT NULL,
  `penguji_hasil_3` bigint(18) NOT NULL,
  `penguji_akhir_1` bigint(18) NOT NULL,
  `penguji_akhir_2` bigint(18) NOT NULL,
  `penguji_akhir_3` bigint(18) NOT NULL,
  `sk_pembimbing` varchar(50) NOT NULL,
  `sk_penguji_hasil` varchar(50) NOT NULL,
  `sk_penguji_akhir` varchar(50) NOT NULL,
  `lembar_pengesahan` varchar(50) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `skor_toefl` int(100) NOT NULL,
  `toefl` varchar(50) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `sertifikat_pelatihan` varchar(50) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_halaman`
--

CREATE TABLE `manajemen_halaman` (
  `id` int(11) NOT NULL,
  `halaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manajemen_halaman`
--

INSERT INTO `manajemen_halaman` (`id`, `halaman`) VALUES
(1, '[{\"id\":\"2\",\"children\":[{\"id\":\"11\"},{\"id\":\"10\"},{\"id\":\"12\"}]},{\"id\":\"3\",\"children\":[{\"id\":\"13\"},{\"id\":\"4\"},{\"id\":\"19\"}]},{\"id\":\"51115130\",\"children\":[{\"id\":\"18\"},{\"id\":\"17\"},{\"id\":\"15\"}]},{\"id\":\"130816248\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_halaman_dosen`
--

CREATE TABLE `manajemen_halaman_dosen` (
  `id` varchar(65) NOT NULL,
  `halaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manajemen_halaman_dosen`
--

INSERT INTO `manajemen_halaman_dosen` (`id`, `halaman`) VALUES
('555', '[{\"id\":\"110414150\"}]'),
('111', '[{\"id\":\"20046108\"},{\"id\":\"240416164\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `nomor_penting`
--

CREATE TABLE `nomor_penting` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nomor` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomor_penting`
--

INSERT INTO `nomor_penting` (`id`, `nama`, `nomor`) VALUES
(41, 'Kantor Fakultas :', '+62 1234 45678'),
(42, 'Dekan  :', '+62 1234 98776'),
(43, 'Sekretaris :', '0411-3624248');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id_penelitian` int(10) NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `ketua_penelitian` varchar(150) NOT NULL,
  `anggota_penelitian_1` varchar(100) NOT NULL,
  `anggota_penelitian_2` varchar(100) NOT NULL,
  `anggota_penelitian_3` varchar(100) NOT NULL,
  `anggota_penelitian_4` varchar(100) NOT NULL,
  `abstrak` text NOT NULL,
  `abstrak_img` varchar(150) NOT NULL,
  `tahun_penelitian` year(4) NOT NULL,
  `durasi_penelitian` varchar(150) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `nama_lab` varchar(150) NOT NULL,
  `grant_abstrak` varchar(200) NOT NULL,
  `tujuan_penilitian` text NOT NULL,
  `hasil_penilitian` text NOT NULL,
  `manfaat_penilitian` text NOT NULL,
  `kata_kunci` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id_penelitian`, `judul_penelitian`, `ketua_penelitian`, `anggota_penelitian_1`, `anggota_penelitian_2`, `anggota_penelitian_3`, `anggota_penelitian_4`, `abstrak`, `abstrak_img`, `tahun_penelitian`, `durasi_penelitian`, `sumber_dana`, `nama_lab`, `grant_abstrak`, `tujuan_penilitian`, `hasil_penilitian`, `manfaat_penilitian`, `kata_kunci`, `link`) VALUES
(49, 'Switched Combining Pada Dual Link Untuk Peningkatan Performansi Sistem', 'Indrabayu', '', '', '', '', '', '0', 2006, '', 'DIPA UNHAS', '', '', '', '', '', '', ''),
(55, 'Perbandingan Layanan HSDP Dan HSUPA', 'Indrabayu', '', '', '', '', '', '0', 2011, '', 'DIPA UNHAS', '', '', '', '', '', '', ''),
(56, 'Diversitas kecerdasan buatan utk prediksi curah hujan', 'Indrabayu', '', '', '', '', '', '0', 2014, '', 'BOPTN', '', '', '', '', '', '', ''),
(57, 'Prototipe Sistem Traffic Light Cerdas Untuk Solusi Kemacetan Lalu Lintas (Sistem Transportasi Cerdas Selaras Kultur-Sosial Benua Maritim Indonesia). ', 'Indrabayu', '', '', '', '', '', '0', 2015, '', 'PUPT DIKTI', '', '', '', '', '', '', ''),
(63, 'METODE DIVIDE-AND-CONQUER DAN TEKNIK WORKSTEALING UNTUK BAHASA PEMROGRAMAN DATA PARALLEL PADA PROSESOR MANYCORE', 'Adnan', '', '', '', '', '', '0', 2012, '', 'Penelitian PUPT skema Post Doctoral', '', '', '', '', '', '', ''),
(65, 'METODE WORKSTEALING RATE CONTROL PADA PEMROGRAMAN PROSESOR MULTICORE XEON SERI E5 TERBARU DALAM RANGKA GREEN AND SUSTAINABLE COMPUTING', 'Adnan', '', '', '', '', '', '0', 2015, '', '-', '', '', '', '', '', '', ''),
(76, 'Sistem Multi Tampilan Pemonitoring Kesehatan Pasien pada Self-Routing Mesh Networking 2.4 GHz (Tahun II) - Testing', 'Amil Ahmad Ilham', '', '', '', '', '<p>Testing</p>', '57026e8654059.png', 2015, '90 Hari', 'PUPT (Penelitian Unggulan Perguruan Tinggi)', 'Seis Lab', 'testing', '<p>1). Testing, 2).Testing, 3). Testing</p>', '<p>1). Testing, 2).Testing, 3). Testing</p>', '<p>1). Testing, 2).Testing, 3). Testing</p>', 'Testing', 'sistem-multi-tampilan-pemonitoring-kesehatan-pasien-pada-self-routing-mesh-networking-2.4-ghz-(tahun-ii)---testing.html'),
(77, 'testing', 'Adnan', '', '', '', '', '', '', 2015, '', 'testing', 'tesing', 'testing', '<p>testing</p>', '<p>testong</p>', '<p>testing</p>', 'testing', 'testing.html'),
(78, 'Prototipe Sistem Traffic Light Cerdas Untuk Solusi Kemacetan Lalu Lintas (Sistem Transportasi Cerdas Selaras Kultur-Sosial Benua Maritim Indonesia).', 'Indrabayu', '', '', '', '', '', '', 2016, '-', 'PUPT-DIKTI', '-', '-', '', '', '', '-', 'prototipe-sistem-traffic-light-cerdas-untuk-solusi-kemacetan-lalu-lintas-(sistem-transportasi-cerdas-selaras-kultur-sosial-benua-maritim-indonesia)..html'),
(79, 'Sistem Cerdas Ahli Untuk Penentuan Bahp Operasi Bedah', '', '', '', '', '', '', '', 2016, '-', 'BMIS-UNHAS', '-', '-', '', '', '', '-', 'sistem-cerdas-ahli-untuk-penentuan-bahp-operasi-bedah.html'),
(80, '“SMART and AUTOMATIC LAW ENFORCEMENT” Untuk Revolusi Mental Pengguna Transportasi Indonesia', 'Indrabayu', '', '', '', '', '', '', 2016, '-', 'RUNAS- UNHAS', '-', '-', '', '', '', '-', '“smart-and-automatic-law-enforcement”-untuk-revolusi-mental-pengguna-transportasi-indonesia.html'),
(81, 'Prototipe Sistem Traffic Light Cerdas Untuk Solusi Kemacetan Lalu Lintas (Sistem Transportasi Cerdas Selaras Kultur-Sosial Benua Maritim Indonesia).', 'Indrabayu', '', '', '', '', '', '', 2017, '-', 'PTUPT- UNHAS-DIKTI', '-', '-', '', '', '', '-', 'prototipe-sistem-traffic-light-cerdas-untuk-solusi-kemacetan-lalu-lintas-(sistem-transportasi-cerdas-selaras-kultur-sosial-benua-maritim-indonesia)..html'),
(82, 'Prototipe Speech to Text Bahasa Indonesia untuk Alat Bantu Komunikasi Kaum Difabel', '', '', '', '', '', '', '', 2017, '-', 'PTUPT- UNHAS- DIKTI', '-', '-', '', '', '', '-', 'prototipe-speech-to-text-bahasa-indonesia-untuk-alat-bantu-komunikasi-kaum-difabel.html'),
(83, 'Utilization of HF Electromagnetic Waves Availability for Charging Mobile Communication Device', 'Intan Sari Areni', '', '', '', '', '', '', 2014, '-', '', '-', '-', '', '', '', '-', 'utilization-of-hf-electromagnetic-waves-availability-for-charging-mobile-communication-device.html'),
(84, 'A Fuzzy Logic Approach For Timely Adaptive Traffic Light Based On Traffic Load.', 'Indrabayu', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'a-fuzzy-logic-approach-for-timely-adaptive-traffic-light-based-on-traffic-load..html'),
(87, 'A Compact and Robust WBN Applicable for Real-Time Febris Monitoring', 'Intan Sari Areni', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'a-compact-and-robust-wbn-applicable-for-real-time-febris-monitoring.html'),
(88, 'Ultra Wideband Antenna Design for Fetal Monitoring', 'Intan Sari Areni', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'ultra-wideband-antenna-design-for-fetal-monitoring.html'),
(89, 'Runtime connection-oriented guaranteed-bandwidth network-onchip with extra multicast  communication service', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'runtime-connection-oriented-guaranteed-bandwidth-network-onchip-with-extra-multicast--communication-service.html'),
(90, 'hree-phase inverter using microcontroller for speed control application on induction mot', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'hree-phase-inverter-using-microcontroller-for-speed-control-application-on-induction-mot.html'),
(91, 'The Simulation of Vehicle Counting System for Traffic Surveillance using VIOLA-JONES Method', 'Dewiani', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'the-simulation-of-vehicle-counting-system-for-traffic-surveillance-using-viola-jones-method.html'),
(92, 'Wavelet Analysis for Identification of Lung Abnormalities   using Artificial Neural Network', 'Amil Ahmad Ilham', '', '', '', '', '', '', 2014, '', '', ' ', ' ', '', '', '', ' ', 'avelet-analysis-for-identification-of-lung-abnormalities---using-artificial-neural-network.html'),
(93, 'Efficient and deadlock-free treebased multicast routing methods for  networks-on-chip (NoC', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'efficient-and-deadlock-free-treebased-multicast-routing-methods-for--networks-on-chip-(noc.html'),
(94, 'Using Genetic Algorithm to Bridge Decision Making Grid Data Gaps in Small and Medium Industries', 'Zulkifli Tahir', '', '', '', '', '', '', 2014, ' ', '', ' ', ' ', '', '', '', ' ', 'using-genetic-algorithm-to-bridge-decision-making-grid-data-gaps-in-small-and-medium-industries.html'),
(95, 'Network-on-chip with an arbitration control for balancing throughputs in multiprocessor applications', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'network-on-chip-with-an-arbitration-control-for-balancing-throughputs-in-multiprocessor-applications.html'),
(96, 'Classifying Cyst and Tumor Lesion on Dental Panoramic Images Using Support Vector Machine Based on GLRLM Texture Features', 'Inggrid Nurtanio', '', '', '', '', '', '', 2014, '', ' ', ' ', ' ', '', '', '', ' ', 'lassifying-cyst-and-tumor-lesion-on-dental-panoramic-images-using-support-vector-machine-based-on-glrlm-texture-features.html'),
(97, 'Blob modification in counting vehicles using Gaussian Mixture models under heavy traffic', 'Inggrid Nurtanio', '', '', '', '', '', '', 2015, '', ' ', ' ', ' ', '', '', '', ' ', 'blob-modification-in-counting-vehicles-using-gaussian-mixture-models-under-heavy-traffic.html'),
(98, 'Detection of  Kidney Organ Condition Using Hidden Markov Models Based on Singular Value Decomposition', 'Inggrid Nurtanio', '', '', '', '', '', '', 2015, '', ' ', ' ', ' ', '', '', '', ' ', 'etection-of--kidney-organ-condition-using-hidden-markov-models-based-on-singular-value-decomposition.html'),
(99, 'Prediction of Reagents Needs using Radial Basis Function in Teaching Hospital', 'Indrabayu', '', '', '', '', '', '', 2015, '', ' ', ' ', ' ', '', '', '', ' ', 'prediction-of-reagents-needs-using-radial-basis-function-in-teaching-hospital.html'),
(100, 'he Design of Wearable Medical Device for Triaging Disaster Casualties in Developing Countries', 'Muhammad Niswar', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'he-design-of-wearable-medical-device-for-triaging-disaster-casualties-in-developing-countries.html'),
(101, 'Movement Effect on Electrical Properties of UWB Microwave Antenna During Breast Tumor Diagnostic Scanning', 'Dewiani', '', '', '', '', '', '', 2015, '', ' ', ' ', ' ', '', '', '', ' ', 'movement-effect-on-electrical-properties-of-uwb-microwave-antenna-during-breast-tumor-diagnostic-scanning.html'),
(102, 'Improvement of UWB Patch Transducer Properties Applicable for Fetal Monitoring System', 'Elyas', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'improvement-of-uwb-patch-transducer-properties-applicable-for-fetal-monitoring-system.html'),
(103, 'Artificial Neural Network Approach for Maintenance Strategy of Machinery in Small and Medium Industries', 'Zulkifli Tahir', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'artificial-neural-network-approach-for-maintenance-strategy-of-machinery-in-small-and-medium-industries.html'),
(104, 'An Automated HTML5 Offline Services (AHOS) A Case Study of Web-based Maintenance DSS in SMIs', 'Zulkifli Tahir', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'an-automated-html5-offline-services-(ahos)-a-case-study-of-web-based-maintenance-dss-in-smis.html'),
(105, 'Leveraging Static Probe Instrumentation for VM-based Anomaly Detection System', 'Ady Wahyudi Paundu', '', '', '', '', '', '', 2015, ' ', '', ' ', ' ', '', '', '', ' ', 'leveraging-static-probe-instrumentation-for-vm-based-anomaly-detection-system.html'),
(106, 'The Analysis of Automated HTML5 Offline Services (AHOS)', 'Zulkifli Tahir', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'the-analysis-of-automated-html5-offline-services-(ahos).html'),
(107, 'Design of WLAN based system for fast protocol factory automation system', 'Intan Sari Areni', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'design-of-wlan-based-system-for-fast-protocol-factory-automation-system.html'),
(108, 'Speech to Text for Indonesian Homophone Phrase with Mel Frequency Cepstral Coefficient', 'Intan Sari Areni', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'speech-to-text-for-indonesian-homophone-phrase-with-mel-frequency-cepstral-coefficient.html'),
(109, 'Vehicle Detection and Tracking using Gaussian Mixture Model and Kalman Filter', 'Indrabayu', '', '', '', '', '', '', 2016, '', ' ', ' ', ' ', '', '', '', ' ', 'vehicle-detection-and-tracking-using-gaussian-mixture-model-and-kalman-filter.html'),
(110, 'Apriori Algorithm for Surgical Consumable Material Standardization', 'Christoforus Yohannes', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'apriori-algorithm-for-surgical-consumable-material-standardization.html'),
(111, 'Characteristics approach of thin-film CIGS PV cells with conventional mono-crystalline silicon model', 'Faizal Arya Samman', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'characteristics-approach-of-thin-film-cigs-pv-cells-with-conventional-mono-crystalline-silicon-model.html'),
(112, 'Sequence-Based Analysis of Static Probe Instrumentation Data for a VMM-Based Anomaly Detection System', 'Ady Wahyudi Paundu', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sequence-based-analysis-of-static-probe-instrumentation-data-for-a-vmm-based-anomaly-detection-system.html'),
(113, 'Improvement in Speech to Text for Bahasa Indonesia Through Homophone Impairment Training', 'Indrabayu', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'improvement-in-speech-to-text-for-bahasa-indonesia-through-homophone-impairment-training.html'),
(114, 'An Intelligent Traffic Light System for Reducing Number of Queuing Cars in Complex Road Juction', 'Indrabayu', '', '', '', '', '', '', 2016, ' ', '', ' ', ' ', '', '', '', '  ', 'an-intelligent-traffic-light-system-for-reducing-number-of-queuing-cars-in-complex-road-juction.html'),
(115, 'Evaluasi Unjuk Kerja Jaringan Ad Hoc Berbasis Protokol AODV', 'Wardi', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'evaluasi-unjuk-kerja-jaringan-ad-hoc-berbasis-protokol-aodv.html'),
(116, 'Konverter DC/DC tipe Buck dengan Pengendali Daur-Tertutup Sederhana', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'konverter-dcdc-tipe-buck-dengan-pengendali-daur-tertutup-sederhana.html'),
(117, 'Survey Potensi Tenaga Air untuk Pembangkit Listrik Tenaga Mikro Hidro di Kabupaten Pesisir', 'Dewiani', '', '', '', '', '', '', 2014, '', ' ', ' ', ' ', '', '', '', ' ', 'urvey-potensi-tenaga-air-untuk-pembangkit-listrik-tenaga-mikro-hidro-di-kabupaten-pesisir.html'),
(118, 'Simulasi Pengaturan Tegangan Konverter AC/DC Satu Fasa dengan Pengujian pada Beban Variabel', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'simulasi-pengaturan-tegangan-konverter-acdc-satu-fasa-dengan-pengujian-pada-beban-variabel.html'),
(119, 'Evaluasi Numerik Desain Antena UWB untuk Aplikasi Deteksi Breast Cancer ', 'Intan Sari Areni', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'evaluasi-numerik-desain-antena-uwb-untuk-aplikasi-deteksi-breast-cancer.html'),
(120, 'Karakteristik Beamsteerable Dan Reconfigurable Pada Sistem Antena Piranti Komputasi Bergerak Ramah Lingkungan ', 'Elyas', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'karakteristik-beamsteerable-dan-reconfigurable-pada-sistem-antena-piranti-komputasi-bergerak-ramah-lingkungan.html'),
(121, 'Kinerja tanda Tangan Digital RSA 1024 bit pada simulasi E-Voting Menggunakan Prosesor Multicore ', 'Adnan', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'kinerja-tanda-tangan-digital-rsa-1024-bit-pada-simulasi-e-voting-menggunakan-prosesor-multicore.html'),
(122, 'Sistem Kendali Level Tegangan Konverter Buck-Boost Tipe SEPIC', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sistem-kendali-level-tegangan-konverter-buck-boost-tipe-sepic.html'),
(123, 'Studi Pendahuluan Pengaruh Distribusi dan Tipe Beban kerja Program Parallel Pada Prosesor Mullticore dan Teknologi Hyperthreading', 'Adnan', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'studi-pendahuluan-pengaruh-distribusi-dan-tipe-beban-kerja-program-parallel-pada-prosesor-mullticore-dan-teknologi-hyperthreading.html'),
(124, 'Sistem Kendali Level Tegangan pada Konverter DC/DC Tipe Boost untuk Aplikasi Sistem Fotovoltaik', 'Faizal Arya Samman', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sistem-kendali-level-tegangan-pada-konverter-dcdc-tipe-boost-untuk-aplikasi-sistem-fotovoltaik.html'),
(125, 'Sistem Telemedis Interaktif untuk Penanganan Pasien Rawat Jalan', 'Elyas', '', '', '', '', '', '', 2014, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sistem-telemedis-interaktif-untuk-penanganan-pasien-rawat-jalan.html'),
(126, 'Kajian Potensi Kamera CCTV Untuk Revolusi Mental Pengguna Transportasi di Indonesia', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', '', ' ', ' ', '', '', '', ' ', 'kajian-potensi-kamera-cctv-untuk-revolusi-mental-pengguna-transportasi-di-indonesia.html'),
(127, 'Discrete Cosine Transform Untuk Dispersi Spektrum Suhu Permukaan Menggunakan Quadcopter.', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'discrete-cosine-transform-untuk-dispersi-spektrum-suhu-permukaan-menggunakan-quadcopter..html'),
(128, 'Sistem Pendukung Keputusan Penentuan Diagnosa Penyakit untuk Jenis Diet Pasien Berbasis Web', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sistem-pendukung-keputusan-penentuan-diagnosa-penyakit-untuk-jenis-diet-pasien-berbasis-web.html'),
(129, 'Perancangan Sistem Monitoring dan Manajemen Data Fetal', 'Elyas', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'perancangan-sistem-monitoring-dan-manajemen-data-fetal.html'),
(130, 'Review Teknologi Pengenalan Suara : Metode pada Speech to Text', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'review-teknologi-pengenalan-suara--metode-pada-speech-to-text.html'),
(131, 'Penerapan Proses Thinning pada Citra Aksara Lontara BugisMakassar', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'penerapan-proses-thinning-pada-citra-aksara-lontara-bugismakassar.html'),
(132, 'Rancang Bangun Antena Mikrostrip UWB untuk Sistem Pendeteksi dan Pemonitor Fetal', 'Elyas', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'rancang-bangun-antena-mikrostrip-uwb-untuk-sistem-pendeteksi-dan-pemonitor-fetal.html'),
(133, 'Evaluasi Teknik Stemming Pada Preprocessing Text Mining Untuk Abstrak Jurnal', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'evaluasi-teknik-stemming-pada-preprocessing-text-mining-untuk-abstrak-jurnal.html'),
(134, 'Tinjauan Metode Pengenalan Tulisan Tangan', 'Ingrid Nurtanio', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'tinjauan-metode-pengenalan-tulisan-tangan.html'),
(135, 'Desain Antena untuk Aplikasi Transmisi Daya Listrik Nirkabel', 'Intan Sari Areni', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'desain-antena-untuk-aplikasi-transmisi-daya-listrik-nirkabel.html'),
(136, 'Ekstraksi Fitur Logo pada Citra Badan Mobil', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'ekstraksi-fitur-logo-pada-citra-badan-mobil.html'),
(137, 'Klasifikasi Bertingkat untuk Deteksi Mobil', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'klasifikasi-bertingkat-untuk-deteksi-mobil.html'),
(138, 'Analisis Confusion Matrix Terhadap Deteksi Wajah Menggunakan HOG', 'Indrabayu', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'analisis-confusion-matrix-terhadap-deteksi-wajah-menggunakan-hog.html'),
(139, 'Pemodelan Citra Suhu Permukaan Benda dengan Quadcopter', 'Intan Sari Areni', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'pemodelan-citra-suhu-permukaan-benda-dengan-quadcopter.html'),
(140, 'Discrete Cosine Transform Untuk Dispersi Spektrum Suhu Permukaan Menggunakan Quadcopter', 'Intan Sari Areni', '', '', '', '', '', '', 2015, ' ', ' ', ' ', ' ', '', '', '', ' ', 'discrete-cosine-transform-untuk-dispersi-spektrum-suhu-permukaan-menggunakan-quadcopter.html'),
(141, 'Sistem Pakar Untuk diagnosa Penyakit Gigi Berbasis Website dinamis', 'Ingrid Nurtanio', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sistem-pakar-untuk-diagnosa-penyakit-gigi-berbasis-website-dinamis.html'),
(142, 'Prototipe Kluster Komputer Ekonomis dan Ramah Energi', 'Adnan', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'prototipe-kluster-komputer-ekonomis-dan-ramah-energi.html'),
(143, 'Perancangan dan Implementasi Aplikasi Single Singn-On (Sso) pada Portal Mahasiswa', 'Muhammad Niswar', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'perancangan-dan-implementasi-aplikasi-single-singn-on-(sso)-pada-portal-mahasiswa.html'),
(144, 'Pengembangan Application Programming Interface Untuk Layanan Data Sistem Informasi', 'Amil Ahmad Ilham', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'pengembangan-application-programming-interface-untuk-layanan-data-sistem-informasi.html'),
(145, 'Model Learning Management System (Lms) Metode Pembelajaran Homeschooling Untuk Remaja Berkebutuhan Khusus', 'Novy Nur R.A Mokobombang', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'model-learning-management-system-(lms)-metode-pembelajaran-homeschooling-untuk-remaja-berkebutuhan-khusus.html'),
(146, 'Game Edukatif Mathology Berbasis Android', 'Indrabayu', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'game-edukatif-mathology-berbasis-android.html'),
(147, 'Sistem Transpportasi cerdas sebagai solusi kota tumbuh dan pesat di Negara Berkembang', 'Indrabayu', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'sistem-transpportasi-cerdas-sebagai-solusi-kota-tumbuh-dan-pesat-di-negara-berkembang.html'),
(148, 'Impelementasi Sistem Pengaduan Masyarakat Berbasis Web dan Android pada Kota Makassar', 'Zahir Zainuddin', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'impelementasi-sistem-pengaduan-masyarakat-berbasis-web-dan-android-pada-kota-makassar.html'),
(149, 'Desain dan Imlementasi Teknologi Mobile Backend as a Service (Mbaas) pada Aplikasi Layanan Web ', 'Syahbuddin', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'desain-dan-imlementasi-teknologi-mobile-backend-as-a-service-(mbaas)-pada-aplikasi-layanan-web.html'),
(150, 'Desain Model Job Career Development Center Menggunakan Teknologi Object Oriented Programming dan Model View Controller ', 'Amil Ahmad Ilham', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'desain-model-job-career-development-center-menggunakan-teknologi-object-oriented-programming-dan-model-view-controller.html'),
(151, 'Smart Car Berbasis Smartphone Android', 'Yusia Hariyanto', '', '', '', '', '', '', 2016, ' ', ' ', ' ', ' ', '', '', '', ' ', 'smart-car-berbasis-smartphone-android.html');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian_anggota`
--

CREATE TABLE `penelitian_anggota` (
  `id` int(11) NOT NULL,
  `id_penelitian` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penelitian_anggota`
--

INSERT INTO `penelitian_anggota` (`id`, `id_penelitian`, `nama_dosen`) VALUES
(3, 59, 'Ansar Suyuti'),
(9, 60, 'Indrabayu'),
(11, 60, 'Tajuddin Waris'),
(21, 63, 'Zahir Zainuddin'),
(22, 63, 'Wardi'),
(23, 65, 'Faizal Arya Samman'),
(24, 65, 'Syafaruddin'),
(42, 76, 'Muhammad Niswar'),
(43, 76, 'Andani Ahmad'),
(44, 77, 'Ady Wahyudi Paundu'),
(45, 79, 'Indrabayu'),
(46, 82, 'Indrabayu'),
(47, 83, 'Asma'),
(48, 83, 'Elyas'),
(49, 84, 'Intan Sari Areni'),
(50, 84, 'Novy Nur R.A Mokobombang'),
(53, 87, 'Elyas'),
(54, 88, 'Elyas'),
(55, 88, 'Dewiani'),
(56, 91, 'Indrabayu'),
(57, 92, 'Indrabayu'),
(58, 94, 'Andani'),
(59, 94, 'Nur Idha , Anugrahyani , Burhanuddin M'),
(60, 96, 'Christoforus Yohannes'),
(61, 98, 'Indrabayu'),
(62, 99, 'Amil Ahmad Ilham'),
(63, 99, 'Intan Sari Areni'),
(64, 100, 'Amil Ahmad Ilham'),
(65, 100, 'Adnan'),
(66, 101, 'Elyas'),
(67, 101, 'Intan Sari Areni'),
(68, 102, 'Intan Sari Areni'),
(69, 103, 'Inggrid Nurtanio'),
(70, 103, 'Ansar Suyuti'),
(71, 104, 'Tsuromo Imamoto'),
(72, 104, 'Youshinebu Migami , Shiya Kobayashi'),
(73, 106, 'Tsuromo Imamoto'),
(74, 106, 'Youshinebu Migami, Shinya Kobayashi'),
(75, 108, 'Indrabayu'),
(76, 108, 'Novy Nur R.A Mokobombang'),
(77, 109, 'Intan Sari Areni'),
(78, 109, 'A. Ais Prayogi Alimuddin'),
(79, 110, 'Indrabayu'),
(80, 110, 'Ingrid Nurtanio'),
(81, 113, 'Intan Sari Areni'),
(82, 114, 'Amil Ahmad Ilham'),
(83, 114, 'Inggrid Nurtanio'),
(84, 115, 'Intan Sari Areni'),
(85, 115, 'Andani'),
(86, 119, 'Elyas'),
(87, 119, 'Dewiani'),
(88, 120, 'Wardi'),
(89, 120, 'Intan Sari Areni'),
(90, 125, 'Amil Ahmad Ilham'),
(91, 125, 'Santi'),
(92, 127, 'Intan Sari Areni'),
(93, 128, 'Intan Sari Areni'),
(94, 129, 'Intan Sari Areni'),
(95, 130, 'Intan Sari Areni'),
(96, 131, 'Intan Sari Areni'),
(97, 132, 'Intan Sari Areni'),
(98, 133, 'Intan Sari Areni'),
(99, 134, 'Indrabayu'),
(100, 135, 'Elyas'),
(101, 135, 'Merna Baharuddin '),
(102, 136, 'Ingrid Nurtanio'),
(103, 137, 'Intan Sari Areni'),
(104, 138, 'Intan Sari Areni'),
(105, 139, 'Indrabayu'),
(106, 139, ' '),
(107, 140, 'Indrabayu'),
(108, 141, 'Mukarramah Yusuf'),
(109, 141, 'Lika Purwanti , Naufal Khalil'),
(110, 142, 'Intan Sari Areni'),
(111, 144, 'Mukarramah Yusuf'),
(112, 145, 'Elly Warni'),
(113, 145, 'Greedy Nainggolan, Nur Fadhilah'),
(114, 146, 'Mukarramah Yusuf'),
(115, 146, 'A. Ais Prayogi Alimuddin'),
(116, 146, 'Rachmat Fajrin '),
(117, 146, 'Abdul Wahid'),
(118, 148, 'Amil Ahmad Ilham'),
(119, 148, 'Wahyuni'),
(120, 148, 'Bq Puspita Maulida'),
(121, 149, 'Amil Ahmad Ilham'),
(122, 149, 'Muhammad Niswar'),
(123, 150, 'Muhammad Niswar'),
(124, 150, 'Rahmat Hidayat Slamet'),
(125, 150, 'M Taufiqurrahman'),
(126, 151, 'Zahir Zainuddin'),
(127, 151, 'Amil Ahmad Ilham');

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian`
--

CREATE TABLE `pengabdian` (
  `id` int(11) NOT NULL,
  `judul_pengabdian` text NOT NULL,
  `ketua` varchar(150) NOT NULL,
  `anggota_1` varchar(150) NOT NULL,
  `anggota_2` varchar(150) NOT NULL,
  `anggota_3` varchar(150) NOT NULL,
  `anggota_4` varchar(150) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengabdian`
--

INSERT INTO `pengabdian` (`id`, `judul_pengabdian`, `ketua`, `anggota_1`, `anggota_2`, `anggota_3`, `anggota_4`, `tahun`, `sumber_dana`) VALUES
(1, 'Pelatihan Operasi Dan Instalasi Linux Sebagai Freeware Untuk Mengurangi Pembajakan Windows', 'Indrabayu', '', '', '', '', '2011', 'DIPA – UNHAS'),
(2, 'Instalasi Sistem Penerangan Cerdas Pada Usaha Kecil Dan Menengah', 'Indrabayu', '', '', '', '', '2014', 'BOPTN- UNHAS'),
(3, 'Percepatan Proses Ke Arah E- Government Di Kab. Tana Toraja Melalui Peningkatan Mutu Sdm Pengelolaan Situs Pemerintahan & Perencanaan Pembangunan.', '', '', '', '', '', '2014', 'BOPTN- UNHAS'),
(4, 'Technopreneur di Kelurahan Sumpang Binangae.', 'Indrabayu', '', '', '', '', '2015', 'mandiri'),
(5, '“Pengenalan Teknologi Augmented Reality pada Siswa”. Kegiatan tersebut akan diselenggarakan di SMA PGRI Sungguminasa Kabupaten Gowa.', 'Indrabayu', '', '', '', '', '2016', 'mandiri'),
(6, '“Pelatihan Software Interaktif Untuk Belajar Menyenangkan” di SDN 48 Pacing Kecamatan Awangpone Kabupaten Bone', 'Indrabayu', '', '', '', '', '2016', 'mandiri'),
(7, 'Perancangan dan Perbaikan Sistem Pembangkit Listrik Tenaga Surya di DusunParangparang, Desa Mangepong, Kecamatan Turatea, Kabupaten Jeneponto', '', '', '', '', '', '2016', 'LPPM - UNHAS'),
(8, 'Tecnopreneurship Short Workshop di SMA Negeri 2 Tinggi Moncong Kabupaten Gowa', 'Indrabayu', '', '', '', '', '2017', 'mandiri'),
(9, 'Belajar Matematika Dan Bahasa Inggris Dengan Metode Game Berbasis Android', '', '', '', '', '', '2017', 'LPPM- Unhas'),
(10, 'Edukasi Pemanfaatan Energi Surya Sebagai Energi Lingkungan pada Komunitas Sekolah Dasar', '', '', '', '', '', '2017', 'LPPM- Unhas');

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian_anggota`
--

CREATE TABLE `pengabdian_anggota` (
  `id` int(11) NOT NULL,
  `id_pengabdian` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengabdian_anggota`
--

INSERT INTO `pengabdian_anggota` (`id`, `id_pengabdian`, `nama_dosen`) VALUES
(3, 7, 'Indrabayu'),
(18, 11, 'Gassing'),
(19, 11, 'Yustinus Upa Sombolayuk'),
(20, 11, 'Ida Rachmaniar Sahali'),
(22, 11, 'Sri Mawar Said'),
(23, 12, 'Andani Ahmad'),
(24, 12, 'Gassing'),
(25, 12, 'Muhammad Niswar'),
(26, 13, 'Gassing'),
(27, 13, 'Andani Ahmad'),
(28, 13, 'Rhiza S.Sadjad'),
(29, 14, 'Muhammad Tola'),
(30, 14, 'Gassing'),
(31, 14, 'Andani Ahmad'),
(32, 14, 'Syafruddin Syarif'),
(33, 15, 'Sri Mawar Said'),
(34, 15, 'Novi Nur RA Mokokombang'),
(35, 16, 'contoh'),
(36, 16, 'Muhammad Niswar'),
(37, 16, 'Amil Ahmad Ilham'),
(38, 17, 'Gassing'),
(39, 11, 'contoh'),
(40, 18, 'Ingrid Nurtanio'),
(41, 18, 'Muhammad Niswar'),
(50, 25, 'Andani Ahmad'),
(51, 25, 'ini bukan gassing'),
(53, 26, 'Gassing'),
(54, 26, 'Ingrid Nurtanio'),
(56, 26, 'Rhiza S.Sadjad'),
(57, 26, 'Muhammad Tola'),
(73, 24, 'Indrabayu'),
(74, 28, 'dede'),
(75, 28, 'Yustinus Upa Sombolayuk'),
(76, 29, 'contoh'),
(77, 29, 'dede'),
(78, 29, 'didi'),
(79, 30, 'Andani Ahmad'),
(80, 30, 'Mukarramah Yusuf'),
(81, 30, 'liu239u42j3hkjhjhsdhfkjhsjdfsdfsdf'),
(82, 30, '233232323'),
(84, 30, 'Gassing'),
(85, 31, 'Novi Nur RA Mokokombang'),
(86, 31, 'Adnan'),
(90, 31, '456456456'),
(91, 31, '324234234'),
(93, 32, '123123123'),
(94, 32, 'contoh'),
(95, 33, '234234'),
(96, 33, '234234'),
(97, 33, '123'),
(98, 33, '123'),
(99, 33, '1111111111'),
(100, 33, 'Sri Mawar Said'),
(101, 33, '2333333333333'),
(102, 24, 'Ady Wahyudi Paundu'),
(103, 24, 'Mukarramah Yusuf'),
(104, 3, 'Indrabayu'),
(105, 9, 'Indrabayu'),
(106, 10, 'Indrabayu');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_nama_website` int(10) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `nama_website_en` varchar(150) NOT NULL,
  `header_id` varchar(100) NOT NULL,
  `header_en` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `footer` varchar(100) NOT NULL,
  `nama_domain` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(65) NOT NULL,
  `fax` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_nama_website`, `nama_website`, `nama_website_en`, `header_id`, `header_en`, `icon`, `footer`, `nama_domain`, `alamat`, `telepon`, `fax`, `email`) VALUES
(1, 'Departemen Teknik Informatika', 'Informatics Department', 'header.png', 'header_en.png', '', 'Teknik Informatika 2019', 'master', '<p>Alamat :</p>\r\n<p>Kampus 1. Jalan Perintis Kemerdekaan Km.10, Makassar;</p>\r\n<p>Kampus 2. Jln. Poros Malino Km.6, Gowa</p>\r\n<p>Telepon : 0411-588111</p>\r\n<p>Fax :0411-590125</p>\r\n<p>Email : informatika@unhas.ac.id</p>', '0411-588111', '0411-590125', 'informatika@unhas.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `nip` bigint(18) NOT NULL,
  `nama_pengelola` varchar(100) NOT NULL,
  `jabatan_pengelola` varchar(100) NOT NULL,
  `foto_pengelola` varchar(100) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`nip`, `nama_pengelola`, `jabatan_pengelola`, `foto_pengelola`, `blokir`) VALUES
(19701228, 'Robert Ratuan', 'Staf Akademik', '', 'N'),
(19741104, 'Sainuddin', 'Staf Akademik', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `link` varchar(155) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `bahasa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(100) NOT NULL,
  `ip_pengunjung` varchar(100) NOT NULL,
  `tanggal_pengunjung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `ip_pengunjung`, `tanggal_pengunjung`) VALUES
(857, '10.0.1.126', '2017-11-16'),
(858, '10.0.1.126', '2017-11-17'),
(859, '10.0.1.126', '2017-11-18'),
(860, '10.0.1.126', '2017-11-19'),
(861, '10.0.1.126', '2017-11-20'),
(862, '10.0.1.126', '2017-11-21'),
(863, '10.0.1.126', '2017-11-22'),
(864, '10.0.1.126', '2017-11-23'),
(865, '10.0.1.126', '2017-11-24'),
(866, '10.0.1.126', '2017-11-25'),
(867, '10.0.1.126', '2017-11-26'),
(868, '10.0.1.126', '2017-11-27'),
(869, '10.0.1.126', '2017-11-28'),
(870, '10.0.1.126', '2017-11-29'),
(871, '10.0.1.126', '2017-11-30'),
(872, '10.0.1.126', '2017-12-01'),
(873, '10.0.1.126', '2017-12-02'),
(874, '10.0.1.126', '2017-12-03'),
(875, '10.0.1.126', '2017-12-04'),
(876, '10.0.1.126', '2017-12-05'),
(877, '10.0.1.126', '2017-12-06'),
(878, '10.0.1.126', '2017-12-07'),
(879, '10.0.1.126', '2017-12-08'),
(880, '10.0.1.126', '2017-12-09'),
(881, '10.0.1.126', '2017-12-10'),
(882, '10.0.1.126', '2017-12-11'),
(883, '10.0.1.126', '2017-12-12'),
(884, '10.0.1.126', '2017-12-13'),
(885, '10.0.1.126', '2017-12-14'),
(886, '10.0.1.126', '2017-12-15'),
(887, '10.0.1.126', '2017-12-16'),
(888, '10.0.1.126', '2017-12-17'),
(889, '10.0.1.126', '2017-12-18'),
(890, '10.0.1.126', '2017-12-19'),
(891, '10.0.1.126', '2017-12-20'),
(892, '10.0.1.126', '2017-12-21'),
(893, '10.0.1.126', '2017-12-22'),
(894, '10.0.1.126', '2017-12-23'),
(895, '10.0.1.126', '2017-12-24'),
(896, '10.0.1.126', '2017-12-25'),
(897, '10.0.1.126', '2017-12-26'),
(898, '10.0.1.126', '2017-12-27'),
(899, '10.0.1.126', '2017-12-28'),
(900, '10.0.1.126', '2017-12-29'),
(901, '10.0.1.126', '2017-12-30'),
(902, '10.0.1.126', '2017-12-31'),
(903, '10.0.1.126', '2018-01-01'),
(904, '10.0.1.126', '2018-01-02'),
(905, '10.0.1.126', '2018-01-03'),
(906, '10.0.1.126', '2018-01-04'),
(907, '10.0.1.126', '2018-01-05'),
(908, '10.0.1.126', '2018-01-06'),
(909, '10.0.1.126', '2018-01-07'),
(910, '10.0.1.126', '2018-01-08'),
(911, '10.0.1.126', '2018-01-09'),
(912, '10.0.1.126', '2018-01-10'),
(913, '10.0.1.126', '2018-01-11'),
(914, '10.0.1.126', '2018-01-12'),
(915, '10.0.1.126', '2018-01-13'),
(916, '10.0.1.126', '2018-01-14'),
(917, '10.0.1.126', '2018-01-15'),
(918, '10.0.1.126', '2018-01-16'),
(919, '10.0.1.126', '2018-01-17'),
(920, '10.0.1.126', '2018-01-18'),
(921, '10.0.1.126', '2018-01-19'),
(922, '10.0.1.126', '2018-01-20'),
(923, '10.0.1.126', '2018-01-21'),
(924, '10.0.1.126', '2018-01-22'),
(925, '10.0.1.126', '2018-01-23'),
(926, '10.0.1.126', '2018-01-24'),
(927, '10.0.1.126', '2018-01-25'),
(928, '10.0.1.126', '2018-01-26'),
(929, '10.0.1.126', '2018-01-27'),
(930, '10.0.1.126', '2018-01-28'),
(931, '10.0.1.126', '2018-01-29'),
(932, '10.0.1.126', '2018-01-30'),
(933, '10.0.1.126', '2018-01-31'),
(934, '10.0.1.126', '2018-02-01'),
(935, '10.0.1.126', '2018-02-02'),
(936, '10.0.1.126', '2018-02-03'),
(937, '10.0.1.126', '2018-02-04'),
(938, '10.0.1.126', '2018-02-05'),
(939, '10.0.1.126', '2018-02-06'),
(940, '10.0.1.126', '2018-02-07'),
(941, '10.0.1.126', '2018-02-08'),
(942, '10.0.1.126', '2018-02-09'),
(943, '10.0.1.126', '2018-02-10'),
(944, '10.0.1.126', '2018-02-11'),
(945, '10.0.1.126', '2018-02-12'),
(946, '10.0.1.126', '2018-02-13'),
(947, '10.0.1.126', '2018-02-14'),
(948, '10.0.1.126', '2018-02-15'),
(949, '10.0.1.126', '2018-02-16'),
(950, '10.0.1.126', '2018-02-17'),
(951, '10.0.1.126', '2018-02-18'),
(952, '10.0.1.126', '2018-02-19'),
(953, '10.0.1.126', '2018-02-20'),
(954, '10.0.1.126', '2018-02-21'),
(955, '10.0.1.126', '2018-02-22'),
(956, '10.0.1.126', '2018-02-23'),
(957, '10.0.1.126', '2018-02-24'),
(958, '10.0.1.126', '2018-02-25'),
(959, '10.0.1.126', '2018-02-26'),
(960, '10.0.1.126', '2018-02-27'),
(961, '10.0.1.126', '2018-02-28'),
(962, '10.0.1.126', '2018-03-01'),
(963, '10.0.1.126', '2018-03-02'),
(964, '10.0.1.126', '2018-03-03'),
(965, '10.0.1.126', '2018-03-04'),
(966, '10.0.1.126', '2018-03-05'),
(967, '10.0.1.126', '2018-03-06'),
(968, '10.0.1.126', '2018-03-07'),
(969, '10.0.1.126', '2018-03-08'),
(970, '10.0.1.126', '2018-03-09'),
(971, '10.0.1.126', '2018-03-10'),
(972, '10.0.1.126', '2018-03-11'),
(973, '10.0.1.126', '2018-03-12'),
(974, '10.0.1.126', '2018-03-13'),
(975, '10.0.1.126', '2018-03-14'),
(976, '10.0.1.126', '2018-03-15'),
(977, '10.0.1.126', '2018-03-16'),
(978, '10.0.1.126', '2018-03-17'),
(979, '10.0.1.126', '2018-03-18'),
(980, '10.0.1.126', '2018-03-19'),
(981, '10.0.1.126', '2018-03-20'),
(982, '10.0.1.126', '2018-03-21'),
(983, '10.0.1.126', '2018-03-22'),
(984, '10.0.1.126', '2018-03-23'),
(985, '10.0.1.126', '2018-03-24'),
(986, '10.0.1.126', '2018-03-25'),
(987, '10.0.1.126', '2018-03-26'),
(988, '10.0.1.126', '2018-03-27'),
(989, '10.0.1.126', '2018-03-28'),
(990, '10.0.1.126', '2018-03-29'),
(991, '10.0.1.126', '2018-03-30'),
(992, '10.0.1.126', '2018-03-31'),
(993, '10.0.1.126', '2018-04-01'),
(994, '10.0.1.126', '2018-04-02'),
(995, '10.0.1.126', '2018-04-03'),
(996, '10.0.1.126', '2018-04-04'),
(997, '10.0.1.126', '2018-04-05'),
(998, '10.0.1.126', '2018-04-06'),
(999, '10.0.1.126', '2018-04-07'),
(1000, '10.0.1.126', '2018-04-08'),
(1001, '10.0.1.126', '2018-04-09'),
(1002, '10.0.1.126', '2018-04-10'),
(1003, '10.0.1.126', '2018-04-11'),
(1004, '10.0.1.126', '2018-04-12'),
(1005, '10.0.1.126', '2018-04-13'),
(1006, '10.0.1.126', '2018-04-14'),
(1007, '10.0.1.126', '2018-04-15'),
(1008, '10.0.1.126', '2018-04-16'),
(1009, '10.0.1.126', '2018-04-17'),
(1010, '10.0.1.126', '2018-04-18'),
(1011, '10.0.1.126', '2018-04-19'),
(1012, '10.0.1.126', '2018-04-20'),
(1013, '10.0.1.126', '2018-04-21'),
(1014, '10.0.1.126', '2018-04-22'),
(1015, '10.0.1.126', '2018-04-23'),
(1016, '10.0.1.126', '2018-04-24'),
(1017, '10.0.1.126', '2018-04-25'),
(1018, '10.0.1.126', '2018-04-26'),
(1019, '10.0.1.126', '2018-04-27'),
(1020, '10.0.1.126', '2018-04-28'),
(1021, '10.0.1.126', '2018-04-29'),
(1022, '10.0.1.126', '2018-04-30'),
(1023, '10.0.1.126', '2018-05-01'),
(1024, '10.0.1.126', '2018-05-02'),
(1025, '10.0.1.126', '2018-05-03'),
(1026, '10.0.1.126', '2018-05-04'),
(1027, '10.0.1.126', '2018-05-05'),
(1028, '10.0.1.126', '2018-05-06'),
(1029, '10.0.1.126', '2018-05-07'),
(1030, '10.0.1.126', '2018-05-08'),
(1031, '10.0.1.126', '2018-05-09'),
(1032, '10.0.1.126', '2018-05-10'),
(1033, '10.0.1.126', '2018-05-11'),
(1034, '10.0.1.126', '2018-05-12'),
(1035, '10.0.1.126', '2018-05-13'),
(1036, '10.0.1.126', '2018-05-14'),
(1037, '10.0.1.126', '2018-05-14'),
(1038, '10.0.1.126', '2018-05-15'),
(1039, '10.0.1.126', '2018-05-16'),
(1040, '10.0.1.126', '2018-05-17'),
(1041, '10.0.1.126', '2018-05-18'),
(1042, '10.0.1.126', '2018-05-19'),
(1043, '10.0.1.126', '2018-05-20'),
(1044, '10.0.1.126', '2018-05-21'),
(1045, '10.0.1.126', '2018-05-22'),
(1046, '10.0.1.126', '2018-05-23'),
(1047, '10.0.1.126', '2018-05-24'),
(1048, '10.0.1.126', '2018-05-25'),
(1049, '10.0.1.126', '2018-05-26'),
(1050, '10.0.1.126', '2018-05-27'),
(1051, '10.0.1.126', '2018-05-28'),
(1052, '10.0.1.126', '2018-05-29'),
(1053, '10.0.1.126', '2018-05-30'),
(1054, '10.0.1.126', '2018-05-31'),
(1055, '10.0.1.126', '2018-06-01'),
(1056, '10.0.1.126', '2018-06-02'),
(1057, '10.0.1.126', '2018-06-03'),
(1058, '10.0.1.126', '2018-06-04'),
(1059, '10.0.1.126', '2018-06-05'),
(1060, '10.0.1.126', '2018-06-06'),
(1061, '10.0.1.126', '2018-06-07'),
(1062, '10.0.1.126', '2018-06-08'),
(1063, '10.0.1.126', '2018-06-09'),
(1064, '10.0.1.126', '2018-06-10'),
(1065, '10.0.1.126', '2018-06-11'),
(1066, '10.0.1.126', '2018-06-12'),
(1067, '10.0.1.126', '2018-06-13'),
(1068, '10.0.1.126', '2018-06-14'),
(1069, '10.0.1.126', '2018-06-15'),
(1070, '10.0.1.126', '2018-06-16'),
(1071, '10.0.1.126', '2018-06-17'),
(1072, '10.0.1.126', '2018-06-18'),
(1073, '10.0.1.126', '2018-06-19'),
(1074, '10.0.1.126', '2018-06-20'),
(1075, '10.0.1.126', '2018-06-21'),
(1076, '10.0.1.126', '2018-06-22'),
(1077, '10.0.1.126', '2018-06-23'),
(1078, '10.0.1.126', '2018-06-24'),
(1079, '10.0.1.126', '2018-06-25'),
(1080, '10.0.1.126', '2018-06-26'),
(1081, '10.0.1.126', '2018-06-27'),
(1082, '10.0.1.126', '2018-06-28'),
(1083, '10.0.1.126', '2018-06-29'),
(1084, '10.0.1.126', '2018-06-30'),
(1085, '10.0.1.126', '2018-07-01'),
(1086, '10.0.1.126', '2018-07-02'),
(1087, '10.0.1.126', '2018-07-03'),
(1088, '10.0.1.126', '2018-07-04'),
(1089, '10.0.1.126', '2018-07-05'),
(1090, '10.0.1.126', '2018-07-06'),
(1091, '10.0.1.126', '2018-07-07'),
(1092, '10.0.1.126', '2018-07-08'),
(1093, '10.0.1.126', '2018-07-09'),
(1094, '10.0.1.126', '2018-07-10'),
(1095, '10.0.1.126', '2018-07-11'),
(1096, '10.0.1.126', '2018-07-12'),
(1097, '10.0.1.126', '2018-07-13'),
(1098, '10.0.1.126', '2018-07-14'),
(1099, '10.0.1.126', '2018-07-15'),
(1100, '10.0.1.126', '2018-07-16'),
(1101, '10.0.1.126', '2018-07-17'),
(1102, '10.0.1.126', '2018-07-18'),
(1103, '10.0.1.126', '2018-07-19'),
(1104, '10.0.1.126', '2018-07-20'),
(1105, '10.0.1.126', '2018-07-21'),
(1106, '10.0.1.126', '2018-07-22'),
(1107, '10.0.1.126', '2018-07-23'),
(1108, '10.0.1.126', '2018-07-24'),
(1109, '10.0.1.126', '2018-07-25'),
(1110, '10.0.1.126', '2018-07-26'),
(1111, '10.0.1.126', '2018-07-27'),
(1112, '10.0.1.126', '2018-07-28'),
(1113, '10.0.1.126', '2018-07-29'),
(1114, '10.0.1.126', '2018-07-30'),
(1115, '10.0.1.126', '2018-07-31'),
(1116, '10.0.1.126', '2018-08-01'),
(1117, '10.0.1.126', '2018-08-02'),
(1118, '10.0.1.126', '2018-08-03'),
(1119, '10.0.1.126', '2018-08-04'),
(1120, '10.0.1.126', '2018-08-05'),
(1121, '10.0.1.126', '2018-08-06'),
(1122, '10.0.1.126', '2018-08-07'),
(1123, '10.0.1.126', '2018-08-08'),
(1124, '10.0.1.126', '2018-08-09'),
(1125, '10.0.1.126', '2018-08-10'),
(1126, '10.0.1.126', '2018-08-11'),
(1127, '10.0.1.126', '2018-08-12'),
(1128, '10.0.1.126', '2018-08-13'),
(1129, '10.0.1.126', '2018-08-14'),
(1130, '10.0.1.126', '2018-08-15'),
(1131, '10.0.1.126', '2018-08-16'),
(1132, '10.0.1.126', '2018-08-17'),
(1133, '10.0.1.126', '2018-08-18'),
(1134, '10.0.1.126', '2018-08-19'),
(1135, '10.0.1.126', '2018-08-20'),
(1136, '10.0.1.126', '2018-08-21'),
(1137, '10.0.1.126', '2018-08-22'),
(1138, '10.0.1.126', '2018-08-23'),
(1139, '10.0.1.126', '2018-08-24'),
(1140, '10.0.1.126', '2018-08-25'),
(1141, '10.0.1.126', '2018-08-26'),
(1142, '10.0.1.126', '2018-08-27'),
(1143, '10.0.1.126', '2018-08-28'),
(1144, '10.0.1.126', '2018-08-29'),
(1145, '10.0.1.126', '2018-08-30'),
(1146, '10.0.1.126', '2018-08-31'),
(1147, '10.0.1.126', '2018-09-01'),
(1148, '10.0.1.126', '2018-09-02'),
(1149, '10.0.1.126', '2018-09-03'),
(1150, '10.0.1.126', '2018-09-04'),
(1151, '10.0.1.126', '2018-09-05'),
(1152, '10.0.1.126', '2018-09-06'),
(1153, '10.0.1.126', '2018-09-07'),
(1154, '10.0.1.126', '2018-09-09'),
(1155, '10.0.1.126', '2018-09-10'),
(1156, '10.0.1.126', '2018-09-11'),
(1157, '10.0.1.126', '2018-09-12'),
(1158, '10.0.1.126', '2018-09-13'),
(1159, '10.0.1.126', '2018-09-14'),
(1160, '10.0.1.126', '2018-09-15'),
(1161, '10.0.1.126', '2018-09-16'),
(1162, '10.0.1.126', '2018-09-17'),
(1163, '10.0.1.126', '2018-09-18'),
(1164, '10.0.1.126', '2018-09-19'),
(1165, '10.0.1.126', '2018-09-20'),
(1166, '10.0.1.126', '2018-09-21'),
(1167, '10.0.1.126', '2018-09-22'),
(1168, '10.0.1.126', '2018-09-23'),
(1169, '10.0.1.126', '2018-09-24'),
(1170, '10.0.1.126', '2018-09-25'),
(1171, '10.0.1.126', '2018-09-26'),
(1172, '10.0.1.126', '2018-09-27'),
(1173, '10.0.1.126', '2018-09-28'),
(1174, '10.0.1.126', '2018-09-29'),
(1175, '10.0.1.126', '2018-09-30'),
(1176, '10.0.1.126', '2018-10-01'),
(1177, '10.0.1.126', '2018-10-02'),
(1178, '10.0.1.126', '2018-10-03'),
(1179, '10.0.1.126', '2018-10-04'),
(1180, '10.0.1.126', '2018-10-05'),
(1181, '10.0.1.126', '2018-10-06'),
(1182, '10.0.1.126', '2018-10-07'),
(1183, '10.0.1.126', '2018-10-08'),
(1184, '10.0.1.126', '2018-10-09'),
(1185, '10.0.1.126', '2018-10-10'),
(1186, '10.0.1.126', '2018-10-11'),
(1187, '10.0.1.126', '2018-10-12'),
(1188, '10.0.1.126', '2018-10-13'),
(1189, '10.0.1.126', '2018-10-14'),
(1190, '10.0.1.126', '2018-10-15'),
(1191, '10.0.1.126', '2018-10-16'),
(1192, '10.0.1.126', '2018-10-17'),
(1193, '10.0.1.126', '2018-10-18'),
(1194, '10.0.1.126', '2018-10-19'),
(1195, '10.0.1.126', '2018-10-20'),
(1196, '10.0.1.126', '2018-10-21'),
(1197, '10.0.1.126', '2018-10-22'),
(1198, '10.0.1.126', '2018-10-23'),
(1199, '10.0.1.126', '2018-10-24'),
(1200, '10.0.1.126', '2018-10-25'),
(1201, '10.0.1.126', '2018-10-26'),
(1202, '10.0.1.126', '2018-10-27'),
(1203, '10.0.1.126', '2018-10-28'),
(1204, '10.0.1.126', '2018-10-29'),
(1205, '10.0.1.126', '2018-10-30'),
(1206, '10.0.1.126', '2018-10-31'),
(1207, '10.0.1.126', '2018-11-01'),
(1208, '10.0.1.126', '2018-11-02'),
(1209, '10.0.1.126', '2018-11-03'),
(1210, '10.0.1.126', '2018-11-04'),
(1211, '10.0.1.126', '2018-11-05'),
(1212, '10.0.1.126', '2018-11-06'),
(1213, '10.0.1.126', '2018-11-07'),
(1214, '10.0.1.126', '2018-11-08'),
(1215, '10.0.1.126', '2018-11-09'),
(1216, '10.0.1.126', '2018-11-10'),
(1217, '10.0.1.126', '2018-11-11'),
(1218, '10.0.1.126', '2018-11-12'),
(1219, '10.0.1.126', '2018-11-13'),
(1220, '10.0.1.126', '2018-11-14'),
(1221, '10.0.1.126', '2018-11-15'),
(1222, '10.0.1.126', '2018-11-16'),
(1223, '10.0.1.126', '2018-11-17'),
(1224, '10.0.1.126', '2018-11-18'),
(1225, '10.0.1.126', '2018-11-19'),
(1226, '10.0.1.126', '2018-11-20'),
(1227, '10.0.1.126', '2018-11-21'),
(1228, '10.0.1.126', '2018-11-22'),
(1229, '10.0.1.126', '2018-11-23'),
(1230, '10.0.1.126', '2018-11-24'),
(1231, '10.0.1.126', '2018-11-25'),
(1232, '10.0.1.126', '2018-11-26'),
(1233, '10.0.1.126', '2018-11-27'),
(1234, '10.0.1.126', '2018-11-28'),
(1235, '10.0.1.126', '2018-11-29'),
(1236, '10.0.1.126', '2018-11-30'),
(1237, '10.0.1.126', '2018-12-05'),
(1238, '10.0.1.126', '2018-12-07'),
(1239, '10.0.1.126', '2018-12-08'),
(1240, '10.0.1.126', '2018-12-09'),
(1241, '10.0.1.126', '2018-12-10'),
(1242, '10.0.1.126', '2018-12-11'),
(1243, '10.0.1.126', '2018-12-12'),
(1244, '10.0.1.126', '2018-12-13'),
(1245, '10.0.1.126', '2018-12-14'),
(1246, '10.0.1.126', '2018-12-15'),
(1247, '10.0.1.126', '2018-12-16'),
(1248, '10.0.1.126', '2018-12-17'),
(1249, '10.0.1.126', '2018-12-19'),
(1250, '10.0.1.126', '2018-12-20'),
(1251, '10.0.1.126', '2018-12-21'),
(1252, '10.0.1.126', '2018-12-22'),
(1253, '10.0.1.126', '2018-12-23'),
(1254, '10.110.10.32', '2019-01-15'),
(1255, '10.110.10.32', '2019-01-16'),
(1256, '10.110.10.32', '2019-01-17'),
(1257, '10.110.10.32', '2019-01-18'),
(1258, '10.110.10.32', '2019-01-19'),
(1259, '10.110.10.32', '2019-01-20'),
(1260, '10.110.10.32', '2019-01-21'),
(1261, '10.110.10.32', '2019-01-22'),
(1262, '10.110.10.32', '2019-01-23'),
(1263, '10.110.10.32', '2019-01-24'),
(1264, '10.110.10.32', '2019-01-25'),
(1265, '10.110.10.32', '2019-01-26'),
(1266, '10.110.10.32', '2019-01-27'),
(1267, '10.110.10.32', '2019-01-28'),
(1268, '10.110.10.32', '2019-01-29'),
(1269, '10.110.10.32', '2019-01-30'),
(1270, '10.110.10.32', '2019-01-31'),
(1271, '10.110.10.32', '2019-02-01'),
(1272, '10.110.10.32', '2019-02-02'),
(1273, '10.110.10.32', '2019-02-03'),
(1274, '10.110.10.32', '2019-02-04'),
(1275, '10.110.10.32', '2019-02-05'),
(1276, '10.110.10.32', '2019-02-06'),
(1277, '10.110.10.32', '2019-02-07'),
(1278, '10.110.10.32', '2019-02-08'),
(1279, '10.110.10.32', '2019-02-09'),
(1280, '10.110.10.32', '2019-02-10'),
(1281, '10.110.10.32', '2019-02-11'),
(1282, '10.110.10.32', '2019-02-12'),
(1283, '10.110.10.32', '2019-02-13'),
(1284, '10.110.10.32', '2019-02-14'),
(1285, '10.110.10.32', '2019-02-15'),
(1286, '10.110.10.32', '2019-02-16'),
(1287, '10.110.10.32', '2019-02-17'),
(1288, '10.110.10.32', '2019-02-18'),
(1289, '10.110.10.32', '2019-02-19'),
(1290, '10.110.10.32', '2019-02-20'),
(1291, '10.110.10.32', '2019-02-21'),
(1292, '10.110.10.32', '2019-02-22'),
(1293, '10.110.10.32', '2019-02-23'),
(1294, '10.110.10.32', '2019-02-24'),
(1295, '10.110.10.32', '2019-02-25'),
(1296, '10.110.10.32', '2019-02-26'),
(1297, '10.110.10.32', '2019-02-27'),
(1298, '10.110.10.32', '2019-02-28'),
(1299, '10.110.10.32', '2019-03-01'),
(1300, '10.110.10.32', '2019-03-02'),
(1301, '10.110.10.32', '2019-03-03'),
(1302, '10.110.10.32', '2019-03-04'),
(1303, '10.110.10.32', '2019-03-05'),
(1304, '10.110.10.32', '2019-03-06'),
(1305, '10.110.10.32', '2019-03-07'),
(1306, '10.110.10.32', '2019-03-08'),
(1307, '10.110.10.32', '2019-03-09'),
(1308, '10.110.10.32', '2019-03-10'),
(1309, '10.110.10.32', '2019-03-11'),
(1310, '10.110.10.32', '2019-03-12'),
(1311, '10.110.10.32', '2019-03-13'),
(1312, '10.110.10.32', '2019-03-14'),
(1313, '10.110.10.32', '2019-03-15'),
(1314, '10.110.10.32', '2019-03-16'),
(1315, '10.110.10.32', '2019-03-17'),
(1316, '10.110.10.32', '2019-03-18'),
(1317, '10.110.10.32', '2019-03-19'),
(1318, '10.110.10.32', '2019-03-20'),
(1319, '10.110.10.32', '2019-03-21'),
(1320, '10.110.10.32', '2019-03-22'),
(1321, '10.110.10.32', '2019-03-23'),
(1322, '10.110.10.32', '2019-03-24'),
(1323, '10.110.10.32', '2019-03-25'),
(1324, '10.110.10.32', '2019-03-26'),
(1325, '10.110.10.32', '2019-03-27'),
(1326, '10.110.10.32', '2019-03-28'),
(1327, '10.110.10.32', '2019-03-29'),
(1328, '10.110.10.32', '2019-03-30'),
(1329, '10.110.10.32', '2019-03-31'),
(1330, '10.110.10.32', '2019-04-01'),
(1331, '10.110.10.32', '2019-04-02'),
(1332, '10.110.10.32', '2019-04-03'),
(1333, '10.110.10.32', '2019-04-04'),
(1334, '10.110.10.32', '2019-04-05'),
(1335, '10.110.10.32', '2019-04-06'),
(1336, '10.110.10.32', '2019-04-07'),
(1337, '10.110.10.32', '2019-04-08'),
(1338, '10.110.10.32', '2019-04-09'),
(1339, '10.110.10.32', '2019-04-10'),
(1340, '10.110.10.32', '2019-04-11'),
(1341, '10.110.10.32', '2019-04-12'),
(1342, '10.110.10.32', '2019-04-13'),
(1343, '10.110.10.32', '2019-04-14'),
(1344, '10.110.10.32', '2019-04-15'),
(1345, '10.110.10.32', '2019-04-16'),
(1346, '10.110.10.32', '2019-04-17'),
(1347, '10.110.10.32', '2019-04-18'),
(1348, '10.110.10.32', '2019-04-19'),
(1349, '10.110.10.32', '2019-04-20'),
(1350, '10.110.10.32', '2019-04-21'),
(1351, '10.110.10.32', '2019-04-22'),
(1352, '10.110.10.32', '2019-04-23'),
(1353, '10.110.10.32', '2019-04-24'),
(1354, '10.110.10.32', '2019-04-25'),
(1355, '10.110.10.32', '2019-04-26'),
(1356, '10.110.10.32', '2019-04-27'),
(1357, '10.110.10.32', '2019-04-28'),
(1358, '10.110.10.32', '2019-04-29'),
(1359, '10.110.10.32', '2019-04-30'),
(1360, '10.110.10.32', '2019-05-01'),
(1361, '10.110.10.32', '2019-05-02'),
(1362, '10.110.10.32', '2019-05-03'),
(1363, '10.110.10.32', '2019-05-04'),
(1364, '10.110.10.32', '2019-05-05'),
(1365, '10.110.10.32', '2019-05-06'),
(1366, '10.110.10.32', '2019-05-07'),
(1367, '10.110.10.32', '2019-05-08'),
(1368, '10.110.10.32', '2019-05-09'),
(1369, '10.110.10.32', '2019-05-10'),
(1370, '10.110.10.32', '2019-05-11'),
(1371, '10.110.10.32', '2019-05-12'),
(1372, '10.110.10.32', '2019-05-13'),
(1373, '10.110.10.32', '2019-05-14'),
(1374, '10.110.10.32', '2019-05-15'),
(1375, '10.110.10.32', '2019-05-16'),
(1376, '10.110.10.32', '2019-05-17'),
(1377, '10.110.10.32', '2019-05-18'),
(1378, '10.110.10.32', '2019-05-19'),
(1379, '10.110.10.32', '2019-05-20'),
(1380, '10.110.10.32', '2019-05-21'),
(1381, '10.110.10.32', '2019-05-22'),
(1382, '10.110.10.32', '2019-05-23'),
(1383, '10.110.10.32', '2019-05-24'),
(1384, '10.110.10.32', '2019-05-25'),
(1385, '10.110.10.32', '2019-05-26'),
(1386, '10.110.10.32', '2019-05-27'),
(1387, '10.110.10.32', '2019-05-28'),
(1388, '10.110.10.32', '2019-05-29'),
(1389, '10.110.10.32', '2019-05-30'),
(1390, '10.110.10.32', '2019-05-31'),
(1391, '10.110.10.32', '2019-06-01'),
(1392, '10.110.10.32', '2019-06-02'),
(1393, '10.110.10.32', '2019-06-03'),
(1394, '10.110.10.32', '2019-06-04'),
(1395, '10.110.10.32', '2019-06-05'),
(1396, '10.110.10.32', '2019-06-11'),
(1397, '10.110.10.32', '2019-06-12'),
(1398, '10.110.10.32', '2019-06-13'),
(1399, '10.110.10.32', '2019-06-14'),
(1400, '10.110.10.32', '2019-06-15'),
(1401, '10.110.10.32', '2019-06-16'),
(1402, '10.110.10.32', '2019-06-17'),
(1403, '10.110.10.32', '2019-06-18'),
(1404, '10.110.10.32', '2019-06-19'),
(1405, '10.110.10.32', '2019-06-20'),
(1406, '10.110.10.32', '2019-06-21'),
(1407, '10.110.10.32', '2019-06-22'),
(1408, '10.110.10.32', '2019-06-23'),
(1409, '10.110.10.32', '2019-06-24'),
(1410, '10.110.10.32', '2019-06-25'),
(1411, '10.110.10.32', '2019-06-26'),
(1412, '10.110.10.32', '2019-06-27'),
(1413, '10.110.10.32', '2019-06-28'),
(1414, '10.110.10.32', '2019-06-29'),
(1415, '10.110.10.32', '2019-06-30'),
(1416, '10.110.10.32', '2019-07-01'),
(1417, '10.110.10.32', '2019-07-02'),
(1418, '10.110.10.32', '2019-07-03'),
(1419, '10.110.10.32', '2019-07-04'),
(1420, '10.110.10.32', '2019-07-05'),
(1421, '10.110.10.32', '2019-07-06'),
(1422, '10.110.10.32', '2019-07-07'),
(1423, '10.110.10.32', '2019-07-08'),
(1424, '10.110.10.32', '2019-07-09'),
(1425, '10.110.10.32', '2019-07-10'),
(1426, '10.110.10.32', '2019-07-11'),
(1427, '10.110.10.32', '2019-07-12'),
(1428, '10.110.10.32', '2019-07-13'),
(1429, '10.110.10.32', '2019-07-14'),
(1430, '10.110.10.32', '2019-07-15'),
(1431, '10.110.10.32', '2019-07-16'),
(1432, '10.110.10.32', '2019-07-17'),
(1433, '10.110.10.32', '2019-07-18'),
(1434, '10.110.10.32', '2019-07-19'),
(1435, '10.110.10.32', '2019-07-20'),
(1436, '10.110.10.32', '2019-07-21'),
(1437, '10.110.10.32', '2019-07-22'),
(1438, '10.110.10.32', '2019-07-23'),
(1439, '10.110.10.32', '2019-07-24'),
(1440, '10.110.10.32', '2019-07-25'),
(1441, '10.110.10.32', '2019-07-26'),
(1442, '10.110.10.32', '2019-07-27'),
(1443, '10.110.10.32', '2019-07-28'),
(1444, '10.110.10.32', '2019-07-29'),
(1445, '10.110.10.32', '2019-07-30'),
(1446, '10.110.10.32', '2019-07-31'),
(1447, '10.110.10.32', '2019-08-01'),
(1448, '10.110.10.32', '2019-08-02'),
(1449, '10.110.10.32', '2019-08-03'),
(1450, '10.110.10.32', '2019-08-04'),
(1451, '10.110.10.32', '2019-08-05'),
(1452, '10.110.10.32', '2019-08-06'),
(1453, '10.110.10.32', '2019-08-07'),
(1454, '10.110.10.32', '2019-08-08'),
(1455, '10.110.10.32', '2019-08-09'),
(1456, '10.110.10.32', '2019-08-10'),
(1457, '10.110.10.32', '2019-08-11'),
(1458, '10.110.10.32', '2019-08-12'),
(1459, '10.110.10.32', '2019-08-13'),
(1460, '10.110.10.32', '2019-08-14'),
(1461, '10.110.10.32', '2019-08-15'),
(1462, '10.110.10.32', '2019-08-16'),
(1463, '10.110.10.32', '2019-08-17'),
(1464, '10.110.10.32', '2019-08-18'),
(1465, '10.110.10.32', '2019-08-19'),
(1466, '10.110.10.32', '2019-08-20'),
(1467, '10.110.10.32', '2019-08-21'),
(1468, '10.110.10.32', '2019-08-22'),
(1469, '10.110.10.32', '2019-08-23'),
(1470, '10.110.10.32', '2019-08-24'),
(1471, '10.110.10.32', '2019-08-25'),
(1472, '10.110.10.32', '2019-08-26'),
(1473, '10.110.10.32', '2019-08-27'),
(1474, '10.110.10.32', '2019-08-28'),
(1475, '10.110.10.32', '2019-08-29'),
(1476, '10.110.10.32', '2019-08-30'),
(1477, '10.110.10.32', '2019-08-31'),
(1478, '10.110.10.32', '2019-09-01'),
(1479, '10.110.10.32', '2019-09-02'),
(1480, '10.110.10.32', '2019-09-03'),
(1481, '10.110.10.32', '2019-09-04'),
(1482, '10.110.10.32', '2019-09-05'),
(1483, '10.110.10.32', '2019-09-06'),
(1484, '10.110.10.32', '2019-09-07'),
(1485, '10.110.10.32', '2019-09-08'),
(1486, '10.110.10.32', '2019-09-09'),
(1487, '10.110.10.32', '2019-09-10'),
(1488, '10.110.10.32', '2019-09-11'),
(1489, '10.110.10.32', '2019-09-12'),
(1490, '10.110.10.32', '2019-09-13'),
(1491, '10.110.10.32', '2019-09-14'),
(1492, '10.110.10.32', '2019-09-15'),
(1493, '10.110.10.32', '2019-09-16'),
(1494, '10.110.10.32', '2019-09-17'),
(1495, '10.110.10.32', '2019-09-18'),
(1496, '10.110.10.32', '2019-09-19'),
(1497, '10.110.10.32', '2019-09-20'),
(1498, '10.110.10.32', '2019-09-21'),
(1499, '10.110.10.32', '2019-09-22'),
(1500, '10.110.10.32', '2019-09-23'),
(1501, '10.110.10.32', '2019-09-24'),
(1502, '10.110.10.32', '2019-09-25'),
(1503, '10.110.10.32', '2019-09-26'),
(1504, '10.110.10.32', '2019-09-27'),
(1505, '10.110.10.32', '2019-09-28'),
(1506, '10.110.10.32', '2019-09-29'),
(1507, '10.110.10.32', '2019-09-30'),
(1508, '10.110.10.32', '2019-10-01'),
(1509, '10.110.10.32', '2019-10-02'),
(1510, '10.110.10.32', '2019-10-03'),
(1511, '10.110.10.32', '2019-10-04'),
(1512, '10.110.10.32', '2019-10-05'),
(1513, '10.110.10.32', '2019-10-06'),
(1514, '10.110.10.32', '2019-10-07'),
(1515, '10.110.10.32', '2019-10-08'),
(1516, '10.110.10.32', '2019-10-09'),
(1517, '10.110.10.32', '2019-10-10'),
(1518, '10.110.10.32', '2019-10-11'),
(1519, '10.110.10.32', '2019-10-12'),
(1520, '10.110.10.32', '2019-10-13'),
(1521, '10.110.10.32', '2019-10-14'),
(1522, '10.110.10.32', '2019-10-15'),
(1523, '10.110.10.32', '2019-10-16'),
(1524, '10.110.10.32', '2019-10-17'),
(1525, '10.110.10.32', '2019-10-18'),
(1526, '10.110.10.32', '2019-10-19'),
(1527, '10.110.10.32', '2019-10-20'),
(1528, '10.110.10.32', '2019-10-21'),
(1529, '10.110.10.32', '2019-10-22'),
(1530, '10.110.10.32', '2019-10-23'),
(1531, '10.110.10.32', '2019-10-24'),
(1532, '10.110.10.32', '2019-10-25'),
(1533, '10.110.10.32', '2019-10-26'),
(1534, '10.110.10.32', '2019-10-27'),
(1535, '10.110.10.32', '2019-10-28'),
(1536, '10.110.10.32', '2019-10-29'),
(1537, '10.110.10.32', '2019-10-30'),
(1538, '10.110.10.32', '2019-10-31'),
(1539, '10.110.10.32', '2019-11-01'),
(1540, '10.110.10.32', '2019-11-02'),
(1541, '10.110.10.32', '2019-11-03'),
(1542, '10.110.10.32', '2019-11-04'),
(1543, '10.110.10.32', '2019-11-05'),
(1544, '10.110.10.32', '2019-11-06'),
(1545, '10.110.10.32', '2019-11-07'),
(1546, '10.110.10.32', '2019-11-08'),
(1547, '10.110.10.32', '2019-11-09'),
(1548, '10.110.10.32', '2019-11-10'),
(1549, '10.110.10.32', '2019-11-11'),
(1550, '10.110.10.32', '2019-11-12'),
(1551, '10.110.10.32', '2019-11-13'),
(1552, '10.110.10.32', '2019-11-14'),
(1553, '10.110.10.32', '2019-11-15'),
(1554, '10.110.10.32', '2019-11-16'),
(1555, '10.110.10.32', '2019-11-17'),
(1556, '10.110.10.32', '2019-11-18'),
(1557, '10.110.10.32', '2019-11-19'),
(1558, '10.110.10.32', '2019-11-20'),
(1559, '10.110.10.32', '2019-11-21'),
(1560, '10.110.10.32', '2019-11-22'),
(1561, '10.110.10.32', '2019-11-23'),
(1562, '10.110.10.32', '2019-11-26'),
(1563, '10.110.10.32', '2019-11-27'),
(1564, '10.110.10.32', '2019-11-28'),
(1565, '10.110.10.32', '2019-11-29'),
(1566, '10.110.10.32', '2019-11-30'),
(1567, '10.110.10.32', '2019-12-01'),
(1568, '10.110.10.32', '2019-12-02'),
(1569, '10.110.10.32', '2019-12-03'),
(1570, '10.110.10.32', '2019-12-04'),
(1571, '10.110.10.32', '2019-12-05'),
(1572, '10.110.10.32', '2019-12-06'),
(1573, '10.110.10.32', '2019-12-07'),
(1574, '10.110.10.32', '2019-12-08'),
(1575, '10.110.10.32', '2019-12-09'),
(1576, '10.110.10.32', '2019-12-10'),
(1577, '10.110.10.32', '2019-12-11'),
(1578, '10.110.10.32', '2019-12-12'),
(1579, '10.110.10.32', '2019-12-13'),
(1580, '10.110.10.32', '2019-12-16'),
(1581, '10.110.10.32', '2019-12-17'),
(1582, '10.110.10.32', '2019-12-18'),
(1583, '10.110.10.32', '2019-12-19'),
(1584, '10.110.10.32', '2019-12-20'),
(1585, '10.110.10.32', '2019-12-21'),
(1586, '10.110.10.32', '2019-12-22'),
(1587, '10.110.10.32', '2019-12-23'),
(1588, '10.110.10.32', '2019-12-24'),
(1589, '10.110.10.32', '2019-12-25'),
(1590, '10.110.10.32', '2019-12-26'),
(1591, '10.110.10.32', '2019-12-27'),
(1592, '10.110.10.32', '2019-12-28'),
(1593, '10.110.10.32', '2019-12-29'),
(1594, '10.110.10.32', '2019-12-30'),
(1595, '10.110.10.32', '2019-12-31'),
(1596, '10.110.10.32', '2020-01-01'),
(1597, '10.110.10.32', '2020-01-02'),
(1598, '10.110.10.32', '2020-01-03'),
(1599, '10.110.10.32', '2020-01-04'),
(1600, '10.110.10.32', '2020-01-05'),
(1601, '10.110.10.32', '2020-01-06'),
(1602, '10.110.10.32', '2020-01-07'),
(1603, '10.110.10.32', '2020-01-08'),
(1604, '10.110.10.32', '2020-01-09'),
(1605, '10.110.10.32', '2020-01-10'),
(1606, '10.110.10.32', '2020-01-11'),
(1607, '10.110.10.32', '2020-01-12'),
(1608, '10.110.10.32', '2020-01-13'),
(1609, '10.110.10.32', '2020-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_dosen`
--

CREATE TABLE `publikasi_dosen` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `oleh` varchar(200) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `nip` varchar(65) NOT NULL,
  `link` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi_dosen`
--

INSERT INTO `publikasi_dosen` (`id`, `judul`, `deskripsi`, `nama_file`, `oleh`, `tahun`, `nip`, `link`) VALUES
(10, 'Pengembangan Sistem Pemantau Kesehatan Pasien Menggunakan Sensor Nirkabel', 'Prosiding e-Indonesia Initiatives Forum 9, 2013. ISBN 978-979-16338-5-7. 23-24 Mei 2013, ITB Bandung.', '', 'Amil Ahmad Ilham', '2013', '', ''),
(35, 'A Multivariate Autoregressive Model of Rain Attenuation on Multiple Short Radio Links', 'Jurnal IEEE Transaction, Volume 5,  Issue 1,  2006 Page(s): 54-57', '', 'Indrabayu', '2006', '', ''),
(36, 'Model Propagasi Indoor Untuk Profile Ruangan Sistem WLAN', 'Jurnal Ilmiah Elektrikal Enjiniring (JIEE), 07/03/Sep-Des 2009', '', 'Indrabayu', '2009', '', ''),
(37, 'Sistem Pakar Untuk Prediksi Curah Hujan Dengan Tinjauan Teknik Eksplorasi Terbaik Pada Deret Data (1)', 'Publikasi Ilmiah Rencana Penelitian Vol.3 Teknik Sipil Unhas 2012', '', 'Indrabayu', '2012', '', ''),
(38, 'Statistic Approach versus Artificial Intelligence for Rainfall Prediction Based on Data Series', 'International Journal of Engineering and Technology (IJEIT), Vol.5 No.2 May 2013', '', 'Indrabayu', '2013', '', ''),
(39, 'A New Approach Of Expert System For Rainfall Prediction Based On Data Series', 'International Journal of Engineering Research and Application (IJERA) Vol 3 Issue 2 april 2013 ', '', 'Indrabayu', '2013', '', ''),
(40, 'Numerical Statistic Approach For Expert System In Rainfall Prediction Based On Data Series', 'International Journal of Computational Engineering Research (IJCER), Vol 3 Issue 4 April 2013', '', 'Indrabayu', '2013', '', ''),
(41, 'Prediksi Curah Hujan Di Wilayah Makassar Menggunakan Metode Wavelet – Neural Network', 'Jurnal Ilmiah Elektrikal Enjiniring (JIEE), Des 2011 ', '', 'Indrabayu', '2011', '', ''),
(42, 'Pendekatan Kualitatif Untuk Prediksi Curah Hujan Dengan Tinjauan Teknik Eksplorasi Terbaik Pada Deret Data (2)', 'Publikasi Ilmiah Rencana Penelitian Vol.2 Teknik Sipil Unhas 2013', '', 'Indrabayu', '2013', '', ''),
(43, 'Prediksi Curah Hujan Dengan Fuzzy Logic', 'Jurnal Prosiding Teknik UNHAS, vol 4, Sept 2012', '', 'Indrabayu', '2012', '', ''),
(44, 'Sistem Pakar Untuk Prediksi Curah Hujan  Dengan Tinjauan Teknik Eksplorasi Terbaik Pada Deret Data', 'Publikasi Ilmiah Penelitian Teknik Sipil Unhas, vol 3, 2012', '', 'Indrabayu', '2012', '', ''),
(45, 'A Fuzzy Logic Approach for Timely Adaptive Traffic Light Based on Traffic Load,', 'Makassar International Conference on Electrical Engineering and Informatics (MICEEI) 2014, Makassar Golden Hotel, 26-30 November 2014', '', 'Indrabayu', '2014', '', ''),
(46, 'The Simulation of Vehicle Counting System for Traffic Surveillance using VIOLA-JONES Method,', 'Makassar International Conference on Electrical Engineering and Informatics (MICEEI) 2014, Makassar Golden Hotel, 26-30 November 2014', '', 'Dr.Eng. Ir. Dewiani, MT', '2014', '', 'i12313123123123123123123'),
(63, 'Vertical Handover Management for VoIP Session over Broadband Wireless Networks', 'Int\'l J. of Communication, Network and System Sciences, Vol. 6, No. 6, 2013, pp. 289-299.', '', 'Muhammad Niswar', '2013', '197309221999031001', ''),
(64, 'Handover Management for VoWLAN based on Estimation of AP Queue Length and Frame Retries', 'IEICE Transactions on Information and System, Vol. E92-D, No. 10, pp. 1847-1856, October 2009.', '', 'Muhammad Niswar', '2009', '197309221999031001', ''),
(65, 'Performance Evaluation of ZigBee-based wireless sensor network for Monitoring Patients', 'In Proceeding of Information Technology and Electrical Engineering (ICITEE), 2013 IEEE International Conference on, pp.291-294, Jogjakarta, Indonesia, 7-3 October 2013', '', 'Muhammad Niswar', '2013', '197309221999031001', ''),
(66, 'Memory Sharing Management on Virtual Private Server', 'In Proceeding of ICT for Smart Society (ICISS), 2013 IEEE International Conference on, pp.1-4, Jakarta, Indonesia, 13-14 June 2013', '', 'Muhammad Niswar', '2013', '197309221999031001', ''),
(67, 'Seamless vertical handover management for VoIP over intermingled IEEE 802.11g and IEEE 802.16e', 'In Proceeding of 8th Asia-Pacific Symposium on Information and Telecommunication Technologies (APSITT 2010), Kuching, Malaysia, June 2010', '', 'Muhammad Niswar', '2010', '197309221999031001', ''),
(68, 'MS-initiated Handover Decision Criteria for VoIP over IEEE 802.16e', 'In Proceedings of IEEE Pacific Rim Conference on Communications, Computers and Signal Processing(PACRIM\'09), Victoria B.C, Canada, August 2009.', '', 'Muhammad Niswar', '2009', '197309221999031001', ''),
(69, 'Seamless VoWLAN Handoff Management Based on Estimation of AP Queue Length and Frame Retries', 'n Proceedings of 5th IEEE Pervasive Computing and Communication (PerCom) Workshop on Pervasive Wireless Networking (PWN 2009), Galveston, Texas, USA, March 2009.', '', 'Muhammad Niswar', '2009', '197309221999031001', ''),
(70, 'Rate-based congestion control mechanism for multicast communication', 'n Proceedings of the 4th WSEAS International Conference on Telecommunications and Informatics, Prague, Czech Republic, March 2005', '', 'Muhammad Niswar', '2005', '197309221999031001', ''),
(81, 'Kinerja Tanda Tangan Digital RSA 1024 bit pada Simulasi E-Voting menggunakan Prosesor Multicore', 'Prosiding SNATI 2014, Universitas Islam Indonesia Jogjakarta', '', 'Adnan', '2014', '', 'http://journal.uii.ac.id/index.php/Snati/article/view/3281'),
(82, 'Efficient Work Stealing for Portability of Nested Parallelism and Composability of Multithreaded Program', 'Prosising CITACEE 2013, Universitas Diponegoro Semarang', '', 'Adnan', '2013', '', ''),
(83, 'Metode Divide and Conquer Parallel dan Parallel-Reduce Pada Cilk for Untuk Aplikasi E-Voting Berbasis Sistem Prosesor Multicore', 'Prosising SNATI 2013, Universitas Islam Indonesia, Jogjakarta', '', 'Adnan', '2013', '', 'http://journal.uii.ac.id/index.php/Snati/article/view/3031'),
(84, 'Challenge and Trend of Programming Model for Many Core Processors', 'Makassar International Conference on Electrical Engineering and Informatics, Makassar Golden Hotel, Makassar.', '', 'Adnan', '2012', '', ''),
(85, 'Experience using lazy task creation in OpenMP task for the uts benchmark.', 'In Prosiding of International Conference of Parallel Computing 2011, Ghent University, Ghent-Belgium', '', 'Adnan', '2012', '', ''),
(86, 'Efficient work-stealing strategy for fine grain task parallelism', 'Prosiding of International Symposium on Parallel and Distributed Systems Workshop and PhD Forum, IEEE, Alaska-USA', '', 'Adnan', '2011', '', ''),
(87, 'Dynamic multiple work stealing strategy for flexible load balancing.', 'IEICE Transaction on Information and Systems.', '', 'Adnan', '2012', '', ''),
(89, 'Publikasiku', 'Seminar', '', 'M. Taufiqurrahman', '2004', '', ''),
(90, 'Prediction of Reagents Needs using Radial Basis Function in Teaching Hospital', 'International Journal of Engineering and Technology, hal. 1498-1504. ISSN: 0975-4204. Vol. 7. No. 4 Aug-Sept 2015', '', 'Indrabayu', '2015', '', ''),
(91, 'Application of Microcontroller ATmega8535 for Hybrid Photovoltaic –Thermal (PV/T)', 'International Journal of Engineering and Technology (IJET), Vol.5, No.5, pp. 4388-4399', '', 'Syafaruddin', '2013', '', ''),
(92, 'Three Layered Feed-Forward Neural Network based Estimation of Output Power and Energy on Photovoltaic (PV) Modules', 'The 3rd Makassar International Conference on Electrical Engineering and Informatics (MICEEI), pp. 93-98, Makassar 2012', '', 'Syafaruddin', '2012', '', ''),
(93, 'ANN-Fuzzy Logic Control based Real-Time MPPT Control of PV Modules', 'International Workshop on Modern Research Method in Electrical Engineering, pp. 23-29, Makassar, September 2013', '', 'Syafaruddin', '2013', '', ''),
(94, 'Prediction of Reagents Needs Using Radial Basis Function in Teaching Hospital', 'International Journal of Engineering and Technology (IJETIY) Vol. 4/No. 7/2015', '', 'Indrabayu', '2015', '', ''),
(95, 'Prediksi Pemakaian Obat di Instalasi Farmasi Rumah Sakit Pendidikan dengan menggunakan Metode Jaringan Syaraf Tiruan (Mirna Andriani, Indrabayu, Intan Sari Areni)', 'Jurnal Dielektrika, ISSN : 2086-9487 Vol. 2/ No. 1/ Pebruari 2015', '', 'Mirna Andriani', '2015', '', ''),
(96, 'A Compact and Robust WBN Applicable for Real-Time Febris Monitoring. ', 'Asean-Japan Workshop on Information Science and Technology, University Kebangsaan Malaysia (UKM). Bangi, Malaysia', '', 'Intan Sari Areni', '2014', '', ''),
(97, 'Karakteristik Beamsteerable Dan Reconfigurable Pada Sistem Antena Piranti Komputasi Bergerak Ramah Lingkungan', 'Seminar Nasional Microwave  Antena & Propagasi (SMAP) 2014, Universitas Mercubuana, Jakarta', '', 'Elyas', '2014', '', ''),
(98, 'A Fuzzy Logic Approach for Timely Adaptive Traffic Light Based on Traffic Load. ', 'Makassar International Conference on Electrical Engineering and Informatics (MICEEI) 2014, Makassar Golden Hotel', '', 'Indrabayu', '2014', '', ''),
(99, 'Pemodelan Citra Suhu Permukaan Benda dengan Quadcopter', 'Seminar Nasional Microwave  Antena & Propagasi (SMAP) 2015, Kampus Teknik Unhas Gowa', '', 'Ali Djamalilleil', '2015', '', ''),
(100, 'Discrete Cosine Transform Untuk Dispersi Spektrum Suhu Permukaan Menggunakan Quadcopter.  ', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015', '', 'Ali Djamalilleil', '2015', '', ''),
(101, 'Sistem Pendukung Keputusan Penentuan Diagnosa Penyakit untuk Jenis Diet Pasien Berbasis Web. ', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015', '', 'Fitriyah Azis LT', '2015', '', ''),
(102, 'Review Teknologi Pengenalan Suara : Metode pada Speech to Text. ', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015', '', 'Anugrayani Bustamin', '2015', '', ''),
(103, 'Penerapan Proses Thinning pada Citra Aksara Lontara Bugis-Makassar', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015', '', 'Asyraful Insan Asry', '2015', '', ''),
(104, 'Evaluasi Teknik Stemming Pada Preprocessing Text Mining Untuk Abstrak Jurnal. ', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015', '', 'Syukrianto Latif', '2015', '', ''),
(107, 'Optimization Techniques of Hybrid Renewable Energy System: A Review. ', 'Proceeding of the 3rd Makassar International Conference on Electrical Engineering and Informatics (MICEEI 2010), Makassar, Indonesia', '', 'Siddiqi D', '2010', '', ''),
(126, 'Sistem Kendali Jarak Jauh Pintu Gerbang Otomatis', 'Penelitian Pendidikan Berbasis Laboratorium (LBE)', '', 'A. Ejah Umraeni Salam', '2013', '', ''),
(127, 'Classifying Cyst and Tumor Lesion Using Support Vector Machine based on Dental Panoramic Images Texture Features', 'IAENG International Journal of Computer Science, Hongkong, Vol. 40, Issue 1/ Maret 2013', '', 'Inggrid Nurtanio', '2013', '', ''),
(128, 'A New Approach of Expert System For Rainfall Prediction Based On Data Series', 'International Journal of Engineering Research and Application (IJERA), Vol 3 Issue 2. (DOAA, Copernicus Index)', '', 'Indrabayu', '2013', '', ''),
(129, 'Numerical Statistic Approach For Expert System In Rainfall Prediction Based On Data Series', 'International Journal of Computational Engineering Research (IJCER), Vol 3 Issue 4. Copernicus Index, etc', '', 'Indrabayu', '2013', '', ''),
(130, 'Statistic Approach versus Artificial Intelligence for Rainfall Prediction Based on Data Series', 'International Journal of Engineering and Technology (IJEIT), Vol.5 No.2', '', 'Indrabayu', '2013', '', ''),
(131, 'Deteksi Illegal Logging dengan Menggunakan Metode Wavelet Neural Network', 'Prosiding Seminar Nasional Teknik Informatika (SNATIKA) 2013', '', 'Syafruddin Syarif', '2013', '', ''),
(132, 'Analisis Manajemen Perawatan Mesin Industri dengan Menggunakan Jaringan Syaraf Tiruan Feed Forward Back Propagation (Studi Kasus; PT. Semen BosowaMaros)', 'Prosiding Seminar Nasional Teknik Informatika (SNATIKA) 2013', '', 'Ansar Suyuti', '2013', '', ''),
(133, 'ANN-Fuzzy Logic Control Based Real Time MPPT Control of PV Modules', 'International Workshop on Modern Research Methods in Electrical Engineering and Infromatics (IWorMEE), Makassar', '', 'Syafaruddin', '2013', '', ''),
(134, 'An Application of Neural Network Radial Basis Function to Determine Erythrocyte Morphology Based On Image Processing', 'International Workshop on Modern Research Methods in Electrical Engineering and Infromatics (IWorMEE), Makassar', '', 'Ansar Suyuti', '2013', '', ''),
(135, 'Classifying Cyst and Tumor Lesion on Dental Panoramic Images Using Support Vector Machine Based on GLRLM Texture Features', 'The 1st International Conference on Biomedical Engineering, Technology and Applications (IcBeta), Graduate School Universitas Gadjah Mada, Yogyakarta', '', 'Christoforus Yohannes', '2014', '', ''),
(136, 'Sistem Monitoring dan Kendali Kerja Air Conditioning Berbasis Mikrokontroller Atmega 8535', 'Jurnal Ristek (ISSN:2089-9963) Vol. 2 No. 1', '', 'Amil Ahmad Ilham', '2013', '', ''),
(137, 'Karakteristik Beamsteerable dan Reconfigurable Sistem Antena Piranti Komputasi Bergerak dan Ramah Lingkungan', 'Seminar Nasional Microwave Antena dan Propagasi (SMAP) – Universitas Mercubuana, Jakarta', '', 'Elyas', '2014', '', ''),
(138, 'A Fuzzy Logic Approach for Timley Adaptive Traffic Light Based on Traffic Load', 'Makassar International Conference on Electrical Engineering and Informatics (MICEEI) – Makassar Golden Hotel', '', 'Indrabayu', '2014', '', ''),
(139, 'Prediksi Pemakaian Obat di Instalasi Farmasi Rumah Sakit Pendidikan dengan Menggunakan Metode Jaringan Syaraf Tiruan', 'Vol.2/No.1/Februari 2015 Jurnal Dielektrika, ISSN:2086-9487', '', 'Indrabayu', '2015', '', ''),
(140, 'Prediction of Reagents Needs Using Radial Basis Function in Teaching Hospital', 'Vol.4/No/7/2015 International Journal of Engineering and Technology (IJETIY)', '', 'Indrabayu', '2015', '', ''),
(141, 'Pemodelan Citra Suhu Permukaan Benda dengan Quadcopter', 'Seminar Nasional Microwave Antena dan Propagasi (SMAP) 2015 – Kampus Teknik Unhas Gowa', '', 'Intan Sari Areni', '2015', '', ''),
(142, 'Discrete Cosine Transform Untuk Dispersi Spektrum Suhu Permukaan Menggunakan Quadcopter', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Intan Sari Areni', '2015', '', ''),
(143, 'Sistem Pendukung Keputusan Penentuan Diagnosa Penyakit untuk Jenis Diet Pasien Berbasis Web. ', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Indrabayu', '2015', '', ''),
(144, 'Review Teknologi Pengenalan Suara: Metode pada Speech to Text', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Indrabayu', '2015', '', ''),
(145, 'Penerapan Proses Thinning pada Citra Aksara Lontara Bugis-Makassar', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Indrabayu', '2015', '', ''),
(146, 'Evaluasi Teknik Stemming pada Prepocessing Text Mining untuk Abstrak Jurnal', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Indrabayu', '2015', '', ''),
(147, 'Klasifikasi Bertingkat untuk Deteksi Mobil', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Indrabayu', '2015', '', ''),
(148, 'Analisis Confusion Matrix terhadap Deteksi Wajah Menggunakan HOG', 'Seminar Nasional Teknik Informatika (SNATIKA) 2015 – Kampus Teknik Unhas Gowa', '', 'Indrabayu', '2015', '', ''),
(149, 'Speech to Text for Indonesian Homophone Phrase with Mel Frequency Cepstral Coefficient', 'International Conference on Computational Intelligence and Cybernetics (Cyberneticscom) 2016', '', 'Anugrahyani', '2016', '', ''),
(150, 'Vehicle Detection and Tracking using Gaussian Mixture Model and Kalman Filter', 'International Conference on Computational Intelligence and Cybernetics (Cyberneticscom) 2016', '', 'Indrabayu', '2016', '', ''),
(151, 'Statistical and Machine Learning approach in forex prediction based on empirical data', 'International Conference on Computational Intelligence and Cybernetics (Cyberneticscom) 2016', '', 'Sitti Wetenriajeng Sidehabi', '2016', '', ''),
(152, 'Apriori Algorithm for Surgical Consumable Material Standardization', 'INTERNATIONAL ORGANIZATION OF SCIENTIFIC RESEARCH (IOSR)', '', 'Christoforus Yohannes', '2017', '', ''),
(153, 'Improvement in Speech to Text for Bahasa Indonesia Through Homophone Impairment Training', 'JOURNAL OF COMPUTERS (JOC) (SCOPUS INDEX)', '', 'Intan Sari Areni', '2017', '', ''),
(154, 'An Intelligent Traffic Light System for Reducing Number of Queuing Cars in Complex Road Junction', 'LETTERS, PART B: APPLICATIONS (SCOPUS INDEX)', '', 'Indrabayu', '2017', '', ''),
(155, 'A hybrid feature extraction method for accuracy improvement in &quot;Aksara Lontara&quot; translation', 'JOURNAL OF COMPUTER SCIENCE (SCOPUS INDEX)', '', 'Intan Sari Areni', '2017', '', ''),
(156, 'A low cost wearable medical device for vital signs monitoring in low-resource settings', 'International Journal of Electrical and Computer Engineering (indexed in Scopus)', '', 'Muhammad Niswar', '2019', '', ''),
(157, 'IoT-based water quality monitoring system for soft-shell crab farming', '2018 IEEE International Conference on Internet of Things and Intelligence System, IOTAIS 2018 (indexed in Scopus)', '', 'Muhammad Niswar', '2018', '', ''),
(158, 'Design of smart lock system for doors with special features using bluetooth technology', '2018 International Conference on Information and Communications Technology, ICOIACT 2018 (indexed in Scopus)', '', 'Hadis, M.S.', '2018', '', ''),
(159, 'Evaluating the effect placement capacitor and distributed photovoltaic generation for power system losses minimization in radial distribution system', '2018 AIP Conference Proceedings (indexed in Scopus)', '', 'Rahman, Y.A.', '2018', '', ''),
(160, 'An Approach in Auto Valuing for Optimal Threshold of Viola Jones  ', 'Journal of Physics: Conference Series (indexed in Scopus)', '', 'Indrabayu', '2019', '', ''),
(161, 'Patch microwave absorber for RF energy harvesting as renewable energy', 'IOP Conference Series: Earth and Environmental Science (indexed in Scopus)', '', 'Muslimin, Z.', '2019', '', ''),
(162, 'Spatial-temporal approach for predicting rainfall in tropical country', 'ICIC Express Letters', '', 'Indrabayu', '2019', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_dosen_anggota`
--

CREATE TABLE `publikasi_dosen_anggota` (
  `id` int(11) NOT NULL,
  `id_publikasi_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi_dosen_anggota`
--

INSERT INTO `publikasi_dosen_anggota` (`id`, `id_publikasi_dosen`, `nama_dosen`) VALUES
(1, 15, 'A. Ais Prayogi Alimuddin'),
(2, 15, 'Amil Ahmad Ilham'),
(3, 15, 'Mukarramah Yusuf'),
(4, 15, 'Adnan'),
(5, 11, 'Ingrid Nurtanio'),
(7, 16, 'Yustinus Upa Sombolayuk'),
(8, 16, 'Muhammad Niswar'),
(9, 16, 'Rhiza S.Sadjad'),
(10, 16, 'Adnan'),
(11, 17, 'Syafruddin Syarif'),
(12, 17, 'Novi Nur RA Mokokombang'),
(13, 17, 'Amil Ahmad Ilham'),
(14, 18, 'Yusri Syam Akil'),
(15, 18, 'Indrabayu'),
(16, 18, 'Movi Nur R.A Mokokombang'),
(17, 19, 'Gassing'),
(18, 19, 'Ejah Umraeni Salam'),
(19, 20, 'Gassing'),
(20, 20, 'Ejah Umraeni Salam'),
(21, 21, 'Gassing'),
(22, 22, 'Yusri Syam Akil'),
(23, 22, 'Rhiza S.Sadjad'),
(24, 22, 'Syafruddin Syarif'),
(25, 22, 'Ingrid Nurtanio|informatika'),
(26, 11, 'Muhammad Niswar|informatika'),
(27, 8, 'Yustinus Upa Sombolayuk'),
(28, 29, 'Gassing'),
(29, 29, 'Zulkifli Tahir'),
(30, 29, 'Muhammad Niswar'),
(31, 32, 'Amil Ahmad Ilham'),
(32, 32, 'Gassing'),
(33, 45, 'Intan Sari Areni'),
(34, 45, 'Novi Nur RA Mokokombang'),
(35, 46, 'Indrabayu'),
(36, 46, 'Andani Ahmad'),
(37, 47, 'Indrabayu'),
(38, 53, '231321'),
(39, 53, 'Sri Mawar Said'),
(40, 54, '12312312312'),
(41, 55, '3213cer34'),
(42, 55, 'Muhammad Niswar'),
(43, 56, '312dsdfsdf'),
(44, 56, '1231123123'),
(45, 58, '1231231'),
(46, 58, 'A. Ais Prayogi Alimuddin'),
(47, 59, '3123123'),
(48, 59, 'Amil Ahmad Ilham'),
(49, 59, '1231231'),
(50, 59, 'Muhammad Niswar'),
(51, 59, 'Syafruddin Syarif'),
(52, 60, '3423421111tfdfff'),
(53, 60, '234234211tsdfsdf'),
(54, 60, '2'),
(55, 60, '2222222'),
(56, 60, '33333'),
(57, 60, '11'),
(58, 60, 'Mukarramah Yusuf'),
(59, 60, 'Novi Nur RA Mokokombang'),
(60, 60, '33'),
(61, 61, 'Mukarramah Yusuf'),
(62, 61, 'contoh'),
(63, 61, 'Indrabayu'),
(64, 61, '232323'),
(65, 62, 'Christoforus Yohannes'),
(69, 75, 'Indrabayu'),
(70, 75, 'Rezkiana Hasanuddin'),
(71, 75, 'Deasy Mutiara Putri'),
(72, 76, 'Muhammad Niswar'),
(73, 77, 'Muhammad Niswar'),
(74, 65, 'Amil Ahmad Ilham'),
(75, 78, 'Suwoyo'),
(77, 10, 'Muhammad Niswar'),
(78, 10, 'Andani Ahmad'),
(79, 10, 'Tajuddin Waris'),
(80, 10, 'Elyas'),
(81, 87, 'Mitsuhisa Sato'),
(82, 86, 'Mitsuhisa Sato'),
(83, 85, 'Mitsuhisa Sato'),
(84, 82, 'Zahir Zainuddin'),
(85, 82, 'Wardi'),
(86, 88, 'Andani Ahmad'),
(87, 90, 'Baizul Saman'),
(88, 90, 'Amil Ahmad Ilham'),
(89, 90, 'Intan Sari Areni'),
(90, 91, 'Andani Ahmad'),
(91, 91, 'Tajuddin Waris'),
(92, 91, 'Zulkifli Tahir'),
(93, 91, 'Yulianto Dwi Putra'),
(94, 62, 'Eha Renwi Astuti'),
(95, 92, 'Wardi'),
(96, 92, 'Gassing'),
(97, 92, 'Zainab Muslimin'),
(98, 92, 'Zulkifli Tahir'),
(99, 92, 'Engin Karatepe'),
(100, 92, 'Takashi Hiyama'),
(101, 93, 'Ansar Suyuti'),
(102, 93, 'Zainab Muslimin'),
(103, 93, 'Zulkifli Tahir'),
(104, 94, 'Baizul Zaman'),
(105, 94, 'Amil Ahmad Ilham'),
(106, 94, 'Intan Sari Areni'),
(107, 95, 'Indrabayu'),
(108, 95, 'Intan Sari Areni'),
(109, 96, 'Elyas'),
(110, 96, 'Irfan Efendi'),
(111, 96, 'Khaerunnisa'),
(112, 96, 'Santi Samsul'),
(113, 96, 'Sri Wahyuni'),
(114, 96, 'Amil Ahmad Ilham'),
(115, 96, 'Merna Baharuddin'),
(116, 96, 'Novi Nur RA Mokokombang'),
(117, 97, 'Sukriyah Buwarda'),
(118, 97, 'Wardi'),
(119, 97, 'Intan Sari Areni'),
(120, 97, 'Dewiani'),
(121, 97, 'Andani Ahmad'),
(122, 97, 'Novi Nur RA Mokokombang'),
(123, 97, 'Syafruddin Syarif'),
(124, 98, 'Intan Sari Areni'),
(125, 98, 'Novi Nur RA Mokokombang'),
(126, 98, 'Sitti Wetenriajeng Sidehabi'),
(127, 99, 'Nadhilah Waliuddin'),
(128, 99, 'Intan Sari Areni'),
(129, 99, 'Indrabayu'),
(130, 100, 'Nadhilah Waliuddin'),
(131, 100, 'Intan Sari Areni'),
(132, 100, 'Indrabayu'),
(133, 101, 'Indrabayu'),
(134, 101, 'Intan Sari Areni'),
(135, 102, 'Indrabayu'),
(136, 102, 'Intan Sari Areni'),
(137, 103, 'Indrabayu'),
(138, 103, 'Intan Sari Areni'),
(139, 104, 'Indrabayu'),
(140, 104, 'Intan Sari Areni'),
(141, 105, 'Indrabayu'),
(142, 105, 'Intan Sari Areni'),
(143, 106, 'Indrabayu'),
(144, 106, 'Intan Sari Areni'),
(145, 107, 'Prabuwono A S'),
(146, 107, 'Hasniaty A.'),
(147, 107, 'Zulkifli Tahir'),
(148, 107, 'Taufik N V'),
(149, 126, 'Rhiza S. Sadjad'),
(150, 126, 'Christoforus Yohannes'),
(151, 128, 'Prof. Dr. Ir. Nadjamuddin Harun'),
(152, 128, 'Andani'),
(153, 129, 'Prof. Dr. Ir. Nadjamuddin Harun'),
(154, 129, 'Andani'),
(155, 130, 'Prof. Dr. Ir. Nadjamuddin Harun'),
(156, 130, 'Andani'),
(157, 131, 'Indrabayu'),
(158, 132, 'Zulkifli Tahir'),
(159, 133, 'Ansar Suyuti'),
(160, 133, 'Zaenab '),
(161, 133, 'Zulkifli Tahir'),
(162, 134, 'Elly Warni'),
(163, 134, 'Indrabayu'),
(164, 134, 'Wardi'),
(165, 134, 'Zulkifli Tahir'),
(166, 135, 'Inggrid Nurtanio'),
(167, 136, 'Syafaruddin'),
(168, 137, 'Wardi'),
(169, 137, 'Intan Sari Areni'),
(170, 137, 'Dewiani'),
(171, 137, 'Andani'),
(172, 137, 'Novy Nur R.A Mokobombang'),
(173, 137, 'Syafruddin Syarif'),
(174, 138, 'Intan Sari Areni'),
(175, 138, 'Novy Nur R.A Mokobombang'),
(176, 139, 'Intan Sari Areni'),
(177, 140, 'Amil Ahmad Ilham'),
(178, 140, 'Intan Sari Areni'),
(179, 141, 'Indrabayu'),
(180, 142, 'Indrabayu'),
(181, 143, 'Intan Sari Areni'),
(182, 144, 'Intan Sari Areni'),
(183, 145, 'Intan Sari Areni'),
(184, 146, 'Intan Sari Areni'),
(185, 147, 'Intan Sari Areni'),
(186, 148, 'Intan Sari Areni'),
(187, 149, 'Intan Sari Areni'),
(188, 149, 'Indrabayu'),
(189, 149, 'Novy Nur R.A Mokobombang'),
(190, 150, 'Rizky Yusliana Bakti'),
(191, 150, 'Intan Sari Areni'),
(192, 150, 'A. Ais Prayogi Alimuddin'),
(193, 151, 'Indrabayu'),
(194, 151, 'Sofyan Tandungan'),
(195, 152, 'Indrabayu'),
(196, 152, 'Inggrid Nurtanio'),
(197, 152, 'Reza Maulana'),
(198, 152, 'Intan Sari Areni'),
(199, 152, 'Elly Warni'),
(200, 153, 'Indrabayu'),
(201, 153, 'Anugrahyani Bunyamin'),
(202, 154, 'Y. Lesmana'),
(203, 154, 'Amil Ahmad Ilham'),
(204, 154, 'Inggrid Nurtanio'),
(205, 154, 'S. Hamid'),
(206, 155, 'Anugrahyani'),
(207, 155, 'Indrabayu'),
(208, 156, 'Amil Ahmad Ilham'),
(209, 156, 'Muhammad Nur'),
(210, 156, 'Idar Mappangara'),
(211, 157, 'Amil Ahmad Ilham'),
(212, 157, 'Kashihara, S.'),
(213, 157, 'Wainalang, S.'),
(214, 158, 'Palantei, E.'),
(215, 158, 'Amil Ahmad Ilham'),
(216, 158, 'Hendra, A.'),
(217, 159, 'Manjang, S.'),
(218, 159, 'Yusran'),
(219, 159, 'Amil Ahmad Ilham'),
(220, 160, 'Nurzaenab'),
(221, 160, 'Inggrid Nurtanio'),
(222, 161, 'Anugraha, N.'),
(223, 161, 'Suyuti, A.'),
(224, 161, 'Palantei, E.'),
(225, 161, 'Indrabayu'),
(226, 162, 'Aditama, S.'),
(227, 162, 'A. Ais Prayogi Alimuddin'),
(228, 162, 'Achmad, A.'),
(229, 162, 'Areni, I.S.');

-- --------------------------------------------------------

--
-- Table structure for table `sk_mengajar`
--

CREATE TABLE `sk_mengajar` (
  `id_sk_mengajar` int(10) NOT NULL,
  `semester` enum('awal','akhir') NOT NULL,
  `tahun_1` year(4) NOT NULL,
  `tahun_2` year(4) NOT NULL,
  `sk_mengajar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(10) NOT NULL,
  `nama_tema` varchar(50) NOT NULL,
  `css_tema` varchar(50) NOT NULL,
  `status_tema` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id_tema`, `nama_tema`, `css_tema`, `status_tema`) VALUES
(1, 'default', 'default.css', 'Y'),
(2, 'red', 'red.css', 'N'),
(3, 'green', 'green.css', 'N'),
(5, 'red_left_sidebar', 'red.css', 'N'),
(6, 'default_left_sidebar', 'default.css', 'N'),
(7, 'fancy', 'fancy.css', 'N'),
(8, 'summer', 'summer.css', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `uraian`
--

CREATE TABLE `uraian` (
  `id` int(11) NOT NULL,
  `id_halaman` int(11) NOT NULL,
  `uraian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_detail`
--
ALTER TABLE `album_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel1`
--
ALTER TABLE `artikel1`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `dokumen_akreditasi`
--
ALTER TABLE `dokumen_akreditasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event1`
--
ALTER TABLE `event1`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `grabbing`
--
ALTER TABLE `grabbing`
  ADD PRIMARY KEY (`id_grabbing`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `halaman1`
--
ALTER TABLE `halaman1`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `halaman_dosen`
--
ALTER TABLE `halaman_dosen`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kuliah`
--
ALTER TABLE `kuliah`
  ADD PRIMARY KEY (`id_kuliah`) USING BTREE;

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `manajemen_halaman`
--
ALTER TABLE `manajemen_halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nomor_penting`
--
ALTER TABLE `nomor_penting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indexes for table `penelitian_anggota`
--
ALTER TABLE `penelitian_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengabdian_anggota`
--
ALTER TABLE `pengabdian_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_nama_website`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `publikasi_dosen`
--
ALTER TABLE `publikasi_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi_dosen_anggota`
--
ALTER TABLE `publikasi_dosen_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sk_mengajar`
--
ALTER TABLE `sk_mengajar`
  ADD PRIMARY KEY (`id_sk_mengajar`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `uraian`
--
ALTER TABLE `uraian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `album_detail`
--
ALTER TABLE `album_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `artikel1`
--
ALTER TABLE `artikel1`
  MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dokumen_akreditasi`
--
ALTER TABLE `dokumen_akreditasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `event1`
--
ALTER TABLE `event1`
  MODIFY `id_event` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_gambar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grabbing`
--
ALTER TABLE `grabbing`
  MODIFY `id_grabbing` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130816249;

--
-- AUTO_INCREMENT for table `halaman1`
--
ALTER TABLE `halaman1`
  MODIFY `id_halaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manajemen_halaman`
--
ALTER TABLE `manajemen_halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nomor_penting`
--
ALTER TABLE `nomor_penting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id_penelitian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `penelitian_anggota`
--
ALTER TABLE `penelitian_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `pengabdian`
--
ALTER TABLE `pengabdian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengabdian_anggota`
--
ALTER TABLE `pengabdian_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_nama_website` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1610;

--
-- AUTO_INCREMENT for table `publikasi_dosen`
--
ALTER TABLE `publikasi_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `publikasi_dosen_anggota`
--
ALTER TABLE `publikasi_dosen_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `sk_mengajar`
--
ALTER TABLE `sk_mengajar`
  MODIFY `id_sk_mengajar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uraian`
--
ALTER TABLE `uraian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
