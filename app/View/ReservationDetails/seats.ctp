<?php
echo $this->Html->css('jquery.seat-charts');
echo $this->Html->script('jquery');
echo $this->Html->script('jquery.seat-charts');

$unavailable = $reserved_seats;
?>
<div class="search">

<p>Bus:<?php echo $businfo['Bus']['name']?></p>
<p>Route:<?php echo $businfo['Route']['from_location']?> - <?php echo $businfo['Route']['to_location']?></p>
<p>Date:<?php echo $businfo['Route']['depart_date']?></p>
<p>Time:<?php echo $businfo['Route']['depart_time']?></p>

<?php echo $this->Form->create('Route');?>
<div id="legend"></div>
	<div id="seat-map"><div class="front-indicator">Front</div></div>
				
	<div class="booking-details">
		<h2>Booking Details</h2>	
		<p>Seat: </p>
		<ul id="selected-seats"></ul>
		<p>Total Tickets: <span id="counter">0</span></p>
		
		<input name="selected_seats" class="selected_seats" id="selected_seats" type="hidden">
		<input name="route_id" class="route_id" id="route_id" type="hidden" value="<?php echo $route_id ?>">
		<button class="checkout-button">Continue &raquo;</button>
	</div> 
		 
		<?php echo $this->Form->end();?>
</div>

<script>
			var firstSeatLabel = 1;
		
			$(document).ready(function() {
				var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					sc = $('#seat-map').seatCharts({
					map: [
						'_eeeeeeee',
						'_eeeeeeee',
						'________e',
						'eeeeeeeee',
						'eeeeeeeee',
					],
					/*seats: {
						f: {
							price   : 100,
							classes : 'first-class', //your custom CSS class
							category: 'First Class'
						},
						e: {
							price   : 40,
							classes : 'economy-class', //your custom CSS class
							category: ''
						}					
					
					},*/

					naming : {
						top : false,
						left : false,
						//columns: ['1', '2', '3', '4','5','6','7','8','9'],
						//rows: ['1', '3', '5', '7','9','11','13','15','17'],
						rows: ['A','A','C','B','B'],
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
							$('<li>'+this.settings.id+'</li>')
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
						
							if (seat == '') {$('#selected_seats').val(this.settings.id);}
							else{$('#selected_seats').val(seat +','+this.settings.id);}

							
							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//and total
							$total.text(recalculateTotal(sc)-this.data().price);
						
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