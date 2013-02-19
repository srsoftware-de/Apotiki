<?php $this->extend('/Common/view');	
	$this->assign('exclude','addbuiltin');
?>
<div class="builtins form">
	<?php echo $this->Form->create('Builtin'); ?>
	<fieldset>
		<legend>
			<?php echo __('Add Builtin'); ?>
		</legend>
		<?php
		echo $this->Form->input('included_item_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('item_id',array('label'=>__('included in')));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
