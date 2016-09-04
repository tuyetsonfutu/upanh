<?php /* Smarty version 2.6.6, created on 2014-01-13 14:51:47
         compiled from view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'makeseo', 'view.tpl', 5, false),array('modifier', 'stripslashes', 'view.tpl', 79, false),array('modifier', 'date_format', 'view.tpl', 84, false),array('modifier', 'strip_mq_gpc', 'view.tpl', 150, false),array('modifier', 'mb_truncate', 'view.tpl', 206, false),array('modifier', 'truncate', 'view.tpl', 207, false),array('insert', 'get_fav_status', 'view.tpl', 106, false),array('insert', 'get_unfav_status', 'view.tpl', 111, false),array('insert', 'return_youtube', 'view.tpl', 148, false),array('function', 'math', 'view.tpl', 185, false),)), $this); ?>
<?php if ($this->_tpl_vars['p']['nsfw'] == '1' && $_SESSION['FILTER'] == '1'): ?>
	<div>
        <div class="post-next-prev">
            <?php if ($this->_tpl_vars['prev'] != ""): ?>
            <a id="prev_post" class="prev-post" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['prev']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['prevstory'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            <?php else: ?>
            <a id="prev_post" class="prev-post" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['next'] != ""): ?>
            <a id="next_post" class="next-post" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['next']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['nextstory'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            <?php else: ?>
            <a id="next_post" class="next-post" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            <?php endif; ?>
        </div>
    </div>
    <div id="main" class="middle">
        <div id="content-holder">
            <div id="content-holder">
                <div id="content" class="nsfw">
                    <div class="content">
                        <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw.jpg" alt="NSFW" />
                    </div>
                    <div class="info">
                        <h1><?php echo $this->_tpl_vars['lang154']; ?>
</h1>
                        <p><?php echo $this->_tpl_vars['lang155']; ?>
</p>
                        <div class="message-box alt">
                            <div class="inline-message">
                            	<p><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/safe?m=<?php echo $this->_tpl_vars['eurl']; ?>
"><?php echo $this->_tpl_vars['lang156']; ?>
 &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">
<?php elseif ($this->_tpl_vars['p']['nsfw'] == '1' && $_SESSION['USERID'] == ""): ?>
	<div>
        <div class="post-next-prev">
            <?php if ($this->_tpl_vars['prev'] != ""): ?>
            <a id="prev_post" class="prev-post" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['prev']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['prevstory'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            <?php else: ?>
            <a id="prev_post" class="prev-post" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['next'] != ""): ?>
            <a id="next_post" class="next-post" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['next']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['nextstory'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            <?php else: ?>
            <a id="next_post" class="next-post" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
            <?php endif; ?>
        </div>
    </div>
    <div id="main" class="middle">
        <div id="content-holder">
            <div id="content-holder">
                <div id="content" class="nsfw">
                    <div class="content">
                        <img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw.jpg" alt="NSFW" />
                    </div>
                    <div class="info">
                        <h1><?php echo $this->_tpl_vars['lang154']; ?>
</h1>
                        <p><?php echo $this->_tpl_vars['lang155']; ?>
</p>
                        <div class="message-box alt">
                            <div class="inline-message">
                            	<p><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/safe?m=<?php echo $this->_tpl_vars['eurl']; ?>
"><?php echo $this->_tpl_vars['lang156']; ?>
 &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="middle">
<?php else: ?>
    <div id="main">
        <div id="content-holder">
            <div class="post-info-pad">
                <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                <p>
					<b>
                    <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a>
                    <span class="seperator">|</span>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['time_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['time_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M")); ?>

					<?php if ($this->_tpl_vars['cname'] != "" && $this->_tpl_vars['channels'] == '1'): ?>
                    <span class="seperator">|</span>
                    <?php echo $this->_tpl_vars['lang269']; ?>
 : <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/channels/<?php echo ((is_array($_tmp=$this->_tpl_vars['cname'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
/"><?php echo $this->_tpl_vars['cname']; ?>
</a>
					<?php endif; ?>
					<span class="seperator">|</span>
                    <span class="comment"><fb:comments-count href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments-count></span>
                    <span class="loved"><span id="love_count" votes="<?php echo $this->_tpl_vars['p']['favclicks']; ?>
" ><?php echo $this->_tpl_vars['p']['favclicks']; ?>
</span></span>
					<span class="viewed"><?php echo $this->_tpl_vars['postview']; ?>
</span>
                    <?php if ($this->_tpl_vars['owner'] == '1'): ?>
                    <span class="seperator">|</span>
                    <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/deletepost.php?pid=<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="delete" onclick="return confirm('<?php echo $this->_tpl_vars['lang147']; ?>
');"><?php echo $this->_tpl_vars['lang145']; ?>
</a>	
                    <?php endif; ?>
					</b>
                </p>         
            </div>
        
            <div id="post-control-bar" class="spread-bar-wrap">
                <div class="spread-bar">
					<div style="font-size:15px;font-weight:bold;color:#BA0069;padding-right:10px;line-height:20px;float:left"><?php echo $this->_tpl_vars['lang288']; ?>
</div>
					<div class="voteinview">
						<?php if ($_SESSION['USERID'] != ""): ?>
						<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_fav_status', 'value' => 'var', 'assign' => 'isfav', 'PID' => $this->_tpl_vars['p']['PID'])), $this); ?>

							<?php if ($this->_tpl_vars['isfav'] == '1'): ?>
							<div class="voteDown"><a id="vote-down-btn-<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton1 first" entryId="<?php echo $this->_tpl_vars['p']['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang216']; ?>
</span></a></div>
							<div class="voteUp"><a id="post_love_<?php echo $this->_tpl_vars['p']['PID']; ?>
" rel="<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton2 upVoted" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang219']; ?>
</span></a></div>
							<?php else: ?>
							<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_unfav_status', 'value' => 'var', 'assign' => 'isunfav', 'PID' => $this->_tpl_vars['p']['PID'])), $this); ?>

								<?php if ($this->_tpl_vars['isunfav'] == '1'): ?>
								<div class="voteDown"><a id="vote-down-btn-<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton1 first downVoted" entryId="<?php echo $this->_tpl_vars['p']['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang216']; ?>
</span></a></div>
								<div class="voteUp"><a id="post_love_<?php echo $this->_tpl_vars['p']['PID']; ?>
" rel="<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton2" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang219']; ?>
</span></a></div>
								<?php else: ?>
									<div class="voteDown"><a id="vote-down-btn-<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton1 first" entryId="<?php echo $this->_tpl_vars['p']['PID']; ?>
" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang216']; ?>
</span></a></div>
									<div class="voteUp"><a id="post_love_<?php echo $this->_tpl_vars['p']['PID']; ?>
" rel="<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton2" href="javascript:void(0);"><span><?php echo $this->_tpl_vars['lang219']; ?>
</span></a></div>
								<?php endif; ?>
							<?php endif; ?>
						<?php else: ?>
							<div class="voteDown"><a id="vote-down-btn-<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton1 first" entryId="<?php echo $this->_tpl_vars['p']['PID']; ?>
" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><span><?php echo $this->_tpl_vars['lang216']; ?>
</span></a></div>
							<div class="voteUp"><a id="post_love_<?php echo $this->_tpl_vars['p']['PID']; ?>
" rel="<?php echo $this->_tpl_vars['p']['PID']; ?>
" class="voteButton2" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/login"><span><?php echo $this->_tpl_vars['lang219']; ?>
</span></a></div>
						<?php endif; ?>
					</div>
					<div class="facebook-btn"><fb:like href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>?ref=fb" send="false" layout="button_count" width="90px" show_faces="false" font="" label="Post"></fb:like></div>
                </div>
                <div class="post-next-prev">
                	<?php if ($this->_tpl_vars['prev'] != ""): ?>
                	<a id="prev_post" class="prev-post" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['prev']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['prevstory'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
                    <?php else: ?>
                    <a id="prev_post" class="prev-post" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Previous', 1]);"></a>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['next'] != ""): ?>
                	<a id="next_post" class="next-post" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['next']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['nextstory'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
                    <?php else: ?>
                    <a id="next_post" class="next-post" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random" onclick="_gaq.push(['_trackEvent', 'View-Post', 'Clicked', 'Next', 1]);"></a>
                    <?php endif; ?>
                </div>
            </div>
            <div id="content">
                <div class="post-container">
                    <div class="img-wrap">
                        <?php if ($this->_tpl_vars['p']['pic'] != ""): ?>
                        <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random"><img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/l-<?php echo $this->_tpl_vars['p']['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"/></a>
                        <?php else: ?>
                        	<?php if ($this->_tpl_vars['p']['youtube_key'] != ""): ?>
                            <center>
                            <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'return_youtube', 'value' => 'a', 'assign' => 'youtube', 'youtube' => $this->_tpl_vars['p']['youtube_key'])), $this);  echo $this->_tpl_vars['youtube']; ?>

                            </center>
                            <?php elseif ($this->_tpl_vars['p']['contents'] != ""): ?><div style="padding:0 20px"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['contents'])) ? $this->_run_mod_handler('strip_mq_gpc', true, $_tmp) : strip_mq_gpc($_tmp)); ?>
</div>
							<?php else: ?>
							<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/random"><img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/l-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u"/></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
					<?php if ($this->_tpl_vars['displaywm'] == '0' && $this->_tpl_vars['p']['pic'] != ""): ?>
					<div class="watermark-clear"></div>
					<?php endif; ?>
                </div>
				
				<div class="likeonfb">
					<h4><?php echo $this->_tpl_vars['lang287']; ?>
</h4>
					<div class="fb-like" data-href="http://www.facebook.com/<?php echo $this->_tpl_vars['FACEBOOK_PROFILE']; ?>
" data-send="false" data-width="600" data-show-faces="false" data-font="arial"></div>
                </div>
				
                <div class="comment-section">
                    <h3 class="title" id="comments"><?php echo $this->_tpl_vars['lang143']; ?>
</h3>
                    <span class="report-and-source">
                    <p>
                        <?php if ($this->_tpl_vars['fixenabled'] == '1'): ?><a class="fix" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/fix/<?php echo $this->_tpl_vars['p']['PID']; ?>
"><?php echo $this->_tpl_vars['lang142']; ?>
</a>
                        <span id="report-item-separator">|</span><?php endif;  if ($this->_tpl_vars['owner'] != '1'): ?><a id="report-item-link" class="report report-item" entryId="<?php echo $this->_tpl_vars['p']['PID']; ?>
" href="javascript:void(0);"><?php echo $this->_tpl_vars['lang146']; ?>
</a>
                        <span id="report-item-separator">|</span><?php endif;  if ($this->_tpl_vars['p']['source'] == ""):  echo $this->_tpl_vars['lang141'];  else:  echo ((is_array($_tmp=$this->_tpl_vars['p']['source'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?>
                    </p>
                    </span>
                    <div style="margin-left:10px">
                    	<fb:comments href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['p']['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['p']['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>" num_posts="10" width="700"></fb:comments>
                    </div>
                    <div id="fb-root"></div>
                </div>
            	<br/>
            <?php if ($this->_tpl_vars['recommended'] == '1'): ?>
                <div class="post-may-like">
                    <div id="entries-content" class="grid">  
                    	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['r']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>                  
                        <ul id="grid-col-<?php if ($this->_sections['i']['iteration'] > 3): ?>2<?php else: ?>1<?php endif; ?>" class="col-<?php if ($this->_sections['i']['iteration'] > 3):  echo smarty_function_math(array('equation' => "x - 3",'x' => $this->_sections['i']['iteration']), $this); else:  echo $this->_sections['i']['iteration'];  endif; ?>">
                            <li class=" ">
                                <a href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['PID']; ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html" class="jump_stop">
                                    <div style="" class="thimage">
                                        <?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
											<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw_thumb.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
										<?php else: ?>
											<?php if ($this->_tpl_vars['posts'][$this->_sections['i']['index']]['pic'] != ""): ?>
											<img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
											<?php else: ?>
												<?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
													<img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
												<?php elseif ($this->_tpl_vars['r'][$this->_sections['i']['index']]['contents'] != ""): ?>
													<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-text.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
												<?php else: ?>
													<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
                                    </div>
                                </a>
                                <h1><?php if ($this->_tpl_vars['truncate'] == '1'):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8'));  else:  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></h1>
                                <h4><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a></h4>
                            </li>
                        </ul>
                        <?php endfor; endif; ?>
                    </div>
                </div>
			<?php endif; ?>	
            </div>
        </div>
    </div>

<div class="side-bar">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'right2.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  if ($this->_tpl_vars['boxindexmax'] > 0): ?>
<div id="jsid-buzz-block" class="popular-block" data-boxIndex="0" data-boxIndexMax="<?php echo $this->_tpl_vars['boxindexmax']; ?>
" data-boxSize="3">
	<h3>
        <?php echo $this->_tpl_vars['lang277']; ?>

		<span style="float: right; color: #999; font-size: 13px;">
        <a id="jsid-popular-prev" class="badge-buzz-more" data-change="-1" href="javascript:void(0);" style="color:grey;cursor:default;">&laquo; Prev</a> · 
        <a id="jsid-popular-next" class="badge-buzz-more" data-change="1" href="javascript:void(0);">Next &raquo;</a>
        </span>
    </h3>
	<ol>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['popular']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<li class="badge-buzz-post-batch badge-buzz-post-batch-<?php if ($this->_sections['i']['iteration'] > '15'): ?>5<?php elseif ($this->_sections['i']['iteration'] > '12'): ?>4<?php elseif ($this->_sections['i']['iteration'] > '9'): ?>3<?php elseif ($this->_sections['i']['iteration'] > '6'): ?>2<?php elseif ($this->_sections['i']['iteration'] > '3'): ?>1<?php else: ?>0<?php endif; ?>" <?php if ($this->_sections['i']['iteration'] > '3'): ?>style="display:none;"<?php endif; ?> >
	<a class="wrap" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['popular'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1);GAG.Track.event('clicked', 'psb.p', '0', '5665836');">
        <div class="mask">
            <?php if ($this->_tpl_vars['popular'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
				<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw_thumb.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
			<?php else: ?>
				<?php if ($this->_tpl_vars['popular'][$this->_sections['i']['index']]['pic'] != ""): ?>
				<img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['popular'][$this->_sections['i']['index']]['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['popular'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
						<img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['popular'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php elseif ($this->_tpl_vars['popular'][$this->_sections['i']['index']]['contents'] != ""): ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-text.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
        </div>
		<h4><?php if ($this->_tpl_vars['truncate'] == '1'):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8'));  else:  echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></h4>
		<p class="meta">
			<span class="comment"><fb:comments-count href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['popular'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['popular'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments-count></span>
			<span class="loved"><?php echo $this->_tpl_vars['popular'][$this->_sections['i']['index']]['favclicks']; ?>
</span>
			<span class="viewed"><?php echo $this->_tpl_vars['popular'][$this->_sections['i']['index']]['postviewed']; ?>
</span>
		</p>
	</a>
	</li>
	<?php endfor; endif; ?>
	</ol>
</div>
<?php endif; ?>

<div id="moving-boxes">
<?php if ($this->_tpl_vars['recommended'] == '2'): ?>
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
    <div class="popular-block">
	<h3><?php echo $this->_tpl_vars['lang276']; ?>
</h3>
	<ol>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['r']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<a class="wrap" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
            <?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
				<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw_thumb.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
			<?php else: ?>
				<?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['pic'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['r'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
						<img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php elseif ($this->_tpl_vars['r'][$this->_sections['i']['index']]['contents'] != ""): ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-text.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<h4><?php if ($this->_tpl_vars['truncate'] == '1'):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8'));  else:  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></h4>
			<h4><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a></h4>
			<p class="meta"><span class="comment"><fb:comments-count href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['r'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments-count></span><span class="loved"><?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['favclicks']; ?>
</span><span class="viewed"><?php echo $this->_tpl_vars['r'][$this->_sections['i']['index']]['postviewed']; ?>
</span>
			</p>
		</li>
	</a>
	<?php endfor; endif; ?>
	</ol>
	</div>
</div>
<?php endif; ?>
<div id="post-gag-stay" class="_badge-sticky-elements" data-y="60">
	<div class="vr-box">
	<h3><?php echo $this->_tpl_vars['lang288']; ?>
</h3>
	<ol>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['vr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	<a class="wrap" href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['vr'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"  onclick="GAG.GA.track('RelatedContent', 'Clicked-Post-Sidebar', 'Position-1', 1)"  >
		<li>
            <?php if ($this->_tpl_vars['vr'][$this->_sections['i']['index']]['nsfw'] == '1' && $_SESSION['FILTER'] != '0'): ?>
				<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/images/nsfw_thumb.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
			<?php else: ?>
				<?php if ($this->_tpl_vars['vr'][$this->_sections['i']['index']]['pic'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['purl']; ?>
/t/s-<?php echo $this->_tpl_vars['vr'][$this->_sections['i']['index']]['pic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['vr'][$this->_sections['i']['index']]['youtube_key'] != ""): ?>
						<img src="http://img.youtube.com/vi/<?php echo $this->_tpl_vars['vr'][$this->_sections['i']['index']]['youtube_key']; ?>
/0.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php elseif ($this->_tpl_vars['vr'][$this->_sections['i']['index']]['contents'] != ""): ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-text.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" />
					<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/s-error.jpg" alt="Không tìm th&#7845;y d&#7919; li&#7879;u" />
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<h4><?php if ($this->_tpl_vars['truncate'] == '1'):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 20, "...", 'UTF-8') : smarty_modifier_mb_truncate($_tmp, 20, "...", 'UTF-8'));  else:  echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></h4>
			<h4><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['USERID'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['username'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a></h4>
			<p class="meta"><span class="comment"><fb:comments-count href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['postfolder'];  echo $this->_tpl_vars['vr'][$this->_sections['i']['index']]['PID']; ?>
/<?php if ($this->_tpl_vars['SEO'] == '1'):  echo ((is_array($_tmp=$this->_tpl_vars['vr'][$this->_sections['i']['index']]['story'])) ? $this->_run_mod_handler('makeseo', true, $_tmp) : smarty_modifier_makeseo($_tmp)); ?>
.html<?php endif; ?>"></fb:comments-count></span><span class="loved"><?php echo $this->_tpl_vars['vr'][$this->_sections['i']['index']]['favclicks']; ?>
</span><span class="viewed"><?php echo $this->_tpl_vars['vr'][$this->_sections['i']['index']]['postviewed']; ?>
</span>
			</p>
		</li>
	</a>
	<?php endfor; endif; ?>
	</ol>
	</div>
</div>
</div>
</div>

	<?php echo '
    <script type="text/javascript">
    var adloca=$(\'#moving-boxes\').offset().top; 
     $(window).scroll(function () { 
        var curloca=$(window).scrollTop();
        if(curloca>adloca){
            $(\'#moving-boxes\').css(\'position\',\'fixed\');
            $(\'#moving-boxes\').css(\'top\',\'50px\');
            $(\'#moving-boxes\').css(\'z-index\',\'0\');
        };
        if(curloca <= adloca){
            $(\'#moving-boxes\').css(\'position\',\'static\');
            $(\'#moving-boxes\').css(\'top\',\'!important\');
            $(\'#moving-boxes\').css(\'z-index\',\'!important\');
        };
        });
    </script>
	<script type="text/javascript">
    var adloca2=$(\'#post-control-bar\').offset().top; 
     $(window).scroll(function () { 
        var curloca2=$(window).scrollTop();
        if(curloca2>adloca2){
            $(\'#post-control-bar\').css(\'position\',\'fixed\');
            $(\'#post-control-bar\').css(\'top\',\'42px\');
            $(\'#post-control-bar\').css(\'z-index\',\'10\');
        };
        if(curloca2 <= adloca2){
            $(\'#post-control-bar\').css(\'position\',\'absolute\');
            $(\'#post-control-bar\').css(\'top\',\'auto\');
            $(\'#post-control-bar\').css(\'z-index\',\'!important\');
        };
        });    
    </script>
	<script type="text/javascript">
		$(\'.voteButton1\').click(function(){
        var id=$(this).attr(\'entryId\');
        if( $(this).hasClass(\'downVoted\')){
        $(this).removeClass(\'downVoted\');
        likedeg($(this).attr(\'entryId\'),0,-1);
        }else{
        $(this).addClass(\'downVoted\');
        if($(\'#post_love_\'+id).hasClass(\'upVoted\')){
        likedeg($(this).attr(\'entryId\'),-1,1);	
        $(\'#post_love_\'+id).removeClass(\'upVoted\');
        }else{
        likedeg($(this).attr(\'entryId\'),0,1);	
        }
        }
        });
        $(\'.voteButton2\').click(function(){
        var id=$(this).attr(\'rel\');
        if( $(this).hasClass(\'upVoted\')){
        $(this).removeClass(\'upVoted\');
        likedeg($(this).attr(\'rel\'),-1,0);
        }else{
        $(this).addClass(\'upVoted\');
        if($(\'#vote-down-btn-\'+id).hasClass(\'downVoted\')){
        $(\'#vote-down-btn-\'+id).removeClass(\'downVoted\');
        likedeg($(this).attr(\'rel\'),1,-1);
        }else{
        likedeg($(this).attr(\'rel\'),1,0);
        }
        }
        });
    function likedeg(p,l,u){
        jQuery.ajax({
            type:\'POST\',
            url:\'';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/likedeg.php\',
			data:\'l=\'+l+\'&pid=\'+p+\'&u=\'+u,
            success:function(e){
                $(\'#love_count\').html(e);
                }
            });
        }
    </script>
    <script type="text/javascript">
         var barloc=$(\'#post-control-bar\').offset().top; 
         $(window).scroll(function () {
              var curloc=$(window).scrollTop();
              if(curloc>barloc){
        $(\'#post-control-bar\').addClass(\'topbarfixed\');
              }else{
                $(\'#post-control-bar\').removeClass(\'topbarfixed\'); 
                 }
         });
    </script>
	<script type="text/javascript">
		$(\'.badge-buzz-more\').click(function()
			{
			var currIndex=parseInt($("#jsid-buzz-block").attr(\'data-boxIndex\'),10);
			var maxIndex=parseInt($("#jsid-buzz-block").attr(\'data-boxIndexMax\'),10);
			var change=parseInt($(this).attr(\'data-change\'),10);
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
    '; ?>


</div>
<div id="footer" class="">
<?php endif; ?>