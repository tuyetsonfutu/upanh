{if $topgags GT 0}
<div class="feature-bar">
<ul>
{section name=f loop=$topgags}
        <a href="{$baseurl}{$postfolder}{$topgags[f].PID}/{if $SEO eq "1"}{$topgags[f].story|makeseo}.html{/if}">
        <img src="{$purl}/t/s-{$topgags[f].pic}" alt="{$topgags[f].story|stripslashes}">
        <span class="title">{$topgags[f].story}</span>
        </a>
{/section}
</ul>
</div>
{/if}
<div id="main">
    <div id="content-holder">        
        <div class="main-filter ">
            <div id="use-tips">
                <div id="view-info" class="list-tips">
                    <div id="shortcut-event-label" style="display:none">{$lang171}</div>
                    <span><b>{$lang169}</b>: {$lang170}</span>
                    <a href="#keyboard" class="keyboard_link">{$lang168}</a>                    
                </div>
            </div>
			{if $thumbs eq "1"}
			<a id="changeview" class="view_thumbs" href="{$baseurl}/channels/{$cname|makeseo}/?view=thumbs" title="Toggle Views">{$lang258}</a>
			{/if}
            {if $safemode eq "1"}
			{if $smarty.session.USERID ne ""}
                {if $smarty.session.FILTER eq "1"}
                <a class="safe-mode-switcher on" href="{$baseurl}/safe?m={$eurl}">&nbsp;</a>
                {else}
                <a class="safe-mode-switcher off" href="{$baseurl}/safe?m={$eurl}&o=1">&nbsp;</a>
                {/if}
            {else}
            	<a class="safe-mode-switcher on" href="{$baseurl}/login">&nbsp;</a>
            {/if}
			{/if}
        </div>
        <div id="content" listPage="hot">
            <div id="entries-content" class="list">
                <ul id="entries-content-ul" class="col-1">
                    {section name=i loop=$posts}
                    {include file="posts_bit.tpl"}
                    {/section}                    
                </ul>
            </div>	
            <div id="lastPostsLoader"></div>                
			{if $AUTOSCROLL eq "1"}
			<div id="load_image" style="background:url(images/load.gif) center no-repeat; width:%100; height:50px;"> </div>
			{literal}
                <script type="text/javascript">
				var ajaxstart=1;
				$(document).ready(function(){
					var tpage = 2, cname = '{/literal}{$cname|makeseo}{literal}' ;
					function lastAddedLiveFunc()
					{
						$('div#lastPostsLoader').html('');
						$.get('{/literal}{$baseurl}{literal}/channelsjson.php?page=' + tpage + "&cname=" + cname, function (data){
							if (data != "") {
								$(".col-1").append(data);
								$('#load_image').css('display','none');
								ajaxstart=1;
							}else{
							ajaxstart=2;
							}
							$('div#lastPostsLoader').empty();
						});
					};
					$(window).scroll(function(){
					if (document.documentElement.scrollTop)
					{ var  curloc = document.documentElement.scrollTop; }
					else
					{ var curloc=$(window).scrollTop(); }
					if  ((curloc+document.documentElement.clientHeight+1)>=($(document).height()) && ajaxstart==1 ) {
					 lastAddedLiveFunc();
					 $('#load_image').css('display','block');
					 ajaxstart=0;	
					 tpage = tpage+1;
					};
					if(curloc>$(window).height()){$('#backtotop').slideDown();}else{$('#backtotop').slideUp();};
					});
					});
				</script>
			{/literal}
			{else}
 			{literal}
                <script type="text/javascript">
				$(document).ready(function(){
					$(window).scroll(function(){
					if (document.documentElement.scrollTop)
					{ var  curloc = document.documentElement.scrollTop; }
					else
					{ var curloc=$(window).scrollTop(); }
					var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
					var  scrolltrigger = 0.95;
				 
					if  ((wintop/(docheight-winheight)) > scrolltrigger) {
					 lastAddedLiveFunc();
					 tpage = tpage+1;
					};
					if(curloc>$(window).height()){$('#backtotop').slideDown();}else{$('#backtotop').slideUp();};
					});
					});
				</script>
			{/literal}
            <div id="paging-buttons" class="paging-buttons">
            	{if $tpp ne ""}
                <a href="{$baseurl}/channels/{$cname|makeseo}/?page={$tpp}" class="previous">&laquo; {$lang166}</a>
                {else}
                <a href="#" onclick="return false;" class="previous disabled">&laquo; {$lang166}</a>
                {/if}
                {if $tnp ne ""}
                <a href="{$baseurl}/channels/{$cname|makeseo}/?page={$tnp}" class="older">{$lang167} &raquo;</a>
                {else}
                <a href="#" onclick="return false;" class="older disabled">{$lang167} &raquo;</a>
                {/if}
            </div>		
			{/if}	
        </div>
    </div>
</div>
{include file='vote_js.tpl'}
{include file='right.tpl'}
{literal}
<script type="text/javascript">
var adloca=$('#moving-boxes').offset().top; 
 $(window).scroll(function () { 
    var curloca=$(window).scrollTop();
    if(curloca>adloca){
        $('#moving-boxes').css('position','fixed');
        $('#moving-boxes').css('top','50px');
        $('#moving-boxes').css('z-index','0');
    };
    if(curloca <= adloca){
        $('#moving-boxes').css('position','static');
        $('#moving-boxes').css('top','!important');
        $('#moving-boxes').css('z-index','!important');
    };
    });
</script> 
{/literal}   
<div id="footer" class="">