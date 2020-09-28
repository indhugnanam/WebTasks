<!-- <!DOCTYPE html> -->
<html class="no-js" lang="zxx">

  <head>
        <meta charset="utf-8">
        <meta name="author" content="John Doe">
        <meta name="description" content="">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	
    	<!-- Title -->
    	<title>Upload Image</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <style type="text/css">
            .thumbnail {
                height: 100px;
                margin: 10px;
            }


        </style>

  </head>

  <body>
    
    <h1 class="text-center">Upload Image</h1>

    <?php echo form_open_multipart('', array("name" => "uploadform", "id" => "uploadform", "method" => "post")); ?>
        <label for="files">Select multiple files:</label>
        <input id="files" type="file" multiple="multiple" />
        <output id="result" />
        <button type="submit" >Add Image</button>
        <div class="col-xs-12 viewimgsrc"></div>
    <?php form_close();?>


    <table class="table table-responsive">
        <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Image</th>
              <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="viewimg">
            <?php foreach ($list as $key => $value) { ?>
            <tr>
              <th scope="row"><?php echo $value->Id; ?></th>
              <td><?php base_url();?><?php echo $value->Image; ?></td>
              <td class="fa fa-trash" onclick="deleteimg('<?php echo $value->Id; ?>')"></td>
            </tr>
           <?php } ?>

          </tbody>
    </table>

  </body>
</html>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<script type="text/javascript">
    function handleFileSelect() {
        //Check File API support
        if (window.File && window.FileList && window.FileReader) {

            var files = event.target.files; //FileList object
            var output = document.getElementById("result");

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                //Only pics
                if (!file.type.match('image')) continue;

                var picReader = new FileReader();
                picReader.addEventListener("load", function (event) {
                    var picFile = event.target;
                    $('.viewimgsrc').append("<div class='col-xs-6 col-sm-4 col-md-3'><img class='thumbnail' src='" + picFile.result + "'" + "title='" + picFile.name + "'/></div>");
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        } else {
            console.log("Your browser does not support File API");
        }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);


    $("#uploadform").submit(function(e){
       e.preventDefault();
          var files = $('#files')[0].files;
          var error = '';
          var form_data = new FormData();
          console.log(files.length);
          for(var count = 0; count<files.length; count++)
          {
           var name = files[count].name;
           var extension = name.split('.').pop().toLowerCase();
            form_data.append("images[]", files[count]);
          }
          if(error == '')
          {

             $.ajax({
                url: '<?php echo base_url();?>CCart/saveImage',
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,

                success:function(data)
                {
                    listimg();
                    $('.viewimgsrc div').remove(); 
                }
               })
          }
          else
          {
           alert(error);
          }

    });

    function deleteimg(id){
         $.ajax({
            url: '<?php echo base_url();?>CCart/deleteImage',
            method:"POST",
            data:{id:id},
            cache:false,
            success:function(result)
            {

                listimg();
            }

        });
    }

    function listimg(){
    
        $.ajax({
            url: '<?php echo base_url();?>CCart/ListImage',
            method:"POST",
            contentType:false,
            cache:false,
            processData:false,

            success:function(result)
            {
                if(result){

                    $('.viewimg tr').remove();
                    
                    $.each(JSON.parse(result), function (index,value) {
                        $.each(value, function (key,val) {
                            console.log(val['Id']);

                            $('.viewimg').append('<tr>\
                                  <th scope="row">'+val["Id"]+'</th>\
                                  <td>'+val["Image"]+'</td>\
                                  <td class="fa fa-trash" onclick="deleteimg('+val['Id']+')"></td>\
                                </tr>');

                        });
                    });
                }
            }
       });
    }

</script>

