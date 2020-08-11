<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/dropzone/dist/dropzone.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/flatpickr/dist/flatpickr.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/nouislider/distribute/nouislider.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/v2/vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">

        <!-- Demo only -->
        <link rel="stylesheet" href="demo/css/demo.css">
    </head>

    <body data-ma-theme="green">
        <main class="main">
            <<!-- div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div> -->

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1><a href="index.html">Material Admin 2.0</a></h1>
                </div>

                <form class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                        <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                    </div>
                </form>

                <ul class="top-nav">
                    <li class="hidden-xl-up"><a href="" data-ma-action="search-open"><i class="zmdi zmdi-search"></i></a></li>

                    <li class="dropdown">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-email"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                            <div class="listview listview--hover">
                                <div class="listview__header">
                                    Messages

                                    <div class="actions">
                                        <a href="messages.html" class="actions__item zmdi zmdi-plus"></a>
                                    </div>
                                </div>

                                <a href="" class="listview__item">
                                    <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            David Belle <small>12:01 PM</small>
                                        </div>
                                        <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Jonathan Morris
                                            <small>02:45 PM</small>
                                        </div>
                                        <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Fredric Mitchell Jr.
                                            <small>08:21 PM</small>
                                        </div>
                                        <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Glenn Jecobs
                                            <small>08:43 PM</small>
                                        </div>
                                        <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                                    <div class="listview__content">
                                        <div class="listview__heading">
                                            Bill Phillips
                                            <small>11:32 PM</small>
                                        </div>
                                        <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                    </div>
                                </a>

                                <a href="" class="view-more">View all messages</a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown top-nav__notifications">
                        <a href="" data-toggle="dropdown" class="top-nav__notify">
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
                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">David Belle</div>
                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Jonathan Morris</div>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Fredric Mitchell Jr.</div>
                                            <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Glenn Jecobs</div>
                                            <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Bill Phillips</div>
                                            <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">David Belle</div>
                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Jonathan Morris</div>
                                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                        </div>
                                    </a>

                                    <a href="" class="listview__item">
                                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                                        <div class="listview__content">
                                            <div class="listview__heading">Fredric Mitchell Jr.</div>
                                            <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-1"></div>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-check-circle"></i></a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                            <div class="listview listview--hover">
                                <div class="listview__header">Tasks</div>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">HTML5 Validation Report</div>

                                        <div class="progress">
                                            <div class="progress-bar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Google Chrome Extension</div>

                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Social Intranet Projects</div>

                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Bootstrap Admin Template</div>

                                        <div class="progress">
                                            <div class="progress-bar bg-info" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="listview__item">
                                    <div class="listview__content">
                                        <div class="listview__heading">Youtube Client App</div>

                                        <div class="progress">
                                            <div class="progress-bar bg-danger" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="view-more">View all tasks</a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                            <div class="row app-shortcuts">
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-calendar bg-red"></i>
                                    <small class="">Calendar</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-file-text bg-blue"></i>
                                    <small class="">Files</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-email bg-teal"></i>
                                    <small class="">Email</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-trending-up bg-blue-grey"></i>
                                    <small class="">Reports</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-view-headline bg-orange"></i>
                                    <small class="">News</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="">
                                    <i class="zmdi zmdi-image bg-light-green"></i>
                                    <small class="">Gallery</small>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item theme-switch">
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
                            </div>
                            <a href="" class="dropdown-item">Fullscreen</a>
                            <a href="" class="dropdown-item">Clear Local Storage</a>
                        </div>
                    </li>

                    <li class="hidden-xs-down">
                        <a href="" data-ma-action="aside-open" data-ma-target=".chat" class="top-nav__notify">
                            <i class="zmdi zmdi-comment-alt-text"></i>
                        </a>
                    </li>
                </ul>
            </header>

            <aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/8.jpg" alt="">
                            <div>
                                <div class="user__name">Malinda Hollaway</div>
                                <div class="user__email">malinda-h@gmail.com</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">View Profile</a>
                            <a class="dropdown-item" href="">Settings</a>
                            <a class="dropdown-item" href="">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>

                        <li class="navigation__sub">
                            <a href=""><i class="zmdi zmdi-view-week"></i> Variants</a>

                            <ul>
                                <li><a href="hidden-sidebar.html">Hidden Sidebar</a></li>
                                <li><a href="boxed-layout.html">Boxed Layout</a></li>
                                <li><a href="hidden-sidebar-boxed-layout.html">Boxed Layout with Hidden Sidebar</a></li>
                                <li><a href="top-navigation.html">Top Navigation</a></li>
                            </ul>
                        </li>

                        <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>

                        <li><a href="widgets.html"><i class="zmdi zmdi-widgets"></i> Widgets</a></li>

                        <li class="navigation__sub">
                            <a href=""><i class="zmdi zmdi-view-list"></i> Tables</a>

                            <ul>
                                <li><a href="html-table.html">HTML Table</a></li>
                                <li><a href="data-table.html">Data Table</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub navigation__sub--active navigation__sub--toggled">
                            <a href=""><i class="zmdi zmdi-collection-text"></i> Forms</a>

                            <ul>
                                <li><a href="form-elements.html">Basic Form Elements</a></li>
                                <li class="navigation__active"><a href="form-components.html">Form Components</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href=""><i class="zmdi zmdi-swap-alt"></i> User Interface</a>

                            <ul>
                                <li><a href="colors.html">Colors</a></li>
                                <li><a href="css-animations.html">CSS Animations</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="icons.html">Icons</a></li>
                                <li><a href="listview.html">Listview</a></li>
                                <li><a href="toolbars.html">Toolbars</a></li>
                                <li><a href="cards.html">Cards</a></li>
                                <li><a href="alerts.html">Alerts</a></li>
                                <li><a href="badges.html">Badges</a></li>
                                <li><a href="breadcrumbs.html">Bredcrumbs</a></li>
                                <li><a href="jumbotron.html">Jumbotron</a></li>
                                <li><a href="navs.html">Navs</a></li>
                                <li><a href="pagination.html">Pagination</a></li>
                                <li><a href="progress.html">Progress</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href=""><i class="zmdi zmdi-group-work"></i> Javascript Components</a>

                            <ul class="navigation__sub">
                                <li><a href="carousel.html">Carousel</a></li>
                                <li><a href="collapse.html">Collapse</a></li>
                                <li><a href="dropdowns.html">Dropdowns</a></li>
                                <li><a href="modals.html">Modals</a></li>
                                <li><a href="popover.html">Popover</a></li>
                                <li><a href="tabs.html">Tabs</a></li>
                                <li><a href="tooltips.html">Tooltips</a></li>
                                <li><a href="notifications-alerts.html">Notifications & Alerts</a></li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href=""><i class="zmdi zmdi-trending-up"></i> Charts</a>

                            <ul>
                                <li><a href="flot-charts.html">Flot</a></li>
                                <li><a href="other-charts.html">Other Charts</a></li>
                            </ul>
                        </li>

                        <li><a href="calendar.html"><i class="zmdi zmdi-calendar"></i> Calendar</a></li>

                        <li><a href="photo-gallery.html"><i class="zmdi zmdi-image"></i> Photo Gallery</a></li>

                        <li class="navigation__sub">
                            <a href=""><i class="zmdi zmdi-collection-item"></i> Sample Pages</a>

                            <ul>
                                <li><a href="profile-about.html">Profile</a></li>
                                <li><a href="messages.html">Messages</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="groups.html">Groups</a></li>
                                <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="todo-lists.html">Todo Lists</a></li>
                                <li><a href="notes.html">Notes</a></li>
                                <li><a href="login.html">Login & SignUp</a></li>
                                <li><a href="lockscreen.html">Lockscreen</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="empty.html">Empty Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>

            <aside class="chat">
                <div class="chat__header">
                    <h2 class="chat__title">Chat <small>Currently 20 contacts online</small></h2>

                    <div class="chat__search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>

                <div class="listview listview--hover chat__buddies scrollbar-inner">
                    <a class="listview__item chat__available">
                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/7.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>hey, how are you doing.</p>
                        </div>
                    </a>

                    <a class="listview__item chat__available">
                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>hmm...</p>
                        </div>
                    </a>

                    <a class="listview__item chat__away">
                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>all good</p>
                        </div>
                    </a>

                    <a class="listview__item">
                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/8.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>morbi leo risus portaac consectetur vestibulum at eros.</p>
                        </div>
                    </a>

                    <a class="listview__item">
                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/6.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>fusce dapibus</p>
                        </div>
                    </a>

                    <a class="listview__item chat__busy">
                        <img src="<?php echo base_url()?>assets/v2/demo/img/profile-pics/9.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">Jeannette Lawson</div>
                            <p>cras mattis consectetur purus sit amet fermentum.</p>
                        </div>
                    </a>
                </div>

                <a href="messages.html" class="btn btn--action btn--fixed btn-danger"><i class="zmdi zmdi-plus"></i></a>
            </aside>

            <section class="content">
                <div class="content__inner">
                    <header class="content__title">
                        <h1>Form Components</h1>

                        <div class="actions">
                            <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                            <a href="" class="actions__item zmdi zmdi-check-all"></a>

                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item">Refresh</a>
                                    <a href="" class="dropdown-item">Manage Widgets</a>
                                    <a href="" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Input group</h2>
                            <small class="card-subtitle">Easily extend form controls by adding text, buttons, or button groups on either side of textual <code>&#x3C;input&#x3E;</code>s.</small>
                        </div>

                        <div class="card-block">
                            <h3 class="card-block__title">Basic example</h3>
                            <p>Place one add-on or button on either side of an input. You may also place one on both sides of an input.</p>

                            <br>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon">https://example.com/users/</span>
                                        <div class="form-group">
                                            <input type="text" class="form-control">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <span class="input-group-addon">0.00</span>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Discounted price">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Recipient's username">
                                            <i class="form-group__bar"></i>
                                        </div>
                                        <span class="input-group-addon">@example.com</span>
                                    </div>

                                    <br>

                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter amount">
                                            <i class="form-group__bar"></i>
                                        </div>
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <h3 class="card-block__title">Sizing</h3>
                            <p>Add the relative form sizing classes to the <code>.input-group</code> itself and contents within will automatically resize. No need for repeating the form control size classes on each element.</p>

                            <br>

                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">@</span>
                                <span class="input-group-addon">@</span>
                                <span class="input-group-addon">@</span>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Large">
                                    <i class="form-group__bar"></i>
                                </div>
                                <span class="input-group-addon">@</span>
                                <span class="input-group-addon">@</span>
                                <span class="input-group-addon">@</span>
                            </div>

                            <br>

                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Default">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>

                            <br>

                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">@</span>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Small">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Input Test Masking</h2>
                            <small class="card-subtitle">Angular 2 directive for input text masking</small>
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" class="form-control input-mask" data-mask="00/00/0000" placeholder="eg: 23/05/2014">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="text" class="form-control input-mask" data-mask="00:00:00" placeholder="eg: 23:06:55">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Date Time</label>
                                        <input type="text" class="form-control input-mask" data-mask="00/00/0000 00:00:00" placeholder="eg: 00/00/0000 00:00:00">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input type="text" class="form-control input-mask" data-mask="00000-000" placeholder="eg: 00000-000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control input-mask" data-mask="000-00-0000000" placeholder="eg: 000-00-0000000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Phone with Odd</label>
                                        <input type="text" class="form-control input-mask" data-mask="(00) 0000-0000" placeholder="eg: (00) 0000-0000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>US Phone Number</label>
                                        <input type="text" class="form-control input-mask" data-mask="(000) 000-0000" placeholder="eg: (000) 000-0000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" class="form-control input-mask" data-mask="000.000.000-00" placeholder="eg: 000.000.000-00">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Money</label>
                                        <input type="text" class="form-control input-mask" data-mask="000.000.000.000.000,00" placeholder="eg: 000.000.000.000.000,00">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3 m-b-20">
                                    <div class="form-group">
                                        <label>IP Address</label>
                                        <input type="text" class="form-control input-mask" data-mask="000.000.000.000" placeholder="eg: 000.000.000.000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Percentage</label>
                                        <input type="text" class="form-control input-mask" data-mask="00000,00%" placeholder="eg: 00000,00%">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Credit Card</label>
                                        <input type="text" class="form-control input-mask" data-mask="0000 0000 0000 0000" placeholder="eg: 0000 0000 0000 0000">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Select 2</h2>
                            <small class="card-subtitle">Select2 gives you a customizable select box with support for searching, tagging, remote data sets, infinite scrolling, and many other highly used options.</small>
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Basic Example - Single Select</label>

                                        <select class="select2">
                                            <option>Subaru</option>
                                            <option>Mitsubishi</option>
                                            <option>Scion</option>
                                            <option>Daihatsu</option>
                                            <option>Hino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Placeholder Text</label>

                                        <select class="select2" data-placeholder="Select a brand">
                                            <option>&nbsp;</option>
                                            <option>Subaru</option>
                                            <option>Mitsubishi</option>
                                            <option>Scion</option>
                                            <option>Daihatsu</option>
                                            <option>Hino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Disabled Select</label>

                                        <select class="select2" data-placeholder="This one is disabled" disabled>
                                            <option>&nbsp;</option>
                                            <option>Subaru</option>
                                            <option>Mitsubishi</option>
                                            <option>Scion</option>
                                            <option>Daihatsu</option>
                                            <option>Hino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Disabled Results</label>

                                        <select class="select2">
                                            <option>Subaru</option>
                                            <option>Mitsubishi</option>
                                            <option disabled>Scion</option>
                                            <option disabled>Daihatsu</option>
                                            <option>Hino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Hide Search Box</label>

                                        <select class="select2" data-minimum-results-for-search="Infinity">
                                            <option>Subaru</option>
                                            <option>Mitsubishi</option>
                                            <option disabled>Scion</option>
                                            <option disabled>Daihatsu</option>
                                            <option>Hino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>Multiple</label>

                                        <select class="select2" multiple data-placeholder="Select one or more choices">
                                            <option>Subaru</option>
                                            <option>Mitsubishi</option>
                                            <option>Scion</option>
                                            <option>Daihatsu</option>
                                            <option>Hino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Drag and drop file upload</h2>
                            <small class="card-subtitle">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.</small>
                        </div>

                        <div class="card-block">
                            <form class="dropzone" id="dropzone-upload"></form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Toggle Switch</h2>
                            <small class="card-subtitle">Material design look alike Toggle Switches based on Radio Boxes</small>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">
                                    <h3 class="card-block__title">Basic Example</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox">
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <h3 class="card-block__title">Active State</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" checked>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-3">
                                    <h3 class="card-block__title">Disabled</h3>

                                    <br>

                                    <div class="form-group">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox" disabled>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="card-block__title">Color variants</h3>
                            <p>Optional color variants can be added using modifier classes</p>

                            <br>

                            <div class="demo-inline-wrapper">
                                <div class="form-group">
                                    <div class="toggle-switch toggle-switch--red">
                                        <input type="checkbox" class="toggle-switch__checkbox">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-inline-wrapper">
                                <div class="form-group">
                                    <div class="toggle-switch toggle-switch--blue">
                                        <input type="checkbox" class="toggle-switch__checkbox">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-inline-wrapper">
                                <div class="form-group">
                                    <div class="toggle-switch toggle-switch--green">
                                        <input type="checkbox" class="toggle-switch__checkbox">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-inline-wrapper">
                                <div class="form-group">
                                    <div class="toggle-switch toggle-switch--cyan">
                                        <input type="checkbox" class="toggle-switch__checkbox">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-inline-wrapper">
                                <div class="form-group">
                                    <div class="toggle-switch toggle-switch--purple">
                                        <input type="checkbox" class="toggle-switch__checkbox">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-inline-wrapper">
                                <div class="form-group">
                                    <div class="toggle-switch toggle-switch--amber">
                                        <input type="checkbox" class="toggle-switch__checkbox">
                                        <i class="toggle-switch__helper"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Date Time Picker</h2>
                            <small class="card-subtitle">Flatpickr is a lightweight and powerful datetime picker.</small>
                        </div>

                        <div class="card-block">

                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Date and time picker</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                            <input type="text" class="form-control datetime-picker" placeholder="Pick a date & time">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Date picker</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                            <input type="text" class="form-control date-picker" placeholder="Pick a date">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Time picker</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                        <div class="form-group">
                                            <input type="text" class="form-control time-picker" placeholder="Pick a time">
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Color Picker</h2>
                            <small class="card-subtitle">Simple color picker based on jQuery and Bootstrap.</small>
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Basic example</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="zmdi zmdi-invert-colors"></i></span>

                                        <div class="form-group color-picker">
                                            <input type="text" class="form-control color-picker__value" value="#03A9F4">
                                            <i class="color-picker__preview" style="background-color: #03A9F4"></i>

                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Horizontal mode</label>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-invert-colors"></i></span>

                                        <div class="form-group color-picker">
                                            <input type="text" class="form-control color-picker__value" value="#cccccc" data-horizontal="true">
                                            <i class="color-picker__preview" style="background-color: #cccccc"></i>

                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Input Sliders</h2>
                            <small class="card-subtitle">noUiSlider is a lightweight JavaScript range slider with tons of customizaion.</small>
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-block__title">Single slider</h3>

                                    <div id="input-slider"></div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="input-slider-value" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h3 class="card-block__title">Range Slider</h3>

                                    <div id="input-slider-range"></div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="input-slider-range-value-1" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="input-slider-range-value-2" />
                                                <i class="form-group__bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <h3 class="card-block__title">Color variants</h3>
                            <p>Optional color variants can be added using modifier classes</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-slider input-slider--blue"></div>

                                    <br>

                                    <div class="input-slider input-slider--red"></div>

                                    <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-slider input-slider--amber"></div>

                                    <br>

                                    <div class="input-slider input-slider--green"></div>

                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Button Checkboxes and Radios</h2>
                            <small class="card-subtitle">Control button states or create groups of buttons for more components like toolbars.</small>
                        </div>

                        <div class="card-block">
                            <h3 class="card-block__title">Toggle states</h3>
                            <p>Add <code>data-toggle="button"</code> to toggle a button’s <code>active</code> state. If you’re pre-toggling a button, you must manually add the <code>.active</code> class and <code>aria-pressed="true"</code> to the &#x3C;button&#x3E;.</p>

                            <br>

                            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Single toggle
                            </button>

                            <br>
                            <br>
                            <br>

                            <h3 class="card-block__title">Checkbox and radio buttons</h3>
                            <p>Bootstrap’s <code>.button</code> styles can be applied to other elements, such as &#x3C;label&#x3E;s, to provide checkbox or radio style button toggling.</p>

                            <br>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn active">
                                    <input type="checkbox" checked autocomplete="off"> Checkbox 1 (pre-checked)
                                </label>
                                <label class="btn">
                                    <input type="checkbox" autocomplete="off"> Checkbox 2
                                </label>
                                <label class="btn">
                                    <input type="checkbox" autocomplete="off"> Checkbox 3
                                </label>
                            </div>

                            <br>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Radio 1 (preselected)
                                </label>
                                <label class="btn">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
                                </label>
                                <label class="btn">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
                                </label>
                            </div>

                            <br>
                            <br>

                            <div class="btn-group btn-group--colors" data-toggle="buttons">
                                <label class="btn"><input type="checkbox" autocomplete="off" checked></label>
                                <label class="btn bg-light-blue"><input type="checkbox" autocomplete="off"></label>
                                <label class="btn bg-teal"><input type="checkbox" autocomplete="off"></label>
                                <label class="btn bg-red"><input type="checkbox" autocomplete="off"></label>
                                <label class="btn bg-purple active"><input type="checkbox" autocomplete="off"></label>
                                <label class="btn bg-amber"><input type="checkbox" autocomplete="off"></label>
                                <label class="btn bg-cyan"><input type="checkbox" autocomplete="off"></label>
                            </div>

                            <br>

                            <div class="btn-group btn-group--colors" data-toggle="buttons">
                                <label class="btn"><input type="radio" name="notes-color" autocomplete="off" checked></label>
                                <label class="btn bg-light-blue"><input type="radio" name="notes-color" autocomplete="off"></label>
                                <label class="btn bg-teal active"><input type="radio" name="notes-color" autocomplete="off"></label>
                                <label class="btn bg-red"><input type="radio" name="notes-color" autocomplete="off"></label>
                                <label class="btn bg-purple"><input type="radio" name="notes-color" autocomplete="off"></label>
                                <label class="btn bg-amber"><input type="radio" name="notes-color" autocomplete="off"></label>
                                <label class="btn bg-cyan"><input type="radio" name="notes-color" autocomplete="off"></label>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Custom Checkboxes</h2>
                            <small class="card-subtitle">Custom rounded checkboxes with alphabet characters to use in contacts and related lists</small>
                        </div>

                        <div class="card-block">
                            <div class="demo-inline-wrapper">
                                <label class="custom-control custom-control--char">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control--char__helper"><i class="bg-cyan">A</i></span>
                                </label>
                            </div>

                            <div class="demo-inline-wrapper">
                                <label class="custom-control custom-control--char">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control--char__helper"><i class="bg-red">C</i></span>
                                </label>
                            </div>

                            <div class="demo-inline-wrapper">
                                <label class="custom-control custom-control--char">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control--char__helper"><i class="bg-blue">V</i></span>
                                </label>
                            </div>

                            <div class="demo-inline-wrapper">
                                <label class="custom-control custom-control--char">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control--char__helper"><i class="bg-purple">Z</i></span>
                                </label>
                            </div>

                            <div class="demo-inline-wrapper">
                                <label class="custom-control custom-control--char">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control--char__helper"><i class="bg-amber">X</i></span>
                                </label>
                            </div>

                            <div class="demo-inline-wrapper">
                                <label class="custom-control custom-control--char">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control--char__helper"><i class="bg-teal">S</i></span>
                                </label>
                            </div>

                            <br>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">WYSIWYG Editor</h2>
                            <small class="card-subtitle">Trumbowyg is Light, translatable and customisable jQuery plugin. Beautiful design, generates semantic code, comes with a powerful API.</small>
                        </div>

                        <div class="card-block">
                            <div class="wysiwyg-editor"></div>
                        </div>
                    </div>
                </div>

                <footer class="footer hidden-xs-down">
                    <p>© Material Admin Responsive. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="">Homepage</a>

                        <a class="nav-link" href="">Company</a>

                        <a class="nav-link" href="">Support</a>

                        <a class="nav-link" href="">News</a>

                        <a class="nav-link" href="">Contacts</a>
                    </ul>
                </footer>
            </section>
        </main>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/tether/dist/js/tether.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/flatpickr/dist/flatpickr.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/nouislider/distribute/nouislider.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>assets/v2/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>
    </body>
</html>