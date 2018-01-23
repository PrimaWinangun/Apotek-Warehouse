<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Apotek Warehouse Software</title>

<link href="<?php echo base_url()?>wp-content/themes/apt-whz/assets/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>wp-content/themes/apt-whz/assets/css/modal.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>wp-content/themes/apt-whz/assets/css/pagination.css" rel="stylesheet" type="text/css" />
<link href='<?php echo base_url()?>wp-content/themes/apt-whz/assets/css/font-googleapis.css' rel='stylesheet' type='text/css' />
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script></head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="backTo"><a href="#" title=""><img src="<?php echo base_url()?>wp-content/themes/apt-whz/assets/images/icons/topnav/mainWebsite.png" alt="" /><span>Main website</span></a></div>
            <div class="userNav"></div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<!-- Login form area -->
<div class="loginWrapper">
	<div class="loginLogo"><img src="<?php echo base_url()?>wp-content/themes/apt-whz/assets/images/loginLogo.png" alt="" /></div>
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Login</h5></div>
        <form action="<?php echo base_url()?>user/login/authenticate" method="post" accept-charset="utf-8" class="mainForm">
            <fieldset>
				<?php if (isset($message)) {?>
                <div class="loginRow">
					<div align="center"><strong><?php echo $message?></strong></div>
                    <div class="fix"></div>
                </div>
				<?php } ?>
                <div class="loginRow noborder">
                    <label for="req1">Username:</label>
                    <div class="loginInput"><input type="text" name="login" class="validate[required]" id="req1" /></div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label for="req2">Password:</label>
                    <div class="loginInput"><input type="password" name="password" class="validate[required]" id="req2" /></div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <input type="submit" value="Log me in" class="greyishBtn submitForm" />
                    <div class="fix"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<!-- Footer -->
<div id="footer">
	<div class="wrapper">
    	<span>&copy; Copyright 2011. All rights reserved. It's Brain admin theme by <a href="#" title="">Eugene Kopyov</a></span>
    </div>
</div>

</body>
</html>
