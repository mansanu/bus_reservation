<?php
echo $this->Html->css('jquery.seat-charts');
echo $this->Html->script('jquery');
echo $this->Html->script('jquery.seat-charts');

$unavailable = $reserved_seats;

$selected_seats = @explode(',',$selected_seat_no);

?>

<div class="col-lg-4">
  <div class="panel panel-info">
 	<div class="panel-heading">Bus Information</div>
 	  <div class="panel-body">
		<p>
			<?php echo h($travel_detail['Bus']['Agency']['name']);?>
			(<?php echo h($travel_detail['Bus']['BusType']['name']);?>)

		</p>
		<p>Bus no.: <?php echo h($travel_detail['Bus']['bus_reg_no']);?></p>

		<p>Route:
		<?php 
			foreach($cities as $city):
				if($travel_detail['Route']['from_city']==$city['City']['id']){
				   $from = $city['City']['name'];
					break;
				}
			endforeach;
			echo h($from);
		?>
	 -
		<?php
			foreach($cities as $city):
			 if($travel_detail['Route']['to_city']==$city['City']['id']){
				 $to = $city['City']['name'];
			 break;
			 }
			endforeach;
			echo h($to)
		?>
		</p>

		<p>Departure Date: <?php echo h($depature_date);?></p>
		<p>Departure Time: <?php echo $travel_detail['TravelDetail']['depature_time']?></p>
		<p>Arrival Time: <?php echo $travel_detail['TravelDetail']['arrival_time']?></p>
		<p>Ticket Price: <?php echo $travel_detail['TravelDetail']['fare']?></p>
		</div>
	</div>
</div>

<div class="col-lg-4">
  <div class="panel panel-warning">
 	<div class="panel-heading">Other Features</div>
 	  <div class="panel-body">

		<?php foreach($otherFeatures['OtherFeature'] As $other_feature): ?>
				
				<p><?php echo $other_feature['name'] ?></p>
				
				<?php foreach($other_feature['PassengerType'] AS $fare): ?>

			 			<p>&nbsp;&nbsp;<?php echo $fare['name'].' - '.$fare['OtherFeaturesPassengerType']['fare']?></p>

				  <?php endforeach; ?>

				<?php endforeach; ?>
	   </div>
	</div>
</div>

<div style="clear:both"></div>

<div class="col-lg-7">
<h2>Select Seats</h2>	
  <div id="legend"></div>

  <div style="clear:both"></div>

  <div id="seat-map" style="float:left"><div class="front-indicator">Front</div></div>

</div
	
<div class="col-lg-5">

