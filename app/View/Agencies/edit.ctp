<div class="agencies form">
<?php echo $this->Form->create('Agency'); ?>
	<fieldset>
		<legend><?php echo __('Edit Agency'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('phone_no');
		echo $this->Form->input('mobile');
		echo $this->Form->input('email');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Agency.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Agency.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Agencies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
	</ul>
</div>
