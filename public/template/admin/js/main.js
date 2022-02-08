$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if(confirm('Chắc chắn xóa danh mục')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result){
                if(result.error === false){
                    alert('Xóa thành công');
                    location.reload();
                }
                else alert('Xóa thất bại');
            }
        })
    }
}
