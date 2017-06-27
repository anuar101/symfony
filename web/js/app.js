 $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip(); 

        $('#dataTables-example').DataTable({
            responsive: true
        });
 });
$('#dataTables-example .deleteUser').click(function (e) {
     var tr = $(this).closest('tr');
     tr.fadeOut(400, function(){
        tr.remove();
    });
    var getUrl      = Routing.generate('delete_user', {'id': $(this).attr('id')});
    var dataRecord  = $(this).attr('dataname');
    e.preventDefault();
    $.ajax({
        type: 'delete',
        url:  getUrl,
        data: $(this).serialize(),
        success: function (response) {
            var msg ='<div class="alert alert-danger alert-dismissable">\n\
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>\n\
            <strong>'+dataRecord+'</strong> has been successfully deleted.\n\
          </div>';
            $('#err_msg').html(msg);
        },
        error: function (response) {
            var msg ='<div class="alert alert-warning alert-dismissable">\n\
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>\n\
            '+dataRecord+' has been not successfully deleted.\n\
          </div>';
            $('#err_msg').html(msg);
        }
    });
});

$('#newUser').submit(function (e) {
    var newUrl = Routing.generate('new_user');
    var dataRecord  = $('#user_name').val();
    e.preventDefault();
    $.ajax({
        type: $(this).attr('method'),
        url: newUrl,
        data: $(this).serialize(),
        success: function (response) {
            location.reload();
            //$('#dataTables-example tbody tr:first').before(response);
            $('#myModalAdd').modal('hide');
            /*setTimeout(function(){  
            var msg ='<div class="alert alert-success alert-dismissable">\n\
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>\n\
                <strong>'+dataRecord+'</strong> has been successfully saved.\n\
              </div>';
            $('#err_msg').html(msg);
            }, 5000);*/
        },
        error: function (response) {
            //location.reload();
           /* setTimeout(function(){  
                var msg ='<div class="alert alert-warning alert-dismissable">\n\
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>\n\
                        '+dataRecord+' was not successfully saved.\n\
                      </div>';
                        $('#err_msg').html(msg);
            }, 5000);*/
        }
    });
}); 

function updateAndviewDetails(id,name,age,remarks,status)
{
    if(status == 1){
        var disableAndenable = "";
        var headerMsg = "Update Record";
        var hideBtn = "style='display:block;'";
    }
    else{
        var headerMsg = "View Record";
        var disableAndenable = "readonly";
        var hideBtn = "style='display:none;'";
    }
    $('#headerData').html(headerMsg);
    var htmlModal ='<div class="row">\n\
                <div class="col-lg-12">\n\
                        <form method="POST" id="updateUser">\n\
                            <div class="form-group">\n\
                                <label class="control-label required" for="user_name">Full Name</label>\n\
                                <input type="text" id="user_name" '+disableAndenable+' value="'+name+'" name="user[name]" required="required" class="form-control">\n\
                            </div>\n\
                            <div class="form-group">\n\
                                <label class="control-label required" for="user_age">Age</label>\n\
                                <input type="number" id="user_age" '+disableAndenable+' value="'+age+'" name="user[age]" required="required" class="form-control">\n\
                            </div>\n\
                            <div class="form-group">\n\
                                <label class="control-label required" for="user_remarks">Remarks</label>\n\
                                <textarea id="user_remarks" '+disableAndenable+' name="user[remarks]" required="required" class="form-control">'+remarks+'</textarea>\n\
                            </div>\n\
                            <input type="button" value="Update" onclick="updateRecords('+id+');" '+hideBtn+' class="btn btn-primary"></input>\n\
                        </form>\n\
                </div>\n\
            </div>';
        $('#dataModal').html(htmlModal);
    $('#myModal').modal('toggle');
}

function updateRecords(id){
    var getUrl = Routing.generate('update_user',{'id':id});
    $.ajax({
        type: 'POST',
        url: getUrl,
        data: $('#updateUser').serialize(),
        dataType: "json",
        success: function(response) {
            location.reload();
            /*$('#a'+id).html(response[0].name);
            $('#b'+id).html(response[0].age);
            $('#c'+id).html(response[0].remarks);
            $('#myModal').modal('hide');
            removeModalCache();*/
        },
        error: function (response) {
            
        }
    });
}


