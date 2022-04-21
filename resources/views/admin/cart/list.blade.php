@extends('admin.main')
@section('head')
@endsection
@section('content')
@include('admin.alert')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Order time</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <th style="width: 50px">{{$customer->id}}</th>
            <th>{{$customer->name}}</th>
            <th>{{$customer->email}}</th>
            <th>{{$customer->phone}}</th>
            <th>{{date_format($customer->created_at, "d/m/Y")}}</th>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/carts-order/detail/{{$customer->id}}">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="#"
                    onclick="removeRow({{$customer->id}}, `/admin/carts-order/destroy`)">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $customers->links() }}
@endsection
@section('footer')
@endsection