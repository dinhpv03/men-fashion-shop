@extends('admin.layouts.master')

@section('title')
    Xem chi tiết kích cỡ
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Biến thể kích cỡ</h4>
            </div>
        </div>
    </div>

    <table  id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
        <thead>
        <tr>
            <td>Name</td>
            <td>Giá trị</td>
        </tr>
        </thead>

        <tbody>
        @foreach($data->toArray() as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.size.index') }}" class="btn btn-outline-info">Danh sách</a>
@endsection
