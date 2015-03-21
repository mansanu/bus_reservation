<div class="otherFeatures form">
<?php echo $this->Form->create('OtherFeature'); ?>
	<fieldset>
		<legend><?php echo __('Add Other Feature'); ?></legend>
	<?php
		echo $this->Form->input('name');
		//echo $this->Form->input('PassengerType');
		//echo $this->Form->input('TravelDetail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Other Features'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Passenger Types'), array('controller' => 'passenger_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger Type'), array('controller' => 'passenger_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