function loadDataContent()
{
    var getUrl = Routing.generate('static_user');
    $.ajax({
        url: getUrl,
        dataType: "json",
        success: function(response) {
            $('#appendData').html(response);
        },
        error: function (response) {
            
        }
    });
}

$('#generatePdf').submit(function (e) {
     e.preventDefault();
    var getUrl = Routing.generate('generatePdf');
    $.ajax({
        type: 'POST',
        url: getUrl,
        data: $('#generatePdf').serialize(),
        dataType: "json",
        success: function(response) {
            console.log(response);
            $("#iframepdf").attr("src",response);
        },
        error: function (response) {
            
        }
    });
});

    $(document).ready(function () {
        var p = $("#uploadPreview");
        var p1 = $("#uploadPreview1");
        var p2= $("#uploadPreview2");

        document.getElementById('imagename').addEventListener('change', checkFile, false);
        document.getElementById('imagename1').addEventListener('change', checkFile1, false);
        document.getElementById('imagename2').addEventListener('change', checkFile2, false);
        
        function checkFile(e) {

            var file_list = e.target.files;

            for (var i = 0, file; file = file_list[i]; i++) {
                var sFileName = file.name;
                var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                var iFileSize = file.size;
                var iConvert = (file.size / 10485760).toFixed(2);
                if (sFileExtension === "jpg" || sFileExtension === "jpeg" || sFileExtension === "png" || sFileExtension === "JPG" || sFileExtension === "JPEG" || sFileExtension === "PNG")
                {

                    if (iFileSize < 10485760)
                    {
                        // fadeOut or hide preview
                        p.fadeOut();

                        // prepare HTML5 FileReader
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("imagename").files[0]);

                        oFReader.onload = function (oFREvent) {
                            p.attr('src', oFREvent.target.result).fadeIn();
                            $('#img1').val(oFREvent.target.result);
                        };

                        $('#error_editor').hide();
                    } else
                    {
                        $('#error_editor').html("Please make sure your file is less than 10 MB.\n\n").show();
                        return false;
                    }

                } else
                {
                    $('#error_editor').html("Please make sure your file is in jpg and png format.\n\n").show();
                    return false;

                }
            }
        }

        function checkFile1(e) {

            var file_list = e.target.files;

            for (var i = 0, file; file = file_list[i]; i++) {
                var sFileName = file.name;
                var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                var iFileSize = file.size;
                var iConvert = (file.size / 10485760).toFixed(2);
                if (sFileExtension === "jpg" || sFileExtension === "jpeg" || sFileExtension === "png" || sFileExtension === "JPG" || sFileExtension === "JPEG" || sFileExtension === "PNG")
                {

                    if (iFileSize < 10485760)
                    {
                        // fadeOut or hide preview
                        p1.fadeOut();

                        // prepare HTML5 FileReader
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("imagename1").files[0]);

                        oFReader.onload = function (oFREvent) {
                            p1.attr('src', oFREvent.target.result).fadeIn();
                            $('#img2').val(oFREvent.target.result);
                        };

                        $('#error_editor').hide();
                    } else
                    {
                        $('#error_editor').html("Please make sure your file is less than 10 MB.\n\n").show();
                        return false;
                    }

                } else
                {
                    $('#error_editor').html("Please make sure your file is in jpg and png format.\n\n").show();
                    return false;

                }
            }
        }

        function checkFile2(e) {

            var file_list = e.target.files;

            for (var i = 0, file; file = file_list[i]; i++) {
                var sFileName = file.name;
                var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
                var iFileSize = file.size;
                var iConvert = (file.size / 10485760).toFixed(2);
                if (sFileExtension === "jpg" || sFileExtension === "jpeg" || sFileExtension === "png" || sFileExtension === "JPG" || sFileExtension === "JPEG" || sFileExtension === "PNG")
                {

                    if (iFileSize < 10485760)
                    {
                        // fadeOut or hide preview
                        p2.fadeOut();

                        // prepare HTML5 FileReader
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("imagename2").files[0]);

                        oFReader.onload = function (oFREvent) {
                            p2.attr('src', oFREvent.target.result).fadeIn();
                            $('#img3').val(oFREvent.target.result);
                        };

                        $('#error_editor').hide();
                    } else
                    {
                        $('#error_editor').html("Please make sure your file is less than 10 MB.\n\n").show();
                        return false;
                    }

                } else
                {
                    $('#error_editor').html("Please make sure your file is in jpg and png format.\n\n").show();
                    return false;

                }
            }
        }

    });
