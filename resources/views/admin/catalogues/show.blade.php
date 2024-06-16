@extends('admin.layouts.master')

@section('title')
    Show product
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh mục sản phẩm</h4>

            </div>
        </div>
    </div>


    <table  id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
        <thead>
            <tr>
                <td>Trường</td>
                <td>Giá trị</td>
            </tr>
        </thead>

        <tbody>
        @foreach($model->toArray() as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>
                    @if($key == 'cover')
                        @php
                            $url = \Storage::url($value);
                        @endphp
                        <img src="{{ $url }}" alt="" width="100px">
                    @elseif (\Illuminate\Support\Str::contains($key, 'is_'))
                        {!! $value ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>' !!}
                    @else
                        {{ $value }}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.catalogues.index') }}" class="btn btn-outline-info">Danh sách</a>
@endsection
