<!-- Breadcrumb section -->
<div class="mahasiswa-site-breadcrumb">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Beranda</a> <i class="fa fa-angle-right"></i>
        <span class="title-page"><?=$title?></span>
    </div>
</div>
<!-- Breadcrumb section end -->
<!--vertical tab-->
	<div class="container spad">
	<div class="row">
		<div class="col-lg-3"> <!-- required for floating -->
			<!-- Nav tabs -->
			<ul class="nav nav-tabs tabs-left sideways" aria-orientation="vertical">
<?php if($data->titel1_id != NULL) { ?>
			<li class="active"><a href="#1" data-toggle="tab"><?=$data->titel1_id?></a></li>
<?php } 
	if($data->titel2_id != NULL) { ?>
			<li><a href="#2" data-toggle="tab"><?=$data->titel2_id?></a></li>
<?php }
	if($data->titel3_id != NULL) { ?>
			<li><a href="#3" data-toggle="tab"><?=$data->titel3_id?></a></li>
<?php } 
	if($data->titel4_id != NULL) { ?>
			<li><a href="#4" data-toggle="tab"><?=$data->titel4_id?></a></li>
<?php }
	if($data->titel5_id != NULL) { ?>
			<li><a href="#5" data-toggle="tab"><?=$data->titel5_id?></a></li>
<?php } ?>
			</ul>
		</div>

		<div class="col-lg-9">
			<!-- Tab panes -->
