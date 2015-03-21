<?php
extract($wizardData);
//pr($wizardData);
?>
<div class="col-lg-8">
  <div class="panel panel-primary">
 	<div class="panel-heading">Confirmation</div>
 	  <div class="panel-body">
 	  	<h3>Booking Description</h3>
 	  	<p>Name: <?php echo $passenger['Passenger']['name'];?></p>
 	  	<p>Email: <?php echo $passenger['Passenger']['email'];?></p>
 	  	<p>Address: <?php echo $passenger['Passenger']['address'];?></p>
 	  	<p>Phone no.: <?php echo $passenger['Passenger']['phone_no'];?></p>
 	  	<p>Mobile: <?php echo $passenger['Passenger']['mobile'];?></p>
 	  	<p>Seats: <?php echo $seats['ReservationDetail']['selected_seats'];?></p>
 	  	<p>Total Price: <?php echo $total_price;?></p>

<?php 
	   echo $this->Form->create('ReservationDetail',array('controller'=>'reservation_details','action'=>'reservation/review'));
?>	
<?php 
		echo $this->Form->input('success',array(
										'type'=>'hidden'));
	?>		

<?php
	   echo $this->Html->link('<i class="glyphicon glyphicon-chevron-left"></i> Previous',array('controller'=>'reservation_details','action'=>'reservation/passenger'),array('escape' => false,'class'=>'btn btn-primary'));
?>
	 <button class="btn btn-success">Confirm Booking <i class="glyphicon glyphicon-save"></i></button>
	<button id="cancel" name="Cancel" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>

<?php echo $this->Form->end(); ?>
