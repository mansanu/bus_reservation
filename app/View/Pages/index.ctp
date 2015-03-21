<?php
$this->assign('title', 'Bus Reservation');
echo $this->Html->script('jquery-ui');
echo $this->Html->css('jquery-ui');

echo $this->Html->css('select2');
echo $this->Html->script('select2');

?>
<script>
  $(function() {
  	var dateToday = new Date();
    $( "#datepicker" ).datepicker({
		dateFormat: 'yy-mm-dd',
		minDate: dateToday,
		onSelect: function(dateText, inst) {
			//var day = dateText.split("/"); 
			 var date = $(this).datepicker('getDate');
			 var weekday=new Array(7);
				weekday[0]="sun";
				weekday[1]="mon";
				weekday[2]="tue";
				weekday[3]="wed";
				weekday[4]="thu";
				weekday[5]="fri";
				weekday[6]="sat";
			 var dayOfWeek = weekday[date.getDay()];
		 
			$('#weekday').val(dayOfWeek);
    }
		});
  });
  </script>

<script type="text/javascript">

 $(document).ready(function() {

  $(".from_city").select2();
  $(".to_city").select2();


});

</script>




<div class="col-lg-4">
 <div class="panel panel-primary">
 	<div class="panel-heading">Booking</div>
 	<div class="panel-body">
		<?php echo $this->Form->create('Route',array('id'=>'search_form','url'=>'/routes/search')); ?>


	    <div class="form-group">
	    	<label for="inputEmail">From Address</label>
			<?php
				echo $this->Form->input('from_city',array(
											'type'=>'select',
											'label'=>false,
											'class'=>'form-control from_city',
											'options'=>$cities
											));
			?>
		</div>

		<div class="form-group">
	    	<label for="inputEmail">To Address</label>
			<?php
				echo $this->Form->input('to_city',array(
											'type'=>'select',
											'label'=>false,
											'class'=>'form-control to_city',
											'options'=>$cities
											));
			?>
		</div>

		<div class="form-group">
	    	<label for="inputEmail">Travel Date</label>
		<?php 
				echo $this->Form->input('query_date',array(
									'id'=>'datepicker',
									'label'=>false,
									'class'=>'form-control',
									'readonly'=>'readonly',
									'required'=>'required'
									));	
		?>
		</div>

		<?php echo $this->Form->input('weekday',array('id'=>'weekday','type'=>'hidden')); ?>
	
		<button type="submit" class="btn btn-primary">Search Buses</button>

		<?php echo $this->Form->end(); ?>

	</div>
  </div>
</div>

<script>
var availableTags = [
	{"value":"Some Name","id":1},{"value":"Some Othername","id":2}
	
];
$( "#autocomplete" ).autocomplete({
	source: availableTags
});
</script>