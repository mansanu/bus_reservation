<div class="passengerTypes form">
<?php echo $this->Form->create('PassengerType'); ?>
	<fieldset>
		<legend><?php echo __('Add Passenger Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		//echo $this->Form->input('OtherFeature');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Passenger Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Other Features'), array('controller' => 'other_features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Feature'), array('controller' => 'other_features', 'action' => 'add')); ?> </li>
	</ul>
</div>
