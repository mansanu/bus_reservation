<div class="buses form">
<?php echo $this->Form->create('Bus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bus'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bus_reg_no');
		echo $this->Form->input('bus_max_seat');
		echo $this->Form->input('bus_type_id');
		echo $this->Form->input('agency_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bus.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Bus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Buses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bus Types'), array('controller' => 'bus_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus Type'), array('controller' => 'bus_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
