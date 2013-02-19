<?php $this->extend('/Common/view');	
	$this->assign('exclude','editopenid');
?>
<div class="openids form">
<?php echo $this->Form->create('Openid'); ?>
	<fieldset>
		<legend><?php echo __('Edit Openid'); ?></legend>
	<?php
		echo $this->Form->input('identity');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>