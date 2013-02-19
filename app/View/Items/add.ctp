<?php $this->extend('/Common/view');	
	$this->assign('exclude','additem');
?>
<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->text('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>