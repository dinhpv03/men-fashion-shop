@extends('admin.layouts.master')

@section('title')
    Thêm sản màu sắc
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Biến thể màu sắc</h4>
            </div>
        </div>
    </div>

    <form class="row" action="{{ route('admin.color.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{ route('admin.color.index') }}" class="btn btn-outline-info">Danh sách</a>
        </div>
    </form>
@endsection
