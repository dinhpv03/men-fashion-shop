<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update {{ $category->name }}</title>
</head>
<body>
    @if(session('msg'))
        <h3> {{ session('msg') }}</h3>
    @endif
    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">

        <button type="submit">Save</button>
    </form>
</body>
</html>
