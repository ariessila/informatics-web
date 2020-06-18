        <div id="header" class="header navbar navbar-fixed-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand"><span class="navbar-logo"></span> Administrator</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=site_url()?>" target="_blank">View Website</a></li>
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=upload_url('userpics').(empty($this->session->foto) ? 'no_image.jpg' : $this->session->foto)?>" alt="" />
                            <span class="hidden-xs"><?=$this->session->fullname?></span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="<?=admin_url('profil')?>">Lihat Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=login_url('logout')?>">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
