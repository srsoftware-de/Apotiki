<?php $this->extend('/Common/view');	
	$this->assign('exclude','addopenid');
?>
<div class="openids form">
<?php echo $this->Form->create('Openid'); ?>
	<fieldset>
		<legend><?php echo __('Add Openid'); ?></legend>
	<?php
		echo $this->Form->input('openid');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
