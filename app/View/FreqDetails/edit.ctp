<div class="freqDetails form">
<?php echo $this->Form->create('FreqDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Freq Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sun');
		echo $this->Form->input('mon');
		echo $this->Form->input('tue');
		echo $this->Form->input('wed');
		echo $this->Form->input('thu');
		echo $this->Form->input('fri');
		echo $this->Form->input('sat');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FreqDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FreqDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Freq Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
