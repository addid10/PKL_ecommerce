                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Home</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php require_once('url.php'); if($url=='index.php'||$url==''){echo'active';}else{echo'';} ?>">
                                    <a href="../home/index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php require_once('url.php'); if($url=='profile.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/profile.php">
                                        <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>PF</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Profile</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Tables</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php require_once('url.php'); if($url=='pembelian.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/pembelian.php">
                                        <span class="pcoded-micon"><i class="ti-shopping-cart-full"></i><b>TP</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabel Pembelian</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php require_once('url.php'); if($url=='review.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/review.php">
                                        <span class="pcoded-micon"><i class="ti-comments"></i><b>TR</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabel Review</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php require_once('url.php'); if($url=='barang.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/barang.php">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>TB</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabel Barang</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php require_once('url.php'); if($url=='users.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/users.php">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>DU</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar User</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Others</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php require_once('url.php'); if($url=='notifikasi.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/notifikasi.php">
                                        <span class="pcoded-micon"><i class="ti-bell"></i><b>NF</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Notifikasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="<?php require_once('url.php'); if($url=='inbox.php'){echo'active';}else{echo'';} ?>">
                                    <a href="../home/inbox.php">
                                        <span class="pcoded-micon"><i class="ti-email"></i><b>PM</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pesan Masuk</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>