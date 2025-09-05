$(document).ready(function(){
    var dataRecords = $('#recordListing').DataTable({
        "lengthChange": false,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "ajax_action.php",
            type: "POST",
            data: {action: 'listRecords'},
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 6, 7],
            "orderable": false,
        }],
        "pageLength": 10
    });

    // Add Record
    $("#recordModal").on('submit','#recordForm', function(event){
        event.preventDefault();
        $('#save').attr('disabled','disabled');
        var formData = $(this).serialize();
        $.ajax({
            url:"ajax_action.php",
            method:"POST",
            data:formData,
            success:function(data){
                $('#recordForm')[0].reset();
                $('#recordModal').modal('hide');
                $('#save').attr('disabled', false);
                dataRecords.ajax.reload();
            }
        })
    });

    // Update Record
    $("#recordListing").on('click', '.update', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:'ajax_action.php',
            method:"POST",
            data:{id:id, action:'getRecord'},
            dataType:"json",
            success:function(data){
                $('#recordModal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#age').val(data.age);
                $('#skills').val(data.skills);
                $('#address').val(data.address);
                $('#designation').val(data.designation);
                $('.modal-title').html("Edit Records");
                $('#action').val('updateRecord');
                $('#save').val('Save');
            }
        })
    });

    // Delete Record
    $("#recordListing").on('click', '.delete', function(){
        var id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url:"ajax_action.php",
                method:"POST",
                data:{id:id, action:'deleteRecord'},
                success:function(data) {
                    dataRecords.ajax.reload();
                }
            })
        }
    });
});