<?php
	if($data->titel1_id == null) { ?>
				<td align="center" colspan="5"><h4>Belum ada informasi di halaman ini</h4></td>
<?php } ?>
            <div class="tab-content">
			<div class="tab-pane active" id="1">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data->isi1_id ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="2">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data->isi2_id ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="3">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data->isi3_id ?>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="4">
				<section class="blog-page-section spad pt-0">
					<div class="faq-w3agile">
						<div class="container">
							<div>
							<h3 class="w3_agile_header">Kurikulum Program Sarjana Teknik Informatika Unhas</h3> 
							<ul class="faq">
								<li class="item1"><a href="#" title="click here">Wawasan IPTEKS</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Cabang ilmu yang harus dikuasai dalam mewujudkan sumber daya manusia yang berkualitas.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Bahasa Indonesia</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Cabang ilmu yang memahami berbagai kaidah tentang bahasa Indonesia ragam ilmiah serta penulisan karya ilmiah dan mampu menerapkannya dalam praktik penulisan karya ilmiah.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pendidikan Kewarganegaraan</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa dapat memahami Pancasila dan implementasinya, identitas nasional dan masyarakat madani,, demokrasi, hak dan kewajiban warga negara, konstitusi dan rule of law, hak asasi manusia, geopolitik, geostrategi, otonomi daerah, good governance dan globalisasi.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Matematika Dasar I</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas tentang Bilangan Real, Pertidaksamaan dan Nilai Mutlak, Sistem Koordinat, Grafik Persamaan, Fungsi dan Grafiknya, Operasi pada Fungsi, Fungsi trigonometri, Limit, Turunan, Penggunaan Turunan,Integral, Penggunaan Integral, Fungsi Transenden.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Fisika Dasar</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini, membahas konsep terpenting dan gejala dalam fisika klasik dengan cara memberikan dasar yang kuat ilmu fisika, gejala alam dan aplikasi dasarnya untuk teknologi saat ini, mulai dari konsep kinematika gerak partikel lintasan garis lurus dan melengkung (parabol, melingkar), dinamika partikel, Hukum Newton dan aplikasinya, konsep kesetimbangan translasi, konsep usaha dan energi, konsep momentum, konsep elastisitas dan osilasi, dan konsep gelombang.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pengantar Teknologi Informasi</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas tentang mekanisme pembuatan (generation), pencatatan (recording), distribusi (distribution), penyimpanan (storage), representasi (representation), pengambilan (retreival), dan diseminasi atau penyebaran (dissemination) dari informasi. Hal-hal yang berhubungan dengan masalah sosial dan management juga akan dibahas.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Dasar Pemrograman Komputer</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa akan belajar mengenai konsep dasar-dasar pemrograman dan mempraktekkannya. Perkuliahan dilakukan di kelas dan praktik dilakukan di kelas maupun di laboratorium. Mahasiswa akan belajar tentang algoritma sederhana, cara menuangkan algoritma, konsep percabangan, konsep perulangan, input, proses dan output, merumuskan solusi algoritma untuk permasalahan iterative dan percabangan bertingkat, menelusuri dan mensimulasi eksekusi fungsi rekursif dan mengimplementasikan algoritma sesuai rumusan solusi dalam bentuk program dengan bahasa pemrograman tertentu.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pendidikan Agama</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa dirancang untuk mempelajari Agama Islam guna memperkuat keimanan mahasiswa kepada Allah SWT, serta memperluas wawasan hidup beragama.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Wawasan Sosial Budaya Maritim</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Salah satu komponen Mata Kuliah Berkehidupan Bermasyarakat (MBB) di Unhas yang mengintroduksi materi-materi kemaritiman, antara lain potensi sumber daya maritim beserta dinamikanya, nilai-nilai budaya maritim yang perlu dikembangkan dan dipromosikan yang kesemuanya mengarah pada karakteristik Benua Maritim dan pembangunannya.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Bahasa Inggris</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa dibekali dengan pengetahuan, pemahaman dan penerapan bahasa Inggris tingkat lanjut. Dalam perkuliahan dibahas berbagai jenis bacaan, tata bahasa atau structure yang meliputi simple present tense, simple past tense, present continuous tense dst.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Matematika Dasar II</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini menjelaskan konsep dasar Kalkulus dan terampil memecahkan masalah terapan Kalkulus.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pancasila</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas tentang landasan dan tujuan pendidikan pancasila. Pancasila dalam konteks sejarah perjuangan bangsa indonesia. Pancasila sebagai sistem filsafat, pancasila sebagai etika politik dan ideologi nasional. Pancasila dalam konteks ketatanegaraa RI dan pancasila sebagai paradigma kehidupan dalam bermasyarakat bermasyarakat dan bernegara.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Matematika Diskrit</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini berisi bahasan konsep-konsep, prinsip-prinsip prosedur/algoritma tentang dasar-dasar kaidah pencacahan, permutasi, kombinasi, relasi rekurensi, fungsi pembangkit, graf serta penerapannya dalam berbagai bidang.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Algoritma dan Struktur Data</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas teori algoritma dan struktur data mahasiswa mampu menyelesaikan masalah pemrograman dengan algoritma yang tepat dengan menggunakan struktur data yang benar.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Sistem Digital</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini mempelajari prinsip-prinsip dasar dari sistem digital dan mencakup sistem bilangan dan sistem kode, aljabar Boole, gerbang logika, penyederhanaan rangkaian logika (peta Karnaugh), rangkaian kombinasional (pembanding dan penjumlah biner), flip-flop (bistabil), pencacah, register, decoder/demultiplekser dan multiplekser, monostabil, astabil dan picu Schmitt, serta berbagai aplikasi rangkaian digital.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Aljabar Linier</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa dapat mengenal beberapa konsep dasar dalam matematika melakukan proses generalisasi sederhana dalam dalam matematika dan dapat menggunakan pengetahuan aljabar linear.seperti ruang vektor, transformasi linear, nilai dan vektor eigen.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Arsitektur dan Organisasi Komputer</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa diharapkan dapat mengetahui dan memahami evolusi dan kinerja computer dari generasi 1 sampai dengan 6, struktur interkoneksi komponen computer yang dikenal dengan istilah sistem bus, memori terutama cache, internal dan eksternal memori, modul I/O dan CPU sebagai bagian komponen computer, Operating System Support, Computer arithmetic, memahami lebih dalam mengenai set intruksi seperti fungsi, karakteristik, format dan teknik pengalamatannya.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Probabilitas dan Statistik</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata Kuliah ini membahas tentang Pengertian Statistika dan Jenisnya, Ukuran Pemusatan dan Penyebaran Data, Peluang suatu Kejadian, Distribusi Peluang, Variabel Random, Sampling, Pendugaan parameter, dan Uji Hipotesis, serta Regresi, Korelasi, dan penerapan Statistika dalam IT.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Jaringan Komputer</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Melalui mata kuliah ini, mahasiswa dapat memiliki pengetahuan dan pemahaman untuk memahami dan membangun jaringan komputer dengan menggunakan protokol TCP/IP, memahmi teknik dan penyelesaian masalah terhadapat aplikasi rangkaian yan meliputi konsep dan istilah dan implementasi jaringan komputer.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Dasar Multimedia</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini untuk memberi pengetahuan dan pemahaman tentang berbagai konsep yang merupakan pengantar mengenai komponen media digital antara lain perancangan, warna, teks,gambar,suara, animasi, video. Kuliah ini ditekankan pada pembuata digiting dan manipulasi komponen media.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pemrograman Berorientasi Obyek</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini mengajarkan mahasiswa untuk membuat program menggunakan teknik pemrograman berorientasi objek.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Sistem Operasi</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini menjabarkan tentang konsep-konsep dasar dalam memahami sistem operasi komputer. materi dari kuliah ini dimulai dengan pengenalan sistem komputer,  struktur sistem operasi komputer, proses dan thread, cpu scheduling, sinkronisasi, deadlock, managemen memori dan media penyimpan, serta sistem proteksi dan sekuriti, dan diakhiri dengan studi kasus tentang sistem operasi DOS (Disk Operating Sistem).</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Metode Komputasi Numerik</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Galat dalam hampiran numerik, penyelsaian sistem persamaan linier secara numerik, hampiran akar persamaan tak linier secara numerik, interpolasi, penurunan dan pengintegralan secara numerik, dan penyelesaian persamaan diferensial biasa (masalah nilai awal) secara numerik. Beberapa metode numerik untuk menyelesaikan masalah matematika diperkenalkan dalam matakuliah ini. Sebagai kesatuan matakuliah ini adalah kegiatan praktik menggunakan program MATLAB untuk menyelesaian masalah matematika secara numerik.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Basis Data I</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini memberikan pemahaman dan penguasaan mengenai konsepkonsep basis data, model data relasional, teknik pembentukan basis data dan normalisasi, penggunaan bahasa query (sql) untuk pencarian, pengurutan, penyaringan, penghapusan dan update data serta pembuatan program aplikasi basis data dalam pengembangan sistem pengolahan data berbasis komputer serta penggunaan basis data dalam sistem informasi.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Kecerdasan Buatan</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah yang membahas Konsep Agents yang cerdas, Pemecahan suatu masalah dengan pencarian, Knowledge & Reasoning, Planning dan Uncertain Knowledge & Reasoning.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Rekayasa Perangkat Lunak I</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah yang berisi tentang membahas analisis dan desain terstruktur beserta alat bantu pemodelannya (Data Flow Diagram, Entity Relationship Diagram, State Transition Diagram, Structure Chart, Kamus Data, Spesification Proccess, dan sebagainya.), pengantar perancangan perangkat lunak dengan teknik berorientasi obyek, Unified Modelling Language/ UML (Use Case Diagram, Class Diagram, Sequence diagram, Activity Diagram, dan sebagainya), teknik pengujian perangkat lunak, pemeliharaan, dan dokumentasi.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pemrograman Berbasis Web</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini untuk mencapai kompetensi pembuatan dan pengembangan aplikasi berbasis web melalui pemahaman teknologi jaringan, internet, bahasa pemrograman dan berbagai kolaborasi teknologi sehingga mahasiswa akan mampu menciptakan/membuat dan mengembangkan aplikasi berbasis web yang bermanfaat di berbagai bidang dengan teknologi terkini.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Etika Profesi</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas tentang pengertian profesi, kode etik dan kaidah tata laku professional, kemampuan dasar menjalankan profesi secara professional, metode-metode penyelesaian masalah secara professional, prinsip-prinsip etika, aturan-aturan perilaku, etika pada masyarakat informasi, tanggung jawab profesional di bidang sistem informasi.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Pemrograman Visual</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas dasar-dasar pemrograman desktop application dengan menggunakan bahasa pemrograman Visual Basic pada IDE(Intregrated Development Environment) yaitu Ms Visual Studio : Menerapkan konsep pemrograman Visual Basic 2008 dengan menggunakan paradigma Object Oriented Programming.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Interaksi Manusia dan Komputer</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah yang mampu memberikan dasar konsep dan praktis tentang interaksi manusia dan komputer, model interaksi, perancangan dan implementasi antar-muka manusia dan komputer serta penggunaan tools untuk pengembangan software interface manusia dan komputer. Setelah mengikuti kuliah ini diharapkan mahasiswa mempunyai pemahaman tentang human cognition, memori manusia, penyelesaian masalah, bahasa serta apa dan bagaimana keterkaitan hal-hal tersebut dalam merancang dan mengembangkan sistem interaktif.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Basis Data II</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah yang membahas tentang SQL, pengembangan aplikasi, distributed databases, dan issue terkini dalam database.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Rekayasa Perangkat Lunak II</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini memberikan pemahaman dan penguasaan kepada mahasiswa mengenai berbagai macam Process Model dalam Software Engineering seperti Waterfall Model, Prototyping Model, RAD Model, dan Evolutionary Process Models (Incremental dan Spiral Model), Analysis Modeling, Design Model, Object Oriented Analysis and Design (OOAD), Testing Strategies, dan Softwares Testing Mehod.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Teori Bahasa dan Otomata</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini membahas ciri-ciri dari kelas-kelas tata bahasa, membuat tata bahasa yang termasuk ke dalam kelas tata bahasa reguler, bebas konteks, dan peka konteks, dan membuat mesin hipotetik. Topik-topik yang dipelajari meliputi; definisi tata bahasa, klasifikasi Chomsky, tata bahasa dan ekspresi reguler, tata bahasa bebas konteks, tata bahasa peka konteks, finite state automata, push down automata, dan mesin turing.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Technopreneurship</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah yang memberikan pemahaman dan skill kepada mahasiswa untuk mampu mengidentifikasi dan mengevaluasi peluang usaha berbasis teknologi sesuai dengan bidang keahlian mahasiswa, serta mengembangkan peluang usaha tersebut. Mata kuliah ini menggabungkan pengenalan teori dan praktek langsung (hands-on experience) secara terintegrasi dalam mengembangkan ide dan peluang usaha.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Sistem Informasi</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini memandang suatu jaringan kerja dari prosedur prosedur yang berupa urutan kegiatan yang saling berhubungan berkumpul bersama sama utk mencapai tujuan tertentu.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Sistem Memori Komputer</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata kuliah ini memandang secara keseluruhan mengenai struktur dan fungsi sebuah memori komputer. Tujuan utama  perkuliahan, diharapkan mahasiswa memahami dan dapat menjelaskan konsep arsitektur sistem komputer, dapat menjelaskan rancangan-rancangan, organisasi dan fungsi-fungsi dari subsistem komputer sehingga dapat mengembangkan konsep dan interaksi diantara berbagai subsistem pada sebuah memori komputer.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Kerja Praktek</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mata  kuliah  ini  membahas seputar  penyusunan  hasil  laporan  kerja  praktek  yang  telah dilakukan oleh mahasiswa dalam 1(satu) semester sebagai salah satu prasyarat mengajukan Tugas Akhir</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Seminar Proposal</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Penjabaran Bab 1 (pendahuluan) bab 2 landasan teori dan bab 3 metode penelitian serta presentasi proposal tesis masing masing.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Kuliah Kerja Nyata</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Mahasiswa dapat mengaplikasikan ilmu-ilmu yang didapat di bangku kuliah secara sinergi dengan ilmu-ilmu bidang alin untuk kegiatan pengabdian kepada masyarakat.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Seminar Hasil</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Kegiatan akademik wajib bagi setiap mahasiswa Teknobiologi UAJY, berupa penyusunan proposal penelitian skripsi kemudian dilanjutkan dengan presentasi dan diskusi di depan mahasiswa, pembimbing serta penguji.</p>
										</li>										
        							</ul>
      							</li>
								<li class="item1"><a href="#" title="click here">Skripsi</a>
        							<ul class="row">
          								<div class="col-lg-2 btn">Description</div>
          								<li class="subitem1 col-lg-10"><hr>
            								<p>Titik kulminasi dari seluruh proses pembelajaran yang telah dilalui oleh mahasiswa serta evaluasi terhadap kesiapan dan kematangan mahasiswa setelah mengikuti seluruh rangkaian mata kuliah.</p>
										</li>										
        							</ul>
      							</li>
							</ul>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="tab-pane" id="5">
				<section class="blog-page-section spad pt-0">
					<div class="container">
						<div>
							<?=$data->isi5_id ?>
						</div>
					</div>
				</section>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
</div>
