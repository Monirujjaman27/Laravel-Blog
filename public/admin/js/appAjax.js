$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});

// Post delete 
$('table').on('click', '.delteBtn', function() {
  
    var id = $(this).parent().parent().find('td input[name="id"]').val();
    var _token = $(this).parent().parent().find('td input[name="_token"]').val();
    $.ajax({
        method: 'POST',
        url: "http://localhost/blog/public/home/post/delete",
        data: { id, _token },
        dataType: 'JSON',
        success: function() {
           $('#example1').load()
            alertify.set('notifier', 'position', 'top-center');
            alertify.success('Category delete successfully');
        }
    })
     

})