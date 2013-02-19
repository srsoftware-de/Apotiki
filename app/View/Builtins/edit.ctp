<?php $this->extend('/Common/view');	
	$this->assign('exclude','builtins');
?>
<div class="builtins form">
<?php echo $this->Form->create('Builtin'); ?>
	<fieldset>
		<legend><?php echo __('Edit Builtin'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('included_item_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>