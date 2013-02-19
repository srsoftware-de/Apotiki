<?php $this->extend('/Common/view');	
	$this->assign('exclude','editporoperty');
?>
<div class="properties form">
<?php echo $this->Form->create('Property'); ?>
	<fieldset>
		<legend><?php echo __('Edit Property'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('attribute_id');
		echo $this->Form->input('value');
		echo $this->Form->input('item_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>