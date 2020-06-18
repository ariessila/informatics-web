    <!-- Top Navbar section -->
    <nav class="top-navbar">
		<div class="container">
			<ul class="main-menu top-menu">
				<li><a href="<?=$pengaturan->sitemap_link?>">Sitemap</a></li>
				<li><a href="<?=base_url('login')?>">Login</a></li>
				<li><a>|</a></li>
				<li class="active"><a href="javascript:;" class="lang-button" onclick="switch_lang('id')" title="Bahasa Indonesia">IN <img src="<?=home_assets()?>img/id.png"></a></li>
				<li><a href="javascript:;" class="lang-button" onclick="switch_lang('en')" title="English">EN <img src="<?=home_assets()?>img/en.png"></a></li>
			</ul>
		</div>
	</nav>
	<!-- Top Navbar section End -->

	<!-- header section -->
	<div  class="sticky">
		<header class="header-section " style="padding:10px 0px">
			<div class="container">
				<!-- logo -->
				<a href="<?=site_url()?>" class="site-logo"><img src="<?=home_assets()?>img/infor-logo-id.png" alt=""></a>
				<div class="nav-switch">
					<i class="fa fa-bars"></i>
				</div>
				<!--<div class="header-info">
					<div class="hf-item top-header-desc">
						<i class="fa fa-clock-o"></i>
						<p><span>Jam Kerja:</span>Senin - Jumat: 08:00 - 16:00 WITA</p>
					</div>
					<div class="hf-item top-header-desc">
						<i class="fa fa-map-marker"></i>
						<p><span>Alamat:</span><?=$pengaturan->alamat_id?></p>
					</div>
				</div>-->
			</div>
		</header>
		<!-- header section end-->


		<!-- Header section  -->
		<nav class="nav-section">
			<div class="container">
				<div class="nav-right">
					<a href="<?=$pengaturan->sitemap_link?>">Sitemap</a>
					<a href="<?=base_url('login')?>">Login</a>
					<a>|</a>
					<a href="javascript:;" class="lang-button" onclick="switch_lang('id')" title="Bahasa Indonesia"><img src="<?=home_assets()?>img/id.png"></a>
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
	                    <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['link_id'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : (($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['tipe']) == 'akademik' ? ('akademik/') : (''))).($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['link_id'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_id'])?></a>
	                </li>
	            <?php } else { ?>
	                <li class="dropdown" data-id="<?=$value1['id']?>">
	                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value1['id']))['nama_id'])?><span class="caret"></span></a>
	                    <ul class="dropdown-menu">
	            <?php
	                foreach ($value1['children'] as $key2 => $value2) {
	                    if (sizeof($value2) == 1) { ?>
	                        <li class="" data-id="<?=$value2['id']?>">
	                            <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['link_id'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : (($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['tipe']) == 'akademik' ? ('akademik/') : (''))).($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['link_id'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_id'])?></a>
	                        </li>
	                    <?php } else { ?>
	                        <li class="dropdown" data-id="<?=$value2['id']?>">
	                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value2['id']))['nama_id'])?><span class="caret"></span></a>
	                            <ul class="dropdown-menu">
	                    <?php
	                        foreach ($value2['children'] as $key3 => $value3) {
	                            if (sizeof($value3) == 1) { ?>
	                                <li class="" data-id="<?=$value3['id']?>">
	                                    <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['link_id'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : (($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['tipe']) == 'akademik' ? ('akademik/') : (''))).($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['link_id'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_id'])?></a>
	                                </li>
	                            <?php } else { ?>
	                                <li class="dropdown" data-id="<?=$value3['id']?>">
	                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
	                                aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value3['id']))['nama_id'])?><span class="caret"></span></a>
	                                    <ul class="dropdown-menu">
	                            <?php
	                                foreach ($value3['children'] as $key4 => $value4) {
	                                    if (sizeof($value4) == 1) { ?>
	                                        <li class="" data-id="<?=$value4['id']?>">
	                                            <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['link_id'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : (($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['tipe']) == 'akademik' ? ('akademik/') : (''))).($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['link_id'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_id'])?></a>
	                                        </li>
	                                    <?php } else { ?>
	                                        <li class="dropdown" data-id="<?=$value4['id']?>">
	                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
	                                    aria-expanded="false"><?=($this->crud->gda('halaman', array('id_halaman' => $value4['id']))['nama_id'])?><span class="caret"></span></a>
	                                            <ul class="dropdown-menu">
	                                    <?php
	                                        foreach ($value4['children'] as $key5 => $value5) { ?>
	                                                <li class="" data-id="<?=$value5['id']?>">
	                                                    <a href="<?=($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['link_id'] == '#' ? '' : site_url()).(($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['atribut']) != 'default' ? (($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['tipe']) == 'Lab' ? ('lab/') : ('pages/')) : (($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['tipe']) == 'akademik' ? ('akademik/') : (''))).($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['link_id'])?>"><?=($this->crud->gda('halaman', array('id_halaman' => $value5['id']))['nama_id'])?></a>
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
    </div>
