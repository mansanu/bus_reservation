<div class="col-lg-8">
 <div class="panel panel-primary">
  <div class="panel-heading">Booking Information</div>
 	<div class="panel-body">
<?php 
	echo $this->Form->create('ReservationDetail',array('controller'=>'reservation_details','action'=>'reservation/passenger'));
?>

		<table class="table">
		  <thead>
			 <tr>
			  <th>Seat no.</th>
			  <th>Passenger Type</th>
			 </tr>
		  </thead>
		  <tbody>

	<?php foreach($total_seats as $total_seat): ?>
			<tr>
			<td><?php echo $total_seat;?></td>
			<td>
			<?php echo $this->Form->input('PassengerType.id.'.$total_seat,array(
											'type'=>'select',
											'label'=>false,
											'class'=>'form-control',
											'options'=>$passengerTypes));
											?>
			</td>
			<?php //echo $this->Form->input('ReservationDetail.seat_no',array('type'=>'hidden','value'=>$total_seat));?>
			</tr>
	<?php endforeach; ?>
		  </tbody>		
		</table>
	<h3>Contact Information </h3>
	<div class="form-group">
	  <label for="inputName">Name</label>
	  <?php
		echo $this->Form->input('Passenger.name',array(
										'label'=>false,
										'class'=>'form-control',
										'placeholder'=>'Your Name',
										'required'=>'required'
										));
	  ?>
	</div>
	
	<div class="form-group">
	  <label for="inputEmail">Email</label>
		<?php

		echo $this->Form->input('Passenger.email',array(
										'label'=>false,
										'class'=>'form-control',
										'placeholder'=>'Your Email',
										));
		?>
	</div>

	<div class="form-group">
	  <label for="inputAddress">Address</label>
	  <?php
		echo $this->Form->input('Passenger.address',array(
										'label'=>false,
										'class'=>'form-control',
										'placeholder'=>'Your Address',
										));
	  ?>
	</div>

	<div class="form-group">
	  <label for="inputPhone">Phone no.</label>
	  <?php
		echo $this->Form->input('Passenger.phone_no',array(
										'label'=>false,
										'class'=>'form-control',
										'placeholder'=>'Your Phone no',
										'required'=>'required'
										));
	  ?>
	</div>

	<div class="form-group">
	  <label for="inputMobile">Mobile</label>
	  <?php
		echo $this->Form->input('Passenger.mobile',array(
										'label'=>false,
										'class'=>'form-control',
										'placeholder'=>'Your Mobile',
										));
	  ?>
	 </div>

	 <?php
		  echo $this->Html->link('<i class="glyphicon glyphicon-chevron-left"></i> Previous',array('controller'=>'reservation_details','action'=>'reservation/seats'),array('escape' => false,'class'=>'btn btn-primary'));
	?>
	 <button type="submit" class="btn btn-primary">Continue <i class="glyphicon glyphicon-chevron-right"></i></button>
	<button id="cancel" name="Cancel" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>
	<?php echo $this->Form->end(); ?>
    </div>
  </div>
 </div>
