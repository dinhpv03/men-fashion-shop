<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Danh sach</title>
</head>
<body class="container">
<h2>List san pham</h2>
<a href="{{ route('products.create') }}">Add product</a>
    @if(session('msg'))
        <h3> {{ session('msg') }}</h3>
    @endif
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Image</td>
        <td>Created AT</td>
        <td>Updated AT</td>
        <td>Action</td>
    </tr>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->image }}</td>
            <td>{{ $item->created_at }} </td>
            <td>{{ $item->updated_at }} </td>
            <td>
                <a href="{{ route('products.show', $item) }}">Show</a>
                <a href="{{ route('products.edit', $item) }}">Edit</a>
                <form action="{{ route('products.destroy', $item) }}" method="post">
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
