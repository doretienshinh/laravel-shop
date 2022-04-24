@extends('admin.main')
@section('content')
<section class="content" style="margin: 20px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{$customer->name}}</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>SĐT</b> <a class="float-right">{{$customer->phone}}</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Hoàn thành đơn hàng</b></a>
                        <a href="#" class="btn btn-block text-red"><b>Hủy đơn hàng</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin thêm</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                        <p class="text-muted">{{$customer->address}}</p>

                        <hr>

                        <strong><i class="fas fa-at mr-1"></i> Email</strong>

                        <p class="text-muted">{{$customer->email}}</p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Ghi chú</strong>

                        <p class="text-muted">{{$customer->content}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Danh sách
                                    sản phẩm</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="products">
                            @php $total = 0; @endphp
                            <table class="table">
                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">IMG</th>
                                        <th class="column-2">Product</th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>

                                    @foreach($products as $key => $product)
                                    @php
                                    $price = $product->price * $product->qty;
                                    $total += $price;
                                    @endphp
                                    <tr>
                                        <td class="column-1">
                                            <div class="how-itemproduct1">
                                                <img src="{{ $product->product->thumb }}" alt="IMG" style="width: 100px">
                                            </div>
                                        </td>
                                        <td class="column-2">{{ $product->product->name }}</td>
                                        <td class="column-3">{{ number_format($product->price, 0, '', '.') }} đ</td>
                                        <td class="column-4">{{ $product->qty }} cái</td>
                                        <td class="column-5">{{ number_format($price, 0, '', '.') }} đ</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Tổng Tiền</td>
                                        <td>{{ number_format($total, 0, '', '.') }} đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection