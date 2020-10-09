<!DOCTYPE html>
<html>
<head>
	<title>TimeTable</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<table class="table">
	  <thead>
		    <tr>
		      	<th scope="col">Day</th>
			  	<?php foreach ($Period as $key => $value) { ?>
			      <th scope="col" class="<?php echo $value; ?>"><?php echo $value; ?></th>
				<?php } ?>
		    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($Days as $day) { ?>
	    <tr>
	      	<th scope="row"><?php echo $day; ?></th>
	      	
	      	<?php foreach ($Period as $per) {  foreach ($Class as $cla) { ?>
	      		<td onclick="getDayPeriod('<?php echo $day.'_'.$per.'_'.$cla; ?>')"  data-toggle="modal" data-target="#exampleModal"><?php echo $cla; ?></td>
			<?php } } ?>

	    </tr> <?php } ?>
	  
	  </tbody>
	</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
      		<div class="col-10 offset-1 form-group">
	  			<select class="form-control language">
	  				<option value="">Select Language</option>
			      	<?php foreach ($Language as $Lang) { ?>
			      		<option value="<?php echo $Lang; ?>"><?php echo $Lang; ?></option>
		      		<?php } ?>
	      		</select>
      		</div>
      		<div class="col-10 offset-1 form-group">
	  			<select class="form-control teachers">
	  				<option value="">Select Teacher	</option>
	  				<?php foreach ($Teachers as $teach) { ?>
			      		<option value="<?php echo $teach->Teacher_Id; ?>"><?php echo $teach->Name; ?></option>
		      		<?php } ?>
	  			</select>
	  		</div>
	  		<div class="col-12 text-center">

		  		<span class="classmsg"></span><br>
		  		<button class="AssignPeriod">AssignPeriod</button>
		  	</div>
    	</div>
  </div>
</div>

</body>
</html>


<script type="text/javascript">
	function getDayPeriod(currentperiod){
		
		$('#exampleModalLabel').text(currentperiod);
	}

	// on change of language get language teachers
	$(document).on('change','.language',function(){
		$('.teachers').val('');
	});


	$(document).on('click','.AssignPeriod',function(){
		if($('.language').val()==''){
			$('.language').focus();
			$('.classmsg').css('color','red');
        	$('.classmsg').html('Select the value');
		}
		else if($('.teachers').val()==''){
			$('.teachers').focus();
			$('.classmsg').css('color','red');
        	$('.classmsg').html('Select the value');
		}
		else{
			$.ajax({
	            type: 'post',
	            url: '<?php echo base_url();?>CSchool/AssignTeacherPeriod',
	            data:{lang:$('.language').val(),teach:$('.teachers').val(),day:$('#exampleModalLabel').text()},
	            dataType:"json",
	            success: function(result) {
	                console.log(result);
	                if(result['status']=='success'){
	                	$('.classmsg').css('color','green');
	                	$('.classmsg').html(result['msg']);
	                }else{
	                	$('.classmsg').css('color','red');
	                	$('.classmsg').html(result['msg']);
	                }
	            }
	        });
		}

	});

</script>