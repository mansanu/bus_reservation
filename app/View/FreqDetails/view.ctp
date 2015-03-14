<div class="freqDetails view">
<h2><?php echo __('Freq Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sun'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['sun']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mon'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['mon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tue'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['tue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wed'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['wed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thu'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['thu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fri'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['fri']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sat'); ?></dt>
		<dd>
			<?php echo h($freqDetail['FreqDetail']['sat']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Freq Detail'), array('action' => 'edit', $freqDetail['FreqDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Freq Detail'), array('action' => 'delete', $freqDetail['FreqDetail']['id']), null, __('Are you sure you want to delete # %s?', $freqDetail['FreqDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Freq Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freq Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Travel Details'); ?></h3>
	<?php if (!empty($freqDetail['TravelDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bus Id'); ?></th>
		<th><?php echo __('Route Id'); ?></th>
		<th><?php echo __('Depature Time'); ?></th>
		<th><?php echo __('Arrival Time'); ?></th>
		<th><?php echo __('Fare'); ?></th>
		<th><?php echo __('Freq Detail Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php //foreach ($freqDetail['TravelDetail'] as $travelDetail): ?>
		<tr>
			<td><?php echo $freqDetail['TravelDetail']['id']; ?></td>
			<td><?php echo $freqDetail['TravelDetail']['bus_id']; ?></td>
			<td><?php echo $freqDetail['TravelDetail']['route_id']; ?></td>
			<td><?php echo $freqDetail['TravelDetail']['depature_time']; ?></td>
			<td><?php echo $freqDetail['TravelDetail']['arrival_time']; ?></td>
			<td><?php echo $freqDetail['TravelDetail']['fare']; ?></td>
			<td><?php echo $freqDetail['TravelDetail']['freq_detail_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'travel_details', 'action' => 'view', $freqDetail['TravelDetail']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'travel_details', 'action' => 'edit', $freqDetail['TravelDetail']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'travel_details', 'action' => 'delete', $freqDetail['TravelDetail']['id']), null, __('Are you sure you want to delete # %s?', $freqDetail['TravelDetail']['id'])); ?>
			</td>
		</tr>
	<?php //endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
