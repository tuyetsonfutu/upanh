<?php /* Smarty version 2.6.6, created on 2013-12-20 22:06:42
         compiled from trendingjson.tpl */ ?>
					<?php if ($this->_tpl_vars['enable_fc'] == '1'): ?>
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
                	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['posts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "trends_bit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endfor; endif; ?>                
					<?php echo '
					<script type="text/javascript">
                    $(\'.unlove\').click(function(){
                    var id=$(this).attr(\'entryId\');
                    if( $(this).hasClass(\'unloved\')){
                    $(this).removeClass(\'unloved\');
                    ulikedeg($(this).attr(\'entryId\'),0,-1);
                    }else{
                    $(this).addClass(\'unloved\');
                    if($(\'#post_love_\'+id).hasClass(\'loved\')){
                    ulikedeg($(this).attr(\'entryId\'),-1,1);	
                    $(\'#post_love_\'+id).removeClass(\'loved\');
                    }else{
                    ulikedeg($(this).attr(\'entryId\'),0,1);	
                    }
                    }
                    });
                    $(\'.vote\').click(function(){
                    var id=$(this).attr(\'rel\');
                    if( $(this).hasClass(\'loved\')){
                    $(this).removeClass(\'loved\');
                    ulikedeg($(this).attr(\'rel\'),-1,0);
                    }else{
                    $(this).addClass(\'loved\');
                    if($(\'#vote-down-btn-\'+id).hasClass(\'unloved\')){
                    $(\'#vote-down-btn-\'+id).removeClass(\'unloved\');
                    ulikedeg($(this).attr(\'rel\'),1,-1);
                    }else{
                    ulikedeg($(this).attr(\'rel\'),1,0);
                    }
                    }
                    });        
                    function ulikedeg(p,l,u){
                    jQuery.ajax({
                    type:\'POST\',
                    url:\'';  echo $this->_tpl_vars['baseurl'];  echo '\'+ \'/trendgag.php\',
                    data:\'l=\'+l+\'&pid=\' + p +\'&u=\'+u,
                    success:function(e){
                    $(\'#love_count_\'+p).html(e);
                    }
                    });
                    }        
                    </script>
					'; ?>