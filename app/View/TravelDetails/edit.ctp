<div class="travelDetails form">
<?php echo $this->Form->create('TravelDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Travel Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bus_id');
		echo $this->Form->input('route_id');
		echo $this->Form->input('depature_time');
		echo $this->Form->input('arrival_time');
		echo $this->Form->input('fare');
		echo $this->Form->input('freq_detail_id',array('type'=>'hidden'));
		echo $this->Form->input('FreqDetail.sun',array(
								'type' => 'checkbox',
								'label'=>'Sun'
						));
		echo $this->Form->input('FreqDetail.mon',array(
								'type' => 'checkbox',
								'label'=>'Mon'
						));
		echo $this->Form->input('FreqDetail.tue',array(
								'type' => 'checkbox',
								'label'=>'Tue'
						));
		echo $this->Form->input('FreqDetail.wed',array(
								'type' => 'checkbox',
								'label'=>'Wed'
						));
		echo $this->Form->input('FreqDetail.thu',array(
								'type' => 'checkbox',
								'label'=>'Thu'
						));
		echo $this->Form->input('FreqDetail.fri',array(
								'type' => 'checkbox',
								'label'=>'Fri'
						));
		echo $this->Form->input('FreqDetail.sat',array(
								'type' => 'checkbox',
								'label'=>'Sat'
						));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TravelDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TravelDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Freq Details'), array('controller' => 'freq_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freq Detail'), array('controller' => 'freq_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
