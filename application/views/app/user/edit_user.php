<section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>ADD USER</h1>
            <div class="actions">

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>user/edit" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="card col-sm-8">
	        <div class="card-header">
	        	<?php echo $this->session->flashdata('changepwd'); ?>
	            <h2 class="card-title">New User</h2>
	            <small class="card-subtitle">Please fill all data with valid information.</small>
	        </div>

	        <div class="card-block">
	        	<div class="col-sm-12">
                	<?php
                		foreach ($user as $u) 
                		{ 
                	?>
					<form action="<?php echo base_url() ?>user/edituser"" method="post">
			            <div class="row">
			                <div class="col-sm-8">
			                	<input type="hidden" class="form-control" name="id" required value="<?php echo $u['id']; ?>"> 
			                    <div class="input-group">
			                        <span class="input-group-addon"> <i class="zmdi zmdi-face"></i></span>
			                        <div class="form-group">
			                            <input type="text" class="form-control" name="nama" required value="<?php echo $u['nama']; ?>">
			                            <i class="form-group__bar"></i>
			                        </div>
			                    </div>

			                    <br>
			                    <?php echo validation_errors(); ?>
			                    <div class="input-group">
			                        <span class="input-group-addon"> <i class="zmdi zmdi-account"></i></span>
			                        <div class="form-group">
			                            <input type="text" class="form-control" id="username" name="username" required value="<?php echo $u['uname']; ?>" readonly>
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

			                    <br> 

			                    <div class="input-group">
				                    <span class="input-group-addon"> <i class="zmdi zmdi-puzzle-piece"></i></span>
				                    <div class="form-group">
			                            <select name="section" class="select2" data-placeholder=" -- SELECT SECTION --">
			                                <option value="">&nbsp; -- SELECT SECTION --</option>
			                                <?php foreach ($getSection as $s) {
                                				# code...
                                    			echo '<option value="'.$s['section'].'"';
                                    			if ($s['section'] == $u['section'])
                                    			{
                                    				echo "selected>";
                                    			}
                                    			else
                                    			{
                                    				echo ">";
                                    			}
                                    			echo "&nbsp; &nbsp; ".$s['section'].'</option>';
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
			                        		<option clas="form-control" value="Admin"
                                    			<?php if ($u['level'] == "Admin")
                                    			{
                                    				echo "selected";
                                    			} ?>>&nbsp; &nbsp; ADMIN
                                    		</option>
                                    		<option clas="form-control" value="PPIC"
                                    			<?php if ($u['level'] == "PPIC")
                                    			{
                                    				echo "selected";
                                    			} ?>>&nbsp; &nbsp; APPROVAL: PPIC
                                    		</option>
                                    		<option clas="form-control" value="PRODUKSI"
                                    			<?php if ($u['level'] == "PRODUKSI")
                                    			{
                                    				echo "selected";
                                    			} ?>>&nbsp; &nbsp; APPROVAL: PRODUKSI
                                    		</option>
                                    		<option clas="form-control" value="R&D"
                                    			<?php if ($u['level'] == "R&D")
                                    			{
                                    				echo "selected";
                                    			} ?>>&nbsp; &nbsp; APPROVAL: R&D
                                    		</option>
                                    		<option clas="form-control" value="QC"
                                    			<?php if ($u['level'] == "QC")
                                    			{
                                    				echo "selected";
                                    			} ?>>&nbsp; &nbsp; APPROVAL: QC
                                    		</option>
                                    		<option clas="form-control" value="User"
                                    			<?php if ($u['level'] == "User")
                                    			{
                                    				echo "selected";
                                    			} ?>>&nbsp; &nbsp; User
                                    		</option>
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
                                        <input type="checkbox" autocomplete="off"  class="custom-control-input" name="usermanage" 
                                        	<?Php 
	                                    		if ($u['chek1'] == '1')
	                                    		{
	                                    			echo "checked";
	                                    		}
	                                    		if ('checked') 
	                                    			{ echo ' 	value="1"'; } 
	                                    		elseif (NULL) 
	                                    			{ echo 'value="0"'; } 
	                                    	?>> 
                                		<span class="custom-control-indicator"></span>
                                		<span class="custom-control-description">User Management</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" autocomplete="off" name="memo"  class="custom-control-input"
                                        	<?Php 
                                        		if ($u['chek2'] == '1')
                                        		{
                                        			echo "checked";
                                        		}
                                        		if ('checked') 
                                        			{ echo ' 	value="1"'; } 
                                        		elseif (NULL) 
                                        			{ echo 'value="0"'; } 
                                        	?>> 
                                		<span class="custom-control-indicator"></span>
                                		<span class="custom-control-description">Buat Memo</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" autocomplete="off" name="approval"  class="custom-control-input" checked
                                        	<?Php 
                                        		if ($u['chek3'] == '1')
                                        		{
                                        			echo "checked";
                                        		}
                                        		if ('checked') 
                                        			{ echo ' 	value="1"'; } 
                                        		elseif (NULL) 
                                        			{ echo 'value="0"'; } 
                                        	?>>
                                		<span class="custom-control-indicator"></span>
                                		<span class="custom-control-description">Panduan</span>
                                    </label>
                                </div>
			                </div>

			            </div>

			            <br><br>

			            <h3 class="card-block__title">Password</h3>
			            <a a href="#" data-toggle="modal" data-target="#modal-pwd" class="btn btn-outline-info btn-block"><i class="zmdi zmdi-lock"></i>  Change Password</a>
			            <br><br>
			            <div class="row">
			            	<div class="col-md-12">
			                    <a href="<?php echo base_url() ?>user" class="btn btn-md btn-danger btn--icon-text text-whitepull pull-right"><i class="zmdi zmdi-arrow-back"></i> Back</a><a class="pull-right"> &nbsp; </a>
			                    <div id="adduser">
			                    	<button  name="edituser" id="edituser" class="btn btn-md btn-success btn--icon-text text-white pull-right"><i class="zmdi zmdi-save"></i> Save</button>
			                	</div>
			                </div>
			            </div>
			        </form><br><br>
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
			                                <input pattern=".{0}|.{6,}" title="(6 chars minimum)" name="pwd" type="Password" class="form-control" required>
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
	</div>