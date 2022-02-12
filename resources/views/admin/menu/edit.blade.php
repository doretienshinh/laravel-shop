@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="name">Tên danh Mục</label>
            <input type="text" name="name" class="form-control" value="{{$menu->name}}" id="name" placeholder="Nhập tên danh mục">
        </div>
        <div class="form-group">
            <label for="parent_id">Danh Mục</label>
            <select name="parent_id" class="form-control" id="parent_id">
                <option value="0" {{$menu->id == 0 ? 'selected' : ''}}>Danh mục cha</option>
                @foreach($menus as $menuParent)
                    <option value="{{$menuParent->id}}" {{$menuParent->id === $menu->parent_id ? 'selected' : ''}} {{$menuParent->id === $menu->id ? 'hidden=""' : ''}}>{{$menuParent->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea type="text" name="description" class="form-control" id="description">{{$menu->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Mô tả chi tiết</label>
            <textarea type="text" name="content" class="form-control" id="content">{{$menu->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{$menu->active == 1 ? 'checked=""' : ''}}>
                <label for="active" class="custom-control-label">Kích hoạt</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{$menu->active == 0 ? 'checked=""' : ''}}>
                <label for="no_active" class="custom-control-label">Không kích hoạt</label>
            </div>
        </div>
    </div>
    @csrf
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa</button>
    </div>
</form>
@endsection
@section('footer')
<script>
CKEDITOR.replace('content');
</script>
@endsection
