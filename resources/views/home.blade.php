@extends('layouts.app')

@section('content')
    @include('layouts.partials.slide-show')

    @include('layouts.partials.our-service')
{{--    catalogues--}}
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Categories</span>
        </h2>
        <div class="row px-xl-5 pb-3">
            @foreach($categories as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" >
                        <div class="cat-item d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ Storage::url($item->cover) }}" alt="{{ $item->name }}">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{ $item->name }}</h6>
                                <small class="text-body">100 Products</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>



{{--    products--}}
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Featured Products</span>
        </h2>
        <div class="row px-xl-5">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <a href="{{ route('product.detail', $product->slug) }}">
                                <img class="img-fluid w-100" src="{{ Storage::url($product->img_thumbnail) }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="text-center py-4">
                            <a class="h5 text-decoration-none text-truncate" href="{{ route('product.detail', $product->slug) }}">
                                {{ Str::limit($product->name, 30) }}
                            </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h6>{{number_format($product->price_sale, 0, ',', '.') }} VNĐ</h6>
                                @if($product->price_sale)
                                    <h6 class="text-muted ml-2">
                                        <del class="text-danger">{{number_format($product->price_regular, 0, ',', '.') }} VNĐ</del>
                                    </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>



@endsection
