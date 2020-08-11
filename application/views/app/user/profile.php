<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>User Account</h1>
            <div class="actions">

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>profile" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="card col-sm-8">
        <div class="card-header">
	       	<?php echo $this->session->flashdata('setup_success'); ?>
	       	<?php echo $this->session->flashdata('changepwd'); ?>
            <h2 class="card-title">Setting</h2>
            <small class="card-subtitle">Please set up your account with valid information.</small>
        </div>

        <div class="card-block">

        	<?php
		    	foreach ($getProfile as $u) 
	    	{ ?>
			<form action="<?php echo base_url() ?>user/setting" method="post">
	            <div class="row">
	            	<input type="hidden" class="form-control" name="id" required value="<?php echo $u['id']; ?>">  
	                <div class="col-sm-12">
	                    <div class="input-group">
	                        <span class="input-group-addon"> <i class="zmdi zmdi-face"></i></span>
	                        <div class="form-group">
	                            <input type="text" class="form-control" name="nama" required value="<?php echo $u['nama']; ?>">
	                            <i class="form-group__bar"></i>
	                        </div>
	                    </div>

	                    <br>

	                    <div class="input-group">
	                        <span class="input-group-addon"> <i class="zmdi zmdi-account"></i></span>
	                        <div class="form-group">
	                            <input type="text" class="form-control" name="username" required value="<?php echo $u['uname']; ?>" readonly>
	                            <i class="form-group__bar"></i>
	                        </div>
	                    </div>

	                    <br>

	                    <div class="input-group">
	                        <span class="input-group-addon"> <i class="zmdi zmdi-email"></i></span>
	                        <div class="form-group">
	                            <input type="text" class="form-control" name="email" required value="<?php echo $u['email']; ?>">
	                            <i class="form-group__bar"></i>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <br>

	            <h3 class="card-block__title">Password</h3>
	            <a href="#" data-toggle="modal" data-target="#modal-pwd" class="btn btn-outline-info btn-block"><i class="zmdi zmdi-lock"></i>  Change Password</a>

	            <br>

	            <div class="row">
	            	<div class="col-md-12">
	                    <a href="<?php echo base_url() ?>" class="btn btn-md btn-danger btn--icon-text text-whitepull pull-right"><i class="zmdi zmdi-arrow-back"></i> Back</a><a class="pull-right"> &nbsp; </a>
	                    <div id="edituser">
	                    	<button name="edituser" id="edituser" class="btn btn-md btn-success btn--icon-text text-white pull-right"><i class="zmdi zmdi-save"></i> Save</button>
	                	</div>
	                </div>
	            </div>
	        </form>
	        <div class="modal fade" id="modal-pwd" tabindex="-1">
                <div class="modal-dialog">
                	<form method="post" action="<?php echo base_url() ?>user/changepw">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Change Password</h5>
	                        </div>
	                        <div class="modal-body">
	                           <div class="form-group form-group--float">
	                           		<input type="hidden" class="form-control" name="id" required value="<?php echo $u['id']; ?>">
	                                <input pattern=".{0}|.{6,}" title="(6 chars minimum)" type="Password" name="pwd" class="form-control" required>
	                                <label>New Password</label>
	                                <i class="form-group__bar"></i>
	                            </div>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="submit" name="changepwd" id="changepwd" class="btn btn-md btn-success btn--icon-text text-white pull-right">Save changes</button>
	                            <button type="button" class="btn btn-md btn-danger btn--icon-text text-whitepull pull-right" data-dismiss="modal">Close</button>
	                        </div>
	                    </div>
	                </form>
                </div>
            </div>
	    <?php } ?>
        </div>
    </div>

</div>