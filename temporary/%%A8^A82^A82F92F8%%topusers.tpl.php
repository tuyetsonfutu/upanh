<?php /* Smarty version 2.6.6, created on 2013-12-23 10:10:17
         compiled from topusers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_advertisement', 'topusers.tpl', 52, false),)), $this); ?>
    <div id="main">
        <div id="content-holder">
            <div class="post-info-pad">
                <h1><?php echo $this->_tpl_vars['lang260']; ?>
</h1>
            </div>
        
            <div id="content">
            <div id="entries-content" class="list">
						
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
										
					<div style="margin-bottom: 15px; background: none repeat scroll 0% 0% rgb(248, 248, 248); border-radius: 5px 5px 5px 5px; padding: 15px; text-shadow: 0pt 1px rgb(255, 255, 255);"><img src="<?php echo $this->_tpl_vars['membersprofilepicurl']; ?>
/<?php if ($this->_tpl_vars['users'][$this->_sections['i']['index']]['profilepicture'] == ""): ?>noprofilepicture.jpg<?php else:  echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['profilepicture'];  endif; ?>?<?php echo time(); ?>
" style="border: 2px solid rgb(187, 187, 187); float: left; margin-right: 10px;width:50px;height:50px;">
              
					<div style="margin: 0pt 15px 0pt 60px;">
					<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['USERID']; ?>
" style="font-size: 16px; font-weight: bold; padding-bottom: 5px; margin-bottom: 6px; border-bottom: 1px solid rgb(242, 242, 242); display: block;"><?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['username']; ?>
</a>
					<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/user/<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['USERID']; ?>
" style="font-size: 12px; color: rgb(68, 68, 68);"><?php echo $this->_tpl_vars['lang283']; ?>
: <?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['rank']; ?>
&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;<?php echo $this->_tpl_vars['lang284']; ?>
: <?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['posts']; ?>
&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;<?php echo $this->_tpl_vars['lang285']; ?>
: <?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['yourviewed']; ?>
&nbsp;&nbsp;<span style="color: rgb(238, 238, 238);">|</span>&nbsp;&nbsp;<?php echo $this->_tpl_vars['lang286']; ?>
: <?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['points']; ?>
</a>
					</div>
					<div class="clear"></div>
              
					</div>

                    <?php endfor; endif; ?>             
						
						
						
                </div>            

            	<br/>
            <div id="paging-buttons" class="paging-buttons">
            	<?php if ($this->_tpl_vars['tpp'] != ""): ?>
                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top-users?page=<?php echo $this->_tpl_vars['tpp']; ?>
" class="previous">&laquo; <?php echo $this->_tpl_vars['lang261']; ?>
</a>
                <?php else: ?>
                <a href="#" onclick="return false;" class="previous disabled">&laquo; <?php echo $this->_tpl_vars['lang261']; ?>
</a>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['tnp'] != ""): ?>
                <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/top-users?page=<?php echo $this->_tpl_vars['tnp']; ?>
" class="older"><?php echo $this->_tpl_vars['lang262']; ?>
 &raquo;</a>
                <?php else: ?>
                <a href="#" onclick="return false;" class="older disabled"><?php echo $this->_tpl_vars['lang262']; ?>
 &raquo;</a>
                <?php endif; ?>
            </div>	
            </div>
        </div>
    </div>
    	
		
<div class="side-bar">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'right2.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
<div id="moving-boxes">
<!-- Ads Num. 1
            <div class="s-300" >            
            	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 1)), $this); ?>

            </div>        
-->

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
            $(\'#moving-boxes\').css(\'z-index\',\'200\');
        };
        if(curloca <= adloca){
            $(\'#moving-boxes\').css(\'position\',\'static\');
            $(\'#moving-boxes\').css(\'top\',\'!important\');
            $(\'#moving-boxes\').css(\'z-index\',\'!important\');
        };
        });    
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
    '; ?>

</div>
<div id="footer" class="">