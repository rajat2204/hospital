function success() {


        swal({
            title: "Data save Successfully",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Close",
            closeOnConfirm: false,
        },
            function(success){
                 swal("Done!","Data save Successfully");       
            });
            
    }
function delete() {
        swal({
            title: "Data save Successfully",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Close",
            closeOnConfirm: false,
        },
            function(success){
                 swal("Done!","It was succesfully deleted!","success");
                  setTimeout(function() {
                            self.parents(".delete_form").submit();
                        }, 1000);
            });
            
    }