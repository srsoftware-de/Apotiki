<?php $this->extend('/Common/view');	
	$this->assign('exclude','addproperty');
?>
<div class="properties form">
	<?php echo $this->Form->create('Property'); ?>
	<fieldset>
		<legend>
			<?php echo __('Add Property'); ?>
		</legend>
		<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('attribute_id');
		echo $this->Form->label(__('Value'));
		echo $this->Form->text('value');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
