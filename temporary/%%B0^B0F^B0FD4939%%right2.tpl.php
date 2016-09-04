<?php /* Smarty version 2.6.6, created on 2014-01-13 14:51:47
         compiled from right2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'get_advertisement', 'right2.tpl', 7, false),)), $this); ?>
		<div>
			<a class="bts spaceBottom" href="<?php echo $this->_tpl_vars['baseurl']; ?>
/submit" style="float: left; width: 278px; color: white">Click để bắt đầu chia sẻ những bức ảnh vui!</a>
			<div class="clear"></div>
		</div>
		<div class="s-300" id="top-s300">
        	<?php if ($_SESSION['FILTER'] == '1' && $this->_tpl_vars['NSFWADS']): ?>
        	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 3)), $this); ?>

            <?php else: ?>
        	<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'get_advertisement', 'AID' => 1)), $this); ?>

			<?php endif; ?>
        </div>