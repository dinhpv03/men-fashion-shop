<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hien thi danh muc: {{ $category->name }}</title>
</head>
<body>
    <ul>
        @foreach($category->toArray() as $column => $value)
            <li> {{ $column }}: {{ $value }}</li>
        @endforeach
    </ul>

    <a href="{{ route('categories.index') }}">Back</a>
</body>
</html>
