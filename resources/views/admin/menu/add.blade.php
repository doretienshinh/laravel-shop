@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="menuName">Tên danh Mục</label>
            <input type="text" name="menuName" class="form-control" id="menuName" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="menuName">Danh Mục</label>
            <select name="menuName" class="form-control" id="menuName">
                <option value="0">Danh mục cha</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea type="text" name="description" class="form-control" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="content">Mô tả chi tiết</label>
            <textarea type="text" name="content" class="form-control" id="content"></textarea>
        </div>
        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="active" name="customRadio" checked="">
                <label for="active" class="custom-control-label">Kích hoạt</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="no_active" name="customRadio">
                <label for="no_active" class="custom-control-label">Không kích hoạt</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
</form>
@endsection
@section('footer')
<script>
    CKEDITOR.replace('content');
</script>
@endsection