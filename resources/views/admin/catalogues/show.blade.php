@extends('admin.layout.master')

@section('title')
    Show product
@endsection

@section('content')
    <table>
        <tr>
            <td>Trường</td>
            <td>Giá trị</td>
        </tr>

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
    </table>
@endsection
