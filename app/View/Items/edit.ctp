<?php $this->extend('/Common/view');	
	$this->assign('exclude','edititem');
?>
<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Edit Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('erased');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>