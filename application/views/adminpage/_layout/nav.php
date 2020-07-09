<?php $modul = $this->uri->segment(2); $method = $this->uri->segment(3); ?>
        <div id="sidebar" class="sidebar sidebar-grid">
            <div data-scrollbar="true" data-height="100%">
                <ul class="nav">
                    <li class="nav-header">Menu Umum</li>
                    <li class="<?=($modul == '' ? 'active' : '')?>">
                        <a href="<?=admin_url()?>">
                            <i class="fa fa-laptop"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="has-sub <?=($modul == 'headline' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Headline</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-picture-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'headline' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('headline')?>">
                                    <span>Daftar Headline</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'headline' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('headline/tambah')?>">
                                    <span>Tambah Headline</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'informasi' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Informasi</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-info-circle"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'informasi' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('informasi')?>">
                                    <span>Daftar Informasi</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'informasi' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('informasi/tambah')?>">
                                    <span>Tambah Informasi</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'blogs' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Blogs</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-newspaper-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'blogs' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('blogs')?>">
                                    <span>Daftar Blog</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'blogs' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('blogs/tambah')?>">
                                    <span>Tambah Blog</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--<li class="has-sub <?=($modul == 'logo' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Logo Partner</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-briefcase"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'logo' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('logo')?>">
                                    <span>Daftar Logo</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'logo' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('logo/tambah')?>">
                                    <span>Tambah Logo</span>
                                </a>
                            </li>
                        </ul>
                    </li>-->
                    <li class="has-sub <?=($modul == 'Download' ? 'active' : '')?>">
                        <a href="#">
                            <span>Upload File</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-download"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'Download' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('Download')?>">
                                    <span>List Unggahan</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'Download' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('Download/tambah')?>">
                                    <span>Tambah Unggahan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'kerjasama' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Kerjasama</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-university"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'kerjasama' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('kerjasama')?>">
                                    <span>Daftar Kerjasama</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'kerjasama' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('kerjasama/tambah')?>">
                                    <span>Tambah Kerjasama</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'jumlahpeminat' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Jumlah Peminat</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-university"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'jumlahpeminat' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('jumlahpeminat')?>">
                                    <span>Daftar Kerjasama</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'jumlahpeminat' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('jumlahpeminat/tambah')?>">
                                    <span>Tambah Kerjasama</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="has-sub <?=($modul == 'penelitian' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Penelitian</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-newspaper-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'penelitian' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('penelitian')?>">
                                    <span>Daftar Penelitian</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'penelitian' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('penelitian/tambah')?>">
                                    <span>Tambah Penelitian</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'publikasi' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Publikasi</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-newspaper-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'publikasi' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('publikasi')?>">
                                    <span>Daftar Publikasi</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'publikasi' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('publikasi/tambah')?>">
                                    <span>Tambah Publikasi</span>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-header">Pegawai</li> -->
                    <!-- <li class="has-sub <?=($modul == 'dosen' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Dosen</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-newspaper-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'dosen' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('dosen')?>">
                                    <span>Daftar Dosen</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'dosen' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('dosen/tambah')?>">
                                    <span>Tambah Dosen</span>
                                </a>
                            </li>
                        </ul>
                    </li>-->
                    <li class="has-sub <?=($modul == 'staff' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Staff</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-user-plus"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'staff' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('staff')?>">
                                    <span>Daftar Staff</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'staff' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('staff/tambah')?>">
                                    <span>Tambah Staff</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Halaman</li>
                    <li class="has-sub <?=($modul == 'halaman' ? 'active' : '')?>">
                        <a href="#">
                            <span>Umum</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-align-left"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'halaman' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('halaman')?>">
                                    <span>List Halaman</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'halaman' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('halaman/tambah')?>">
                                    <span>Tambah Halaman</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'halaman' AND $method == 'manajemen-menu') ? 'active' : '')?>">
                                <a href="<?=admin_url('halaman/manajemen-menu')?>">
                                    <span>Manajemen Menu</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'Laboratorium' ? 'active' : '')?>">
                        <a href="#">
                            <span>Laboratorium</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-flask"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'Laboratorium' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('Laboratorium')?>">
                                    <span>List Laboratorium</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'Laboratorium' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('Laboratorium/tambah')?>">
                                    <span>Tambah Laboratorium</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'Akademik' ? 'active' : '')?>">
                        <a href="#">
                            <span>Akademik(Program)</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-pencil"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'Akademik' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('Akademik')?>">
                                    <span>List Akademik</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'Kurikulum' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('Kurikulum')?>">
                                    <span>Kurikulum</span>
                                </a>
                            </li>
                            <!--<li class="<?=(($modul == 'Akademik' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('Akademik/tambah')?>">
                                    <span>Tambah Akademik(Indonesia)</span>
                                </a>
                            </li>-->
                        </ul>
                    </li>
                    <li class="nav-header">Pengaturan</li>
                    <li class="has-sub <?=($modul == 'pengaturan' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Tentang Situs</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-gear"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'pengaturan' AND $method == '') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengaturan')?>">
                                    <span>Informasi Umum</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'pengaturan' AND $method == 'organisasi') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengaturan/organisasi')?>">
                                    <span>Struktur Organisasi</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'pengaturan' AND $method == 'dekan') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengaturan/dekan')?>">
                                    <span>Tentang Ketua Departemen</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'pengaturan' AND $method == 'p_akademik') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengaturan/akademik')?>">
                                    <span>Akademik</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'pengaturan' AND $method == 'p_kemahasiswaan') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengaturan/kemahasiswaan')?>">
                                    <span>Kemahasiswaan dan Alumni</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'pengaturan' AND $method == 'color') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengaturan/color')?>">
                                    <span>Pengaturan Website</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub <?=($modul == 'pengguna' ? 'active' : '')?>">
                        <a href="javascript:;">
                            <span>Pengguna</span>
                            <b class="caret pull-right"></b>
                            <i class="fa fa-user "></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="<?=(($modul == 'pengguna' AND ($method == '' OR $method == 'edit')) ? 'active' : '')?>">
                                <a href="<?=admin_url('pengguna')?>">
                                    <span>Daftar Pengguna</span>
                                </a>
                            </li>
                            <li class="<?=(($modul == 'pengguna' AND $method == 'tambah') ? 'active' : '')?>">
                                <a href="<?=admin_url('pengguna/tambah')?>">
                                    <span>Tambah Pengguna</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-bg"></div>
