<div class="busTypes form">
<?php echo $this->Form->create('BusType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bus Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BusType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BusType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bus Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
	</ul>
</div>
