<!DOCTYPE html>
<html>
<head>
        <link href="<?php echo base_url();?>assets/plugin/toastr/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 45%;
  padding: 10px;
  margin: 10px 30px 30px 30px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.btn.active {
  background-color: #666;
  color: white;
}
p{color: white;}
.text-center{text-align: center;}
.float-right{float: right;}
</style>
</head>
<body>


<br>



<div class=" col-xs-12 row">
<?php foreach ($pay_list as $key => $value) {  //vdebug($value); ?>
  <div class="col-xs-4 column" style="background-color:#aaa;">
    <h2 class="text-center"><?php echo $value['Name'] ?></h2>
    <div class="col-xs-12 float-right">
      <a href="<?php echo base_url(); ?>CPayslip/EditPaySlip/<?php echo $value['Id'] ?>" style="cursor: pointer;">Edit</a>
      <span class="deletepay fa fa-trash" data-deletepay="<?php echo $value['Id'] ?>" style="cursor: pointer;"> Delete</span>
    </div>
    <p>Email : <?php echo $value['Email'] ?></p>
    <p>Mobile : <?php echo $value['Mobile'] ?></p>
    <p>Basic : <?php echo $value['Basic'] ?></p>
    <p>HRA : <?php echo $value['HRA'] ?></p>
    <p>Special_Allowance : <?php echo $value['Special_Allowance'] ?></p>
    <p>PF : <?php echo $value['PF'] ?></p>
    <p>Total : <?php echo $value['Total'] ?></p>
  </div>
<?php } ?>
</div>
<script src="<?php echo  base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/plugin/toastr/toastr.min.js"></script>


<script type="text/javascript">
  
    $(document).on('click','.deletepay',function(){
        
         var conf=confirm("Do you want to delete this payslip ?");
            if(conf)
            {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url();?>CPayslip/DeletePaySlip',
                    data: {$id:$(this).data('deletepay')},
                    dataType: 'json',
                    success: function(data) {
                        if(data['msg']=='success'){
                            toastr.success(data['msg']);
                            location.reload();
                        }else{
                            toastr.error(data['msg']);
                        }
                    }
                });


            }else{
                toastr.error("you Cancled Delete Payslip");
            }
    });

</script>

</body>
</html>
