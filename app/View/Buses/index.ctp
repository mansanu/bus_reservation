<div class="buses index">
	<h2><?php echo __('Buses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bus_reg_no'); ?></th>
			<th><?php echo $this->Paginator->sort('bus_max_seat'); ?></th>
			<th><?php echo $this->Paginator->sort('bus_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('agency_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($buses as $bus): ?>
	<tr>
		<td><?php echo h($bus['Bus']['id']); ?>&nbsp;</td>
		<td><?php echo h($bus['Bus']['bus_reg_no']); ?>&nbsp;</td>
		<td><?php echo h($bus['Bus']['bus_max_seat']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bus['BusType']['name'], array('controller' => 'bus_types', 'action' => 'view', $bus['BusType']['id'])); ?>
		</td>
		<td><?php echo h($bus['Bus']['agency_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bus['Bus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bus['Bus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bus['Bus']['id']), null, __('Are you sure you want to delete # %s?', $bus['Bus']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bus'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bus Types'), array('controller' => 'bus_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus Type'), array('controller' => 'bus_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
