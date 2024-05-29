<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sach</title>
</head>
<body>
    <h2>List danh muc</h2>
    <a href="{{ route('categories.create') }}">Add category</a>
    @if(session('msg'))
        <h3> {{ session('msg') }}</h3>
    @endif
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Created AT</td>
            <td>Updated AT</td>
            <td>Action</td>
        </tr>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }} </td>
                <td>{{ $item->updated_at }} </td>
                <td>
                    <a href="{{ route('categories.show', $item) }}">Show</a>
                    <a href="{{ route('categories.edit', $item) }}">Edit</a>
                    <form action="{{ route('categories.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick=" return confirm('Are you sure??')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$data->links()}}

</body>
</html>
