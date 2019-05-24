<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Ajax Multiple Image Upload with Preview Example</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

        <style type="text/css">

            input[type=file]{
            display: none;
            }

            #image_preview{
            border: 1px solid black;
            padding: 10px;
            }

            #image_preview img{
            width: 200px;
            padding: 5px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Laravel Ajax Multiple Image Upload with Preview Example</h1>
            <div class="form-group form-inline">
                <label class="col-md-1 control-label" for="form_control_1">Image</label>
                <div class="row">
                    <div class="col-md-3 form-inline">
                        <label for="file-upload" class="custom-file-upload btn btn-default">
                            <i class="glyphicon glyphicon-upload"></i> Upload Image/s
                        </label>

                        <input type="file" class="form-control" placeholder="" name="simage[]" onchange="document.getElementById('pre-image').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                        <img id="pre-image" alt="select image" width="100" height="100" /> 
                        <button type="button" class="add_field_button">+</button>
                        <div class="form-control-focus"> </div>									
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="clearfix"></div><div class="form-group form-md-line-input input_fields_wrap"><label class="col-md-3 control-label" for="form_control_1">Image</label><div class="col-md-9"><input type="file" class="form-control" placeholder="" name="simage[]" onchange="document.getElementById(\'pre-image'+x+'\').src = window.URL.createObjectURL(this.files[0])" accept="image/*"><img id="pre-image'+x+'" alt="select image" width="100" height="100" />  <button type="button" class="remove_field">-</button><div class="form-control-focus"> </div></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});
    </script>
</html>