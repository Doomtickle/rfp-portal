    <script>
        $('.delete-btn').click(function (e){
            var self = $(this);
            e.preventDefault();
                swal({
                            title: "Are you sure?",
                            text: "You will not be able to undo this! (Maybe edit instead?)",
                            type: "warning",
                            showCancelButton  : true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText : "Yes, DELETE IT!",
                            cancelButtonText  : "No, ABORT MISSION!",
                            closeOnConfirm    : false,
                            closeOnCancel     : false
                        },
                        function(isConfirm){
                            if(isConfirm){
                                swal("Deleted!","The record is forever gone.", "success");
                                setTimeout(function() {
                                    self.parents(".delete_form").submit();
                                }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
                            }
                            else{
                                swal("cancelled","Your record is safe", "error");
                            }
                        });
            });

    </script>
@if (session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.level') }}",
            showConfirmButton: true
        });
    </script>
@endif
@if (session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{ session('flash_message_overlay.title') }}",
            text: "{{ session('flash_message_overlay.message') }}",
            type: "{{ session('flash_message_overlay.level') }}",
            confirmButtonText: 'Okay'
        });
    </script>
@endif
