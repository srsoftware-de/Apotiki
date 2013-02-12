<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please login using Username and Password:'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php
echo $this->Form->end(__('Login'));

echo $this->Html->link(__('Login with OpenId'),array('action'=>'openidlogin')); 
?>
</div>