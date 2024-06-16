@extends('admin.layouts.master')

@section('title')
    Thêm sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh mục sản phẩm</h4>

            </div>
        </div>
    </div>

    <form class="row" action="{{ route('admin.catalogues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active">
                Active
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{ route('admin.catalogues.index') }}" class="btn btn-outline-info">Danh sách</a>
        </div>
    </form>
@endsection
