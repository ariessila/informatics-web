    <!-- Top Navbar section -->
	<nav class="top-navbar">
		<div class="container">
			<ul class="main-menu top-menu">
				<li><a href="<?=$pengaturan->sitemap_link?>">Sitemap</a></li>
				<li><a href="#">Quick Access</a></li>
				<li><a>|</a></li>
				<li><a href="javascript:;" class="lang-button" onclick="switch_lang('id')" title="Bahasa Indonesia">ID<img src="<?=home_assets()?>img/id.png"></a></li>
				<li class="active"><a href="javascript:;" class="lang-button" onclick="switch_lang('en')" title="English">EN<img src="<?=home_assets()?>img/en.png"></a></li>
			</ul>
		</div>
	</nav>
	<!-- Top Navbar section End -->
	
	<!-- header section -->
	<header class="header-section ">
		<div class="container">
			<!-- logo -->
			<a href="<?=site_url()?>" class="site-logo"><img src="<?=home_assets()?>img/unhas.png" alt=""></a>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-info">
				<div class="hf-item">
					<i class="fa fa-clock-o"></i>
					<p><span>Activity time:</span>Monday - Friday: 08 AM - 06 PM</p>
				</div>
				<div class="hf-item">
					<i class="fa fa-map-marker"></i>
					<p><span>Find us:</span><?=$pengaturan->alamat_en?></p>
				</div>
			</div>
		</div>
	</header>
	<!-- header section end-->


	<!-- Header section  -->
	<nav class="nav-section">
		<div class="container">
			<div class="nav-right">
				<a href="<?=$pengaturan->sitemap_link?>">Sitemap</a>
				<a href="#">Quick Access</a>
				<a>|</a>
				<a href="javascript:;" class="lang-button" onclick="switch_lang('id')" title="Bahasa Indonesia"><img src="<?=home_assets()?>img/in.png"></a>
				<a href="javascript:;" class="lang-button" onclick="switch_lang('en')" title="English"><img src="<?=home_assets()?>img/en.png"></a>
			</div>
<?php
    $parent = json_decode($this->crud->gda('manajemen_menu', array('id' => 12))['serialization'], TRUE);
    if (!$parent) { ?>
            <ul class="main-menu">
                <li class="active"><a href="#">Home</a></li>
            </ul>
    <?php } else { ?>
            <ul class="main-menu">
    <?php
        foreach ($parent as $key1 => $value1) {
            if (sizeof($value1) == 1) { ?>
                <li class="" data-id="<?=$value1['id']?>">
                    <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['link_en'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : '').($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['link_en'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_en'])?></a>
                </li>
            <?php } else { ?>
                <li class="dropdown" data-id="<?=$value1['id']?>">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
					 aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_en'])?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
            <?php
                foreach ($value1['children'] as $key2 => $value2) {
                    if (sizeof($value2) == 1) { ?>
                        <li class="" data-id="<?=$value2['id']?>">
                            <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['link_en'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : '').($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['link_en'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_en'])?></a>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown" data-id="<?=$value2['id']?>">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
					 aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_en'])?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                    <?php
                        foreach ($value2['children'] as $key3 => $value3) {
                            if (sizeof($value3) == 1) { ?>
                                <li class="" data-id="<?=$value3['id']?>">
                                    <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['link_en'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : '').($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['link_en'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_en'])?></a>
                                </li>
                            <?php } else { ?>
                                <li class="dropdown" data-id="<?=$value3['id']?>">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_en'])?><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                            <?php
                                foreach ($value3['children'] as $key4 => $value4) {
                                    if (sizeof($value4) == 1) { ?>
                                        <li class="" data-id="<?=$value4['id']?>">
                                            <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['link_en'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : '').($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['link_en'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_en'])?></a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="dropdown" data-id="<?=$value4['id']?>">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_en'])?><span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                    <?php
                                        foreach ($value4['children'] as $key5 => $value5) { ?>
                                                <li class="" data-id="<?=$value5['id']?>">
                                                    <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['link_en'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : '').($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['link_en'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['nama_en'])?></a>
                                                </li>
                                        <?php } ?>
                                            </ul>
                                        </li>
                                    <?php }
                                } ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        } ?>
                            </ul>
                        </li>
                        <?php
                    }
                } ?>
                    </ul>
                </li>
            <?php }
        } ?>
            </ul>
    <?php }
?>
            </div>
        </nav>
