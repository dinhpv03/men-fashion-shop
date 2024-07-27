@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-4">
                <div class="col-lg-4">
                    <form action="{{ route('order.save') }}" method="post">
                     @csrf

                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">thông tin khách hàng</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Họ tên</label>
                                <input id="name" class="form-control" type="text" name="user_name"
                                       value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                                       placeholder="Nguyễn Văn A" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="email">E-mail</label>
                                <input id="email" class="form-control" type="email" name="user_email"
                                       value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                       placeholder="example@email.com" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="phone">Số điện thoại</label>
                                <input id="phone" class="form-control" type="text" name="user_phone"
                                       value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}"
                                       placeholder="0123456789" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="address">Địa chỉ</label>
                                <input id="address" class="form-control" type="text" name="user_address"
                                       value="{{ auth()->check() ? auth()->user()->address : old('address') }}"
                                       placeholder="123 Đường ABC, Quận XYZ, Thành phố HCM" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thanh toán</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Thanh toán ngân hàng</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Chuyển khoản ngân hàng</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Thanh toán</button>
                        </div>
                    </div>
                    </form>
                </div>
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng đơn hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Tóm tắt đơn hàng</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead class="bg-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-right">Giá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(session('cart') as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid mr-3" style="width: 50px;">
                                                    <div>
                                                        <h6 class="mb-0">{{ $item['name'] }}</h6>
                                                        <small class="text-muted">
                                                            {{ $item['color']['name'] }} / {{ $item['size']['name'] }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $item['quantity'] }}</td>
                                            <td class="text-right">{{ number_format($item['price_regular'], 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-2">
                                <span>Tổng phụ</span>
{{--                                <span>{{ number_format($subtotal, 0, ',', '.') }} VNĐ</span>--}}
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Vận chuyển</span>
{{--                                <span>{{ number_format($shipping, 0, ',', '.') }} VNĐ</span>--}}
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="font-weight-bold">Tổng cộng</h5>
                                <h5 class="font-weight-bold">{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
