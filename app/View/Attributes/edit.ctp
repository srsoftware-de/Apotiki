<?php $this->extend('/Common/view');	
	$this->assign('exclude','editattribute');
?>
<div class="attributes form">
<?php echo $this->Form->create('Attribute'); ?>
	<fieldset>
		<legend><?php echo __('Edit Attribute'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
