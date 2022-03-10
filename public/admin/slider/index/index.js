function deleteSlider(event) {
    event.preventDefault();
    let urlDeleteSlider = $(this).data('url');
    let that = $(this)

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:'GET',
                url: urlDeleteSlider,
                success:function(data){
                   if (data.Huy == 'Beautifull') {
                       that.parent().parent().remove();
                       Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                   }
                }
             });
          
        }
      })
    
}



$(function() {
    $(document).on('click', '.action_deleteSlider', deleteSlider)
})