jQuery(document).ready(function($){

});
function changestatus(status,id){
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url : 'changestatus',
        data: {'status':status, 'id':id},
        dataType: 'json',
        success: function (data) {                      
            
            if(data == true){      
                setTimeout(function() {
                    toastr["success"]("Status Updated Successfully!!.","Success!");
                },10000);
                toastr.success(
                    'Success!',
                    'Status Updated Successfully!!',
                    {
                      timeOut: 10000,
                      fadeOut: 1000,
                      onHidden: function () {
                          window.location.reload();
                        }
                    }
                  );
            }else{
                setTimeout(function() {
                    toastr["error"]("Something Went wrong!!.","On Snap!");
                },10000);
            } 
            location.reload();               
        },
        error: function (data) {
            setTimeout(function() {
                toastr["error"]("Something Went wrong!!.","On Snap!");
            },10000);

        }
    });
}
