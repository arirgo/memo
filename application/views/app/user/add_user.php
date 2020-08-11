<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>ADD USER</h1>
            <div class="actions">

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="card col-sm-8">
	        <div class="card-header">
	            <h2 class="card-title">New User</h2>
	            <small class="card-subtitle">Please fill all data with valid information.</small>
	        </div>

	        <div class="card-block">
	        	<div class="col-sm-12">
					<form action="<?php echo base_url() ?>user/adduser" method="post">
			            <div class="row">
			                <div class="col-sm-8">
			                    <div class="input-group">
			                        <span class="input-group-addon"> <i class="zmdi zmdi-face"></i></span>
			                        <div class="form-group">
			                            <input type="text" class="form-control" name="nama" required placeholder="Nama">
			                            <i class="form-group__bar"></i>
			                        </div>
			                    </div>

			                    <br>
			                    <?php echo validation_errors(); ?>
			                    <div class="input-group">
			                        <span class="input-group-addon"> <i class="zmdi zmdi-account"></i></span>
			                        <div class="form-group">
			                            <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
			                            <i class="form-group__bar"></i>
			                        </div>
			                    </div>
			                    <span id="message"></span>  
			                    <br>

			                     <div class="input-group">
			                        <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i></span>
			                        <div class="form-group">
			                            <input pattern=".{0}|.{6,}" title="(6 chars minimum)" type="Password" class="form-control" name="pwd" required placeholder="Password">
			                            <i class="form-group__bar"></i>
			                        </div>
			                    </div>

			                    <br>

			                    <div class="input-group">
			                        <span class="input-group-addon"> <i class="zmdi zmdi-email"></i></span>
			                        <div class="form-group">
			                            <input type="text" class="form-control" name="email" required placeholder="Email">
			                            <i class="form-group__bar"></i>
			                        </div>
			                    </div>

			                    <br> 

			                    <div class="input-group">
				                    <span class="input-group-addon"> <i class="zmdi zmdi-puzzle-piece"></i></span>
				                    <div class="form-group">
			                            <select name="section" class="select2" data-placeholder=" -- SELECT SECTION --">
			                                <option value="">&nbsp; -- SELECT SECTION --</option>
			                                <?php foreach ($getSection as $s) {
			                        			# code...
			                        			echo '<option value="'.$s['section'].'">&nbsp; &nbsp; '.$s['section'].'</option>';
			                        		} 
			                        		?>
			                            </select>
			                        </div>
		                    	</div>

		                    	<br>

		                    	<div class="input-group">
				                    <span class="input-group-addon"> <i class="zmdi zmdi-gamepad"></i></span>
				                    <div class="form-group">
			                            <select class="select2" name="user" data-placeholder=" -- SELECT TYPE USER --">
			                                <option value="">&nbsp; -- SELECT TYPE USER --</option>
			                        		<option value="Admin">&nbsp; &nbsp; PPIC</option>
			                        		<option value="PPIC">&nbsp; &nbsp; APPROVAL: PPIC</option>
			                        		<option value="PRODUKSI">&nbsp; &nbsp; APPROVAL: PRODUKSI</option>
			                        		<option value="R&D">&nbsp; &nbsp; APPROVAL: R&D</option>
			                        		<option value="QC">&nbsp; &nbsp; APPROVAL: QC</option>
			                        		<option value="ACCOUNTING">&nbsp; &nbsp; APPROVAL: ACCOUNTING</option>
			                        		<option value="User">&nbsp; &nbsp; USER (SECTION SPV)</option>
			                            </select>
			                        </div>
		                    	</div>
			                </div>
			                <div class="col-sm-4">
			                	<h2>
				                <small>Privilege</small>
				            	</h2>
                                <div class="checkbox">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" autocomplete="off" name="usermanage"  class="custom-control-input"
                                        	<?Php 
                                        		if('checked') 
                                        			{ echo 'value="1"'; } 
                                        		elseif (NULL) 
                                        			{ echo 'value="0"'; } 
                                        	?>> 
                                		<span class="custom-control-indicator"></span>
                                		<span class="custom-control-description">User Management</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" autocomplete="off" name="memo" class="custom-control-input"
                                        	<?Php 
                                        		if('checked') 
                                        			{ echo 'value="1"'; } 
                                        		elseif (NULL) 
                                        			{ echo 'value="0"'; } 
                                        	?>> 
                                		<span class="custom-control-indicator"></span>
                                		<span class="custom-control-description">Buat Memo</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" autocomplete="off" name="approval" class="custom-control-input" checked
                                        	<?Php 
                                        		if('checked') 
                                        			{ echo 'value="1"'; } 
                                        		elseif(NULL)
                                        			{ echo 'value="0"'; } 
                                        	?>> 
                                		<span class="custom-control-indicator"></span>
                                		<span class="custom-control-description">Panduan</span>
                                    </label>
                                </div>
			                </div>

			            </div>

			            <br>

			            <!-- <h3 class="card-block__title">Password</h3>
			            <a href="#" class="btn btn-outline-info btn-block"><i class="zmdi zmdi-lock"></i>  Change Password</a> -->

			            <br>

			            <div class="row">
			            	<div class="col-md-12">
			                    <a href="<?php echo base_url() ?>" class="btn btn-md btn-danger btn--icon-text text-whitepull pull-right"><i class="zmdi zmdi-arrow-back"></i> Back</a><a class="pull-right"> &nbsp; </a>
			                    <div id="adduser">
			                    	<button name="adduser" id="adduser" class="btn btn-md btn-success btn--icon-text text-white pull-right"><i class="zmdi zmdi-save"></i> Save</button>
			                	</div>
			                </div>
			            </div>
			        </form><br><br>
		    	</div>
	        </div>
    	</div>
	</div>