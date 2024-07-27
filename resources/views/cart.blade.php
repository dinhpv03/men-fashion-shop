@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    @if(session('cart') && count(session('cart')) > 0)
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row px-xl-5">
                    <div class="col-lg-8 table-responsive mb-5">
                        <table class="table table-light table-borderless table-hover text-center mb-0">
                            @foreach(session('cart', []) as $id => $item)
                                <thead class="thead-dark">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Kích cớ</th>
                                    <th>Màu</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px;">
                                        {{ $item['name'] }}
                                    </td>
                                    <td class="align-middle">
                                        ${{ number_format($item['price_sale'] ?: $item['price_regular'], 2) }}
                                    </td>
                                    <th class="align-middle">{{ $item['size']['name'] }}</th>
                                    <th class="align-middle">{{ $item['color']['name'] }}</th>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" type="button">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center"
                                                   value="{{ $item['quantity'] }}" name="quantity[{{ $id }}]">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle">
                                        ${{ number_format($item['quantity'] * ($item['price_sale'] ?: $item['price_regular']), 2) }}
                                    </td>

                                    <td class="align-middle">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <form class="mb-30" action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Nhập mã ở đây">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">ÁP DỤNG</button>
                                </div>
                            </div>
                        </form>
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt</span></h5>
                        <div class="bg-light p-30 mb-5">
                            <div class="border-bottom pb-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6>Tổng phụ</h6>
                                    <h6>0</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                    <h6 class="font-weight-medium">0</h6>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Total</h5>
                                    <h5>{{number_format($totalAmount, 0, ',', '.') }} VNĐ</h5>
                                </div>
                                <a href="{{ route('order.check-out') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-12 text-center py-5">
                    <h3>Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    @endif
    <!-- Cart End -->
@endsection
