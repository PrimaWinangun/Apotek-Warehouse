<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Sistem Informasi Akademik PPDS IKA FK UNUD</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url(); ?>uploads/login/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>uploads/login/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>uploads/login/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>uploads/login/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>uploads/login/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>uploads/login/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>uploads/login/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url(); ?>uploads/login/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>uploads/login/plugins/select2/select2_metro.css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo base_url(); ?>uploads/login/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		
        <form class="form-vertical login-form" action="<?php echo base_url(); ?>login" method="post">
			<h3>LOGIN <span style="font-size:17px">Sistem Informasi Akademik</span></h3>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
                        <?php echo form_input('username','','class="m-wrap placeholder-no-fix" autocomplete="off" placeholder="Username"'); ?>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<?php echo form_password('password','','class="m-wrap placeholder-no-fix" autocomplete="off" placeholder="Password"'); ?>
					</div>
				</div>
			</div>
            
            	<?php if($this->session->flashdata('messages') != NULL) { ?>
				<div class="alert alert-error"><button class="close" data-dismiss="alert" style="margin-top:8px;"></button>
                <?php echo $this->session->flashdata('messages'); ?></div>
                <?php } ?>
                
                
			<div class="form-actions">
				<input  type="submit" class="btn blue pull-right" name="login_submit" value="Login">
			</div>
			<div class="create-account">
				<p>
                <div style="float:left"><a href="javascript:;"  id="forget-password" style="color:#FFFFFF"> Lupa Password ?</a></div>
                <div style="float:right"><a href="javascript:;" id="register-btn" style="color:#FFFFFF">Sign Up Residen</a></div>
                <div style="clear:both"></div>
                </p>
			</div>
		</form>
		<!-- END LOGIN FORM -->        
        
        

        <?php if($this->session->flashdata('go_reset') != NULL) { ?>
        <!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="form-vertical reset-form" action="<?php echo base_url(); ?>reset" method="post">
			<h3 >Password Baru</h3>
			<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
                        <input type="hidden" name="id" value="<?php echo $this->session->flashdata('go_reset'); ?>" />
						<input class="m-wrap placeholder-no-fix" type="password" placeholder="Password Baru" autocomplete="off" name="password" />
					</div>
				</div>
			</div>
                
                <div class="form-actions">
                <?php echo form_submit('resetpass_submit','Simpan','class="btn blue pull-right"'); ?>
			</div>   
		</form>
		<!-- END FORGOT PASSWORD FORM -->
		<!-- BEGIN REGISTRATION FORM -->
        <?php } ?>
        
        
		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="form-vertical forget-form" action="<?php echo base_url(); ?>reset" method="post">
			<h3 >Lupa Password ?</h3>
			<div class="control-group">
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-envelope"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Email Profile" autocomplete="off" name="email" />
					</div>
				</div>
			</div>
            
                <?php if($this->session->flashdata('messages_reset') != NULL) { ?>
				<div class="alert alert-error"><button class="close" data-dismiss="alert" style="margin-top:8px;"></button>
                <?php echo $this->session->flashdata('messages_reset'); ?></div>
                <?php } ?>
                
                <div class="form-actions">
				<button id="back-btn" type="button" class="btn">Back</button>
                <?php echo form_submit('reset_submit','Reset Password','class="btn blue pull-right"'); ?>
			</div>   
		</form>
		<!-- END FORGOT PASSWORD FORM -->
		<!-- BEGIN REGISTRATION FORM -->
        <form class="form-vertical register-form" action="<?php echo base_url(); ?>register" method="post">
			<h3 >Sign Up Residen</h3>
                <div class="control-group">
                    <label class="control-label visible-ie8 visible-ie9">NIM</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-user"></i>
                            <?php echo form_input('nim','','class="m-wrap placeholder-no-fix" autocomplete="off" placeholder="NIM"'); ?>
                        </div>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-user"></i>
                            <?php echo form_input('username','','class="m-wrap placeholder-no-fix" autocomplete="off" placeholder="Username Tanpa Spasi"'); ?>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-lock"></i>
                            <?php echo form_password('password','','class="m-wrap placeholder-no-fix" autocomplete="off" placeholder="Password"'); ?>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('messages_register') != NULL) { ?>
				<div class="alert alert-error"><button class="close" data-dismiss="alert" style="margin-top:8px;"></button>
                <?php echo $this->session->flashdata('messages_register'); ?></div>
                <?php } ?>
                

            
			<div class="form-actions">
				<button id="register-back-btn" type="button" class="btn">Back</button>
                <?php echo form_submit('register_submit','Sign Up','class="btn blue pull-right"'); ?>
			</div>
		</form>
		<!-- END REGISTRATION FORM -->
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		2013 &copy; PPDS IKA FK UNUD SANGLAH
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url(); ?>uploads/login/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url(); ?>uploads/login/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo base_url(); ?>uploads/login/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/excanvas.min.js"></script>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url(); ?>uploads/login/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo base_url(); ?>uploads/login/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url(); ?>uploads/login/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>uploads/login/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>uploads/login/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>uploads/login/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>uploads/login/scripts/login-soft.js" type="text/javascript"></script>      
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		  
		  <?php if($this->session->flashdata('messages_register') != NULL) { ?>
		  jQuery('.login-form').hide();
	      jQuery('.register-form').show();
		  <?php } ?>
		  
		  
		  <?php if($this->session->flashdata('messages_reset') != NULL) { ?>
		  jQuery('.login-form').hide();
	      jQuery('.forget-form').show();
		  <?php } ?>
		  
		  <?php if($this->session->flashdata('go_reset') != NULL) { ?>
		  jQuery('.login-form').hide();
	      jQuery('.reset-form').show();
		  <?php } ?>
		  
		  $(".alert-error").delay(3000).fadeOut(500);
		  
		  
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>