<?php $modul = $this->uri->segment(2); $method = $this->uri->segment(3); ?>
<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					<div 
						id="m_ver_menu" 
						class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
						data-menu-vertical="true"
						data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
						>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item <?=($modul == '' ? 'm-menu__item--active' : '')?>" aria-haspopup="true" >
								<a  href="<?=dosen_url()?>" class="m-menu__link ">
									<i class="m-menu__link-icon la la-caret-right"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=($modul == 'biodata' ? 'm-menu__item--active' : '')?>" aria-haspopup="true" >
								<a  href="<?=dosen_url('biodata')?>" class="m-menu__link ">
									<i class="m-menu__link-icon la la-caret-right"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Biodata
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=($modul == 'publikasi' ? 'm-menu__item--active' : '')?>" aria-haspopup="true" >
								<a  href="<?=dosen_url('publikasi')?>" class="m-menu__link ">
									<i class="m-menu__link-icon la la-caret-right"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Publikasi
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=($modul == 'penelitian' ? 'm-menu__item--active' : '')?>" aria-haspopup="true" >
								<a  href="<?=dosen_url('penelitian')?>" class="m-menu__link ">
									<i class="m-menu__link-icon la la-caret-right"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Penelitian
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=($modul == 'pengabdian' ? 'm-menu__item--active' : '')?>" aria-haspopup="true" >
								<a  href="<?=dosen_url('pengabdian')?>" class="m-menu__link ">
									<i class="m-menu__link-icon la la-caret-right"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Pengabdian Masyarakat
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=($modul == 'kuliah' ? 'm-menu__item--active' : '')?>" aria-haspopup="true" >
								<a  href="<?=dosen_url('kuliah')?>" class="m-menu__link ">
									<i class="m-menu__link-icon la la-caret-right"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Mata Kuliah
											</span>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>