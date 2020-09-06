
// //meta token setup 
// var _modal = $('#modalform');
// var btnsave = $('.btnsave');
// var btnupdate = $('.btnupdate');
// var adminurl = '{{ route("get_data") }}';
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': '{{ csrf_token() }}'
//     }
// });

// // reset method 
// function reset() {
//     _modal.find('input').each(function() {
//         $(this).val(null)
//     })
//     _modal.find('select').each(function() {
//         $(this).val('Select')
//     })
//     _modal.find('textarea').each(function() {
//         $(this).val(null)
//     })

// }
// reset()
// // inset post 
// function create() {
//     _modal.find('.modal-title').text('New Post');
//     reset();
//     _modal.modal('show')
//     btnsave.show()
//     btnupdate.hide()
// }

// // get input fild data 
// function getInputs() {
//     var id = $('.inputFildId').val();
//     var title = $('#title').val();
//     var category_id = $('#category_id').val();
//     var postImage = $('#postImage').val();
//     var postDesc =   $('textarea[name="postDesc"]').val();
//     var token = $('#csrfToken').val();
//     return {
//         id: id,
//         title: title,
//         category_id: category_id,
//         postDesc: postDesc,
//         postImage: postImage,
//     }
// }
// let successmsg = $('#successMsg');
// // save 
// function save() {
//     $.ajax({
//          headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           },
//         method: 'POST',
//         url: 'http://localhost/blog/public/home/post',
//         data: getInputs(),
//         success: function(dataResult) {
//             reset();
//             console.log(dataResult);
//             _modal.modal('hide');
//             location.reload(true);
//             successmsg.append('<h5 class="alert alert-success">data insert success</h5>');
//         },
//         error:function(error){
//             console.log(error)
//             }
//     })
// }


// //  Update 

// $('table').on('click', '.btnEdit', function() {
//     _modal.find('.modal-title').text('Edit Post')
//     _modal.modal('show')
//     btnsave.hide()
//     btnupdate.show()

//     var id = $(this).parent().parent().find('td').eq(0).text()
//     var title = $(this).parent().parent().find('td').eq(1).text()
//     $('input[name="id"]').val(id);
//     $('input[name="title"]').val(title);
// })

// function update() {
    
//     if (!confirm('Are you sure to Update')) return;
//     $.ajax({
//         method: 'POST',
//         url: "{{ route('update') }}",
//         data: getInputs(),
//         dataType: 'JSON',
//         success: function() {
//             reset();
//             _modal.modal('hide');
           
//             alertify.set('notifier', 'position', 'top-center');
//             alertify.success('Category update successfully');
//         }
//     })
// }



//Delete 
$('table').on('click', '.delteBtn', function() {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            let id = $(this).closest('tr').data('id');
            var dataRow = $('input[name="classes"]').val();
            var dataClass = '.'+dataRow+id;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                method: 'POST',
                url: "post/delete"+'/'+id,
                success: function() {
                  $(dataClass).hide();
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
                }
                
            })

        } else {
            swal("Your imaginary file is safe!");
        }
    });




})
