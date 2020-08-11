<main class="main">

    <header class="header">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <div class="navigation-trigger__inner">
                <i class="navigation-trigger__line"></i>
                <i class="navigation-trigger__line"></i>
                <i class="navigation-trigger__line"></i>
            </div>
        </div>

        <div class="header__logo hidden-sm-down">
            <h1><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>/assets/img/Plasindo.PNG" alt="homepage" class="light-logo" width="200px" height="50px" /></a></h1>
        </div>

        <form method="post" action="<?php echo base_url() ?>search" class="search">
            <div class="search__inner">
                <input type="text" name="search" class="search__text" placeholder="Search for memo here..">
                <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
            </div>
        </form>

        <ul class="top-nav">
            <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

            <?php 
            foreach ($getNotif as $n) {
                    # code...
                $notif  = $n['notif'];
            }
            if ($notif > '0') { 
                $class = "top-nav__notify";
            }
            else{
                $class = "";
            }
            ?>
            <li class="dropdown top-nav__notifications">
                <a href="" data-toggle="dropdown" class="<?php echo $class; ?>">
                    <i class="zmdi zmdi-notifications"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                    <div class="listview listview--hover">
                        <div class="listview__header">
                            Notifications

                            <div class="actions">
                                <a href="" class="actions__item zmdi zmdi-check-all" data-ma-action="notifications-clear"></a>
                            </div>
                        </div>

                        <div class="listview__scroll scrollbar-inner">
                            <?php
                            foreach ($viewnotif as $v) {
                                ?>
                                <a href="<?php echo base_url() ?>memo/notification" class="listview__item">
                                    <button class="btn btn-sm btn-outline-success"><?php echo $v['no_memo']; ?></button>&nbsp; &nbsp; &nbsp; 

                                    <div class="listview__content">
                                        <div class="listview__heading"><?php echo $v['nama']; ?></div>
                                        <p><?php echo $v['keterangan']; ?></p>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="p-1"></div>
                    </div>
                </div>
            </li>

            <li class="dropdown hidden-xs-down">
                <a href="" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

                <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                    <div class="row app-shortcuts">
                        <a class="col-4 app-shortcuts__item" href="<?php echo base_url() ?>user/profile">
                            <i class="zmdi zmdi-settings bg-red"></i>
                            <small class="">Profile</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="<?php echo base_url() ?>memo">
                            <i class="zmdi zmdi-file-text bg-blue"></i>
                            <small class="">Memo</small>
                        </a>
                        <a class="col-4 app-shortcuts__item" href="<?php echo base_url() ?>guide">
                            <i class="zmdi zmdi-book bg-teal"></i>
                            <small class="">Guide</small>
                        </a>
                    </div>
                </div>
            </li>

            <li class="dropdown hidden-xs-down">
                <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                <div class="dropdown-menu dropdown-menu-right">
                    <!-- <div class="dropdown-item theme-switch">
                        Theme Switch

                        <div class="btn-group btn-group--colors mt-2" data-toggle="buttons">
                            <label class="btn bg-green active"><input type="radio" value="green" autocomplete="off" checked></label>
                            <label class="btn bg-blue"><input type="radio" value="blue" autocomplete="off"></label>
                            <label class="btn bg-red"><input type="radio" value="red" autocomplete="off"></label>
                            <label class="btn bg-orange"><input type="radio" value="orange" autocomplete="off"></label>
                            <label class="btn bg-teal"><input type="radio" value="teal" autocomplete="off"></label>

                            <br>

                            <label class="btn bg-cyan"><input type="radio" value="cyan" autocomplete="off"></label>
                            <label class="btn bg-blue-grey"><input type="radio" value="blue-grey" autocomplete="off"></label>
                            <label class="btn bg-purple"><input type="radio" value="purple" autocomplete="off"></label>
                            <label class="btn bg-indigo"><input type="radio" value="indigo" autocomplete="off"></label>
                            <label class="btn bg-lime"><input type="radio" value="lime" autocomplete="off"></label>
                        </div>
                        
                    </div> -->
                    <a href="<?php echo base_url() ?>user/profile" class="dropdown-item">View Profile</a>
                    <a href="<?php echo base_url() ?>backend/logout" class="dropdown-item">Log Out</a>
                </div>
            </li>

        </ul>
    </header>
    <?php
    $pict = rand(1,8);
    ?>
    <aside class="sidebar">
        <div class="scrollbar-inner">
            <div class="user">
                <div class="user__info" data-toggle="dropdown">
                    <img class="user__img" src="<?php echo base_url(); ?>assets/v2/demo/img/profile-pics/<?php echo $pict; ?>.jpg" alt="">
                    <div>
                        <div class="user__name"><?php echo $this->session->userdata('nama'); ?></div>
                        <div class="user__email"><?php echo $this->session->userdata('email'); ?></div>
                    </div>
                </div>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo base_url() ?>user/profile">View Profile</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>backend/logout">Logout</a>
                </div>
            </div>

            <ul class="navigation">
                <li class="<?php echo activate_menu('dashboard'); ?> navigation"><a href="<?php echo base_url(); ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>

                <li class="<?php if($this->uri->segment(2)=='profile') echo "navigation__active"; ?> navigation">
                    <a href="<?php echo base_url(); ?>user/profile"><i class="zmdi zmdi-settings"></i> My Account</a>
                </li>

                <?php if($this->session->userdata('level') == 'Super Admin' OR $this->session->userdata('c1') == '1') { ?>
                    <li class="<?php if($this->uri->segment(2)=='add' OR $this->uri->segment(2)=='data') echo "navigation__sub--active navigation__sub--toggled"; ?>  navigation__sub">
                        <a href=""><i class="zmdi zmdi-widgets"></i> User Management</a>

                        <ul>
                            <li class="<?php if($this->uri->segment(2)=='data') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>user/data">User List</a></li>
                            <li class="<?php if($this->uri->segment(2)=='add') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>user/add">Add New User</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="<?php if($this->uri->segment(2)=='create' OR $this->uri->segment(2)=='item' OR $this->uri->segment(2)=='notification' OR $this->uri->segment(2)=='outstanding' OR $this->uri->segment(2)=='expired' OR $this->uri->segment(2)=='done' OR $this->uri->segment(2)=='doneprod' OR $this->uri->segment(2)=='memo_reject') echo "navigation__sub--active navigation__sub--toggled"; ?>  navigation__sub">
                    <a href=""><i class="zmdi zmdi-collection-text"></i> Memo</a>

                    <ul>
                        <?php if($this->session->userdata('level') == 'Super Admin' OR $this->session->userdata('level') == 'PPIC' OR $this->session->userdata('level') == 'QC' OR $this->session->userdata('level') == 'R&D' OR $this->session->userdata('level') == 'PRODUKSI'){ ?>
                            <li class="<?php if($this->uri->segment(2)=='notification') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/notification">Memo Approval</a></li>
                        <?php } ?>
                        <?php if($this->session->userdata('level') == 'User'){ ?>
                            <li class="<?php if($this->uri->segment(2)=='item') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/item">Memo List</a></li>
                        <?php }else{ ?>
                            <li class="<?php if($this->uri->segment(2)=='outstanding') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/outstanding">Memo Outstanding</a></li>
                        <?php } ?>
                        <?php if($this->session->userdata('level') == 'Super Admin' OR $this->session->userdata('level') == 'Admin' OR $this->session->userdata('level') == 'PPIC'){ ?>
                            <li class="<?php if($this->uri->segment(2)=='create') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/create">Add New Memo</a></li>
                            <li class="<?php if($this->uri->segment(2)=='expired') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/expired">Memo Expired</a></li>  
                        <?php } elseif($this->session->userdata('c2') == '1') { ?>
                            <li class="<?php if($this->uri->segment(2)=='create') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/create">Add New Memo</a></li>
                            <!-- added new menu (PP PL 1 LAMINASI) -->
                        <?php } 
                        if($this->session->userdata('level') == 'Super Admin' || $this->session->userdata('section') == 'PL 1 LAMINASI' || $this->session->userdata('section') == 'PL 1 EXTRUSION') { ?>
                            <li class="<?php if($this->uri->segment(2)=='done') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/done">Memo Finish</a></li>
                        <?php } 
                        if($this->session->userdata('level') != 'User') { ?>
                            <li class="<?php if($this->uri->segment(2)=='memo_reject') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/memo_reject">Memo Reject</a></li>
                            <li class="<?php if($this->uri->segment(2)=='doneprod') echo "navigation__active"; ?>"><a href="<?php echo base_url() ?>memo/doneprod">Memo Finish Produksi</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php if($this->session->userdata('level') == 'Super Admin' OR $this->session->userdata('c3') == '1') { ?>
                    <li class="<?php echo activate_menu('guide'); ?> navigation"><a href="<?php echo base_url() ?>guide"><i class="zmdi zmdi-book"></i> Guide</a></li>
                <?php } ?>
                <li><a href="<?php echo base_url() ?>backend/logout"><i class="zmdi zmdi-power"></i> Logout</a></li>

            </ul>
        </div>
    </aside>

</main>