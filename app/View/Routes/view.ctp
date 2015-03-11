<div class="routes view">
<h2><?php echo __('Route'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($route['Route']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo h($route['Route']['distance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From City'); ?></dt>
		<dd>
			<?php echo h($route['Route']['from_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To City'); ?></dt>
		<dd>
			<?php echo h($route['Route']['to_city']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Route'), array('action' => 'edit', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Route'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Travel Details'); ?></h3>
	<?php if (!empty($route['TravelDetail'])): ?>
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
	<?php foreach ($route['TravelDetail'] as $travelDetail): ?>
		<tr>
			<td><?php echo $travelDetail['id']; ?></td>
			<td><?php echo $travelDetail['bus_id']; ?></td>
			<td><?php echo $travelDetail['route_id']; ?></td>
			<td><?php echo $travelDetail['depature_time']; ?></td>
			<td><?php echo $travelDetail['arrival_time']; ?></td>
			<td><?php echo $travelDetail['fare']; ?></td>
			<td><?php echo $travelDetail['freq_detail_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'travel_details', 'action' => 'view', $travelDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'travel_details', 'action' => 'edit', $travelDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'travel_details', 'action' => 'delete', $travelDetail['id']), null, __('Are you sure you want to delete # %s?', $travelDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
