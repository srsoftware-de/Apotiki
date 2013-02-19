<?php $this->extend('/Common/view');	
	$this->assign('exclude','edituser');
?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('name');
		echo $this->Form->input('password');
		echo $this->Form->input('supervisor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
