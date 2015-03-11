<div class="routes form">
<?php echo $this->Form->create('Route'); ?>
	<fieldset>
		<legend><?php echo __('Add Route'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('distance');
		echo $this->Form->input('from_city',array(
									'type'=>'select',
									'options'=>$cities
									));
		echo $this->Form->input('to_city',array(
									'type'=>'select',
									'options'=>$cities
									));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
