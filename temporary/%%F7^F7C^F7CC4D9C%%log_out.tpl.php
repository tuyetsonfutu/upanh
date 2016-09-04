<?php /* Smarty version 2.6.6, created on 2014-01-13 11:12:08
         compiled from log_out.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head>
</head>

<body>

<div id="fb-root"></div>
<?php if ($this->_tpl_vars['enable_fc'] == '1' && $_SESSION['FB'] == '1'):  echo '
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});	 
  FB.logout(function(response) {
	window.location = "';  echo $this->_tpl_vars['baseurl']; ?>
/logout<?php echo '"
  });
  
</script>
'; ?>

<?php else:  echo '
<script>
	window.location = "';  echo $this->_tpl_vars['baseurl']; ?>
/logout<?php echo '"  
</script>
'; ?>

<?php endif; ?>

</body>
</html>