@extends('admin.layouts.master')

@section('title')
    Edit màu sắc
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Biến thể màu sắc</h4>
            </div>
        </div>
    </div>
    <form class="row" action="{{ route('admin.size.update', $data->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.size.index') }}" class="btn btn-outline-info">Danh sách</a>
        </div>
    </form>
@endsection
