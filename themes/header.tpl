<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" onkeypress="keyfind(event)" lang="{$lang254}" dir="LTR">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<title>{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{if $metadescription ne ""}{$metadescription} - {/if}{$site_name}">
<meta name="keywords" content="{if $pagetitle ne ""}{$pagetitle},{/if}{if $metakeywords ne ""}{$metakeywords},{/if}{$site_name}">
<meta name="title" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}" />

<meta property="og:title" content="{if $pagetitle ne ""}{$pagetitle} - {/if}{$site_name}"/>
<meta property="og:site_name" content="{$site_name}"/>
{if $p.pic ne ""}
<meta property="og:url" content="{$baseurl}{$postfolder}{$p.PID}/"/>
{elseif $p.youtube_key != ""}
<meta property="og:url" content="{$baseurl}{$postfolder}{$p.PID}/"/>
{else}
<meta property="og:url" content="{$baseurl}/"/>
{/if}
<meta property="og:description" content="{$metadescription}"/>
<meta property="og:type" content="blog" />
{if $p.pic ne ""}
<meta property="og:image" content="{$purl}/t/s-{$p.pic}" />
{elseif $p.youtube_key != ""}
<meta property="og:image" content="http://img.youtube.com/vi/{$p.youtube_key}/0.jpg" />
{else}
<meta property="og:image" content="{$baseurl}/images/image.png" />
{/if}
<meta property="fb:app_id" content="{$FACEBOOK_APP_ID}"/>
<link href="{$baseurl}/css/style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="icon" href="{$baseurl}/favicon.ico" />
<link rel="shortcut icon" href="{$baseurl}/favicon.ico" />
<script type="text/javascript" src="{$baseurl}/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.3.1/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="{$baseurl}/js/fbshare.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="{$baseurl}/js/jquery.scrollTo-1.4.2-min.js"></script>

{if $RSS eq "1"}
<link rel="alternate" type="application/rss+xml" title="RSS - {$site_name}" href="{$baseurl}/rss.php" />
{/if}
</head>
<body id="page-landing" class="main-body ">
<div id="fb-root"></div>
{if $enable_fc eq "1"}
{if $smarty.session.language eq "vi"}
{literal}
<script src="http://connect.facebook.net/vi_VN/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });	  
</script>
{/literal}
{else}
{literal}
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: '{/literal}{$FACEBOOK_APP_ID}{literal}', status: true,
           cookie: true, xfbml: true});
  FB.Event.subscribe('auth.login', function(response) {
    window.location.reload();
  });
</script>
{/literal}
{/if}
{/if}
<div id="tmp-img" style="display:none"></div>
{literal}
<script type="text/javascript"> 
function rmt(l) { var img = new Image(); img.src = l; document.getElementById('tmp-img').appendChild(img); } 
function myWindow(location, address, gaCategory, gaAction, entryLink) { var w = 640; var h = 460; var sTop = window.screen.height/2-(h/2); var sLeft = window.screen.width/2-(w/2); var sharer = window.open(address, "Share on Facebook", "status=1,height="+h+",width="+w+",top="+sTop+",left="+sLeft+",resizable=0"); }
</script>
{/literal}

<div id="header">
    <div id="searchbar_container">
        <div id="searchbar_wrapper">
            <div id="header_searchbar"  style="display:none;">
                <div id="search_wrapper">
                    <form action="{$baseurl}/search">
                        <input id="sitebar_search_header" type="text" class="search search_input" name="query" tabindex="1" placeholder="{$lang189}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<div id="headerContent">
		<a href="{$baseurl}/" id="logo">{$site_name}</a>
		<ul id="menuBar">
                        <li{if $menu eq 2} class="selected"{/if}><a href="http://deuvl.net/fun/tag/anh-dep">Ảnh đẹp</a></li>
			<li{if $menu eq 2} class="selected"{/if}><a href="{$baseurl}/trending">{$lang173}</a></li>
			<li{if $menu eq 1} class="selected"{/if}><a href="{$baseurl}/hot">{$lang172}</a></li>
			<li{if $menu eq 3} class="selected"{/if}><a href="{$baseurl}/vote">{$lang174}</a></li>
			<li{if $menu eq 5} class="selected"{/if}><a href="{$baseurl}/top-posts">{$lang278}</a></li>
                         <li{if $menu eq 6} class="selected"{/if}><a class="channel" href="{$baseurl}">Chọn Kênh</a>
                <ul class="myfancyorg">
                    <li><a href="{$baseurl}/channels/hai-huoc/" target="_blank">Hài hước</a></li>
                    <li><a href="{$baseurl}/channels/video/" target="_blank">Video Clip</a></li>					 
					 <li><a href="{$baseurl}/channels/girls-xinh" target="_blank">girls Xinh</a></li>
					 <li><a href="{$baseurl}/channels/tin-hot" target="_blank">Tin Hot</a></li>
					 <li><a href="{$baseurl}/channels/tam-su" target="_blank">Tâm Sự</a></li>					 
					 <li><a href="{$baseurl}/channels/music" target="_blank">Music Hay</a></li>
                </ul>
            </li>
               <li{if $menu eq 7} class="selected"{/if}><a href="http://deuvl.net">Tin tức hot</a></li>		
			<li><a class="upload" href="{$baseurl}/submit">Đăng bài</a></li>
		</ul>
        <div id="headerRight">
			<a href="javascript:void(0);" class="searchButton" title="Tìm kiếm"></a>
			{if $smarty.session.USERID ne ""}
			<a href="{$baseurl}/user/{$smarty.session.USERID|stripslashes}/messages" class="notiButton" title="Tin nhắn"></a>
			<div class="avatar noNoti">
				<a href="{$baseurl}/user/{$smarty.session.USERID|stripslashes}" class="avatarLink" title="{$smarty.session.USERNAME|stripslashes}">
				{insert name=get_member_profilepicture assign=profilepicture value=var USERID=$smarty.session.USERID url=$membersprofilepicurl}
				<img src="https://graph.facebook.com/{$smarty.session.USERNAME|stripslashes}/picture?width=30&height=30">
				</a>
				<ul>
					<li><a href="{$baseurl}/user/{$smarty.session.USERID|stripslashes}">Ảnh của bạn</a></li>
                    <li><a href="{$baseurl}/settings">{$lang45}</a></li>
                    <li><a href="{$baseurl}/log_out">{$lang198}</a></li>
				</ul>
			</div>
			{else}
			<div class="login">
				<a href="{$baseurl}/login">{$lang197}</a>
			</div>
			{/if}
		</div>
		<div class="clear"></div>
	</div>
</div>
{literal}
<script type="text/javascript">
$('.searchButton').click(function(){
    $('#header_searchbar').toggle('slow');
    });
</script>
{/literal}              
<div id="container">
{if $viewpage eq "1"}
{include file='js1.tpl'}
{else}
{include file='js.tpl'}
{/if}