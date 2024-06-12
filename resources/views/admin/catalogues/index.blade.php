@extends('admin.layout.master')

@section('title')
    Danh mục sản phẩm
@endsection


@section('content')
    <a class="btn btn-primary" href="{{ route('admin.catalogues.create') }}">Thêm mới</a>
    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cover</th>
            <th>Is Active</th>
            <th>Created At</th>
            <th>Update At</th>
            <th>Action</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="{{ \Storage::url($item->cover) }}" alt="" width="100px">
                </td>
                <td>{!! $item->is_active ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>'!!}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('admin.catalogues.show', $item->id) }}">Show</a>
                    <a class="btn btn-danger" href="{{ route('admin.catalogues.destroy', $item->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                    <a class="btn btn-primary" href="{{ route('admin.catalogues.edit', $item->id) }}" >Edit</a>
                </td>
            </tr>
        @endforeach


    </table>
@endsection
