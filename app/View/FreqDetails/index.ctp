<div class="freqDetails index">
	<h2><?php echo __('Freq Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sun'); ?></th>
			<th><?php echo $this->Paginator->sort('mon'); ?></th>
			<th><?php echo $this->Paginator->sort('tue'); ?></th>
			<th><?php echo $this->Paginator->sort('wed'); ?></th>
			<th><?php echo $this->Paginator->sort('thu'); ?></th>
			<th><?php echo $this->Paginator->sort('fri'); ?></th>
			<th><?php echo $this->Paginator->sort('sat'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($freqDetails as $freqDetail): ?>
	<tr>
		<td><?php echo h($freqDetail['FreqDetail']['id']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['sun']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['mon']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['tue']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['wed']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['thu']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['fri']); ?>&nbsp;</td>
		<td><?php echo h($freqDetail['FreqDetail']['sat']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $freqDetail['FreqDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $freqDetail['FreqDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $freqDetail['FreqDetail']['id']), null, __('Are you sure you want to delete # %s?', $freqDetail['FreqDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Freq Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
