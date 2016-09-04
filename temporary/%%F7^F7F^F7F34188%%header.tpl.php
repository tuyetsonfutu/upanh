<?php /* Smarty version 2.6.6, created on 2016-09-04 15:34:19
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'header.tpl', 114, false),array('insert', 'get_member_profilepicture', 'header.tpl', 117, false),)), $this); ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="<?php echo $this->_tpl_vars['lang254']; ?>
" dir="LTR">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<title><?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  if ($this->_tpl_vars['metadescription'] != ""):  echo $this->_tpl_vars['metadescription']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
">
<meta name="keywords" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
,<?php endif;  if ($this->_tpl_vars['metakeywords'] != ""):  echo $this->_tpl_vars['metakeywords']; ?>
,<?php endif;  echo $this->_tpl_vars['site_name']; ?>
">
<meta name="title" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
" />

<meta property="og:title" content="<?php if ($this->_tpl_vars['pagetitle'] != ""):  echo $this->_tpl_vars['pagetitle']; ?>
 - <?php endif;  echo $this->_tpl_vars['site_name']; ?>
"/>
<meta property="og:site_name" content="<?php echo $this->_tpl_vars['site_name']; ?>
"/>
<?php if ($this->_tpl_vars['p']['pic'] != ""): ?>
<meta property="og:url" content="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/"/>
<?php elseif ($this->_tpl_vars['p']['youtube_key'] != ""): ?>
<meta property="og:url" content="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/"/>
<?php else: ?>
<meta property="og:url" content="<?php echo $this->_tpl_vars['baseurl']; ?>
/"/>
<?php endif; ?>
<meta property="og:description" content="<?php echo $this->_tpl_vars['metadescription']; ?>
"/>
<meta property="og:type" content="blog" />
<?php if ($this->_tpl_vars['p']['pic'] != ""): ?>
<meta property="og:image" content="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['p']['pic']; ?>
" />
<?php elseif ($this->_tpl_vars['p']['youtube_key'] != ""): ?>
<meta property="og:image" content="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['p']['youtube_key']; ?>
/0.jpg" />
<?php else: ?>
<meta property="og:image" content="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/image.png" />
<?php endif; ?>
<meta property="fb:app_id" content="<?php echo $this->_tpl_vars['FACEBOOK_APP_ID']; ?>
"/>
<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
/css/style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/favicon.ico" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.3.1/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/fbshare.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseurl']; ?>
/js/jquery.scrollTo-1.4.2-min.js"></script>

<?php if ($this->_tpl_vars['RSS'] == '1'): ?>
<link rel="alternate" type="application/rss+xml" title="RSS - <?php echo $this->_tpl_vars['site_name']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/rss.php" />
<?php endif; ?>
</head>
<body id="page-landing" class="main-body ">
<div id="fb-root"></div>
<?php if ($this->_tpl_vars['enable_fc'] == '1'): ?>
<?php if ($_SESSION['language'] == 'vi'): ?>
<?php echo '
<script src="http://connect.facebook.net/vi_VN/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe(\'auth.login\', function(response) {
    window.location.reload();
  });	  
</script>
'; ?>

<?php else: ?>
<?php echo '
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: \'';  echo $this->_tpl_vars['FACEBOOK_APP_ID'];  echo '\', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe(\'auth.login\', function(response) {
    window.location.reload();
  });
</script>
'; ?>

<?php endif; ?>
<?php endif; ?>
<div id="tmp-img" style="display:none"></div>
<?php echo '
<script type="text/javascript"> 
function rmt(l) { var img = new Image(); img.src = l; document.getElementById(\'tmp-img\').appendChild(img); } 
function myWindow(location, address, gaCategory, gaAction, entryLink) { var w = 640; var h = 460; var sTop = window.screen.height/2-(h/2); var sLeft = window.screen.width/2-(w/2); var sharer = window.open(address, "Share on Facebook", "status=1,height="+h+",width="+w+",top="+sTop+",left="+sLeft+",resizable=0"); }
</script>
'; ?>


<div id="header">
    <div id="searchbar_container">
        <div id="searchbar_wrapper">
            <div id="header_searchbar"  style="display:none;">
                <div id="search_wrapper">
                    <form action="<?php echo $this->_tpl_vars['baseurl']; ?>
/search">
                        <input id="sitebar_search_header" type="text" class="search search_input" name="query" tabindex="1" placeholder="<?php echo $this->_tpl_vars['lang189']; ?>
"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<div id="headerContent">
		<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/" id="logo"><?php echo $this->_tpl_vars['site_name']; ?>
</a>
		<ul id="menuBar">
                        <li<?php if ($this->_tpl_vars['menu'] == 2): ?> class="selected"<?php endif; ?>><a href="http://deuvl.net/fun/tag/anh-dep">Ảnh đẹp</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 2): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/trending"><?php echo $this->_tpl_vars['lang173']; ?>
</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 1): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/hot"><?php echo $this->_tpl_vars['lang172']; ?>
</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 3): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/vote"><?php echo $this->_tpl_vars['lang174']; ?>
</a></li>
			<li<?php if ($this->_tpl_vars['menu'] == 5): ?> class="selected"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top-posts"><?php echo $this->_tpl_vars['lang278']; ?>
</a></li>
                         <li<?php if ($this->_tpl_vars['menu'] == 6): ?> class="selected"<?php endif; ?>><a class="channel" href="<?php echo $this->_tpl_vars['baseurl']; ?>
">Chọn Kênh</a>
                <ul class="myfancyorg">
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/hai-huoc/" target="_blank">Hài hước</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/video/" target="_blank">Video Clip</a></li>					 
					 <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/girls-xinh" target="_blank">girls Xinh</a></li>
					 <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/tin-hot" target="_blank">Tin Hot</a></li>
					 <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/tam-su" target="_blank">Tâm Sự</a></li>					 
					 <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/music" target="_blank">Music Hay</a></li>
                </ul>
            </li>
               <li<?php if ($this->_tpl_vars['menu'] == 7): ?> class="selected"<?php endif; ?>><a href="http://deuvl.net">Tin tức hot</a></li>		
			<li><a class="upload" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit">Đăng bài</a></li>
		</ul>
        <div id="headerRight">
			<a href="javascript:void(0);" class="searchButton" title="Tìm kiếm"></a>
			<?php if ($_SESSION['USERID'] != ""): ?>
			<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/messages" class="notiButton" title="Tin nhắn"></a>
			<div class="avatar noNoti">
				<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" class="avatarLink" title="<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">
				<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_member_profilepicture', 'assign' => 'profilepicture', 'value' => 'var', 'USERID' => $_SESSION['USERID'], 'url' => $this->_tpl_vars['membersprofilepicurl'])), $this); ?>

				<img src="https://graph.facebook.com/<?php echo ((is_array($_tmp=$_SESSION['USERNAME'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
/picture?width=30&height=30">
				</a>
				<ul>
					<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$_SESSION['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
">Ảnh của bạn</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/settings"><?php echo $this->_tpl_vars['lang45']; ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/log_out"><?php echo $this->_tpl_vars['lang198']; ?>
</a></li>
				</ul>
			</div>
			<?php else: ?>
			<div class="login">
				<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><?php echo $this->_tpl_vars['lang197']; ?>
</a>
			</div>
			<?php endif; ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php echo '
<script type="text/javascript">
$(\'.searchButton\').click(function(){
    $(\'#header_searchbar\').toggle(\'slow\');
    });
</script>
'; ?>
              
<div id="container">
<?php if ($this->_tpl_vars['viewpage'] == '1'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'js1.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>