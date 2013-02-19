<?php $this->extend('/Common/view');	
	$this->assign('exclude','addplace');
?>
<div class="places form">
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Add Place'); ?></legend>
	<?php
		echo __('Name this place:');
		echo $this->Form->text('description');
		echo $this->Form->input('place_id',array('label'=>__('located at')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
