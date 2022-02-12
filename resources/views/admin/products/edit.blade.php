@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Tên danh Mục</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}" id="name" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group col-sm-6">
                    <label for="menu_id">Danh Mục</label>
                    <select name="menu_id" class="form-control" id="menu_id">
                        <option value="0">Danh mục cha</option>
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}" {{$menu->id === $product->menu_id ? "selected" : ""}}>{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="price">Giá gốc</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="price_sale">Giá giảm</label>
                    <input type="number" name="price_sale" class="form-control" id="price_sale" value="{{$product->price_sale}}">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea type="text" name="description" class="form-control" id="description">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea type="text" name="content" class="form-control" id="content">{{$product->content}}</textarea>
            </div>
            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="upload">
                    <label class="custom-file-label" for="upload">Chọn ảnh</label>
                </div>
                <div id="image_show">
                    <a href={{$product->thumb}} target="_blank"><img style="width: 100%" src={{$product->thumb}}></a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}">
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$product->active === 1 ? "checked" : ""}}>
                    <label for="active" class="custom-control-label">Kích hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$product->active === 0 ? "checked" : ""}}>
                    <label for="no_active" class="custom-control-label">Không kích hoạt</label>
                </div>
            </div>
        </div>
        @csrf
        @include('admin.alert')
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
