<?php
//pr($this->request->data);
?>

<div class="col-lg-8">
   <div class="panel panel-primary">
 	  <div class="panel-heading">Route</div>
 	  <div class="panel-body">
		<table class="table">
			<thead>
				<tr>
						<th>Agency</th>
						<th>From</th>
						<th>Destination</th>
						<th>Bus no.</th>
						<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($freq_details as $freq_detail): ?>
				<tr>
				<td><?php echo h($freq_detail['Bus']['Agency']['name']); ?>&nbsp;</td>
				<td>
				<?php 
				foreach($cities as $city):
				 if($freq_detail['Route']['from_city']==$city['City']['id']){
					 $from = $city['City']['name'];
				 break;
				 }
				endforeach;
				echo h($from);
				?>&nbsp;</td>
				<td>
				<?php 
				foreach($cities as $city):
				 if($freq_detail['Route']['to_city']==$city['City']['id']){
					 $to = $city['City']['name'];
				 break;
				 }
				endforeach;
				echo h($to)
				?>&nbsp;</td>
				<td><?php echo h($freq_detail['Bus']['bus_reg_no']); ?>&nbsp;</td>
				<td class="actions">
					<?php //echo $this->Form->postLink(__('Select Seat'), array('controller' => 'reserves','action' =>'add', $route['Route']['id']), null); ?>
					<?php 
					/*echo $this->Html->link('Select Seat', 
							array('controller' => 'reservation_details','action'=>'seats', 
							$freq_detail['TravelDetail']['id'],
							$this->request->data['Route']['query_date']
							)); */
					?>
					<?php echo $this->Form->postLink(__('Select Seat'), array(
		                                     'controller' => 'reservation_details',
		                                     'action' => 'register',
		                                     'travel_id' => $freq_detail['TravelDetail']['id'],
		                                     'travel_date' => $this->request->data['Route']['query_date']
		                                     ),
											array('class' => 'btn btn-primary btn-sm')

		                                ); ?>
				</td>
			</tr>
		  <?php endforeach; ?>
	     </tbody>
		</table>
		</div>
	</div>
</div>