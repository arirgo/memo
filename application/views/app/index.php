<?php 
    foreach ($getTotalMemo as $g) {
        # code...
        $totalMemo = $g['memo'];
    }
    foreach ($getMemoUnchek as $a) {
        # code...
        $totalUncheck = $a['memo'];
    }
    foreach ($getMemoApp as $n) {
        # code...
        $totalApp = $n['memo'];
    }
    foreach ($getMemoDec as $d) {
        # code...
        $totalDec = $d['memo'];
    }
    foreach ($getTotalUser as $u) {
        # code...
        $totalUser = $u['user'];
    }
?> 
    <section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Dashboard</h1>

            <div class="actions">

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="row quick-stats">
            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item bg-blue">
                    <div class="quick-stats__info">
                        <h2><?php echo $totalMemo; ?></h2>
                        <small>Total Memo Since July 2018</small>
                    </div>

                    <div class="quick-stats__chart sparkline-bar-stats">6,4,8,6,5,6,7,8,3,5,9,5</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item bg-amber">
                    <div class="quick-stats__info">
                        <h2><?php echo $totalUser; ?></h2>
                        <small>Total User Memo Online</small>
                    </div>

                    <div class="quick-stats__chart sparkline-bar-stats">4,7,6,2,5,3,8,6,6,4,8,6</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item bg-purple">
                    <div class="quick-stats__info">
                        <h2><?php echo $getMemoExp->memo; ?></h2>
                        <small>Total Memo Expired</small>
                    </div>

                    <div class="quick-stats__chart sparkline-bar-stats">9,4,6,5,6,4,5,7,9,3,6,5</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="quick-stats__item bg-red">
                    <div class="quick-stats__info">
                        <h2><?php echo $getMemoActive->memo; ?></h2>
                        <small>Total Memo Valid</small>
                    </div>

                    <div class="quick-stats__chart sparkline-bar-stats">5,6,3,9,7,5,4,6,5,6,4,9</div>
                </div>
            </div>
        </div>

        <hr>
        <br>
        <div class="row quick-stats">
            <div class="col-sm-6">
                <div class="card card-inverse widget-pie">
                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="100" data-size="80" data-track-color="rgba(0,0,0,0.08)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value"><?php echo $totalUncheck; ?></span>
                        </div>
                        <div class="widget-pie__title">Memo<br> Pending</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="100" data-size="80" data-track-color="rgba(0,0,0,0.08)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value"><?php echo $totalApp; ?></span>
                        </div>
                        <div class="widget-pie__title">Memo<br> Approved</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="100" data-size="80" data-track-color="rgba(0,0,0,0.08)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value"><?php echo $totalDec; ?></span>
                        </div>
                        <div class="widget-pie__title">Memo<br> Declined</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="100" data-size="80" data-track-color="rgba(0,0,0,0.08)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value"><?php echo $memohari; ?></span>
                        </div>
                        <div class="widget-pie__title">Memo<br>Today</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="100" data-size="80" data-track-color="rgba(0,0,0,0.08)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value"><?php echo $memobulan; ?></span>
                        </div>
                        <div class="widget-pie__title">Memo<br> This Month</div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                        <div class="easy-pie-chart" data-percent="100" data-size="80" data-track-color="rgba(0,0,0,0.08)" data-bar-color="#fff">
                            <span class="easy-pie-chart__value"><?php echo $memotahun; ?></span>
                        </div>
                        <div class="widget-pie__title">Memo<br> This Year</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Recent Memo</h2>
                        <small class="card-subtitle">Showing 5 recent memo</small>
                    </div>

                    <div class="listview listview--hover">
                        <?php foreach ($recent as $r) { ?>
                        <a class="listview__item">
                            <button class="btn btn-sm btn-outline-success"><?php echo $r['no_memo']; ?></button>&nbsp; &nbsp; &nbsp;

                            <div class="listview__content">
                                <div class="listview__heading"><?php echo $r['nama']; ?></div>
                                <p><?php echo $r['hal']; ?></p>
                            </div>
                        </a>
                        <?php } ?>

                        <a href="<?php echo base_url() ?>memo/" class="view-more">View All Memo</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="calendar card"></div>

        <!-- Add new event -->
        <div class="modal fade" id="new-event" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Event</h5>
                    </div>
                    <div class="modal-body">
                        <form class="new-event__form">
                            <div class="form-group">
                                <input type="text" class="form-control new-event__title" placeholder="Event Title">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="btn-group btn-group--colors event-tag" data-toggle="buttons">
                                <label class="btn bg-light-blue active"><input type="radio" name="event-tag" value="bg-light-blue" autocomplete="off" checked></label>
                                <label class="btn bg-teal"><input type="radio" name="event-tag" value="bg-teal" autocomplete="off"></label>
                                <label class="btn bg-red"><input type="radio" name="event-tag" value="bg-red" autocomplete="off"></label>
                                <label class="btn bg-purple"><input type="radio" name="event-tag" value="bg-purple" autocomplete="off"></label>
                                <label class="btn bg-amber"><input type="radio" name="event-tag" value="bg-amber" autocomplete="off"></label>
                                <label class="btn bg-cyan"><input type="radio" name="event-tag" value="bg-cyan" autocomplete="off"></label>
                            </div>

                            <input type="hidden" class="new-event__start" />
                            <input type="hidden" class="new-event__end" />
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link new-event__add">Add Event</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit event -->
        <div class="modal fade" id="edit-event" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="edit-event__form">
                            <div class="form-group">
                                <input type="text" class="form-control edit-event__title" placeholder="Event Title">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="btn-group btn-group--colors event-tag" data-toggle="buttons">
                                <label class="btn bg-light-blue active"><input type="radio" name="event-tag" value="bg-light-blue" autocomplete="off" checked></label>
                                <label class="btn bg-teal"><input type="radio" name="event-tag" value="bg-teal" autocomplete="off"></label>
                                <label class="btn bg-red"><input type="radio" name="event-tag" value="bg-red" autocomplete="off"></label>
                                <label class="btn bg-purple"><input type="radio" name="event-tag" value="bg-purple" autocomplete="off"></label>
                                <label class="btn bg-amber"><input type="radio" name="event-tag" value="bg-amber" autocomplete="off"></label>
                                <label class="btn bg-cyan"><input type="radio" name="event-tag" value="bg-cyan" autocomplete="off"></label>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control edit-event__description textarea-autosize" placeholder="Event Desctiption"></textarea>
                                <i class="form-group__bar"></i>
                            </div>

                            <input type="hidden" class="edit-event__id">
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-calendar="update">Update</button>
                        <button class="btn btn-link" data-calendar="delete">Delete</button>
                        <button class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>