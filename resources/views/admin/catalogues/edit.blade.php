@extends('admin.layout.master')

@section('title')
    Edit sản phẩm
@endsection

@section('content')
    <form class="row" action="{{ route('admin.catalogues.update', $model->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $model->name }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                       @if($model->is_active ) checked @endif value="1">
                Active
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
