function deleteBtn(event) {
    event.preventDefault();
    let urlDelete = $(this).data('url');
    let that = $(this)
    
    Swal.fire({
        title: 'Xóa?',
        text: "Bạn có chắc chắn muốn xóa",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type:'GET',
            url: urlDelete,
            success:function(data){
              if (data.Huy == 'Beautifull') {
                that.parent().parent().remove();

                Swal.fire(
                  'Đã xóa xong',
                )
              }
            }
          });
        }
        
      })
    
}



$(function() {
    $(document).on('click', '.action_delete', deleteBtn);
})