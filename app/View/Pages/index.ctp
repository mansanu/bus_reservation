<?php
echo $this->Html->script('jquery-ui');
echo $this->Html->css('jquery-ui');
?>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
		dateFormat: 'yy-mm-dd',
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
<h2>BUS BOOKING</h2>

<div class="route form">

<?php echo $this->Form->create('Route',array('url'=>'/routes/search')); ?>
	<fieldset>
		<legend><?php echo __('Book'); ?></legend>
	<?php
		echo $this->Form->input('from_city',array(
									'type'=>'select',
									'options'=>$cities
									));
		echo $this->Form->input('to_city',array(
									'type'=>'select',
									'options'=>$cities
									));
		echo $this->Form->input('query_date',array('id'=>'datepicker'));
		echo $this->Form->input('weekday',array('id'=>'weekday','type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>