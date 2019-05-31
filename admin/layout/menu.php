                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Home</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php require_once('url.php'); if($url=='home'||$url==''){echo'active';}else{echo'';} ?>">
                                    <a href="../home">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Data</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php if($url=='pembelian'){echo'active';}else{echo'';} ?>">
                                    <a href="../pembelian">
                                        <span class="pcoded-micon"><i class="ti-shopping-cart-full"></i><b>TP</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabel Pembelian</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($url=='review'){echo'active';}else{echo'';} ?>">
                                    <a href="../review">
                                        <span class="pcoded-micon"><i class="ti-comments"></i><b>TR</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabel Review</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($url=='barang'){echo'active';}else{echo'';} ?>">
                                    <a href="../barang">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>TB</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabel Barang</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($url=='daftar_users'){echo'active';}else{echo'';} ?>">
                                    <a href="../daftar_users">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>DU</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar User</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Others</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php if($url=='notifikasi'){echo'active';}else{echo'';} ?>">
                                    <a href="../notifikasi">
                                        <span class="pcoded-micon"><i class="ti-bell"></i><b>NF</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Notifikasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php if($url=='pesan'){echo'active';}else{echo'';} ?>">
                                    <a href="../pesan">
                                        <span class="pcoded-micon"><i class="ti-email"></i><b>PM</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pesan Masuk</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>