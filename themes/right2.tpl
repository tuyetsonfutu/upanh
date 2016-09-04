		<div>
			<a class="bts spaceBottom" href="{$baseurl}/submit" style="float: left; width: 278px; color: white">Click để bắt đầu chia sẻ những bức ảnh vui!</a>
			<div class="clear"></div>
		</div>
		<div class="s-300" id="top-s300">
        	{if $smarty.session.FILTER eq "1" AND $NSFWADS}
        	{insert name=get_advertisement AID=3}
            {else}
        	{insert name=get_advertisement AID=1}
			{/if}
        </div>