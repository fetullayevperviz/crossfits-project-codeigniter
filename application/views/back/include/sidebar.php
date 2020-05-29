<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <ul class="side-menu metismenu">
                    <li class="active">
                        <a href="<?=linkto('admin');?>"><i class="sidebar-item-icon ti-home"></i>
                            <span class="nav-label">Ana Səhifə</span></a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/qeydiyyat');?>"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Qeydiyyat</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/gundelik_qeydiyyat');?>"><i class="sidebar-item-icon ti-layout-grid4"></i>
                            <span class="nav-label">Gündəlik Qeydiyyat</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/sliders');?>"><i class="sidebar-item-icon ti-video-camera"></i>
                            <span class="nav-label">Slider</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/exercises');?>"><i class="sidebar-item-icon ti-image"></i>
                            <span class="nav-label">Crossfits Məşqləri</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/testimiones');?>"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Şəhadətnamələr</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/social_media');?>"><i class="sidebar-item-icon ti-sharethis"></i>
                            <span class="nav-label">Sosial Şəbəkələr</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-server"></i>
                            <span class="nav-label">Proteinlər</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?=linkto('admin/zulallar');?>">Zülallar</a>
                            </li>
                            <li>
                                <a href="<?=linkto('admin/amin_tursulari');?>">Amin Turşuları</a>
                            </li>
                            <li>
                                <a href="<?=linkto('admin/yag_yandiranlar');?>">Yağ Yandıranlar</a>
                            </li>
                            <li>
                                <a href="<?=linkto('admin/vitaminler');?>">Vitaminlər</a>
                            </li>
                            <li>
                                <a href="<?=linkto('admin/ceki_ve_hecm');?>">Çəki və Həcm</a>
                            </li>
                            <li>
                                <a href="<?=linkto('admin/guc_enerji');?>">Güc və Enerji</a>
                            </li>
                            <li>
                                <a href="<?=linkto('admin/diger_mehsullar');?>">Digər Məhsullar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/programs');?>"><i class="sidebar-item-icon ti-desktop"></i>
                            <span class="nav-label">Programlar</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/gallery');?>"><i class="sidebar-item-icon ti-gallery"></i>
                            <span class="nav-label">Qalereya</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/triner');?>"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Trinerlər</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/message');?>"><i class="sidebar-item-icon ti-email"></i>
                            <span class="nav-label">Mesajlar</span>
                        </a>
                    </li>
                    <?php $info = session('read','admininfo');?>
                    <?php if($info->permission != 0){ ?>
                    <li style="display: none;">
                        <a href="<?=linkto('admin/users');?>"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">İstifadəçilər</span>
                        </a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="<?=linkto('admin/users');?>"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">İstifadəçilər</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($info->permission != 0){ ?>
                    <li style="display: none;">
                        <a href="<?=linkto('admin/settings');?>"><i class="sidebar-item-icon ti-settings"></i>
                            <span class="nav-label">Parametrlər</span>
                        </a>
                    </li>
                   <?php } else { ?>
                    <li>
                        <a href="<?=linkto('admin/settings');?>"><i class="sidebar-item-icon ti-settings"></i>
                            <span class="nav-label">Parametrlər</span>
                        </a>
                    </li>
                   <?php } ?>
                    <li>
                        <a href="<?=base_url();?>" target="_blank"><i class="sidebar-item-icon ti-shift-left"></i>
                            <span class="nav-label">Sayta Get</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=linkto('admin/close');?>"><i class="sidebar-item-icon ti-shift-right"></i>
                            <span class="nav-label">Çıxış</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

