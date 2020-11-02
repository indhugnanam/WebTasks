<html class="no-js" lang="zxx">

    <head>

        <meta charset="utf-8">
        <meta name="author" content="John Doe">
        <meta name="description" content="">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Payslip</title>
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugin/formvalidation/formValidation.min.css">
        <link href="<?php echo base_url();?>assets/plugin/toastr/toastr.min.css" rel="stylesheet">
    </head> 

    <body>


        <section class="col-xs-12 col-sm-10 col-sm-offset-1 WebCustomerDetails" style="margin-bottom: 20px;">
            <?php echo form_open('', array("name" => "AddPayslipFrm", "id" => "AddPayslipFrm", "method" => "post")); ?>

                <div class="col-xs-8 text-center ">
                    <h3 class="text-center" style="margin-top:30px;font-size: 25px;">Add Payslip</h3>
                    <a href="<?php echo base_url(); ?>CPayslip/ListPaySlip" style="float:right">List Payslip</a>

                </div>        
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 card">
                     <?php print form_input(array('name'=>'id','value'=> isset($edit_pay[0]['Id'])?$edit_pay[0]['Id']:"",'class'=>'form-control','type'=>'hidden')); ?> 
              
                    <div class="col-12 form-group">
                        <label>Name</label>
                         <?php print form_input(array('name'=>'name','value'=> isset($edit_pay[0]['Name'])?$edit_pay[0]['Name']:"",'class'=>'form-control','id'=>'name','placeholder'=>'Enter Name')); ?> 
                    </div>

                    <div class="col-12 form-group">
                        <label>Mobile</label>
                         <?php print form_input(array('name'=>'mobile','value'=> isset($edit_pay[0]['Mobile'])?$edit_pay[0]['Mobile']:"",'class'=>'form-control','id'=>'mobile','placeholder'=>'Enter Mobile')); ?> 
                    </div>

                    <div class="col-12 form-group">
                        <label>Email</label>
                         <?php print form_input(array('name'=>'email','value'=> isset($edit_pay[0]['Email'])?$edit_pay[0]['Email']:"",'class'=>'form-control','id'=>'email','placeholder'=>'Enter Email','type'=>'email')); ?> 
                    </div>

                    <div class="col-12 form-group">
                        <label>Basic</label>
                         <?php print form_input(array('name'=>'basic','value'=> isset($edit_pay[0]['Basic'])?$edit_pay[0]['Basic']:"0",'class'=>'form-control pf_calculation','id'=>'basic','placeholder'=>'Enter Basic','type'=>'text')); ?> 
                    </div>

                    <div class="col-12 form-group">
                        <label>HRA</label>
                         <?php print form_input(array('name'=>'hra','value'=> isset($edit_pay[0]['HRA'])?$edit_pay[0]['HRA']:"0",'class'=>'form-control pf_calculation','id'=>'hra','placeholder'=>'Enter HRA','type'=>'text')); ?> 
                    </div>

                    <div class="col-12 form-group">
                        <label>Special Allowance</label>
                         <?php print form_input(array('name'=>'special_allowance','value'=> isset($edit_pay[0]['Special_Allowance'])?$edit_pay[0]['Special_Allowance']:"0",'class'=>'form-control pf_calculation','id'=>'special_allowance','placeholder'=>'Enter Special_Allowance','type'=>'text')); ?> 
                    </div>

                    <div class="col-12 form-group">
                        <label>PF</label>
                         <?php print form_input(array('name'=>'pf','value'=> isset($edit_pay[0]['PF'])?$edit_pay[0]['PF']:"0",'class'=>'form-control pf_calculation','id'=>'pf','placeholder'=>'Enter PF','type'=>'text')); ?> 
                    </div>
                    <div class="col-12 form-group">
                        <label>Total</label>
                         <?php print form_input(array('name'=>'total','value'=> isset($edit_pay[0]['Total'])?$edit_pay[0]['Total']:"0",'class'=>'form-control','id'=>'total','placeholder'=>'Enter Total','type'=>'text','readonly'=>'readonly')); ?> 
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="ourChooseAsBtn">Submit</button>
                    </div>

                </div>

            <?php echo form_close(); ?>

        </section>
    </body>
