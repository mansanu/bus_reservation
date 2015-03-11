<?php
//pr($travelDetails);
?>
<div class="travelDetails index">
	<h2><?php echo __('Travel Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Bus.agency_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bus_id'); ?></th>
			<th><?php echo $this->Paginator->sort('route_id'); ?></th>
			<th><?php echo $this->Paginator->sort('depature_time'); ?></th>
			<th><?php echo $this->Paginator->sort('arrival_time'); ?></th>
			<th><?php echo $this->Paginator->sort('fare'); ?></th>
			<th><?php echo $this->Paginator->sort('freq_detail_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travelDetails as $travelDetail): ?>
	<tr>
		<td>
			<?php 
		foreach($agencies as $agency):
		 if($travelDetail['Bus']['agency_id']==$agency['Agency']['id']){
			 $agency_name = $agency['Agency']['name'];
		 break;
		 }
		endforeach;
			echo $this->Html->link($agency_name, array('controller' => 'agencies', 'action' => 'view', $travelDetail['Bus']['agency_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($travelDetail['Bus']['bus_reg_no'], array('controller' => 'buses', 'action' => 'view', $travelDetail['Bus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($travelDetail['Route']['name'], array('controller' => 'routes', 'action' => 'view', $travelDetail['Route']['id'])); ?>
		</td>
		<td><?php echo h($travelDetail['TravelDetail']['depature_time']); ?>&nbsp;</td>
		<td><?php echo h($travelDetail['TravelDetail']['arrival_time']); ?>&nbsp;</td>
		<td><?php echo h($travelDetail['TravelDetail']['fare']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($travelDetail['FreqDetail']['id'], array('controller' => 'freq_details', 'action' => 'view', $travelDetail['FreqDetail']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $travelDetail['TravelDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $travelDetail['TravelDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $travelDetail['TravelDetail']['id']), null, __('Are you sure you want to delete # %s?', $travelDetail['TravelDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('action' => 'add')); ?></li>
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
