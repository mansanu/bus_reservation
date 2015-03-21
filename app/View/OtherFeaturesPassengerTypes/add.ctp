<div class="otherFeaturesPassengerTypes form">
<?php echo $this->Form->create('OtherFeaturesPassengerType'); ?>
	<fieldset>
		<legend><?php echo __('Add Other Features Passenger Type'); ?></legend>
	<?php
		echo $this->Form->input('other_feature_id');
		echo $this->Form->input('passenger_type_id');
		echo $this->Form->input('fare');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Other Features Passenger Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Other Features'), array('controller' => 'other_features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Feature'), array('controller' => 'other_features', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passenger Types'), array('controller' => 'passenger_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger Type'), array('controller' => 'passenger_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
