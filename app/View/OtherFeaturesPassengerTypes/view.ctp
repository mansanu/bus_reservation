<div class="otherFeaturesPassengerTypes view">
<h2><?php echo __('Other Features Passenger Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otherFeaturesPassengerType['OtherFeaturesPassengerType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other Feature'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherFeaturesPassengerType['OtherFeature']['name'], array('controller' => 'other_features', 'action' => 'view', $otherFeaturesPassengerType['OtherFeature']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Passenger Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherFeaturesPassengerType['PassengerType']['name'], array('controller' => 'passenger_types', 'action' => 'view', $otherFeaturesPassengerType['PassengerType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare'); ?></dt>
		<dd>
			<?php echo h($otherFeaturesPassengerType['OtherFeaturesPassengerType']['fare']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Other Features Passenger Type'), array('action' => 'edit', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Other Features Passenger Type'), array('action' => 'delete', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id']), null, __('Are you sure you want to delete # %s?', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Features Passenger Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Features Passenger Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Features'), array('controller' => 'other_features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Feature'), array('controller' => 'other_features', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passenger Types'), array('controller' => 'passenger_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger Type'), array('controller' => 'passenger_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
