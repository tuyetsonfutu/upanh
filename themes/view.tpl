{if $p.nsfw eq "1" AND $smarty.session.FILTER eq "1"}
	<div>
        <div class="post-next-prev">
            {if $prev != ""}
            <a id="prev_post" class="prev-post" href="{$baseurl}{$postfolder}{$prev}/{$prevstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            {else}
            <a id="prev_post" class="prev-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            {/if}
            {if $next ne ""}
            <a id="next_post" class="next-post" href="{$baseurl}{$postfolder}{$next}/{$nextstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            {else}
            <a id="next_post" class="next-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            {/if}
        </div>
    </div>
    <div id="main" class="middle">
        <div id="content-holder">
            <div id="content-holder">
                <div id="content" class="nsfw">
                    <div class="content">
                        <img src="{$baseurl}/images/nsfw.jpg" alt="NSFW" />
                    </div>
                    <div class="info">
                        <h1>{$lang154}</h1>
                        <p>{$lang155}</p>
                        <div class="message-box alt">
                            <div class="inline-message">
                            	<p><a href="{$baseurl}/safe?m={$eurl}">{$lang156} &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">
{elseif $p.nsfw eq "1" AND $smarty.session.USERID eq ""}
	<div>
        <div class="post-next-prev">
            {if $prev != ""}
            <a id="prev_post" class="prev-post" href="{$baseurl}{$postfolder}{$prev}/{$prevstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            {else}
            <a id="prev_post" class="prev-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            {/if}
            {if $next ne ""}
            <a id="next_post" class="next-post" href="{$baseurl}{$postfolder}{$next}/{$nextstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            {else}
            <a id="next_post" class="next-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            {/if}
        </div>
    </div>
    <div id="main" class="middle">
        <div id="content-holder">
            <div id="content-holder">
                <div id="content" class="nsfw">
                    <div class="content">
                        <img src="{$baseurl}/images/nsfw.jpg" alt="NSFW" />
                    </div>
                    <div class="info">
                        <h1>{$lang154}</h1>
                        <p>{$lang155}</p>
                        <div class="message-box alt">
                            <div class="inline-message">
                            	<p><a href="{$baseurl}/safe?m={$eurl}">{$lang156} &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">
{else}
    <div id="main">
        <div id="content-holder">
            <div class="post-info-pad">
                <h1>{$p.story|stripslashes}</h1>
                <p>
					<b>
                    <a href="{$baseurl}/user/{$p.USERID|stripslashes}">{$p.username|stripslashes}</a>
                    <span class="seperator">|</span>
                    {$p.time_added|date_format:"%d/%m/%Y"} - {$p.time_added|date_format:"%H:%M"}
					{if $cname ne "" AND $channels eq "1"}
                    <span class="seperator">|</span>
                    {$lang269} : <a href="{$baseurl}/channels/{$cname|makeseo}/">{$cname}</a>
					{/if}
					<span class="seperator">|</span>
                    <span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}"></fb:comments-count></span>
                    <span class="loved"><span id="love_count" votes="{$p.favclicks}" >{$p.favclicks}</span></span>
					<span class="viewed">{$postview}</span>
                    {if $owner eq "1"}
                    <span class="seperator">|</span>
                    <a href="{$baseurl}/deletepost.php?pid={$p.PID}" class="delete" onclick="return confirm('{$lang147}');">{$lang145}</a>	
                    {/if}
					</b>
                </p>         
            </div>
        
            <div id="post-control-bar" class="spread-bar-wrap">
                <div class="spread-bar">
					<div style="font-size:15px;font-weight:bold;color:#BA0069;padding-right:10px;line-height:20px;float:left">{$lang288}</div>
					<div class="voteinview">
						{if $smarty.session.USERID ne ""}
						{insert name=get_fav_status value=var assign=isfav PID=$p.PID}
							{if $isfav eq "1"}
							<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first" entryId="{$p.PID}" href="javascript:void(0);"><span>{$lang216}</span></a></div>
							<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2 upVoted" href="javascript:void(0);"><span>{$lang219}</span></a></div>
							{else}
							{insert name=get_unfav_status value=var assign=isunfav PID=$p.PID}
								{if $isunfav eq "1"}
								<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first downVoted" entryId="{$p.PID}" href="javascript:void(0);"><span>{$lang216}</span></a></div>
								<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2" href="javascript:void(0);"><span>{$lang219}</span></a></div>
								{else}
									<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first" entryId="{$p.PID}" href="javascript:void(0);"><span>{$lang216}</span></a></div>
									<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2" href="javascript:void(0);"><span>{$lang219}</span></a></div>
								{/if}
							{/if}
						{else}
							<div class="voteDown"><a id="vote-down-btn-{$p.PID}" class="voteButton1 first" entryId="{$p.PID}" href="{$baseurl}/login"><span>{$lang216}</span></a></div>
							<div class="voteUp"><a id="post_love_{$p.PID}" rel="{$p.PID}" class="voteButton2" href="{$baseurl}/login"><span>{$lang219}</span></a></div>
						{/if}
					</div>
					<div class="facebook-btn"><fb:like href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Post"></fb:like></div>
                </div>
                <div class="post-next-prev">
                	{if $prev != ""}
                	<a id="prev_post" class="prev-post" href="{$baseurl}{$postfolder}{$prev}/{$prevstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
                    {else}
                    <a id="prev_post" class="prev-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
                    {/if}
                    {if $next ne ""}
                	<a id="next_post" class="next-post" href="{$baseurl}{$postfolder}{$next}/{$nextstory|makeseo}.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
                    {else}
                    <a id="next_post" class="next-post" href="{$baseurl}/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
                    {/if}
                </div>
            </div>
            <div id="content">
                <div class="post-container">
                    <div class="img-wrap">
                        {if $p.pic ne ""}
                        <a href="{$baseurl}/random"><img src="{$purl}/t/l-{$p.pic}" alt="{$p.story|stripslashes}"/></a>
                        {else}
                        	{if $p.youtube_key != ""}
                            <center>
                            {insert name=return_youtube value=a assign=youtube youtube=$p.youtube_key}{$youtube}
                            </center>
                            {elseif $p.contents != ""}<div style="padding:0 20px">{$p.contents|strip_mq_gpc}</div>
							{else}
							<a href="{$baseurl}/random"><img src="{$imageurl}/l-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u"/></a>
                            {/if}
                        {/if}
                    </div>
					{if $displaywm eq "0" AND $p.pic ne ""}
					<div class="watermark-clear"></div>
					{/if}
                </div>
				
				<div class="likeonfb">
					<h4>{$lang287}</h4>
					<div class="fb-like" data-href="http://www.facebook.com/{$FACEBOOK_PROFILE}" data-send="false" data-width="600" data-show-faces="false" data-font="arial"></div>
                </div>
				
                <div class="comment-section">
                    <h3 class="title" id="comments">{$lang143}</h3>
                    <span class="report-and-source">
                    <p>
                        {if $fixenabled eq "1"}<a class="fix" href="{$baseurl}/fix/{$p.PID}">{$lang142}</a>
                        <span id="report-item-separator">|</span>{/if}{if $owner ne "1"}<a id="report-item-link" class="report report-item" entryId="{$p.PID}" href="javascript:void(0);">{$lang146}</a>
                        <span id="report-item-separator">|</span>{/if}{if $p.source eq ""}{$lang141}{else}{$p.source|stripslashes}{/if}
                    </p>
                    </span>
                    <div style="margin-left:10px">
                    	<fb:comments href="{$baseurl}{$postfolder}{$p.PID}/{if $SEO eq "1"}{$p.story|makeseo}.html{/if}" num_posts="10" width="700"></fb:comments>
                    </div>
                    <div id="fb-root"></div>
                </div>
            	<br/>
            {if $recommended eq "1"}
                <div class="post-may-like">
                    <div id="entries-content" class="grid">  
                    	{section name=i loop=$r}                  
                        <ul id="grid-col-{if $smarty.section.i.iteration GT 3}2{else}1{/if}" class="col-{if $smarty.section.i.iteration GT 3}{math equation="x - 3" x=$smarty.section.i.iteration}{else}{$smarty.section.i.iteration}{/if}">
                            <li class=" ">
                                <a href="{$baseurl}{$postfolder}{$r[i].PID}/{$r[i].story|makeseo}.html" class="jump_stop">
                                    <div style="" class="thimage">
                                        {if $r[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
											<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$r[i].story|stripslashes}" />
										{else}
											{if $posts[i].pic ne ""}
											<img src="{$purl}/t/s-{$r[i].pic}" alt="{$r[i].story|stripslashes}" />
											{else}
												{if $r[i].youtube_key != ""}
													<img src="http://img.youtube.com/vi/{$r[i].youtube_key}/0.jpg" alt="{$r[i].story|stripslashes}" />
												{elseif $r[i].contents != ""}
													<img src="{$imageurl}/s-text.png" alt="{$r[i].story|stripslashes}" />
												{else}
													<img src="{$imageurl}/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
												{/if}
											{/if}
										{/if}
                                    </div>
                                </a>
                                <h1>{if $truncate eq "1"}{$r[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$r[i].story|stripslashes}{/if}</h1>
                                <h4><a href="{$baseurl}/user/{$r[i].USERID|stripslashes}">{$r[i].username|stripslashes|truncate:20:"...":true}</a></h4>
                            </li>
                        </ul>
                        {/section}
                    </div>
                </div>
			{/if}	
            </div>
        </div>
    </div>

<div class="side-bar">
{include file='right2.tpl'}
{if $boxindexmax GT 0}
<div id="jsid-buzz-block" class="popular-block" data-boxIndex="0" data-boxIndexMax="{$boxindexmax}" data-boxSize="3">
	<h3>
        {$lang277}
		<span style="float: right; color: #999; font-size: 13px;">
        <a id="jsid-popular-prev" class="badge-buzz-more" data-change="-1" href="javascript:void(0);" style="color:grey;cursor:default;">&laquo; Prev</a> · 
        <a id="jsid-popular-next" class="badge-buzz-more" data-change="1" href="javascript:void(0);">Next &raquo;</a>
        </span>
    </h3>
	<ol>
	{section name=i loop=$popular}
	<li class="badge-buzz-post-batch badge-buzz-post-batch-{if $smarty.section.i.iteration GT "15"}5{elseif $smarty.section.i.iteration GT "12"}4{elseif $smarty.section.i.iteration GT "9"}3{elseif $smarty.section.i.iteration GT "6"}2{elseif $smarty.section.i.iteration GT "3"}1{else}0{/if}" {if $smarty.section.i.iteration GT "3"}style="display:none;"{/if} >
	<a class="wrap" href="{$baseurl}{$postfolder}{$popular[i].PID}/{if $SEO eq "1"}{$popular[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1);GAG.Track.event('clicked', 'psb.p', '0', '5665836');">
        <div class="mask">
            {if $popular[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$popular[i].story|stripslashes}" />
			{else}
				{if $popular[i].pic ne ""}
				<img src="{$purl}/t/s-{$popular[i].pic}" alt="{$popular[i].story|stripslashes}" />
				{else}
					{if $popular[i].youtube_key != ""}
						<img src="http://img.youtube.com/vi/{$popular[i].youtube_key}/0.jpg" alt="{$popular[i].story|stripslashes}" />
					{elseif $popular[i].contents != ""}
						<img src="{$imageurl}/s-text.png" alt="{$popular[i].story|stripslashes}" />
					{else}
						<img src="{$imageurl}/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
					{/if}
				{/if}
			{/if}
        </div>
		<h4>{if $truncate eq "1"}{$popular[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$popular[i].story|stripslashes}{/if}</h4>
		<p class="meta">
			<span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$popular[i].PID}/{if $SEO eq "1"}{$popular[i].story|makeseo}.html{/if}"></fb:comments-count></span>
			<span class="loved">{$popular[i].favclicks}</span>
			<span class="viewed">{$popular[i].postviewed}</span>
		</p>
	</a>
	</li>
	{/section}
	</ol>
</div>
{/if}

<div id="moving-boxes">
{if $recommended eq "2"}
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
    <div class="popular-block">
	<h3>{$lang276}</h3>
	<ol>
	{section name=i loop=$r}
	<a class="wrap" href="{$baseurl}{$postfolder}{$r[i].PID}/{if $SEO eq "1"}{$r[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
            {if $r[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$r[i].story|stripslashes}" />
			{else}
				{if $r[i].pic ne ""}
					<img src="{$purl}/t/s-{$r[i].pic}" alt="{$r[i].story|stripslashes}" />
				{else}
					{if $r[i].youtube_key != ""}
						<img src="http://img.youtube.com/vi/{$r[i].youtube_key}/0.jpg" alt="{$r[i].story|stripslashes}" />
					{elseif $r[i].contents != ""}
						<img src="{$imageurl}/s-text.png" alt="{$r[i].story|stripslashes}" />
					{else}
						<img src="{$imageurl}/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
					{/if}
				{/if}
			{/if}
			<h4>{if $truncate eq "1"}{$r[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$r[i].story|stripslashes}{/if}</h4>
			<h4><a href="{$baseurl}/user/{$r[i].USERID|stripslashes}">{$r[i].username|stripslashes|truncate:20:"...":true}</a></h4>
			<p class="meta"><span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$r[i].PID}/{if $SEO eq "1"}{$r[i].story|makeseo}.html{/if}"></fb:comments-count></span><span class="loved">{$r[i].favclicks}</span><span class="viewed">{$r[i].postviewed}</span>
			</p>
		</li>
	</a>
	{/section}
	</ol>
	</div>
</div>
{/if}
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
	<div class="vr-box">
	<h3>{$lang288}</h3>
	<ol>
	{section name=i loop=$vr}
	<a class="wrap" href="{$baseurl}{$postfolder}{$vr[i].PID}/{if $SEO eq "1"}{$vr[i].story|makeseo}.html{/if}"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
            {if $vr[i].nsfw eq "1" AND $smarty.session.FILTER ne "0"}
				<img src="{$baseurl}/images/nsfw_thumb.jpg" alt="{$vr[i].story|stripslashes}" />
			{else}
				{if $vr[i].pic ne ""}
					<img src="{$purl}/t/s-{$vr[i].pic}" alt="{$vr[i].story|stripslashes}" />
				{else}
					{if $vr[i].youtube_key != ""}
						<img src="http://img.youtube.com/vi/{$vr[i].youtube_key}/0.jpg" alt="{$vr[i].story|stripslashes}" />
					{elseif $vr[i].contents != ""}
						<img src="{$imageurl}/s-text.png" alt="{$vr[i].story|stripslashes}" />
					{else}
						<img src="{$imageurl}/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
					{/if}
				{/if}
			{/if}
			<h4>{if $truncate eq "1"}{$vr[i].story|stripslashes|mb_truncate:20:"...":'UTF-8'}{else}{$vr[i].story|stripslashes}{/if}</h4>
			<h4><a href="{$baseurl}/user/{$vr[i].USERID|stripslashes}">{$vr[i].username|stripslashes|truncate:20:"...":true}</a></h4>
			<p class="meta"><span class="comment"><fb:comments-count href="{$baseurl}{$postfolder}{$vr[i].PID}/{if $SEO eq "1"}{$vr[i].story|makeseo}.html{/if}"></fb:comments-count></span><span class="loved">{$vr[i].favclicks}</span><span class="viewed">{$vr[i].postviewed}</span>
			</p>
		</li>
	</a>
	{/section}
	</ol>
	</div>
</div>
</div>
</div>

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
	<script type="text/javascript">
    var adloca2=$('#post-control-bar').offset().top; 
     $(window).scroll(function () { 
        var curloca2=$(window).scrollTop();
        if(curloca2>adloca2){
            $('#post-control-bar').css('position','fixed');
            $('#post-control-bar').css('top','42px');
            $('#post-control-bar').css('z-index','10');
        };
        if(curloca2 <= adloca2){
            $('#post-control-bar').css('position','absolute');
            $('#post-control-bar').css('top','auto');
            $('#post-control-bar').css('z-index','!important');
        };
        });    
    </script>
	<script type="text/javascript">
		$('.voteButton1').click(function(){
        var id=$(this).attr('entryId');
        if( $(this).hasClass('downVoted')){
        $(this).removeClass('downVoted');
        likedeg($(this).attr('entryId'),0,-1);
        }else{
        $(this).addClass('downVoted');
        if($('#post_love_'+id).hasClass('upVoted')){
        likedeg($(this).attr('entryId'),-1,1);	
        $('#post_love_'+id).removeClass('upVoted');
        }else{
        likedeg($(this).attr('entryId'),0,1);	
        }
        }
        });
        $('.voteButton2').click(function(){
        var id=$(this).attr('rel');
        if( $(this).hasClass('upVoted')){
        $(this).removeClass('upVoted');
        likedeg($(this).attr('rel'),-1,0);
        }else{
        $(this).addClass('upVoted');
        if($('#vote-down-btn-'+id).hasClass('downVoted')){
        $('#vote-down-btn-'+id).removeClass('downVoted');
        likedeg($(this).attr('rel'),1,-1);
        }else{
        likedeg($(this).attr('rel'),1,0);
        }
        }
        });
    function likedeg(p,l,u){
        jQuery.ajax({
            type:'POST',
            url:'{/literal}{$baseurl}{literal}'+ '/likedeg.php',
			data:'l='+l+'&pid='+p+'&u='+u,
            success:function(e){
                $('#love_count').html(e);
                }
            });
        }
    </script>
    <script type="text/javascript">
         var barloc=$('#post-control-bar').offset().top; 
         $(window).scroll(function () {
              var curloc=$(window).scrollTop();
              if(curloc>barloc){
        $('#post-control-bar').addClass('topbarfixed');
              }else{
                $('#post-control-bar').removeClass('topbarfixed'); 
                 }
         });
    </script>
	<script type="text/javascript">
		$('.badge-buzz-more').click(function()
			{
			var currIndex=parseInt($("#jsid-buzz-block").attr('data-boxIndex'),10);
			var maxIndex=parseInt($("#jsid-buzz-block").attr('data-boxIndexMax'),10);
			var change=parseInt($(this).attr('data-change'),10);
			var newIndex=currIndex+change;
			if(newIndex>=0&&newIndex<=maxIndex){
			$$("#jsid-buzz-block").set("data-boxIndex",newIndex);
			$$(".badge-buzz-post-batch").setStyle("display","none");
			$$(".badge-buzz-post-batch-"+newIndex).setStyle("display","");
			$$("#jsid-popular-prev").setStyle("color",newIndex===0?"grey":"#00A5F0");
			$$("#jsid-popular-prev").setStyle("cursor",newIndex===0?"default":"pointer");
			$$("#jsid-popular-next").setStyle("color",newIndex===maxIndex?"grey":"#00A5F0");
			$$("#jsid-popular-next").setStyle("cursor",newIndex===maxIndex?"default":"popular");
			}
			});
	</script>
    {/literal}

</div>
<div id="footer" class="">
{/if}