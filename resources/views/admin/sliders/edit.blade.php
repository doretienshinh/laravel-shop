@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Tên slide</label>
                    <input type="text" name="name" class="form-control" value="{{$slider->name}}" id="name" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group col-sm-6">
                    <label for="url">Url</label>
                    <input type="text" name="url" class="form-control" id="url" value="{{$slider->url}}">
                </div>
            </div>
            <div class="form-group">
                <label for="sort_by">Sắp xếp</label>
                <input type="number" name="sort_by" class="form-control" id="sort_by" value="{{$slider->sort_by}}"></input>
            </div>
            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="upload">
                    <label class="custom-file-label" for="upload">Chọn ảnh</label>
                </div>
                <div id="image_show">
                    <a href={{$slider->thumb}} target="_blank"><img style="width: 100%" src={{$slider->thumb}}></a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$slider->thumb}}">
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$slider->active === 1 ? "checked" : ""}}>
                    <label for="active" class="custom-control-label">Kích hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$slider->active === 0 ? "checked" : ""}}>
                    <label for="no_active" class="custom-control-label">Không kích hoạt</label>
                </div>
            </div>
        </div>
        @csrf
        @include('admin.alert')
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa slide</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
