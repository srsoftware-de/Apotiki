<?php $this->extend('/Common/view');	
	$this->assign('exclude','select');
?>
<div class="itemPlaces form">
<?php echo $this->Form->create('ItemPlace'); ?>
	<fieldset>
		<legend><?php echo __('Choose Item Origin'); ?></legend>
	<?php
		echo $this->Form->input('place_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>