</html>
 
<script src="<?php echo  base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/plugin/formvalidation/formValidation.min.js"></script>
<script src="<?php echo base_url();?>assets/plugin/toastr/toastr.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        // add customer data to db
        $("#AddPayslipFrm").formValidation({

            framework: 'bootstrap',
            message: 'This field required',
            excluded: 'disabled',

            fields: {
                name: {
                    validators: {
                    notEmpty: {
                        message: 'Enter Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The  Lastname can consist of alphabetical characters only'
                    }
                    }
                },
                mobile: {
                    validators: {
                    notEmpty: {
                        message: 'Enter Mobile Number'
                    },
                    numeric: {
                        message: 'The Mobile must be a number'
                    },
                    stringLength: {
                        min: 10,
                        max: 12,
                        message: 'Incorrect Number.'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'invalid Moblie No.'
                    },
                    }
                },
                email: {
                    validators: {
                       
                        regexp: {
                            regexp: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
                            message: 'invalid email'
                        },
                    }
                },

                basic: {
                    validators: {
                        notEmpty: {
                            message: 'Enter Basic Number'
                        },
                        numeric: {
                            message: 'The basic must be a number'
                        },
                        regexp: {
                            regexp: /^[0-9.]+$/,
                            message: 'invalid Basic No.'
                        },
                    }
                },

                hra: {
                    validators: {
                        notEmpty: {
                            message: 'Enter HRA Number'
                        },
                        numeric: {
                            message: 'The HRA must be a number'
                        },
                        regexp: {
                            regexp: /^[0-9.]+$/,
                            message: 'invalid HRA No.'
                        },
                    }
                },

                special_allowance: {
                    validators: {
                        notEmpty: {
                            message: 'Enter special_allowance Number'
                        },
                        numeric: {
                            message: 'The special_allowance must be a number'
                        },
                        regexp: {
                            regexp: /^[0-9.]+$/,
                            message: 'invalid special_allowance No.'
                        },
                    }
                },

                pf: {
                    validators: {
                        notEmpty: {
                            message: 'Enter PF Number'
                        },
                        numeric: {
                            message: 'The PF must be a number'
                        },
                        regexp: {
                            regexp: /^[0-9.]+$/,
                            message: 'invalid PF No.'
                        },
                    }
                },

                total: {
                    validators: {
                        notEmpty: {
                            message: 'Enter total Number'
                        },
                        numeric: {
                            message: 'The total must be a number'
                        },
                        regexp: {
                            regexp: /^[0-9.]+$/,
                            message: 'invalid total No.'
                        },
                    }
                },

            }
        })
        .on('success.form.fv', function(e, data) {
            e.preventDefault();
                var $form = $(e.target),
                fv = $form.data('formValidation');
                $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>CPayslip/AddPaySlip',
                data: $form.serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log(data)

                    if(data['msg']=='success'){
                        toastr.success(data['msg']);
                    }else{
                        toastr.error(data['msg']);
                    }
                    
                }
            });
        })
        .on('err.validator.fv', function(e, data) {
            data.element
            .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]').hide()
                .filter('[data-fv-validator="' + data.validator + '"]').show();
        });
    });

    $(document).on('keyup','.pf_calculation',function(){
        var basic=parseInt($('#basic').val());
        var hra=parseInt($('#hra').val());
        var special_allowance=parseInt($('#special_allowance').val());
        var pf=parseInt($('#pf').val());

        var get_basics=basic+hra+special_allowance;

        if(get_basics > pf){

            var get_total=get_basics-pf;

            $('#total').val(get_total);
        }

    });
</script>
</script>

<script type="text/javascript">
    
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": 'fadeIn',
            "hideMethod": "fadeOut"
        }
       
       
</script>
