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

// Upload file

$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        datatype: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results){
            if(results.error === false){
                $('#image_show').html('<a href="'+ results.url + '" target="_blank"><img style="width: 100%" src="'+ results.url + '"></a>')

                $('#thumb').val(results.url);
            }
            else alert('Tải ảnh lỗi');
        }
    });
});