<?php echo $this->Form->create('ReservationDetail',array('controller'=>'reservation_details','action'=>'reservation/seats'));?>			
	<h2>Selected Seats</h2>	
	<p>Seat: </p>
	<ul id="selected-seats"></ul>
	<p>Total Tickets: <span id="counter">0</span></p>
	<!--<p>Total Price: <span id="total">0</span></p>-->

	<?php 
		echo $this->Form->input('PurchaseDetail.total_price',array(
										'type'=>'hidden',
										'id'=>'total_price',
										'class'=>'total_price'));
	?>		
	<?php 
			echo $this->Form->input('ReservationDetail.selected_seats',array(
										'type'=>'hidden',
										'id'=>'selected_seats','
										class'=>'selected_seats'));
	?>

 <button class="btn btn-primary">Continue <i class="glyphicon glyphicon-chevron-right"></i></button>
<button id="cancel" name="Cancel" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle"></i> Cancel</button>	
<?php echo $this->Form->end();?>
 
	</div> 
	
	<div style="clear:both"></div>
</div>

<script>
			var firstSeatLabel = 1;
		
			$(document).ready(function() {
				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					$total_price = $('#total_price'),
					sc = $('#seat-map').seatCharts({
					map: [
						'_e[A1]e[A3]e[A5]e[A7]e[A9]e[A11]e[A13]e[A15]',
						'_e[A2]e[A4]e[A6]e[A8]e[A10]e[A12]e[A14]e[A16]',
						'________e[C1]',
						'e[B2]e[B4]e[B6]e[B8]e[B10]e[B12]e[B14]e[B16]e[B18]',
						'e[B1]e[B3]e[B5]e[B7]e[B9]e[B11]e[B13]e[B15]e[B17]',
					],
					seats: {
					/*	f: {
							price   : 100,
							classes : 'first-class', //your custom CSS class
							category: 'First Class'
						},*/
						e: {
							price   : <?php echo $travel_detail['TravelDetail']['fare']?>,
							//classes : 'economy-class', //your custom CSS class
							//category: ''
						}					
					
					},

					naming : {
						top : false,
						left : false,
						//columns: ['1', '2', '3', '4','5','6','7','8','9'],
						//rows: ['1', '3', '5', '7','9','11','13','15','17'],
						//rows: ['A','A','C','B','B'],
						getLabel : function (character, row, column) {

							//return row + '' + firstSeatLabel++;
							//return row+''+column;

						},
						getId  : function(character, row, column) {
							//s_no = firstSeatLabel++;
						return  row + '' + firstSeatLabel++;
						},
					},
					legend : {
						node : $('#legend'),
					    items : [
							//[ 'f', 'available',   'First Class' ],
							[ 'e', 'available',   'Empty Seats'],
							[ 'e', 'selected',   'Selected Seats'],
							[ 'e', 'unavailable', 'Booked Seats']
					    ]					
					},
					click: function () {
						
						var seat = $('#selected_seats').val();
						
						if (this.status() == 'available') {
							
							//let's create a new <li> which we'll add to the cart items
							/*$('<li>Seat # '+this.settings.label+' <a href="#" class="cancel-cart-item">[cancel]</a></li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);*/
							$('<li role="presentation">'+this.settings.id+' <span class="badge"><a href="#" class="cancel-cart-item">x</a></span></li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length+1);
							$total.text(recalculateTotal(sc)+this.data().price);
							var total_price = recalculateTotal(sc)+this.data().price;
							$('#total_price').val(total_price);
							
							if (seat == '') {$('#selected_seats').val(this.settings.id);}
							else{
								
							if($("#selected_seats").val().indexOf(this.settings.id + ',') > -1){
								$('#selected_seats').val($('#selected_seats').val().replace(this.settings.id + ',',this.settings.id + ','));
							}
							else if($("#selected_seats").val().indexOf(','+this.settings.id) > -1){
								$('#selected_seats').val($('#selected_seats').val().replace(','+this.settings.id,','+this.settings.id));
							}
							else if($("#selected_seats").val().indexOf(this.settings.id) > -1){
								$('#selected_seats').val($('#selected_seats').val().replace(this.settings.id,this.settings.id));
							}
							else{$('#selected_seats').val(seat +','+this.settings.id);}	
							}

							
							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
					
							$counter.text(sc.find('selected').length-1);
							//and total
							$total.text(recalculateTotal(sc)-this.data().price);
							var total_price = recalculateTotal(sc)-this.data().price;
							$('#total_price').val(total_price);
							
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
							
							if($("#selected_seats").val().indexOf(this.settings.id + ',') > -1){
								$('#selected_seats').val($('#selected_seats').val().replace(this.settings.id + ',',''));
							}
							if($("#selected_seats").val().indexOf(','+this.settings.id) > -1){
								$('#selected_seats').val($('#selected_seats').val().replace(','+this.settings.id,''));
							}
							if($("#selected_seats").val().indexOf(this.settings.id) > -1){
								$('#selected_seats').val($('#selected_seats').val().replace(this.settings.id,''));
							}
							//seat has been vacated
							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});

				//this will handle "[cancel]" link clicks
				$('#selected-seats').on('click', '.cancel-cart-item', function () {
					//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
					sc.get($(this).parents('li:first').data('seatId')).click();
				});

				//let's pretend some seats have already been booked
				sc.get([<?php echo $unavailable ?>]).status('unavailable');

					<?php
					if(is_array($selected_seats)){	
						foreach($selected_seats as $selected_seat):
					?>
						sc.get('<?php echo $selected_seat?>').click();
					<?php 
						endforeach;
					}
					?>
		});

		function recalculateTotal(sc) {
			var total = 0;
		
			//basically find every selected seat and sum its price
			sc.find('selected').each(function () {
				total += this.data().price;
			});
			
			return total;
		}
		
		</script>