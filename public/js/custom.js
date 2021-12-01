$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.jobEditBtn').click(function(){
        var id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
            type: 'POST',
            url: "job/edit",
            dataType: 'json',
            data: {id:id, _token: "{{ csrf_token() }}"},
            success: function (data) {
                console.log(data);
            }
        });
    });
});


