@extends('admin.main')
@section('head')
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ACTIVE</th>
                <th>Update</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
{{--        @foreach($menus as $menu)--}}
{{--            <tr>--}}
{{--                <td>{{$menu->id}}</td>--}}
{{--                <td>{{$menu->name}}</td>--}}
{{--                <td>{{$menu->active}}</td>--}}
{{--                <td>{{$menu->updated_at}}</td>--}}
{{--                <td>&nbsp;</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection
@section('footer')
@endsection
