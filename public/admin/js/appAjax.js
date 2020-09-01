$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
// Post delete 
$('table').on('click', '.delteBtn', function() {

    var dataid = $(this).parent().parent().find('td').eq(0).text()
  
    var id = $(this).parent().parent().find('td input[name="id"]').val();

    $.ajax({
        method: 'POST',
        url: "{{ route('post.delete') }}",
        data: id,
        dataType: 'JSON',
        success: function() {
           $('#example1').load()
            alertify.set('notifier', 'position', 'top-center');
            alertify.success('Category delete successfully');
        }
    })
     

})